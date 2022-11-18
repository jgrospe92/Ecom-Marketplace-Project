<?php $this->view('includes/header');?>
<body>
    <h1>Register</h1>
    <div>
        <ul class="nav nav-pills ">
            <li class="nav-item">
                <a id="buyer" class="nav-link active" onclick="registerUser(id);" aria-current="page">Buyer</a>
            </li>
            <li  class="nav-item">
                <a id="vendor" onclick="registerUser(id);" class="nav-link">Vendor</a>
            </li>
        </ul>

    </div>
    <form method="POST" action="">
        <div id="reg_form">
            
            <label for="username">Username: <input placeholder="Enter buyer username"
                type="text" name="username" id="username" required></label><br>
            <label for="password">Password: <input placeholder="Enter password"
                type="password" name="password" id="password" required></label><br>
            <label for="password_verify">Confirm Password: <input placeholder="Re-enter password"
                type="password" name="password_verify" id="password_verify" required></label><br>
        </div>
            <a class="btn btn-danger"  href="/Main/index">CANCEL</a>
            <button type="submit" name="action" class="btn btn-success" id="btnRegister">REGISTER</button>
    </form>
    <?php
    if(isset($_GET['error'])){
    ?>
    <div class="alert alert-danger" role="alert">
        <?=$_GET['error']?>
    </div>
    <?php
    }
    ?>
    <script src="/resources/js/main_script.js"></script>
</body>
</html>
