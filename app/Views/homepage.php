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
                <a class="nav-link" href="#">TENTANG KAMI</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  PENDAFTARAN
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">TIngkatan 1-5</a></li>
                  <li><a class="dropdown-item" href="#">Tingkatan 6</a></li>
                  <li><a class="dropdown-item" href="#">Kelab dan Sukan</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <!--NAVBAR END-->

    <!--HEADER-->

    <header class="head-section">
        <div class="container">
            <h1>Selamat datang ke <span class="text-warning">SMK Mahmud Mahyidin</span></h1>
            <p>Pihak kami mengalu-alukan ibubapa untuk mendaftar di sekolah kami</p>
        </div>
    </header>

    <!--HEADER END-->

    <!--SECTION 1-->
    <div class="container mt-5">

        <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">

            <div class="btn-group me-2 m-2" role="group" aria-label="First group">
                <button type="button" class="btn btn-primary btn-lg">BUKU PELAWAT</button>
            </div>

            <div class="btn-group me-2 m-2" role="group" aria-label="Second group">
                <button type="button" class="btn btn-primary btn-lg">PENDAFTARAN</button>
            </div>
            
            <div class="btn-group me-2 m-2" role="group" aria-label="Third group">
                <button type="button" class="btn btn-primary btn-lg">KAKITANGAN</button>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="card text-center">
            <div class="card-header">
              Buku Pelawat
            </div>
            <div class="card-body">
              <h5 class="card-title">Terbuka kepada semua</h5>
              <p class="card-text">Pihak kami akan bekerjasama dengan anda untuk merealisasikan pelajar kami.</p>
              <a href="#" class="btn btn-primary">Daftar Pelawat</a>
            </div>
            <div class="card-footer text-muted">
              Tiada pelawat
            </div>
        </div>
    </div>

    <!--SECTION 1 END-->

    <!--SECTION 2-->
    <div class="container text-center mt-5">
        <div class="row justify-content-center">

            <?php foreach( $all_pelajar as $pelajar ) : ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                <div class="card">
                    <img src="/img/<?php echo $pelajar->nama_fail; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5><?php echo $pelajar->nama; ?></h5>
                      <p class="card-text"><?php echo $pelajar->kelas; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <div class="row p-5">
                <div class="col-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                            </a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                            </a>
                          </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>


        <!--PAGINATION-->
        
            
        

        <!--PAGINATION END-->
    </div>
    <!--SECTION 2 END-->


    <!--FOOTER-->
    <footer class="p-5 mt-5 text-center text-light bg-dark">
        <p>Hakcipta terpelihara  &copy; 2022</p>
    </footer>
    <!--FOOTER END-->

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
</body>
</html>