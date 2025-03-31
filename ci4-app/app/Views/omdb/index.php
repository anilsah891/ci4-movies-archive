<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OMDb Search Results</title>
    <style>
        .movie-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .movie-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 12px;
            max-width: 200px;
            text-align: center;
        }

        .movie-card img {
            width: 100%;
            border-radius: 6px;
        }
    </style>
</head>
<body>

    <h2>Search Results from OMDb API</h2>

    <?php if (!empty($results)): ?>
        <div class="movie-container">
            <?php foreach ($results as $movie): ?>
                <div class="movie-card">
                    <h4><?= esc($movie['Title']) ?></h4>
                    <p>Year: <?= esc($movie['Year']) ?></p>
                    <?php if (!empty($movie['Poster']) && $movie['Poster'] !== 'N/A'): ?>
                        <img src="<?= esc($movie['Poster']) ?>" alt="Poster for <?= esc($movie['Title']) ?>">
                    <?php else: ?>
                        <p><em>No poster available</em></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php elseif (!empty($error)): ?>
        <p><strong>Error:</strong> <?= esc($error) ?></p>
    <?php else: ?>
        <p>No search made yet.</p>
    <?php endif; ?>

</body>
</html>
