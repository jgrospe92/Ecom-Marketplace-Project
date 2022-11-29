<?php $this->view('includes/header') ?>

<section>
    <?php $this->view('includes/carousel') ?>
</section>

<section>
 <?php $this->view('includes/ads', $data['ads']) ?>
</section>
<section>
    <?php $this->view('includes/catalogue', $data['catalogue']) ?>
</section>
<section>
    <?php $this->view('includes/sale', $data['promotions']) ?>
</section>

<?php $this->view('includes/footer'); ?>
<script src="/resources/js/main_script.js"></script>
</body>

</html>