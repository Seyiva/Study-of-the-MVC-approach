<h1>Страница регистрации</h1>
<p>
<form action="" method="post">
<table class="login">
	<tr>
		<th colspan="2">Регистрация</th>
    </tr>
	<tr>
        <?php 
            if(isset($data['reg_success']) ) {
                echo "<p style=\"color:green\">". $data['reg_success'] . "</p><br>"; 
            }             
        ?>
		<td>Имя</td>
        <td><?php if(isset($data['have_Name'] ) )
        { echo "<p style=\"color:red\">". $data['have_Name'] . "</p>"; } ?>    
        <input type="text" name="name"></td>
	</tr>
    <tr>
		<td>Фамилия</td>
		<td><?php if(isset($data['have_Surname']) )
        { echo "<p style=\"color:red\">". $data['have_Surname'] . "</p>"; } ?>
        <input type="text" name="surname"></td>
	</tr>
    <tr>
		<td>Год рождения</td>
		<td><?php if(isset($data['have_YearBirth']) )
        { echo "<p style=\"color:red\">". $data['have_YearBirth'] . "</p>"; } ?>
        <input type="text" name="yearbirth"></td>
	</tr>
    <tr>
		<td>Электронный адрес почты</td>
		<td><?php 
        if(isset($data['have_email']) ) {
            echo "<p style=\"color:red\">". $data['have_email'] . "</p>"; 
        } elseif (isset($data['email_format'])) {
            echo "<p style=\"color:red\">". $data['email_format'] . "</p>"; 
        } elseif (isset($data['exists_email'])) {
            echo "<p style=\"color:red\">". $data['exists_email'] . "</p>"; 
        }   ?> 
        <input type="text" name="email"></td>
	</tr>
	<tr>
		<td>Пароль</td>
		<td><?php 
        if(isset($data['have_password']) ) {
            echo "<p style=\"color:red\">". $data['have_password'] . "</p>"; 
        } elseif (isset($data['long'])) {
            echo "<p style=\"color:red\">". $data['long'] . "</p>"; 
        } ?> 
        <input type="password" name="password"></td>
	</tr>
	<th colspan="2" style="text-align: right">
	<input type="submit" value="Зарегистрироваться" name="btn"
	style="width: 150px; height: 30px;"></th>
</table>
</form>
</p>
