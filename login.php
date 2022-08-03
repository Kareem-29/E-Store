<?php 
    session_start();
    ob_start();
$title='Admin Login'; ?>
<?php $section='login'; ?>
<?php   include('head.php'); 
        require('connection.php');

        if(isset($_POST['login']))
        {
            
            $uid = $_POST['uid'];
            $pwd = $_POST['pwd'];
            
            $query = "SELECT * FROM user WHERE uid = '$uid' and password = '$pwd'";
            
            $result = mysqli_query($con, $query);
            
            if(mysqli_num_rows($result) == 1)
            {
                
                $auth_code = session_id();
                
                $_SESSION["uid"] = $uid;
                
                $auth_query = "UPDATE user SET access_token = '$auth_code' WHERE uid = '$uid'";
                $res = mysqli_query($con, $auth_query);
                
                if($res){
                    header("Location: cp_admin.php");
                    exit();
                }
            }
            else
            {
                $error = 1;
            }
            
        }
?>

<div class="page section">
    <h1>Administrator Login</h1>

    <form id="contact" name="add" method="POST" action="login.php">

    <table>
          <tr>
               <th>
                    <label for="uid">Login-ID</label>
               </th>
               <td>
                    <input type="text" name="uid" id="uid">
               </td>
          </tr>
          <tr>
               <th>
                     <label for="pwd">Password</label>
               </th>
               <td>
                      <input type="password" name="pwd" id="pwd">
               </td>
          </tr>
  
       </table>
       <input type="submit" value="Login" name="login">
   </form>
        <?php if(isset($error) and $error==1){ ?>
            <p>Incorrect Username / Password. Please Try Again. </p>
        <?php }?>
</div>

    
    
<?php include('foot.php'); ?>     