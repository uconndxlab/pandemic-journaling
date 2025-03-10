<?php
require_once '../inc/functions.php';

$is_filtered = false;

// check to see if it's being loaded in an iframe
if (isset($_SERVER['HTTP_SEC_FETCH_DEST']) && $_SERVER['HTTP_SEC_FETCH_DEST'] == 'iframe') {
    $isIframe = true;
} else {
    $isIframe = false;
}
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
    <link rel="stylesheet" href="https://uconn.edu/content/themes/lobo/vendor/uconn/banner/_site/banner.css?ver=6.3.1">
    <link rel="stylesheet" href="assets/css/banner.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <?php if (!$isIframe) : ?>
        <div id="uconn-banner" style="background-color:#000E2F;">
            <div id="uconn-header-container" class="row-container row-fluid container">
                <div id="home-link-container">
                    <a id="home-link" href="https://uconn.edu/">
                        <span id="wordmark" aria-hidden="true">UConn</span>
                        <span id="university-of-connecticut" style="text-transform: uppercase;">
                            University of Connecticut
                        </span>
                    </a>
                </div>
                <div id="button-container">
                    <div class="icon-container" id="icon-container-search">
                        <a class="btn" id="uconn-search" href="https://uconn.edu/search">
                            <span class="no-css">Search University of Connecticut</span>
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 32 32" aria-hidden="true" class="banner-icon">
                                <title>Search UConn</title>
                                <path d="M28.072 24.749l-6.046-6.046c0.912-1.499 1.437-3.256 1.437-5.139 0-5.466-4.738-10.203-10.205-10.203-5.466 0-9.898 4.432-9.898 9.898 0 5.467 4.736 10.205 10.203 10.205 1.818 0 3.52-0.493 4.984-1.349l6.078 6.080c0.597 0.595 1.56 0.595 2.154 0l1.509-1.507c0.594-0.595 0.378-1.344-0.216-1.938zM6.406 13.258c0-3.784 3.067-6.853 6.851-6.853 3.786 0 7.158 3.373 7.158 7.158s-3.067 6.853-6.853 6.853-7.157-3.373-7.157-7.158z"></path>
                            </svg>
                        </a>
                        <div id="uconn-search-tooltip"></div>
                    </div>
                    <div class="icon-container" id="icon-container-az">
                        <a class="btn" id="uconn-az" href="https://uconn.edu/az">
                            <span class="no-css">A to Z Index</span>
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 32 32" aria-hidden="true" class="banner-icon">
                                <title>UConn A to Z Search</title>
                                <path d="M5.345 8.989h3.304l4.944 13.974h-3.167l-0.923-2.873h-5.147l-0.946 2.873h-3.055l4.989-13.974zM5.152 17.682h3.579l-1.764-5.499-1.815 5.499zM13.966 14.696h5.288v2.56h-5.288v-2.56zM20.848 20.496l7.147-9.032h-6.967v-2.474h10.597v2.341l-7.244 9.165h7.262v2.466h-10.798v-2.466h0.004z"></path>
                            </svg>
                        </a>
                        <div id="uconn-az-tooltip"></div>
                    </div>
                </div>
            </div>
        </div>

        <div style="background-color:#000E2F;border-bottom:5px solid #ffc107;">
            <div class="container ps-3">
                <nav class="upper-nav">
                    <a class="parent-title" href="https://core.uconn.edu/">
                        Center for Open Research Resources &amp; Equipment
                    </a>
                </nav>
                <!--Level 1 Title-->
                <nav class="navbar navbar-expand-lg navbar-light shift">
                    <a class="navbar-brand" href="/">
                        Pandemic Journaling Project Featured Entries
                    </a>
                </nav>
            </div>
        </div>

        <div style="background-color:#34233a">
            <!-- to learn more about this project, visit pandemic-journaling-project.uconn.edu -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-warning mt-3" role="alert">
                            <h4 class="alert-heading">Learn More About the Pandemic Journaling Project</h4>
                            Over 1,800 people around the world have participated in PJP, contributing entries in text, audio, and image format. Each week during PJP’s first phase, we posted a few entries with participants' permission. Below is a curated sample of those entries, searchable by keyword, format, and/or language.<p>
                
                            </p>

                            <p>For more information, visit the project homepage.</p>
                            
                            <div class="d-grid gap-2">

                                <a class="btn btn-dark" type="button"
                                href="https://pandemic-journaling-project.chip.uconn.edu/" target="_blank"
                                >
                                    Visit Project Homepage
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> 

    <?php endif; ?>

    <div class="container mt-5">
        <?php

        if (isset($_GET['page'])) {
            $is_filtered = true;
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
            $is_filtered = true;
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
            $is_filtered = true;
            $lang = $_GET['language'];
        } else {
            $lang = null;
        }

        if (isset($_GET['search'])) {
            $is_filtered = true;
            $search_term = $_GET['search'];
        } else {
            $search_term = null;
        }

  



        // Get the entries for the current page
        $results = getEntries($search_term, $type, $lang, $page);

        // Get the total number of entries
        $totalEntries = $results['count'];
        // Calculate the total number of pages
        $totalPages = ceil($totalEntries / 24);

        $randos = get_random_image_or_audio_entries(1);

        ?>

        <div class="row">
            <div class="col-md-3">
                <div class="fixed-container">
                    <!-- search form -->
                    <form hx-get="/" hx-target="#results-wrap" hx-select="#results-wrap" hx-push-url="true" action="" autocomplete="off" method="get">
                        <div class="mb-3">

                            <h6 class="form-label mt-4 mb-3" id="formatlabel">Text Search: </h6>
                            <div class="input-group mb-3">
                                <input autocomplete="one-time-code" id="search" value="<?php if (isset($_GET['search'])) echo $_GET['search'];
                                                                                        else "" ?>" type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-btn" name="search">
                            </div>

                            <h6 class="form-label mb-3" id="formatlabel">Format:</h6>
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
                            <h6 class="form-label mt-4 mb-3" id="formatlabel">Language:</h6>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="language" <?php if (isset($_GET['language']) && $_GET['language'] == "en")
                                                                                                    echo "checked"; ?> value="en" id="english">
                                <label class="form-check-label" for="english">
                                    English Only
                                </label>
                            </div>

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" <?php if (isset($_GET['language']) && $_GET['language'] == "sp")
                                                                                    echo "checked"; ?> name="language" value="sp" id="spanish">
                                <label class="form-check-label" for="spanish">
                                    Solamente Español
                                </label>

                            </div>

                            <button type="submit" class="btn custom-purple mb-5">Filter</button>

                        </div>
                    </form>
                </div>

            </div>

            <div id="results-wrap" class="col-md-9">


                <?php if (!$is_filtered && !isset($_GET['entryID']) ) : ?>
                    <!-- show a single random entry with a header "Featured" and a "refresh" button -->
                    <div id="random_featured">
                        <h4>Featured 
                            <!-- refresh button -->
                            <a href="/" hx-get="/" hx-select="#random_featured" hx-target="#random_featured" hx-swap="outerHTML" class="btn btn-text">
                                <i class="fas fa-sync-alt"></i>
                                Refresh</a>

                        </h4>
                        <!-- use the $randos variable to display a single random entry -->
                        <?php foreach ($randos['entries'] as $rando) :
                            $id = $rando['id'];
                            $public = $rando['public'];
                            $user_public = $rando['user_public'];
                            $type = $rando['type'];
                            $subject = $rando['subject'];
                            $excerpt_or_original_text = $rando['excerpt_or_original_text'];
                            $excerpt = $rando['excerpt'];
                            $response_created_at = $rando['response_created_at'];
                            $featured = $rando['featured'];
                            $featured_at = $rando['featured_at'];
                            // cleanup the timestamp of $featured_at
                            $featured_at = date("F j, Y", strtotime($featured_at));
                            $response_language = $rando['response_language'];
                            $audio = $rando['audio'] ?? null;
                            $image = $rando['image'] ?? null;

                            if ($image) {
                                $extensions = ['jpg', 'JPG', 'jpeg', 'jfif'];
                                foreach ($extensions as $ext) {
                                    $fullpath = "assets/content/images-fe/{$image}.{$ext}";
                                    if (file_exists("assets/content/images-fe/{$image}.{$ext}")) {
                                        $image = "{$image}.{$ext}";
                                        break;
                                    }
                                }
                            }

                            include '../views/layout-entry.php';
                            ?>
                        <?php endforeach; ?>

                    </div>
                <?php endif; ?>
          


                <?php if (!isset($_GET['entryID'])) : ?>
                    <h4 class="mt-5">
                        <?php if (!$is_filtered) : ?>
                            All Entries
                        <?php endif; ?>

                        <?php if ($is_filtered) : ?>
                           Results
                        <?php endif; ?>

                        <?php if (isset($_GET['type'])) : ?>
                            for <?php echo $type_text; ?>
                        <?php endif; ?>
                    </h4>

                    <p>
                        <?php echo $totalEntries; ?> entries
                        <?php if ($is_filtered) : ?>
                            found 
                        <?php endif; ?>
                        
                        <br>
                        <?php // showing only [lang] entries
                        if ($lang) {
                            switch ($lang) {
                                case "en":
                                    $lang_text = "English";
                                    break;
                                case "sp":
                                    $lang_text = "Spanish";
                                    break;
                            }

                            echo "<small>Showing only " . $lang_text . " Language entries.</small>";
                        }
                        ?>
                    </p>


                    <?php

                    if ($type) {
                        $type_query = '&type=' . $type;
                    } else {
                        $type_query = '';
                    }

                    if ($lang) {
                        $lang_query = '&language=' . $lang;
                    } else {
                        $lang_query = '';
                    }

                    if ($search_term) {
                        $search_query = '&search=' . $search_term;
                    } else {
                        $search_query = '';
                    }

                    ?>

                    <p>Page
                        <?php echo $page; ?> of
                        <?php echo $totalPages; ?>
                    </p>

                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <?php if ($page > 1) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo $page - 1 . $type_query . $lang_query . $search_query; ?>

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
                                    <a class="page-link" href="?page=1<?php echo $type_query . $lang_query . $search_query; ?>">1</a>
                                </li>
                                <?php if ($startPage > 2) : ?>
                                    <li class="page-item disabled">
                                        <a class="page-link">...</a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php for ($i = $startPage; $i <= $endPage; $i++) : ?>
                                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $i . $type_query . $lang_query . $search_query; ?>">
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
                                    <a class="page-link" href="?page=<?php echo $totalPages . $type_query . $lang_query . $search_query; ?>">
                                        <?php echo $totalPages; ?>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if ($page < $totalPages) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo $page + 1 . $type_query . $lang_query . $search_query ?>" aria-label="Next">
                                        <span aria-hidden="true">Next Page</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>

                    <?php foreach ($results['entries'] as $result) :
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

                        if ($image) {
                            $extensions = ['jpg', 'JPG', 'jpeg', 'jfif'];
                            foreach ($extensions as $ext) {
                                $fullpath = "assets/content/images-fe/{$image}.{$ext}";
\                                if (file_exists("assets/content/images-fe/{$image}.{$ext}")) {
                                    $image = "{$image}.{$ext}";
                                    break;
                                }
                            }
                        }

                        include '../views/layout-entry.php';

                    endforeach; ?>

                <?php else :
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

                    if ($image) {
                        $extensions = ['jpg', 'JPG', 'jpeg', 'jfif'];
                        foreach ($extensions as $ext) {
                            $fullpath = "assets/content/images-fe/{$image}.{$ext}";
                            
                            if (file_exists("assets/content/images-fe/{$image}.{$ext}")) {
                                $image = "{$image}.{$ext}";
                                break;
                            }
                        }
                    }

                    include '../views/layout-entry.php';

                endif; ?>
            </div>
        </div>
    </div>

    <?php if (!$isIframe) : ?>

    <footer id="footer" class="site-footer" role="contentinfo">
			<div class="container">
				<ul id="uc-footer-links" class="clearfix text-center">
											<li>
							© <a href="http://uconn.edu">University of Connecticut</a>
						</li>
						<li>
							<a href="http://uconn.edu/disclaimers-privacy-copyright/">Disclaimers, Privacy &amp; Copyright</a>
						</li>
                        <li>
							<a href="https://accessibility.uconn.edu/">Accessibility</a>
						</li>
										<li>
						<a href="https://pandemic-journaling-project.chip.uconn.edu/wp-admin/">Webmaster Login</a>
					</li>

                    <a href="https://pandemic-journaling-project.chip.uconn.edu/contributors-2/" target="_blank">
                        Contact Information
                    </a>

									</ul>
			</div>
		</footer>
    <?php endif; ?>
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

    <!-- htmx JS CDN -->
    <script src="https://unpkg.com/htmx.org/dist/htmx.min.js"></script>

</body>

</html>