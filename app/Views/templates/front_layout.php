<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMK Mahmud Mahyidin</title>
    <!--letak slash depan nanti automatic cari tempat file tersebut dari awal-->
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>

    <!--NAVBAR--> 

    <nav class="navbar navbar-expand-lg bg-white">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <div class="row">
              <div class="col">
                <img src="/img/smkmm.png" alt="smkmm" width="85" height="85" class="d-inline-block align-text-top">
              </div>
              <div class="col align-self-center">
                SMK Mahmud Mahyidin
              </div>
            </div>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">UTAMA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">INFO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/bakul">CART</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <!--NAVBAR END-->


    <!--SECTION VIEW -> ADD TO CARD-->

        <?= $this->renderSection('hero') ?>

    <!-- END -->

    <!-- CONTAINER -->

    

        <?= $this->renderSection('main-content') ?>

    

    <!-- CONTAINER END-->

    


    <!--FOOTER-->
    <footer class="p-5 mt-5 text-center text-light bg-dark">
        <p>Hakcipta terpelihara  &copy; 2022</p>
    </footer>
    <!--FOOTER END-->

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
</body>
</html>