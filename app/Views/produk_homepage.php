<?=$this->extend('/templates/front_layout') ?>

<?=$this->section('main-content') ?>

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

        <!-- SUCCESS ADD PELAJAR -->
        <!-- $_SESSION set be true so, if data success add, it will display this alert at listing.html -->
        <?php if (isset($_SESSION['success'])) :?>
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Add to cart!!</strong> View your item in <a href="/bakul"> cart.</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="row justify-content-center">

            <?php foreach( $produk as $p ) : ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                <div class="card">
                    <img src="<?php echo '/'.  $produk_img_lokasi . '/'. $p['gambar']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5><?php echo $p['nama']; ?></h5>
                      <p class="card-text"><?php echo $p['keterangan']; ?></p>
                      <p class="card-text"> 
                        <strong>RM: </strong><?php echo number_format($p['harga']); ?></p>

                        <!-- add to cart button -->
                        <!-- submit to form controller = "bakul", function or method = "add"-->
                        <form method="post" action="/bakul/add" class="row">
                            <div class="col-sm-6">
                                <input type="hidden" name="produk_id" value="<?= $p['id'] ?>">
                                <input type="number" name="kuantiti" value="0" class="form-control">     
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

        <!--PAGINATION-->
        <div id="my-pagination">
            <?= $pager->links() ?>
        </div>
        <!--PAGINATION END-->

    </div>
    <!--SECTION 2 END-->



<?=$this->endSection() ?>