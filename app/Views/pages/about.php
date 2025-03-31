<?= $this->include('templates/header') ?>

<style>
    .about-header {
        background: linear-gradient(to right, #1c1c1e, #2c2c2e);
        color: #fff;
        padding: 60px 20px;
        text-align: center;
        border-bottom: 4px solid #ff4081;
    }

    .about-header h1 {
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 10px;
        color: #00bfa5;
    }

    .about-header p {
        font-size: 1.2rem;
        color: #ccc;
    }

    .about-section {
        background: #121212;
        color: #fff;
        padding: 50px 20px;
        text-align: center;
    }

    .about-section h2 {
        color: #ff4081;
        margin-bottom: 20px;
    }

    .card-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
        margin-top: 30px;
    }

    .card-box {
        background-color: #1e1e1e;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 12px rgba(255, 64, 129, 0.4);
        max-width: 300px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-box:hover {
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(255, 64, 129, 0.9);
    }

    .card-box h4 {
        color: #00bcd4;
        margin-bottom: 10px;
    }

    .card-box p {
        color: #ccc;
        font-size: 0.95rem;
    }

    .icon {
        font-size: 2rem;
        margin-bottom: 10px;
        color: #ffc107;
    }

    @media (max-width: 768px) {
        .card-box {
            max-width: 100%;
        }
    }
</style>

<div class="about-header">
    <h1>🎬 About Movies Archive</h1>
    <p>Preserving stories, celebrating cinema – your movie journey starts here.</p>
</div>

<div class="about-section">
    <h2>Who We Are</h2>
    <p>Movies Archive is your gateway to explore movie history, read real user reviews, and discover both modern and classic films.</p>

    <div class="card-row">
        <div class="card-box">
            <div class="icon">📚</div>
            <h4>Our Mission</h4>
            <p>To create a vibrant space where users can learn about and contribute to movie culture through reviews and ratings.</p>
        </div>
        <div class="card-box">
            <div class="icon">👁️</div>
            <h4>Our Vision</h4>
            <p>Become the go-to archive for discovering and reviewing cinematic gems, accessible on every device.</p>
        </div>
        <div class="card-box">
            <div class="icon">⚙️</div>
            <h4>What We Offer</h4>
            <p>Live movie listings, real-time reviews, API-powered search, and a responsive design tailored for you.</p>
        </div>
    </div>
</div>

<?= $this->include('templates/footer') ?>
