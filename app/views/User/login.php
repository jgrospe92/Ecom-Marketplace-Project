<?php $this->view('includes/header'); ?>


<!-- LOGIN START -->
<section class="vh-100" style="background-color: #eee;">
    <div class="container-fluid card text-black h-custom">
        <div style="border-radius: 25px;" class="card-body row d-flex justify-content-center align-items-center vh-100 ">
            <div class="col-md-9 col-lg-6 col-xl-5 ">
                <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="img-fluid" alt="Business image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

                <form method="post">
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start pt-5">
                        <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="bi bi-google"></i>
                        </button>

                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="bi bi-microsoft"></i>
                        </button>

                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="bi bi-twitter"></i>
                        </button>
                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Or</p>
                    </div>

                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="username" name="username" required class="form-control form-control-lg" placeholder="Enter username" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" id="password" name="password" required class="form-control form-control-lg" placeholder="Enter password" />

                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <a href="/Main/index" class="btn btn-lg btn-danger" style="padding-left: 2.5rem; padding-right: 2.5rem;">CANCEL</a>
                        <input type="submit" id="loginUser" name="action" value="LOGIN" class="btn btn-success btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;"></input>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href='/User/register' class="link-danger">REGISTER</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
<!-- LOGIN END -->
<!-- TOAST START -->
<?php
if (isset($_GET['error'])) {
?>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="/resources/images/warning.png" class="rounded me-2" alt="...">
                <strong class="me-auto">Invalid Credentials</strong>
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