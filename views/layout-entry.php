<?php if ($type == "text_only") : ?>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-12">
                <div class="card-body mt-3">
                    <h5><span class="badge bg-warning text-dark">Text Only</span></h5>
                    <h6 class="card-title mt-3 mb-2">
                        <?= htmlspecialchars($subject, ENT_QUOTES, 'UTF-8') ?>
                    </h6>
                    <p class="card-text">
                        <?= htmlspecialchars($excerpt_or_original_text, ENT_QUOTES, 'UTF-8') ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="row ps-5 pe-5">
            <div class="col-md-12 d-flex">
                <p class="card-text mb-3"><small class="text-muted">
                        <?= htmlspecialchars($featured_at, ENT_QUOTES, 'UTF-8') ?>
                    </small></p>
                <p class="card-text mb-3 ms-auto"><small class="text-muted">
                        <a href="?entryID=<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8') ?>" target="_blank" class="btn btn-text">
                            <i class="fas fa-share"></i>
                            Direct Link
                        </a>
                    </small></p>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($type == "photo_and_text") : ?>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body mt-3">
                    <h5><span class="badge bg-warning text-dark">Text & Image</span></h5>
                    <h6 class="card-title mt-3 mb-2">
                        <?= htmlspecialchars($subject, ENT_QUOTES, 'UTF-8') ?>
                    </h6>
                    <p class="card-text mb-4">
                        <?= htmlspecialchars($excerpt_or_original_text, ENT_QUOTES, 'UTF-8') ?>
                    </p>
                </div>
            </div>
            <div class="col-md-3 mx-auto d-flex align-items-center my-4">
                <a href="assets/content/images-fe/<?= htmlspecialchars($image, ENT_QUOTES, 'UTF-8') ?>" target="_blank">
                    <img alt="<?= htmlspecialchars($image, ENT_QUOTES, 'UTF-8') ?>" src="assets/content/images-fe/<?= htmlspecialchars($image, ENT_QUOTES, 'UTF-8') ?>" class="img-fluid rounded-start">
                </a>
            </div>
        </div>
        <div class="row ps-5 pe-5">
            <div class="col-md-12 d-flex">
                <p class="card-text mb-3"><small class="text-muted">
                        <?= htmlspecialchars($featured_at, ENT_QUOTES, 'UTF-8') ?>
                    </small></p>
                <p class="card-text mb-3 ms-auto"><small class="text-muted">
                        <a href="?entryID=<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8') ?>" target="_blank" class="btn btn-text">
                            <i class="fas fa-share"></i>
                            Direct Link
                        </a>
                    </small></p>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($type == "audio_only") : ?>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-7">
                <div class="card-body mt-3">
                    <h5><span class="badge bg-warning text-dark">Text & Audio</span></h5>
                    <h6 class="card-title mt-3 mb-2">
                        <?= htmlspecialchars($subject, ENT_QUOTES, 'UTF-8') ?>
                    </h6>
                    <div class="card-text">
                        <?= htmlspecialchars($excerpt_or_original_text, ENT_QUOTES, 'UTF-8') ?>
                    </div>
                    <p class="card-text mb-3">
                        <small class="text-muted">
                            <?= htmlspecialchars($featured_at, ENT_QUOTES, 'UTF-8') ?>
                        </small>
                    </p>
                </div>
            </div>
            <div class="col-md-4 mx-auto d-flex align-items-center">
                <div class="audio-player">
                    <audio controls>
                        <source src="/assets/content/audio-fe/<?= htmlspecialchars($audio, ENT_QUOTES, 'UTF-8') ?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>
        </div>
        <div class="row ps-5 pe-5">
            <div class="col-md-12 d-flex">
                <p class="card-text mb-3"><small class="text-muted">
                        <?= htmlspecialchars($featured_at, ENT_QUOTES, 'UTF-8') ?>
                    </small></p>
                <p class="card-text mb-3 ms-auto"><small class="text-muted">
                        <a href="?entryID=<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8') ?>" target="_blank" class="btn btn-text">
                            <i class="fas fa-share"></i>
                            Direct Link
                        </a>
                    </small></p>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
