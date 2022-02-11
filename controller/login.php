<?php

class login extends ACore{
	
	protected function obr() {
	    $link=$this->m;
		$login = strip_tags(mysqli_real_escape_string($link->db,$_POST['login']));
		$password = strip_tags(mysqli_real_escape_string($link->db,$_POST['password']));
		if(!empty($login) AND !empty($password)) {
			//$password = md5($password);
			$query = "SELECT id FROM users WHERE login='$login' AND pass ='$password'";
			
			if(!$result = mysqli_query($link->db,$query)) {
			    echo 'Запрос к базе не удался: '.mysqli_error($link->db);
			    exit;
			}

			if(mysqli_num_rows($result) == 1) {
				$_SESSION['user'] = 'REG';
				header("Location:?option=admin");
				exit;
			}
			else {
				exit("Такого пользователя нет");
			}
		}
		else {
			exit("Заполните обязательные поля");
		}
	}
	
	public function get_content() {
		echo "<div id='main'>";
		
echo
"<form class='login_form' action='' method='POST'>
<p>Логин:<br />
<input type='text' name='login'>
</p>
<p>Пароль:<br />
<input type='password' name='password'>
</p>
<p>
<p><input type='submit' name='button' value='Войти'></p></form>";
		echo "</div></div>";		
	}
}
?>