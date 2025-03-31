<?= $this->include('templates/header') ?>

<div class="container mt-5 pt-5 fade-in" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Create an Account</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('register/store') ?>">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" name="username" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>
</div>

<?= $this->include('templates/footer') ?>
