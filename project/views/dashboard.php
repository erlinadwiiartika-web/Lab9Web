<?php
$total = (int) $pdo->query('SELECT COUNT(*) FROM users')->fetchColumn();
?>
<section>
<h2>Dashboard</h2>
<p>Selamat datang di aplikasi modular. Total pengguna terdaftar:
<strong><?php echo $total; ?></strong></p>
<ul>
<li>Contoh formatRupiah(150000): <?php echo formatRupiah(150000); ?></li>
<li>Contoh hitungDiskon(200000, 15): <?php echo formatRupiah(hitungDiskon(200000, 15)); ?></li>
<li>Contoh ringkasTeks: <?php echo e(ringkasTeks('Modularisasi membuat kode lebih rapi dan mudah dipelihara.', 30)); ?></li>
</ul>
</section>
