<?php
include('db.php');
if(isset($_POST['submit'])){
// Get data from POST request
$name = $_POST['name'];
$description = $_POST['discription'];
$price = $_POST['price'];
$image = $_POST['image'];
$qty = $_POST['qty'];
// Insert data into database
// Your database connection and insertion code here
//$sql = "INSERT INTO product (name, description, price, image, qty) VALUES ('$name', $description, $price, $image, $qty)";
$sql = "INSERT INTO product ( name, discription, price, image, qty) VALUES ( '$name', '$description', '$price', '$image', '$qty')";
$stmt = mysqli_query($conn,$sql);
//$stmt->bind_param("ssfsi",$name, $description, $price, $image, $qty);
// $stmt->execute();
echo "Product added successfully";
}
?>
<!---------HTML CODE-------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vintage Clothing</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /*----------button-----------*/
/* Style for the button */
    .btn {
    background-color: #4CAF50; /* Green background */
    border: none; /* No border */
    color: rgb(10, 10, 10); /* White text */
    padding: 15px 32px; /* Padding */
    text-align: center; /* Center text */
    text-decoration: none; /* No underline */
    display: inline-block; /* Display as inline block */
    font-size: 16px; /* Font size */
    margin: 4px 2px; /* Margin */
    cursor: pointer; /* Cursor on hover */
    border-radius: 8px; /* Rounded corners */
          }
          
  /* Hover effect */
  .btn:hover {
    background-color: #053c08; /* Darker green */
    color: aliceblue;
 }
  /*------footer-----*/
  .footer h2{
    text-align: center;
    font-size: 35px;
    color: aliceblue;
  }
  .footer p{
    color: aliceblue;
    text-align: center;
  }
  .footer{
    background-color: #333;
    margin-top: 5%;
  }
  .footer img{
    width: 20px;
    padding: 18px 0;
    margin: 0 13px;
    cursor: pointer; 
  }     
    </style>
</head>
<body>
<!----------------------------header---------------------------------->
<header>
    <nav class="navbar">  <!---fixed navbar--->
        <div class="container">
            <a href="#home" class="logo"><img src="images/logo.jpg" alt="Logo"></a>
            <ul class="nav-links">
                <li><a href="loginpage.php"  ><img src="images/loginbtn.jpg" alt="login" height="35px" ></a></li>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#products">Products</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="cart.php"><img src="images/cart.jpg" alt="viewcart" height="40px" ></a></li>
            </ul>
        </div>
    </nav>
