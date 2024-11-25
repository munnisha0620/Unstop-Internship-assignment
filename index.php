<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stationery & Gift Shop</title>
    <link rel="stylesheet" href="styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
</head>

<body>
    <div class="super_container">
        <!-- Header -->
        <?php include 'include/header.php'; ?>

        <!-- Main Content -->
        <div class="container">
            <!-- Product Section -->
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h2>Featured Products</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Product Example -->
                <div class="col-lg-4 col-md-6">
                    <div class="product-item notebooks">
                        <div class="product discount product_filter">
                            <div class="product_image">
                                <img src="images/product_6.png" alt="Spiral Notebook">
                            </div>
                            <div class="favorite favorite_left"></div>
                            <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                <span>-$5</span>
                            </div>
                            <div class="product_info">
                                <h6 class="product_name"><a href="#single.php">Spiral Notebook</a></h6>
                                <div class="product_price">$8.00<span>$13.00</span></div>
                            </div>
                        </div>
                        <div class="red_button add_to_cart_button">
                            <a href="#" onclick="addToCart('Spiral Notebook', 8.00)">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deal of the Week -->
        <div class="deal_ofthe_week">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="deal_ofthe_week_img">
                            <img src="images/deal_ofthe_week.png" alt="Deal of the Week">
                        </div>
                    </div>
                    <div class="col-lg-6 text-right deal_ofthe_week_col">
                        <div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
                            <div class="section_title">
                                <h2>Deal Of The Week</h2>
                            </div>
                            <ul class="timer">
                                <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                    <div id="day" class="timer_num">03</div>
                                    <div class="timer_unit">Day</div>
                                </li>
                                <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                    <div id="hour" class="timer_num">15</div>
                                    <div class="timer_unit">Hours</div>
                                </li>
                                <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                    <div id="minute" class="timer_num">45</div>
                                    <div class="timer_unit">Mins</div>
                                </li>
                                <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                    <div id="second" class="timer_num">23</div>
                                    <div class="timer_unit">Sec</div>
                                </li>
                            </ul>
                            <div class="red_button deal_ofthe_week_button"><a href="categories.php">Shop Now</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Benefits -->
        <div class="benefit">
            <div class="container">
                <div class="row benefit_row">
                    <!-- Benefit Item -->
                    <div class="col-lg-3 benefit_col">
                        <div class="benefit_item d-flex flex-row align-items-center">
                            <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                            <div class="benefit_content">
                                <h6>Free Shipping</h6>
                                <p>Enjoy fast and free delivery.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Repeat for other benefits -->
                </div>
            </div>
        </div>

        <!-- Blogs -->
        <div class="blogs">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="section_title">
                            <h2>Latest Blogs</h2>
                        </div>
                    </div>
                </div>
                <div class="row blogs_container">
                    <!-- Blog Item Example -->
                    <div class="col-lg-4 blog_item_col">
                        <div class="blog_item">
                            <div class="blog_background" style="background-image:url(images/blog_1.jpg)"></div>
                            <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                                <h4 class="blog_title">Here are the trends I see coming this fall</h4>
                                <span class="blog_meta">by Admin | Dec 01, 2024</span>
                                <a class="blog_more" href="#">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter -->
        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                            <h4>Newsletter</h4>
                            <p>Subscribe to our newsletter and get 20% off your first purchase</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="post">
                            <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                                <input id="newsletter_email" type="email" placeholder="Your email" required="required" aria-label="Enter your email">
                                <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include 'include/footer.php'; ?>
    </div>

    <!-- Scripts -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
