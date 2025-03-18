<?php
session_start();  // Start the session

// Check if the user is logged in
$is_logged_in = isset($_SESSION['username']); // True if the user is logged in
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- Adding favicon image -->
    <link rel="shortcut icon" href="Images/favicon/Foodie_Favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Fuggles&family=Mooli&family=Oswald:wght@600&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"
        defer></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>    

    <link rel="stylesheet" href="Css-files/scroll-top-button.css">
    <link rel="stylesheet" href="Css-files/navbar.css">
    <link rel="stylesheet" href="Css-files/footer.css">

    <link rel="stylesheet" href="Css-files/mode-toggler.css">
    <link rel="stylesheet" href="./style.css">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="Css-files/googletranslate.css">
    <!-- Sun Icon -->


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
        #progressBar {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 8px;
            background-color: #b80d0d;
            z-index: 9999;
        }
        .home-ali {
    text-align: center;
    background-color: #f0f0f0;
    padding: 20px; 
    align-items: center;
 
    @media (max-width: 768px) {
        .card-home img {
            width: -webkit-fill-available;
        }
        
    }
}

.typing-effect {
            display: inline-block;
            white-space: nowrap;
            overflow: hidden;
        }
.highlight-text{
    color:#D0EEB0;
}

.service-icon{
    height:15% !important;
    width: 15% !important;
    opacity: 1 !important;
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

    <!-- <div class="circle-container">
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
      </script> -->

    <div class="visitor-counter">
        <div>Visitors</div>
        <div class="website-counter"></div>
      </div>
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
    <!-- <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div> -->

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


<!--     <div id="caduceus-container">

        <div class="rope"></div>
        <img id="caduceus" src="Images/image.png" alt="Caduceus">
      </div> -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <!-- Brand Logo -->

            
            <a href="index.html">
                <img id="theme-toggle-logo" 
                style="height: 50px; width: 50px;"
                src="Images/logo/Logo-Light.png"  alt="Brand Logo">
            </a>

            <!-- Centered Navbar Links -->
            <div 
            style=" margin-left: 20vw;"
            class="collapse navbar-collapse hamburgeritems centerdiv order-2 order-lg-0">
                <ul class="navbar-nav center-links">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php" style="color: black;">


                            <i class="fa-solid fa-house"></i> Home

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php" style="color: black;">

                            <i class="fa-solid fa-bars"></i> Menu
                        </a>
                    </li>
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="Html-files/services.html" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
                            <i class="fa-solid fa-gear"></i> Services
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-check" ></i> Ordering options</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-truck"></i> Order Tracking</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-headset"></i> Customer Support</a></li>
                            <li><a class="dropdown-item" href="#FAQ"><i class="fa-solid fa-question"></i> FAQS</a></li>
                        </ul>
                    </li>

                    <!-- <li class="nav-item, nav-items">
                        <a class="nav-link" href="Html-files/contact.html"><i class="fa-solid fa-phone"></i>Contact Us</a>

                        

                    </li> -->

                   
                    <li class="nav-item">

                        <a class="nav-link" href="Html-files/contact.html" style="color: black;">
                            <i class="fa-solid fa-phone"></i> Contact Us 
                        </a>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link" href="#" style="color: black;">
                            <i class="fa-solid fa-question"></i> FAQ 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Html-files/offers.html" style="color: black;">

                            <i class="fa-solid fa-tag"></i> Offers

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="Html-files/RateUs.html" style="color: black;">
                            <i class="fa-solid fa-star"></i> Rate Us
                        </a>
                    </li>
                    
                    

                </ul>
            </div>
            
            <span class="slider" style="width: 40px; height: 20px; display: none;"></span> 

                        
            <!-- Navbar Toggler -->
    
            <div class="mobile-menu ">
                <div class="mobile-menu__trigger"><span></span></div>
                <a class="page-scroll" href="index.html">
                    <i class="fa-solid fa-house"></i> 
                    Home
                </a>
                <a class="page-scroll" href="Html-files/menu.html">
                    <i class="fa-solid fa-bars"></i> Menu
                </a>
                <a class="page-scroll" href="Html-files/services.html">
                    <i class="fa-solid fa-gear"></i> Services
                </a>
                <a class="page-scroll active-link" href="Html-files/login.html">
                    <i class="fa-solid fa-phone"></i> Contact Us
                </a>
                <a class="page-scroll active-link" href="Html-files/login.html">
                    <i class="fa-solid fa-question"></i> FAQ
                </a>
                <a class="page-scroll active-link" href="Html-files/login.html">
                    <i class="fa-solid fa-tag"></i> Offers
                </a>
                <a class="page-scroll active-link" href="Html-files/login.html">
                    <i class="fa-solid fa-star"></i> Rate Us
                </a>
                <a class="page-scroll active-link" href="login.php">
                    <i class="fa-solid fa-sign-in"></i> Login
                </a>
                <a class="page-scroll" href="signup.php">
                    <i class="fa-solid fa-user"></i> Sign-Up
                </a>
                <a class="page-scroll" href="Html-files/cart.html">
                    Cart <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>

            <!-- End Navbar Links -->


            <div class="collapse navbar-collapse hamburgeritems enddiv order-3">
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
                <li class="nav-item">
                    <a class="nav-link" href="cart.php" style="color: black;">
                        Cart <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </li>
            </ul>
        </div>
        </div>
        <!-- Theme Toggle Icon -->
        <div id="sun-moon-mode-toggler" class="toggle-container" >
            <input type="checkbox" id="themeToggle" class="switch-checkbox" onclick="toggleTheme()">
            <label  id="themeChangeToggle" class="theme-switch" for="themeToggle">
            <div class="toggle-button">
            </div>
            </label>
          </div>
    </nav>


    

    <section id="homeSlider" class="carousel slide carousel-fade bg-black" data-bs-ride="carousel" data-bs-interval="5000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-bs-target="#homeSlider" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#homeSlider" data-bs-slide-to="1"></li>
            <li data-bs-target="#homeSlider" data-bs-slide-to="2"></li>
        </ol>
        <!-- Indicators-->

        <!-- Carousel Slides-->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="slider-bg d-flex justify-content-center">
                    <img src="./Images/homeSliderImages/home-slider-1.jpg" class="homeimg">
                </div>
                <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                    <p class="slider-subtitle slider-reveal">TRADITIONAL & HYGIENIC</p>
                    <h1 class="slider-title slider-reveal">
                        For the love of <br> delicious food
                    </h1>
                    <p class="slider-text slider-reveal">
                        come with family & feel the joy of mouthwatering food
                    </p>
                    <a href="menu.php" class="btn btn-danger slider-button slider-reveal mx-auto" role="button">
                        <span class="text text-1">VIEW OUR MENU</span>
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <div class="slider-bg d-flex justify-content-center">
                    <img src="Images/homeSliderImages/home-slider-2.jpg" class="homeimg">
                </div>
                <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                    <p class="slider-subtitle slider-reveal">DELIGHTFUL EXPERIENCE</p>
                    <h1 class="slider-title slider-reveal">
                        Flavors Inspired by <br> the Seasons
                    </h1>
                    <p class="slider-text slider-reveal">
                        come with family & feel the joy of mouthwatering food
                    </p>
                    <a href="Html-files/menu.html" class="btn btn-danger slider-button slider-reveal mx-auto" role="button">
                        VIEW OUR MENU
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <div class="slider-bg d-flex justify-content-center">
                    <img src="Images/homeSliderImages/home-slider-3.jpg" class="homeimg">
                </div>
                <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                    <p class="slider-subtitle slider-reveal">AMAZING & DELICIOUS</p>
                    <h1 class="slider-title slider-reveal">
                        Where every flavour <br> tells a story
                    </h1>
                    <p class="slider-text slider-reveal">
                        come with family & feel the joy of mouthwatering food
                    </p>
                    <a href="Html-files/menu.html" class="btn btn-danger slider-button slider-reveal mx-auto" role="button">
                        VIEW OUR MENU
                    </a>
                </div>
            </div>
        </div>
        <!-- Carousel Slides-->

        <!-- Carousel Controls-->
        <button class="carousel-control-prev" type="button" data-bs-target="#homeSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homeSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <!-- Carousel Controls-->
    </section>


    <!-- Add some custom CSS for transitions and responsiveness -->
    <style>
        .slider-bg {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }
        
        .homeimg {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .carousel-caption {
            text-align: center;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
        }
        
        .slider-reveal {
            animation: fadeInUp 1.5s ease-in-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 40px, 0);
            }
            to {
                opacity: 1;
                transform: none;
            }
        }
        
        @media (max-width: 768px) {
            .slider-title {
                font-size: 1.5rem;
            }
            .slider-subtitle,
            .slider-text {
                font-size: 1rem;
            }
            .carousel-caption {
                padding-bottom: 3rem;
            }
        }
        
    </style>


    <br>
    <br>
    <br>

