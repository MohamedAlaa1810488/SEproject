<?php include_once 'header.php'; ?>


		<!-- Shop Page Area Start -->
        <div class="shop-page-area ptb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="shop-topbar-wrapper">
                            <div class="shop-topbar-left">
                                <ul class="view-mode">
                                    <li class="active"><a href="#product-grid" data-view="product-grid"><i class="fa fa-th"></i></a></li>
                                    <li><a href="#product-list" data-view="product-list"><i class="fa fa-list-ul"></i></a></li>
                                </ul>
                                <?php 
                                        include_once 'php/Product.php';
                                        $product = new Product;
                                        if($_GET){
                                            if($_GET['sub'] && is_numeric($_GET['sub'])){
                                                $product->setSubcategories($_GET['sub']);
                                                $productResult = $product->getProducts_Sub();
                                            } else {
                                                header("Location:404.php");
                                            }
                                        } else {
                                            $productResult = $product->getAllData();
                                        }
                                        
                                        if($productResult){
                                            $products = $productResult->fetch_all(MYSQLI_ASSOC);
                                            $produts_num = count($products);
                                            ?>
                                <p>Showing 1 - <?php echo $produts_num ?> of <?php echo $produts_num ?> results  </p>
                            </div>
                            
                        </div>
                        <div class="grid-list-product-wrapper">
                            <div class="product-grid product-view pb-20">
                                <div class="row">
                                    <?php
                                            foreach($products AS $key=>$value){
                                    ?>
                                                <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                                    <div class="product-wrapper">
                                                        <div class="product-img">
                                                            <a href="product-details.php?prod=<?php echo $value['id'] ?>">
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
                                                                <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                                                    <i class="ion-ios-search-strong"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="product-content text-left">
                                                            <div class="product-hover-style">
                                                                <div class="product-title">
                                                                    <h4>
                                                                        <a href="product-details.php?prod=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a>
                                                                    </h4>
                                                                </div>
                                                                <div class="cart-hover">
                                                                    <h4><a href="product-details.php?prod=<?php echo $value['id'] ?>">+ Add to cart</a></h4>
                                                                </div>
                                                            </div>
                                                            <div class="product-price-wrapper">
                                                                <span><?php  echo $value['price'] ?> EGP </span>
                                                                <!--<span class="product-price-old"> EGP</span>-->
                                                            </div>
                                                        </div>
                                                        <div class="product-list-details">
                                                            <h4>
                                                                <a href="product-details.php?prod=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a>
                                                            </h4>
                                                            <div class="product-price-wrapper">
                                                                <span><?php  echo $value['price'] ?> EGP</span>
                                                                <!--<span class="product-price-old">$120.00 </span>-->
                                                            </div>
                                                            <p><?php  echo $value['details'] ?></p>
                                                            <div class="shop-list-cart-wishlist">
                                                                <a href="#" title="Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                                <a href="#" title="Add To Cart"><i class="ion-ios-shuffle-strong"></i></a>
                                                                <a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                                                    <i class="ion-ios-search-strong"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    <?php
                                            }
                                        } else {
                                            echo "<div class='alert alert-warning'>No Products Yet</div>";
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="pagination-total-pages">
                                <div class="pagination-style">
                                    <ul>
                                        <li><a class="prev-next prev" href="#"><i class="ion-ios-arrow-left"></i> Prev</a></li>
                                        <li><a class="active" href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">...</a></li>
                                        <li><a href="#">10</a></li>
                                        <li><a class="prev-next next" href="#">Next<i class="ion-ios-arrow-right"></i> </a></li>
                                    </ul>
                                </div>
                                <div class="total-pages">
                                    <p>Showing 1 - <?php echo $produts_num ?> of <?php echo $produts_num ?> results   </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                            <div class="shop-widget">
                                <h4 class="shop-sidebar-title">Shop By Categories</h4>
                                <div class="shop-catigory">
                                    <ul id="faq">
                                    <?php 
                                        include_once 'php/Category.php';
                                        include_once 'php/Subcategory.php';
                                        $category = new Category;
                                        $subCategory = new SubCategory;
                                        $categoriesResult = $category->getAllData();
                                        if($categoriesResult){
                                            $categories = $categoriesResult->fetch_all(MYSQLI_ASSOC);
                                            foreach($categories AS $key=>$value){
                                    ?>          

                                        <li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-<?php echo $value['id']?>"><?php echo $value['name'] ?> <i class="ion-ios-arrow-down"></i></a>
                                            <ul id="shop-catigory-<?php echo $value['id']?>" class="panel-collapse collapse">
                                    <?php 
                                        $subCategory->setCategory($value['id']);
                                        $subCategoryResult = $subCategory->getSubFromCat();
                                        if($subCategoryResult){
                                            $subCategories = $subCategoryResult->fetch_all(MYSQLI_ASSOC);
                                            foreach($subCategories AS $k => $v){
                                    ?>
                                                <li><a href="shop.php?sub=<?php echo $v['id'] ?> "><?php echo $v['name'] ?></a></li>
                                    <?php            
                                            }
                                        } else {
                                            // Do Nothing
                                        }
                                    ?>
                                            </ul>
                                        </li>
                                    <?php            
                                            }
                                        } else {
                                                // Do Nothing
                                    }
                                    ?>    
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- Shop Page Area End -->
<?php include_once 'footer.php'; ?>