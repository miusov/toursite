<h1>Admin</h1>
<hr>
<div class="row">
	<div class="left col-md-6">
		<h2>Countries</h2>
		<div class="form">
			<?php 
			connect();
			$sel='SELECT * FROM countries ORDER BY country';
			$res=mysql_query($sel);
			echo '<form action="index.php?page=4" method="post">';
			echo '<table width="50%" class="table table-striped">';
			echo '<thead style="font-weight: bold"><td>№</td><td>Country</td><td>Del</td></thead>';
			while ($row=mysql_fetch_array($res,MYSQL_NUM)) {
				echo '<tr>';
				echo '<td>'.$row[0].'</td><td>'.$row[1].'</td>';
				echo '<td><input type="checkbox" name="cb'.$row[0].'"></td>';
				echo '</tr>';
			}
			echo '</table><br>';

			mysql_free_result($res);
			?>
		</div>
		<div class="col-md-6">
			<?php  echo '<input type="text" name="country" class="width">'; ?>
		</div>
		<div class="col-md-6">
			<?php  
			echo '<input type="submit" name="addcountry" value="ADD COUNTRY" class="add width"><br>';
			echo '<input type="submit" name="delcountry" value="DEL COUNTRY" class="del width">';
			echo '</form>';
			?>
		</div>
		<?php
		if (isset($_POST['addcountry'])) {
			$country=trim(htmlspecialchars($_POST['country']));
			if ($country=="")exit();
			$ins='INSERT INTO Countries (country) VALUES ("'.$country.'")';
			mysql_query($ins);
			echo '<script>window.location.href=document.URL;</script>';
		}

		if (isset($_POST['delcountry'])) {
			foreach ($_POST as $k => $v) {
				if (substr($k, 0, 2)== "cb") {
					$idc=substr($k, 2);
					$del='DELETE FROM countries WHERE id='.$idc;
					mysql_query($del);
				}
			}
			echo '<script>window.location.href=document.URL;</script>';
		} 
		?>
	</div>

	<div class="right col-md-6">
		<h2>Cities</h2>
		<div class="form">
			<?php 
			echo '<form action="index.php?page=4" method="post">';
			$sel='SELECT ci.id,ci.city,co.country FROM cities ci, countries co WHERE ci.countryid=co.id ORDER BY city';
			$res=mysql_query($sel);
			echo '<table width="50%" class="table table-striped">';
			echo '<thead style="font-weight: bold"><td>№</td><td>City</td><td>Country</td><td>Del</td></thead>';
			while ($row=mysql_fetch_array($res, MYSQL_NUM)) {
				echo '<tr>';
				echo '<td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td>';
				echo '<td><input type="checkbox" name="cb'.$row[0].'"></td>';
				echo '</tr>';
			}
			echo '</table><br>';
			mysql_free_result($res);
			$res=mysql_query('SELECT * FROM countries ORDER BY country');
			?>
		</div>
		<div class="col-md-6"><?php 
			echo '<select name="countryname" class="width">';
			while ($row=mysql_fetch_array($res, MYSQL_NUM)) {
				echo '<option value="'.$row[0].'">'.$row[1].'</option>';
			}
			echo '</select><br>';

			echo '<input type="text" name="city" class="width">';?>
		</div>
		<div class="col-md-6">
			<?php  
			echo '<input type="submit" name="addcity" value="ADD CITY" class="add width">';
			echo '<input type="submit" name="delcity" value="DEL CITY" class="del width">';
			echo '</form>';
			?>
		</div>
		<?php 
		if (isset($_POST['addcity'])) {
			$city=trim(htmlspecialchars($_POST['city']));
			if($city == "") exit();
			$countryid=$_POST['countryname'];
			$ins='INSERT INTO cities (city, countryid) VALUES ("'.$city.'", '.$countryid.')';
			mysql_query($ins);
			echo '<script>window.location.href=document.URL;</script>';
		}
		if (isset($_POST['delcity'])) {
			foreach ($_POST as $k => $v) {
				if (substr($k, 0, 2)== "cb") {
					$idc=substr($k, 2);
					$del='DELETE FROM cities WHERE id='.$idc;
					mysql_query($del);
				}
			}
			echo '<script>window.location.href=document.URL;</script>';
		}


		?>
	</div>
</div>

