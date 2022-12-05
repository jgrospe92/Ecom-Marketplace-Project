<!DOCTYPE html>
<html dir='<?= _('ltr') ?>' lang='<?= $lang ?>'>

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

    <title>Palengke</title>
</head>

<body>
    <header>
        <!-- LOGO -->
        <!-- Catalogue button/ scroll to the catalogue section -->
        <!-- search bar -->
        <!-- login button -->

        <?php
        if (isset($_SESSION['user_id']) && isset($_SESSION['profile_id'])) {
            $link = "href='/User/logout'";
            //TODO: Add who is currently login "Welcome, current user"
            $status = 'Logout';

            $profile = new \app\models\Profile();
            $profile->user_id = $_SESSION['user_id'];
            $profile = $profile->get();
            if ($profile) {
                $name = $profile->first_name;
            }
            $currentUser = "<p>". _("Welcome ") . $name . "</p>";
            $profile_icon = ' <a class="btn btn-outline-primary" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-person-bounding-box"></i></a>';
            if ($profile->role == 'buyer') {
                $oderCart = new \app\models\Order();
                $oderDetails = new \app\models\OrderDetails();
                $buyer = new \app\models\Buyer();
                $buyer = $buyer->getBuyerUsingProfileId($_SESSION['profile_id']);
                $itemsOnMyCart = 0;
                if ($oderCart->getUnpaidOrder($buyer->buyer_id)) {
                    $oderCart = $oderCart->getUnpaidOrder($buyer->buyer_id);
                    $oderDetails = $oderDetails->getAll($oderCart->order_id);
                    $itemsOnMyCart = count($oderDetails) > 0 ? count($oderDetails) : "0";
                } else {
                    $itemsOnMyCart  = 0;
                }


                $virtualWallet = number_format((float)$buyer->credit, 2, '.', '');
                $cart = '<button onclick="location.href = \'/Buyer/cart/\'" type="button" class="btn btn-success">
                <i class="bi bi-cart pe-2"></i><span id="item_counter" class="badge text-bg-secondary">' . $itemsOnMyCart . '</span></button>';
                $dashboard = '/Buyer/wishlist/' . $buyer->buyer_id;
                $dashboard_name = 'Wishlist';
                // $dashboard_two = ' <l1><a class="list-group-item list-group-item-action" href="">Order History</a></l1>';
                $dashboard_two = "";
            } else {
                $vendor = new \app\models\Vendor();
                $vendor = $vendor->getVendorUsingProfileId($_SESSION['profile_id']);
                $cart = '';
                $dashboard = "";
                $dashboard_name = "Dashboard";
                $virtualWallet =  number_format((float)$vendor->vendor_profit, 2, '.', '');
                $dashboard_two = '';
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
        <nav class="navbar fixed-top navbar-expand-lg bg-light navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand">Palengke</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/Main/index"><?= _("Home") ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><?= _("About us") ?></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= _("Products") ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#section_catalogue"><?= _("Newest") ?></a></li>
                                <li><a class="dropdown-item" href="#section_ads"><?= _("Hot picks!") ?></a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#section_promo"><?= _("On sale") ?></a></li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li> -->
                    </ul>


                    <form class="d-flex " role="search">
                        <div class="d-flex align-items-center">
                            <!-- LOCALIZATION STARTS -->

                            <select onchange="changeLocale(this);" class="form-control form-select w-50 me-2" aria-label="Default select example">
                                <option selected><?=_("Choose Language")?></option>
                                <option <?= \app\core\Helper::checkEnLocale() ?> value="english"><?= _("English") ?></option>
                                <option <?= \app\core\Helper::checkFrLocale() ?>  value="french"><?= _("French") ?></option>
                            </select>
                            <!-- LOCALIZATION ENDS -->
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit"><?= _("Search") ?></button>
                        </div>

                    </form>
                    <form method="POST">
                        <a <?= $link ?> class="btn btn-outline-primary m-2"><?= $status ?></a>
                        <?= $registerBTN ?>
                        <?= $profile_icon ?>
                        <?= $cart ?>
                    </form>
                    <script>
                        function changeLocale(language){
                            if(language.value == "french") {
                                $.ajax({
                                    type: "GET",
                                    url: "/Main/makeSessionLang",
                                    data: {lang : language.value},
                                    success: function(data) {
                                        location.href = data;
                                    }
                                })
                            } else {
                                $.ajax({
                                    type: "GET",
                                    url: "/Main/makeSessionLang",
                                    data: {lang : language.value},
                                    success: function(data) {  
                                        location.href = data;
                                        
                                    }
                                })
                            }
                        }
                    </script>

                </div>
            </div>
        </nav>
        <!--END NAV -->
    </header>
    <!-- OFF CANVAS -->
    <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title text-light" id="offcanvasRightLabel"><?= $currentUser ?></h2>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-group">
                <l1><a class="list-group-item list-group-item-action" href="/Main/profile"><?= _("Profile") ?></a></l1>
                <l1><a class="list-group-item list-group-item-action" href="<?= $dashboard ?>"><?= $dashboard_name ?></a></l1>
                <?= $dashboard_two ?>
                <l1><a class="list-group-item list-group-item-action" href=""><?= _("Virtual Wallet $") ?><?= $virtualWallet  ?></a></l1>
            </ul>

        </div>
    </div>
    <br>
    <br>
    <br>