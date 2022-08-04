<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMK Mahmud Mahyidin</title>
    <link rel="stylesheet" href="/css/style.css">
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
        <div class="row">
            <div class="col-12">

                <h3><a href="/gambar" class="btn btn-sm btn-primary">Back</a>   Tambah Pelajar Baru</h3>
                <hr>

                <!--seacrh form form helper -->
                <!--this is METHOD GET -->
                <!--this form_open will send to  -->
                <?php echo form_open_multipart('/gambar/add'); ?>
                    <div class="form-group row mt-2">
                      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="">
                      </div>
                    </div>

                    <div class="form-group row mt-2">
                      <label for="nama" class="col-sm-2 col-form-label">Tingkatan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="tingkatan" name="tingkatan" value="">
                      </div>
                    </div>

                    <div class="form-group row mt-2">
                      <label for="nama" class="col-sm-2 col-form-label">Kelas</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="kelas" name="kelas" value="">
                      </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="nama" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="desrption" name="description" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3 mt-3">
                                <input type="file" class="form-control" id="nama_fail" name="nama_fail">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                              </div>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
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