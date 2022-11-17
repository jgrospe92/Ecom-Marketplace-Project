<?php $this->view('includes/header'); ?>

<body>
    <h1>LOG IN</h1>
    <form action="" method="post">

        <label for="username">Username: <input id="username" type="text" name="username" required></label><br>
        <label for="password">Password: <input id="password" type="password" name="password" required></label><br>
        <div>
            <a href="/Main/index" class="btn btn-danger">CANCEL</a>
            <input name="action" type="submit" class="btn btn-success" value="LOGIN">
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
    <script src="/resources/js/main_script.js"></script>
</body>
</html>