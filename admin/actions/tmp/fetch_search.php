<?php
require_once '../config/config.php';

                                    $query = "SELECT * FROM `products` WHERE title LIKE '%{$_POST['search']}%' OR description LIKE '%{$_POST['search']}%';";
                                    $result = $db->query($query);
                                   
                                    while ($row = $result->fetch_object()) {

                                        ?>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.php?id=<?=$row->id?>">
                                                        <img height="200" class="primary-img" src="<?=$photo_url.$row->photo?>" alt="single-product">
                                                        <img height="200" class="secondary-img" src="<?=$photo_url.$row->photo?>" alt="single-product">
                                                    </a>
                                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <div class="pro-info">
                                                        <h4><a href="product.php?id=<?=$row->id?>"><?=$row->title?></a></h4>
                                                        <p><span class="price">Rs. <?=$row->price?></span></p>
                                                        
                                                    </div>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.php" title="Add to Cart"> + Add To Cart</a>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                        </div>
                                        <?php } ?>