<?php
// joel is working on this file. it will take all the data from the /db/seed/src folder and put it into the database
$db = new SQLite3('../database.db');

$textOnlyFile = "../text-only.csv";
$textWithAudioFile = "../text-with-audio.csv";
$textWithImageFile = "../text-with-image.csv";
// sqlite 3 command to create table entries. public,user_public,type,subject,excerpt_or_original_text,excerpt,response_created_at,featured,featured_at,response_language,text

$sqlCreate = "CREATE TABLE entries (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    public TEXT,
    user_public TEXT,
    type TEXT,
    subject TEXT,
    excerpt_or_original_text TEXT,
    excerpt TEXT,
    response_created_at TEXT,
    featured TEXT,
    featured_at TEXT,
    response_language TEXT,
    audio TEXT,
    image TEXT
)";

// create the table
$db->exec($sqlCreate);


// parse the csv file
$file = fopen($textOnlyFile, "r");
// Check if the file is successfully opened
if ($file) {
    // Read the CSV file line by line
    while (($data = fgetcsv($file)) !== false) {
        // Skip the header row
        if ($data[0] === 'public') {
            continue;
        }

        // Prepare the SQL statement for inserting data into the 'entries' table with prepared statements
        $stmt = $db->prepare("INSERT INTO entries (
            public,
            user_public,
            type,
            subject,
            excerpt_or_original_text,
            excerpt,
            response_created_at,
            featured,
            featured_at,
            response_language
        ) VALUES (
            :public,
            :user_public,
            :type,
            :subject,
            :excerpt_or_original_text,
            :excerpt,
            :response_created_at,
            :featured,
            :featured_at,
            :response_language
        )");

        // Bind parameters
        $stmt->bindValue(':public', $data[0], SQLITE3_TEXT);
        $stmt->bindValue(':user_public', $data[1], SQLITE3_TEXT);
        $stmt->bindValue(':type', $data[2], SQLITE3_TEXT);
        $stmt->bindValue(':subject', $data[3], SQLITE3_TEXT);
        $stmt->bindValue(':excerpt_or_original_text', $data[4], SQLITE3_TEXT);
        $stmt->bindValue(':excerpt', $data[5], SQLITE3_TEXT);
        $stmt->bindValue(':response_created_at', $data[6], SQLITE3_TEXT);
        $stmt->bindValue(':featured', $data[7], SQLITE3_TEXT);
        $stmt->bindValue(':featured_at', $data[8], SQLITE3_TEXT);
        $stmt->bindValue(':response_language', $data[9], SQLITE3_TEXT);


        // Execute the prepared statement
        $stmt->execute();

    }

    // Close the CSV file
    fclose($file);
} else {
    echo "Error opening the text only.";
}


$file = fopen($textWithAudioFile, "r");
// Check if the file is successfully opened
if ($file) {
    // headers are public,user_public,type,subject,excerpt_or_original_text,response_created_at,featured,featured_at,response_language,audio
    // Read the CSV file line by line
    while (($data = fgetcsv($file)) !== false) {
        // Skip the header row
        if ($data[0] === 'public') {
            continue;
        }

        // Prepare the SQL statement for inserting data into the 'entries' table with prepared statements
        $stmt = $db->prepare("INSERT INTO entries (
            public,
            user_public,
            type,
            subject,
            excerpt_or_original_text,
            response_created_at,
            featured,
            featured_at,
            response_language,
            audio
        ) VALUES (
            :public,
            :user_public,
            :type,
            :subject,
            :excerpt_or_original_text,
            :response_created_at,
            :featured,
            :featured_at,
            :response_language,
            :audio
        )");

        // Bind parameters
        $stmt->bindValue(':public', $data[0], SQLITE3_TEXT);
        $stmt->bindValue(':user_public', $data[1], SQLITE3_TEXT);
        $stmt->bindValue(':type', $data[2], SQLITE3_TEXT);
        $stmt->bindValue(':subject', $data[3], SQLITE3_TEXT);
        $stmt->bindValue(':excerpt_or_original_text', $data[4], SQLITE3_TEXT);
        $stmt->bindValue(':response_created_at', $data[5], SQLITE3_TEXT);
        $stmt->bindValue(':featured', $data[6], SQLITE3_TEXT);
        $stmt->bindValue(':featured_at', $data[7], SQLITE3_TEXT);
        $stmt->bindValue(':response_language', $data[8], SQLITE3_TEXT);
        $stmt->bindValue(':audio', $data[9], SQLITE3_TEXT);


        // Execute the prepared statement
        $stmt->execute();

    }

    // Close the CSV file
    fclose($file);
} else {
    echo "Error opening the text with audio.";
}

$file = fopen($textWithImageFile, "r");
// headers are public,user_public,type,subject,excerpt_or_original_text,response_created_at,featured,featured_at,response_language,image
// Check if the file is successfully opened

if ($file) {
    // Read the CSV file line by line
    while (($data = fgetcsv($file)) !== false) {
        // Skip the header row
        if ($data[0] === 'public') {
            continue;
        }

        // Prepare the SQL statement for inserting data into the 'entries' table with prepared statements
        $stmt = $db->prepare("INSERT INTO entries (
            public,
            user_public,
            type,
            subject,
            excerpt_or_original_text,
            response_created_at,
            featured,
            featured_at,
            response_language,
            image
        ) VALUES (
            :public,
            :user_public,
            :type,
            :subject,
            :excerpt_or_original_text,
            :response_created_at,
            :featured,
            :featured_at,
            :response_language,
            :image
        )");

        // Bind parameters
        $stmt->bindValue(':public', $data[0], SQLITE3_TEXT);
        $stmt->bindValue(':user_public', $data[1], SQLITE3_TEXT);
        $stmt->bindValue(':type', $data[2], SQLITE3_TEXT);
        $stmt->bindValue(':subject', $data[3], SQLITE3_TEXT);
        $stmt->bindValue(':excerpt_or_original_text', $data[4], SQLITE3_TEXT);
        $stmt->bindValue(':response_created_at', $data[5], SQLITE3_TEXT);
        $stmt->bindValue(':featured', $data[6], SQLITE3_TEXT);
        $stmt->bindValue(':featured_at', $data[7], SQLITE3_TEXT);
        $stmt->bindValue(':response_language', $data[8], SQLITE3_TEXT);
        $stmt->bindValue(':image', $data[9], SQLITE3_TEXT);

        $stmt->execute();

    }

    // Close the CSV file
    fclose($file);
} else {
    echo "Error opening the text with image.";
}


$db->close();
    
