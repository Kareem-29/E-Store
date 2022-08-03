<?php $title = "Item";
    include("head.php");
    include("connection.php");


    if(!isset($_GET['id']))
    {
        echo "No Item Key";
        exit();
    }

    $id = $_GET["id"]; 

    $query = "SELECT * FROM stuff WHERE id=$id";
    $result = mysqli_query($con, $query);
    $item = mysqli_fetch_assoc($result);
?>
<div id="content">

<div class="section page">

    <div class="wrapper">

	<div class="shirt-picture">
		<span>
                    <img src="<?php echo $item["img"];?>" alt="<?php echo $item["name"]; ?>">
		</span>
	</div>
	<div class="shirt-details">
        <h1><?php echo $item["name"]; ?></h1>
		<h1><span class="price">SAR <?php echo $item["price"];?></span></h1>
        <form action="" method="GET">
                    <input type="hidden" name="itemid" value=""/>
                    <input type="submit" value="Add to Cart" name="submit">
        </form>
	</div>
    </div>
</div>
</div>

<?php
include("foot.php");
?>

