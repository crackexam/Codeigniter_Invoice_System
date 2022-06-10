<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Login extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->isLoggedIn();
    }
    
    /**
     * This function used to check the user is logged in or not
     */
    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('login');
        }
        else
        {
            redirect('/dashboard');
        }
    }
    
    
    /**
     * This function used to logged in user
     */
    public function loginMe()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');
        
       /* if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {*/
            $email = $this->security->xss_clean($this->input->post('email'));
            $password = $this->input->post('password');
            
            $result = $this->login_model->loginMe($email, $password);
            
            if(!empty($result))
            {
                $lastLogin = $this->login_model->lastLoginInfo($result->userId);

                $sessionArray = array('userId'=>$result->userId,                    
                                        'role'=>$result->roleId,
                                        'roleText'=>$result->role,
                                        'name'=>$result->name,
                                        'lastLogin'=> $lastLogin->createdDtm,
                                        'isLoggedIn' => TRUE
                                );

                $this->session->set_userdata($sessionArray);

                unset($sessionArray['userId'], $sessionArray['isLoggedIn'], $sessionArray['lastLogin']);

                $loginInfo = array("userId"=>$result->userId, "sessionData" => json_encode($sessionArray), "machineIp"=>$_SERVER['REMOTE_ADDR'], "userAgent"=>getBrowserAgent(), "agentString"=>$this->agent->agent_string(), "platform"=>$this->agent->platform());

                $this->login_model->lastLogin($loginInfo);
                
                redirect('/dashboard');
            }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');
                
                redirect('/login');
            }
        /*}*/
    }

    /**
     * This function used to load forgot password view
     */
    public function forgotPassword()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('forgotPassword');
        }
        else
        {
            redirect('/dashboard');
        }
    }
    
  
	/**
     * This function used to generate reset password request link
     */
     function resetPasswordUser()
    {
        $status = '';
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('login_email','Email','trim|required|valid_email');
                
        if($this->form_validation->run() == FALSE)
        {
            $this->forgotPassword();
        }
        else 
        {
            $email = $this->security->xss_clean($this->input->post('login_email'));
            
            if($this->login_model->checkEmailExist($email))
            {
                $encoded_email = urlencode($email);
                
                $this->load->helper('string');
                $data['email'] = $email;
                $data['activation_id'] = random_string('alnum',15);
                $data['createdDtm'] = date('Y-m-d H:i:s');
                $data['agent'] = getBrowserAgent();
                $data['client_ip'] = $this->input->ip_address();
                
                $save = $this->login_model->resetPasswordUser($data);                
                
                if($save)
                {
                    $data1['reset_link'] = base_url() . "resetPasswordConfirmUser/" . $data['activation_id'] . "/" . $encoded_email;
                    $userInfo = $this->login_model->getCustomerInfoByEmail($email);

                    if(!empty($userInfo)){
                        $data1["name"] = $userInfo[0]->name;
                        $data1["email"] = $userInfo[0]->email;
                        $data1["message"] = "Reset Your Password";
                    }
					$this->load->library("send_mail");
                    echo $sendStatus = $this->resetPasswordEmail($data1);die;

                    if($sendStatus){
                        $status = "send";
                        setFlashData($status, "Reset password link sent successfully, please check mails.");
                    } else {
                        $status = "notsend";
                        setFlashData($status, "Email has been failed, try again.");
                    }
                }
                else
                {
                    $status = 'unable';
                    setFlashData($status, "It seems an error while sending your details, try again.");
                }
            }
            else
            {
                $status = 'invalid';
                setFlashData($status, "This email is not registered with us.");
            }
            redirect('/forgotPassword');
        }
    }

    /**
     * This function used to reset the password 
     * @param string $activation_id : This is unique id
     * @param string $email : This is user email
     */
	 function resetPasswordEmail($data1){
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'smtp.gmail.com',
		'smtp_port' => 465,
		'smtp_user' => 'localhost.sending@gmail.com',
		'smtp_pass' => 'localhost.sending@123',
		'mailtype'  => 'html', 
		'charset'   => 'iso-8859-1'
	);
	$this->load->library('email', $config);
	
	$this->email->set_newline("\r\n");
	//$this->email->initialize($config);
	$this->email->set_mailtype("html");
	$message2 = '
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style media="all" rel="stylesheet" type="text/css">/* Base ------------------------------ */
    *:not(br):not(tr):not(html) {
      font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
    }
    body {
      
    }
    a {
      color: #3869D4;
    }


    /* Masthead ----------------------- */
    .email-masthead {
      padding: 25px 0;
      text-align: center;
    }
    .email-masthead_logo {
      max-width: 400px;
      border: 0;
    }
    .email-footer {
      width: 570px;
      margin: 0 auto;
      padding: 0;
      text-align: center;
    }
    .email-footer p {
      color: #AEAEAE;
    }
  
    .content-cell {
      padding: 35px;
    }
    .align-right {
      text-align: right;
    }

    /* Type ------------------------------ */
    h1 {
      margin-top: 0;
      color: #2F3133;
      font-size: 19px;
      font-weight: bold;
      text-align: left;
    }
    h2 {
      margin-top: 0;
      color: #2F3133;
      font-size: 16px;
      font-weight: bold;
      text-align: left;
    }
    h3 {
      margin-top: 0;
      color: #2F3133;
      font-size: 14px;
      font-weight: bold;
      text-align: left;
    }
    p {
      margin-top: 0;
      color: #74787E;
      font-size: 16px;
      line-height: 1.5em;
      text-align: left;
    }
    p.sub {
      font-size: 12px;
    }
    p.center {
      text-align: center;
    }

    /* Buttons ------------------------------ */
    .button {
      display: inline-block;
      width: 200px;
      background-color: #3869D4;
      border-radius: 3px;
      color: #ffffff;
      font-size: 15px;
      line-height: 45px;
      text-align: center;
      text-decoration: none;
      -webkit-text-size-adjust: none;
      mso-hide: all;
    }
    .button--green {
      background-color: #22BC66;
    }
    .button--red {
      background-color: #dc4d2f;
    }
    .button--blue {
      background-color: #3869D4;
    }
