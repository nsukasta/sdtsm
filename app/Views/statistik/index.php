<?= $this->extend('layout/layout-sd'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="inputan rounded-lg bg-white col-md-6">
            <table class="table ">
                <?= csrf_field(); ?>
                <thead>
                    <tr class=" bg-light  border text-center">
                        <th class="border" scope="col">No</th>
                        <th class="border" scope="col">Nilai</th>
                        <th class="border" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $i = 1 ?>
                    <?php foreach ($users as $r) : ?>
                    <tr>
                        <th class="border" scope="row"><?= $i++; ?></th>
                        <td class="border"><?= $r['nilai'] ?></td>
                        <td class="border">
                            <a href="/statistik/edit/<?= $r['id']; ?>" class="btn btn-warning btn-sm ">Edit</a>
                            <form action="/statistik/delete/<?= $r['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <button type="submit" class="btn btn-danger btn-sm "
                                    onclick="return confirm('Apakah anda yakin?')"> Hapus</button>
                                <input type="hidden" name="_method" value="delete">
                            </form>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class=" inputan col-md-6 bg-white">
            <?php  echo form_open_multipart('statistik/import') ?>

            <table class="table">
                <div class="form-group">
                    <input type="file" name="file_excel" class="form-control" accept=".xls,.xlsx">
                </div>
                <button type="submit" class="mt-3 btn btn-sm btn-primary btn-primary inline">Import</button>

                <?php if (session ()->getFlashdata('msg')) : ?>

                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('msg'); ?>
                </div>

            </table>
            <?php endif; ?>

            <?php echo form_close(); ?>

            <a class=" mt-3 btn btn-info btn-sm" href="<?php echo base_url('statistik/excel') ?>">Export</a>

            </table>

            <table class="table">
                <form action="/statistik/save" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input for="nilai" type="number"
                            class="form-control <?= ($validation->hasError('nilai')) ? 'is-invalid' : ''; ?>" id="nilai"
                            name="nilai" placeholder="Masukan nilai" value="<?= old('nilai'); ?>">
                        <div class=" invalid-feedback">
                            <?= $validation->getError('nilai'); ?>
                        </div>
                    </div>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                    <?php endif; ?>
                    <button type="submit" class="btn  btn-sm btn-primary btn-success">Input</button>
                </form>
            </table>
        </div>
        <div class="container">
            <div class="row">
                <div class="inputan col-md-12 bg-white ">
                    <table class="border table">
                        <thead>
                            <tr class="bg-light ">
                                <th class=" border " scope=" col">Nilai maximum</th>
                                <th class="border" scope="col">Nilai minimum</th>
                                <th class="border" scope="col">Rata-rata</th>
                            </tr>
                        </thead>
                        <tbody class="border">
                            <tr class="border">
                                <td class="border">
                                    <?php foreach ($nMax->getResult() as $row) {
                                echo $row->nilai;
                            } ?>
                                </td>
                                <td class="border">
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
                <div class="inputan col-md-6 bg-white ">
                    <table class="table">
                        <thead>
                            <tr class="border bg-light ">
                                <th class="border" scope=" col">Nilai</th>
                                <th class="border" scope="col">Frekuensi</th>
                            </tr>
                        </thead>
                        <tbody class="border">
                            <?php foreach ($nf->getResult() as $r) : ?>
                            <tr class="border">
                                <td class="border">
                                    <?php echo $r->nilai ?>
                                </td>
                                <td class="border">
                                    <?php echo $r->count ?>
                                </td>
                                <?php endforeach ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="inputan col-md-6 bg-white">
                    <table class="table">
                        <thead>
                            <tr class="border bg-light ">
                                <th class="border" scope="col">Total Nilai</th>
                                <th class="border" scope="col">Total Frekuensi</th>
                            </tr>
                        </thead>
                        <tbody class="border">
                            <?php foreach ($nf->getResult() as $r) : ?>
                            <tr class="border">
                                <?php endforeach ?>

                                </td>
                                <td class="border"><?php foreach ($nSum->getResult() as $row) {
                                echo $row->nilai;
                            } ?></td>
                                </td>
                                <td class="border"><?php foreach ($nTotal->getResult() as $row) {
                                echo $row->nilai;
                            } ?></td>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="inputan col-md-6 bg-white ">
            <div class="tabel">
                <?php foreach ($nMax->getResult() as $row) ?>
                <?php foreach ($nMin->getResult() as $nmin) ?>
                <?php foreach ($nAvg->getResult() as $ntr) ?>
                <canvas id="myChart" width="10" height="10">
                </canvas>
                <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Nilai Tertinggi', 'Nilai Terendah', 'Nilai Rata-Rata'],
                        datasets: [{
                            axis: 'y',
                            label: '',
                            data: [<?php echo $row->nilai ?>, <?php echo $nmin->nilai ?>,
                                <?php echo $ntr->nilai ?>
                            ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        indexAxis: 'y',
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
                </script>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>