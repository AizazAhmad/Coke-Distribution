<?php
$query = "SELECT items.Id,items.Title,companies.Name as Company,items.Description,items.Price,items.Main_Photo FROM items INNER JOIN companies ON items.Company_Id = companies.Id";
$result = $db->query($query);

while ($row = $result->fetch_object()) {
    $pro_id = $row->Id;
    $photoqry = "SELECT * FROM photos where product_id=$pro_id";
    $res = $db->query($photoqry);
    

    // exit();
    // $btn_edit = edit_button($row->Id, $base_url.'edit-user.php');
    // $btn_delete = delete_button($row->Id, $action_url.'delete_user.php');
    // $btn_ban = ban_button($row->Id, $action_url.'ban_user.php');
    ?>

       

    


<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="ps-product">
                    <div class="ps-product__thumbnail" style="height: 450px;"><a class="ps-product__favorite" href="#"><i class="furniture-heart"></i></a><img src="<?php echo $photo_url.$row->Main_Photo; ?>" alt=""><a class="ps-product__overlay" href="product-detail.php?id=<?php echo $row->Id; ?>"></a>
                    <div class="ps-badge"><span>New</span></div>
                      <div class="ps-product__content full">
                        <div class="ps-product__variants">
                            <?php 
                            while($photo = $res->fetch_object()){
                            ?>
                          <div class="item"><img src="<?php echo $photo_url.$photo->name; ?>" class="img-fluid" style="max-width: 100%; height: auto;" alt=""></div>
                            <?php } ?>
                        </div>
                            <select class="ps-rating">
                              <option value="1">1</option>
                              <option value="1">2</option>
                              <option value="1">3</option>
                              <option value="1">4</option>
                              <option value="2">5</option>
                            </select><a class="ps-product__title" href="product-detail"><?php echo $row->Title; ?></a>
                        <div class="ps-product__categories"><a href="product-listing.php"><?php echo $row->Company; ?></a></div>
                        <p class="ps-product__price">
                          <del>£220</del><?php echo $row->Price; ?>
                        </p><a class="ps-btn ps-btn--sm" href="product-detail">Add to cart</a>
                        <p class="ps-product__feature"><i class="furniture-delivery-truck-2"></i>Free Shipping in 24 hours</p>
                      </div>
                    </div>
                    <div class="ps-product__content">
                          <select class="ps-rating">
                            <option value="1">1</option>
                            <option value="1">2</option>
                            <option value="1">3</option>
                            <option value="1">4</option>
                            <option value="2">5</option>
                          </select><a class="ps-product__title" href="product-detail"><?php echo $row->Title; ?></a>
                      <div class="ps-product__categories"><a href="product-listing.php"><?php echo $row->Company; ?></a></div>
                      <p class="ps-product__price">
                        <del>£220</del><?php echo $row->Price; ?>
                      </p>
                    </div>
                  </div>
                </div>
<?php
} ?>