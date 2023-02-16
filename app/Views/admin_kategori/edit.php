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

                <h3><a href="/kategori" class="btn btn-sm btn-primary">Back</a>   Kemaskini Kategori</h3>
                <hr>

                <!--seacrh form form helper -->
                <!--this is METHOD GET -->
                <!--this form_open will send to  -->
                <?php echo form_open_multipart('/kategori/edit/' . $kategori['id']); ?>
                    <div class="form-group row mt-2">
                      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $kategori['nama'] ?>">
                      </div>
                    </div

                    <div class="form-group row mt-2">
                        <label for="gambar" class="col-sm-2 col-form-label"> </label>
                        <div class="col-sm-10">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        
    <!--SECTION 1 END-->
    
  <?=$this->endSection() ?>