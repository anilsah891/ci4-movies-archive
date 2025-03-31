<?= $this->include('templates/header') ?>

<!-- 🌍 Geolocation display box -->
<div id="geo-info" style="text-align: center; padding: 10px; font-weight: bold;"></div>

<style>
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

<div class="hero-banner">
    <h1>🎬 Welcome to Movies Archive</h1>
    <p>Explore movie history, read reviews, and discover hidden cinematic gems!</p>
    <a href="<?= site_url('movies') ?>" class="btn-explore">🍿 Explore Movies</a>
</div>

<?= $this->include('templates/footer') ?>
