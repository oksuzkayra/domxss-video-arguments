<?php
$movies = [
    ["id" => 1, "title" => "Inception", "year" => 2010, "director" => "Christopher Nolan"],
    ["id" => 2, "title" => "The Matrix", "year" => 1999, "director" => "The Wachowskis"],
    ["id" => 3, "title" => "The Dark Knight", "year" => 2008, "director" => "Christopher Nolan"],
    ["id" => 4, "title" => "Interstellar", "year" => 2014, "director" => "Christopher Nolan"],
    ["id" => 5, "title" => "Avatar", "year" => 2009, "director" => "James Cameron"],
];

$movie_param = isset($_GET['movie']) ? $_GET['movie'] : '';

$filtered_movies = array_filter($movies, function($movie) use ($movie_param) {
    return stripos($movie['title'], $movie_param) !== false;
});

$response = [
    "query" => $movie_param,
    "movies" => array_values($filtered_movies),
];

header('Content-Type: application/json');
echo json_encode($response);
?>
