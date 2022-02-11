<?php
class view extends ACore {
	
	public function get_content() {
		echo '<div id="main">';
		if(!$_GET['id_text']) {
			echo 'Неправильные данные для вывода таблицы';
		}
		else {
			$id_text = (int)$_GET['id_text'];
			if(!$id_text) {
				echo 'Не правильные данные для вывода таблицы';
			}
			else {
			    $link=$this->m;
				$query = "SELECT name,email,text_task,status  FROM table_users WHERE id_users=$id_text";
				$result = mysqli_query($link->db,$query);
				if(!$result) {
				    echo 'Запрос к базе не удался: '.mysqli_error($link);
			        exit;
				}
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				printf("<p style='font-size:18px'>%s</p>
						<p>%s</p>
						<p><img style='margin-right:5px' width='150px' align='left' src='%s'>%s</p>"
						,$row['name'],$row['email'],$row['text_task'],$row['status']);
			}
		}
		echo '</div>
			</div>';
			
	}
}
?>