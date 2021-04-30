<?= $this->extend('layout/layout-sd'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class=" inputan col-md-4 ">
            <table class="table">
                <form action="/statistik/update/<?= $user['id']; ?>" method="post">
                    <?= csrf_field(); ?>

                    <input for="id" type="hidden" class="form-control" id="id" name="id" value="<?= $user['id']; ?>">

                    <div class="form-group">
                        <input for="nilai" type="number"
                            class="form-control <?= ($validation->hasError('nilai')) ? 'is-invalid' : ''; ?>" id="nilai"
                            name="nilai" placeholder="Masukan nilai" value="<?= $user['nilai']; ?>">

                        <div class=" invalid-feedback">
                            <?= $validation->getError('nilai'); ?>
                        </div>
                    </div>

                    <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>

                    <?php endif; ?>
                    <button type="submit" class="btn btn-primary btn-success">Edit</button>
                </form>
            </table>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>