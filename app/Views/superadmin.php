<?=$this->extend('/templates/admin_layout') ?>

<?=$this->section('main-content') ?>

    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 pt-3 pb-3 bg-warning text-wrap rounded-pill">
                <div class="container text-center">
                    <h1> Welcome To Your Super Admin </h1>

                    <h4><?= session()->get('firstname') ?> <?= session()->get('lastname') ?></h4>

                </div>
            </div>
        </div>
    </div>

<?=$this->endSection() ?>