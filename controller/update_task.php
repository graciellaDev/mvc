<?php
class update_task extends ACore_Admin {
	
	protected function obr() {
		
		
		$task = $_POST['task'];
		$id = $_POST['id'];
		
		if(empty($task)) {
			exit("Не заполнены обязательные поля");
		}
		$task=$task.'<div class="small">*отредактировано администратором</div>';
		$query = "UPDATE  table_users SET text_task='$task' WHERE id='$id'";
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
		
		$text = $this->get_text_task($id);
		echo "<div id='main'>";
		if($_SESSION['res']) {
			echo $_SESSION['res'];
			unset($_SESSION['res']);
		}
print <<<HEREDOC
<form enctype='multipart/form-data' action='' method='POST'>
<p>Описание задания:<br />
<input type='text' name='task' style='width:420px;' value='$text[text_task]'>
<input type='hidden' name='id' style='width:420px;' value='$id'>
</p>
HEREDOC;
echo "<p><input type='submit' name='button' value='Сохранить'></p></form></div>
			</div>";
	}
}
?>