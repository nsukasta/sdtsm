<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?= $this->include('layout/head'); ?>
    <!-- endHead-->
</head>

<body>
    <!-- sidebar -->
    <?= $this->include('layout/sidebar'); ?>
    <!-- endSidebar -->

    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div>
            <?= $this->renderSection('content'); ?>
        </div>

    </div>

    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/js/main.js"></script>
</body>

</html>