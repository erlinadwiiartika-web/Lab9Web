<?php
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) { setFlash('gagal', 'ID pengguna tidak valid.'); redirect('user/list'); }
$stmt = $pdo->prepare('SELECT id, nama, email FROM users WHERE id = :id');
$stmt->execute([':id' => $id]);
$user = $stmt->fetch();
if (!$user) { setFlash('gagal', 'Pengguna tidak ditemukan.'); redirect('user/list'); }
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfValid()) { http_response_code(400); exit('Token CSRF tidak valid.'); }
    $user['nama'] = trim((string) ($_POST['nama'] ?? ''));
    $user['email'] = trim((string) ($_POST['email'] ?? ''));
    if ($user['nama'] === '') $errors[] = 'Nama wajib diisi.';
    if (!validasiEmail($user['email'])) $errors[] = 'Format email tidak valid.';
    if (!$errors) {
        $upd = $pdo->prepare('UPDATE users SET nama = :nama, email = :email WHERE id = :id');
        $upd->execute([':nama' => $user['nama'], ':email' => $user['email'], ':id' => $id]);
        setFlash('sukses', 'Data pengguna berhasil diubah.');
        redirect('user/list');
    }
}
?>
<section>
<h2>Edit Pengguna</h2>
<?php foreach ($errors as $err): ?><div class="alert alert-gagal"><?php echo e($err); ?></div><?php endforeach; ?>
<form method="post" action="index.php?page=user/edit&amp;id=<?php echo (int) $id; ?>">
<?php echo csrfField(); ?>
<label for="nama">Nama</label>
<input type="text" id="nama" name="nama" value="<?php echo e($user['nama']); ?>" required>
<label for="email">Email</label>
<input type="email" id="email" name="email" value="<?php echo e($user['email']); ?>" required>
<button type="submit">Perbarui</button>
<a href="index.php?page=user/list">Batal</a>
</form>
</section>
