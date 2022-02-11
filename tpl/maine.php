<center>
    <div class="autent">
        <a href="?option=login">Авторизация</a>
    </div>
</center>
<div id="main">
    <div class="table_users">
        <div class="title_table_users">
			<div id="title_name">Имя</div>
			<div>email</div>
			<div>Текст задачи</div>
			<div>Статус</div>
	    </div>
	    <div class="bl_users">
		<?php foreach($content as $row) :?>
			<div class="user">
						<div><?php echo $row['name'];?></div>
						<div><?php echo $row['email'];?></div>
						<div><?php echo $row['text_task'];?></div>
						<div><?php echo ($row['status'])?'Выполнено':'Не ваполнено'; ?></div>
			</div>
					
		<?php endforeach;?>
		</div>
	</div>
	
	<div class="new_task">
	    <div class="title_new_task">Создать новую задачу</div>
	    <div class="form_new_task">
	        <form name="test" method="post" action="input1.php">
	           <div class="inputTask">
	               <div>
	                   <input name="name_user" type="text" placeholder="Имя*" required >
	               </div>
	               <div>
	                   <input name="email_user" type="email" placeholder="email*" required>
	               </div>
	               
	           </div> 
	           <div class="textareaTask">
	               <textarea name="task_user" placeholder="Текст задачи*" required></textarea>
	           </div>
	           <div class="buttonTask">
	               <input name="save_task" type="submit" value="Сохранить задачу">
	           </div>
	        </form>
	    </div>
	</div>
</div>