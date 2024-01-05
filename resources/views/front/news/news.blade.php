<!DOCTYPE html>
<html lang="en">

<!-- Include head partial -->
@include('front.partials.head')

<body>
    <!-- Loading spinner -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>

    <!-- Navbar section -->
    <div class="container-fluid position-relative p-0">
        @include('front.partials.navbar')

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">News</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="/news" class="h5 text-white">News</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Full Screen Search section -->
    @include('front.partials.screen_search')

    <!-- News Section -->
    <div id="results-container" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <!-- News section title -->
                <h1 class="mb-0">News</h1>
            </div>
            <div class="row g-5">
                @foreach($news as $item)
                <div class="col-lg-4 wow slideInUp">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="{{asset('img/latestNews.jpg')}}" alt="">
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ $item->updated_at->format('d M, Y') }}</small>
                            </div>
                            <h4 class="mb-3">{{ $item->title }}</h4>
                            <p>{{ Str::limit($item->description, 100, '...') }}</p>
                            <!-- Read more link -->
                            <a class="text-uppercase" href="{{ route('front.news.showNews', ['news' => $item->slug]) }}">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Pagination -->
                <div class="pagination">
                    {{ $news->links('pagination::bootstrap-5') }}
                </div>
            </div>
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
