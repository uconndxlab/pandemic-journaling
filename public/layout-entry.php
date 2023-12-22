<?php if ($type == "text_only") : ?>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-12">
                <div class="card-body mt-3">
                    <h5><span class="badge bg-warning text-dark">
                            Text Only
                        </span></h5>
                    <h6 class="card-title mt-3 mb-2">
                        <?php echo $subject; ?>
                    </h6>
                    <p class="card-text">
                        <?php echo $excerpt_or_original_text; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="row ps-5 pe-5">
            <div class="col-md-12 d-flex">
                <p class="card-text mb-3"><small class="text-muted">
                        <?php echo $featured_at; ?>
                    </small></p>
                <p class="card-text mb-3 ms-auto"><small class="text-muted">
                        <!-- button that says share as a text link -->
                        <a href="?entryID=<?php echo $id; ?>" target="_blank" class="btn btn-text">
                            <i class="fas fa-share"></i>
                            Share</a>



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
                        <?php echo $subject; ?>
                    </h6>
                    <p class="card-text mb-4">
                        <?php echo $excerpt_or_original_text; ?>
                    </p>
                </div>
            </div>
            <div class="col-md-3 mx-auto d-flex align-items-center">
                <img alt="<?php echo $image; ?>" src="assets/content/images-fe/<?php echo strip_tags($image); ?>" class="img-fluid rounded-start" alt="...">
            </div>
        </div>
        <div class="row ps-5 pe-5">
            <div class="col-md-12 d-flex">
                <p class="card-text mb-3"><small class="text-muted">
                        <?php echo $featured_at; ?>
                    </small></p>
                <p class="card-text mb-3 ms-auto"><small class="text-muted">
                        <!-- button that says share as a text link -->
                        <a href="?entryID=<?php echo $id; ?>" target="_blank" class="btn btn-text">
                            <i class="fas fa-share"></i>
                            Share</a>



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
                        <?php echo $subject; ?>
                    </h6>
                    <div class="card-text">
                        <?php echo strip_tags($excerpt_or_original_text); ?>
                    </div>
                    <p class="card-text mb-3">
                        <small class="text-muted">
                            <?php echo $featured_at; ?>
                        </small>
                    </p>
                </div>
            </div>
            <div class="col-md-4 mx-auto d-flex align-items-center">
                <div class="audio-player">
                    <audio controls>
                        <source src="/assets/content/audio-fe/<?php echo strip_tags($audio); ?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>
        </div>
        <div class="row ps-5 pe-5">
            <div class="col-md-12 d-flex">
                <p class="card-text mb-3"><small class="text-muted">
                        <?php echo $featured_at; ?>
                    </small></p>
                <p class="card-text mb-3 ms-auto"><small class="text-muted">
                        <!-- button that says share as a text link -->
                        <a href="?entryID=<?php echo $id; ?>" target="_blank" class="btn btn-text">
                            <i class="fas fa-share"></i>
                            Share</a>



                    </small></p>
            </div>
        </div>
    </div>
<?php endif; ?>