<hr>
<div class="row">
	<div class="col-md-12">
		<h2>Hotels</h2>
		<div class="form">
		<?php 

		echo '<form action="index.php?page=4" method="post">';
			$sel='SELECT ho.id, ho.hotel, ho.stars, ho.cost, ci.city, co.country FROM hotels ho, cities ci, countries co WHERE ho.cityid=ci.id AND ho.countryid=co.id';  //алиясы
			$res=mysql_query($sel);
			echo '<table class="table table-striped">';
			echo '<thead style="font-weight: bold"><td>№</td><td>Hotel</td><td>Stars</td><td>Price</td><td>City</td><td>Country</td><td>Del</td></thead>';
			while ($row=mysql_fetch_array($res)) {
				echo '<tr>';
				echo '<td>'.$row[id].'</td><td>'.$row[hotel].'</td><td>'.$row[stars].'</td><td>'.$row[cost].'</td><td>'.$row[city].'</td><td>'.$row[country].'</td>';
				echo '<td><input type="checkbox" name="cb'.$row[id].'"></td>';
				echo '</tr>';
			}
			echo '</table><br>';
			mysql_free_result($res);
			$res=mysql_query('SELECT * FROM countries ORDER BY country');
			$res2=mysql_query('SELECT * FROM cities ORDER BY city');
			?>
		</div>
		</div>
		<div class="col-md-8">
			<?php
			echo '<select name="countryname" onchange="showCities(this.value)">';
			echo '<option value="0">Select country...</option>';
			while ($row=mysql_fetch_array($res)) {
				echo '<option value="'.$row[id].'">'.$row[country].'</option>';
			}
			echo '</select>';
			echo '<select name="cityname">';
			echo '<option value="0">Select city...</option>';
			while ($row=mysql_fetch_array($res2)) {
				echo '<option value="'.$row[id].'">'.$row[city].'</option>';
			}
			echo '</select>';

			echo '<input type="text" name="hotel" placeholder="Hotel name" class="inputwidth">';	
			echo '<input type="text" name="stars" placeholder="Stars 0.5 - 5" class="inputwidth">';
			echo '<input type="text" name="cost" placeholder="Price" class="inputwidth"><br>';
			echo '<textarea style="width: 100%; height: 100px" name="info" placeholder="Hotel info"></textarea><br>';
			echo '<input type="submit" name="addhotel" value="ADD HOTEL" class="add width3">';
			echo '<input type="submit" name="delhotel" value="DEL HOTEL" class="del width3">';
			echo '</form>';
			if (isset($_POST['addhotel'])) {
				$hotel=trim(htmlspecialchars($_POST['hotel']));
				if($hotel == "") exit();
				$cityname=$_POST['cityname'];
				$countryname=$_POST['countryname'];
				$hotel_info=$_POST['info'];
				$stars=$_POST['stars'];
				$cost=$_POST['cost'];
				$ins='INSERT INTO hotels (hotel, countryid, cityid, stars, cost, info) 
				VALUES ("'.$hotel.'", "'.$countryname.'", "'.$cityname.'", "'.$stars.'", "'.$cost.'", "'.$hotel_info.'")';
				mysql_query($ins);
				echo '<script>window.location.href=document.URL;</script>';
			}
			if (isset($_POST['delhotel'])) {
				foreach ($_POST as $k => $v) {
					if (substr($k, 0, 2)== "cb") {
						$idc=substr($k, 2);
						$del='DELETE FROM hotels WHERE id='.$idc;
						mysql_query($del);
					}
				}
				echo '<script>window.location.href=document.URL;</script>';
			}
			?>
		</div>
		<div class="col-md-4">
			<form action="index.php?page=4" method="post" enctype="multipart/form-data"> <!--enctype="multipart/form-data" обзательно для множественного выбора файлов -->
				<select name="hotelid">
					<?php 

					$sel = 'SELECT ho.id, co.country, ci.city, ho.hotel 
					FROM countries co, cities ci, hotels ho 
					WHERE co.id=ho.countryid AND ci.id=ho.cityid 
					ORDER BY co.country';
					$res=mysql_query($sel);
					while ($row=mysql_fetch_array($res, MYSQL_NUM)) {
						echo '<option value="'.$row[0].'">';
						echo $row[1].'&nbsp; | &nbsp;'.$row[2].'&nbsp; | &nbsp;'.$row[3].'</option>';
					}
					mysql_free_result($res);
					?>
				</select>
				<input type="file" multiple accept="image/*" name="file[]">
				<input type="submit" name="addimage" value="ADD IMAGES" class="add width2">
			</form>
			<?php 

			if (isset($_REQUEST['addimage'])) {
				foreach ($_FILES['file']['name'] as $k => $v) {
					if ($_FILES['file']['error'][$k] !=0) {
						echo '<script>alert("Wrong file size: '.$v.'")</script>';
						continue;
					}
					if (move_uploaded_file($_FILES['file']['tmp_name'][$k], 'img/'.$v)) {
						$ins='INSERT INTO images(hotelid, imagepath) 
						VALUES ('.$_REQUEST['hotelid'].', "img/hotels'.$v.'")';
						mysql_query($ins);
					}
				}
			}

			?>
		</div>



<!-- 
сделать форму для добавления отелей

название отеля
список(селект) страна/город
кнопка добавить отель
 -->