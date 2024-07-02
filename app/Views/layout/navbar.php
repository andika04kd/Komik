<?php

// Dapatkan instance dari auth
$auth = service('auth');

// Variabel untuk menampung URL pencarian
$searchUrl = '/pages/comics';

// Cek apakah pengguna sudah login menggunakan Shield
if ($auth->loggedIn()) {
    // Jika pengguna sudah login, arahkan pencarian ke halaman /comics
    $searchUrl = '/comics';
}
?>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">PawRead</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url('/'); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/pages/comics'); ?>">Comics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/pages/about'); ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/pages/contact'); ?>">Contact</a>
                </li>
            </ul>
            <form class="d-flex" role="search" action="<?= base_url($searchUrl); ?>" method="get">
                <input class="form-control me-2" type="search" name="keyword" id="searchKeyword" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>