<?php
// Include the database connection file
require_once 'db.php'; 

// Start the session to access session variables
session_start();

// Check if the user is logged in (user_id should exist in session)
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
} else {
    // Proceed if the user is logged in
    $user_id = $_SESSION['user_id'];

    // Handle adding items to the cart
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_img = $_POST['product_img'];

        // Check if the product is already in the cart for this user
        $query = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
        $stmt = $conn->prepare($query); // Use $conn instead of $pdo
        $stmt->bind_param("ii", $user_id, $product_id); // Bind parameters for security
        $stmt->execute();
        $existing_item = $stmt->get_result()->fetch_assoc(); // Use get_result() and fetch_assoc() with mysqli

        if ($existing_item) {
            // If product already in cart, update quantity
            $new_quantity = $existing_item['quantity'] + 1;
            $update_query = "UPDATE cart SET quantity = ? WHERE id = ?";
            $update_stmt = $conn->prepare($update_query); // Use $conn instead of $pdo
            $update_stmt->bind_param("ii", $new_quantity, $existing_item['id']); // Bind parameters
            $update_stmt->execute();
        } else {
            // If product not in cart, add a new row
            $insert_query = "INSERT INTO cart (user_id, product_id, product_name, product_price, product_img, quantity) VALUES (?, ?, ?, ?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_query); // Use $conn instead of $pdo
            $insert_stmt->bind_param("iissdi", $user_id, $product_id, $product_name, $product_price, $product_img, 1); // Bind parameters
            $insert_stmt->execute();
        }

        // Return the number of items in the cart
        $cart_count_query = "SELECT SUM(quantity) FROM cart WHERE user_id = ?";
        $cart_count_stmt = $conn->prepare($cart_count_query); // Use $conn instead of $pdo
        $cart_count_stmt->bind_param("i", $user_id); // Bind parameters
        $cart_count_stmt->execute();
        $cart_count_stmt->bind_result($cart_count); // Get the result
        $cart_count_stmt->fetch();

        echo json_encode(['success' => true, 'cartCount' => $cart_count]);
        exit();
    }

    // Fetch cart items for this user
    $query = "SELECT * FROM cart WHERE user_id = ?";
    $stmt = $conn->prepare($query); // Use $conn instead of $pdo
    $stmt->bind_param("i", $user_id); // Bind parameters
    $stmt->execute();
    $result = $stmt->get_result();
    $cart_items = $result->fetch_all(MYSQLI_ASSOC);

    // Calculate the cart total
    $cart_total = 0;
    foreach ($cart_items as $item) {
        $cart_total += $item['product_price'] * $item['quantity'];
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="shortcut icon" href="https://img.lovepik.com/free-png/20210926/lovepik-shopping-cart-icon-png-image_401486831_wh1200.png" type="image/x-icon">
    <link
        href="https://fonts.googleapis.com/css2?family=Fuggles&family=Mooli&family=Oswald:wght@600&family=Roboto:wght@100;300&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"
        defer></script>
    <link rel="stylesheet" href="../Css-files/scroll-top-button.css">
    <link rel="stylesheet" href="../Css-files/content.css">
    <link rel="stylesheet" href="../Css-files/cart.css">
    <link rel="stylesheet" href="../Css-files/navbar.css">
    <link rel="stylesheet" href="../Css-files/footer.css">
    <style>
        .legal-pages {
            text-decoration: none;
            color: white;
        }
        .legal-pages:hover {
            color:rgb(255, 255, 255);
            text-shadow: #FC0 1px 0 6px;
            text-decoration: none;
        }
        .cart-item {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    position: relative; /* for the remove button positioning */
}

.cart-item img {
    margin-right: 15px; /* space between image and details */
}

.detail {
    display: flex;
    flex-direction: row;
    justify-content: inherit;
}

.quantity-wrapper {
    display: flex;
    align-items: center;
}

.btn {
    cursor: pointer;
    margin: 0 5px;
    position: relative;
    top:-6px;

}

.price {
    margin-top: 5px;
}

.remove {
    cursor: pointer;
    font-weight: bold;
    background-color: red;
    color:white;
}
.name{
    width: 81px;
  overflow: hidden;
}

    </style>
    <style>
       #progressBar {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 8px;
            background-color: #e21f1f;
            z-index: 9999;
        } 
        .card {
    position: relative;
    overflow: hidden;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out, background-color 0.3s ease-in-out;
    background-color: white;
    color: black;
    z-index: 0;
}

.card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #4ba2ff 50%, #ffd146 50%);
    transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
    transform: translate(-100%, -100%);
    opacity: 0;
    z-index: -1;
}

