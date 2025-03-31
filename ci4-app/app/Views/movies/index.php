<?= $this->include('templates/header') ?>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
    }

    form {
        text-align: center;
        margin-bottom: 20px;
    }

    /* Responsive Grid Layout */
    .movie-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 20px;
        padding: 0 10px;
        margin: 0 auto;
    }

    @media (min-width: 1200px) {
        .movie-container {
            grid-template-columns: repeat(5, 1fr);
        }
    }

    /* Movie Card Style with Neon Border */
    .movie-card {
        background: #1c1c1e;
        color: white;
        border-radius: 12px;
        padding: 16px;
        text-align: center;
        border: 2px solid rgba(255, 0, 80, 0.6);
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, border 0.3s ease;
    }

    .movie-card:hover {
        transform: translateY(-6px);
        border-color: rgba(255, 0, 80, 1);
    }

    .movie-card::before {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: 12px;
        padding: 2px;
        background: linear-gradient(45deg, #ff0050, #ff7e5f, #ff0050, #ff7e5f);
        background-size: 300% 300%;
        z-index: -1;
        animation: neonBorder 6s linear infinite;
        mask: 
            linear-gradient(#fff 0 0) content-box, 
            linear-gradient(#fff 0 0);
        mask-composite: exclude;
        -webkit-mask-composite: destination-out;
    }

    @keyframes neonBorder {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    .movie-poster {
        width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .movie-title {
        font-size: 1.1rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .movie-card p {
        margin: 5px 0;
        font-size: 0.9rem;
    }

    .movie-card .btn-details,
    .movie-card .btn-ajax,
    .movie-card .btn-reviews {
        display: block;
        width: 100%;
        margin-top: 8px;
        padding: 6px 12px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        font-size: 0.9rem;
    }

    .btn-details {
        background-color: #00bcd4;
        color: white;
    }

    .btn-details:hover {
        background-color: #00acc1;
    }

    .btn-ajax {
        background-color: #ffc107;
        color: black;
    }

    .btn-reviews {
        background-color: #f5f5f5;
        color: black;
        border: 1px solid #ddd;
    }

    .container-fluid {
        padding: 0;
        margin: 0 auto;
    }
</style>

<div class="container-fluid mt-4 px-0">
    <!-- Search -->
    <form action="<?= base_url('movies') ?>" method="get">
        <label for="title"><strong>Search from OMDb API:</strong></label>
        <input type="text" name="title" id="title" placeholder="Enter movie title" required>
        <button type="submit">Search</button>
    </form>

    <h1><?= esc($title) ?> - This is the main page</h1>

    <p id="ajaxArticle"></p>

    <!-- Local Movies -->
    <div class="movie-container">
        <?php if (!empty($movies) && is_array($movies)): ?>
            <?php foreach ($movies as $movie_item): ?>
                <div class="movie-card">
                    <?php if (!empty($movie_item['poster'])): ?>
                        <img src="<?= base_url('posters/' . esc($movie_item['poster'])) ?>" alt="Poster for <?= esc($movie_item['title']) ?>" class="movie-poster">
                    <?php else: ?>
                        <p><em>No poster uploaded.</em></p>
                    <?php endif; ?>

                    <div class="movie-title"><?= esc($movie_item['title']) ?></div>
                    <p><strong>Rating:</strong> <?= esc($movie_item['rating']) ?></p>
                    <p><strong>Box Office:</strong> $<?= esc($movie_item['box_office']) ?></p>
                    <p><strong>Release Date:</strong> <?= esc($movie_item['release_date']) ?></p>

                    <a href="<?= base_url('movies/' . esc($movie_item['id'], 'url')) ?>" class="btn-details">View Details</a>
                    <a href="javascript:void(0);" class="btn-ajax" onclick="getData('<?= esc($movie_item['id'], 'url') ?>')">View via Ajax</a>
                    <a href="<?= site_url('review/' . esc($movie_item['id'], 'url')) ?>" class="btn-reviews">Reviews</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No movies found.</p>
        <?php endif; ?>
    </div>

    <!-- OMDb API Results -->
    <?php if (isset($omdbResults)): ?>
        <h2>Search Results from OMDb API:</h2>
        <div class="movie-container">
            <?php foreach ($omdbResults as $result): ?>
                <div class="movie-card">
                    <img src="<?= esc($result['Poster']) ?>" alt="Poster for <?= esc($result['Title']) ?>" class="movie-poster">
                    <div class="movie-title"><?= esc($result['Title']) ?></div>
                    <p><strong>Year:</strong> <?= esc($result['Year']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php elseif (isset($omdbError)): ?>
        <p><strong>Error:</strong> <?= esc($omdbError) ?></p>
    <?php endif; ?>
</div>

<script>
    function getData(id) {
        fetch('<?= base_url('ajax/get/') ?>' + id)
            .then(response => response.json())
            .then(response => {
                document.getElementById("ajaxArticle").innerHTML = "<strong>" + response.title + "</strong>: " + response.description;
            })
            .catch(err => {
                console.error(err);
            });
    }
</script>
