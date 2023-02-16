<?=$this->extend('/templates/admin_layout') ?>

<?=$this->section('main-content') ?>
    <!--SECTION 1-->
    
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">

                <h3><a href="/produk" class="btn btn-sm btn-primary">Back</a>   Tambah Produk Baru</h3>
                <hr>

                <!--seacrh form form helper -->
                <!--this is METHOD GET -->
                <!--this form_open will send to add in POST METHOD  -->
                <?php echo form_open_multipart('/produk/add'); ?>
                    <div class="form-group row mt-2">
                      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="">
                      </div>
                    </div>
                    

                    <div class="form-group row mt-2">
                      <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga" name="harga" value="">
                      </div>
                    </div>

                    <div class="form-group row mt-2">
                      <label for="harga" class="col-sm-2 col-form-label">Kategori</label>
                      <div class="col-sm-10">
                        
                        <?php
                          echo form_dropdown('kategori_id', 
                            $kategori, 
                            null, 
                            [ 'class' => 'form-control' ]
                          );
                        ?>

                      </div>
                    </div>

                    <div class="form-group row mt-2">
                      <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" row="3"  value="">
                      </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
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