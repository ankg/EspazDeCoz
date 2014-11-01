	<?
	/**
	* This is the Login controller, redirects to home controller if cookies are set
	*/
	class LoginController
	{
			function get()
			{
			 require_once('app/views/login.php');
			}
			function post()
			{
				if(isset($_POST['username']))
				{
					if(isset($_COOKIE["username"]) && isset($_COOKIE["uid"])){
						header("Location: /home");
					}
					$username_input = $_POST['username'];
					$password_input = $_POST['password'];
					
					$user = new User($username_input);
					$data = $user->getUserData($username_input);
					if($data == NULL){
							$_SESSION['message'] = 'Username not found';
							header("Location: /login");
						}
					else{
					
					if (!(password_verify($password_input.$data['salt'] , $data['password']))) {
						$_SESSION['message'] = 'Wrong Password';
						header("Location: /login");
					}
					else
						{
							setcookie("username",$username_input,time()+3600*24*30);
							setcookie("uid",$data['uid'],time()+3600*24*30);
							header("Location: /home");
						}
					}
				}
			}
	}
?>