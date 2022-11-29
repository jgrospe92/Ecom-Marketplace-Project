<?php if ($data) { ?>
    <?php
    $product = new \app\models\Product();
    ?>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
                <div class="">
                    <h1 class=" fst-italic text-center">Awesome Products</h1>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 ">
                <?php foreach ($data as $ads) {?>
                    <?php
                    $product = $ads->getProduct();
                    ?>
                    <div class="col">
                        <span class="badge bg-secondary">Sponsored</span>
                        <div class="card shadow-sm  " style="width: 18rem;">
                            <div class="card-header"><?= $ads->description ?></div>
                            <img src="/images/<?= $product->product_image ?>" class="card-img-top" width=100% height="225" style="object-fit:cover" alt="<?= $product->prod_name ?>">
                            <div class="card-body">
                                <p class="card-title"><?= $product->prod_name ?></p>
                                <small>
                                    <?php for ($i = 1; $i < $product->rating; $i++) { ?>
                                        <img src="/resources/images/star.png" alt="ratings">
                                    <?php } ?>
                                </small>
                                <p class="card-text"><?= $product->prod_desc ?></p>
                                <strong>$<?= $product->prod_cost ?></strong>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-question-square"></i></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-heart"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-bag-plus"></i></button>
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
<?php } ?>