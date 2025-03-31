<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OMDb Movie Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 2rem;
        }
        form {
            margin-bottom: 2rem;
        }
        .results-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }
        .movie-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 1rem;
            text-align: center;
            background-color: #f9f9f9;
        }
        .movie-card img {
            width: 100%;
            height: auto;
            border-radius: 6px;
        }
    </style>
</head>
<body>

    <h2>Search Movies from OMDb API</h2>

    <form action="<?= base_url('omdb/search') ?>" method="get">
        <input type="text" name="title" placeholder="Enter movie title" required>
        <button type="submit">Search</button>
    </form>

    <?php if (!empty($results)): ?>
        <h3>Search Results:</h3>
        <div class="results-container">
            <?php foreach ($results as $movie): ?>
                <div class="movie-card">
                    <?php if (!empty($movie['Poster']) && $movie['Poster'] != 'N/A'): ?>
                        <img src="<?= esc($movie['Poster']) ?>" alt="Poster for <?= esc($movie['Title']) ?>">
                    <?php else: ?>
                        <p><em>No poster available.</em></p>
                    <?php endif; ?>
                    <h4><?= esc($movie['Title']) ?></h4>
                    <p>Year: <?= esc($movie['Year']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php elseif (!empty($error)): ?>
        <p style="color: red;">Error: <?= esc($error) ?></p>
    <?php endif; ?>

</body>
</html>
