<!-- Modal STARTS-->
<?php
$categories = $data['categories'];
?>
<div class="modal fade" id="addItemModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?=_("Add Product")?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- PRODUCT LAYOUT STARTS -->
                <div class="row">
                    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mx-auto">
                        <div class="">
                            <div class="row">
                                <div class="col-xl-12 col-lg-6 col-md-12">
                                    <form method="POST" action="/Product/insert" class="tm-edit-product-form" enctype='multipart/form-data'>
                                        <div class="form-group mb-3">
                                            <label class="text-muted" for="name"><?=_("Product Name")?>
                                            </label>
                                            <input id="name" name="product_name" type="text" class="form-control validate" required="">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="text-muted" for="description"><?=_("Description")?></label>
                                            <textarea name="product_desc" class="form-control validate" rows="3" required=""></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="category"><?=_("Category")?></label>
                                            <select name="product_category" class="form-select" id="category" required>
                                                <option selected=""><?=_("Select category")?></option>
                                                <?php for ($i = 1; $i < count($categories); $i++) { ?>
                                                    <option value="<?= $i ?>"><?= $categories[$i]->prod_category ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="form-group w-25 mb-3 col-xs-12 col-sm-6">
                                                <label class="text-muted" for="expire_date"><?=_("Product Cost (CAD)")?>
                                                </label>
                                                <input type="text" class="form-control validate" name="product_cost" required>
                                            </div>
                                            <div class="form-group w-25 mb-3 col-xs-12 col-sm-6">
                                                <label class="text-muted" for="stock"><?=_("Units In Stock")?>
                                                </label>
                                                <input id="stock" name="stock" type="text" class="form-control validate" required="">
                                            </div>
                                            <div class="form-group form-check mb-3 col-xs-12 col-sm-6">
                                                <input name="has_ads" class="form-check-input" type="checkbox" id="has_ads" checked>
                                                <label class="form-check-label" for="has_ads">
                                                    <?=_("Ads (flat rate 5 CAD)")?>
                                                </label>
                                                <label class="text-muted" for="start_date"><?=_("Start: ")?><input id="startDate" name="startDate" type="date" class="form-control" required > </label>
                                                <label lass="text-muted" for="end_date"><?=_("Ends: ")?><input id="endDate" name="endDate" type="date" class="form-control "required ></label>

                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                                            <div class="custom-file mt-3 mb-3">
                                                <img id="product_preview" src="/resources/images/item_image.png" class="img-fluid d-flex justify-content-center m-auto p-auto" style="max-height: 250px;" alt="product photo"><br>
                                                <button onclick="uploadProductImg()" type="button" class="btn btn-outline-dark btn-sm mb-2 d-flex justify-content-center m-auto p-auto" data-mdb-ripple-color="dark" style="z-index: 1;">
                                                    <?=_("UPLOAD IMAGE")?>
                                                </button>
                                                <input class='form-control' type="file" name="product_image" id="product_image" required hidden />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?=_("Close")?></button>
                                            <button type="submit" name="action" class="btn btn-primary"><?=_("Save changes")?></button>
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

        $("#product_image").click();
        product_image.onchange = evt => {
            const [file] = product_image.files
            if (file) {
                product_preview.src = URL.createObjectURL(file)
            }
        }
    }
</script>
<!-- Modal ENDS-->