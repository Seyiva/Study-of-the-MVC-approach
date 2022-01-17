<h1>Редактируем пользователя <i><?= $data['login'] ?></i></h1>
<p>
<form action="" method="post">
<table class="login">
	<tr>
		<th colspan="2">Редактирование</th>
	</tr>
	<tr>
		<td>Имя</td>
		<td><input type="text" name="name" value="<?= $data['name'] ?>"></td>
	</tr>
	<tr>
		<td>Фамилия</td> 
		<td><input type="text" name="surname" value="<?= $data['surname'] ?>"></td>
	</tr>
	<tr>
		<td>Статус пользователя на сайте</td> 
		<td><input type="text" name="status_id" value="<?= $data['status_id'] ?>"></td>
	</tr>
	<th colspan="2" style="text-align: right">
	<input type="submit" value="Изменить" name="btn"
	style="width: 150px; height: 30px;"></th>
</table>
</form>
</p>