.card:hover::before {
    transform: translate(0, 0);
    opacity: 1;
    color:black;
}


.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    
}

.card .form-label, .card .form-select, .card #info-checkout, .card p {
    position: relative;
    z-index: 1;
}

.form-select {
    background-color: #f8f9fa;
    border: 1px solid #ced4da;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    border-radius: 0.25rem;
    transition: all 0.3s ease-in-out;
}

.form-select:focus {
    border-color: #80bdff;
    outline: none;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

#info-checkout {
    padding: 10px;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    background-color: #f8f9fa;
    transition: all 0.3s ease-in-out;
    color: black;  
}

.card p {
    color: black; 
}

.card:hover p, .card:hover #info-checkout {
    color: rgb(0, 0, 0);
}


#preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #f6f5f5; 
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999; 
}

#preloader-video {
    width: 200%; 
    height: auto; 
    max-width: 600px; 
}


@media (max-width: 780px) {
   
#preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 48%;
    height: 48%;
    background: #f6f5f5; 
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999; 
}
#preloader-video {
    width: 100%; 
    height: auto; 
    max-width: 600px; 
}
}

.circle {
      position: absolute;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      pointer-events: none;
      background: radial-gradient(circle, rgba(255, 0, 0, 0.466), rgba(255, 52, 52, 0.5));
      transition: transform 0.1s, left 0.1s, top 0.1s;
      box-shadow: 0 0 20px #faff64,
        0 0 60px #f52323,
        0 0 100px #ff0000;
        animation: colors 1s infinite;
  transform: translate(-50%, -50%);
    }

    .circle-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 9999;
    }

    @media (max-width: 724px) {
      .circle-container{
        display: none;
      }
    }

    </style>
  



</head>

<body>

    <div class="circle-container">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
      </div>
      <script>
        document.addEventListener("DOMContentLoaded", function () {
          const coords = { x: 0, y: 0 };
          const circles = document.querySelectorAll(".circle");
    
          circles.forEach(function (circle) {
            circle.x = 0;
            circle.y = 0;
          });
    
          window.addEventListener("mousemove", function (e) {
            coords.x = e.pageX;
            coords.y = e.pageY - window.scrollY; // Adjust for vertical scroll position
          });
    
          function animateCircles() {
            let x = coords.x;
            let y = coords.y;
    
            circles.forEach(function (circle, index) {
              circle.style.left = `${x - 12}px`;
              circle.style.top = `${y - 12}px`;
              circle.style.transform = `scale(${(circles.length - index) / circles.length})`;
    
              const nextCircle = circles[index + 1] || circles[0];
              circle.x = x;
              circle.y = y;
    
              x += (nextCircle.x - x) * 0.25;
              y += (nextCircle.y - y) * 0.25;
            });
    
            requestAnimationFrame(animateCircles);
          }
    
          animateCircles();
        });
      </script>

        <!-- Progress bar -->
        <div id="progressBar"></div>
        <script>
            window.onscroll = function () {
                var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                var scrolled = (winScroll / height) * 100;
                document.getElementById("progressBar").style.width = scrolled + "%";
            };
        </script>
        <!-- end -->
    <div class="coupen">
        <marquee behavior="" direction="left" class="coupen-inner"></marquee>
    </div>
    <div class="head_container">
        <header>
            <nav class="navbar navbar-expand-lg fixed-top">
                <div class="container-fluid">
                    <a href="../index.html" class="navbar-brand opacity-75 flex-fill">
                        <img src="../Images/logo/Foodielogo.png" height="40">
                    </a>
                    <button class="navbar-toggler order-1" type="button" data-bs-toggle="collapse" data-bs-target=".hamburgeritems"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse hamburgeritems centerdiv order-2 order-lg-0">
                        <ul class="navbar-nav center-links">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="../index.html"><i class="fa-solid fa-house"></i> Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Html-files/menu.html"><i class="fa-solid fa-bars"></i> Menu</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link services" href="../Html-files/services.html" aria-expanded="false"><i class="fa-solid fa-gear"></i> Services</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Ordering options</a></li>
                                    <li><a class="dropdown-item" href="#">Order Tracking</a></li>
                                    <li><a class="dropdown-item" href="#">Customer Support</a></li>
                                    <li><a class="dropdown-item" href="#">FAQS</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Html-files/contact.html"><i class="fa-solid fa-phone"></i> Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Html-files/offers.html"><i class="fa-solid fa-tag"></i> Offers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="RateUs.html">
                                    <i class="fa-solid fa-star"></i> Rate Us
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="order-0 ml-auto p-2">
                        <img class="nav-link" src="../Images/navbar/sun2.png" id="theme-toggle-icon" alt="theme toggler button">
                    </div>
                    <div class="collapse navbar-collapse hamburgeritems enddiv order-3 ">
    <ul class="navbar-nav end-links">
        <?php if ($is_logged_in): ?>
            <!-- Display Username and Logout link -->
            <li class="nav-item">
                <a class="nav-link" href="profile.php" style="color: black;">
                    <i class="fa-solid fa-user"></i> <?php echo htmlspecialchars($_SESSION['username']); ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php" style="color: black;">
                    <i class="fa-solid fa-sign-out-alt"></i> Logout
                </a>
            </li>
        <?php else: ?>
            <!-- Show Login and Sign-Up links if not logged in -->
            <li class="nav-item">
                <a class="nav-link" href="login.php" style="color: black;">
                    <i class="fa-solid fa-sign-in"></i> Login
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signup.php" style="color: black;">
                    <i class="fa-solid fa-user"></i> Sign-Up
                </a>
            </li>
        <?php endif; ?>
        
        <!-- Cart link remains the same -->
        <li class="nav-item">
            <a class="nav-link" href="cart.php" style="color: black;">
                Cart <i class="fa-solid fa-cart-shopping"></i>
            </a>
        </li>
    </ul>
