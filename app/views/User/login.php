<?php $this->view('includes/header'); ?>

<body>
    <h1>LOG IN</h1>
    <form action="" method="post">

        <label for="">Username: <input type="text" name="username"></label><br>
        <label for="">Username: <input type="text" name="username"></label><br>
        <div>
            <a href="/Main/index" class="btn btn-danger">CANCEL</a>
            <input name="action" type="button" class="btn btn-success" onclick="alert('login success')" value="LOGIN">
        </div>
        <a href='/User/register'>Not a member? click me to register</a>
    </form>
    <?php
        if (isset($_GET['error'])) {
        ?>
        <div class="alert alert-danger" role="alert">
            <?=$_GET['error']?>
        </div>
        <?php
        }
    ?>
    <script src="/resources/js/script.js"></script>
</body>
</html>