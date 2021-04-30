<?= $this->extend('layout/layouts'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row banner">
        <div class="col-md-6">
            <h1> Belajar Bersama <br> Kita Bisa! </h1>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam exercitationem ut numquam fuga quas
                deleniti nulla.</p>
            <a href="#" class="express-btn">JOIN FREE</a>
            <a href="#">HAYUK!</a>
        </div>
        <div class="col-md-6">
            <img src="img/p0.svg" class="img-fluid">
        </div>
    </div>
</div>



<section class="service">
    <div class="container">
        <h2 class="tittle">Kami menyediakan berbagai layanan!</h2>
        <p class="subtittle"> Ayo segera, daftarkan diri anda, untuk membantu desa kita tercinta</p>
        <div class="row">
            <div class="col-md-4">
                <div class="service-box">
                    <img src="img/care2.png">
                    <h6>Costumer Service 24/7 </h6>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <i class="fa fa-arrow-right"></i>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box active-service">
                    <img src="img/faster.png">
                    <h6>Proses Cepat </h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                    <i class="fa fa-arrow-right"></i>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box">
                    <img src="img/praying.png">
                    <h6>Menjunjung Budaya </h6>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    <i class="fa fa-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!---fitur--->

<section class="fitur">
    <div class="container">
        <div class="row">

            <div class="col-md-6 text-center">
                <img src="img/p2.svg">
            </div>
            <div class="col-md-6">
                <h2> Cultural Heritage, Farmers, Ancestors</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                <a href="">WATCH NOW</a>
            </div>
        </div>
    </div>
</section>

<!---explore--->

<section class="explore">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2> Kunjungi kita!</h2>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="">EXPLOR NOW</a>
            </div>
            <div class="col-md-6">
                <img src="img/p3.svg" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!--Testi--->

<section class="review">
    <div class="container">
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/testi3.jpg">
                        <div class="carousel-caption">
                            <h6>Aditya Wiradarma</h6>
                            <small>CEO Dagang Godel</small>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum, earum.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/testi2.jpg">
                        <div class="carousel-caption">
                            <h6>Ngurah Surya</h6>
                            <small>CEO & Founder Anom Jaya .Tbk</small>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae, est.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/testi4.jpg">
                        <div class="carousel-caption">
                            <h6>Deny Surya</h6>
                            <small>Founder Babi Guling Baturiti</small>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>


<?= $this->endSection(); ?>