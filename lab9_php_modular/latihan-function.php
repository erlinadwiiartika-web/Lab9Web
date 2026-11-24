<?php
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/header.php';
?>
<section class="content">
<h2>Latihan Function</h2>
<ul>
<li>formatRupiah(150000) = <?= formatRupiah(150000); ?></li>
<li>hitungDiskon(200000) = <?= formatRupiah(hitungDiskon(200000)); ?> (10%)</li>
<li>hitungDiskon(200000, 15) = <?= formatRupiah(hitungDiskon(200000, 15)); ?> (15%)</li>
<li>konversiCelciusKeFahrenheit(37) = <?= konversiCelciusKeFahrenheit(37); ?> &deg;F</li>
<li>tentukanStatusNilai(82) = <?= tentukanStatusNilai(82); ?></li>
<li>hitungTotal(25000, 3) = <?= formatRupiah(hitungTotal(25000, 3)); ?></li>
<li>e('&lt;script&gt;alert("uji")&lt;/script&gt;') = <?= e('<script>alert("uji")</script>'); ?></li>
</ul>
</section>
<?php require_once __DIR__ . '/footer.php'; ?>
