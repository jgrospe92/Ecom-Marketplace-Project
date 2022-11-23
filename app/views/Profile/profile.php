<?php $this->view('includes/header') ?>

<?php

if ($data['role'] == 'buyer') {

    $profile = $data['profile'];
    $buyer = $data['buyer'];
    $fullname = ucfirst($profile->first_name) . " " . ucfirst($profile->last_name);
}

?>

<!-- Profile starts -->
<div id="context"> 
    <section class="h-100 gradient-custom-2">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card">
                        <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                <img src="/images/<?= $profile->profile_photo ?>" alt="Profile photo" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1; max-height: 180px; object-fit: contain;">
                                <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark" style="z-index: 1;">
                                    Edit profile
                                </button>
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
                                    <p class="small text-muted mb-0">Following</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4 text-black">
                            <div class="mb-5">
                                <p class="lead fw-normal mb-1">Info</p>
                                <div class="p-4" style="background-color: #f8f9fa;">
                                    <p class="font-italic mb-1">Shipping : <?= $buyer->shipping_add ?></p>
                                    <p class="font-italic mb-1">Billing : <?= $buyer->billing_add ?></p>
                                    <p class="font-italic mb-0">Virtual Waller : $<?= $buyer->credit ?></p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-0">Order History</p>
                            </div>
                            <?php $this->view('includes/table', $profile) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Profile ends -->

<?php $this->view('includes/footer'); ?>
<script src="/resources/js/main_script.js"></script>
</body>

</html>