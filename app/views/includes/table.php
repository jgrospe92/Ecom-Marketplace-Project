<?php $category = new \app\models\Category(); ?>
<?php if ($data['profile']->role == 'buyer') { ?>
    <div id="table_body" class="table-responsive">
        <table class="table table-dark table-striped table-hover table-bordered caption-top">
            <caption><?=_("Order by latest")?></caption>
            <thead class="sticky-top">
                <tr>
                    <th class="w-25" scope="col"><?=_("Order Number")?></th>
                    <th scope="col"><?=_("Product Name")?></th>
                    <th scope="col"><?=_("Category")?></th>
                    <th scope="col"><?=_("Quantity")?></th>
                    <th scope="col"><?=_("Cost")?></th>
                    <th scope="col"><?=_("Status")?></th>
                    <th scope="col"><?=_("Action")?></th>
                </tr>
            </thead>
            <tbody>
                <!-- TODO: Loop through the order details -->
                <tr>
                <div class="alert alert-danger" role="alert">
                <i class="bi bi-exclamation-octagon-fill me-2"></i><?=_("Order history is empty!")?>
                </div>
                    <!-- <th scope="row">175334</th>
                    <td>Steam deck</td>
                    <td>Electronics</td>
                    <td>1</td>
                    <td>$999</td>
                    <td>Delivered </td>
                    <td class="m-auto p-auto"><i class="bi bi-question-square align-bottom btn text-light"></i></td> -->
                </tr>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <?php $products = $data['products']; ?>
    <div id="table_body" class="table-responsive">
        <table class="table table-dark table-striped table-hover table-bordered caption-top">
            <caption><?=_("Order by latest")?></caption>
            <thead class="sticky-top">
                <tr>
                    <th scope="col"><?=_("Product Name")?></th>
                    <th scope="col"><?=_("Category")?></th>
                    <th scope="col"><?=_("Quantity")?></th>
                    <th scope="col"><?=_("Cost")?></th>
                    <th class="w-25" scope="col"><?=_("Action")?></th>
                </tr>
            </thead>
            <tbody>
                <!-- TODO: Loop through the order details -->
                <?php if (count($data['products']) > 0) { ?>
                    <?php foreach ($data['products'] as $product) { ?>
                        <tr id=<?= $product->prod_id ?>>
                            <td><?= $product->prod_name ?></td>
                            <td><?= $category->get($product->prod_cat_id) ?></td>
                            <td><?= $product->num_of_stock ?></td>
                            <td><?= $product->prod_cost ?></td>
                            <td class="m-auto p-auto"><i onclick="checkDetails(<?= $product->prod_id ?>);" class="bi bi-question-square btn text-light"></i><i onclick="showEditProduct(<?= $product->prod_id ?>);" class="bi bi-pencil-square btn text-light"></i><i onclick="deleteItem(<?= $product->prod_id ?>);" class="bi bi-trash btn text-light"></i></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
        <?php if (count($data['products']) == 0) {
            echo '<div class="alert alert-danger" role="alert">
            <i class="bi bi-exclamation-octagon-fill me-2"></i> Oh no!! You don\'t have any listing!
          </div>';
        } ?>
    </div>
<?php } ?>
<div id="check_details"></div>
<div id="edit_product"></div>
<style>
    #table_body {
        max-height: clamp(5em, 30vh, 350px) !important;
        overflow: auto !important;
    }
</style>

<!-- PRODUCT DETAILS STARTS -->
<script>
    function checkDetails(id) {
        $.ajax({
            type: 'GET',
            url: '/Product/details/' + id,
            success: function(data) {

                $('#check_details').html(data);

                $('#productDetailModal').modal('show')
            }
        })

    }

    function showEditProduct(id) {
        $.ajax({
            type: 'GET',
            url: '/Product/showEditProduct/' + id,
            success: function(data) {

                $('#edit_product').html(data);

                $('#editProductModel').modal('show')
            }
        })
    }
</script>

<!-- PRODUCT DETAILS ENDS -->