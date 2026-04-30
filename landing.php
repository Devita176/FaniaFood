<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fania Food - Frozen Food Olahan Laut</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .section-title {
            font-family: 'Reem Kufi Ink', sans-serif;
            color: var(--primary);
            font-size: 2rem;
            margin-bottom: 8px;
        }
        .section-sub {
            color: var(--gray-dark);
            margin-bottom: 48px;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="landing-navbar">
    <a href="landing.php" class="brand">🐟 Fania Food</a>
    <div class="d-flex gap-2">
        <a href="auth/login.php" class="btn-fania-outline" style="color: var(--primary); border-color: var(--primary);">Masuk</a>
        <a href="auth/register.php" class="btn-fania">Daftar</a>
    </div>
</nav>

<!-- HERO -->
<section class="landing-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <span class="hero-badge">🌊 Produk Olahan Laut Segar</span>
                    <h1>Nikmati Kelezatan Laut di Rumahmu</h1>
                    <p>Fania Food menghadirkan frozen food berkualitas tinggi dari hasil laut pilihan, diolah secara higienis dan siap saji kapan saja.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="auth/register.php" class="btn-fania-white">Pesan Sekarang</a>
                        <a href="#produk" class="btn-fania-outline">Lihat Produk</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-flex justify-content-center">
                <div style="font-size: 8rem; filter: drop-shadow(0 20px 40px rgba(0,0,0,0.2));">🦐</div>
            </div>
        </div>
    </div>
</section>

<!-- KEUNGGULAN -->
<section class="landing-features">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Mengapa Fania Food?</h2>
            <p class="section-sub">Kami berkomitmen memberikan produk terbaik untuk keluargamu</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">🌿</div>
                    <h5 style="color: var(--primary); font-family: 'Reem Kufi Ink', sans-serif;">Tanpa Pengawet</h5>
                    <p style="color: var(--gray-dark); font-size: 0.95rem;">Produk kami bebas bahan pengawet berbahaya, dijaga segar dengan teknologi frozen terkini.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <h5 style="color: var(--primary); font-family: 'Reem Kufi Ink', sans-serif;">Mudah Disajikan</h5>
                    <p style="color: var(--gray-dark); font-size: 0.95rem;">Cukup goreng, kukus, atau panggang — sajian lezat siap dalam hitungan menit.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">🏆</div>
                    <h5 style="color: var(--primary); font-family: 'Reem Kufi Ink', sans-serif;">Kualitas Terjamin</h5>
                    <p style="color: var(--gray-dark); font-size: 0.95rem;">Bahan baku dipilih dari pemasok laut terpercaya dengan standar kebersihan tinggi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PRODUK UNGGULAN -->
<section class="landing-products" id="produk">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Produk Unggulan</h2>
            <p class="section-sub">Pilihan frozen food olahan laut terfavorit pelanggan kami</p>
        </div>
        <div class="row g-4">
            <?php
            require_once 'config/koneksi.php';
            $produk = $conn->query("SELECT * FROM produk LIMIT 3");
            if ($produk && $produk->num_rows > 0):
                while($p = $produk->fetch_assoc()):
            ?>
            <div class="col-md-4">
                <div class="product-card-landing">
                    <div class="product-img">
                        <?php if($p['gambar'] && file_exists('assets/img/'.$p['gambar'])): ?>
                            <img src="assets/img/<?= htmlspecialchars($p['gambar']) ?>" style="width:100%;height:100%;object-fit:cover;">
                        <?php else: ?>
                            🐠
                        <?php endif; ?>
                    </div>
                    <div class="product-body">
                        <h6 style="font-family: 'Reem Kufi Ink', sans-serif; color: var(--primary);">
                            <?= htmlspecialchars($p['nama_produk']) ?>
                        </h6>
                        <p style="font-size:0.85rem; color:var(--gray-dark); margin-bottom:12px;">
                            <?= htmlspecialchars(substr($p['deskripsi'], 0, 60)) ?>...
                        </p>
                        <div style="font-family: 'Racing Sans One', sans-serif; color: var(--primary); font-size:1.1rem;">
                            Rp <?= number_format($p['harga'], 0, ',', '.') ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
            else:
            ?>
            <!-- Placeholder kalau belum ada produk -->
            <?php foreach(['🦐 Udang Crispy', '🦑 Cumi Goreng', '🐟 Ikan Bandeng'] as $i => $item): ?>
            <div class="col-md-4">
                <div class="product-card-landing">
                    <div class="product-img"><?= explode(' ', $item)[0] ?></div>
                    <div class="product-body">
                        <h6 style="font-family: 'Reem Kufi Ink', sans-serif; color: var(--primary);">
                            <?= htmlspecialchars(implode(' ', array_slice(explode(' ', $item), 1))) ?>
                        </h6>
                        <p style="font-size:0.85rem; color:var(--gray-dark); margin-bottom:12px;">
                            Produk olahan laut segar berkualitas tinggi.
                        </p>
                        <div style="font-family: 'Racing Sans One', sans-serif; color: var(--primary); font-size:1.1rem;">
                            Rp <?= number_format([35000, 30000, 25000][$i], 0, ',', '.') ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="text-center mt-5">
            <a href="auth/login.php" class="btn-fania">Lihat Semua Produk →</a>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="landing-cta">
    <div class="container">
        <h2>Siap Memesan Sekarang?</h2>
        <p style="opacity:0.85; margin-bottom:32px;">Daftar gratis dan nikmati kemudahan berbelanja frozen food pilihan</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="auth/register.php" class="btn-fania-white">Daftar Gratis</a>
            <a href="auth/login.php" class="btn-fania-outline">Sudah Punya Akun? Masuk</a>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="landing-footer">
    <p>© <?= date('Y') ?> Fania Food — Frozen Food Olahan Laut Terbaik. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>