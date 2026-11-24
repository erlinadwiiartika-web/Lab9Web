<?php
function formatRupiah(float $angka): string {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
function e(string $nilai): string {
    return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}
function hitungDiskon(float $harga, float $persen = 10): float {
    return $harga * ($persen / 100);
}
function validasiEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}
function ringkasTeks(string $teks, int $batas = 50): string {
    if (mb_strlen($teks) <= $batas) return $teks;
    return rtrim(mb_substr($teks, 0, $batas)) . '...';
}
function konversiCelciusKeFahrenheit(float $c): float {
    return ($c * 9 / 5) + 32;
}
function tentukanStatusNilai(float $nilai): string {
    if ($nilai >= 85) return 'A';
    if ($nilai >= 75) return 'B';
    if ($nilai >= 60) return 'C';
    if ($nilai >= 50) return 'D';
    return 'E';
}
function hitungTotal(float $harga, int $jumlah): float {
    return $harga * $jumlah;
}
function menuAktif(string $rute, string $halamanSekarang): string {
    return str_starts_with($halamanSekarang, $rute) ? 'active' : '';
}
function setFlash(string $tipe, string $pesan): void {
    $_SESSION['flash'] = ['tipe' => $tipe, 'pesan' => $pesan];
}
function tampilkanFlash(): void {
    if (!empty($_SESSION['flash'])) {
        $f = $_SESSION['flash'];
        unset($_SESSION['flash']);
        $kelas = $f['tipe'] === 'sukses' ? 'alert-sukses' : 'alert-gagal';
        echo '<div class="alert ' . $kelas . '">' . e($f['pesan']) . '</div>';
    }
}
function csrfToken(): string {
    if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32));
    return $_SESSION['csrf'];
}
function csrfField(): string {
    return '<input type="hidden" name="csrf" value="' . csrfToken() . '">';
}
function csrfValid(): bool {
    return isset($_POST['csrf'], $_SESSION['csrf'])
        && hash_equals($_SESSION['csrf'], (string) $_POST['csrf']);
}
function redirect(string $rute): void {
    header('Location: index.php?page=' . urlencode($rute));
    exit;
}
