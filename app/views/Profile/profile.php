<?php $this->view('includes/header') ?>

<?php


if ($data['role'] == 'buyer') {

    $profile = $data['profile'];
    $buyer = $data['buyer'];
    $fullname = ucfirst($profile->first_name) . " " . ucfirst($profile->last_name);
} else {
    $profile = $data['profile'];
    $vendor = $data['vendor'];
    $fullname = ucfirst($profile->first_name) . " " . ucfirst($profile->last_name);
    //PRODUCTS
    $products = new \app\models\Product();
    $products = $products->getMyProducts($vendor->vendor_id);

    // CATEGORY
    $categories = new \app\models\Category();
    $categories = $categories->getAll();
}

?>
<!-- Profile starts -->
<?php if ($data['role'] == 'buyer') { ?>
    <div id="context">
        <section id="section_profile" class="h-100 gradient-custom-2">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-9 col-xl-7">
                        <div class="card">
                            <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                                <div class="ms-4 mt-5 d-flex flex-column " style="width: 150px;">
                                    <img src="/images/<?= $profile->profile_photo ?>" alt="Profile photo" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1; max-height: 180px; object-fit: contain;">

                                    <a id="edit_profile" class="btn btn-outline-dark btn-sm w-75 m-auto p-auto" data-mdb-ripple-color="dark" style="z-index: 1;">
                                        Edit profile
                                    </a>
                                </div>

                                <div class="ms-3" style="margin-top: 130px;">
                                    <h5><?= $fullname ?></h5>
                                    <p><?= strtoupper($profile->role) ?></p>
                                </div>
                            </div>
                            <div class="p-4 text-black" style="background-color: #f8f9fa;">
                                <div class="d-flex justify-content-end text-center py-1">
                                    <div>
                                        <p class="mb-1 h5">253</p>
                                        <p class="small text-muted mb-0">Purchased</p>
                                    </div>
                                    <div class="px-3">
                                        <p class="mb-1 h5">1026</p>
                                        <p class="small text-muted mb-0">Reviewed</p>
                                    </div>
                                    <div>
                                        <p class="mb-1 h5">478</p>
                                        <p class="small text-muted mb-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4 text-black">
                                <div class="mb-5">
                                    <p class="lead fw-normal mb-1">Info</p>
                                    <div class="p-4" style="background-color: #f8f9fa;">
                                        <p class="font-italic mb-1">Shipping : <?= $buyer->shipping_add ?></p>
                                        <p class="font-italic mb-1">Billing : <?= $buyer->billing_add ?></p>
                                        <p class="font-italic mb-0">Virtual Wallet : $<span id="virtualWallet"><?= $buyer->credit; ?></span></p>
                                        <label class="btn btn-success mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop" for="credit">Add Credit</label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="lead fw-normal mb-0">Order History</p>
                                </div>
                                <?php $this->view('includes/table', ['profile' => $profile]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Profile BUYER ends -->
<?php } else { ?>
    <div id="context">
        <section id="section_profile" class="h-100 gradient-custom-2">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-9 col-xl-7">
                        <div class="card">
                            <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                                <div class="ms-4 mt-5 d-flex flex-column " style="width: 150px;">
                                    <img src="/images/<?= $profile->profile_photo ?>" alt="Profile photo" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1; max-height: 180px; object-fit: contain;">

                                    <a id="edit_profile" class="btn btn-outline-dark btn-sm w-75 m-auto p-auto" data-mdb-ripple-color="dark" style="z-index: 1;">
                                        Edit profile
                                    </a>
                                </div>

                                <div class="ms-3" style="margin-top: 130px;">
                                    <h5><?= $vendor->vendor_name ?></h5>
                                    <p><?= strtoupper($profile->role) ?></p>
                                </div>
                            </div>
                            <div class="p-4 text-black" style="background-color: #f8f9fa;">
                                <div class="d-flex justify-content-end text-center py-1">
                                    <div>
                                        <p class="mb-1 h5">253</p>
                                        <p class="small text-muted mb-0">Rating</p>
                                    </div>
                                    <div class="px-3">
                                        <p class="mb-1 h5">1026</p>
                                        <p class="small text-muted mb-0">Sold Products</p>
                                    </div>
                                    <div>
                                        <p class="mb-1 h5">478</p>
                                        <p class="small text-muted mb-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4 text-black">
                                <div class="mb-5">
                                    <p class="lead fw-normal mb-1">Info</p>
                                    <div class="p-4" style="background-color: #f8f9fa;">
                                        <p class="font-italic mb-1">Owner : <?= $fullname ?></p>
                                        <p class="font-italic mb-1">Description : <?= $vendor->vendor_desc ?></p>
                                        <p class="font-italic mb-1">Location : <?= $vendor->vendor_location ?></p>
                                        <p class="font-italic mb-0">Virtual Wallet : $<span id="virtualWallet"><?= $vendor->vendor_profit; ?></span></p>
                                        <label class="btn btn-success mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop" for="credit">Add Credit</label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="lead fw-normal mb-0">Product Listing</p>
                                    <!-- Button trigger modal STARTS -->
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addItemModal">
                                        ADD ITEM
                                    </button>
                                    <!-- Button trigger modal ENDS -->
                                </div>
                                <?php $this->view('includes/table', ['profile' => $profile, 'products' => $products]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } ?>
<!-- PROFILE VENDOR ENDS -->
<!-- SUB VIEW ADD PRODUCT STARTS -->
<?php if (isset($categories)) {
    $this->view('includes/subview/add_product',  ['categories' => $categories]);
} ?>
<!-- SUB VIEW ADD PRODUCT ENDS -->
<!-- TOAST MESSAGE STARTS -->
<?php $this->view('includes/subview/ToastMsg') ?>
<!-- TOAST MESSAGE ENDS -->
<!-- RELOAD WALLET MODAL  -->
<?php $this->view('includes/subview/reload_wallet'); ?>
<?php $this->view('includes/footer'); ?>
<script>
    const myToastEl = document.getElementById('toastUpdate');
    const myToast = bootstrap.Toast.getOrCreateInstance(myToastEl);

    function updateImage() {
        $("#picture").click();
        picture.onchange = evt => {
            const [file] = picture.files
            if (file) {
                pic_preview.src = URL.createObjectURL(file)
            }
        }
    }

    function updateBuyerProfile() {
        var form_data = new FormData();
        var file_data = $("#picture").prop("files")[0];
        form_data.append("file", file_data);
        $.ajax({
            url: " /Profile/edit_profile",
            type: 'POST',
            processData: false, // important
            contentType: false, // important
            data: form_data,
            success: function(data) {

            }

        })

        $.ajax({
            url: " /Profile/edit_profile",
            type: "POST",
            data: {
                update: 'update',
                // PROFILE
                first_name: $("#new_fname").val(),
                last_name: $("#new_lname").val(),
                // BUYER
                shipping_add: $("#new_shipping_add").val(),
                billing_add: $("#new_billing_add").val(),

            },
            success: function(data) {
                showMsgToast();
            }
        })

    }



    function updateVendorProfile() {

        var form_data = new FormData();
        var file_data = $("#picture").prop("files")[0];
        form_data.append("file", file_data);

        $.ajax({
            url: " /Profile/edit_profile",
            type: 'POST',
            processData: false, // important
            contentType: false, // important
            data: form_data,
            success: function(data) {

            }
        })
        $.ajax({
            url: " /Profile/edit_profile",
            type: "POST",
            data: {
                update: 'update',
                // PROFILE
                first_name: $("#new_fname").val(),
                last_name: $("#new_lname").val(),
                // VENDOR
                vendor_desc: $("#new_vendor_desc").val(),
                vendor_location: $("#new_vendor_location").val(),

            },
            success: function(data) {
                showMsgToast();

            }
        })
    }

    function showMsgToast() {
        myToast.show();
        console.log(myToast.isShown());
        setTimeout(
            function() {
                location.href = "/Main/profile";
            }, 2500);
    }
    $(function() {
        $("#edit_profile").click(function() {
            var url = "/Profile/edit_profile"
            $("#section_profile").remove();
            $("#context").load(url + " #section_profile");

        })
    });
</script>

</body>

</html>