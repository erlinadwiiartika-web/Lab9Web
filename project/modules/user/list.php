<?php
$users = $pdo->query('SELECT id, nama, email, created_at FROM users ORDER BY id DESC')->fetchAll();
?>
<section>
<h2>Data Pengguna</h2>
<p><a class="btn" href="index.php?page=user/add">+ Tambah Pengguna</a></p>
<table>
<thead><tr><th>No</th><th>Nama</th><th>Email</th><th>Dibuat</th><th>Aksi</th></tr></thead>
<tbody>
<?php if (!$users): ?><tr><td colspan="5">Belum ada data.</td></tr><?php endif; ?>
<?php foreach ($users as $i => $u): ?>
<tr>
<td><?php echo $i + 1; ?></td>
<td><?php echo e($u['nama']); ?></td>
<td><?php echo e($u['email']); ?></td>
<td><?php echo e($u['created_at']); ?></td>
<td>
<a href="index.php?page=user/edit&amp;id=<?php echo (int) $u['id']; ?>">Edit</a>
<form class="inline" method="post" action="index.php?page=user/delete" onsubmit="return confirm('Hapus pengguna ini?');">
<?php echo csrfField(); ?>
<input type="hidden" name="id" value="<?php echo (int) $u['id']; ?>">
<button type="submit" class="link-danger">Hapus</button>
</form>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</section>
