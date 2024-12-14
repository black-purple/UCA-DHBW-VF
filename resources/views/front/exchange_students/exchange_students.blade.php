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

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">EXCHANGES</h1>
                    <a href="/" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="/EXCHANGES" class="h5 text-white">EXCHANGES</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Full Screen Search Section -->
    @include('front.partials.screen_search')

    <!-- EXCHANGES Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="EXCHANGES">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h1 class="mb-0">EXCHANGES</h1>
                    </div>
                    <p class="mb-4">Interns will achieve success in professional positions in different sectors. The
                        relationship between both universities and the student is mutually beneficial; with guidance
                        from professionals, Interns gain practical experience by working on projects and programs while
                        Both institutions benefit from their contribution.</p>
                </div>
                <div class="col-lg-5">
                    <div class="position-relative h-100">
                        <img class="w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s"
                            src="{{ asset('img/IMG_0818.JPG') }}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
        <!-- Refine Search Section -->
        <div class="container py-5" id="refine_search">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <h5 class="fw-bold text-primary text-uppercase mb-4 text-center">Refine your Search</h5>
                    <div class="box">
                        <!-- Filter Form -->
                        <form id="filter-form" method="GET" action="{{ route('exchange_students') }}" class="row g-3">
                            <div class="col-md-6">
                                <select name="year" class="form-select">
                                    <option disabled selected>Year</option>
                                    @foreach ($years as $yearOption)
                                        <option value="{{ $yearOption }}" {{ request()->input('year') == $yearOption ? 'selected' : '' }}>
                                            {{ $yearOption }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="universite" class="form-select">
                                    <option disabled selected>University</option>
                                    <option value="UCA" {{ request()->input('universite') == 'UCA' ? 'selected' : '' }}>UCA</option>
                                    <option value="DHBW" {{ request()->input('universite') == 'DHBW' ? 'selected' : '' }}>DHBW</option>
                                </select>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary px-4 py-2">Apply Filters</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Results Section -->
        <div id="results-container" class="container-fluid py-5" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    @if (isset($filteredExchanges) && $filteredExchanges->count() > 0)
                    <div class="col-12">
                        <center>
                            <h2 class="fw-bold text-primary text-uppercase">Filtered exchanges for {{ $year }}
                            </h2>
                        </center>
                        <div class="box_filter mt-3 text-center">
                            @if ($filteredExchanges->isEmpty())
                                <p>No exchanges found for the selected year.</p>
                            @else
                                <div class="workshops-container justify-content-center">
                                    @foreach ($filteredExchanges as $exchange)
                                        <div class="workshop-item border p-3 mb-3 mx-2 d-flex flex-column flex-md-row">
                                            <div class="col-lg-5 order-md-2">
                                                <div class="position-relative h-100">
                                                    <img class="w-100 h-100 rounded wow zoomIn img-fluid"
                                                        data-wow-delay="0.9s" src="{{ asset('img/IMG_0357.JPG') }}"
                                                        style="object-fit: contain;">
                                                </div>
                                            </div>
                                            <div class="col-lg-7 order-md-1">
                                                <h3>{{ $exchange->type }}</h3>
                                                <br>
                                                <i
                                                    class="far fa-calendar-alt text-primary me-2"></i>{{ date('M d, Y', strtotime($exchange->date_start)) }}
                                                - {{ date('M d, Y', strtotime($exchange->date_end)) }}
                                                <br>
                                                <i class='fas fa-university' style='color:#800000'></i>&nbsp;&nbsp;{{ $exchange->universite }}<br><br>
                                             <p>
                                                {{($exchange->description) }}
                                            </p>

                                            <!-- Buttons -->
                                            <div class="d-flex justify-content-center gap-3 mt-3">
                                                <a href=""  class="btn btn-primary px-4 py-2" >View More</a>
                                                <a href="{{ route('downloadPDF', $exchange->id) }}" class="btn btn-primary px-4 py-2">Download PDF</a>
                                            </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="pagination">
                        {{ $filteredExchanges->appends(['year' => $year])->links('pagination::bootstrap-5') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    @include('front.partials.footer')

    <!-- Back to Top Button-->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i
            class="bi bi-arrow-up"></i></a>

    <!-- Include scripts -->
    @include('front.partials.scripts')

    <!-- AJAX script for form submission and pagination -->
    @include('front.partials.form_script')

    <!-- Quick Navigation Script-->
    @include('front.partials.navigation_script')
</body>

</html>
