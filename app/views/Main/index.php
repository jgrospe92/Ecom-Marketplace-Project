<?php $this->view('includes/header') ?>

<body>
    <header>
        <!-- LOGO -->
        <!-- Catalogue button/ scroll to the catalogue section -->
        <!-- search bar -->
        <!-- login button -->
        <?php
        if (isset($_SESSION['user_id'])) {
            $link = "href='/User/logout'";
            //TODO: Add who is currently login "Welcome, current user"
            $status = 'Logout';

            $profile = new \app\models\Profile();
            $profile->user_id = $_SESSION['user_id'];
            $profile = $profile->get();
            $name = $profile->first_name;
            $currentUser = "<p>Welcome, " . $name;
            $profile_icon = '<i class="bi bi-person-bounding-box"></i>';
            $cart = '<button type="button" class="btn btn-success">
                    <i class="bi bi-cart pe-2"></i><span id="item_counter" class="badge text-bg-secondary">0</span>
                    </button>';
        } else {
            $link = "href='\User\login'";
            $status = 'Login';
            $cart = '';
            $currentUser = '';
            $profile_icon = '';
        }

        ?>
        <div>
            <a <?= $link ?> class="btn btn-outline-primary"><?= $status ?></a>
            <a class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" href=""> <?= $profile_icon ?> </a>
            <?= $cart ?>
        </div>
       
        <!-- cart button -->
    </header>
    <!-- OFF CANVAS -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel"><?= $currentUser  ?>,</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            ...
        </div>
    </div>
    <!-- END OFF CANVAS -->
    <input type="text" placeholder="Search item/vendor">
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