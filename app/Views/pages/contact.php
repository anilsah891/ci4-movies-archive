<?= $this->include('templates/header') ?>

<style>
    .contact-hero {
        background: linear-gradient(to right, #1c1c1e, #2a2a2d);
        color: white;
        padding: 60px 20px;
        text-align: center;
    }

    .contact-hero h1 {
        font-size: 2.5rem;
        color: #00bfa5;
        margin-bottom: 10px;
    }

    .contact-hero p {
        font-size: 1.1rem;
        color: #ccc;
    }

    .contact-form-container {
        background-color: #121212;
        padding: 30px;
        max-width: 700px;
        margin: 40px auto;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0, 255, 255, 0.1);
    }

    .contact-form label {
        color: #fff;
        font-weight: bold;
        margin-top: 12px;
    }

    .contact-form input,
    .contact-form textarea {
        width: 100%;
        padding: 10px;
        margin-top: 6px;
        border-radius: 6px;
        border: 1px solid #444;
        background-color: #1f1f1f;
        color: #fff;
    }

    .contact-form button {
        margin-top: 20px;
        background-color: #00bcd4;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s ease-in-out;
    }

    .contact-form button:hover {
        background-color: #0097a7;
    }

    @media screen and (max-width: 768px) {
        .contact-hero h1 {
            font-size: 2rem;
        }

        .contact-form-container {
            margin: 20px 15px;
            padding: 20px;
        }
    }
</style>

<!-- ✅ Header Section -->
<div class="contact-hero">
    <h1>📩 Contact Us</h1>
    <p>Have questions, feedback, or want to get in touch with the Movies Archive team?</p>
</div>

<!-- ✅ Success Flash Message -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success text-center" style="max-width: 700px; margin: 20px auto;">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<!-- ✅ Contact Form -->
<div class="contact-form-container">
    <form class="contact-form" action="<?= base_url('contact/send') ?>" method="post">
        <?= csrf_field() ?>

        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" value="<?= old('name') ?>" required>

        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" value="<?= old('email') ?>" required>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" value="<?= old('subject') ?>" required>

        <label for="message">Your Message:</label>
        <textarea id="message" name="message" rows="5" required><?= old('message') ?></textarea>

        <button type="submit">Send Message</button>
    </form>
</div>

<?= $this->include('templates/footer') ?>
