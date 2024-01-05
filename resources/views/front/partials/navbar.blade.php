<nav class="navbar navbar-expand-md navbar-dark px-5 py-2 py-lg-0">
    <a href="/" class="navbar-brand p-0">
        <div class="logo">
            <img src="{{asset('img/uca_logo.png')}}" alt="UCA Logo" class="img-fluid"><img src="{{asset('img/dhbw_logo.png')}}" alt="DHBW Logo" class="img-fluid">
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="/" class="nav-item nav-link">Home</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Interchanges</a>
                <div class="dropdown-menu m-0">
                    <a href="/exchange_students" class="dropdown-item">Exchange Students</a>
                    <a href="/faculty_staff_exchange" class="dropdown-item">Faculty and Staff Exchange</a>
                    <a href="/internships" class="dropdown-item">Internships</a>
                </div>
            </div>
            <a href="/workshop" class="nav-item nav-link">Workshops</a>
            <a href="/research_projects" class="nav-item nav-link">Research Projects</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Programs</a>
                <div class="dropdown-menu m-0">
                    <a href="/program" class="dropdown-item">Programs</a>
                    <a href="/academic_programs" class="dropdown-item">Academic Programs</a>
                    <a href="/cultural_programs" class="dropdown-item">Cultural Programs</a>
                </div>
            </div>
                        <a href="/achievements" class="nav-item nav-link">Achievements</a>


            <a href="/partners" class="nav-item nav-link">Partners</a>
            <a href="/login" class="nav-item nav-link">Login</a>
        </div>
        <div class="d-flex ms-3 search-container">
            <button id="search-button" class="btn btn-outline-primary" type="button"><i class="fa fa-search"></i></button>
            <input id="search-input" class="form-control" type="search" aria-label="Search">
        </div>
    </div>
</nav>

<script>
    // Function to toggle search input visibility
    function toggleSearchInput() {
        var searchInput = document.getElementById('search-input');
        searchInput.style.display = (searchInput.style.display === 'none' || searchInput.style.display === '') ? 'block' : 'none';

        // Store the visibility state in localStorage
        localStorage.setItem('searchInputVisibility', searchInput.style.display);
    }

    // Add this JavaScript to your script or in a <script> tag at the end of the body

    // Retrieve the search input visibility state from localStorage
    var savedVisibility = localStorage.getItem('searchInputVisibility');

    // Set the initial visibility state based on the retrieved value
    var searchInput = document.getElementById('search-input');
    searchInput.style.display = savedVisibility || 'none';

    // Attach the click event listener to the search button
    document.getElementById('search-button').addEventListener('click', toggleSearchInput);
</script>

<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Search Results</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="search-results-container">
                <!-- Search results will be dynamically inserted here using JavaScript -->
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#search-button').on('click', function() {
            var query = $('#search-input').val().trim(); // Trim whitespace from the query

            // Check if the query is not empty before making the AJAX request
            if (query !== '') {
                $.ajax({
                    url: '/search',
                    type: 'GET',
                    data: { query: query },
                    dataType: 'json',
                    success: function(data) {
                        displaySearchResults(data.searchResults);
                        $('#searchModal').modal('show');
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            }
        });

        function displaySearchResults(results) {
            var container = $('#search-results-container');
            container.empty();

            if (results.length > 0) {
                results.forEach(function(result) {
                    // Adjust the logic based on the structure of your results
                    container.append('<h6>' + result.title + ' </h6><p> ' + result.description + '</p>');
                });
            } else {
                container.append('<p>No results found.</p>');
            }
        }
    });
</script>

