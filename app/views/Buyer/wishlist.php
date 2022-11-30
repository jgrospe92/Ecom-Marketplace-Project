<?php $this->view('includes/header'); ?>
<?php
$product = new \app\models\Product();
$category = new \app\models\Category();
$wishlists = $data;
$total = 0;
?>
<br>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-12">
		<table class="table table-image table-sm">
		  <thead>
		    <tr>
		      <th scope="col">Date Added</th>
		      <th scope="col">Product Image</th>
		      <th scope="col">Product Name</th>
		      <th scope="col">Product Description</th>
		      <th scope="col">Category</th>
		      <th scope="col">Price</th>
			  <th scope="col">Action</th>

		    </tr>
		  </thead>
		  <tbody class="table-striped">
			<?php foreach($wishlists as $wishlist) { ?>
			<?php
				$product = $product->get($wishlist->prod_id);
				$categoryStr  = $category->get($product->prod_cat_id);
			?>
		    <tr>
		      <th scope="row"><?= $wishlist->date_added ?></th>
		      <td class="w-25">
			      <img src="/images/<?= $product->product_image ?>" class="img-fluid img-thumbnail" alt="<?= $product->prod_name?>">
		      </td>
		      <td><?= $product->prod_name?></td>
		      <td><?= $product->prod_desc?></td>
		      <td><?= $categoryStr ?></td>
		      <td>$<?= $product->prod_cost?></td>
			  <td class="d-flex just-content-start p-0"><i class="btn bi bi-trash p-1"></i> <i class="btn bi bi-bag-plus p-1"></i></td>
			  <?php $total += intval($product->prod_cost) ?>
		    </tr>
			<?php } ?>
		  </tbody>
          <tfoot>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>TOTAL:$ <?= $total?> </td>
          </tfoot>
		</table>   
    </div>
  </div>
</div>
<!-- FOOTER STARTS -->
<?php $this->view('includes/footer') ?>
<!-- FOOTER ENDS -->
<script src="/resources/js/main_script.js"></script>
</body>

</html>