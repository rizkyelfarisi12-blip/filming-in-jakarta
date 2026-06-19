<?php

function createSlug($text){

    $text = strtolower($text);

    $text = preg_replace(
        '/[^a-z0-9]+/',
        '-',
        $text
    );

    $text = trim($text,'-');

    return $text;
}

function generateUniqueSlug($conn, $slug){

    $originalSlug = $slug;
    $counter = 2;

    while(true){

        $check = mysqli_query(
            $conn,
            "SELECT id
             FROM locations
             WHERE slug='$slug'
             LIMIT 1"
        );

        if(mysqli_num_rows($check) == 0){
            return $slug;
        }

        $slug = $originalSlug . "-" . $counter;
        $counter++;
    }
}