<?php if ($data) { ?>
    <?php
    $product = new \app\models\Product();
    $category = new \app\models\Category();
    $wishlist = new \app\models\Wishlist();
    $buyer = $data['buyer'];
    ?>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
                <div class="">
                    <h1 class=" fst-italic text-center">Hot Deals</h1>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 ">
                <?php foreach ($data['promotions'] as $promotion) { ?>
                    <?php
                    $product = $product->get($promotion->prod_id);
                    ?>
                    <div class="col">
                    <span class="badge bg-secondary">On Sale!</span>
                        <div class="card shadow-sm h-100 " style="width: 18rem;">
                            <div class="card-header"><?= $promotion->promo_name ?></div>
                            <img src="/images/<?= $product->product_image ?>" class="card-img-top" width=100% height="225" style="object-fit:cover" alt="<?= $product->prod_name ?>">
                            <div class="card-body">
                                <p class="card-title"><?= $product->prod_name ?></p>
                                <small>
                                    <?php for ($i = 1; $i < $product->rating; $i++) { ?>
                                        <img src="/resources/images/star.png" alt="ratings">
                                    <?php } ?>
                                </small>
                                <p class="card-text"><?= $product->prod_desc ?></p>
                                <p class="card-text text-muted"><em><?php echo  $category->get($product->prod_cat_id)?></em></p>
                                <em><del>was$<?= $product->prod_cost ?></del></em><strong class="ms-2">$<?php $newPrice = $product->prod_cost - ($product->prod_cost * $promotion->discount_percent / 100); echo $newPrice; ?> </strong>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><i onclick="checkDetails3(<?=$product->prod_id?>);" class="bi bi-question-square"></i></i></button>
                                        <button onclick="addToWishlist3(<?=$product->prod_id?>,  <?php if ($buyer) {$buyer->buyer_id; }?>);" <?php $active = isset($_SESSION['role']) ? ($_SESSION['role'] == 'buyer' ? "" : "disabled") : "disabled"; echo $active; ?> type="button" class="btn btn-sm btn-outline-secondary"><i id="promo<?=$product->prod_id?>"<?= $wishlist->checkInkWishList($product->prod_id) ? "class='bi bi-heart-fill'" : "class='bi bi-heart'"; ?>></i></button>
                                        <button onclick="addToCartSales(<?=$product->prod_id?>)" <?php $active = isset($_SESSION['role']) ? ($_SESSION['role'] == 'buyer' ? "" : "disabled") : "disabled"; echo $active; ?> type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-bag-plus"></i></button>
                                    </div>
                                    <small class="text-muted">QTY <?= $product->num_of_stock ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
                <div class="">
                    <h1 class=" fst-italic text-center">Hot Deals</h1>
                </div>
            </div>
            <div class="alert alert-danger" role="alert">
                    There are no discounted products, stay tuned for the next sale event!
                </div>
        </div>
    </div>

<?php } ?>
<div id="check_detailSale"></div>
<script>
    
    function checkDetails3(id){
        $.ajax({
            type: 'GET',
            url: '/Product/details/'+id,
            success: function(data){
                $('#check_details').html("");
                $('#check_detailSale').html(data);
                console.log(data);
                $('#productDetailModal').modal('show')
            }
        })
       
    }

    function addToWishlist3(prod_id, buyer_id){
        $.ajax({
            type: 'GET',
            url: '/Product/addToWishList/',
            data: {prod_id : prod_id, buyer_id: buyer_id},
            success: function(data){
                var currentClass = $('#'+prod_id).attr("class");
                $('#'+prod_id).addClass(data).removeClass(currentClass);
            }
        })
    }

    function addToCartSales($prod_id) {
        
        $.ajax({
            type: 'GET',
            url: '/Buyer/addToCart/'+$prod_id,
            success: function(data){
                var currentCartCount = parseInt($('#item_counter').text());
                $('#item_counter').text(++currentCartCount);
            }
        })
    }
</script>