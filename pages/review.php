<?php 
if (isset($_SESSION['ruser'])){
	?>
<h1>Review</h1>

<form action="index.php?page=2" method="post">
	<select name="hotelid">
		<?php 
		session_start();
		connect();
			$res=mysql_query('SELECT ho.id, co.country, ci.city, ho.hotel 
							  FROM Countries co, cities ci, hotels ho
							  WHERE co.id=ho.countryid and ci.id=ho.cityid');
			while($row=mysql_fetch_array($res, MYSQL_NUM)){
				echo '<option value="'.$row[0].'">'.
				$row[1]." | ".$row[2]." | ".$row[3].'</option>';
			}
			mysql_free_result($res);
		 ?>
	</select><br>
	<textarea name="text" class="review"></textarea><br>
	<button name="addcom" type="submit" class="add">Add Comment</button>
</form>
<?php 

if (isset($_REQUEST['addcom'])) {
	$hotelid=$_REQUEST['hotelid'];
	$text=trim(htmlspecialchars($_REQUEST['text']));
	$name='';
	if (isset($_SESSION['ruser'])) {
		$name=$_SESSION['ruser'];
	}
	else{
		$name='Гость';
	}
	$dt=@date("Y-m-d H:i:s");
	$ins='INSERT INTO Comments (hotelid, text, username, datein) VALUES ('.$hotelid.', "'.$text.'", "'.$name.'", "'.$dt.'")';
	mysql_query($ins);
}
 ?>
 <?php 
}
else{
	echo '<p style="margin-bottom: 30px">';
	echo '<h3>Only for registered users!</h3> <br>';
	echo '<a href="index.php?page=3"> Registration</a></p>';
}
 ?>