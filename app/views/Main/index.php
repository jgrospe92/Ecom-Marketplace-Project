<?php $this->view('includes/header') ?>

<section>
    <?php $this->view('includes/carousel') ?>
</section>

<section>
 <?php $this->view('includes/ads', $data['ads']) ?>
</section>
<section>
    <h1>This section display product catalogue</h1>
    <p>Sorted by the newest product added by default</p>
</section>

<?php $this->view('includes/footer'); ?>
<script src="/resources/js/main_script.js"></script>
</body>

</html>