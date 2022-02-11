<?php

abstract class ACore_Admin {
	
	public $db;
	
	public function __construct(){
		if(!$_SESSION['user']) {
			header("Location:?option=login");
		}
	    $this->db =mysqli_connect(HOST,USER,PASSWORD);
		if(!$this->db) {
		    echo 'Ошибка соединения с базой данных<br>'.mysqli_error($this->db);
			exit;
		}
		if(!mysqli_select_db($this->db,DB)) {
			echo 'Нет такой базы данных<br>'.mysqli_error($this->db);
			exit;
		}
		mysqli_query("SET NAMES 'UTF8'");
		
	}
	
	protected function get_header() {
		include "tpl/header.php";
	}
	
	
	protected function get_footer() {
		include "tpl/footer.php";
	}
	
	
	public function get_body() {
		
		if($_POST || $_GET['del']) {
			$this->obr();
		}
		$this->get_header();
		$this->get_content();
		$this->get_footer();
	}
	
	abstract function get_content();
	
	
	protected function get_text_task($id) {
		$query = "SELECT id,text_task,status  FROM table_users WHERE id='$id'";
		$result = mysqli_query($this->db,$query);
		if(!$result) {
			echo 'Нет такой базы данных<br>'.mysqli_error($this->db);
			exit;
		}
		$row = array();
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		return $row;
	}
	
}

?>