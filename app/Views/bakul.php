
<!-- header in templates/front_layout -->
<!-- we use section because it repeatly used same template to save more code-->

<?=$this->extend('/templates/front_layout') ?>

<!-- Start Main Content Section -->
<?=$this->section('main-content') ?>

<!-- CONTENT OF SECTION ONLY -->
<!-- NO HEAD AND BODY -->

    <div class="row">
        <div class="col-12">
            <div class="col-12">
                <h2><a href="/" class="btn btn-sm btn-primary">Back</a> Your Shopping Cart</h2>
            </div>
        </div>
    </div>

    <!-- check data-->
    <!-- data from page Bakul.php(Controller) past to Bakul.php using $S_SESSION -->
    <!-- dd($_SESSION) IN PHP -->

    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th width="10%" >Kuantiti</th>
                        <th>Jumlah</th>
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
                    <td><input type="number" step="1" value="<?= $barang['kuantiti']?>" class="form-control"></td>
                    <td>RM <?= number_format( $barang['harga'] * $barang['kuantiti'], 2)?></td>
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
                    <td colspan="4" align="right"><strong>Jumlah Harga</strong></td>
                    <td><strong>RM <?= number_format($total_amount, 2) ?></strong></td>
                </tr>
                </tbody>
            </table>

        <a href="/bakul" class="btn btn-warning float-right">Checkout</a>
        </div>
    </div>
    
<!-- End Main Content Section -->
<?=$this->endSection() ?>