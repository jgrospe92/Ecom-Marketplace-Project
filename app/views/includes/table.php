<?php $category = new \app\models\Category(); ?>
<?php if ($data['profile']->role == 'buyer') { ?>
    <div id="table_body" class="table-responsive">
        <table class="table table-dark table-striped table-hover table-bordered caption-top">
            <caption>Order by latest</caption>
            <thead class="sticky-top">
                <tr>
                    <th class="w-25" scope="col">Order Number</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- TODO: Loop through the order details -->
                <tr>
                    <th scope="row">175334</th>
                    <td>Steam deck</td>
                    <td>Electronics</td>
                    <td>1</td>
                    <td>$999</td>
                    <td>Delivered </td>
                    <td class="m-auto p-auto"><i class="bi bi-question-square align-bottom btn text-light"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <?php $products = $data['products']; ?>
    <div id="table_body" class="table-responsive">
        <table class="table table-dark table-striped table-hover table-bordered caption-top">
            <caption>Order by latest</caption>
            <thead class="sticky-top">
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Cost</th>
                    <th class="w-25" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- TODO: Loop through the order details -->
                <?php if (count($data['products']) > 0 ){ ?>
                <?php foreach($data['products'] as $product){ ?>
                <tr id=<?=$product->prod_id ?>>
                    <td><?= $product->prod_name ?></td>
                    <td><?= $category->get($product->prod_cat_id) ?></td>
                    <td><?= $product->num_of_stock ?></td>
                    <td><?= $product->prod_cost ?></td>
                    <td class="m-auto p-auto"><i class="bi bi-question-square btn text-light"></i><i class="bi bi-pencil-square btn text-light"></i><i onclick="deleteItem(<?=$product->prod_id?>);" class="bi bi-trash btn text-light"></i></td>  
                </tr>
                <?php } ?>
                <?php } ?>      
            </tbody>
        </table>
        <?php if (count($data['products']) == 0 ){ 

            echo '<div class="alert alert-danger" role="alert">
            <i class="bi bi-exclamation-octagon-fill me-2"></i> Oh no!! You don\'t have any listing!
          </div>';
        }?>
    </div>

<?php } ?>

<style>
    #table_body {
        max-height: clamp(5em, 30vh, 350px) !important;
        overflow: auto !important;
    }
</style>