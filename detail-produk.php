<?php
    error_reporting(0);
    include 'db.php';
    $contact = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
    $b = mysqli_fetch_object($contact);

    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."'");
    $p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Putrapedia</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
        <h1><a href="index.php">Putrapedia</a></h1>
        <ul>
            <li><a href="produk.php">Produk</a></li>
        </ul>
        </div>
    </header> 

    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="produk.php">
                <input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <!-- product detail -->
    <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box">
               <div class="col-2">
                   <img src="produk/<?php echo $p->product_image ?>" width="100%">
               </div> 
               <div class="col-2">
<?php
    // Product class
    class Product {
    private $name;
    private $price;
    private $description;

    public function __construct($name, $price, $description) {
    $this->name = $name;
    $this->price = $price;
    $this->description = $description;
    }

    public function displayProduct() {
    echo "<h3>{$this->name}</h3>";
    echo "<h4>Rp. " . number_format($this->price) . "</h4>";
    echo "<p>Deskripsi :<br>{$this->description}</p>";
    }
}

// Create product object using fetched data
$product = new Product($p->product_name, $p->product_price, $p->product_description);
$product->displayProduct();
?>
                </div>
            </div>
        </div>
    </div>

    <!--footer-->
    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p><?php echo $b->admin_address ?></p>

            <h4>Email</h4>
            <p><?php echo $b->admin_email ?></p>

            <h4>No. Hp</h4>
            <p><?php echo $b->admin_telp ?></p>
            <small>Copyright &copy; 2024 - Putrapedia.</small>
        </div>
</body>
</html>