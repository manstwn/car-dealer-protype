<?= $this->extend('user/template'); ?>
<?= $this->section('content'); ?>


<!-- Start slides -->
<div id="slides" class="cover-slides">
    <ul class="slides-container">
 
    <?php foreach ($randomPictures as $picture): ?>
        <li class="text-center">
            <img src="<?= base_url('car_img/' . $picture['picture']) ?>" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Dinka Dealer</strong></h1>
                        <p class="m-b-40">
                            Temukan dealer mobil terbaik di kota Anda di Dealer Mobil Terpercaya. Kami menawarkan beragam pilihan mobil baru dan bekas dengan kualitas terbaik serta harga yang kompetitif. Dengan pengalaman puluhan tahun dalam industri otomotif, kami bangga menjadi mitra terpercaya bagi pelanggan kami.
                        </p>
                    </div>
                </div>
            </div>
        </li>
    <?php endforeach; ?>


        
        
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
<!-- End slides -->

<!-- Start About -->
<div class="about-section-box">
    <div class="container">
        <div class="row">
            <div class="text-center">
                <div class="inner-column">
                    <h1>Dinka Dealer</h1>
                    <br>
                    <h2>
                        Temukan dealer mobil terbaik di kota Anda di Dealer Mobil Terpercaya. Kami menawarkan beragam pilihan mobil baru dan bekas dengan kualitas terbaik serta harga yang kompetitif. Dengan pengalaman puluhan tahun dalam industri otomotif, kami bangga menjadi mitra terpercaya bagi pelanggan kami.
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End About -->

<!-- Start Gallery -->
<div class="gallery-box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Gallery</h2>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="tz-gallery">

            <div class="row">
                <?php foreach ($cars as $car) : ?>
                    <div class="col-sm-5 col-md-3 col-lg-3">
                        <a class="lightbox" href="car_img/<?= $car['picture']; ?>">
                            <img class="img-fluid" src="car_img/<?= $car['picture']; ?>" alt="Gallery Images">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>
<!-- End Gallery -->
<?= $this->endSection(); ?>