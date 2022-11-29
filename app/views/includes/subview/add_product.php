<!-- Modal STARTS-->
<?php
$categories = $data['categories'];
?>
<div class="modal fade" id="addItemModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- PRODUCT LAYOUT STARTS -->
                <div class="row">
                    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                            <div class="row tm-edit-product-row">
                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <form method="POST" action="" class="tm-edit-product-form">
                                        <div class="form-group mb-3">
                                            <label for="name">Product Name
                                            </label>
                                            <input id="name" name="name" type="text" class="form-control validate" required="">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="description">Description</label>
                                            <textarea class="form-control validate" rows="3" required=""></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="category">Category</label>
                                            <select name="category" class="form-select" id="category">
                                                <option selected="">Select category</option>
                                                <?php for($i = 1; $i < count($categories); $i++){?>
                                                <option value="<?=$i?>"><?= $categories[$i]->prod_category?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3 col-xs-12 col-sm-6">
                                                <label for="expire_date">Expire Date
                                                </label>
                                                <input id="expire_date" name="expire_date" type="text" class="form-control validate hasDatepicker" data-large-mode="true">
                                            </div>
                                            <div class="form-group mb-3 col-xs-12 col-sm-6">
                                                <label for="stock">Units In Stock
                                                </label>
                                                <input id="stock" name="stock" type="text" class="form-control validate" required="">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                                    <div class="custom-file mt-3 mb-3">
                                        <img id="pic_preview" src="/resources/images/item_image.png" class="img-fluid" style="max-height: 250px;" alt="product photo"><br>
                                        <button onclick="uploadProductImg()" type="button" class="btn btn-outline-dark btn-sm mb-2 d-flex justify-content-center m-auto p-auto" data-mdb-ripple-color="dark" style="z-index: 1;">
                                        UPLOAD IMAGE
                                    </button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Product</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT LAYOUT ENDS -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
       function uploadProductImg(){

$("#picture").click();
picture.onchange = evt => {
    const [file] = picture.files
    if (file) {
        pic_preview.src = URL.createObjectURL(file)
    }
}
}
</script>
<!-- Modal ENDS-->
