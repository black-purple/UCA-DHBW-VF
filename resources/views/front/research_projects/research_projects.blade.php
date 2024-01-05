<!DOCTYPE html>
<html lang="en">

<!-- head Section -->
@include('front.partials.head')

<body>

    <!-- Loading Spinner -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>

    <!-- Navbar Section -->
    <div class="container-fluid position-relative p-0">
        @include('front.partials.navbar')

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Research Projects</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="/research_projects" class="h5 text-white">Research Projects</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Full Screen Search Section -->
    @include('front.partials.screen_search')

    <!-- Research Projects Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h1 class="mb-0">Research Projects</h1>
                    </div>
                    <p class="mb-4">The Research Project scheduled in semester 9 of the 5th year involves a period of practical experience in an academic environment.</p>
                </div>
                <div class="col-lg-5">
                    <div class="position-relative h-100">
                        <img class="w-100 h-100 rounded wow zoomIn img-fluid" data-wow-delay="0.9s" src="{{ asset('img/IMG_0232.JPG') }}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Available Research Projects Section -->
    <div id="results-container" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h1 class="mb-0">Available Research Projects</h1>
        </div>

        @foreach($projects as $project)
        <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-7">
                        <h4 class="mb-3">{{ $project->title }}</h4>
                        <p>{{ Str::limit($project->description, 300, '...') }}</p>
                        <a class="text-uppercase" href="{{ route('front.research_projects.showProjects', ['projects' => $project->slug]) }}">Read More <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="col-lg-5">
                        <div class="position-relative h-100">
                            <img class="w-100 h-100 rounded wow zoomIn img-fluid" data-wow-delay="0.9s" src="{{ asset('img/IMG_0310.JPG') }}" style="object-fit: contain;">
                        </div>
                    </div>
                </div><br><br>
            </div>
        </div>
        @endforeach

        <div class="pagination">
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>

    </div>

    <!-- Footer Section -->
    @include('front.partials.footer')

    <!-- Back to Top Button -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Include Scripts -->
    @include('front.partials.scripts')

    <!-- AJAX script for pagination -->
    <script>
        $(document).ready(function() {
            // Listen for click events on pagination links
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();

                // Get the href attribute of the clicked link
                var pageUrl = $(this).attr('href');

                // Make an AJAX request to get the next page content
                $.ajax({
                    url: pageUrl,
                    type: 'get',
                    dataType: 'html',
                    success: function(response) {
                        // Create a temporary container to hold the new content
                        var tempContainer = $('<div>').html(response);

                        // Extract the content of the news container from the response
                        var newContent = tempContainer.find('#results-container').html();

                        // Add a smooth fade-out animation to the news container
                        $('#results-container').fadeOut(300, function() {
                            // Replace the entire content of the news container with the new page content
                            $(this).html(newContent);

                            // Add a smooth fade-in animation to the news container
                            $(this).fadeIn(300);
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
