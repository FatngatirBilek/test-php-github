<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َLogin pls</title>
    <link rel="stylesheet" href="style2.css">
  </head>
  <body id="bg-login">
    <div class="box"> 
  <h1>Login</h1>
  <form action="" method="POST">
  <input type="text" name="user" placeholder="Username">
  <input type="password" name="pass" placeholder="Password">
  <input type="submit" name="submit" value="Login">
</form>
        <?php 
        if(isset($_POST['submit'])){
            session_start();
            include 'db.php';

            $user = $_POST['user'];
            $pass = $_POST['pass'];

        
            $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."' AND password = '".md5($pass)."'");
            if(mysqli_num_rows($cek) > 0){
                $d = mysqli_fetch_object($cek);
                $_SESSION['status_login'] = true;
                $_SESSION['a_global'] = $d;
                $_SESSION['id'] = $d->admin_id;
            echo '<script>window.location="dashboard.php"</script>';
            }else {
                echo '<script>alert("Password anda salah")</script>';
            }
           




        }
        
        ?>


  </body>
</html>
