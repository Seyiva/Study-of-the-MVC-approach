<h1>Панель администрирования</h1>
<?= $data['flash'] ?>

<table>
	<tr>
		<th>Логин</th>
		<th>Имя</th>
		<th>Фамилия</th>
		<th>Электронная почта</th>
		<th>Статус на сайте</th>				  
		<th>Редактировать данные</th>        
		<th>Удалить пользователя</th>
	</tr>
	<?php	
		$users = $data['users'] ;
		foreach($users as $user) { ?>
	<tr> 
		<td><?= $user['login'] ?></td>
		<td><?= $user['name'] ?></td>
		<td><?= $user['surname'] ?></td> 
		<td><?= $user['email'] ?></td>  
		<td><?= $user['status'] ?></td> 
		<td><a href="/admin/edit/<?php echo $user['login'] ?>">Редактировать</a></td>
		<td><a href="/admin/delete/<?php echo $user['login'] ?>">Удалить</a></td>
	</tr> 
	<?php }	?>
</table>  

<nav class="pagination">
	<?php
		$numberOfPage = $data['numberOfPage'] ;
		$countOfPages = $data['countOfPages'] ;

		if($numberOfPage != 1){
			$prev = $numberOfPage - 1 ;
			echo "<a href=\"?page=$prev\">&laquo;</a> " ;
		}

		for($i = 1; $i <= $countOfPages; $i++) {
			if($numberOfPage == $i) {
				$class = ' class="active"';
			} else {
				$class = '' ;
			}

			echo "<a href=\"?page=$i\"$class>$i</a> " ;
		}

		if($numberOfPage != $countOfPages) {
			$next = $numberOfPage + 1 ;
			echo "<a href=\"?page=$next\">&raquo;</a> " ;
		}		
	?>	
</nav>

<!--
Пока что, отобразим здесь простой текст.
Далее можно добавить в админку некоторый функционал.
Например, WYSIWYG-редактор для изменения страниц сайта (видов).
Тогда, этот вид будет содержать выпадающий список для выбора страницы, поле редактора, а также кнопку
для сохранения изменений. А некоторое действие контроллера администрирования будет описывать логику редактирования страниц.
-->

