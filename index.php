<?php 
include_once 'header.php'; 
include_once 'php/Product.php';
$product = new Product;
$newestProductResult = $product->getNewestProducts();
$topRatedProductResult = $product->getTopRated();
$bestSellerProductResult = $product->getBestSeller();
?>
    <!-- Slider Start -->
    <div class="slider-area">
        <div class="slider-active owl-dot-style owl-carousel">
            <div class="single-slider ptb-240 bg-img" style= "background-image:url(assets/img/slider/mikuta-brand-31-1.jpg);">
                <div class="container"> 
                    <div class="slider-content slider-animated-1">
                       
                        <h1 class="animated">GARMENTS ONLY WORN BY THE REBELIOUS </span></h1>
                        <p>Rogue Republic wear is a place for people who don't seem to fit in any place 
                        and they have desires that are  ready to be unleashed .</p>
                    </div>
                </div>
            </div>
            <div class="single-slider ptb-240 bg-img" style="background-image:url(assets/img/slider/mikuta-brand-31-1.jpg);">
                <div class="container">
                    <div class="slider-content slider-animated-1">
                        <h1 class="animated">Want to stay <span class="theme-color">healthy</span></h1>
                        <h1 class="animated">drink matcha.</h1>
                        <p>Lorem ipsum dolor sit amet, consectetu adipisicing elit sedeiu tempor inci ut labore et
                            dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider End -->
    
    <!-- New Products Start -->

    <?php 
        if($newestProductResult){
            $newestProducts = $newestProductResult->fetch_all(MYSQLI_ASSOC);
    ?>
    <div class="product-area gray-bg pt-90 pb-65">
        <div class="container">
            <div class="product-top-bar section-border mb-55">
                <div class="section-title-wrap text-center">
                    <h3 class="section-title">Newest Products</h3>
                </div>
            </div>
            <div class="tab-content jump">
                <div class="tab-pane active">
                    <div class="featured-product-active owl-carousel product-nav">
    <?php

            foreach($newestProducts AS $key=> $value){
    ?>
                        <div class="product-wrapper-single">
                            <div class="product-wrapper mb-30">
                                <div class="product-img">
                                    <a href="product-details.php?prod= <?php echo $value['id'] ?>" >
                                        <img alt="" src="assets/img/product/<?php echo $value['photo'] ?>">
                                    </a>
                                    <!--<span>-30%</span>-->
                                    <div class="product-action">
                                        <a class="action-wishlist" href="#" title="Wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="action-cart" href="#" title="Add To Cart">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="action-compare" href="#" data-target="#exampleModal"
                                            data-toggle="modal" title="Quick View">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content text-left">
                                    <div class="product-hover-style">
                                        <div class="product-title">
                                            <h4>
                                                <a href="product-details.php?prod= <?php echo $value['id'] ?>"><?php echo $value['name'] ?></a>
                                            </h4>
                                        </div>
                                        <div class="cart-hover">
                                            <h4><a href="product-details.php?prod= <?php echo $value['id'] ?>">+ Add to cart</a></h4>
                                        </div>
                                    </div>
                                    <div class="product-price-wrapper">
                                        <span><?php echo $value['price'] ?> EGP</span>
                                        <!--<span class="product-price-old"> </span>-->
                                    </div>
                                </div>
                            </div>
                        </div>
    <?php
            }

        }else {
            echo "<div class='row'><div class='text-center'>No New Products</div></div>";
        }
    ?>
    
                    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New Products End -->
    <!-- Top Rated Start -->

    <?php 
        if($topRatedProductResult){
            $topRatedProduct = $topRatedProductResult->fetch_all(MYSQLI_ASSOC);
            
    ?>
    <div class="product-area gray-bg pt-90 pb-65">
        <div class="container">
            <div class="product-top-bar section-border mb-55">
                <div class="section-title-wrap text-center">
                    <h3 class="section-title">Top Rated Products</h3>
                </div>
            </div>
            <div class="tab-content jump">
                <div class="tab-pane active">
                    <div class="featured-product-active owl-carousel product-nav">
    <?php

            foreach($topRatedProduct AS $key=> $value){
    ?>
                        <div class="product-wrapper-single">
                            <div class="product-wrapper mb-30">
                                <div class="product-img">
                                    <a href="product-details.php?prod= <?php echo $value['id'] ?>" >
                                        <img alt="" src="assets/img/product/<?php echo $value['photo'] ?>">
                                    </a>
                                    <!--<span>-30%</span>-->
                                    <div class="product-action">
                                        <a class="action-wishlist" href="#" title="Wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="action-cart" href="#" title="Add To Cart">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="action-compare" href="#" data-target="#exampleModal"
                                            data-toggle="modal" title="Quick View">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content text-left">
                                    <div class="product-hover-style">
                                        <div class="rating-review">
                                            <div class="pro-dec-rating">
                                            <?php    
                                                for($i=0;$i<$value['product_avg_rate'];$i++){
                                                    echo '<i class="ion-android-star-outline theme-star"></i>';
                                                }
                                                for($i=0;$i<5-($value['product_avg_rate']);$i++){
                                                    echo '<i class="ion-android-star-outline"></i>';
                                                }
                                                ?>
                                            </div>
                                            <div class="pro-dec-review">
                                                <ul>
                                                    <li>(<?php echo $value['product_count_reviews'] ?>) reviews</li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-title">
                                            <h4>
                                                <a href="product-details.php?prod= <?php echo $value['id'] ?>"><?php echo $value['name'] ?></a>
                                            </h4>
                                        </div>
                                        <div class="cart-hover">
                                            <h4><a href="product-details.php?prod= <?php echo $value['id'] ?>">+ Add to cart</a></h4>
                                        </div>
                                    </div>
                                    <div class="product-price-wrapper">
                                        <span><?php echo $value['price'] ?> EGP</span>
                                        <!--<span class="product-price-old"> </span>-->
                                    </div>
                                </div>
                            </div>
                        </div>
    <?php
            }

        }else {
            echo "<div class='row'><div class='text-center'>No New Products</div></div>";
        }
    ?>
    
                    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Products End -->
    <!-- Best Seller Start -->

    <?php 
        if($bestSellerProductResult){
            $bestSellerProduct = $bestSellerProductResult->fetch_all(MYSQLI_ASSOC);
            
    ?>
    <div class="product-area gray-bg pt-90 pb-65">
        <div class="container">
            <div class="product-top-bar section-border mb-55">
                <div class="section-title-wrap text-center">
                    <h3 class="section-title">Best Seller Products</h3>
                </div>
            </div>
            <div class="tab-content jump">
                <div class="tab-pane active">
                    <div class="featured-product-active owl-carousel product-nav">
    <?php

            foreach($bestSellerProduct AS $key=> $value){
    ?>
                        <div class="product-wrapper-single">
                            <div class="product-wrapper mb-30">
                                <div class="product-img">
                                    <a href="product-details.php?prod= <?php echo $value['id'] ?>" >
                                        <img alt="" src="assets/img/product/<?php echo $value['photo'] ?>">
                                    </a>
                                    <!--<span>-30%</span>-->
                                    <div class="product-action">
                                        <a class="action-wishlist" href="#" title="Wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="action-cart" href="#" title="Add To Cart">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="action-compare" href="#" data-target="#exampleModal"
                                            data-toggle="modal" title="Quick View">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content text-left">
                                    <div class="product-hover-style">
                                        <div class="product-title">
                                            <h4>
                                                <a href="product-details.php?prod= <?php echo $value['id'] ?>"><?php echo $value['name'] ?></a>
                                            </h4>
                                        </div>
                                        <div class="cart-hover">
                                            <h4><a href="product-details.php?prod= <?php echo $value['id'] ?>">+ Add to cart</a></h4>
                                        </div>
                                    </div>
                                    <div class="product-price-wrapper">
                                        <span><?php echo $value['price'] ?> EGP</span>
                                        <!--<span class="product-price-old"> </span>-->
                                    </div>
                                </div>
                            </div>
                        </div>
    <?php
            }

        }else {
            echo "<div class='row'><div class='text-center'>No New Products</div></div>";
        }
    ?>
    
                    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Best Seller End -->
    <!-- Newsletter Araea Start -->
    <div class="newsletter-area bg-image-2 pt-90 pb-100">
        <div class="container">
            <div class="product-top-bar section-border mb-45">
                <div class="section-title-wrap text-center">
                    <h3 class="section-title">Join to our Newsletter</h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-10 col-md-auto">
                    <div class="footer-newsletter">
                        <div id="mc_embed_signup" class="subscribe-form">
                            <form
                                action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef"
                                method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                class="validate" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll" class="mc-form">
                                    <input type="email" value="" name="EMAIL" class="email"
                                        placeholder="Your Email Address*" required>
                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div class="mc-news" aria-hidden="true"><input type="text"
                                            name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                    <div class="submit-button">
                                        <input type="submit" value="Subscribe" name="subscribe"
                                            id="mc-embedded-subscribe" class="button">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter Araea End -->

    <?php include_once 'footer.php' ?>    