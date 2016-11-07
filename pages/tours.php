<h1>Select Tours</h1>
<hr>
<?php 
connect();

echo '<br>';

echo '<select name="countryid" id="countryid" onchange="showCities(this.value)">';

$res=mysql_query("SELECT * FROM countries ORDER BY country");
echo '<option value="0">Select country...</option>';
while ($row=mysql_fetch_array($res, MYSQL_NUM)) {
	echo '<option value="'.$row[0].'">'.$row[1].'</option>';
}
echo '</select>';
echo '<span id="citylist"></span>';
echo '<button id="bt">VIEW</button>';


	$sel='SELECT co.country, ci.city, ho.hotel, ho.cost, ho.stars, ho.id FROM hotels ho, cities ci, countries co WHERE ho.cityid=ci.id AND ho.countryid=co.id';
	$res=mysql_query($sel);
	echo '<table width="100%" class="table table-striped tbtours text-center">';
	echo '<thead style="font-weight: bold"><td>Country</td><td>City</td><td>Hotel</td><td>Price</td><td>Stars</td><td>link</td></thead>';
	while ($row=mysql_fetch_array($res,MYSQL_NUM)) {
			echo '<tr id="'.$row[1].'">';
			echo '<td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td><a href="index.php?page=5&hotel='.$row[5].'" target="_blanc">more info</a></td>';
			echo '</tr>';
		}

	echo '</table><br>';

?>
