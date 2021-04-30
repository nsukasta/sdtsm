<?= $this->extend('layout/layout-sd'); ?>


<?= $this->section('content'); ?>

<div class="main-content">
    <div class="container mt-7">
        <!-- Table -->
        <div class="row ">
            <div class="col-xl-8 m-auto order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="/img/profile.jpg" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="https://www.instagram.com/_un.avaliable/"
                                class="btn btn-sm btn-info mr-4">Connect</a>
                            <a href="https://www.instagram.com/_un.avaliable/"
                                class="btn btn-sm btn-default float-right">Message</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row1">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">1</span>
                                        <span class="description">Post</span>
                                    </div>
                                    <div>
                                        <span class="heading">353</span>
                                        <span class="description">Followers</span>
                                    </div>
                                    <div>
                                        <span class="heading">327</span>
                                        <span class="description">Following</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                Suka Astawa<span class="font-weight-light">, 20</span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>Singaraja, Penglatan
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>Cief Executive Officer - Bande Visual
                                Creative Team
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>Education of Ganesha University | Computer
                                Science
                            </div>
                            <hr class="my-4">
                            <p>Mahasiswa aktif semester 4, Jurusan Teknik Informatika, Bidikmisi
                                2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>