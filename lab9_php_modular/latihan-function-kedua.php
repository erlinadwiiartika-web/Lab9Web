<?php
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/header.php';
?>
<section class="content">
<h2>Pemakaian Helper di Halaman Kedua</h2>
<p>Total belanja 4 x <?= formatRupiah(35000); ?> = <?= formatRupiah(hitungTotal(35000, 4)); ?></p>
<p>Nilai 90 mendapat predikat <?= tentukanStatusNilai(90); ?>.</p>
</section>
<?php require_once __DIR__ . '/footer.php'; ?>
