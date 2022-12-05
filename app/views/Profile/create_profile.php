<?php $this->view('includes/header'); ?>

<body id="current-user">
    <!-- Create profile starts -->
    <section class="vh-100" style="background-color: #f4f5f7;">
        <form method="post" class="container py-5 h-100" enctype="multipart/form-data">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0 h-100">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <?php if ($_GET['role'] == 'buyer') { ?>
                                <div class="col-md-4  gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                    <img id="pic_preview" src="/resources/images/blank.jpg" class="img-fluid my-5" style="max-width:150px" alt="profile photo"><br>
                                    <label id="label_image" class="btn btn-secondary" for="picture">Upload<input id="picture" type="file" name="profile_photo"></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <h6><?=_("Create your")?><span><?= $_SESSION['role']; ?></span><?=_("Profile")?></h6>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <h6><?=_("Contact Info")?></h6>
                                            <div class="col-6 mb-3">
                                                <label for="fname"><?=_("First Name: ")?><input id="fname" type="text" name="first_name" required></label>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="lname"><?=_("Last Name: ")?><input id="lname" type="text" name="last_name" required></label>
                                            </div>
                                        </div>
                                        <h6><?=_("Address")?></h6>
                                        <div class="col-6 mb-3">
                                            <label for="shipping_add"><?=_("Shipping Address: ")?><input id="shipping_add" type="text" name="shipping_add" required></label><br>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="billing_add"><?=_("Billing Address: ")?><input id="billing_add" type="text" name="billing_add" required></label><br>
                                        </div>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6><?=_("Virtual Wallet")?></h6>
                                                <label class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop" for="credit"><?=_("Add Credit")?></label>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <br><input class="form-control-plaintext" value="0.00" id="credit" type="text" name="credit" readonly required>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-end">

                                            <input id="btnCancel" type="submit" class="btn btn-danger me-3" name="cancel" value="CANCEL">
                                            <input id="create_profile" type="submit" class="btn btn-success" name='action' value="CREATE">

                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <!-- VENDOR STARTS -->
                                <div class="col-md-4  gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                    <img id="pic_preview" src="/resources/images/blank.jpg" class="img-fluid my-5" style="max-width:150px" alt="profile photo"><br>
                                    <label id="label_image" class="btn btn-secondary" for="picture"><?=_("Upload")?><input id="picture" type="file" name="profile_photo"></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <h6><?=_("Create your")?><span><?= $_SESSION['role']; ?></span><?=_("Profile")?></h6>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <h6><?=_("Contact Info")?></h6>
                                            <div class="col-6 mb-3">
                                                <label for="fname"><?=_("First Name: ")?><input id="fname" type="text" name="first_name" required></label>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="lname"><?=_("Last Name: ")?><input id="lname" type="text" name="last_name" required></label>
                                            </div>
                                        </div>
                                        <h6><?=_("Store details")?></h6>
                                        <div class="col-6 mb-3">
                                            <label for="store_name"><?=_("Store Name: ")?><input id="store_name" type="text" name="vendor_name" required></label><br>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="description"><?=_("Store Description: ")?><textarea rows='3' cols="50" id="description" placeholder="Tell us something about your store" name="vendor_desc" required></textarea></label>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="store_location"><?=_("Store Location: ")?><input id="store_location" type="text" name="vendor_location" required></label>
                                        </div>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6><?=_("Virtual Wallet")?></h6>
                                                <label class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop" for="credit"><?=_("Add Credit")?></label>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <br><input class="form-control-plaintext" value="0.00" id="credit" type="text" name="credit" readonly required>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-end">

                                            <input id="btnCancel" type="submit" class="btn btn-danger me-3" name="cancel" value="CANCEL">
                                            <input id="create_profile" type="submit" class="btn btn-success" name='action' value="CREATE">

                                        </div>
                                    </div>
                                </div>
                                <!-- VENDOR ENDS -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- create profile end -->

    <!-- TOAST START -->
    <?php
    if (isset($_GET['error'])) {
    ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="/resources/images/warning.png" class="rounded me-2" alt="...">
                    <strong class="me-auto">Error</strong>
                    <small id="currenTime"></small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <?= $_GET['error'] ?>
                </div>
            </div>
        </div>
        <!-- SCRIPT -->
        <script>
            const toastLiveExample = document.getElementById('liveToast')
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        </script>
        <!-- SCRIPT ENDS -->
    <?php
    }
    ?>
    <!-- TOAST ENDS -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Reload virtual wallet</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modal_payment" class="row g-3 align-items-center">
                        <div class="col-5">
                            <label for="card_number" class="col-form-label">Credit Card Number</label>
                        </div>
                        <div class="col-5">
                            <input type="text" maxlength="16" id="card_number" class="form-control" aria-describedby="card_number">
                        </div>
                        <div class="col-5">
                            <label for="card_holder" class="col-form-label">Card Holder Name</label>
                        </div>
                        <div class="col-5">
                            <input type="text" id="card_holder" class="form-control" aria-describedby="card_holder">
                        </div>
                        <div class="col-5">
                            <label for="card_expiration" class="col-form-label">Expiration date</label>
                        </div>
                        <div class="col-5">
                            <input type="month" id="card_expiration" class="form-control" aria-describedby="card_expiration">
                        </div>
                        <div class="col-5">
                            <label for="card_csc" maxlength="3" class="col-form-label">Security Number</label>
                        </div>
                        <div class="col-5">
                            <input type="password" id="card_csc" class="form-control w-25" aria-describedby="card_csc">
                        </div>
                        <div class="col-5">
                            <label for="reload_amount" class="col-form-label">Amount</label>

                        </div>
                        <div class="col-5">
                            <input type="text" id="reload_amount" class="form-control w-50" aria-describedby="reload_amount_line">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="clearForm()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="reload_virtual_wallet" type="button" data-bs-dismiss="modal" class="btn btn-primary" disabled>Done</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL ENDS -->
    <!-- TOAST FOR MODAL STARTS -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="modalToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="/resources/images/profits.png" class="rounded me-2" alt="...">
                <strong class="me-auto">Success</strong>
                <small id="currenTime"></small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <p id="addedAmount"></p>
            </div>
        </div>
    </div>
    <!-- TOAST FOR MODAL ENDS -->
    <!-- IMAGE PREVIEW -->
    <script>
        function debugMe(value) {
            console.log(value);
        }

        function round(value, decimals) {
            return Number(Math.round(value + 'e' + decimals) + 'e-' + decimals)
        }

        // Modal Script
        var hasCreditNum;
        var hasCreditName;
        var hasDate;
        var hasSecNum;
        var hasAmount;

        var totalAmount = 0;

        var creditNum, creditName, scs;
        var expDate;
        var amount;

        $("#card_number").focusout(function() {
            credit_num = $("#card_number").val();
            hasCreditNum = (!credit_num) ? false : true
            checkIfValid();

        })

        $("#card_holder").focusout(function() {
            creditName = $("#card_holder").val();
            hasCreditName = (!creditName) ? false : true;
            checkIfValid();
        })

        $("#card_expiration").focusout(function() {
            expDate = new Date($("#card_expiration").val());
            hasDate = (isNaN(expDate)) ? false : true
            checkIfValid();
        })

        $("#card_csc").focusout(function() {
            scs = $("#card_csc").val();
            hasSecNum = (!scs) ? false : true;
            checkIfValid();
        })

        $("#reload_amount").focusout(function() {
            amount = $("#reload_amount").val();
            hasAmount = (!amount) ? false : true;
            debugMe(hasAmount);
            checkIfValid();

        })

        $("#reload_virtual_wallet").on('click', function() {
            totalAmount += round(amount, 2)
            var value = totalAmount.toString();
            $("#credit").val(value);
            $("#addedAmount").html("$" + value + " added to your account");
            let toastLiveExample = document.getElementById('modalToast');
            let toast = new bootstrap.Toast(toastLiveExample);
            toast.show();
            clearForm();

        })

        function clearForm() {
            $("#card_number").val("");
            $("#card_holder").val("");
            $("#card_expiration").val("");
            $("#card_csc").val("");
            $("#reload_amount").val("");

            hasCreditNum = false;
            hasCreditName = false;
            hasDate = false;
            hasSecNum = false;
            hasAmount = false;
            $("#reload_virtual_wallet").attr("disabled", true);
        }

        function checkIfValid() {
            if (hasCreditNum && hasCreditNum && hasAmount && hasDate && hasSecNum && hasAmount) {
                $("#reload_virtual_wallet").removeAttr("disabled");
            } else {
                $("#reload_virtual_wallet").attr("disabled", true)
            }
        }

        // image preview
        picture.onchange = evt => {
            const [file] = picture.files
            if (file) {
                pic_preview.src = URL.createObjectURL(file)
            }
        }

        // AJAX CALLS
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
    <!-- FOOTER STARTS -->
    <?php $this->view('includes/footer') ?>
    <!-- FOOTER ENDS -->
    <script src="/resources/js/main_script.js"></script>
</body>

</html>