</div>

                </div>
            </nav>
        </header>
        <div class="mainhead">
            <h1>C A R T</h1>
        </div>
    </div>

    <section class="cart-section">
    <div id="couponCode">
        <p>Use coupon code <b>qN6FVAn4</b> for 30% off!</p>
    </div>

    <div class="cart">
        <div class="cart-details">
        <h1>Your Cart</h1>
    <div id="cart-items">
        <?php if (count($cart_items) > 0): ?>
            <?php foreach ($cart_items as $item): ?>
                <div class="cart-item">
                    <img src="<?php echo $item['product_img']; ?>" alt="<?php echo $item['product_name']; ?>" width="80">
                    <div>
                        <div><?php echo $item['product_name']; ?></div>
                        <div>
                            <button class="decrease-btn" onclick="changeQuantity(<?php echo $item['product_id']; ?>, -1)">-</button>
                            <span class="quantity"><?php echo $item['quantity']; ?></span>
                            <button class="increase-btn" onclick="changeQuantity(<?php echo $item['product_id']; ?>, 1)">+</button>
                        </div>
                        <div>₹<?php echo $item['product_price'] * $item['quantity']; ?></div>
                        <button class="remove-btn" onclick="removeFromCart(<?php echo $item['product_id']; ?>)">Remove</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>

    <div id="cart-total">
        <p><strong>Total: ₹<?php echo $cart_total; ?></strong></p>
    </div>
        </div>
    </div>


    <script>
        function changeQuantity(productId, change) {
            const formData = new FormData();
            formData.append('product_id', productId);
            formData.append('change', change);
            formData.append('update_quantity', true);

            fetch('cart.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update cart icon or other UI elements with new cart count
                    console.log('Cart updated:', data.cartCount);
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function removeFromCart(productId) {
            const formData = new FormData();
            formData.append('product_id', productId);
            formData.append('remove', true);

            fetch('cart.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update cart UI after item removal
                    console.log('Item removed');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
    <!-- Checkout -->
    <div class="row" style="margin-top: 40px;">
        <div class="col-md-7">
            <center><a href="menu.html"><button class="btn btn-outline-primary mt-3">Continue Shopping</button></a></center>
        </div>
        <div class="col-md-5">
            <div class="card mb-4 p-3 shadow-sm">
                <label for="checkoutType" class="form-label">Type of Checkout</label>
                <select id="checkoutType" class="form-select" onchange="optionSelect()">
                    <option value="select" selected>-- select --</option>
                    <option value="orderOnline">Order Online</option>
                    <option value="takeoutOrder">Takeout Order</option>
                </select>
                <div id="info-checkout" class="mt-3"></div>
            </div>
            <h2 class="playfair">Payment Info</h2>
            <div class="card mt-4 p-3">
                <div class="mb-3">
                    <label class="form-label">Payment Method</label>
                    <div class="d-flex align-items-center">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" checked>
                            <label class="form-check-label" for="creditCard">Credit Card</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="paypal">
                            <label class="form-check-label" for="paypal">PayPal</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nameOnCard" class="form-label">Name on Card</label>
                    <input type="text" class="form-control shadow-sm" id="nameOnCard" placeholder="Name on Card">
                </div>
                <div class="mb-3">
                    <label for="cardNumber" class="form-label">Card Number</label>
                    <input type="text" class="form-control shadow-sm" id="cardNumber" placeholder="Card Number" maxlength="16">
                </div>
                <div class="d-flex">
                    <div class="me-3 w-50">
                        <label for="expirationDate" class="form-label">Expiration Date</label>
                        <input type="text" class="form-control shadow-sm" id="expirationDate" placeholder="MM/YY">
                    </div>
                    <div class="w-50">
                        <label for="cvv" class="form-label">CVV</label>
                        <input type="text" class="form-control shadow-sm" id="cvv" placeholder="CVV" maxlength="4">
                    </div>
                </div>
                <button class="btn btn-primary w-100 mt-3 shadow-sm checkout-btn">Check Out</button>
            </div>
        </div>
    </div>
</section>

   
<script>
    function changeQuantity(productId, change) {
        const formData = new FormData();
        formData.append('product_id', productId);
        formData.append('change', change);
        formData.append('update_quantity', true);

        fetch('cart.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update UI for cart
                updateCartDisplay(data.cartItems);
            }
        })
        .catch(error => console.error("Error updating cart quantity:", error));
    }

    function removeFromCart(productId) {
        const formData = new FormData();
        formData.append('product_id', productId);
        formData.append('remove', true);

        fetch('cart.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update UI for cart
                updateCartDisplay(data.cartItems);
            }
        })
        .catch(error => console.error("Error removing item from cart:", error));
    }

    function updateCartDisplay(cartItems) {
        // Update the cart items and total dynamically
        const cartItemsDiv = document.getElementById('cart-items');
        const cartTotalDiv = document.getElementById('cart-total');

        cartItemsDiv.innerHTML = ''; // Clear the current cart items
        let cartTotal = 0;
        
        cartItems.forEach(item => {
            cartItemsDiv.innerHTML += `
                <div class="cart-item" id="cart-item-${item.id}">
                    <img src="${item.image}" alt="${item.name}" width="80">
                    <div class="detail">
                        <div class="name">${item.name}</div>
                        <div class="quantity-wrapper">
                            <button class="btn decrease-btn" onclick="changeQuantity(${item.id}, -1)">-</button>
                            <span class="quantity">${item.quantity}</span>
                            <button class="btn increase-btn" onclick="changeQuantity(${item.id}, 1)">+</button>
                        </div>
                        <div class="price">₹${item.price * item.quantity}</div>
                        <button class="remove" onclick="removeFromCart(${item.id})">Remove</button>
                    </div>
                </div>
            `;
            cartTotal += item.price * item.quantity;
        });

        cartTotalDiv.innerHTML = `<p><strong>Total: ₹${cartTotal}</strong></p>`;
    }
