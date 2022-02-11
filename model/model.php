<?php
class model {
	
	public $db;
	
	public function __construct() {
	    
		$this->db = mysqli_connect(HOST,USER,PASSWORD);
		if(!$this->db) {
			echo 'Ошибка: Невозможно установить соединение с MySQL<br>';
            echo 'Код ошибки errno: ' . mysqli_connect_errno() . '<br>';
            echo 'Текст ошибки error: ' . mysqli_connect_error() . '<br>';
            exit;
		}
		if(!mysqli_select_db($this->db,DB)){
		    echo 'Нет такой базы данных<br>'.mysqli_error($this->db);
			exit;
		}
		mysqli_query("SET NAMES ".DB_CHARSET); 
	}
	
	
	
	public function get_main_content() {
	    
		$query = "SELECT id,name,email,text_task,status FROM table_users ORDER BY name DESC";
		$result = mysqli_query($this->db,$query);
		if(!$result) {
			echo 'Запрос к базе не удался: '.mysqli_error($this->db).'<br>';
			exit;
		}
		
		for($i = 0; $i < mysqli_num_rows($result);$i++) {
			$row[] = mysqli_fetch_array($result,MYSQLI_ASSOC);
		}
       
		return $row;
	}
	
	
}
?>