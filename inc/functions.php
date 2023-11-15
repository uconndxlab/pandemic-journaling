<?php
function getEntries(
    $type = null
) {
    // Connect to SQLite database
    $db = new SQLite3('db/database.db');

    if ($type) {
        $stmt = $db->prepare('SELECT * FROM entries WHERE type = :type
        ORDER BY featured_at DESC
        limit 55
        ');
        $stmt->bindValue(':type', $type, SQLITE3_TEXT);
    } else {
        $stmt = $db->prepare('SELECT * FROM entries 
        ORDER BY featured_at DESC
        limit 55
        ');
    }

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
