<?= $this->extend('layout/layouts'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row  ">
        <div class="inputan col-md-8">
            <table class="table">


                <?= csrf_field(); ?>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($users as $r) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $r['nama'] ?></td>
                        <td><?= $r['nilai']; ?></td>
                        <td>

                            <a href="/statistik/edit/<?= $r['id']; ?>" class="btn btn-warning ">Edit</a>

                            <form action="/statistik/delete/<?= $r['id']; ?>" method="post" class="d-inline">

                                <?= csrf_field(); ?>
                                <button type="submit" class="btn btn-danger "
                                    onclick="return confirm('Apakah anda yakin?')"> Hapus</button>
                                <input type="hidden" name="_method" value="delete">
                            </form>

                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class=" inputan col-md-4">
            <table class="table">
                <form action="/statistik/save" method="post">

                    <?= csrf_field(); ?>
                    <div class="form-group">

                        <input for="nama" type="text"
                            class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama"
                            name="nama" placeholder="Nama" autofocus value="<?= old('nama'); ?>">

                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>

                    </div>
                    <div class="form-group">
                        <input for="nilai" type="number"
                            class="form-control <?= ($validation->hasError('nilai')) ? 'is-invalid' : ''; ?>" id="nilai"
                            name="nilai" placeholder="Masukan nilai" value="<?= old('nilai'); ?>">

                        <div class=" invalid-feedback">
                            <?= $validation->getError('nilai'); ?>
                        </div>
                    </div>
        </div>

        <?php if (session()->getFlashdata('pesan')) : ?>

        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    </div>
    <?php endif; ?>
    <button type="submit" class="btn btn-primary btn-success">Input</button>
    </form>
    </table>

</div>

<div class="container">
    <div class="row">
        <div class="inputan col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nilai maximum</th>
                        <th scope="col">Nilai minimum</th>
                        <th scope="col">Rata - rata</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php foreach ($nMax->getResult() as $row) {
                                echo $row->nilai;
                            } ?>

                        </td>
                        <td>
                            <?php foreach ($nMin->getResult() as $row) {
                                echo $row->nilai;
                            } ?>
                        </td>
                        <td>
                            <?php foreach ($nAvg->getResult() as $row) {
                                echo $row->nilai;
                            } ?>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="inputan col-md-6 ">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nilai</th>
                        <th scope="col">Frekuensi</th>
                        <th scope="col">Total Nilai</th>
                        <th scope="col">Total Frekuensi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($nf->getResult() as $r) : ?>
                    <tr>
                        <td>
                            <?php echo $r->nilai ?>
                        </td>
                        <td>
                            <?php echo $r->count ?>
                        </td>
                        <?php endforeach ?>

                        </td>
                        <td><?php foreach ($nSum->getResult() as $row) {
                                echo $row->nilai;
                            } ?></td>
                        </td>
                        <td><?php foreach ($nTotal->getResult() as $row) {
                                echo $row->nilai;
                            } ?></td>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>



<?= $this->endSection(); ?>