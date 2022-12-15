<?php $this->view('includes/header') ?>

<?php if(isset($_GET['error'])){ ?>
<div class="alert alert-danger" role="alert">
	<?=$_GET['error']?>
</div>
<?php } ?>

<section>
    <?php $this->view('includes/carousel') ?>
</section>

<section>
 <?php $this->view('includes/ads',['ads'=>$data['ads'], 'buyer'=>$data['buyer']], ) ?>
</section>
<section>
    <?php $this->view('includes/catalogue', ['catalogue'=> $data['catalogue'], 'buyer'=>$data['buyer']] ) ?>
</section>
<section>
    <?php $this->view('includes/sale', ['promotions'=>$data['promotions'], 'buyer'=>$data['buyer']] ) ?>
</section>

<?php $this->view('includes/footer'); ?>
<script src="/resources/js/main_script.js"></script>
</body>

</html>