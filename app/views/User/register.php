<?php $this->view('includes/header'); ?>


<!-- Register page starts -->
<section class="vh-50" style="background-color: #eee; ">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4"><?=_("Sign up")?></p>

                                <form method="post" class="mx-1 mx-md-4">
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="username" id="username" class="form-control" />
                                            <label class="form-label" for="username"><?=_("Username")?></label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" name="password" id="password" class="form-control" />
                                            <label class="form-label" for="password"><?=_("Password")?></label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" name="password_verify" id="password_verify" class="form-control" />
                                            <label class="form-label" for="password_verify"><?=_("Repeat your password")?></label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <select id="role " required name="role" class="form-select" aria-label="Default select example">
                                                <option selected value="buyer"><?_("Buyer")?></option>
                                                <option value="vendor"><?_("Vendor")?></option>
                                            </select>
                                            <label class="form-label" for="user_role"><?=_("Account type")?></label>
                                        </div>
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value="" required id="form2Example3c" />
                                        <label class="form-check-label" for="form2Example3">
                                        <?_("I agree all statements in")?> <a href="#!"><?= _("Terms of service")?></a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-start mx-4 mb-3 mb-lg-4 ">
                                        <a class="btn btn-danger btn-lg me-2 me-lg-4" href="/Main/index"><?=_("CANCEL")?> </a>
                                        <button type="submit" id="regUser" name='action' class="btn btn-primary btn-lg"><?=_("REGISTER")?> </button>
                                    </div>
                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center align-self-center  order-1 order-lg-2">

                                <img src="https://images.unsplash.com/photo-1605902711622-cfb43c4437b5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2069&q=80" class="img-fluid " alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- TOAST START -->
<?php
if (isset($_GET['error'])) {
?>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="/resources/images/warning.png" class="rounded me-2" alt="...">
                <strong class="me-auto"><?=_("Invalid Credentials")?> </strong>
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
        // var today = new Date();
        // var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

        // $('currenTime').html = time;
        const toastLiveExample = document.getElementById('liveToast')
        const toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
    </script>
    <!-- SCRIPT ENDS -->


<?php
}
?>
<!-- TOAST ENDS -->
<!-- FOOTER STARTS -->
<?php $this->view('includes/footer') ?>
<!-- FOOTER ENDS -->
<script src="/resources/js/main_script.js"></script>
</body>

</html>