</script>
<script>
    function optionSelect() {
        const infoCheckout = document.getElementById('info-checkout');
        const selectedOption = document.getElementById('checkoutType').value;
        
        if (selectedOption === 'orderOnline') {
            infoCheckout.innerHTML = `
                <p>Order online and get it delivered to your doorstep.</p>
                <p><strong>Estimated delivery time:</strong> 30-45 minutes</p>
            `;
        } else if (selectedOption === 'takeoutOrder') {
            infoCheckout.innerHTML = `
                <p>Order now and pick it up at your convenience.</p>
                <p><strong>Estimated pickup time:</strong> 15-20 minutes</p>
            `;
        } else {
            infoCheckout.innerHTML = '';
        }
    }
</script>


<footer>
    <div class="foot-panel1 w-100">
        <div class="container-fluid py-5 px-0">
            <div class="row justify-content-evenly gy-5">
                <div class="col-6 col-sm-3 col-md-2 col-xl-2">
                    <h5 class="mb-3">See Also</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Html-files/menu.html">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Html-files/services.html">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Html-files/contact.html">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Html-files/cart.html">Cart</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-sm-5 col-md-3 col-xl-3">
                    <h5 class="mb-3">Exclusive Offers</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Foodie Discounts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Limited-Time Promotions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Special Event Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Membership Benefits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Early Access to New Recipes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">VIP Foodie Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Personalized Culinary Experiences</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-sm-4 col-md-4 col-xl-3">
                    <h5 class="mb-3">Payment Products</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="" class="nav-link">Secure Checkout</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Credit/Debit Cards</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Secure Checkout</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Online Payment</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Mobile Wallets</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Contactless Payments</a>
                        </li>
                    </ul>
                </div>


                <div class="col-6 col-md-3 col-xl-4">
                    <form id="contactForm" action="https://formsubmit.co/xyz@gmail.com" method="POST">
                        <h3 class="text-center mb-3">Contact Us!</h3>
                        <input type="email" id="footer-email" name="email" placeholder="Your Email"
                            class="text-center form-control mb-2" required>
                        <textarea id="footer-message" name="footer-message" placeholder="Your Message"
                            class="text-center form-control mb-2" required></textarea>
                        <div class="d-grid gap-2 col-12">
                            <button type="submit" class="btn btn-danger">Send Message</button>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>
    

    <div class="foot-panel2">
        <div class="media-handles pt-3 pb-2">
            <h4>Follow Us</h4>
            <div class="social-icons">
                <a class="fa-brands fa-facebook" href="https://facebook.com" target="_blank"></a>
                <a class="fa-brands fa-instagram" href="https://instagram.com" target="_blank"></a>
                <a class="fa-brands fa-x-twitter" href="https://twitter.com" target="_blank"></a>
                <a class="fa-brands fa-linkedin" href="https://linkedin.com" target="_blank"></a>
                <a class="fa-brands fa-github" href="https://github.com/khushi-joshi-05/Food-ordering-website"
                    target="_blank"></a>
                <a class="fa-brands fa-discord" href="https://discord.com/invite/sybYafYA" target="_blank"></a>
            </div>
            <p class="text"> Stay connected with us on social media for the latest updates, recipes, and foodie
                adventures. </p>
             <div >
                    Give your valuable 
                            <Link to="" >
                                <a  href="/Html-files/feedback.html"><b>feedback!</b></a>
                            </Link>
                    </div>
        </div>
        <div class="copyright py-1">
            &copy;
            <span id="copyright-year"></span> Foodies - All Rights Reserved |
            <span id="terms"></span>
            <Link to="" >
                <a href="/Html-files/terms.html" class="legal-pages">Terms and Conditions</a> |
            </Link>
            <span id="privacy"></span>
            <Link to="" >
                <a href="/Html-files/privacy.html" class="legal-pages">Privacy Policy</a> |
            </Link>
            <span id="author">
                <a href="https://www.linkedin.com/in/khushi-joshi-95a587256/" target="_blank" class="legal-pages">Khushi Joshi</a>
            </span>
        </div>
    </div>
