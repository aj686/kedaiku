
<!-- header in templates/front_layout -->
<!-- we use section because it repeatly used same template to save more code-->

<?=$this->extend('/templates/front_layout') ?>

<!-- Start Main Content Section -->
<?=$this->section('main-content') ?>

<!-- CONTENT OF SECTION ONLY -->
<!-- NO HEAD AND BODY -->
<div class="container">
    <div class="row">
        <div class="col-12">
                <div class="col-12">
                    <h2><a href="/" class="btn btn-sm btn-primary">Back</a> Your Shopping Cart</h2>
                </div>
            </div>
        </div>

        <!-- SUCCESS UPDATE BARANG -->
        <!-- $_SESSION set be true so, if data success add, it will display this alert at listing.html -->
        <?php if (isset($_SESSION['success'])) :?>
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Successful Update!!</strong> Kuantiti and barang have been updated.</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['remove'])) :?>
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Successful Update!!</strong> Barang anda telah dibuang.</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- check data-->
        <!-- data from page Bakul.php(Controller) past to Bakul.php using $S_SESSION -->
        <!-- dd($_SESSION) IN PHP -->

        <div class="row">
            <div class="col-12">

            <!-- To update latest kuantiti barang only -->
            <form action="/bakul/update" method="POST">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th width="10%" >Kuantiti</th>
                            <th>Jumlah</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

    <?php if (isset($_SESSION['cart']['barang']) && (count($_SESSION['cart']['barang']) > 0) ) :  ?>
        <?php $counter = 0; ?>
        <?php $total_amount = 0; ?>
        <?php foreach($_SESSION['cart']['barang'] as $barang ) :  ?>

                    <tr>
                        <td><?= ++$counter ?></td>
                        <td><?= $barang['nama'] ?></td>
                        <td><?= number_format($barang['harga'], 2) ?></td>
                        <td><input type="number" step="1" name="kuantiti[<?= $barang['id']?>]" value="<?= $barang['kuantiti']?>" class="form-control"></td>
                        <td>RM <?= number_format( $barang['harga'] * $barang['kuantiti'], 2)?></td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm" onclick="confirm_remove(<?= $barang['id']?>)" >Remove</a>
                        </td>
                    </tr>
        
        <?php $total_amount += ( $barang['harga'] * $barang['kuantiti']) ?>
        <?php endforeach; ?>

    <?php else :  ?>
                    <tr>
                        <td colspan="5">
                            Bakul anda kosong
                        </td>
                    </tr>

    <?php endif; ?>
                    <tr>
                        <td colspan="5" align="right"><strong>Jumlah Harga</strong></td>
                        <td><strong>RM <?= number_format($total_amount, 2) ?></strong></td>
                        
                    </tr>
                    </tbody>
                </table>

                <button class="btn btn-primary float-right float-end mx-1">Update Cart</button>
                <a href="/checkout" class="btn btn-warning float-end">Checkout</a>
            </form>
        </div>
    </div>
</div>

<script>
        
        //delete data pelajar dengan id pelajar
        function confirm_remove ( id ) {
            if ( confirm( 'Anda pasti untuk buang barang ini?') )
            window.location.href = '/bakul/remove/' + id;
        }

</script>
    
    
<!-- End Main Content Section -->
<?=$this->endSection() ?>