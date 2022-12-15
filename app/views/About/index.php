<?php $this->view('includes/header') ?>
<br>
<link rel="stylesheet" href="/resources/css/about_page.css">
<div class="">
    <div class="about-section">
      <h1>About Us Page</h1>
      <p>This is my marketplace web application academic project for 420-411-VA ECOMMERCE</p>
      <p>Meet the developer</p>
    </div>
    <h2 style="text-align:center">Our Team</h2>

    <div class="row d-flix justify-content-center">
      <div class="column">
        <div class="card">
          <img src="/resources/images/me.jpg" alt="Jeffrey's Portrait">
          <div class="container">
            <h2>Jeffrey Grospe</h2>
            <p class="title">Full Stack Php Developer</p>
            <p>Aspiring software engineer</p>
            <li class="ms-3"><a class="text-muted" href="https://www.linkedin.com/in/jeffreygrospe/"><i class="bi bi-linkedin"></i></a></li>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <img src="/resources/images/man.png" alt="">
          <div class="container">
            <h2>Michel Paquette</h2>
            <p class="title">Ecommerce Teacher</p>
            <p>Web dev expert</p>
            <p></p>
            <li class="ms-3 d-inline"><a class="text-muted" href="https://www.linkedin.com/in/michelpaquette/"><i class="bi bi-linkedin"></i></a></li>
            <li class="ms-3 d-inline"><a class="text-muted" href="https://cstutoring.ca/"><i class="bi bi-link"></i></a></li>
          </div>
        </div>
      </div>
    </div>
</div>
<?php $this->view('includes/footer'); ?>
<script src="/resources/js/main_script.js"></script>
</body>

</html>