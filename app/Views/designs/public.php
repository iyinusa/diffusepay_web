<?php
    use App\Models\Crud;
    $this->Crud = new Crud();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?=site_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=site_url();?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?=site_url();?>assets/css/remixicon.css">
    <link rel="stylesheet" href="<?=site_url();?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=site_url();?>assets/css/odometer.min.css">
    <link rel="stylesheet" href="<?=site_url();?>assets/css/fancybox.css">
    <link rel="stylesheet" href="<?=site_url();?>assets/css/aos.css">
    <link rel="stylesheet" href="<?=site_url();?>assets/css/style.css?v=<?=time();?>">
    <link rel="stylesheet" href="<?=site_url();?>assets/css/dark-theme.css">
    <link rel="stylesheet" href="<?=site_url();?>assets/css/responsive.css">
    <title><?=$this->renderSection('title'); ?></title>
    <link rel="icon" type="image/png" href="<?=site_url();?>assets/img/favicon.png?v=0">
</head>

<body>
    <div class="loader js-preloader">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- <div class="switch-theme-mode">
        <label id="switch" class="switch">
            <input type="checkbox" onchange="toggleTheme()" id="slider">
            <span class="slider round"></span>
        </label>
    </div> -->

    <div class="page-wrapper">
        <header class="header-wrap style1">
            <div class="header-top">
                <button type="button" class="close-sidebar">
                    <i class="ri-close-fill"></i>
                </button>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-12">
                            <div class="header-top-left">
                                <ul class="contact-info list-style">
                                    <li><i class="flaticon-call"></i> <a href="tel:+2348162251899">(+234) 816 225 1899</a>
                                    </li>
                                    <li><i class="flaticon-email-1"></i> <a href="mailto:hi@diffusepay.com">hi@diffusepay.com</a>
                                    </li>
                                    <li><i class="flaticon-pin"></i>
                                        <p>82, Isawo Road, Agric, Ikorodu, Lagos</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="header-top-right">
                                <ul class="header-top-menu list-style">
                                    <li><a href="javascript:;">Support</a></li>
                                </ul>
                                <div class="select-lang">
                                    <i class="ri-global-line"></i>
                                    <div class="navbar-option-item navbar-language dropdown language-option">
                                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="lang-name"></span>
                                        </button>
                                        <div class="dropdown-menu language-dropdown-menu">
                                            <a class="dropdown-item" href="javascript:;">
                                                <img src="<?=site_url();?>assets/img/uk.png" alt="flag">
                                                English
                                            </a>
                                            <!-- <a class="dropdown-item" href="javascript:;">
                                                <img src="<?=site_url();?>assets/img/china.png" alt="flag">
                                                简体中文
                                            </a>
                                            <a class="dropdown-item" href="javascript:;">
                                                <img src="<?=site_url();?>assets/img/uae.png" alt="flag">
                                                العربيّة
                                            </a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand pt-3" href="<?=site_url();?>">
                            <img class="logo-light" src="<?=site_url();?>assets/img/logo.png?v=0" alt="logo">
                            <img class="logo-dark" src="<?=site_url();?>assets/img/logo-white.png?v=0" alt="logo">
                        </a>
                        <div class="collapse navbar-collapse main-menu-wrap" id="navbarSupportedContent">
                            <div class="menu-close xl-none">
                                <a href="javascript:void(0)"> <i class="ri-close-line"></i></a>
                            </div>
                            <ul class="navbar-nav ms-auto">
                                <!-- <li class="nav-item">
                                    <a href="<?=site_url();?>" class="nav-link active">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="about.html" class="nav-link">
                                        About Us
                                    </a>
                                </li>
                                <li class="nav-item has-dropdown">
                                    <a href="index.html#" class="nav-link">
                                        Service
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="service-one.html" class="nav-link">Service One</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="service-two.html" class="nav-link">Service Two</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="service-details.html" class="nav-link">Service Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item has-dropdown">
                                    <a href="index.html#" class="nav-link">
                                        Pages
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="index.html#" class="nav-link">
                                                Project
                                                <i class="ri-arrow-down-s-line"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <a href="project.html" class="nav-link">Our Project</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="project-details.html" class="nav-link">Single Project</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="team.html" class="nav-link">Our Team</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="open-account.html" class="nav-link">Open Account</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apply-loan.html" class="nav-link">Apply Loan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pricing.html" class="nav-link">Pricing Plan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="faq.html" class="nav-link">FAQ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="testimonials.html" class="nav-link">Testimonials</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="index.html#" class="nav-link">
                                                User Pages
                                                <i class="ri-arrow-down-s-line"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <a href="my-account.html" class="nav-link">My Account</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="login.html" class="nav-link">Login</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="register.html" class="nav-link">Register</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="recover-password.html" class="nav-link">Recover
                                                        Password</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="terms-of-service.html" class="nav-link">Terms of Service</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="privacy-policy.html" class="nav-link">Privacy Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="error-404.html" class="nav-link">404 Error Page</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item has-dropdown">
                                    <a href="index.html#" class="nav-link">
                                        Blog
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="index.html#" class="nav-link">
                                                Blog Layout
                                                <i class="ri-arrow-down-s-line"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <a href="blog-no-sidebar.html" class="nav-link">Blog Grid</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="blog-left-sidebar.html" class="nav-link">Blog Left
                                                        Sidebar</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="blog-right-sidebar.html" class="nav-link">Blog Right
                                                        Sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="index.html#" class="nav-link">
                                                Single Blog
                                                <i class="ri-arrow-down-s-line"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <a href="blog-details-no-sidebar.html" class="nav-link">Blog Details
                                                        No Sidebar</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="blog-details-left-sidebar.html" class="nav-link">Blog
                                                        Details Left Sidebar</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="blog-details-right-sidebar.html" class="nav-link">Blog
                                                        Details Right Sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="contact.html" class="nav-link">Contact Us</a>
                                </li>
                                <li class="nav-item xl-none">
                                    <a href="register.html" class="btn style1">Register Now</a>
                                </li> -->
                            </ul>
                            <!-- <div class="others-options lg-none">
                                <div class="header-btn lg-none">
                                    <a href="javascript:;" class="btn style1">Register Now</a>
                                </div>
                            </div> -->
                        </div>
                    </nav>
                    <div class="mobile-bar-wrap">
                        <div class="mobile-sidebar">
                            <i class="ri-menu-4-line"></i>
                        </div>
                        <div class="mobile-menu xl-none">
                            <a href="javascript:void(0)"><i class="ri-menu-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <?=$this->renderSection('content'); ?>

        <footer class="footer-wrap bg-rock">
            <!-- <div class="container">
                <img src="<?=site_url();?>assets/img/footer-shape-1.png" alt="Image" class="footer-shape-one">
                <img src="<?=site_url();?>assets/img/footer-shape-2.png" alt="Image" class="footer-shape-two">
                <div class="row pt-100 pb-75">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <a href="index.html" class="footer-logo">
                                <img src="<?=site_url();?>assets/img/logo-white.png" alt="Image">
                            </a>
                            <p class="comp-desc">
                                On the other hand, we denounce whteous indig nation and dislike men wh beguiled moraized
                                er hand consec teturus adipis iscing elit eiusmod tempordunt labore dolore magna aliqua
                                consector tetur adip iscing.
                            </p>
                            <div class="social-link">
                                <ul class="social-profile list-style style1">
                                    <li>
                                        <a target="_blank" href="https://facebook.com">
                                            <i class="ri-facebook-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://twitter.com">
                                            <i class="ri-twitter-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://linkedin.com">
                                            <i class="ri-linkedin-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://instagram.com">
                                            <i class="ri-pinterest-fill"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h3 class="footer-widget-title">Our Company</h3>
                            <ul class="footer-menu list-style">
                                <li>
                                    <a href="about.html">
                                        <i class="flaticon-next"></i>
                                        Company &amp; Team
                                    </a>
                                </li>
                                <li>
                                    <a href="service-one.html">
                                        <i class="flaticon-next"></i>
                                        Our Services
                                    </a>
                                </li>
                                <li>
                                    <a href="team.html">
                                        <i class="flaticon-next"></i>
                                        News &amp; Blog
                                    </a>
                                </li>
                                <li>
                                    <a href="pricing.html">
                                        <i class="flaticon-next"></i>
                                        Pricing Plan
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        <i class="flaticon-next"></i>
                                        Contact Us
                                    </a>
                                </li>
                                <li>
                                    <a href="privacy-policy.html">
                                        <i class="flaticon-next"></i>
                                        Privacy Policy
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h3 class="footer-widget-title">Products</h3>
                            <ul class="footer-menu list-style">
                                <li>
                                    <a href="service-one.html">
                                        <i class="flaticon-next"></i>
                                        Online Payment
                                    </a>
                                </li>
                                <li>
                                    <a href="service-one.html">
                                        <i class="flaticon-next"></i>
                                        Deposit Skim
                                    </a>
                                </li>
                                <li>
                                    <a href="service-one.html">
                                        <i class="flaticon-next"></i>
                                        Online Shopping
                                    </a>
                                </li>
                                <li>
                                    <a href="service-one.html">
                                        <i class="flaticon-next"></i>
                                        Master Card
                                    </a>
                                </li>
                                <li>
                                    <a href="service-one.html">
                                        <i class="flaticon-next"></i>
                                        Receive Money
                                    </a>
                                </li>
                                <li>
                                    <a href="service-one.html">
                                        <i class="flaticon-next"></i>
                                        Affiliate Program
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h3 class="footer-widget-title">Subscribe</h3>
                            <p class="newsletter-text">Tablished fact that a reader will be distrated by the readable
                                content</p>
                            <form action="#" class="newsletter-form">
                                <input type="email" placeholder="Your Email">
                                <button type="button">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="copyright-text">
                <p> <i class="ri-copyright-line"></i>
                    <script>document.write(new Date().getFullYear())</script> <?=app_name;?>. All Rights Reserved.
                </p>
            </div>
        </footer>

    </div>


    <a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>

    <script src="<?=site_url();?>assets/js/jquery.min.js"></script>
    <script src="<?=site_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?=site_url();?>assets/js/form-validator.min.js"></script>
    <script src="<?=site_url();?>assets/js/contact-form-script.js"></script>
    <script src="<?=site_url();?>assets/js/aos.js"></script>
    <script src="<?=site_url();?>assets/js/owl.carousel.min.js"></script>
    <script src="<?=site_url();?>assets/js/odometer.min.js"></script>
    <script src="<?=site_url();?>assets/js/fancybox.js"></script>
    <script src="<?=site_url();?>assets/js/jquery.appear.js"></script>
    <script src="<?=site_url();?>assets/js/tweenmax.min.js"></script>
    <script src="<?=site_url();?>assets/js/main.js"></script>

    <?=$this->renderSection('scripts'); ?>
</body>
</html>