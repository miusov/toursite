<?php 
include_once ("functions.php");
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
	// mysql_free_result($res);
	echo '<h1>Hotel '.$hname.'</h1>';
 ?>




<hr>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<!-- Slider -->
			<ul id="carousel">
    <li><img width="689" height="375" alt="" src="images/i/1.jpg" /><p></p></li>
	<li><img width="689" height="375" alt="" src="images/i/2.jpg" /><p></p></li>
	<li><img width="689" height="375" alt="" src="images/i/3.jpg" /><p></p></li>
	<li><img width="689" height="375" alt="" src="images/i/4.jpg" /><p></p></li>
	<li><img width="689" height="375" alt="" src="images/i/5.jpg" /><p></p></li>
	<li><img width="689" height="375" alt="" src="images/i/6.jpg" /><p></p></li>

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
				<div class="col-md-11 stars text-center" style="background-position: 50px <?php echo $bgp ?>px">
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