<?php
session_start();
ob_start();
require("connection.php");

if(isset($_SESSION['uid']))
{
    $uid = $_SESSION['uid'];
    
    $verify = "SELECT access_token FROM user WHERE uid='$uid'";
    $res = mysqli_query($con, $verify);
    
    if(mysqli_num_rows($res)==1)
    {
        $r = mysqli_fetch_assoc($res);
        $auth_code = $r['access_token'];
        
        if($auth_code != $_COOKIE['PHPSESSID'])
        {
            header("Location: index.php");
            exit();
        }

    }
    else
    {
        header("Location: index.php");
        exit();
    }
}
else{
    header("Location: index.php");
    exit();
}
?>



<?php $title = "Add Item";
include("head.php");
include("connection.php");

    if(isset($_POST['add']))
    {
        $id = $_POST['pid'];
        $name = $_POST['name'];
        $price = $_POST['price'];

        $query = "INSERT INTO stuff SET id=$id, name='$name', price = $price";

        $result = mysqli_query($con, $query);

    }
?>

<div id="content">
<div class="page section">
    <h1>Add Item</h1>

    <?php
    if(isset($result)){
        if($result){ ?>
        <p>Item added successfully to the Database</p>
        <?php } 

        else if(!$result){
        ?>
        <p>Sorry Item was not added</p>
    <?php }
    }
     else {
    ?>    
    
    
    
                <form id="contact" name="add" method="POST" action="add-item.php">
                    <table>
                        <tr>
                            <th>
                                <label for="pid">Product-ID*</label>
                            </th>
                            <td>
                                <input type="text" name="pid" id="pid">
                                
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="name">Product Name*</label>
                            </th>
                            <td>
                                <input type="text" name="name" id="name">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="image">Upload Image</label>
                            </th>
                            <td>
                                <input type="file" name="image" id="image">
                                <span style="font-size: 0.6em; font-style: italic;">(Maximum 500 KB)</span>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="price">Price*</label>
                            </th>
                            <td>
                                <input type="text" name="price" id="price">
                                
                            </td>
                        </tr>                    
                    </table>
                    <input type="submit" value="Add" name="add" id="add"/>

                </form>
        <?php }?>
    </div>
</div>
<?php include("foot.php"); ?>