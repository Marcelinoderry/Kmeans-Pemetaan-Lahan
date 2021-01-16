<div class="logo float-left">
    <h1 class="text-light"><a href="<?= base_url() ?>"><span>Pemetaan Lahan</span></a></h1>
</div>

<nav class="nav-menu float-right d-none d-lg-block">
    <ul>
        <li class="<?= ($halaman === 'Home' ? 'active' : '') ?>"><a href="<?= base_url() ?>">Beranda</a></li>
        <li class="<?= ($halaman === 'About' ? 'active' : '') ?>"><a href="<?= base_url() ?>about">Tentang</a></li>
        <li class="<?= ($halaman === 'Contact' ? 'active' : '') ?>"><a href="<?= base_url() ?>contact">Kontak</a></li>
        <li class="<?= ($halaman === 'Komoditas' ? 'active' : '') ?>"><a href="<?= base_url() ?>komoditas">Komoditas</a></li>
        <li class="<?= ($halaman === 'Maps' ? 'active' : '') ?>"><a href="<?= base_url() ?>maps">Peta</a></li>
        <li><a href="<?= login_url() ?>">Login</a></li>
    </ul>
</nav>