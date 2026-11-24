<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Metode tidak diizinkan. Gunakan tombol Hapus pada daftar pengguna.');
}
if (!csrfValid()) { http_response_code(400); exit('Token CSRF tidak valid.'); }
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!$id) { setFlash('gagal', 'ID pengguna tidak valid.'); redirect('user/list'); }
$stmt = $pdo->prepare('DELETE FROM users WHERE id = :id');
$stmt->execute([':id' => $id]);
setFlash($stmt->rowCount() ? 'sukses' : 'gagal',
    $stmt->rowCount() ? 'Pengguna berhasil dihapus.' : 'Pengguna tidak ditemukan.');
redirect('user/list');
