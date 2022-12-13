<?php 
    session_start();
    include 'db.php';
    if ($_SESSION['status_login'] != true  ) {
        echo '<script>window.location="login.php"</script>';
    }
    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."'");
    $d = mysqli_fetch_object($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TOKOKU</title>
</head>
<body>
    <header>
        <div class="container">
    <h1><a href="dashboard.php">TOKOKU</a></h1>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="profile.php">Profil</a></li>
        <li><a href="data-kategori.php">Data Kategori</a></li>
        <li><a href="data-produk.php">Data Produk</a></li>
         <li><a href="login.php">Logout</a></li>

    </ul>
    </div>
    </header>

    <div class="section">
        <div class="container">
            <h3>My Profile</h3>
            <div class="box">
        <form action="" method="POST">
            <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->admin_name ?>" required>
            <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
            <input type="text" name="hp" placeholder="Nomor HP" class="input-control" value="<?php echo $d->admin_telp ?>" required>
            <input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->admin_email ?>" required>
            <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->admin_address ?>" required>
            <input type="submit" name="Submit" value="Ubah Profile" class="btn">
        </form>    
        <?php 
            if(isset($_POST['submit'])){

            $nama    = $_POST['nama'];
            $user    = $_POST['user'];
            $hp      = $_POST['hp'];
            $email   = $_POST['email'];
            $alamat  = $_POST['alamat'];

            $update  = mysqli_query($conn, "UPDATE tb_admin SET 
                                admin_name = '".$nama."', 
                                username = '".$user."',
                                admin_telp = '".$hp."',
                                admin_email = '".$email."',
                                admin_address = '".$alamat."'
                                WHERE admin_id = '".$db->admin_id."'");
                                if($update){
                                    echo 'berhasil';
                                }else{
                                    echo 'gagal '.mysqli_error($conn);
                                }

            }
        ?> 
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <small>Copyright &copy; 2021 - Urmom</small>
        </div>
    </footer>
    
</body>
</html>