<!--     <button class="fixed-button" onclick="openNutrition()">Nutrition Tips</button>
    <script>
        function openNutrition() {
            window.open('Html-files/nutrition.html', '_blank');
        }
    </script> -->
     <style>
        
        .fixed-button {
            position: fixed;
            margin-bottom: 25px;
            margin-right: 100px;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            font-size: 16px;
            background-color: #CF2123;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            z-index: 1000; 
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            font-size: 12px; 
            line-height: 1;
            animation: bounce 1s infinite;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-20px);
            }
            60% {
                transform: translateY(-10px);
            }
        }

        .fixed-button:hover {
            background: linear-gradient(45deg, rgb(234, 16, 16), #f2a736);
        }

        
        .content {
            height: 2000px;
            background: linear-gradient(white, lightgray);
            background: var(--background-color);
            
        }
    </style>

    <section class="about_us pt-5">
        <div class="hstack discount-rolling">
            <h1 class="poppins-light pe-5 ps-1 py-1">Get <span> 30% OFF </span> on your first order!</h1>
            <h1 class="poppins-light pe-5 ps-1 py-1">Get <span> 30% OFF </span> on your first order!</h1>
            <h1 class="poppins-light pe-5 ps-1 py-1">Get <span> 30% OFF </span> on your first order!</h1>
            <h1 class="poppins-light pe-5 ps-1 py-1">Get <span> 30% OFF </span> on your first order!</h1>
            <h1 class="poppins-light pe-5 ps-1 py-1">Get <span> 30% OFF </span> on your first order!</h1>
        </div>

        <br>
        <br>
        <br>

        <h1 class="tagline py-2 text-center mx-auto" data-aos="zoom-out-up" data-aos-offset="170" data-aos-easing="ease-in-out">"Savor the Flavors: Discover What Sets Our Restaurant's Cuisine Apart!"</h1>

        <!-- cards  -->
        <style>
            .card-1 {
                position: relative;
                width: 400px;
                height: 500px;
                border-radius: 15px;
                overflow: hidden;
                filter: drop-shadow(10px 10px 20px rgba(0, 0, 0, 0.25));
                background-repeat: no-repeat;
                background-size: cover;
            }
            
            .card-1::after {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, rgba(0, 0, 0, 0.408) 62.83%, rgba(0, 0, 0, 0.8) 99.99%);
                background-blend-mode: darken, normal;
            }
            
            .card-1>.content {
                color: var(--text-color);
                position: absolute;
                top: 550px;
                padding: 10px;
                border-radius: 10px;
                left: 4.77%;
                right: 4.77%;
                z-index: 2;
                transition: top 450ms ease-out;
            }
            
            .card-1>h2 {
                margin-top: 180px;
                font-size: 2rem !important;
                mix-blend-mode: luminosity;
                color: white;
                border-radius: 5px;
                backdrop-filter: blur(2px);
                z-index: 100;
                text-shadow: 2px 2px #6d1002;
            }
            
            .card-1>.content>p {
                margin-bottom: .7rem;
            }
            .card-text{
                color:black;
            }
           
            .card-1:hover>.content {
                top: 260px;
                backdrop-filter: blur(4px);
            }
            
            .card-title{
                color:#f0f0f0;
            }
            .btn {
                border: none;
                padding: .7em 1.8em;
                font-weight: 600;
                border-radius: 2px;
                cursor: pointer;
                font-size: .8rem;
                background-color: rgb(68, 67, 67);
            }
            
            .btn-card {
                background: #D0EEB0;
                transition: background 200ms ease;
            }
            
            .btn-card:hover {
                background: #59a10cc9;
            }
            .free_delivery{
                display: flex;
                justify-content: center;
                align-items: center;

            }
            .best_discount{
                display: flex;
                justify-content: center;
                align-items: center;
            }


            .dark-theme .faq-section{
                background-color: black;
            }


        </style>

        <div class="qualities row justify-content-evenly g-3 px-2" data-aos="zoom-out" data-aos-duration="1000" data-aos-offset="170" data-aos-easing="ease-in-out">


            <div class="card-1" style="background-image: url(https://shahidining.com.au/wp-content/uploads/2020/05/secret-to-indian-flavour-1536x864.jpg);">
                <h2 class="card-title" style="color: rgba(255, 255, 255, 1.0);">Authentic Indian Flavors</h2>
                <div class="content">

                    <p class="card-text">From aromatic curries to flavorful biryanis, our menu showcases the diversity and deliciousness of Indian cuisine.</p>
                    <button class="btn btn-card">Learn More</button>
                </div>
            </div>


            <div class="card-1" style="background-image: url(https://saavi.com.au/wp-content/uploads/2016/02/image0023-1.jpg);">
                <h2 class="card-title" style="color: rgba(255, 255, 255, 1.0);">Tech-Infused Dining Experience</h2>
                <div class="content">

                    <p class="card-text">Customers can use apps to place orders, customize their dishes, and even provide feedback, making their visit more convenient and interactive.
                    </p>
                    <button class="btn btn-card">Learn More</button>
                </div>
            </div>

            <div class="card-1" style="background-image: url(https://i.ndtvimg.com/i/2015-06/fusion-food_625x350_81434107799.jpg);">
                <h2 class="card-title" style="color: rgba(255, 255, 255, 1.0);">Innovative Fusion Dishes</h2>
                <div class="content">

                    <p class="card-text">The combinations of Indian and international cuisines not only tantalize taste buds but also provide unique experience.</p>
                    <button class="btn btn-card">Learn More</button>
                </div>
            </div>

            <!-- <div class="col-md-4">
                <div class="card rounded-5">
                    <div class="img-container">
                        <img src="https://shahidining.com.au/wp-content/uploads/2020/05/secret-to-indian-flavour-1536x864.jpg"
                            class="img-fluid mt-4 " alt="...">
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">Authentic Indian Flavors</h2>
                        <p class="card-text">From aromatic curries to flavorful biryanis, our menu showcases the
                            diversity and deliciousness of Indian cuisine.</p>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-md-4">
                <div class="card rounded-5">
                    <div class="img-container">
                        <img src="https://saavi.com.au/wp-content/uploads/2016/02/image0023-1.jpg"
                            class="img-fluid mt-4" alt="...">
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">Tech-Infused Dining Experience</h2>
                        <p class="card-text">Customers can use apps to place orders, customize their dishes, and even
                            provide feedback, making
                            their visit more convenient and interactive.
                        </p>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-md-4">
                <div class="card rounded-5">
                    <div class="img-container">
                        <img src="https://i.ndtvimg.com/i/2015-06/fusion-food_625x350_81434107799.jpg"
                            class="img-fluid mt-4" alt="...">
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">Innovative Fusion Dishes</h2>
                        <p class="card-text">The combinations of Indian and international cuisines not only tantalize
                            taste buds
                            but also provide unique experience.</p>
                    </div>
                </div>
            </div> -->
        </div>
    </section>


    <!-- cards  -->


    <section class="services_container">
        <div class="card">
            <div class="d-flex justify-content-center img-container">
                <img src="https://cdn.tasteatlas.com//images/toplistarticles/d0e6a0a79d5f4197a51f4ca065393ffe.jpg?mw=1300" alt="" class="card-img">
            </div>
            <div class="card-img-overlay row w-100 m-0">

                <div class="box_main m-auto col-md-9 col-xl-3" data-aos="zoom-out-right" data-aos-duration="1000"
                data-aos-offset="170" data-aos-easing="ease-in-out">
                <h1>
                    <span id="typing-text" class="typing-effect"></span>
                </h1>
                <p class="highlight-text">Food is more than sustenance; it's a source of pure happiness. From the first bite of a favorite
                    childhood dish to the thrill of discovering new flavors, food has a unique way of filling
                    our hearts with joy.</p>
            </div>
        <!-- typing effect  -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const text = "Bringing \nhappiness\n to you";
                    const typingText = document.getElementById('typing-text');
                    let index = 0;
        
                    function type() {
                        if (index < text.length) {
                            typingText.innerHTML += text[index] === '\n' ? '<br>' : text[index];
                            index++;
                            setTimeout(type, 100); // Adjust typing speed here
                        }
                    }
        
                    type();
                });
            </script>
                <div class="box my-auto col-md-4 col-xl-3" data-aos="zoom-out-left" data-aos-duration="1000"
                    data-aos-offset="170" data-aos-easing="ease-in-out">
                    <img src="./icons/motorbike.png" alt="" class="service-icon">
                    <h1>Online <br>Delivery</h1>
                    <a href="/Html-files/add-address.html" class="btn btn-outline-light border border-light">Order Online</a>
            </div>
                <div class="box my-auto col-md-4 col-xl-3" data-aos="zoom-out-left" data-aos-duration="1000"
                    data-aos-offset="170" data-aos-easing="ease-in-out">
                    <img src="./icons/take-away.png" alt="" class="service-icon">

                    <h1>Click & <br>Collect</h1>
                    <a href="/Html-files/cart.html" class="btn btn-outline-light border border-light">Take out Order</a>
                </div>

                <div class="box my-auto col-md-4 col-xl-3" data-aos="zoom-out-left" data-aos-duration="1000"
                    data-aos-offset="170" data-aos-easing="ease-in-out">
                    <img src="/icons/dining-table.png" alt="" class="service-icon">

                    <h1>Restaurant<br> Dining</h1>
                    <a href="/Html-files/book-table.html" class="btn btn-outline-light border border-light">Book Table </a>
                </div>
            </div>
        </div>
    </section>

    <section class="menu_container">
        <div class="mainhead text-center" data-aos="zoom-out-up" data-aos-duration="1000" data-aos-offset="170" data-aos-easing="ease-in-out">
            <h1>"Get ready to explore our delicious range of dishes!"</h1>
            <p>"Welcome to a world of culinary delights where every bite tells a flavorful story. Explore our diverse menu and savor the essence of exquisite dining." </p>
            <a class="btn btn-danger" href="Html-files/menu.html">View Menu</a>
        </div>

        <div class="menu_items row container-fluid g-3 p-5 mx-auto" data-aos="zoom-out-up" data-aos-duration="1000" data-aos-offset="170" data-aos-easing="ease-in-out">
            <div class="col-sm-6 col-lg-3">
                <div class="items card">
                    <div class="img-container ">
                        <img src="https://thumbs.dreamstime.com/b/indian-thali-combo-naan-17512700.jpg">
                    </div>
                    <div class="card-body">
                        <h3>Indian Thali</h3>
                        <p>Enjoy a thali full of traditional flavours and memories</p>
                        <a href="Html-files/menu.html"><button class="ordernow">Order Now</button></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="items card">
                    <div class="img-container">
                        <img src="https://imgmediagumlet.lbb.in/media/2018/04/5acf822418a23c0efc21496b_1523548708582.jpg?fm=webp&w=750&h=500&dpr=1">
                    </div>
                    <div class="card-body">
                        <h3>Dessert</h3>
                        <p>Complete your meal with mouth watering delicacies</p>
                        <a href="Html-files/menu.html"><button class="ordernow">Order Now</button></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="items card">
                    <div class="img-container">
                        <img src="https://imgmediagumlet.lbb.in/media/2019/07/5d27585dc18a2b0ed5739eb5_1562859613517.jpg?fm=webp&w=750&h=500&dpr=1">
                    </div>
                    <div class="card-body">
                        <h3>Snacks</h3>
                        <p>Have a lighter version with deliciouis flavours</p>
                        <a href="Html-files/menu.html"><button class="ordernow">Order Now</button></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="items card">
                    <div class="img-container">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaqAsoDyO5HBOSLupaimFGCkiE_zPbLYyYog&s">
                    </div>
                    <div class="card-body">
                        <h3>Juices</h3>
                        <p>Boost yourself up with fruit extracts and freshen up</p>
                        <a href="Html-files/menu.html"><button class="ordernow">Order Now</button></a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <br>
    
    <section class="testimonial-container" data-aos="zoom-in" data-aos-duration="1000" data-aos-offset="170" data-aos-easing="ease-in-out">
        <h2 class="tagline pt-5" style="color: #FFD700; font-size: 36px; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
            Our Happy Clients
        </h2>
        <p class="description" style="color: #FFFFFF; font-size: 20px; line-height: 1.6; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);">
            At Foodie, we pride ourselves on delivering delicious meals & exceptional service. Don't just take our word for it - hear what our satisfied customers have to say!
        </p>
        
        <div id="testimonials" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="img-box my-5">
                        <img src="Images/testimonials/client1.jpg" alt="">
                    </div>
                    <div class="carousel-caption">
                        <h3 class="overview">Matt Gilbert</h3>
                        <p class="testimonial-text">Foodie never disappoints! The food is always fresh, delicious, and delivered right on time. My go-to for all my meals!</p>
                        <div class="star-rating">
                            <ul class="list-inline d-flex justify-content-center">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="img-box my-5">
                        <img src="Images/testimonials/client2.jpg" alt="">
                    </div>
                    <div class="carousel-caption">
                        <h3 class="overview">John Doe</h3>
                        <p class="testimonial-text">I love the variety on Foodie! There's something for everyone, and the delivery service is incredibly reliable</p>
                        <div class="star-rating">
                            <ul class="list-inline d-flex justify-content-center">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="img-box my-5">
                        <img src="Images/testimonials/client3.jpg" alt="">
                    </div>
                    <div class="carousel-caption">
                        <h3 class="overview">Laren Green</h3>
                        <p class="testimonial-text">Fantastic service and mouth-watering dishes! Foodie has made my dining experience so much more convenient.</p>
                        <div class="star-rating">
                            <ul class="list-inline d-flex justify-content-center">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                                <li><i class="fa-regular fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel controls-->
            <button class="carousel-control-prev" data-bs-target="#testimonials" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" data-bs-target="#testimonials" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>



    <section class="picture-gallery" data-aos="fade-in" data-aos-duration="2000">
        <div class="row g-0">
            <div class="col-3">
                <img src="./Images/image-gallery/1.jpg" alt="">
            </div>
            <div class="col-3">
                <img src="./Images/image-gallery/2.jpg" alt="">
            </div>
            <div class="col-3">
                <img src="./Images/image-gallery/3.jpg" alt="">
            </div>
            <div class="col-3">
                <img src="./Images/image-gallery/4.jpg" alt="">
            </div>
        </div>
        <div class="row g-0">
            <div class="col-3">
                <img src="./Images/image-gallery/5.jpg" alt="">
            </div>
            <div class="col-3">
                <img src="./Images/image-gallery/6.jpg" alt="">
            </div>
            <div class="col-3">
                <img src="./Images/image-gallery/7.jpg" alt="">
            </div>
            <div class="col-3">
                <img src="./Images/image-gallery/8.jpg" alt="">
            </div>
        </div>
    </section>

    <section class="faq-section" id="FAQ">
        <div class="container faq-container">
            <h1 class="main-faq-head">Frequently Asked Questions !</h1>
            <div class="faq-item">
                <h2>How do I place an order?</h2>
                <p>To place an order, browse our menu, select the items you want, and add them to your cart. Once you're ready, click on the cart icon and proceed to checkout. Follow the instructions to complete your order.
                </p>
            </div>

            <div class="faq-item">
                <h2>What payment methods do you accept?</h2>
                <p>We accept various payment methods including credit/debit cards, net banking, and popular digital wallets. You can select your preferred payment method at the checkout page.</p>
            </div>

            <div class="faq-item">
                <h2>Can I schedule an order for later?</h2>
                <p>Yes, you can schedule an order for a later time. During checkout, select the delivery time that suits you best.</p>
            </div>

            <div class="faq-item">
                <h2>How can I track my order?</h2>
                <p>Once your order is confirmed, you will receive a tracking link via email or SMS. You can use this link to track the status of your delivery in real-time.</p>
            </div>

            <div class="faq-item">
                <h2>What should I do if I have a problem with my order?</h2>
                <p>If you encounter any issues with your order, please contact our customer support immediately. You can reach us via the contact form on our website, email, or phone. We’re here to help you!</p>
            </div>

            <div class="faq-item">
                <h2>Is there a minimum order value?</h2>
                <p>Yes, there is a minimum order value depending on your location. The minimum order amount will be displayed during the checkout process.</p>
            </div>

            <div class="faq-item">
                <h2>Do you offer any discounts or promotions?</h2>
                <p>We regularly offer discounts and promotions. Check our website or subscribe to our newsletter to stay updated on the latest deals and offers.</p>
            </div>

            <div class="faq-item">
                <h2>Can I place an order for pickup?</h2>
                <p>Yes, you can place an order for pickup. During checkout, select the pickup option and choose the time
                    that is most convenient for you. You will receive a notification when your order is ready for pickup.</p>
            </div>
            
            <div class="faq-item">
                <h2>How do I book a table for dining in?</h2>
                <p>To book a table, navigate to the 'Book Table' section on our website. Select your preferred date and
                    time, provide the necessary details, and confirm your booking. You will receive a confirmation email
                    with your booking details.</p>
            </div>
        </div>
    </section>
    
    <div class="app_download pb-4">
        <h4 class="free_delivery">For Free Delivery!</h4>
        <h2 class="text-center">Download This Amazing App Now!</h2>
        <br>
        <p class="best_discount">For best discounts and free delivery download the app now from your Google Play Store or App Store.</p>
        git add .

        <a href="#" class="app_store"><img src="./Images/app_download/download-on-the-app-store.png" class="app-download-img" alt="Download on the Apple App Store"></a>
    </div>

    <footer>
        <div class="foot-panel1 w-100">
            <div class="container-fluid py-5 px-0">
                <div class="row justify-content-evenly gy-5">
                    <div class="col-6 col-sm-3 col-md-2 col-xl-2">
                        <h5 class="mb-3" style="margin-left: 70px;">See Also</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item" style="margin-left: 90px;">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item" style="margin-left: 90px;">
                                <a class="nav-link" href="./Html-files/menu.html">Menu</a>
                            </li>
                            <li class="nav-item" style="margin-left: 90px;">
                                <a class="nav-link" href="./Html-files/services.html">Services</a>
                            </li>
                            <li class="nav-item" style="margin-left: 90px;">
                                <a class="nav-link" href="./Html-files/contact.html">Contact us</a>
                            </li>
                            <li class="nav-item" style="margin-left: 90px;">
                                <a class="nav-link" href="./Html-files/cart.html">Cart</a>
                            </li>
                            <li class="nav-item" style="margin-left: 90px;">
                                <a class="nav-link" href="/Html-files/contributor.html">Our Contributors</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-6 col-sm-5 col-md-3 col-xl-3">
                        <h5 class="mb-3" style="margin-left: 90px;">Exclusive Offers</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item" style="margin-left: 90px;">
                                <a href="#" class="nav-link">Foodie Discounts</a>
                            </li>
                            <li class="nav-item" style="margin-left: 90px;">
                                <a class="nav-link" href="#">Limited-Time Promotions</a>
                            </li>
                            <li class="nav-item" style="margin-left: 90px;">
                                <a class="nav-link" href="#">Special Event Packages</a>
                            </li>
                            <li class="nav-item" style="margin-left: 90px;">
                                <a class="nav-link" href="/Html-files/offers/membership-benifits.html">Membership Benefits</a>
                            </li>
                            <li class="nav-item" style="margin-left: 90px;">
                                <a class="nav-link" href="#">Early Access to New Recipes</a>
                            </li>
                            <li class="nav-item" style="margin-left: 90px;">
                                <a class="nav-link" href="/Html-files/offers/vip-food-event.html">VIP Foodie Events</a>
                            </li>
                            <li class="nav-item" style="margin-left: 90px;">
                                <a class="nav-link" href="/Html-files/offers/culinary-experience.html">Personalized Culinary Experiences</a>
                            </li>
                        </ul>
                    </div>


                    <div class="col-6 col-sm-4 col-md-4 col-xl-3">
                        <h5 class="mb-3" style="margin-left: 70px;">Payment Products</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item " style="margin-left: 90px;">
                                <a href="" class="nav-link">Secure Checkout</a>
                            </li>
                            <li class="nav-item" style="margin-left: 90px;">
                                <a href="" class="nav-link">Credit/Debit Cards</a>
                            </li>
                            <li class="nav-item" style="margin-left: 90px;">
                                <a href="" class="nav-link">Secure Checkout</a>
                            </li>
                            <li class="nav-item" style="margin-left: 90px;">
                                <a href="" class="nav-link">Online Payment</a>
                            </li>
                            <li class="nav-item" style="margin-left: 90px;">
                                <a href="" class="nav-link">Mobile Wallets</a>
                            </li>
                            <li class="nav-item" style="margin-left: 90px;">
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
        <div class="container">
            <h4 class="follow-us">Follow Us</h4>
            <div class="social-icons">
                <a href="https://facebook.com" target="_blank" class="facebook"><i class="fa-brands fa-facebook fa-beat"></i></a>
                <a href="https://instagram.com" target="_blank" class="instagram"><i class="fa-brands fa-instagram fa-beat"></i></a>
                <a href="https://twitter.com" target="_blank" class="twitter"><i class="fa-brands fa-x-twitter fa-beat"></i></a>
                <a href="https://linkedin.com" target="_blank" class="linkedin"><i class="fa-brands fa-linkedin fa-beat"></i></a>
                <a href="https://github.com/khushi-joshi-05/Food-ordering-website" target="_blank" class="github"><i class="fa-brands fa-github fa-beat"></i></a>
                <a href="https://discord.com/invite/sybYafYA" target="_blank" class="discord"><i class="fa-brands fa-discord fa-beat"></i></a>
            </div>
            <p class="social-text">Stay connected with us on social media for the latest updates, recipes, and foodie adventures.</p>
        </div>
    </div>

    <div class="copyright">
        <div class="container" style="text-align: center;">
            <p>&copy; <span id="copyright-year"></span> Foodies - All Rights Reserved | <a href="https://www.linkedin.com/in/khushi-joshi-95a587256/" target="_blank">Khushi Joshi</a></p>
        </div>
    </footer>

    <button id="scroll-top-button" class="scroll-top-button" onclick="goToTop()">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="white"
            class="arrow">
            <path d="M440-160v-487L216-423l-56-57 320-320 320 320-56 57-224-224v487h-80Z" />
        </svg>
    </button>
    <button id="translateButton">Translate</button>

    <!-- Popup for Google Translate -->
    <div id="translatePopup" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <div id="google_translate_element"></div>
        </div>
    </div>
    <script type="text/javascript">
      function googleTranslateElementInit() {
          new google.translate.TranslateElement({
              pageLanguage: 'en',
          }, 'google_translate_element');
      }
  </script>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  
  <script src=../Html-files/googletranslate.js></script>


    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="Html-files/top.js"></script>
    <script src="script.js"></script>
    <script src="Html-files/navbar.js"></script>
    <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            easing: 'ease',
            once: false,
        });

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

</body>

</html>
