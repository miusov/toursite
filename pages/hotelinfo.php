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
	if ($hstars==0.5) {$stars=-55;}
	elseif ($hstars==1) {$stars=-107;}
	elseif ($hstars==1.5) {$stars=-157;}
	elseif ($hstars==2) {$stars=-207;}
	elseif ($hstars==2.5) {$stars=-257;} 
	elseif ($hstars==3) {$stars=-308;}
	elseif ($hstars==3.5) {$stars=-358;}
	elseif ($hstars==4) {$stars=-409;}
	elseif ($hstars==4.5) {$stars=-460;}
	elseif ($hstars==5) {$stars=-510;} 
	else {$stars=-5;}
	mysql_free_result($res);
	echo '<h1>Hotel '.$hname.'</h1>';
	?>




	<hr>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
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
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-11 price text-center">
						<!-- price -->
						<p id="price">$<?php echo $hcost ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-11 stars text-center" style="background-position: 50px <?php echo $stars ?>px">
						<!-- stars -->
					</div>
				</div>
			</div>	
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<!-- description -->
				<h2>Description</h2>
				<p><?php echo $hinfo; } ?></p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<!-- coments -->
				<h2>Coments</h2>

			</div>
		</div>
	</div>