<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- CUSTOM CSS STYLING -->
    <link rel="stylesheet" href="/resources/css/cs_style.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="/resources/js/head.js"></script>

    <!-- Bootstrap ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <title>Marketplace</title>
</head>

<body>
    <header>
        <!-- LOGO -->
        <!-- Catalogue button/ scroll to the catalogue section -->
        <!-- search bar -->
        <!-- login button -->
        
        <?php
        if (isset($_SESSION['user_id']) && isset($_SESSION['profile_id'])){
            $link = "href='/User/logout'";
            //TODO: Add who is currently login "Welcome, current user"
            $status = 'Logout';

            $profile = new \app\models\Profile();
            $profile->user_id = $_SESSION['user_id'];
            $profile = $profile->get();
            if ($profile) {
                $name = $profile->first_name;
            }
            $currentUser = "<p>Welcome, " . $name;
            $profile_icon = ' <a class="btn btn-outline-primary" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-person-bounding-box"></i></a>';
            if ($profile->role == 'buyer'){
                
                $buyer = new \app\models\Buyer();
                $buyer = $buyer->getBuyerUsingProfileId($_SESSION['profile_id']);
                $virtualWallet = number_format((float)$buyer->credit, 2, '.', '');
                $cart = '<button type="button" class="btn btn-success">
                <i class="bi bi-cart pe-2"></i><span id="item_counter" class="badge text-bg-secondary">0</span>
                </button>';
            } else {
                $cart = '';
            }
            $registerBTN = '';
        } else {
            $link = "href='\User\login'";
            $status = 'Login';
            $cart = '';
            $currentUser = '';
            $profile_icon = '';
            $registerBTN = '<a id="index_reg" href="/User/register" class="btn btn-outline-primary">Register</a>';
        }

        ?>
        <!--NAV START  -->
        <nav class="navbar navbar-expand-lg bg-light navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand">Palengke</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/Main/index">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex " role="search">
                        <div class="d-flex align-items-center">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>

                    </form>
                    <form method="POST">
                        <a <?= $link ?> class="btn btn-outline-primary m-2"><?= $status ?></a>
                        <?=$registerBTN?>
                        <?= $profile_icon ?>
                        <?= $cart ?>
                    </form>


                </div>
            </div>
        </nav>
        <!--END NAV -->
    </header>
    <!-- OFF CANVAS -->
    <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title text-light" id="offcanvasRightLabel"><?= $currentUser ?>!</h2>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-group">
                <l1><a class="list-group-item list-group-item-action" href="/Main/profile">Profile</a></l1>
                <l1><a class="list-group-item list-group-item-action" href="">Wishlist</a></l1>
                <l1><a class="list-group-item list-group-item-action" href="">Order History</a></l1>
                <l1><a class="list-group-item list-group-item-action" href="">Virtual Wallet  $<?= $virtualWallet  ?></a></l1>
            </ul>

        </div>
    </div>