</style>
<table cellpadding="0" cellspacing="0" class="email-wrapper" style="
    width: 100%;
    margin: 0;
    padding: 0;" width="100%">
	<tbody>
		<tr>
			<td align="center">
			<table cellpadding="0" cellspacing="0" class="email-content" style="width: 100%;
      margin: 0;
      padding: 0;" width="100%"><!-- Logo -->
				<tbody><!-- Email Body -->
					<tr>
						<td class="email-body" style="width: 100%;
    margin: 0;
    padding: 0;
    border-top: 1px solid #edeef2;
    border-bottom: 1px solid #edeef2;
    background-color: #edeef2;" width="100%">
						<table align="center" cellpadding="0" cellspacing="0" class="email-body_inner" style=" width: 570px;
    margin:  14px auto;
    background: #fff;
    padding: 0;
    border: 1px outset rgba(136, 131, 131, 0.26);
    box-shadow: 0px 6px 38px rgb(0, 0, 0);
       " width="570"><!-- Body content -->
							<thead style="background: #3869d4;">
								<tr>
									<th>
									<div align="center" style="padding: 15px; color: #000;"><a class="email-masthead_name" href="{var_action_url}" style="font-size: 16px;
      font-weight: bold;
      color: #bbbfc3;
      text-decoration: none;
      text-shadow: 0 1px 0 white;">Promotionalwears Invoice Admin</a></div>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="content-cell" style="padding: 35px;">
									<h1>Hi '.$data1['email'].',</h1>

									<p>You recently requested to reset your password for your Invoice Admin Account. Click the button below to reset it.</p>
									<!-- Action -->

									<table align="center" cellpadding="0" cellspacing="0" class="body-action" style="
      width: 100%;
      margin: 30px auto;
      padding: 0;
      text-align: center;" width="100%">
										<tbody>
											<tr>
												<td align="center">
												<div><!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{var_action_url}}" style="height:45px;v-text-anchor:middle;width:200px;" arcsize="7%" stroke="f" fill="t">
                              <v:fill type="tile" color="#dc4d2f" ></v:fill>
                              <w:anchorlock></w:anchorlock>
                              <center style="color:#ffffff;font-family:sans-serif;font-size:15px;">Reset your password</center>
                            </v:roundrect><![endif]--><a class="button button--red" href="'.$data1['reset_link'].'" style="background-color: #dc4d2f;display: inline-block;
      width: 200px;
      background-color: #3869D4;
      border-radius: 3px;
      color: #ffffff;
      font-size: 15px;
      line-height: 45px;
      text-align: center;
      text-decoration: none;
      -webkit-text-size-adjust: none;
      mso-hide: all;">Reset your password</a></div>
												</td>
											</tr>
										</tbody>
									</table>

									<p>If you did not request a password reset, please ignore this email or reply to let us know.</p>

									<p>Thanks,<br />
									Promotionalwears and the Promotionalwears Technical Team</p>
									<!-- Sub copy -->

									<table class="body-sub" style="margin-top: 25px;
      padding-top: 25px;
      border-top: 1px solid #EDEFF2;">
										<tbody>
											<tr>
												<td>
												<p class="sub" style="font-size:12px;">If you are having trouble clicking the password reset button, copy and paste the URL below into your web browser.</p>

												<p class="sub" style="font-size:12px;"><a href="'.$data1['reset_link'].'">'.$data1['reset_link'].'</a></p>
												</td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
	';

    $subject="Password Recovery Mail Promotionalwears Invoice Admin";
	$this->email->from('localhost.sending@gmail.com', 'Localhost Sending');
	
	$this->email->to($data1["email"]);
	$this->email->subject($subject);
	$this->email->message($message2);
	echo $this->email->send();die;
	  if($this->email->send())
         {
                 echo "<script type='text/javascript'>alert('Email Send Success');</script>";
 				 return 'send';
         }
         else
        {
		 echo "<script type='text/javascript'>alert('Email Sending Error');</script>";
 		 return 'notsend';
        }
	 }
    function resetPasswordConfirmUser($activation_id, $email)
    {
        $email = urldecode($email);
		$activation_id = $activation_id;
        
        // Check activation id in database
        //$is_correct = $this->login_model->checkActivationDetails($email, $activation_id);
		$is_correct = $this->login_model->checkActivationcode($email, $activation_id);
		//print_r($is_correct);
		//var_dump($is_correct);
		//echo $is_correct[0];
		//die;
        
        $data['email'] = $email;
        $data['activation_code'] = $activation_id;
        
        if ($is_correct != "")
        {
            $this->load->view('newPassword', $data);
        }
        else
        {
            redirect('/login');
        }
    }
    
    /**
     * This function used to create new password for user
     */
    function createPasswordUser()
    {
        $status = '';
        $message = '';
        $email = $this->input->post("email");
        $activation_id = $this->input->post("activation_code");
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->resetPasswordConfirmUser($activation_id, urlencode($email));
        }
        else
        {
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');
            
            // Check activation id in database
            $is_correct = $this->login_model->checkActivationcode($email, $activation_id);
            //print_r($is_correct);die;
            if($is_correct != "")
            {                
                $this->login_model->createPasswordUser($email, $password);
                
                $status = 'success';
                $message = 'Password changed successfully';
            }
            else
            {
                $status = 'error';
                $message = 'Password changed failed';
            }
            
            setFlashData($status, $message);

            redirect("/login");
        }
    }
}

?>