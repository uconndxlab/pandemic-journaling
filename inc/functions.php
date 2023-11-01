<?php
function getEntries(
    $tag=null,
    $count=10,
    $offset=0
) {
    // Connect to SQLite database
    $db = new SQLite3('db/database.db');

    $stmt = $db->prepare('SELECT * FROM your_table WHERE column LIKE :query');
    $stmt->bindValue(':query', "%$query%", SQLITE3_TEXT);
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
        echo '<p>' . $result['column'] . '</p>';
    }
}
?>
