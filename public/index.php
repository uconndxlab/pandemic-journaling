<?php
require_once '../inc/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pandemic Journaling Project (Test)</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- Font Awesome 5 CDN (required for some components) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <!-- sidebar -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h2 class="mb-3 mt-3">Featured Entries</h2>
                <p>Since May 2020, the Pandemic Journaling Project has given ordinary people a place to chronicle and
                    preserve their pandemic experiences. In our first phase, PJP-1,
                    more than 1,800 people in 55 countries have created nearly 27,000 individual journal entries—for
                    themselves, and for the history books. </p>
            </div>
        </div>

        <?php
        // Get the total number of entries
        $totalEntries = getTotalEntries($_GET['type'] ?? null);
        // Calculate the total number of pages
        $totalPages = ceil($totalEntries / 24);
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
            switch ($_GET['type']) {
                case "text_only":
                    $type_text = "Text Only";
                    break;
                case "photo_and_text":
                    $type_text = "Text & Image";
                    break;
                case "audio_only":
                    $type_text = "Text & Audio";
                    break;
            }
        } else {
            $type = null;
            $type_text = "All Entries";
        } 

        if (isset($_GET['language'])) {
            $lang = $_GET['language'];
        } else {
            $lang = null;
        }

        // Get the entries for the current page
        $results = getEntries($type, $lang, $page);
        ?>

        <div class="row">
            <div class="col-md-3">
                <div class="fixed-container">
                    <!-- search form -->
                    <form action="" method="get">
                        <div class="mb-3">
                            <h5 class="form-label mb-3" id="formatlabel">Format:</h5>
                            <div class="form-check">
                                <input <?php if (isset($_GET['type']) && $_GET['type'] == "text_only")
                                            echo "checked"; ?> class="form-check-input" type="checkbox" name="type" value="text_only" id="text-only">
                                <label class="form-check-label" for="text-only">
                                    Text Only
                                </label>
                            </div>

                            <div class="form-check">
                                <input <?php if (isset($_GET['type']) && $_GET['type'] == "photo_and_text")
                                            echo "checked"; ?> class="form-check-input" type="checkbox" name="type" value="photo_and_text" id="text-and-image">
                                <label class="form-check-label" for="text-and-image">
                                    Text & Image
                                </label>
                            </div>

                            <div class="form-check">
                                <input <?php if (isset($_GET['type']) && $_GET['type'] == "audio_only")
                                            echo "checked"; ?> class="form-check-input" type="checkbox" name="type" value="audio_only" id="text-and-audio">
                                <label class="form-check-label" for="text-and-audio">
                                    Text & Audio
                                </label>
                            </div>
                            <h5 class="form-label mt-4 mb-3" id="formatlabel">Language:</h5>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="language"
                                <?php if (isset($_GET['language']) && $_GET['language'] == "en")
                                            echo "checked"; ?> 
                                
                                value="en" id="english">
                                <label class="form-check-label" for="english">
                                    English Only
                                </label>
                            </div>

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" 
                                <?php if (isset($_GET['language']) && $_GET['language'] == "sp")
                                            echo "checked"; ?>
                                
                                name="language" value="sp" id="spanish">
                                <label class="form-check-label" for="spanish">
                                    Solamente Español
                                </label>

                            </div>

                        </div>
                        <button type="submit" class="btn custom-purple mb-5">Filter</button>
                    </form>
                </div>

            </div>

            <div class="col-md-9">

                <?php if (!isset($_GET['entryID'])): ?>
                <h4>Results 
                    <?php if (isset($_GET['type'])): ?>
                    for <?php echo $type_text; ?>
                    <?php endif; ?>

                </h4>
                <p>Page
                    <?php echo $page; ?> of
                    <?php echo $totalPages; ?>
                </p>
                <p>
                    <?php echo $totalEntries; ?> entries match your search criteria.
                </p>
                <?php

                $type = $_GET['type'] ?? null;
                if ($type) {
                    $type_text = '&type=' . $type;
                } 
                else {
                    $type_text = '';
                }
                ?>


                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <?php if ($page > 1) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page - 1 . $type_text;
                                                                    ?>
                                " aria-label="Previous">
                                    <span aria-hidden="true">Previous Page</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php
                        $startPage = max(1, $page - 2);
                        $endPage = min($startPage + 4, $totalPages);

                        if ($startPage > 1) :
                        ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=1<?php echo $type_text; ?>">1</a>
                            </li>
                            <?php if ($startPage > 2) : ?>
                                <li class="page-item disabled">
                                    <a class="page-link">...</a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php for ($i = $startPage; $i <= $endPage; $i++) : ?>
                            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i . $type_text;

                                                                    ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($endPage < $totalPages) : ?>
                            <?php if ($endPage < $totalPages - 1) : ?>
                                <li class="page-item disabled">
                                    <a class="page-link">...</a>
                                </li>
                            <?php endif; ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $totalPages . $type_text; ?>">
                                    <?php echo $totalPages; ?>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if ($page < $totalPages) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page + 1 . $type_text; ?>

                                " aria-label="Next">
                                    <span aria-hidden="true">Next Page</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>

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
                    $audio = $result['audio'] ?? null;
                    $image = $result['image'] ?? null;

                    include '../views/layout-entry.php';

                    ?>
                  

                <?php endforeach; ?>

                <?php else: ?>
                <?php
                    $result = getEntry($_GET['entryID']);
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
                    $audio = $result['audio'] ?? null;
                    $image = $result['image'] ?? null;

                    include '../views/layout-entry.php';

                    ?>



                

             <?php endif; ?>





            </div>
        </div>
    </div>


    <!-- Bootstrap 5 JS CDN (required for some components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        // Send the height of the content to the parent window
        function sendHeight() {
            var height = document.body.scrollHeight;
            parent.postMessage({
                height: height
            }, '*');

        }

        // Call sendHeight whenever the content changes (e.g., on load or after dynamic changes)
        window.onload = sendHeight;
        // You might need to call sendHeight on other events, depending on your content



    </script>

</body>

</html>