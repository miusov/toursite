<?php 

$user='root';
$pass='';
$host='localhost';
$dbname='toursite';

function connect(){
	global $user, $pass, $host, $dbname;

	$link=mysql_connect($host,$user,$pass) or die('Connection ERROR!');

	mysql_select_db($dbname) or die('Connection DB ERROR!');
	mysql_query("set names 'utf8'");
}


function register($name,$pass1,$pass2,$email){
	connect();
	$name=trim(htmlspecialchars($name));
	$pass1=trim(htmlspecialchars($pass1));
	$pass2=trim(htmlspecialchars($pass2));
	$email=trim(htmlspecialchars($email));
	if ($pass1 != $pass2) {
		echo '<h3 style="color:red;">Пароли отличаются</h3>';
		return false;
	}
	if ($name=="" || $pass1=="" || $pass2=="" || $email=="") {
		echo '<h3 style="color:red;">Не все поля заполнены</h3>';
		return false;		
	}
	if (strlen($name)<3 || strlen($name)>30 || strlen($pass1)<3 || strlen($pass1)>30) {
		echo '<h3 style="color:red;">Слишком короткие логин/пароль</h3>';
		return false;		
	}
	$ins='INSERT INTO Users (login,pass,email,roleid) VALUES("'.$name.'","'.md5($pass1).'","'.$email.'",2)';

	mysql_query($ins);
	return true;	
}

function login($name,$pass){
	$name=trim(htmlspecialchars($name));
	$pass=trim(htmlspecialchars($pass));
	if ($name=="" || $pass=="") {
		echo '<h3 style="color:red;">Не все поля заполнены</h3>';
		return false;		
	}
	if (strlen($name)<3 || strlen($name)>30 || strlen($pass)<3 || strlen($pass)>30) {
		echo '<h3 style="color:red;">Слишком короткие логин/пароль</h3>';
		return false;		
	}
	connect();
	$sel='SELECT * FROM users WHERE login="'.$name.'" AND pass="'.md5($pass).'"';
	$res=mysql_query($sel);
	$row=mysql_fetch_array($res,MYSQL_NUM);
	if($row[1]==$name){
		session_start();
		$_SESSION['ruser']=$name;
		return true;
	}
	else{
		return false;
	}
}

?>