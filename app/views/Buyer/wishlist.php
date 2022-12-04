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
			<table class="table table-sm table ">
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
				<tbody class="table-striped table-group-divider">
					<?php if (count($wishlists) > 0) { ?>
						<?php foreach ($wishlists as $wishlist) { ?>
							<?php
							$product = $product->get($wishlist->prod_id);
							$categoryStr  = $category->get($product->prod_cat_id);
							?>
							<tr id="w<?= $product->prod_id?>" class="table-group-divider">
								<th scope="row"><?= $wishlist->date_added ?></th>
								<td class="w-25">
									<img src="/images/<?= $product->product_image ?>" class="img-fluid img-thumbnail" alt="<?= $product->prod_name ?>">
								</td>
								<td><?= $product->prod_name ?></td>
								<td class="col-3"><?= $product->prod_desc ?></td>
								<td><?= $categoryStr ?></td>
								<td>$<span id="w-price<?=$product->prod_id?>"><?= $product->prod_cost ?></span></td>
								<td class="d-flex just-content-start p-0"><i onclick="deleteItem(<?= $product->prod_id ?>);" class="btn bi bi-trash p-1"></i> <i class="btn bi bi-bag-plus p-1"></i></td>
								<?php $total += intval($product->prod_cost) ?>
							</tr>
						<?php } ?>
					<?php } else { ?>
						<tr>
							<div class="alert alert-danger" role="alert">
								<i class="bi bi-exclamation-lg"></i>Ops! Wishlist is empty!
							</div>
						</tr>
					<?php } ?>
				</tbody>

				<tfoot class="table-group-divider">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>TOTAL:$<span id="w-totalPrice"><?= $total ?></span> </td>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<SCript>
	function deleteItem($pro_id) {

		$.ajax({
			type: 'GET',
			url: "/Product/removeFromWishlist/"+ $pro_id,
			success: function(data) {
				$currentTotal = parseInt($('#w-totalPrice').text());
				$itemPrice =  parseInt($('#w-price'+$pro_id).text());
				$newTotal = $currentTotal  - $itemPrice 

				$("#w" + $pro_id).fadeOut('slow', function() {
					$(this).remove();
					$('#w-totalPrice').text($newTotal)
				});
			}

		});
	}
</SCript>
<!-- FOOTER STARTS -->
<?php $this->view('includes/footer') ?>
<!-- FOOTER ENDS -->
</body>

</html>