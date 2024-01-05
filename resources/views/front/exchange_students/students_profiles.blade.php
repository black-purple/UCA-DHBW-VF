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
                    <h1 class="display-4 text-white animated zoomIn">Interchanges</h1>
                    <a href="/exchange_students" class="h5 text-white">Exchange Students</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="/students_profiles" class="h5 text-white">Students Profiles</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Full Screen Search section -->
    @include('front.partials.screen_search')

    <!-- Students Profiles section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Meet Our Students</h5>
                <h1 class="mb-0">Exchange Students Profiles</h1>
            </div>
            <div class="row g-5">
                <p class="mb-4 p-size">View available exchange student profiles. Students who may study at the host institution and/or complete an internship or project for one semester or one academic year. Explore Exchange students below. You can narrow your search by which university they come from, by date, by type of exchange which defines the type of exchange whether internship or exchange program</p>
            </div>
        </div>

        <div class="container py-5">
            <div class="col-lg-7">
                <!-- Refine Search Section -->
                <h5 class="fw-bold text-primary text-uppercase">Refine your Search</h5>
                <div class="box">
                    <!-- Filter Form -->
                    <form id="filter-form" method="GET" class="d-flex">

                        <select name="university" class="form-select me-2">
                            <option disabled selected>University</option>
                            <!-- Loop through universities -->
                            @foreach($universities as $optionUniversity)
                            <option value="{{ $optionUniversity }}" {{ $university == $optionUniversity ? 'selected' : '' }}>
                                {{ $optionUniversity }}
                            </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft" id="apply-filters" >Apply Filters</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Results section -->
    <div id="results-container" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Display filtered students -->
                @if (isset($filteredStudents))
                <center>
                    <h2 class="fw-bold text-primary text-uppercase">Filtered Students for {{ $university }}</h2>
                </center>
                <div id="results" class="box_filter mt-3 text-center">
                    @if($filteredStudents->isEmpty())
                    <p>No Students found for the university.</p>
                    @else
                    <div class="row g-5">
                        <!-- Loop through filtered students -->
                        @foreach ($filteredStudents as $student)
                        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                            <div class="team-item bg-light rounded overflow-hidden">
                                <div class="team-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="{{asset('img/user.png')}}" alt="">
                                </div>
                                <div class="text-center py-4">
                                    <h4 class="text-primary">{{$student->firstname}} {{$student->lastname}}</h4>
                                    <p class="text-uppercase m-0"><i class='fas fa-passport' style='color:#800000'></i>&nbsp;{{$student->nationality}}</p>
                                    <p class="text-uppercase m-0"><i class='fas fa-envelope-open' style='color:#800000'></i>&nbsp;{{$student->email_student}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer section -->
    @include('front.partials.footer')

    <!-- Back to Top button -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Include scripts -->
    @include('front.partials.scripts')

    <!-- AJAX script for form submission -->
    <script>
        $(document).ready(function () {
            $('#filter-form').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'GET',
                    url: window.location.href,
                    data: formData,
                    success: function (data) {
                        console.log('Received Data:', data);
                        var filteredStudentsHtml = data.html;
                        var tempContainer = $('<div>').html(filteredStudentsHtml);
                        var resultContainer = tempContainer.find('#results-container');
                        $('#results-container').empty();
                        $('#results-container').append(resultContainer.html());
                        $('html, body').animate({
                            scrollTop: $('#results-container').offset().top
                        }, 1000);
                        $('#results-container .wow').attr('data-wow-delay', '0s');
                        new WOW().init();
                    },
                    error: function (error) {
                        console.log('Error:', error);
                        if (error.responseText) {
                            console.log('Error Response:', error.responseText);
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>
