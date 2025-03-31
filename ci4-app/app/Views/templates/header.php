<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Movies Archive') ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for Stars (if needed) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            padding-top: 70px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #fce4ec, #fff3e0);
            min-height: 100vh;
        }

        /* Remove horizontal padding from container */
        #content {
            padding-left: 0 !important;
            padding-right: 0 !important;
            max-width: 100% !important;
        }

        .hero-banner {
            width: 100%;
            background: linear-gradient(to right, #333333, #555555);
            color: white;
            text-align: center;
            padding: 80px 20px;
            margin: 0;
        }

        .hero-banner h1 {
            font-size: 2.8rem;
            font-weight: bold;
            color: #00bfa5;
            margin-bottom: 20px;
        }

        .hero-banner p {
            font-size: 1.2rem;
            color: #eee;
            margin-bottom: 30px;
        }

        .hero-banner a.btn-explore {
            background-color: #ff8a65;
            color: white;
            padding: 12px 25px;
            font-weight: bold;
            font-size: 1rem;
            border-radius: 25px;
            text-decoration: none;
            transition: background 0.3s ease-in-out;
        }

        .hero-banner a.btn-explore:hover {
            background-color: #ff7043;
            text-decoration: none;
        }
    </style>
</head>
<body>

<!-- ✅ Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="javascript:void(0);" onclick="return loadPage('home', event)">Movies Archive</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" onclick="return loadPage('about', event)">About</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" onclick="return loadPage('contact', event)">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0);" onclick="return loadPage('movies', event)">Movies</a></li>

                <?php if (session()->get('isLoggedIn')): ?>
                    <li class="nav-item"><a class="nav-link disabled">Welcome, <?= esc(session()->get('username')) ?>!</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('logout') ?>">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('login') ?>">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('register') ?>">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- ✅ Content Starts (no Bootstrap padding) -->
<div id="content">
