<!-- Modal STARTS-->
<?php
$categories = $data['categories'];
$product = $data['product'];
$ads = new \app\models\Ads();
$promo = new \app\models\Promotion();
if ($product->getAds()) {
    $ads = $product->getAds();
}
$promoName = ($promo = $product->getPromotion() ) ? $promo->promo_name : "" ;
$discountPercent = ($promo = $product->getPromotion() ) ? $promo->discount_percent : "" ;

?>
<div class="modal fade" id="editProductModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- PRODUCT LAYOUT STARTS -->
                <div class="row">
                    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mx-auto">
                        <div class="">
                            <div class="row">
                                <div class="col-xl-12 col-lg-6 col-md-12">
                                    <form method="POST" action="/Product/update/<?= $product->prod_id ?>" class="tm-edit-product-form" enctype='multipart/form-data'>
                                        <div class="form-group mb-3">
                                            <label class="text-muted" for="name">Product Name
                                            </label>
                                            <input value="<?= $product->prod_name ?>" id="name" name="product_name" type="text" class="form-control validate" required="">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="text-muted" for="description">Description</label>
                                            <textarea name="product_desc" class="form-control validate" rows="3" required=""><?= $product->prod_desc ?></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="category">Category</label>
                                            <select name="product_category" class="form-select" id="category" required>
                                                <option>Select category</option>
                                                <?php for ($i = 1; $i < count($categories); $i++) { ?>
                                                    <option <?php if ($product->prod_cat_id == $categories[$i]->prod_cat_id) {
                                                                echo "selected";
                                                            }  ?> value="<?= $i ?>"><?= $categories[$i]->prod_category ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="form-group w-25 mb-3 col-xs-12 col-sm-6">
                                                <label class="text-muted" for="expire_date">Product Cost (CAD)
                                                </label>
                                                <input value="<?= $product->prod_cost ?>" type="text" class="form-control validate" name="product_cost" required>
                                            </div>
                                            <div class="form-group w-25 mb-3 col-xs-12 col-sm-6">
                                                <label class="text-muted" for="stock">Units In Stock
                                                </label>
                                                <input value="<?= $product->num_of_stock ?>" id="stock" name="stock" type="text" class="form-control validate" required="">
                                            </div>
                                            <div class="form-group form-check mb-3 col-xs-12 col-sm-6">
                                                <input name="has_ads" class="form-check-input" type="checkbox" id="has_ads" <?php if ($product->has_ads > 0) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                                <label class="form-check-label" for="has_ads">
                                                    Ads (flat rate 5 CAD)
                                                </label>
                                                <label class="text-muted" for="start_date">Start: <input value="<?= $ads->start_date ?>" id="startDate" name="startDate" type="date" class="form-control"> </label>
                                                <label lass="text-muted" for="end_date">Ends: <input value="<?= $ads->end_date ?>" id="endDate" name="endDate" type="date" class="form-control "></label>

                                            </div>
                                            <div class="form-group form-check mb-3 col-xs-12 col-sm-6">
                                                <input <?php if ($product->has_discount > 0) {echo "checked"; } ?> id="has_discount" name="has_discount" class="form-check-input" type="checkbox">
                                                <label class="form-check-label pe-3" for="has_discount">
                                                    Set Promotion
                                                </label>
                                                <input value="<?=$discountPercent?>" class="form-control ms-2" placeholder="ex. 5%" type="text" name="promotion_percent">
                                                <input value="<?= $promoName?>" class="form-control ms-2" placeholder="Title ex. Black Friday" type="text" name="promotion_name">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                                            <div class="custom-file mt-3 mb-3">
                                                <img id="product_preview_update" src="/images/<?= $product->product_image?>" class="img-fluid d-flex justify-content-center m-auto p-auto" style="max-height: 250px;" alt="product photo"><br>
                                                <button onclick="uploadProductImg()" type="button" class="btn btn-outline-dark btn-sm mb-2 d-flex justify-content-center m-auto p-auto" data-mdb-ripple-color="dark" style="z-index: 1;">
                                                    UPLOAD IMAGE
                                                </button>
                                                <input class='form-control' type="file" name="product_image" id="edit_product_image" hidden />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="update" data-bs-dismiss="modal" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
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
<script>
    function uploadProductImg() {

        $("#edit_product_image").click();
        edit_product_image.onchange = evt => {
            const [file] = edit_product_image.files
            if (file) {
                product_preview_update.src = URL.createObjectURL(file);
            }
        }
    }
</script>
<!-- Modal ENDS-->