<?php $this->view('includes/header'); ?>

<body id="current-user">
    <!-- Create profile starts -->
    <section class="vh-100" style="background-color: #f4f5f7;">
        <form method="post" class="container py-5 h-100" enctype="multipart/form-data">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0 h-100">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                     
                            <div class="col-md-4  gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img id="pic_preview" src="/resources/images/blank.jpg" class="img-fluid my-5" style="max-width:150px" alt="profile photo"><br>
                                <label id="label_image" class="btn btn-secondary" for="picture">Upload<input id="picture" type="file" name="profile_photo"></label>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Create your <span><?= $_SESSION['role']; ?></span> Profile</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <h6>Contact Info</h6>
                                        <div class="col-6 mb-3">
                                            <label for="fname">First Name: <input id="fname" type="text" name="first_name" required></label>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="lname">Last Name: <input id="lname" type="text" name="last_name" required></label>
                                        </div>
                                    </div>
                                    <h6>Address</h6>
                                    <div class="col-6 mb-3">
                                        <label for="shipping_add">Shipping Address: <input id="shipping_add" type="text" name="shipping_add" required></label><br>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="billing_add">Billing Address: <input id="billing_add" type="text" name="billing_add" required></label><br>
                                    </div>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Virtual Wallet</h6>
                                            <label for="credit">Add Credit: <input id="credit" type="text" name="credit" required></label><br>
                                        </div>
                
                                    </div>
                                    <div class="d-flex justify-content-end">
                         
                                        <input id="btnCancel" type="submit" class="btn btn-danger me-3" name="cancel" value="CANCEL">
                                        <input id="create_profile" type="submit" class="btn btn-success" name='action' value="CREATE">
    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- create profile end -->

    <h2>Create your <span><?= $_SESSION['role']; ?></span> PROFILE</h2>
    <div>
        <form method="POST" action="" enctype="multipart/form-data">
            <?php if ($_GET['role'] == 'buyer') { ?>

                <div id="create-profile">
                    <label for="fname">First Name: <input id="fname" type="text" name="first_name" required></label>
                    <label for="lname">Last Name: <input id="lname" type="text" name="last_name" required></label>
                    <div>
                        <!-- <label for="picture">Profile Photo: <input id="picture" type="file" name="profile_photo"></label>
                        <img id="pic_preview" src="/resources/images/blank.jpg" style="max-width:200px;max-height:200px" alt="profile photo"> -->
                    </div>
                    <label for="shipping_add">Shipping Address: <input id="shipping_add" type="text" name="shipping_add" required></label><br>
                    <label for="billing_add">Billing Address: <input id="billing_add" type="text" name="billing_add" required></label><br>
                    <label for="credit">Add Credit: <input id="credit" type="text" name="credit" required></label><br>
                </div>
                <input id="btnCancel" type="submit" class="btn btn-danger" name="cancel" value="CANCEL">
                <input type="submit" class="btn btn-success" name='action' value="CREATE">
            <?php } else { ?>

                <div id="create-profile">
                    <label for="fname">First Name: <input id="fname" type="text" name="first_name" required></label>
                    <label for="lname">Last Name: <input id="lname" type="text" name="last_name" required></label>
                    <div>
                        <label for="picture">Profile Photo: <input id="picture" type="file" name="profile_photo"></label>
                        <img id="pic_preview" src="/resources/images/blank.jpg" style="max-width:200px;max-height:200px" alt="profile photo">
                    </div>
                    <label for="store_name">Store Name: <input id="store_name" type="text" name="vendor_name" required></label><br>
                    <label for="vendor_profit">Capital amount: <input id="vendor_profit" type="text" name="vendor_profit" required></label><br>
                    <label for="description">Store Description: <textarea id="description" placeholder="Tell us something about your store" name="vendor_desc" required></textarea></label>
                    <label for="store_location">Store Location: <input id="store_location" type="text" name="vendor_location" required></label><br>
                </div>
                <input id="btnCancel" type="submit" class="btn btn-danger" name="cancel" value="CANCEL">
                <input type="submit" class="btn btn-success" name='action' value="CREATE">


            <?php } ?>
        </form>
        
    </div>
    <div>
        <?php
        if (isset($_GET['error'])) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?= $_GET['error'] ?>
            </div>
        <?php
        }
        ?>
    </div>

    <!-- IMAGE PREVIEW -->
    <script>
        picture.onchange = evt => {
            const [file] = picture.files
            if (file) {
                pic_preview.src = URL.createObjectURL(file)
            }
        }
        // AJAX CALSS
        $('#btnCancel').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                    url: '/Profile/create_profile',
                    type: 'POST',
                    data: {
                        'cancel': 'cancel'
                    },
                }

            ).done(function() {
                location.href = '/Main/index';
            })
        });

    </script>
    <script src="/resources/js/main_script.js"></script>
</body>

</html>