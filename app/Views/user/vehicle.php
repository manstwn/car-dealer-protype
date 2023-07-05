<?= $this->extend('user/template'); ?>
<?= $this->section('content'); ?>
<br>
<br>
<br>
<div class="container">
    <h1>Vehicle List</h1>
    <div class="row mb-5">
        <?php foreach ($cars as $cars) : ?>

            <div class="my-3 col-md-4">
                <div class="card">
                    <img src="car_img/<?= $cars['picture']; ?>" class="card-img-top img-fluid"  alt="..." height="">
                    <div class="card-body">
                        <h9 class="card-title text-left"><?= $cars['type']; ?></h9>
                        <h2 class="card-title"><?= $cars['name']; ?></h2>
                        <p class="card-text"><?= $cars['description']; ?></p>
                        <a href="#" class="btn btn-sm btn-success">Rp. <?= $cars['price']; ?></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection(); ?>