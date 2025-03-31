<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
</head>
<body>

<h2><?= esc($title) ?></h2>

<!-- 🔴 Display general error flash message -->
<?php if (session()->getFlashdata('error')) : ?>
    <div style="color: red; font-weight: bold; margin-bottom: 10px;">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<!-- 🔴 Display detailed validation errors -->
<?php if (isset($validation)) : ?>
    <div style="color: red; margin-bottom: 10px;">
        <ul>
            <?php foreach ($validation->getErrors() as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<!-- ✅ Form to create a new movie -->
<form action="<?= site_url('movies') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="text" name="title" value="<?= old('title') ?>" required>
    <br>

    <label for="rating">Rating</label>
    <input type="number" name="rating" value="<?= old('rating') ?>" step="0.1" min="0" max="10" required>
    <br>

    <label for="box_office">Box Office</label>
    <input type="number" name="box_office" value="<?= old('box_office') ?>" step="0.01" min="0" required>
    <br>

    <label for="release_date">Release Date</label>
    <input type="date" name="release_date" value="<?= old('release_date') ?>" required>
    <br>

    <label for="description">Description</label>
    <textarea name="description" cols="45" rows="4" required><?= old('description') ?></textarea>
    <br>

    <!-- 📤 Poster Upload Field -->
    <label for="poster">Movie Poster</label>
    <input type="file" name="poster" accept="image/*">
    <br><br>

    <input type="submit" name="submit" value="Create movie">
</form>

</body>
</html>
