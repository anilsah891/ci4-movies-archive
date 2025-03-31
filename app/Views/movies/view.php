<?= $this->include('templates/header') ?>

<style>
    .movie-details {
        max-width: 700px;
        margin: 50px auto;
        padding: 30px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .movie-details img {
        max-width: 250px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .movie-details h2 {
        font-size: 2rem;
        margin-bottom: 15px;
    }

    .movie-details p {
        margin: 6px 0;
        font-size: 1rem;
    }

    .btn-details {
        display: inline-block;
        margin: 15px 5px 0;
        padding: 10px 18px;
        font-size: 0.95rem;
        border-radius: 6px;
        text-decoration: none;
        transition: all 0.2s ease-in-out;
    }

    .btn-green {
        background-color: #4CAF50;
        color: white;
    }

    .btn-back {
        background-color: #2196f3;
        color: white;
    }

    .btn-details:hover {
        opacity: 0.9;
    }
</style>

<div class="movie-details">
    <?php if (!empty($movie['poster'])): ?>
        <img src="<?= base_url('posters/' . esc($movie['poster'])) ?>" alt="Poster for <?= esc($movie['title']) ?>">
    <?php else: ?>
        <p><em>No poster available.</em></p>
    <?php endif; ?>

    <h2><?= esc($movie['title']) ?></h2>
    <p><strong>Rating:</strong> <?= esc($movie['rating']) ?></p>
    <p><strong>Box Office:</strong> $<?= esc($movie['box_office']) ?></p>
    <p><strong>Release Date:</strong> <?= esc($movie['release_date']) ?></p>
    <p><strong>Description:</strong> <?= esc($movie['description']) ?></p>

    <a href="<?= site_url('review/' . esc($movie['id'], 'url')) ?>" class="btn-details btn-green">View & Leave Reviews</a>
    <a href="<?= site_url('movies') ?>" class="btn-details btn-back">Back to Movies List</a>
</div>

<?= $this->include('templates/footer') ?>