</header>
<!---------------------main------------------------>
<main>
    <section id="home">
        <div class="banner"> <!--banner-->
            <img src="images/banner.jpg" alt="Banner Image">
            <div class="banner-content">
                <h1>WELCOME TO OUR WORLD</h1>
                <p>WHERE YOU CAN CHOOSE YOUR FITS.....</p>
            </div>
        </div>
    </section>
    <section id="about">
        <DIV >
            <h2 class="h2">ABOUT US</h2>
        </DIV>
        <div class="container">   <!--About US-->
            <div class="image-container">
                <img src="images/sideimage.jpg" alt="Image">
            </div>
            <div class="text-container">
                <p>Born in dreamy strolls amidst European lanes, in secluded vintage thrift shops of Paris - in the memories of our mother's closets,
                     with the belief that clothes are pieces of art - to be loved, and then loved once again. <br><br>
                    Vintage Fashion is committed towards educating and propagating the mentality of slow fashion and responsible ethical consumer practises. 
                    Today, mass market fashion is one of the most polluting industries in the world, and Asian countries are the first to 
                    suffer the consequences. <br><br>
                    We want to bring the culture of buying pre-loved garments to India. <br><br>
                    We stock exclusive, upcycled clothing, hand-picked from all over the world. We believe that real beauty is
                     forever and these vintage treasures are the proof of it. <br><br>
                    The time has come to buy less but better. <br><br>
                    Welcome to Vintage Fashion.
                </p>
            </div>
        </div>
    </section>
    <section> <!--Products-->
        <div class="h2">
            <h2 id="products">Vintage Treasures</h2>
        </div>
        <div class="card-container"> <!--cards-->
            <div class="card">
                <img src="images/menshirt01.jpg" alt="Card 1">
                <div class="card-content" >
                    <h2>Mens shirt</h2>
                    <p>IVORY Floral </p>
                    <form id="addForm" method="POST">
                            <input type="hidden" name="name" value="Mens shirt">
                            <input type="hidden" name="discription" value="IVORY Floral">
                            <input type="hidden" name="price" value="1700">
                            <input type="hidden" name="image" value="./images/menshirt01.jpg">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" name="submit" class="btn">ADD TO  CART</button>
                        </form>
               <p>Rs 1,700</p>
                </div>
            </div>
            <div class="card">
                <img src="images/menshirt02.jpg" alt="Card 2">
                <div class="card-content">
                    <h2>Mens shirt</h2>
                    <p>Floral Paisely</p>
                    <div >
                    <form id="addForm" method="POST">
                            <input type="hidden" name="name" value="Mens shirt">
                            <input type="hidden" name="discription" value="Floral paisely">
                            <input type="hidden" name="price" value="2300">
                            <input type="hidden" name="image" value="./images/menshirt02.jpg">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" name="submit" class="btn">ADD TO  CART</button>
                        </form>
                    </div>
                    <p>Rs 2,300</p>
                </div>
            </div>
            <div class="card">
                <img src="images/womentop01.jpg" alt="Card 3">
                <div class="card-content">
                    <h2>Womens Top</h2>
                    <p>Floral Cocktail Party Swing Dress</p>
                    <div>
                    <form id="addForm" method="POST">
                            <input type="hidden" name="name" value="Womens Top">
                            <input type="hidden" name="discription" value="Floral Cocktail Party Swing Dress">
                            <input type="hidden" name="price" value="2700">
                            <input type="hidden" name="image" value="./images/womentop01.jpg">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" name="submit" class="btn">ADD TO  CART</button>
                        </form>
                        <p>Rs 2,700</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="images/womentop02.jpg" alt="Card 4">
                <div class="card-content">
                    <h2>Womens Top</h2>
                    <p>Fiona long sleeves floral print</p>
                    <div>
                    <form id="addForm" method="POST">
                            <input type="hidden" name="name" value="Womens Top">
                            <input type="hidden" name="discription" value="Floral long sleeves floral print">
                            <input type="hidden" name="price" value="2400">
                            <input type="hidden" name="image" value="./images/womentop02.jpg">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" name="submit" class="btn">ADD TO  CART</button>
                        </form>
                        <p>Rs 2,400</p>
                    </div>
                </div>
            </div>
        </div>
        <!-----------------pants------------------>
        <div class="card-container"> <!--cards-->
            <div class="card">
                <img src="images/menspant01.jpg" alt="Card 1">
                <div class="card-content">
                    <h2>Mens Pants</h2>
                    <p>Meroon Bell Bottom Pants </p>
                    <div>
                    <form id="addForm" method="POST">
                            <input type="hidden" name="name" value="Mens PAnts">
                            <input type="hidden" name="discription" value="Meroon Bell Bottom Pants ">
                            <input type="hidden" name="price" value="3700">
                            <input type="hidden" name="image" value="./images/menspant01.jpg">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" name="submit" class="btn">ADD TO  CART</button>
                        </form>
                        <p>Rs 3,700</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="images/menspant02.jpg" alt="Card 2">
                <div class="card-content">
                    <h2>Mens Pants</h2>
                    <p>Navy Blue Bell Bottom Pants</p>
                    <div>
                    <form id="addForm" method="POST">
                            <input type="hidden" name="name" value="Mens Pants">
                            <input type="hidden" name="discription" value="Navy Blue Bell Bottom Pants">
                            <input type="hidden" name="price" value="2600">
                            <input type="hidden" name="image" value="./images/menspant02.jpg">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" name="submit" class="btn">ADD TO  CART</button>
                        </form>
                        <p>Rs 2,600</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="images/womenspants01.jpg" alt="Card 3">
                <div class="card-content">
                    <h2>Womens Pants</h2>
                    <p>floral bell bottom pants</p>
                    <div>
                    <form id="addForm" method="POST">
                            <input type="hidden" name="name" value="Womens Pants">
                            <input type="hidden" name="discription" value="floral bell bottom pants">
                            <input type="hidden" name="price" value="1900">
                            <input type="hidden" name="image" value="./images/womenspants01.jpg">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" name="submit" class="btn">ADD TO  CART</button>
                        </form>
                        <p>Rs 1,900</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="images/womenspants02.jpg" alt="Card 4">
                <div class="card-content">
                    <h2>Womens Pants</h2>
                    <p>floral bell bottom pants</p>
                    <div>
                    <form id="addForm" method="POST">
                            <input type="hidden" name="name" value="Womens Pants">
                            <input type="hidden" name="discription" value="floral bell bottom pants">
                            <input type="hidden" name="price" value="2300">
                            <input type="hidden" name="image" value="./images/womentop02.jpg">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" name="submit" class="btn">ADD TO  CART</button>
                        </form>
                        <p>Rs 2,300</p>
                    </div>
                </div>
            </div>
        </div>
        <!----------------accessories-------------->
        <div class="card-container"> <!--cards-->
            <div class="card">
                <img src="images/accessories01.jpg" alt="Card 1">
                <div class="card-content">
                    <h2>Accessories</h2>
                    <p>BLUE MARBLE STUDS </p>
                    <div>
                    <form id="addForm" method="POST">
                            <input type="hidden" name="name" value="Accessories">
                            <input type="hidden" name="discription" value="BLUE MARBLE STUDS">
                            <input type="hidden" name="price" value="2700">
                            <input type="hidden" name="image" value="./images/accessories01.jpg">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" name="submit" class="btn">ADD TO  CART</button>
                        </form>
                        <p>Rs 2,700</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="images/accessories02.jpg" alt="Card 2">
                <div class="card-content">
                    <h2>Accessories</h2>
                    <p>GOLD LONG EARRING</p>
                    <div>
                    <form id="addForm" method="POST">
                            <input type="hidden" name="name" value="Accessories">
                            <input type="hidden" name="discription" value="GOLD LONG EARRING">
                            <input type="hidden" name="price" value="3400">
                            <input type="hidden" name="image" value="./images/accessories02.jpg">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" name="submit" class="btn">ADD TO  CART</button>
                        </form>
                        <p>RS 3,400</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="images/accessories03.jpg" alt="Card 3">
                <div class="card-content">
                    <h2>Accessories</h2>
                    <p>ROSE STUDS</p>
                    <div><form id="addForm" method="POST">
                            <input type="hidden" name="name" value="Accessories">
                            <input type="hidden" name="discription" value="ROSE STUDS">
                            <input type="hidden" name="price" value="3600">
                            <input type="hidden" name="image" value="./images/accessories03.jpg">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" name="submit" class="btn">ADD TO  CART</button>
</form>
                        <p>RS 3,600</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="images/accessories04.jpg" alt="Card 4">
                <div class="card-content">
                    <h2>Accessories</h2>
                    <p> VINTAGE AZTEC EARRINGS</p>
                    <div>
                    <form id="addForm" method="POST">
                            <input type="hidden" name="name" value="Accessories">
                            <input type="hidden" name="discription" value=" VINTAGE AZTEC EARRINGS">
                            <input type="hidden" name="price" value="5500">
                            <input type="hidden" name="image" value="./images/accessories04.jpg">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" name="submit" class="btn">ADD TO  CART</button>
                        </form>
                        <p>Rs 5,500</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<footer>
    <section class="footer" id="contact">
        <div >
            <h2>Contact</h2>
        </div>
        <div>
            <p style="font-size: 20px;">For Additional Query Contact Us  </p>
            <p>E-mail:manvithgowda@gmail.com</p>
            <p>P.NO:8792651550</p>
        </div>
            <div class="icon" >
                <center>
                <img src="images/twitter.png" alt="...">
                <img src="images/facebook.png" alt="...">
                <img src="images/email.png" alt="...">
                <img src="images/instagram.png" alt=".....">
            </center>
            </div>    
    </section>
</footer>
</body>
</html>
