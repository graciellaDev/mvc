<?php
if(isset($_POST['save_task'])){
    if (!empty($_POST['name_user']) && !empty($_POST['email_user'])  && !empty($_POST['task_user'])){
        include "config.php";
        $name=$_POST['name_user'];
        $email=$_POST['email_user'];
        $task=$_POST['task_user'];
        $link=mysqli_connect(HOST,USER,PASSWORD);
        if(!$link) {
			echo 'Ошибка: Невозможно установить соединение с MySQL<br>';
            echo 'Код ошибки errno: ' . mysqli_connect_errno() . '<br>';
            echo 'Текст ошибки error: ' . mysqli_connect_error() . '<br>';
            exit;
		}
		if(!mysqli_select_db($link,DB)){
		    echo 'Нет такой базы данных<br>'.mysqli_error($link);
			exit;
		}
		$sql = "INSERT INTO table_users (name,email,text_task,status) VALUES ('$name','$email','$task','0')";
        if(mysqli_query($link, $sql)){
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
        else{
            echo "Error: ".$sql."<br>".mysqli_error($link);
        }
        mysqli_close($link);
    }
}

?>