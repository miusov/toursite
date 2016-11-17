<?php 
// include_once ("functions.php");
if(isset($_GET['hotel'])){

	$hotel=$_GET['hotel'];
	connect();
	$sel='SELECT * FROM hotels WHERE id='.$hotel;
	$res=mysql_query($sel);
	$row=mysql_fetch_array($res,MYSQL_NUM);
	$hname=$row[1];
	$hstars=$row[4];
	$hcost=$row[5];
	$hinfo=$row[6];
	$stars;
	if ($hstars==0.5) {$stars=05;}
	elseif ($hstars==1) {$stars=1;}
	elseif ($hstars==1.5) {$stars=15;}
	elseif ($hstars==2) {$stars=2;}
	elseif ($hstars==2.5) {$stars=25;}
	elseif ($hstars==3) {$stars=3;}
	elseif ($hstars==3.5) {$stars=35;}
	elseif ($hstars==4) {$stars=4;}
	elseif ($hstars==4.5) {$stars=45;}
	elseif ($hstars==5) {$stars=5;}
	else {$stars=-5;}
	mysql_free_result($res);
	echo '<h1>Hotel "'.$hname.'"</h1>';
	?>

	<hr>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-xs-8">
				<!-- Slider -->
				<ul id="carousel">
					<?php 
					$sel='SELECT imagepath FROM images WHERE hotelid='.$hotel;
					$res=mysql_query($sel);
					while($row=mysql_fetch_array($res,MYSQL_NUM)){
						echo '<li><img width="689" height="375" alt="" src="'.$row[0].'" /><p></p></li>';
					}
					mysql_free_result($res);
					?>
				</ul>
			</div>
			<div class="col-md-4 col-xs-4">
				<div class="row">
					<div class="col-md-11 col-xs-11 price text-center">
						<!-- price -->
						<p id="price">$<?php echo $hcost ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-11 col-xs-11 text-center">
						<!-- stars -->
						<img src="../img/<?php echo $stars ?>.jpg" alt="">
					</div>
				</div>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-11 col-xs-11">
				<!-- description -->
				<h2>Description</h2>
				<p><?php echo $hinfo; } ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-11">
				<!-- coments -->
				<h2>Coments</h2>
				<hr>
					<?php 
						connect();
						getComments($hotel);

					 ?>
			</div>
		</div>
	</div>