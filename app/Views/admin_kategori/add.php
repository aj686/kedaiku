<?=$this->extend('/templates/admin_layout') ?>

<?=$this->section('main-content') ?>
    <!--SECTION 1-->
    
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">

                <h3><a href="/kategori" class="btn btn-sm btn-primary">Back</a>   Tambah Kategori Baru</h3>
                <hr>

                <!--seacrh form form helper -->
                <!--this is METHOD GET -->
                <!--this form_open will send to add in POST METHOD  -->
                <?php echo form_open_multipart('/kategori/add'); ?>
                    <div class="form-group row mt-2">
                      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="">
                      </div>
                    </div>

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