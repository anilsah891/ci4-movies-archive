<?= $this->include('templates/header') ?>

<style>
    body {
        background: linear-gradient(to right, #e0f7fa, #e1bee7);
        font-family: 'Segoe UI', sans-serif;
    }

    .login-card {
        background: white;
        border-radius: 20px;
        padding: 40px 30px;
        max-width: 500px;
        margin: 100px auto;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        animation: slideIn 0.6s ease;
    }

    @keyframes slideIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .yeti-container {
        text-align: center;
        margin-bottom: 25px;
    }

    .yeti-container img {
        max-width: 150px;
        transition: transform 0.3s ease;
        border-radius: 50%;
    }

    .yeti-container img:hover {
        transform: scale(1.05);
    }

    .form-label {
        font-weight: 600;
    }

    .input-group .btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
</style>

<div class="login-card">
    <div class="yeti-container">
        <img id="yeti" src="<?= base_url('assets/images/yeti-open.png') ?>" alt="Yeti">
    </div>

    <h2 class="text-center mb-4">Login</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('login/authenticate') ?>">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <div class="input-group">
                <input type="password" class="form-control" name="password" id="password" required onfocus="coverEyes()" onblur="openEyes()">
                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">👁️</button>
            </div>
        </div>

        <button type="submit" class="btn btn-success w-100 mt-3">Login</button>
    </form>
</div>

<script>
    const yeti = document.getElementById('yeti');
    const passwordInput = document.getElementById('password');
    let isPasswordVisible = false;

    function coverEyes() {
        if (!isPasswordVisible) {
            yeti.src = "<?= base_url('assets/images/yeti-covered.png') ?>";
        }
    }

    function openEyes() {
        if (!isPasswordVisible) {
            yeti.src = "<?= base_url('assets/images/yeti-open.png') ?>";
        }
    }

    function togglePassword() {
        isPasswordVisible = !isPasswordVisible;
        if (isPasswordVisible) {
            passwordInput.type = "text";
            yeti.src = "<?= base_url('assets/images/yeti-peek.png') ?>";
        } else {
            passwordInput.type = "password";
            yeti.src = "<?= base_url('assets/images/yeti-covered.png') ?>";
        }
    }
</script>

<?= $this->include('templates/footer') ?>
