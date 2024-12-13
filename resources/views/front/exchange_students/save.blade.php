<div id="results-container" class="container-fluid py-5" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            @if (isset($filteredExchanges) && $filteredExchanges->count() > 0)
                <div class="col-12">
                    <center>
                        <h2 class="fw-bold text-primary text-uppercase">Filtered exchanges for {{ $year }}</h2>
                    </center>
                    <div class="box_filter mt-3 text-center">
                        @if ($filteredExchanges->isEmpty())
                            <p>No exchanges found for the selected year.</p>
                        @else
                            <div class="workshops-container justify-content-center">
                                @foreach ($filteredExchanges as $exchange)
                                    <div class="workshop-item border p-3 mb-3 mx-2 d-flex flex-column flex-md-row">
                                        <!-- Image Section -->
                                        <div class="col-lg-5 order-md-2">
                                            <div class="position-relative h-100">
                                                <img class="w-100 h-100 rounded wow zoomIn img-fluid" data-wow-delay="0.9s" src="{{ asset('img/IMG_0357.JPG') }}" style="object-fit: contain;">
                                            </div>
                                        </div>

                                        <!-- Content Section -->
                                        <div class="col-lg-7 order-md-1">
                                            <h3>{{ $exchange->type }}</h3>
                                            <br>
                                            <i class="far fa-calendar-alt text-primary me-2"></i>{{ date('M d, Y', strtotime($exchange->date_start)) }} - {{ date('M d, Y', strtotime($exchange->date_end)) }}
                                            <br>
                                            <i class='fas fa-briefcase' style='color:#800000'></i>&nbsp;&nbsp;{{ $exchange->universite }}<br><br>

                                            <!-- Truncated Description -->
                                            <p style="text-align: justify; margin-bottom: 20px;">
                                                {{ Str::limit($exchange->description, 150, '...') }}
                                            </p>

                                            <!-- Buttons -->
                                            <div class="d-flex justify-content-center gap-3 mt-3">
                                                <a href="{{ route('exchange.page', $exchange->id) }}" class="btn btn-danger text-white">View More</a>
                                                <a href="{{ route('exchange.download', $exchange->id) }}" class="btn btn-danger text-white">Download PDF</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    {{ $filteredExchanges->appends(['year' => $year])->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
</div>
