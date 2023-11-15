<?php
require_once 'inc/functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pandemic Journaling Project</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <!-- sidebar -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h2 class="mb-3 mt-3">Featured Entries</h2>
                <p>Since May 2020, the Pandemic Journaling Project has given ordinary people a place to chronicle and preserve their pandemic experiences. In our first phase, PJP-1,
                    more than 1,800 people in 55 countries have created nearly 27,000 individual journal entries—for themselves, and for the history books. </p>
            </div>
        </div>

        <?php

        if (isset($_GET['type'])) {
            $results = getEntries($_GET['type']);
        } else {
            $results = getEntries();
        }
        ?>

        <div class="row">
            <div class="col-md-4">
                <div class="fixed-container">
                    <h4>Filtered Search</h4>
                    <!-- search form -->
                    <form action="index.php" method="get">
                        <div class="row">
                            <div class="col-md-8 mb-3"> <!-- Adjust the column width as needed -->
                                <input type="text" class="form-control" id="search" name="search" placeholder="Search...">
                            </div>
                            <div class="col-md-4 mb-3"> <!-- Adjust the column width as needed -->
                                <button type="submit" class="btn custom-purple btn-block">Search</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label mb-3" id="formatlabel">Format:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tags[]" value="text-only" id="text-only">
                                <label class="form-check-label" for="text-only">
                                    Text Only
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tags[]" value="text-and-image" id="text-and-image">
                                <label class="form-check-label" for="text-and-image">
                                    Text & Image
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tags[]" value="text-and-audio" id="text-and-audio">
                                <label class="form-check-label" for="text-and-audio">
                                    Text & Audio
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn custom-purple mb-5">Filter</button>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <h4>Results</h4>

                <?php foreach ($results as $result) : ?>
                    <?php
                    $id = $result['id'];
                    $public = $result['public'];
                    $user_public = $result['user_public'];
                    $type = $result['type'];
                    $subject = $result['subject'];
                    $excerpt_or_original_text = $result['excerpt_or_original_text'];
                    $excerpt = $result['excerpt'];
                    $response_created_at = $result['response_created_at'];
                    $featured = $result['featured'];
                    $featured_at = $result['featured_at'];
                    // cleanup the timestamp of $featured_at
                    $featured_at = date("F j, Y", strtotime($featured_at));
                    $response_language = $result['response_language'];
                    $text = $result['text'];
                    $audio = $result['audio'] ?? null;
                    ?>

                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body mt-3">
                                    <h5><span class="badge bg-warning text-dark">
                                            <?php echo $type; ?>
                                        </span></h5>
                                    <h6 class="card-title mt-3 mb-2">
                                        <?php echo $subject; ?>
                                    </h6>
                                    <p class="card-text">
                                        <?php echo $excerpt_or_original_text; ?>
                                    </p>
                                    <p class="card-text mb-3"><small class="text-muted">
                                            <?php echo $featured_at; ?>
                                        </small></p>


                                    <?php if ($type == "audio_only") : ?>
                                        <div class="audio-player">
                                            <h5> File: <?php echo $audio; ?> </h5>
                                            <audio controls>
                                                <source src=" <?php echo $audio; ?>
                                                " type="audio/mpeg">
                                                Your browser does not support the audio element.
                                            </audio>
                                        </div>
                                    <?php endif; ?>



                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>




                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body mt-3">
                                <h5><span class="badge bg-warning text-dark">Text & Image</span></h5>
                                <h6 class="card-title mt-3 mb-2">Card title</h6>
                                <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra tellus in hac habitasse platea dictumst. Nibh sit amet commodo nulla facilisi. Mattis enim ut tellus elementum sagittis vitae et leo duis. Libero volutpat sed cras ornare arcu dui vivamus.</p>
                                <p class="card-text"> Nunc sed blandit libero volutpat sed cras ornare arcu dui. Rhoncus mattis rhoncus urna neque viverra justo nec. In tellus integer feugiat scelerisque varius. Neque convallis a cras semper auctor neque vitae tempus quam. </p>
                                <p class="card-text mb-4"> Leo vel fringilla est ullamcorper eget nulla facilisi. Venenatis tellus in metus vulputate eu. Et malesuada fames ac turpis egestas sed tempus urna. Adipiscing enim eu turpis egestas pretium aenean. Nulla facilisi nullam vehicula ipsum a. </p>
                                <p class="card-text mb-3"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                        <div class="col-md-3 mx-auto d-flex align-items-center">
                            <img src="
                            https://placehold.co/400x500
                            " class="img-fluid rounded-start" alt="...">
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-7">
                            <div class="card-body mt-3">
                                <h5><span class="badge bg-warning text-dark">Text & Audio</span></h5>
                                <h6 class="card-title mt-3 mb-2">Card title</h6>
                                <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra tellus in hac habitasse platea dictumst. Nibh sit amet commodo nulla facilisi. Mattis enim ut tellus elementum sagittis vitae et leo duis. Libero volutpat sed cras ornare arcu dui vivamus.</p>
                                <p class="card-text mb-4"> Leo vel fringilla est ullamcorper eget nulla facilisi. Venenatis tellus in metus vulputate eu. Et malesuada fames ac turpis egestas sed tempus urna. Adipiscing enim eu turpis egestas pretium aenean. Nulla facilisi nullam vehicula ipsum a. </p>
                                <p class="card-text mb-3"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                        <div class="col-md-4 mx-auto d-flex align-items-center">
                            <div class="audio-player">
                                <audio controls>
                                    <source src="your-audio-file.mp3" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-body mt-3">
                                <h5><span class="badge bg-warning text-dark">Text Only</span></h5>
                                <h6 class="card-title mt-3 mb-2">Card title</h6>
                                <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra tellus in hac habitasse platea dictumst. Nibh sit amet commodo nulla facilisi. Mattis enim ut tellus elementum sagittis vitae et leo duis. Libero volutpat sed cras ornare arcu dui vivamus.</p>
                                <p class="card-text mb-4"> Nunc sed blandit libero volutpat sed cras ornare arcu dui. Rhoncus mattis rhoncus urna neque viverra justo nec. In tellus integer feugiat scelerisque varius. Neque convallis a cras semper auctor neque vitae tempus quam. </p>
                                <p class="card-text mb-3"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap 5 JS CDN (required for some components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>