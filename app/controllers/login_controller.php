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
					var_dump($username_input);
					$query = MySQL::getInstance()->prepare('SELECT * FROM users WHERE username = "$username_input"');
					$query->execute();
					$data = $query->fetch(PDO::FETCH_ASSOC); 
					if($data == NULL){
							$_SESSION['message'] = 'username not found';
							header("Location: /login");
						}
					else{
					$password_check = password_hash($password_input . $data['salt'] , PASSWORD_DEFAULT);
					if ($password_check!=$data['password']) {
						$_SESSION['message'] = 'Wrong Password';
						header("Location: /login");
					}
					else
						{
							//session_start();
							//$_SESSION['username'] = $username_input;
							//$_SESSION['uid'] = $data['uid'];
							setcookie("username",$username_input,time()+3600*24*30);
							setcookie("uid",$data['uid'],time()+3600*24*30);
							header("Location: /home");
						}
					}
				}
			}
	}
?>