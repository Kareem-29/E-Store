<?php $title = "Stuff";
include("head.php");
include("connection.php");


$stuff = array();


$qury = "SELECT * FROM stuff";
$res = mysqli_query($con,$qury);

while($row = mysqli_fetch_assoc($res))
{
	$stuff[$row["id"]] = array(
		"name" => $row["name"],
		"img" => $row["img"],
		"price" => $row["price"]
	);

}



?>


<div class="page shirts section">
	<div class="wrapper">
		<h1>My Full Catalog of Stuff</h1>

		<ul class="products">

		<?php foreach($stuff as $k => $s)
		{  ?>
			<li>
				<a href="item.php?id=<?php echo $s; ?>">
				
				<img src="<?php echo $s["img"];?>" alt="<?php echo $s["name"];?>">
				<p>View Details</p>
				</a>
        <?php } ?>
				
			</li>

		</ul>




	</div>
</div>


<?php include("foot.php"); ?>