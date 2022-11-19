<?php $this->view('includes/header'); ?>


<!-- LOGIN START -->
<section class="vh-100" style="background-color: #eee;">
    <div class="container-fluid card text-black h-custom">
        <div style="border-radius: 25px;" class="card-body row d-flex justify-content-center align-items-center h-100 ">
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

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Remember me
                            </label>
                        </div>
                        <!-- <a href="#!" class="text-body">Forgot password?</a> TODO:-->
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <input type="submit" name="action" value="LOGIN" class="btn btn-success btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;"></input>
                        <a href="/Main/index" class="btn btn-lg btn-danger" style="padding-left: 2.5rem; padding-right: 2.5rem;">CANCEL</a>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href='/User/register' class="link-danger">Register</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
<!-- LOGIN END -->
<?php
if (isset($_GET['error'])) {
?>
    <div class="alert alert-danger" role="alert">
        <?= $_GET['error'] ?>
    </div>
<?php
}
?>
<script src="/resources/js/main_script.js"></script>
</body>

</html>