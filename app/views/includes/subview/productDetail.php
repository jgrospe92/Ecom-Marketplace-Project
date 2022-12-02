<!-- Modal STARTS-->
<?php
    $ads = new \app\models\Ads();
    $ads = $data->getAds();
    
    $vendor = new \app\models\Vendor();
    $vendor = $vendor->getVendorByID($data->vendor_id);
?>
<div class="modal fade" id="productDetailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <!-- PRODUCT LAYOUT STARTS -->
                <div class="container">
                    <div class="card p-2">
                        <div class="container-fliud">
                            <div class="wrapper">
                                <div class="">
                                    <img src="/images/<?= $data->product_image ?>" style="max-height:450px; object-fit:cover" class="w-100 rounded-start rounded-end" alt="...">
                                </div>
                                <div class="card-body">
                                    <h3 class="product-title"><?= $data->prod_name ?></h3>
                                    <div class="rating">
                                        <div class="stars">
                                        <span>Rating: <?php for ($i = 1; $i < $data->rating; $i++) { ?>
                                                <img src="/resources/images/star.png" alt="">
                                            <?php } ?></span>
                                        </div>
                                        <span class="review-no">Vendor: <?= $vendor->vendor_name ?></span>
                                    </div>
                                    <p class="product-description">Description: <span><?= $data->prod_desc ?></span></p>
                                    <p class="product-description">Date Listed: <span><?php $date = strtotime($data->date_added); echo date('l jS \of F Y h:i:s A',$date ) ?></span></p>
                                    <h4 class="price"><span>$<?= $data->prod_cost ?></span></h4>
                                    <p class="text-muted"><span>QTY: <?= $data->num_of_stock ?></span></p>
                                    <p class="text-muted"><span>Advertised: <?php if($data->has_ads > 0 ) {echo "YES";} else {echo "No";}?>
                                    <?php
                                        if($data->has_ads> 0) {
                                            $newDate = date_diff(date_create(date("Y-m-d")),date_create($ads->end_date), true);
                                            echo $newDate->format("%R%a days");
                                        }
                                    ?></span></p>
                                    <p class="text-muted"><span>Discounted: <?php if($data->has_discount > 0) {echo "YES";} else {echo "No";}?></span></p>
                                   <div class="col-md-6">
                                    <h5>Reviews:</h5>
                                        <p class='text-muted'>No product review</p>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT LAYOUT ENDS -->
            </div>
        </div>
    </div>
</div>
<!-- Modal ENDS-->