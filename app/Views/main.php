<?php
    use App\Models\Crud;
    $this->Crud = new Crud();
?>

<?php echo $this->extend('designs/public'); ?>
<?php echo $this->section('title'); ?>
    <?php echo $title; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <section class="hero-wrap style3 bg-squeeze">
        <img src="<?=site_url();?>assets/img/hero/hero-shape-10.png" alt="Image" class="hero-shape-one">
        <img src="<?=site_url();?>assets/img/hero/hero-shape-15.png" alt="Image" class="hero-shape-two">
        <img src="<?=site_url();?>assets/img/hero/hero-shape-14.png" alt="Image" class="hero-shape-three">
        <img src="<?=site_url();?>assets/img/hero/hero-shape-11.png" alt="Image" class="hero-shape-four animationFramesTwo">
        <div class="hero-slider-one owl-carousel">
            <div class="hero-slide-item">
                <div class="container">
                    <div class="row gx-5 align-items-center">
                        <div class="col-md-6">
                            <div class="hero-content" data-speed="0.10" data-revert="true">
                                <span>Contactless Payment Solution</span>
                                <h1>Your Cardless and Cashless Payment</h1>
                                <p>With <?=app_name;?>, protect your Credit/Debit Card details by making seamless, secure, fast, reliable, and confident payment at point-of-sales without worrying about failed transactions. Mercant get to received payments instantly.</p>
                                <div class="hero-btn">
                                    <a href="javascript:;" class="btn style1">Get Started</a>
                                    <!-- <a class="play-video" data-fancybox
                                        href="https://www.youtube.com/watch?v=DGo-OhDWIKQ">
                                        <span class="play-btn"> <i
                                                class="flaticon-play-button-arrowhead"></i></span>
                                        <span class="sm-none">Watch Video</span>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="hero-img-wrap">
                                <img src="<?=site_url();?>assets/img/hero/hero-shape-13.png" alt="Image"
                                    class="hero-shape-five bounce">
                                <img src="<?=site_url();?>assets/img/hero/hero-shape-12.png" alt="Image"
                                    class="hero-shape-six moveHorizontal">
                                <img src="<?=site_url();?>assets/img/hero/hero-slide-1.png" alt="Image" class="hero-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-slide-item">
                <div class="container">
                    <div class="row gx-5 align-items-center">
                        <div class="col-md-6">
                            <div class="hero-content" data-speed="0.10" data-revert="true">
                                <span>Secure Payment for Customers</span>
                                <h1>No Card/Cash Payment</h1>
                                <p>No need for Card/Cash payment, <?=app_name;?> help protect your card details from online payment. No more transaction failure or cash retraction.</p>
                                <div class="hero-btn">
                                    <a href="javascript:;" class="btn style1">Get Started</a>
                                    <!-- <a class="play-video" data-fancybox
                                        href="https://www.youtube.com/watch?v=DGo-OhDWIKQ">
                                        <span class="play-btn"> <i
                                                class="flaticon-play-button-arrowhead"></i></span>
                                        <span class="sm-none">Watch Video</span>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="hero-img-wrap">
                                <img src="<?=site_url();?>assets/img/hero/hero-shape-13.png" alt="Image"
                                    class="hero-shape-five bounce">
                                <img src="<?=site_url();?>assets/img/hero/hero-shape-12.png" alt="Image"
                                    class="hero-shape-six moveHorizontal">
                                <img src="<?=site_url();?>assets/img/hero/hero-slide-2.png" alt="Image" class="hero-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-slide-item">
                <div class="container">
                    <div class="row gx-5 align-items-center">
                        <div class="col-md-6">
                            <div class="hero-content" data-speed="0.10" data-revert="true">
                                <span>Merchant Fast Payout</span>
                                <h1>Receive Payments Instantly</h1>
                                <p><?=app_name;?> ensure merchant receives payment instantly, and no need to worry about failed payment/transaction disputes.</p>
                                <div class="hero-btn">
                                    <a href="javascript:;" class="btn style1">Get Started</a>
                                    <!-- <a class="play-video" data-fancybox
                                        href="https://www.youtube.com/watch?v=DGo-OhDWIKQ">
                                        <span class="play-btn"> <i
                                                class="flaticon-play-button-arrowhead"></i></span>
                                        <span class="sm-none">Watch Video</span>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="hero-img-wrap">
                                <img src="<?=site_url();?>assets/img/hero/hero-shape-13.png" alt="Image"
                                    class="hero-shape-five bounce">
                                <img src="<?=site_url();?>assets/img/hero/hero-shape-12.png" alt="Image"
                                    class="hero-shape-six moveHorizontal">
                                <img src="<?=site_url();?>assets/img/hero/hero-slide-3.png" alt="Image" class="hero-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <div class="service-charge-wrap bg-stratos ptb-100">
        <div class="container">
            <form action="#" class="charge-form">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <label for="send_money">Your Send Money</label>
                            <input type="number" id="send_money" name="send_money" placeholder="$1000">
                            <select>
                                <option value="1">USD</option>
                                <option value="2">EURO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <label for="recieved_money">Recipient Gets</label>
                            <input type="number" id="recieved_money" name="recieved_money" placeholder="$1000">
                            <select>
                                <option value="1">USD</option>
                                <option value="2">EURO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group form-btn">
                            <button type="submit" class="btn style1 w-100 d-block">Get Estimation</button>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <p><span>82.50</span> Exchange Rate <span>$5.50</span> Transition Fees</p>
                        <p>By clicking continue, I am agree with <a href="terms-of-service.html"
                                class="link style1">Terms & Policy</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div> -->

    <section class="feature-wrap pt-100 pb-75">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="feature-card style3">
                        <div class="feature-info">
                            <div class="feature-title">
                                <span><img src="<?=site_url();?>assets/img/feature/feature-icon-1.png" alt="Image"></span>
                                <h3>Create Account</h3>
                            </div>
                            <p>Setup personal account, and receive virtual account instantly.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="feature-card style3">
                        <div class="feature-info">
                            <div class="feature-title">
                                <span><img src="<?=site_url();?>assets/img/feature/feature-icon-2.png" alt="Image"></span>
                                <h3>Fund Account</h3>
                            </div>
                            <p>Free transfer to your virtual account, no hidden charges.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="feature-card style3">
                        <div class="feature-info">
                            <div class="feature-title">
                                <span><img src="<?=site_url();?>assets/img/feature/feature-icon-3.png" alt="Image"></span>
                                <h3>Make Payment</h3>
                            </div>
                            <p>Scan merchant generate QR Code or Generate Token to make payment.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="why-choose-wrap style1 pb-100 bg-bunting">
        <div class="container">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="wh-img-wrap">
                        <img src="<?=site_url();?>assets/img/why-choose-us/wh-img-1.png" alt="Image">
                        <img class="wh-shape-one bounce" src="<?=site_url();?>assets/img/why-choose-us/wh-shape-1.png" alt="Image">
                        <img class="wh-shape-two animationFramesTwo" src="<?=site_url();?>assets/img/why-choose-us/wh-shape-2.png"
                            alt="Image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="wh-content">
                        <div class="content-title style1">
                            <span>Why Choose Us</span>
                            <h2>Get World Class &amp; Fastest Online Payment Service</h2>
                            <p>There are many variations of passages of Lorem Ipsum amet avoilble but majority have
                                suffered alteration in some form, by injected humur or randomise words which don't
                                sure amet sit dolor quras alto lorem.</p>
                        </div>
                        <div class="feature-item-wrap">
                            <div class="feature-item">
                                <span class="feature-icon">
                                    <i class="flaticon-graph"></i>
                                </span>
                                <div class="feature-text">
                                    <h3>Low Costing</h3>
                                    <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui
                                        praesent sapien pelle tesque.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">
                                    <i class="flaticon-loan-1"></i>
                                </span>
                                <div class="feature-text">
                                    <h3>Safe &amp; Secure</h3>
                                    <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui
                                        praesent sapien pelle tesque.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">
                                    <i class="flaticon-computer"></i>
                                </span>
                                <div class="feature-text">
                                    <h3>Live Support</h3>
                                    <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui
                                        praesent sapien pelle tesque.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- <div class="counter-wrap">
        <div class="container">
            <div class="counter-card-wrap">
                <div class="counter-card">
                    <div class="counter-text">
                        <div class="counter-num">
                            <span class="odometer" data-count="5430"></span>
                        </div>
                        <p>Happy Customers</p>
                    </div>
                </div>
                <div class="counter-card">
                    <div class="counter-text">
                        <div class="counter-num">
                            <span class="odometer" data-count="25"></span>
                        </div>
                        <p>Years in Banking</p>
                    </div>
                </div>
                <div class="counter-card">
                    <div class="counter-text">
                        <div class="counter-num">
                            <span class="odometer" data-count="2597"></span>
                        </div>
                        <p>Our Branches</p>
                    </div>
                </div>
                <div class="counter-card">
                    <div class="counter-text">
                        <div class="counter-num">
                            <span class="odometer" data-count="40467"></span>
                        </div>
                        <p>Successful Projects</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <section class="service-wrap style3 ptb-100 bg-rock">
        <div class="container">
            <img src="<?=site_url();?>assets/img/service-shape-1.png" alt="Image" class="service-shape-one">
            <img src="<?=site_url();?>assets/img/service-shape-2.png" alt="Image" class="service-shape-two">
            <div class="section-title style1 text-center mb-40">
                <h2 class="text-white">For Merchants</h2>
            </div>
            <div class="row gx-5 align-items-center">
                <div class="col-md-6">
                    <div class="service-card style3">
                        <span class="service-icon">
                            <i class="flaticon-payment-method"></i>
                        </span>
                        <div class="service-info">
                            <h3><a href="javascript:;">Easy Setup</a></h3>
                            <p>Seamless onboarding and customization of account to start receiving payments.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-card style3">
                        <span class="service-icon">
                            <i class="flaticon-computer"></i>
                        </span>
                        <div class="service-info">
                            <h3><a href="javascript:;">Accept Payment</a></h3>
                            <p>Secure, fast, and convenient payment from your customer.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-card style3">
                        <span class="service-icon">
                            <i class="flaticon-credit-card"></i>
                        </span>
                        <div class="service-info">
                            <h3><a href="javascript:;">Quick Settlement</a></h3>
                            <p>You get settlement on the instant upon payment by customers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-card style3">
                        <span class="service-icon">
                            <i class="flaticon-loan-1"></i>
                        </span>
                        <div class="service-info">
                            <h3><a href="javascript:;">Business Insights</a></h3>
                            <p>Robust sales/revenue analytics to help make appropriate business decisions.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="text-center mt-20">
                <a href="javascript:;" class="btn style1">View All Services</a>
            </div> -->
        </div>
    </section>

    <!-- <section class="shopping-wrap ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12 order-lg-1 order-2">
                    <div class="shopping-content">
                        <img src="<?=site_url();?>assets/img/shopping/shopping-shape-1.png" alt="Image"
                            class="shopping-shape-one moveHorizontal">
                        <img src="<?=site_url();?>assets/img/shopping/shopping-shape-2.png" alt="Image"
                            class="shopping-shape-two bounce">
                        <div class="content-title style1 ">
                            <span>Online Shopping</span>
                            <h2>Shop Online Make In Online Banking Payments</h2>
                            <p>There are many variations of passages of Lorem Ipsum amet avoilble but majority have
                                suffered alteration in some form, by injected humur or randomise words which don't
                                sure amet sit dolor quras alto lorem.</p>
                        </div>
                        <ul class="content-feature-list list-style">
                            <li><i class="ri-check-double-line"></i>Cards that work all across the world.</li>
                            <li><i class="ri-check-double-line"></i>Highest Returns on your investments.</li>
                            <li><i class="ri-check-double-line"></i>No ATM fees. No minimum balance. No overdrafts.
                            </li>
                        </ul>
                        <a href="register.html" class="btn style1">Signup Today</a>
                    </div>
                </div>
                <div class="col-lg-6 col-12 order-lg-2 order-1">
                    <div class="shopping-img-wrap">
                        <img src="<?=site_url();?>assets/img/shopping/shopping-1.png" alt="Image">
                        <img src="<?=site_url();?>assets/img/shopping/shopping-shape-3.png" alt="Image"
                            class="shopping-shape-three">
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- <section class="testimonial-wrap ptb-100  bg-albastor">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="section-title style1 text-center mb-40">
                        <span>Our Testimonials</span>
                        <h2>What Our Client Says</h2>
                    </div>
                </div>
            </div>
            <div class="testimonial-slider-three owl-carousel">
                <div class="testimonial-card style3">
                    <span class="quote-icon">
                        <i class="flaticon-quotation-mark"></i>
                    </span>
                    <p class="client-quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua enim minim veniam, quis nostrud exercise
                        amet loremtation amet ullamco laboris nisi ut aliquip ex eacoo consequat. Duisaute irure
                        dolor in reprehen ametderit in voluptate velit esse cillum dolore eu fugiat.</p>
                    <div class="testimonial-card-thumb">
                        <div class="client-info-wrap">
                            <div class="client-img">
                                <img src="<?=site_url();?>assets/img/testimonials/client-7.jpg" alt="Image">
                            </div>
                            <div class="client-info">
                                <h4>Shonda Leer</h4>
                                <span>Director, BAT</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card style3">
                    <span class="quote-icon">
                        <i class="flaticon-quotation-mark"></i>
                    </span>
                    <p class="client-quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua enim minim veniam, quis nostrud exercise
                        amet loremtation amet ullamco laboris nisi ut aliquip ex eacoo consequat. Duisaute irure
                        dolor in reprehen ametderit in voluptate velit esse cillum dolore eu fugiat.</p>
                    <div class="testimonial-card-thumb">
                        <div class="client-info-wrap">
                            <div class="client-img">
                                <img src="<?=site_url();?>assets/img/testimonials/client-1.jpg" alt="Image">
                            </div>
                            <div class="client-info">
                                <h4>Alex Cruis</h4>
                                <span>CEO, IBAC</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card style3">
                    <span class="quote-icon">
                        <i class="flaticon-quotation-mark"></i>
                    </span>
                    <p class="client-quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua enim minim veniam, quis nostrud exercise
                        amet loremtation amet ullamco laboris nisi ut aliquip ex eacoo consequat. Duisaute irure
                        dolor in reprehen ametderit in voluptate velit esse cillum dolore eu fugiat.</p>
                    <div class="testimonial-card-thumb">
                        <div class="client-info-wrap">
                            <div class="client-img">
                                <img src="<?=site_url();?>assets/img/testimonials/client-2.jpg" alt="Image">
                            </div>
                            <div class="client-info">
                                <h4>Marion Ott</h4>
                                <span>Founder, Olleo</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card style3">
                    <span class="quote-icon">
                        <i class="flaticon-quotation-mark"></i>
                    </span>
                    <p class="client-quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua enim minim veniam, quis nostrud exercise
                        amet loremtation amet ullamco laboris nisi ut aliquip ex eacoo consequat. Duisaute irure
                        dolor in reprehen ametderit in voluptate velit esse cillum dolore eu fugiat.</p>
                    <div class="testimonial-card-thumb">
                        <div class="client-info-wrap">
                            <div class="client-img">
                                <img src="<?=site_url();?>assets/img/testimonials/client-3.jpg" alt="Image">
                            </div>
                            <div class="client-info">
                                <h4>Harry Jackson</h4>
                                <span>Enterpreneur</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card style3">
                    <span class="quote-icon">
                        <i class="flaticon-quotation-mark"></i>
                    </span>
                    <p class="client-quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua enim minim veniam, quis nostrud exercise
                        amet loremtation amet ullamco laboris nisi ut aliquip ex eacoo consequat. Duisaute irure
                        dolor in reprehen ametderit in voluptate velit esse cillum dolore eu fugiat.</p>
                    <div class="testimonial-card-thumb">
                        <div class="client-info-wrap">
                            <div class="client-img">
                                <img src="<?=site_url();?>assets/img/testimonials/client-4.jpg" alt="Image">
                            </div>
                            <div class="client-info">
                                <h4>Brock Lee</h4>
                                <span>Developer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="app-wrap  ptb-100 bg-rock">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-8">
                    <div class="app-content sm-center">
                        <div class="content-title style2">
                            <h2>Get the <?=app_name;?> App today, and start making secure and instant payment.</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4 text-md-end sm-center">
                    <div class="app-btn">
                        <a href="javascript:;"><img src="<?=site_url();?>assets/img/play-store.png" alt=""></a>
                        <a href="javascript:;"><img src="<?=site_url();?>assets/img/apple-store.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="goal-wrap ptb-100">
        <div class="container">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="goal-img-wrap">
                        <img src="<?=site_url();?>assets/img/goal/goal-shape-1.png" alt="Image" class="goal-shape-three bounce">
                        <img src="<?=site_url();?>assets/img/goal/goal-shape-2.png" alt="Image" class="goal-shape-one">
                        <img src="<?=site_url();?>assets/img/goal/goal-shape-3.png" alt="Image" class="goal-shape-two">
                        <img src="<?=site_url();?>assets/img/goal/goal-1.jpg" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="goal-content">
                        <div class="content-title style1">
                            <span>Goal Setting</span>
                            <h2>Manage Your Money With Online Banking Solution</h2>
                            <p>There are many variations of passages of Lorem Ipsum amet avoilble but majority have
                                suffered alteration in some form, by injected humur or randomise words which don't
                                sure amet sit dolor quras alto lorem.</p>
                        </div>
                        <ul class="content-feature-list style1 list-style">
                            <li><span><i class="flaticon-tick"></i></span>Learn To Budget</li>
                            <li><span><i class="flaticon-tick"></i></span>Create An Emergency Fund</li>
                            <li><span><i class="flaticon-tick"></i></span>Get Out Of Debt</li>
                            <li><span><i class="flaticon-tick"></i></span>Save And Invest Your Money</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- <section class="blog-wrap pt-100 pb-75 bg-albastor">
        <div class="container">
            <div class="section-title style1 text-center mb-40">
                <span>Latest Insights</span>
                <h2>Our Latest Articles</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="blog-card style1">
                        <div class="blog-img">
                            <img src="<?=site_url();?>assets/img/blog/blog-1.jpg" alt="Image">
                        </div>
                        <div class="blog-info">
                            <ul class="blog-metainfo  list-style">
                                <li><i class="flaticon-user"></i> <a href="posts-by-author.html">Reanne
                                        Carnation</a></li>
                                <li><i class="flaticon-calendar"></i>02 Jan, 2022</li>
                            </ul>
                            <h3><a href="blog-details-right-sidebar.html">5 Things To Know About Your Online
                                    Banking</a></h3>
                            <a href="blog-details-right-sidebar.html" class="link style1">Read More
                                <i class="flaticon-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="blog-card style1">
                        <div class="blog-img">
                            <img src="<?=site_url();?>assets/img/blog/blog-2.jpg" alt="Image">
                        </div>
                        <div class="blog-info">
                            <ul class="blog-metainfo  list-style">
                                <li><i class="flaticon-user"></i> <a href="posts-by-author.html">Phil Heath</a></li>
                                <li><i class="flaticon-calendar"></i>12 Dec, 2021</li>
                            </ul>
                            <h3><a href="blog-details-right-sidebar.html">Tips For Saving Money &amp; Better
                                    Investment Policy</a></h3>
                            <a href="blog-details-right-sidebar.html" class="link style1">Read More
                                <i class="flaticon-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="blog-card style1">
                        <div class="blog-img">
                            <img src="<?=site_url();?>assets/img/blog/blog-3.jpg" alt="Image">
                        </div>
                        <div class="blog-info">
                            <ul class="blog-metainfo  list-style">
                                <li><i class="flaticon-user"></i><a href="posts-by-author.html">Phil Heath</a></li>
                                <li><i class="flaticon-calendar"></i>12 Dec, 2021</li>
                            </ul>
                            <h3><a href="blog-details-right-sidebar.html">The Fedaral Bank Appoints New Director To
                                    The Board</a></h3>
                            <a href="blog-details-right-sidebar.html" class="link style1">Read More
                                <i class="flaticon-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
    <script>var site_url = '<?=site_url();?>';</script>
    <?php if($page == 'pay') { ?>
        <script>
            $(function(){
                setTimeout(function() { paywithSeerbit(); }, 200);
            });
        </script>
    <?php } ?>

    <?php if($page == 'merchant') { ?>
        <script>
            function getTotal() {
                var total = 0;
                var amt = $('#amt').val();
                var qty = $('#qty').val();
                total = parseInt(amt) * parseInt(qty);
                $('#amtTotal').html(total);
                $('#total').html(total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            }

            function verifyPay() {
                var content = $('#verifyPay').html();
                var amtTotal = $('#amtTotal').val();
                var token = $('#token').val();

                $.ajax({
                    url: site_url + 'main/verify',
                    type: 'post',
                    data: { token: token, amt: amtTotal },
                    success: function(data) {
                        var dt = JSON.parse(data);
                        if(dt.status == false) {
                            $('#verifyPay').html(content);
                            $('#verifyMsg').html(dt.msg);
                        } else {
                            $('#verifyPay').hide();
                            $('#verifyMsg').hide();
                            $('#approvePay').show(200);
                        }
                    }
                });
            }

            function approvePay() {
                var content = $('#approvePay').html();
                var token = $('#token').val();
                var amtTotal = $('#amtTotal').val();
                var pin = $('#pin').val();

                $.ajax({
                    url: site_url + 'main/approve',
                    type: 'post',
                    data: { token: token, pin: pin, amt: amtTotal },
                    success: function(data) {
                        var dt = JSON.parse(data);
                        $('#approveMsg').html(dt.msg);
                        if(dt.status == false) {
                            $('#verifyPay').html(content);
                        } else {
                            $('#verifyPay').hide();
                            $('#approvePay').hide(200);
                        }
                    }
                });
            }
        </script>
    <?php } ?>
<?php echo $this->endSection(); ?>