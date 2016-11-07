<?php 
if (isset($_POST['adduser'])) {
	if(register($_POST['login'],$_POST['pass1'],$_POST['email'])){
		echo '<h3 style="color:green;">Добавлен</h3>';
	}
}
else{
?>
<form action="" class="input-group input-group-sm">

		<input type="text" name="login" class="form-control" placeholder="логин">
		<input type="password" name="pass"  class="form-control"  placeholder="пароль">
		<input type="submit" id="press" value="войти" class="btn btn-default btn-sm">

</form>
<?php
}
?>