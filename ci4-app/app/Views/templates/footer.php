<!-- Footer -->
<footer style="background-color: #1c1c1e; color: #ccc; text-align: center; padding: 20px 10px; font-size: 0.9rem;">
    <p>&copy; 2025 Movies Archive. All rights reserved.</p>
    <p>Created by <strong>Anil Kumar Sah</strong></p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!--  AJAX Navigation Script (Improved) -->
<script>
    function loadPage(page, event) {
        if (event) event.preventDefault();

        fetch("<?= base_url() ?>" + page, {
            headers: { "X-Requested-With": "XMLHttpRequest" }
        })
        .then(response => response.text())
        .then(html => {
            if (!html || html.trim() === "") {
                document.getElementById("content").innerHTML = "<p><strong>Page content is empty.</strong></p>";
            } else {
                document.getElementById("content").innerHTML = html;
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
                showGeolocation();
            }
        })
        .catch(error => {
            console.error("AJAX Load Error:", error);
            document.getElementById("content").innerHTML = "<p><strong>Error loading content.</strong></p>";
        });

        return false;
    }

    function getData(id) {
        fetch("<?= base_url('ajax/get/') ?>" + id)
            .then(response => response.json())
            .then(response => {
                const target = document.getElementById("ajaxArticle");
                if (target) {
                    target.innerHTML = response.title + ": " + response.description;
                }
            })
            .catch(err => {
                console.error("AJAX Fetch Error:", err);
            });
    }

    function showGeolocation() {
        if (!navigator.geolocation) return;

        navigator.geolocation.getCurrentPosition(
            function(position) {
                const lat = position.coords.latitude.toFixed(3);
                const lon = position.coords.longitude.toFixed(3);

                const geoMessage = `
                    <div style="background:#e3f2fd; color:#333; padding:10px 15px; border-radius:8px; margin-bottom:15px; font-size:0.9rem;">
                        📍 You're browsing from approx. Latitude: <strong>${lat}</strong>, Longitude: <strong>${lon}</strong>.
                        <br>Explore movies playing near you or check the weather!
                    </div>
                `;

                const container = document.getElementById("geo-info");
                if (container) {
                    container.innerHTML = geoMessage;
                }
            },
            function(error) {
                console.warn("Geolocation permission denied.");
            }
        );
    }

    document.addEventListener("DOMContentLoaded", showGeolocation);
</script>

</body>
</html>
