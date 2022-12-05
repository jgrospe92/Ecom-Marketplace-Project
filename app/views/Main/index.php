<?php $this->view('includes/header') ?>

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