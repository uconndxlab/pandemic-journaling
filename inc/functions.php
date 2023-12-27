<?php

function getCount($stmt) {
    // Connect to SQLite database
    $db = new SQLite3('../db/database.db');
   
    $queryText = $stmt->getSQL(true);
    $queryText = str_replace('SELECT *', 'SELECT COUNT(*) as total ', $queryText);

    // remove all references to LIMIT and OFFSET
    $queryText = preg_replace('/LIMIT\s[0-9]+/i', '', $queryText);
    $queryText = preg_replace('/OFFSET\s[0-9]+/i', '', $queryText);


   
    //die ($queryText);

    $query = $db->prepare($queryText);

    $result = $query->execute();
    $row = $result->fetchArray(SQLITE3_ASSOC);
    $total = $row['total'];

    // Close database connection
    $db->close();
    return $total;

}


function getEntries(
    $search_term = null,
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


    $conditions = [];

    if ($search_term) {
        $conditions[] = "excerpt_or_original_text LIKE :search_term";
    }

    if ($type) {
        $conditions[] = "type = :type";
    }

    if ($lang) {
        $conditions[] = "response_language = :lang";
    }

    $whereClause = (!empty($conditions))
        ? 'WHERE ' . implode(' AND ', $conditions)
        : '';

    $query = "SELECT * FROM entries $whereClause ORDER BY featured_at DESC LIMIT :limit OFFSET :offset"; 
    $stmt = $db->prepare($query);


    if ($search_term) {
        $stmt->bindValue(':search_term', "%$search_term%", SQLITE3_TEXT);
    }

    if ($type) {
        $stmt->bindValue(':type', $type, SQLITE3_TEXT);
    }

    if ($lang) {
        $stmt->bindValue(':lang', $lang, SQLITE3_TEXT);
    }






    $stmt->bindValue(':limit', $entriesPerPage, SQLITE3_INTEGER);
    $stmt->bindValue(':offset', $offset, SQLITE3_INTEGER);

    $total = getCount($stmt);


    $result = $stmt->execute();

    // Fetch results
    $results = [];

    $results['count'] = $total ;

    $results['entries'] = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $results['entries'][] = $row;
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
