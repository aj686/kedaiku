<?=$this->extend('/templates/admin_layout') ?>

<?=$this->section('main-content') ?>

    <!--SECTION 1-->
    
    <div class="container mt-4">

        <!-- $_SESSION set be true so, if data success add, it will display this alert at listing.html -->
        <?php if (isset($_SESSION['success'])) :?>
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berjaya!</strong> Data pelajar telah dikemaskini.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-12">

                <h3><a href="/produk" class="btn btn-sm btn-primary">Back</a>   Kemaskini Produk</h3>
                <hr>

                <!--seacrh form form helper -->
                <!--this is METHOD GET -->
                <!--this form_open will send to  -->
                <?php echo form_open_multipart('/produk/edit/' . $produk['id']); ?>
                    <div class="form-group row mt-2">
                      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $produk['nama'] ?>">
                      </div>
                    </div>

                    <div class="form-group row mt-2">
                      <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga" name="harga" value="<?= $produk['harga'] ?>">
                      </div>
                    </div>

                    <div class="form-group row mt-2">
                      <label for="harga" class="col-sm-2 col-form-label">Kategori</label>
                      <div class="col-sm-10">
                        
                        <?php
                          echo form_dropdown('kategori_id', 
                            $kategori,
                            $produk['kategori_id'], 
                            ['class' => 'form-control'
                          ]);
                        ?>

                      </div>
                    </div>

                    <div class="form-group row mt-2">
                      <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" row="3" value="<?= $produk['keterangan'] ?>">
                      </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">

                        <!-- Set default image when no image upload yet -->
                        <?php 
                        $gambar =  '/img/produk/'. $produk['gambar'];
                        //overwrite the image in produk folder if image existed
                        if ( !file_exists( 'img/produk/' .$produk['gambar']  )) {

                          //set default image when file upload not exist
                          $gambar = '/img/produk/default.jpg';
                        }
                        ?>

                        <img src="<?= $gambar ?>" alt="" style="max-width: 300px;" class="img-fluid">

                            <div class="input-group mb-3 mt-3">
                                <input type="file" class="form-control" id="gambar" name="gambar">
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
    
  <?=$this->endSection() ?>