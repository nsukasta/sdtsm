<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2>Contact Me</h2>
            <?php foreach ($alamat as $a) :  ?>

            <ul>
                <li><?= $a['tipe']; ?></li>
                <li><?= $a['alamat']; ?></li>
                <li><?= $a['kota']; ?></li>
            </ul>
            <?php endforeach; ?>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quae hic dolore consequuntur quaerat
                voluptatem officia mollitia tempora, aliquid alias fuga vero accusantium. Omnis repellat quae minus quos
                molestias vel.</p>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>