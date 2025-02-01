<?php
session_start(); // Start session to manage user interactions

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_product";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Sellers</title>
    <link rel="stylesheet" href="test.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        
        header {
            background-color: #f4f4f9;
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        
        h2 {
            color: #002b5c;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .product-item {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        
        .product-item:hover {
            transform: translateY(-5px);
        }
        
        .product-item img {
            width: 100%;
            max-width: 180px;
            margin: 0 auto 10px;
            border-radius: 5px;
        }
        
        .product-title {
            font-size: 16px;
            font-weight: bold;
            margin: 10px 0;
        }
        
        .product-price {
            color: #e76f51;
            font-size: 18px;
            margin-bottom: 10px;
        }
        
        .product-btn {
            display: inline-block;
            background-color: #002b5c;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        
        .product-btn:hover {
            background-color: #f4a261;
        }
        
        footer {
            background-color: #f9f9f9;
            padding: 20px 10px;
            border-top: 1px solid #ddd;
        }
        
        .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .footer-column {
            flex: 1;
            min-width: 200px;
            margin: 10px;
        }
        
        .footer-column h3 {
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
        }
        
        .footer-column ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer-column ul li {
            margin: 5px 0;
        }
        
        .footer-column ul li a {
            text-decoration: none;
            color: #555;
            transition: color 0.3s;
        }
        
        .footer-column ul li a:hover {
            color: #000;
        }
        
        .footer-apps {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        
        .footer-apps img {
            width: 120px;
            height: auto;
        }
        
        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                align-items: center;
            }
            .footer-column {
                min-width: 100%;
                text-align: center;
            }
        }
        
        @media (max-width: 480px) {
            .footer-apps img {
                width: 100px;
            }
        }
    </style>
</head>

<body>
<div class="navbar">
        <div class="logo">
            <img src="logo.png" alt="Real Madrid">
        </div>
        <div class="links">
            <a href="index.php">Home</a>
            <a href="tickets.php">Tickets</a>
            <a href="shop.php">Shop</a>
            <a href="sponsors.php">Sponsors</a>
            <a href="contact.php">Contact</a>
            <a href="matchdaytour.php">FCA Tour</a>
        </div>
        <div class="icons">
            <img src="adidas-removebg-preview.png" alt="Icon 1">
            <img src="emirates.png" alt="Icon 2">
        </div>
        <a href="loginandRegister.php" class="sign-in">Sign in</a>
        <div class="menu" id="menuToggle"></div>
    </div>

    <div class="overlay" id="overlay"></div>

    <div class="menu-content" id="menuContent">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="tickets.php">Tickets</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="index.php">Sponsors</a></li>
            <li><a href="tickets.php">Contact</a></li>
            <li><a href="matchdaytour.php">FCA Tour</a></li>
            <li><a href="#">Football</a>
                <ul class="submenu">
                    <li><a href="firstteam.php">First Team</a></li>
                    <li><a href="womenteam.php">Women's Team</a></li>
                    <li><a href="academy.php">Academy</a></li>
                </ul>
            </li>
            <li><a href="#">News</a>
                <ul class="submenu">
                    <li><a href="news.php">Latest News</a></li>
                    <li><a href="nextevents.php">Next Events</a></li>
                    <li><a href="schedule.php">Schedules</a></li>
                </ul>
            </li>
            <li><a href="#">The Club</a>
                <ul class="submenu">
                    <li><a href="history.php">History</a></li>
                    <li><a href="fcalphacity.php">FC ALPHA City</a></li>
                    <li><a href="stadium.php">New Eagles Stadium</a></li>
                    <li><a href="honors.php">Honors</a></li>
                    <li><a href="fanclubs.php">Fan Clubs</a></li>
                </ul>
            </li>
            <li><a href="foundation.php">Foundation</a></li>
           
            <li><a href="4kpics.php">Best Pictures</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </div>

   

    <script>
            const menuToggle = document.getElementById('menuToggle');
            const menuContent = document.getElementById('menuContent');
            const overlay = document.getElementById('overlay');

            menuToggle.addEventListener('click', () => {
                menuToggle.classList.toggle('active');
                menuContent.classList.toggle('active');
                overlay.classList.toggle('active');
            });

            overlay.addEventListener('click', () => {
                menuToggle.classList.remove('active');
                menuContent.classList.remove('active');
                overlay.classList.remove('active');
            });
        </script>


    <div class="container">
        <h2>FC ALPHA SHOP</h2>
                 

        
      
        <div class="product-grid">

        <form action="process_cart.php" method="POST">
            <div class="product-item">
                <img src="adidasshoes.webp" alt="Adidas Shoes">
                <div class="product-title">Adidas Gazelle Rekive 24/25 Charcoal</div>
                <div class="product-price">$150.00</div>
                <input type="hidden" name="product_name" value="Adidas Gazelle Rekive 24/25 Charcoal">
                <input type="hidden" name="product_price" value="150.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>
        </form>

        <form action="process_cart.php" method="POST">
            <div class="product-item">

                <img src="adidasjacket.jpg" alt="Winter Jacket">
                <div class="product-title" >Mens Training Winter Jacket 24/25 White</div>
                <div class="product-price" >$215.00</div>
                <input type="hidden" name="product_name" value="Mens Training Winter Jacket 24/25 White">
                <input type="hidden" name="product_price" value="215.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
                
            </div>
        </form>
            

        <form action="process_cart.php" method="POST">
            <div class="product-item">

                <img src="tshirtadidas.jpg"  alt="Home Kit">
                <div class="product-title">Youth Home Kit 24/25 White</div>
                <div class="product-price" >$140.00</div>
                <input type="hidden" name="product_name" value="Youth Home Kit 24/25 White">
                <input type="hidden" name="product_price" value="140.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>
        </form>
            
        <form action="process_cart.php" method="POST">

                 <div class="product-item">
                <img src="ball.webp" alt="All Weather Jacket">
                <div class="product-title">Official Match Ball for 24/25 Season</div>
                <div class="product-price">$125.00</div>
                <input type="hidden" name="product_name" value="Official Match Ball for 24/25 Season">
                <input type="hidden" name="product_price" value="125.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>

        </form>
               

        <form action="process_cart.php" method="POST">
            <div class="product-item">
                <img src="shorts.webp" alt="Ball">
                <div class="product-title">Mens UCL Training All Weather Jacket 24/25</div>
                <div class="product-price">$120.00</div>
                <input type="hidden" name="product_name" value="Mens UCL Training All Weather Jacket 24/25">
                <input type="hidden" name="product_price" value="120.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>
            </form>
                
            <form action="process_cart.php" method="POST">
            
            <div class="product-item">
                <img src="hoodie.jpg" alt="Cap">
                <div class="product-title">Mens hoodies for 2024/25 Season</div>
                <div class="product-price">$30.00</div>
                <input type="hidden" name="product_name" value="Mens hoodies for 2024/25 Season">
                <input type="hidden" name="product_price" value="120.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>
        </form>

        <form action="process_cart.php" method="POST">

            <div class="product-item">
                <img src="socks.webp" alt="Home Kit">
                <div class="product-title">Youth Home Kit 24/25 White</div>
                <div class="product-price">$15.00</div>
                <input type="hidden" name="product_name" value="Youth Home Kit 24/25 White">
                <input type="hidden" name="product_price" value="120.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>
            </form>

            <form action="process_cart.php" method="POST">

            <div class="product-item">
                <img src="tracksuit.jpg" alt="Home Kit">
                <div class="product-title">Black Track suit for  24/25 Season</div>
                <div class="product-price">$90.00</div>
                <input type="hidden" name="product_name" value="Black Track suit 24/25 Season">
                <input type="hidden" name="product_price" value="90.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>
            </form>
            
            <form action="process_cart.php" method="POST">
            <div class="product-item">
                <img src="shorts.jpg" alt="Home Kit">
                <div class="product-title">Youth Kit shorts 24/25 White</div>
                <div class="product-price">$78.00</div>
                <input type="hidden" name="product_name" value="Youth Kit shorts 24/25 White">
                <input type="hidden" name="product_price" value="78.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>
            </form>

            <form action="process_cart.php" method="POST">

            <div class="product-item">
                <img src="tracksuittwo.jpg" alt="Home Kit">
                <div class="product-title"> Home Kit Complete for 24/25  season</div>
                <div class="product-price">$125.00</div>
                <input type="hidden" name="product_name" value="Home Kit Complete for 24/25  season">
                <input type="hidden" name="product_price" value="125.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>
        </form>

        <form action="process_cart.php" method="POST">
            <div class="product-item">
                <img src="euroball-removebg-preview.png" alt="Home Kit">
                <div class="product-title">Uefa Champions League ball for 24/25 </div>
                <div class="product-price">$59.00</div>
                <input type="hidden" name="product_name" value="Uefa Champions League ball for 24/25">
                <input type="hidden" name="product_price" value="59.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>
        </form>

        <form action="process_cart.php" method="POST">
            <div class="product-item">
                <img src="bootstwo.jpg" alt="Home Kit">
                <div class="product-title">Adidas boots Released for  24/25 Season</div>
                <div class="product-price">$30.00</div>
                <input type="hidden" name="product_name" value="Adidas boots Released for  24/25 Season">
                <input type="hidden" name="product_price" value="30.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>

        </form>
  

        <form action="process_cart.php" method="POST">

            <div class="product-item">
                <img src="tracksuitthree.jpg" alt="Home Kit">
                <div class="product-title">Adidas training Jacket for  24/25 Season</div>
                <div class="product-price">$140.00</div>
                <input type="hidden" name="product_name" value="Adidas training Jacket  for  24/25 Season">
                <input type="hidden" name="product_price" value="140.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>
        </form>

        <form action="process_cart.php" method="POST">

            <div class="product-item">
                <img src="redshorts.jpg" alt="Home Kit">
                <div class="product-title">Red Shorts  for 24/25 season </div>
                <div class="product-price">$120.00</div>
                <input type="hidden" name="product_name" value="Red Shorts  for 24/25 season ">
                <input type="hidden" name="product_price" value="120.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>
        </form>

        <form action="process_cart.php" method="POST">

            <div class="product-item">
                <img src="gloves.jpg" alt="Home Kit">
                <div class="product-title">Adidas Goalkeeper gloves for 24/25</div>
                <div class="product-price">$30.00</div>
                <input type="hidden" name="product_name" value="Adidas Goalkeeper gloves for 24/25">
                <input type="hidden" name="product_price" value="30.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>
        </form>
        
        <form action="process_cart.php" method="POST">

            <div class="product-item">
                <img src="sockstwo.webp" alt="Home Kit">
                <div class="product-title">Black Socks from Adidas for 24/25 season</div>
                <div class="product-price">$50.00</div>
                <input type="hidden" name="product_name" value="Black Socks from Adidas for 24/25 season">
                <input type="hidden" name="product_price" value="50.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>
        </form>

        <form action="process_cart.php" method="POST">

            <div class="product-item">
                <img src="ballthree.jpg" alt="Home Kit">
                <div class="product-title">League Santander ball for  24/25 Season</div>
                <div class="product-price">$80.00</div>
                <input type="hidden" name="product_name" value="League Santander ball for  24/25 Season">
                <input type="hidden" name="product_price" value="80.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>
        </form>
        <form action="process_cart.php" method="POST">

            <div class="product-item">
                <img src="lightjacket.jpg" alt="Home Kit">
                <div class="product-title">Adidas New 2025 Jacket for Coaches</div>
                <div class="product-price">$140.00</div>
                <input type="hidden" name="product_name" value="Adidas New 2025 Jacket for Coaches">
                <input type="hidden" name="product_price" value="140.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>

        </form>
            
        <form action="process_cart.php" method="POST">
            <div class="product-item">
                <img src="mainkit.webp" alt="Home Kit">
                <div class="product-title">FC ALPHA Home Kit 24/25 Season</div>
                <div class="product-price">$240.00</div>
                <input type="hidden" name="product_name" value="FC ALPHA Home Kit 24/25 Season">
                <input type="hidden" name="product_price" value="240.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>
        </form>
        <form action="process_cart.php" method="POST">
            <div class="product-item">
                <img src="shortsfour.avif" alt="Home Kit">
                <div class="product-title">Home Kit Shorts for 24/25 Season</div>
                <div class="product-price">$140.00</div>
                <input type="hidden" name="product_name" value="Home Kit Shorts for 24/25 Season">
                <input type="hidden" name="product_price" value="140.00">
                <input type="number" name="quantity" value="1" min="1" style="top:-7px;position:relative;">
                <button type="submit" class="product-btn">Add to Cart</button>
            </div>
        </form>
        </div>
    </div>
        

    
  

    <footer class="footer ">
            <div class="footer-content ">
                <div class="footer-column ">
                    <h4>Football</h4>
                    <ul>
                        <li><a href="firstteam.php">First Team</a></li>
                        <li><a href="academy.php">Academy</a></li>
                        <li><a href="womenteam.php">Women's Team</a></li>
                    </ul>
                </div>
                <div class="footer-column ">
                    <h4>News</h4>
                    <ul>
                        <li><a href="news.php">Latest News</a></li>
                        <li><a href="nextevents.php">Next Events</a></li>
                        <li><a href="schedule.php">Schedules</a></li>
                       
                    </ul>
                </div>
                <div class="footer-column ">
                    <h4>The Club</h4>
                    <ul>
                       
                        <li><a href="history.php ">History</a></li>
                        <li><a href="fcalphacity.php">FC ALPHA City</a></li>
                        <li><a href="stadium.php">New Eagles Stadium</a></li>
                        <li><a href="honors.php">Honors</a></li>
                        <li><a href="fanclubs.php">Fan Clubs</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="foundation.php">Foundation</a></li>
                        <li><a href="4kpics.php">Best Pictures</a></li>
                    </ul>
                </div>
                <div class="footer-column ">
                    <h4>FC ALPHA</h4>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="tickets.php">Tickets</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="sponsors.php">Sponsors</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="matchdaytour.php">FCA Play</a></li>
                    </ul>
                </div>
            </div>
            <div class="social-links ">
                <a href="facebook.svg " aria-label="Facebook "><img src="facebook.svg "></a>
                <a href="x.svg " aria-label="Twitter "><img src="x.svg "></a>
                <a href="instagram.svg " aria-label="Instagram "><img src="instagram.svg "></a>
                <a href="youtube.svg " aria-label="fg "><img src="youtube.svg "></a>
                <a href="# " aria-label="LinkedIn "><img src="tiktok.svg "></a>
                <a href="snapchat.svg " aria-label="Snapchat "><img src="snapchat.svg "></a>
            </div>
        </footer>


    <section id="sponsors">
        <div class="sponsors-row">
            <img src="emirates.svg" alt="Emirates Logo">
            <img src="adidas.svg" alt="Adidas Logo">
            <img src="hp.svg" alt="HP Logo">
        </div>
        <div class="sponsors-row">
            <img src="mahou.svg" alt="Mahou Logo">
            <img src="dubai.svg" alt="Dubai Logo">
            <img src="bmw.svg" alt="BMW Logo">
            <img src="ea-sports.svg" alt="EA Sports Logo">
            <img src="abbot.svg" alt="Abbott Logo">
            <img src="nivea.svg" alt="Nivea Men Logo">
            <img src="cantabria.svg" alt="Cantabria Labs Logo">
            <img src="linglong.svg" alt="Linglong Tire Logo">
        </div>
        <div class="sponsors-row">
            <img src="easymarkets.svg" alt="Easy Markets Logo">
            <img src="adobe.svg" alt="Adobe Logo">
            <img src="zegna.svg" alt="Zegna Logo">
            <img src="palladium.svg" alt="Palladium Hotel Logo">
            <img src="daktronics.svg" alt="Daktronics Logo">
            <img src="cisco.svg" alt="Cisco Logo">
            <img src="softtek.svg" alt="Softtek Logo">
            <img src="canon.svg" alt="Canon Medical Logo">
        </div>
        <div class="sponsors-row">
            <img src="unicaja.svg" alt="Unicaja Logo">
            <img src="orange.svg" alt="Orange Logo">
            <img src="hisense.svg" alt="Hisense Logo">
            <img src="playstation.svg" alt="PlayStation Logo">
            <img src="codere.svg" alt="Codere Logo">
            <img src="sanitas.svg" alt="Sanitas Logo">
            <img src="cocacola.svg" alt="Coca Cola Logo">
            <img src="solan.svg" alt="Solan De Cabras Logo">
        </div>
    </section>


   
    <div class="copyright ">
            <p>FC ALPHA © 2025 All rights reserved</p>
            <p>
                <a href="sponsors.html ">SEE ALL SPONSORS</a> ·
                <a href="#legal ">Legal notice</a> ·
                <a href="#privacy ">Privacy Policy</a> ·
                <a href="#cookies ">Cookies Policy</a> ·
                <a href="#info ">Canal de información</a> ·
                <a href="https://www.realmadrid.com ">fcalpha.com</a>
            </p>
        </div>

        <!-- Back to Top Button -->
        <button class="back-to-top " id="backToTop ">↑ Top</button>

        <script>
            const backToTopButton = document.getElementById("backToTop ");

            // Show/hide the button based on scroll position
            window.addEventListener("scroll ", () => {
                if (window.scrollY > 300) {
                    backToTopButton.style.display = "block ";
                } else {
                    backToTopButton.style.display = "none ";
                }
            });

            // Scroll to the top when the button is clicked
            backToTopButton.addEventListener("click ", () => {
                window.scrollTo({
                    top: 0,
                    behavior: "smooth "
                });
            });
        </script>
        <script>
            const menuToggle = document.getElementById('menuToggle');
            const menuContent = document.getElementById('menuContent');
            const overlay = document.getElementById('overlay');

            menuToggle.addEventListener('click', () => {
                menuToggle.classList.toggle('active');
                menuContent.classList.toggle('active');
                overlay.classList.toggle('active');
            });

            overlay.addEventListener('click', () => {
                menuToggle.classList.remove('active');
                menuContent.classList.remove('active');
                overlay.classList.remove('active');
            });
        </script>




</body>

</html>

<?php $conn->close(); ?>