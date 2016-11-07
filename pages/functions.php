<?php 

$user='mius';
$pass='123';
$host='localhost';
$dbname='toursite';

function connect(){
	global $user, $pass, $host, $dbname;

	$link=mysql_connect($host,$user,$pass) or die('Connection ERROR!');

	mysql_select_db($dbname) or die('Connection DB ERROR!');
	mysql_query("set names 'utf8'");
}


function register($name,$pass,$email){
	$name=trim(htmlspecialchars($name));
	$pass=trim(htmlspecialchars($pass));
	$email=trim(htmlspecialchars($email));
	if ($name=="" || $pass=="" || $email=="") {
		echo '<h3 style="color:red;">Не все поля заполнены</h3>';
		return false;		
	}
	if (strlen($name)<3 || strlen($name)>30 || strlen($pass)<3 || strlen($pass)>30) {
		echo '<h3 style="color:red;">Слишком короткие логин/пароль</h3>';
		return false;		
	}
	$ins='insert into users (login,pass,email,roleid) values("'.$name.'","'.md5($pass).'","'.$email.'",2)';
	connect();
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
	$sel='selece * from users were name="'.$name.'"
	and path="'.md5($pass).'"';
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