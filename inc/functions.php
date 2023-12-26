<?php
function getTotalEntries($type = null, $lang=null) {
    // Connect to SQLite database
    $db = new SQLite3('../db/database.db');

    if ($type && !$lang) {
        $stmt = $db->prepare('SELECT COUNT(*) AS total FROM entries WHERE type = :type');
        $stmt->bindValue(':type', $type, SQLITE3_TEXT);
    } 
    elseif (!$type && $lang ) {
        $stmt = $db->prepare('SELECT COUNT(*) AS total FROM entries WHERE response_language = :lang');
        $stmt->bindValue(':lang', $lang, SQLITE3_TEXT);
    }
    elseif ($type && $lang) {
        $stmt = $db->prepare('SELECT COUNT(*) AS total FROM entries WHERE type = :type AND response_language = :lang');
        $stmt->bindValue(':type', $type, SQLITE3_TEXT);
        $stmt->bindValue(':lang', $lang, SQLITE3_TEXT);
    }
    else {
        $stmt = $db->prepare('SELECT COUNT(*) AS total FROM entries');
    }

    $result = $stmt->execute();
    $row = $result->fetchArray(SQLITE3_ASSOC);

    // Close database connection
    $db->close();

    return $row['total'];
}
function getEntries(
    $type = null, 
    $lang=null,
    $page = 1
) {
    // Connect to SQLite database
    $db = new SQLite3('../db/database.db');

    // Set the number of entries per page
    $entriesPerPage = 20;

    // Calculate the offset based on the current page
    $offset = ($page - 1) * $entriesPerPage;

    // build the query based on the type and language and page

    if ($type && $lang) {
        $stmt = $db->prepare('SELECT * FROM entries WHERE type = :type AND response_language = :lang
        ORDER BY featured_at DESC
        LIMIT :limit OFFSET :offset');
        $stmt->bindValue(':type', $type, SQLITE3_TEXT);
        $stmt->bindValue(':lang', $lang, SQLITE3_TEXT);
    } elseif ($type && !$lang) {
        $stmt = $db->prepare('SELECT * FROM entries WHERE type = :type
        ORDER BY featured_at DESC
        LIMIT :limit OFFSET :offset');
        $stmt->bindValue(':type', $type, SQLITE3_TEXT);
    } elseif (!$type && $lang) {
        $stmt = $db->prepare('SELECT * FROM entries WHERE response_language = :lang
        ORDER BY featured_at DESC
        LIMIT :limit OFFSET :offset');
        $stmt->bindValue(':lang', $lang, SQLITE3_TEXT);
    } else {
        $stmt = $db->prepare('SELECT * FROM entries 
        ORDER BY featured_at DESC
        LIMIT :limit OFFSET :offset');
    }

    $stmt->bindValue(':limit', $entriesPerPage, SQLITE3_INTEGER);
    $stmt->bindValue(':offset', $offset, SQLITE3_INTEGER);

    $result = $stmt->execute();

    // Fetch results
    $results = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $results[] = $row;
    }

    // Close database connection
    $db->close();

    return $results;
}

function getEntry($id) {
    // Connect to SQLite database
    $db = new SQLite3('../db/database.db');

    $stmt = $db->prepare('SELECT * FROM entries WHERE id = :id');
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

    $result = $stmt->execute();
    $row = $result->fetchArray(SQLITE3_ASSOC);

    // Close database connection
    $db->close();

    return $row;
}

function displayResults($results) {
    // Display results in HTML format
    foreach ($results as $result) {
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
        $response_language = $result['response_language'];
        $text = $result['text'];

        echo "<h5>".$featured_at."</h5>";
        echo "<p>".$text."</p>";



        

        

    }
}



?>
