<?=$this->extend('/templates/admin_layout') ?>

<?=$this->section('main-content') ?>
    <!--SECTION 1-->
    
    <div class="container mt-4">

        <!-- SUCCESS ADD PELAJAR -->
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

        <!-- SUCCESS DELETE PELAJAR -->
        <!-- $_SESSION set be true so, if data success add, it will display this alert at listing.html -->
        <?php if (isset($_SESSION['deleted'])) :?>
        <div class="row">
            <div class="col">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Berjaya!</strong> Data produk telah berjaya dihapuskan.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <?php endif; ?>


        <div class="row mt-4">
            <div class="col-12">
                <a href = "/produk/add"  class = "btn btn-primary float-right">Add New</a>  <!--float-right not working....aiyaaaa-->
                <h3>Senarai Produk</h3>
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead class="thead-dark">  <!--tak display hitam...aiyaaa peninglah-->
                        <tr>
                            <th>ID</th>
                            <th>GAMBAR</th>
                            <th>NAMA</th>
                            <th>KETERANGAN</th>
                            <th>HARGA</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach($produk as $p) : ?>
                        <tr>
                            <td><?= $p['id'] ?></td>
                            <td>
                                <img class="gambar-pelajar" src="/img/produk/<?= $p['gambar']; ?>">
                            </td>
                            <td><?= $p['nama']  ?></td>
                            <td><?= $p['keterangan']  ?></td>
                            <td>RM <?= number_format($p['harga'], 2)  ?></td>
                            <td>
                                
                                <!-- can use a link -->
                                <!-- onclick is javascript button when click -->
                                <a href ="/produk/edit/<?= $p['id'] ?>" class="btn btn-primary">Edit</a>
                                <button href ="/produk/delete/<?= $p['id'] ?>" onclick="confirm_delete( <?= $p['id'] ?>)" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>

                <div id="my-pagination">
                    <?= $pager->links() ?>
                </div>
                
            </div>
        </div>
    </div>

    <!--SECTION 1 END-->

    <script>
        
        //delete data pelajar dengan id pelajar
        function confirm_delete ( id ) {
            if ( confirm( 'Anda pasti untuk hapuskan data ' + id + '?') )
            window.location.href = '/produk/delete/' + id;
        }

    </script>

<?=$this->endSection() ?>