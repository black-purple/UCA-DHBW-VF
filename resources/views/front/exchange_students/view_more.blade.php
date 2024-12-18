<!DOCTYPE html>
<html lang="en">

<!-- head Section -->
@include('front.partials.head')

<body>

    <!-- Loading Spinner -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>

    <!-- Navbar Section -->
    <div class="container-fluid position-relative p-0">
        @include('front.partials.navbar')

        <!-- Quick Navigation Section -->
        <div id="sectionNotification" class="notification4 show">
            <div>Quick Navigation</div>
            <div id="toggleNotificationArrow" onclick="toggleNotification()">
                <i class="fa-solid fa-circle-arrow-left" style="color: #800000; font-size: 28px;"></i>
            </div>
            <ul>
                <li>
                    <div onclick="scrollToSection('EXCHANGES')">EXCHANGES</div>
                </li>
                <li>
                    <div onclick="scrollToSection('refine_search')">FILTER EXCHANGES</div>
                </li>
            </ul>
        </div>

        <!-- Header Section -->
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">EXCHANGE DETAILS</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="/EXCHANGES" class="h5 text-white">EXCHANGES</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="#" class="h5 text-white">View More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Full Screen Search Section -->
    @include('front.partials.screen_search')

    <!-- Exchange Details Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="EXCHANGES">
        <div class="container py-5">

            <!-- View All Exchanges and Students Button -->
            <div class="text-end mb-4">
                <a href="{{ route('allExchanges') }}" class="btn btn-primary">View All Exchanges & Students</a>
            </div>

            <div class="row g-5">
                <!-- Exchange Details -->
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h1 class="mb-0">Exchange Details</h1>
                    </div>

                    <h3>{{ $exchange->type }}</h3>
                    <p class="mb-4">
                        <i class="far fa-calendar-alt text-primary me-2"></i>
                        {{ date('M d, Y', strtotime($exchange->date_start)) }} -
                        {{ date('M d, Y', strtotime($exchange->date_end)) }}
                    </p>
                    <p><i class="fas fa-university" style="color:#800000"></i>&nbsp;&nbsp;{{ $exchange->universite }}
                    </p>
                    <p>{{ $exchange->description }}</p>
                </div>

                <!-- Students Participating in the Exchange -->
                <div class="col-lg-5">
                    <div class="section-title position-relative pb-3 mb-4">
                        <h4>Students Participating in this Exchange</h4>
                    </div>

                    <div class="box_filter mt-3">
                        @if ($students->isEmpty())
                            <p>No student found for this exchange.</p>
                        @else
                            <ul class="list-group">
                                @foreach ($students as $student)
                                    <li class="list-group-item d-flex align-items-center">
                                        <img src="{{ asset(empty($student->photo) ? 'img/user.jpg' : 'storage/students/' . $student->photo) }}"
                                            class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">{{ $student->firstname }} {{ $student->lastname }}</h6>
                                            <small class="text-muted"><strong>Nationality:</strong>
                                                {{ $student->nationnality }}</small><br>
                                            <small class="text-muted"><strong>University:</strong>
                                                {{ $student->university }}</small><br>
                                        </div>
                                        <a href="{{ route('student.profileFront', ['id' => $student->id]) }}"
                                            class="btn btn-sm btn-primary">View Profile</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    @include('front.partials.footer')

    <!-- Back to Top Button -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Include scripts -->
    @include('front.partials.scripts')

    <!-- AJAX script for form submission and pagination -->
    @include('front.partials.form_script')

    <!-- Quick Navigation Script -->
    @include('front.partials.navigation_script')
</body>

</html>
