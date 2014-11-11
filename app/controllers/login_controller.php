	<?
	/**
	* This is the Login controller, redirects to home controller if cookies are set
	*/
	class LoginController
	{
			function get()
			{
			if(isset($_COOKIE["username"]) && isset($_COOKIE["uid"])){
						header("Location: /profile");
					}
			 require_once('app/views/login.php');
			}
			function post_xhr()
			{
				if(isset($_POST['username']))
				{
					
					$username_input = $_POST['username'];
					$password_input = $_POST['password'];
					$remember_input = $_POST['remember'];
					$user = new User($username_input);
					$data = $user->getUserData($username_input);
					if($data == NULL){
							echo "{\"access\":false,\"msg\":\"Username or Password is wrong\"}";
						}
					else{
					if (!(password_verify($password_input.$data['salt'] , $data['password']))) {
						echo "{\"access\":false,\"msg\":\"Username or Password is wrong\"}";
					}
					else
						{
							if($remember_input=="true")
							{setcookie("username",$username_input,time()+3600*24*30);
							 setcookie("uid",$data['uid'],time()+3600*24*30);
							}
							else
							{
							 setcookie("username",$username_input);
							 setcookie("uid",$data['uid']);
							}
							echo "{\"access\":true}";
							//header("Location: /home");
						}
					}
				}
			}
	}
?>