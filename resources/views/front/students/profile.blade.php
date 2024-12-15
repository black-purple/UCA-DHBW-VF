<!DOCTYPE html>
<html lang="en">

@include('front.partials.head')

<body>

    <!-- Navbar -->
    @include('front.partials.navbar')

    <!-- Add margin to push the profile view down -->
    <div class="container py-5 mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset(empty($student->photo) ? 'img/user.jpg' : 'storage/students/' . $student->photo) }}"
                        class="card-img-top">
                    <div class="card-body text-center">
                        <h4>{{ $student->firstname }} {{ $student->lastname }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card p-4">
                    <h2>About {{ $student->firstname }}</h2>
                    <ul>
                        <li><strong>Firstname:</strong> {{ $student->firstname }}</li>
                        <li><strong>Lastname:</strong> {{ $student->lastname }}</li>
                        <li><strong>Nationality:</strong> {{ $student->nationnality }}</li>
                        <li><strong>University:</strong> {{ $student->university }}</li>
                    </ul>

                    <h3>Contact Details</h3>
                    <ul>
                        <li><strong>Email:</strong> {{ $student->email }}</li>
                        <li><strong>Phone Number:</strong> {{ $student->phone_number }}</li>
                    </ul>

                    <!-- Internship Details -->
                    <h3>Internships</h3>
                    @if($student->internships->isEmpty())
                        <p>No internships available.</p>
                    @else
                        <div class="internship-list">
                            @foreach ($student->internships as $internship)
                                <div class="internship-item mb-3">
                                    <h5>{{ $internship->title }}</h5>
                                    <ul class="list-unstyled">
                                        <li><strong>Company:</strong> {{ $internship->company }}</li>
                                        <li><strong>Start Date:</strong>
                                            {{ \Carbon\Carbon::parse($internship->date_start)->format('d-m-Y') }}</li>
                                        <li><strong>End Date:</strong>
                                            {{ \Carbon\Carbon::parse($internship->date_end)->format('d-m-Y') }}</li>
                                        <li><strong>Description:</strong>
                                            <span class="description-text">{{ $internship->description }}</span>
                                            <button class="show-more btn btn-link">Show Less</button>
                                        </li>
                                        <li><strong>Slug:</strong> {{ $internship->slug }}</li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Back</a>
                </div>
            </div>
        </div>
    </div>

    @include('front.partials.footer')
    @include('front.partials.scripts')

</body>

</html>
<style>
    .internship-list {
        font-size: 14px;
        display: flex;
        flex-wrap: wrap;
        /* Allows the cards to wrap to the next line if there's not enough space */
        gap: 20px;
        /* Space between each internship card */
    }

    .internship-item {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
        max-width: 300px;
        /* Control the width of each card */
        flex: 1 1 calc(33.33% - 20px);
        /* Makes the cards take up 1/3 of the container width with space between them */
        box-sizing: border-box;
        /* Ensures padding doesn't affect the width */
    }

    .internship-item h5 {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .internship-item ul {
        padding-left: 20px;
    }

    .description-text {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .full-description {
        display: none;
    }

    .show-more {
        font-size: 14px;
        color: #007bff;
        text-decoration: none;
    }

    .show-more:focus {
        outline: none;
    }
</style>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const showMoreButtons = document.querySelectorAll('.show-more');

        showMoreButtons.forEach(button => {
            button.addEventListener('click', function () {
                const descriptionText = this.previousElementSibling;
                const fullDescription = document.createElement('span');
                fullDescription.classList.add('full-description');
                fullDescription.innerText = descriptionText.innerText;

                descriptionText.style.display = 'none'; // Hide truncated text
                this.style.display = 'none'; // Hide 'Show More' button
                descriptionText.parentNode.appendChild(fullDescription); // Append full text

                // Optionally, change the button to hide the full text
                const hideButton = document.createElement('button');
                hideButton.classList.add('btn', 'btn-link');
                hideButton.innerText = 'Show More';
                hideButton.addEventListener('click', function () {
                    fullDescription.style.display = 'none'; // Hide full text
                    descriptionText.style.display = '-webkit-box'; // Show truncated text
                    this.style.display = 'none'; // Hide 'Show Less' button
                    button.style.display = 'inline'; // Show 'Show More' button again
                });
                descriptionText.parentNode.appendChild(hideButton);
            });
        });
    });
</script>