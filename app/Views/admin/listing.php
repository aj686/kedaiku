<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMK Mahmud Mahyidin</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>

    <!--NAVBAR--> 

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">SMK Mahmud Mahyidin</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
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
            <h1>Data peribadi pelajar <span class="text-warning">SMK Mahmud Mahyidin</span></h1>
            <p>Anda akan dipertanggujawab sekiranya berlaku kebocoran data pelajar</p>
        </div>
    </header>

    <!--HEADER END-->

    <!--SECTION 1-->
    
    <div class="container mt-4">

        <!-- $_SESSION set be true so, if data success add, it will display this alert at listing.html -->
        <?php if (isset($_SESSION['success'])) :?>
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berjaya!</strong> Data pelajar baru telah berjaya ditambah.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <?php endif; ?>


        <div class="row mt-4">
            <div class="col-12">
                <a href = "/gambar/add"  class = "btn btn-primary float-right">Add New</a>  <!--float-right not working....aiyaaaa-->
                <h3>Senarai Pelajar</h3>
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead class="thead-dark">  <!--tak display hitam...aiyaaa peninglah-->
                        <tr>
                            <th>ID</th>
                            <th>GAMBAR</th>
                            <th>NAMA</th>
                            <th>TINGKATAN</th>
                            <th>KELAS</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach($gambar as $g) : ?>
                        <tr>
                            <td><?= $g['id'] ?></td>
                            <td>
                                <img class="gambar-pelajar" src="/img/<?= $g['nama_fail']; ?>">
                            </td>
                            <td><?= $g['nama']  ?></td>
                            <td><?= $g['tingkatan']  ?></td>
                            <td><?= $g['kelas']  ?></td>
                            <td>
                                
                                <!-- can use a link -->
                                <a href ="/gambar/edit/<?= $g['id'] ?>" class="btn btn-primary">Edit</a>
                                <a href ="/gambar/delete/<?= $g['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>

                <div id="my-pagination">
                    <?= $pager->links() ?>
                </div>
                
            </div>

            <!-- <div class="col-12">
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
            </div> -->
        </div>
    </div>

    <!--SECTION 1 END-->

   


    <!--FOOTER-->
    <footer class="p-5 mt-5 text-center text-light bg-dark">
        <p>Hakmilik cipta &copy; 2022</p>
    </footer>
    <!--FOOTER END-->

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
</body>
</html>