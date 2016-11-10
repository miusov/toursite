<?php
if (isset($_SESSION['ruser'])){
	echo '<form action="index.php';
	if (isset($_GET['page'])) echo '?page='.$_GET['page'];
	echo '" class="admin-form" method="post">';
	echo '<span class="text-right name">Вы зашли как: <span><b>'.$_SESSION['ruser']. '</b></span></span>';
	echo '<input type="submit" value="Exit" id="exit" name="exit">';
	echo '</form>';
	if (isset($_POST['exit'])) {
		unset($_SESSION['ruser']);
		echo '<script>window.location.reload()</script>';
	}
}
else{
	if (isset($_POST['signin'])) {
		if(login($_POST['log'],$_POST['pas'])){
			echo '<script>window.location.reload()</script>';
		}
	}
	else{
		echo '<form action="index.php';
		if (isset($_GET['page'])) echo '?page='.$_GET['page'];
		echo '" class="admin-form" method="post">';
		echo '<input type="text" name="log" class="inp" placeholder="login">
		<input type="password" name="pas"  class="inp"  placeholder="password">
		<input type="submit" id="signin" value="Enter" name="signin">
	</form>';
}
}
if (isset($_POST['signin'])) {
		if(!login($_POST['log'],$_POST['pas'])){
			echo '<p class="text-right">';
			echo 'Wrong LOGIN/PASSWORD ';
			echo '<a href="index.php?page=0"> Sign in </a>';
			echo ' or <a href="index.php?page=3"> register</a>';
			echo '</p>';
		}
	}
?>