<?php
$page = $_GET['page'] ?? '';

// Map page keys to real URLs
$routes = [
    'about'   => 'https://mi-linux.wlv.ac.uk/~2309450/ci4-app/public/about',
    'contact' => 'https://mi-linux.wlv.ac.uk/~2309450/ci4-app/public/contact',
    'movies'  => 'https://mi-linux.wlv.ac.uk/~2309450/ci4-app/public/movies'
];

// Only allow about, contact, movies
if (array_key_exists($page, $routes)) {
    $url = $routes[$page];
    $html = @file_get_contents($url);

    if ($html !== false) {
        echo $html; // send the full content back
    } else {
        echo "<p>Failed to load content from $url.</p>";
    }
} else {
    echo "<p>Invalid page requested.</p>";
}
?>
