<!DOCTYPE html>
<html lang="en">

@include('front.partials.head')

<body>

    @include('front.partials.navbar')

    <div class="container py-5">
        <h1 class="mb-4 text-center">All Exchanges and Students</h1>

        @foreach ($exchanges as $exchange)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-white">{{ $exchange->type }}</h3>
                    <p><i class="far fa-calendar-alt"></i> {{ date('M d, Y', strtotime($exchange->date_start)) }} -
                        {{ date('M d, Y', strtotime($exchange->date_end)) }}
                    </p>
                </div>

                <div class="card-body">
                    <p><strong>University:</strong> {{ $exchange->universite }}</p>
                    <p>{{ $exchange->description }}</p>

                    <h4>Students Participating</h4>
                    @if ($exchange->students->isEmpty())
                        <p>No students found for this exchange.</p>
                    @else
                        <div class="list-group">
                            @foreach ($exchange->students as $student)
                                <div class="list-group-item d-flex align-items-center mb-3">
                                    <img src="{{ asset(empty($student->photo) ? 'img/user.jpg' : 'storage/students/' . $student->photo) }}"
                                        class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">{{ $student->firstname }} {{ $student->lastname }}</h6>
                                        <small class="text-muted"><strong>Nationality:</strong>
                                            {{ $student->nationnality }}</small><br>
                                        <small class="text-muted"><strong>University:</strong>
                                            {{ $student->university }}</small><br>
                                        <small class="text-muted"><strong>Email:</strong> {{ $student->email }}</small>
                                    </div>
                                    <a href="{{ route('student.profileFront', ['id' => $student->id]) }}"
                                        class="btn btn-sm btn-primary">View Profile</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    @include('front.partials.footer')

    @include('front.partials.scripts')

</body>

</html>