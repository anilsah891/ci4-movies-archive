<?= $this->include('templates/header') ?>

<!-- Font Awesome for star icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

<style>
    .review-form .form-control, .review-form .form-select {
        font-size: 0.95rem;
        padding: 8px 12px;
    }

    .review-card {
        background: #fff;
        border-left: 5px solid #ff8a65;
        border-radius: 10px;
        padding: 15px 20px;
        margin-bottom: 20px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        transition: 0.3s ease;
    }

    .review-card:hover {
        transform: scale(1.01);
    }

    .review-stars {
        margin-bottom: 6px;
    }

    .review-name {
        font-weight: bold;
        font-size: 1.1rem;
        color: #333;
    }

    .review-date {
        font-size: 0.8rem;
        color: #777;
    }

    .review-comment {
        font-style: italic;
        color: #444;
        font-size: 0.95rem;
    }

    .review-section-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-top: 40px;
        margin-bottom: 25px;
        color: #333;
    }
</style>

<div class="container py-5 fade-in">
    <!-- ✅ Review Form -->
    <h3 class="mb-4">Leave a Review</h3>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('review/submit') ?>" class="row g-3 review-form">
        <?= csrf_field() ?>
        <input type="hidden" name="movie_id" value="<?= esc($movieId) ?>">

        <div class="col-md-4">
            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
        </div>

        <div class="col-md-4">
            <select name="rating" class="form-select" required>
                <option value="">Rating</option>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <option value="<?= $i ?>"><?= $i ?> Star<?= $i > 1 ? 's' : '' ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="col-md-12">
            <textarea name="comment" class="form-control" placeholder="Your Review" rows="2" required></textarea>
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary px-4">Submit Review</button>
        </div>
    </form>

    <!-- ✅ Reviews List -->
    <h4 class="review-section-title">⭐ Reviews</h4>

    <?php if (!empty($reviews)): ?>
        <?php foreach ($reviews as $review): ?>
            <div class="review-card">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="review-name"><?= esc($review['name']) ?></span>
                    <div class="review-stars">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <?php if ($i <= $review['rating']): ?>
                                <i class="fas fa-star text-warning"></i>
                            <?php else: ?>
                                <i class="far fa-star text-muted"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
                <p class="review-comment mb-1"><?= esc($review['comment']) ?></p>
                <span class="review-date"><?= $review['created_at'] ?></span>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No reviews yet. Be the first to review!</p>
    <?php endif; ?>
</div>

<?= $this->include('templates/footer') ?>
