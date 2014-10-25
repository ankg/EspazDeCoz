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
					if(isset($_COOKIE)){
						//Redirect to home
					}
					$username_input = $_POST['username'];
					$password_input = $_POST['password'];
					$query = MySQL::getInstance()->prepare("SELECT 'password','salt','uid' FROM 'users' WHERE 'username' = '$username_input'");
					$query->execute();
					$data = $query->fetch(PDO::FETCH_ASSOC); 
					if($data == NULL){
							$_SESSION['message'] = 'username not found';
							//header("Location: /login");
						}
					else{
					$password_check = password_hash($password_input . $data['salt'] , PASSWORD_DEFAULT);
					if ($password_check!=$data['password']) {
						$_SESSION['message'] = 'Wrong Password';
						//header("Location: /login");
					}
					else
						{
							$_SESSION['username'] = $username_input;
							$_SESSION['uid'] = $data['uid'];
							header("Location: /home");
							//set the cookies
						}
					}
					//print the message
				}
			}
	}
?>