</footer>

<button id="scroll-top-button" class="scroll-top-button" onclick="goToTop()">
    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="white"
        class="arrow">
        <path d="M440-160v-487L216-423l-56-57 320-320 320 320-56 57-224-224v487h-80Z" />
    </svg>
</button>


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="Html-files/top.js"></script>
<script src="script.js"></script>
<script src="Html-files/navbar.js"></script>
<script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
<script>
    AOS.init(
        {
            duration: 1000,
            easing: 'ease',
            once: false,
        }
    );

    // Chatbot
    window.botpressWebChat.init({
        "composerPlaceholder": "Message...",
        "botConversationDescription": "Welcome to Foodie!",
        "botId": "2093cb3a-9343-4dec-a60f-2f69a5948cac",
        "hostUrl": "https://cdn.botpress.cloud/webchat/v1",
        "messagingUrl": "https://messaging.botpress.cloud",
        "clientId": "2093cb3a-9343-4dec-a60f-2f69a5948cac",
        "webhookId": "7bd6ccb8-58f4-4ee3-9bca-f33ea4b7c37c",
        "lazySocket": true,
        "themeName": "prism",
        "botName": "Foodie",
        "stylesheet": "https://webchat-styler-css.botpress.app/prod/code/da4ab5f7-146c-4585-961b-2d9def26af50/v96339/style.css",
        "frontendVersion": "v1",
        "useSessionStorage": true,
        "enableConversationDeletion": true,
        "theme": "prism",
        "themeColor": "#2563eb",
        "allowedOrigins": []
    });
</script>
        <script>document.getElementById("copyright-year").textContent = new Date().getFullYear();</script>
        <script src="navbar.js"></script>
        <script src="../carts.js"></script>
        <script src="cart.js"></script>
        <script src="top.js"></script>


        <div id="preloader">
            <video autoplay muted loop id="preloader-video">
                <source src="/preloader.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <script>
           window.addEventListener('load', function() {
        const video = document.getElementById('preloader-video');
        video.playbackRate = 1; 
    
        setTimeout(function() {
            const preloader = document.getElementById('preloader');
            preloader.style.opacity = '0'; 
            setTimeout(function() {
                preloader.style.display = 'none'; 
            }, 500); 
        }, 3000); 
    });
    
        </script>
</body>

</html>
