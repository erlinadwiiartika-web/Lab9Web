<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aplikasi PHP Modular - Praktikum 9</title>
<base href="<?php echo e(rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/'); ?>">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
<header>
<h1>Aplikasi PHP Modular</h1>
<p>Praktikum 9 &ndash; Modularisasi, Function, Template, dan Routing</p>
</header>
<nav>
<a class="<?php echo menuAktif('dashboard', $page); ?>" href="index.php?page=dashboard">Dashboard</a>
<a class="<?php echo in_array($page, ['user/list', 'user/edit'], true) ? 'active' : ''; ?>" href="index.php?page=user/list">Data Pengguna</a>
<a class="<?php echo menuAktif('user/add', $page); ?>" href="index.php?page=user/add">Tambah Pengguna</a>
</nav>
<main>
<?php tampilkanFlash(); ?>
