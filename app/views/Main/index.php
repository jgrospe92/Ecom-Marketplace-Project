<?php $this->view('includes/header') ?>
<body>
    <header>
        <!-- LOGO -->
        <!-- Catalogue button/ scroll to the catalogue section -->
        <!-- search bar -->
        <!-- login button -->
        <?php 
            if (isset($_SESSION['user_id'])){
                $link = "href='/User/logout'";
                //TODO: Add who is currently login "Welcome, current user"
                $status = 'Logout';

                $profile = new \app\models\Profile();
                $profile->user_id = $_SESSION['user_id'];
                $profile = $profile->get();
                $name = $profile->first_name;
                $currentUser = "<p>Welcome, " . $name;

            } else {
                $link = "href='\User\login'";
                $status = 'Login';

                $currentUser = '';
            }

        ?>
        <div>
            <a <?= $link ?>><?= $status ?></a>
            <?= $currentUser ?>
        </div>
        
        <!-- cart button -->
    </header>
    <h1>Welcome to the Marketplace</h1>
    <section>
        <h1>This area is for carousel</h1>
    </section>
    <section>
        <h1>This section displays advertisement</h1>
    </section>
    <section>
        <h1>This section display product catalogue</h1>
        <p>Sorted by the newest product added by default</p>
    </section>

</body>
</html>