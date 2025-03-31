<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies Archive</title>

    <!-- Add Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px; /* Adjust for fixed navbar */
        }
        .content-section {
            padding: 50px;
        }
    </style>
</head>
<body>

<!-- Navigation bar with Bootstrap classes -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">Movies Archive</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="https://mi-linux.wlv.ac.uk/~2309450/ci4-app/public/home" id="home-link">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://mi-linux.wlv.ac.uk/~2309450/ci4-app/public/about" id="about-link">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://mi-linux.wlv.ac.uk/~2309450/ci4-app/public/contact" id="contact-link">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://mi-linux.wlv.ac.uk/~2309450/ci4-app/public/movies" id="movies-link">Movies</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main content of the home page -->
<div class="container mt-5 pt-5" id="content">
    <!-- Default content will be loaded here -->
</div>

<!-- Add Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // JavaScript to handle navigation clicks
    document.getElementById('home-link').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default anchor click
        loadContent('home');
    });

    document.getElementById('about-link').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default anchor click
        loadContent('about');
    });

    document.getElementById('contact-link').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default anchor click
        loadContent('contact');
    });

    document.getElementById('movies-link').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default anchor click
        loadContent('movies');
    });

    // Function to load content dynamically via AJAX
    function loadContent(page) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "load_content.php?page=" + page, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                document.getElementById("content").innerHTML = xhr.responseText;
            } else {
                document.getElementById("content").innerHTML = "<p>Content not found.</p>";
            }
        };
        xhr.send();
    }
</script>

</body>
</html>
