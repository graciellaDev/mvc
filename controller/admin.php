<?php

class admin extends ACore_Admin{

	public function get_content(){
		$link=$this->db;
		$query = "SELECT id,name,email,text_task,status FROM table_users";
		$result = mysqli_query($link,$query);
		if(!$result) {
			echo 'Запрос к базе не удался: '.mysqli_error($link);
			exit;
		}
		
		echo "<div id='main'>";
		echo'<div class="autent">
              <a href="?option=login">Выход</a>
             </div>';
		
		$row = array();
		/*for($i = 0; $i < mysqli_num_rows($result);$i++) {
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			printf("<p style='font-size:14px;'>
						<a style='color:#585858' href='?option=update_statti&id_text=%s'>%s</a> |
						<a style='color:red' href='?option=delete_statti&del=%s'>Удалить</a>
					</p>",$row['id'],$row['name'],$row['id']);
		}*/
		echo '<div class="table_users admin_table">
		       <div class="title_table_users">
			    <div id="title_name">Имя</div>
			    <div>email</div>
			    <div>Текст задачи</div>
			    <div>Статус</div>
	          </div>
	          <div class="bl_users">';
		for($i = 0; $i < mysqli_num_rows($result);$i++) {
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			     $status=($row['status'])?'Выполнено':'Не выполнено';
			     $hr_status=($row['status'])?'':'<div><a href="?option=update_status&id_user='.$row['id'].'">Изменить</a></div>';
			     $hr_task=($row['status'])?'':'<div><a href="?option=update_task&id_user='.$row['id'].'">Изменить</a></div>';
			     printf('<div class="user">
			           <div>%s</div>
			           <div>%s</div>
                       <div>%s %s</div>
			           <div>%s %s</div>',$row['name'],$row['email'],$row['text_task'],$hr_task,$status,$hr_status);
			     echo '</div>';
		}
		echo '</div></div></div>';
		echo '</div>
			</div>';
	}
}
?>