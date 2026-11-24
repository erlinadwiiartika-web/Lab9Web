<?php
$errors = [];
$nama = '';
$email = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfValid()) { http_response_code(400); exit('Token CSRF tidak valid.'); }
    $nama = trim((string) ($_POST['nama'] ?? ''));
    $email = trim((string) ($_POST['email'] ?? ''));
    if ($nama === '') $errors[] = 'Nama wajib diisi.';
    if (!validasiEmail($email)) $errors[] = 'Format email tidak valid.';
    if (!$errors) {
        $stmt = $pdo->prepare('INSERT INTO users (nama, email) VALUES (:nama, :email)');
        $stmt->execute([':nama' => $nama, ':email' => $email]);
        setFlash('sukses', 'Pengguna berhasil ditambahkan.');
        redirect('user/list');
    }
}
?>
<section>
<h2>Tambah Pengguna</h2>
<?php foreach ($errors as $err): ?><div class="alert alert-gagal"><?php echo e($err); ?></div><?php endforeach; ?>
<form method="post" action="index.php?page=user/add">
<?php echo csrfField(); ?>
<label for="nama">Nama</label>
<input type="text" id="nama" name="nama" value="<?php echo e($nama); ?>" required>
<label for="email">Email</label>
<input type="email" id="email" name="email" value="<?php echo e($email); ?>" required>
<button type="submit">Simpan</button>
<a href="index.php?page=user/list">Batal</a>
</form>
</section>
