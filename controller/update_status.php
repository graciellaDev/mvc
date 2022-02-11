<?php
class update_status extends ACore_Admin {
	
	protected function obr() {
		
		$id = $_POST['id'];
		$status = ($_POST['status']=='Выполнено')?1:0;
		
		$query = "UPDATE  table_users SET status='$status' WHERE id='$id'";
		if(!mysqli_query($this->db,$query)) {
		    echo 'Запрос к базе не удался: '.mysqli_error($this->db);
			exit;
		}
		else {
			$_SESSION['res'] = "Изменения сохранены";
			header("Location:?option=admin");
			exit;
		}			
	}
	
	public function get_content() {
	
		if($_GET['id_user']) {
			$id = (int)$_GET['id_user'];
		}
		else {
			exit('НЕ правильные данные для этой страницы');
		}
		
		$get_status = $this->get_text_task($id);
		if($get_status[status]){
		    $status='Выполнено';
		    $nostatus='Не выполнено';
		}
		else{
		    $status='Не выполнено';
		    $nostatus='Выполнено';
		}
		echo "<div id='main'>";
		if($_SESSION['res']) {
			echo $_SESSION['res'];
			unset($_SESSION['res']);
		}
print <<<HEREDOC
<form action='' method='POST'>
<p>Статус задания<br />
<select name="status">
<option selected value='$status'>$status</option>
<option value='$nostatus'>$nostatus</option>
</select>
<input type='hidden' name='id' style='width:420px;' value='$id'>
</p>
<p><input type='submit' name='button' value='Сохранить'></p></form></div></div>
HEREDOC;
	}
}
?>