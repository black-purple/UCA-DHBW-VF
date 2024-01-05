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
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{asset('img/IMG_0716.JPG')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">The International Collaboration of</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">UCA & DHBW</h1>
                            <a href="/about" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">About Us</a>
                            <a href="/news" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">News</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{asset('img/IMG_0800.JPG')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">The International Collaboration of</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">UCA & DHBW</h1>
                            <a href="/about" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">About Us</a>
                            <a href="/news" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">News</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    
    <!-- Full Screen Search section -->
    @include('front.partials.screen_search')
   
    <!-- Facts Section -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class='fas fa-graduation-cap' style='color:#800000'></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Students</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">100</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class='fas fa-briefcase' style='color: #fff'></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-primary mb-0">Workshops</h5>
                            <h1 class="mb-0" data-toggle="counter-up">100</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class='fas fa-list' style='color:#800000'></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Programs</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">100</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- About Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h1 class="mb-0">THE INTERNATIONAL COOPERATION OF UCA&DHBW</h1>
                    </div>
                    <p class="mb-4">Apart from international cooperation co-ordinated by specific and externally funded programs, UCA university maintains a number of relationships with national and international universities and institutions. By doing so, and through the signature of cooperation agreements, the UCA aims to develop joint research projects, educational activities, and the exchange between professors and students. Ultimately, Baden-Württemberg Cooperative State University (DHBW) and Cadi Ayyad University (UCA), have entered into a general agreement to foster international cooperation in education and research and also facilitate educational exchanges between the two universities. This was driven by the need to offer international experiences to students, faculty, and staff, and to strengthen the existing cultural and educational links between the two institutions. The two universities agreed on a productive and positive long term cooperative relationship where they both consent to:
                    </p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Work in Cooperation</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Explore Options</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Foster Research</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Serve Needs</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{ asset('img/map.png') }}" style="object-fit: contain;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Success story Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Success Story</h5>
                <h1 class="mb-0">Advancing Sustainable Solutions</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class='fas fa-globe-africa' style='color: white'></i>
                        </div>
                        <h4 class="mb-3">International Acclaim</h4>
                        <p class="m-0">Global recognition underscores the impact of collaborative computer science efforts in solving complex challenges and driving innovation across borders.</p>
                        <a class="btn btn-lg btn-primary rounded"><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class='fas fa-hands-helping' style='color: white'></i>
                        </div>
                        <h4 class="mb-3">Community Impact</h4>
                        <p class="m-0">Application of computer science solutions positively impacts communities, addressing challenges and introducing innovative approaches to enhance quality of life.</p>
                        <a class="btn btn-lg btn-primary rounded" ><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class='fas fa-people-carry' style='color: white'></i>
                        </div>
                        <h4 class="mb-3">Student Involvement</h4>
                        <p class="m-0">Active involvement of students from both institutions in diverse computer science projects nurtures the next generation of innovators through valuable hands-on experiences.</p>
                        <a class="btn btn-lg btn-primary rounded" ><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Testimonial Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Testimonial</h5>
                <h1 class="mb-0">Student Experiences and University Perspectives</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="{{asset('img/user.png')}}" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Prof.Aimad Qazdar</h4>
                            <small class="text-uppercase">Former UCA Professor</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">UCA-DHBW exchange: Expanded academics, global perspective through research, mentorship shaped career goals. Grateful for lasting friendships and international network gained.
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="{{asset('img/user.png')}}" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Prof.El Hassan Abdelwahed</h4>
                            <small class="text-uppercase">UCA Professor</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">DHBW faculty collaborating with UCA, fostering innovation, enhancing networks, and teaching methods. A rewarding journey of mutual learning and cultural exchange
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="{{asset('img/user.png')}}" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Dr. X</h4>
                            <small class="text-uppercase">UCA Graduate</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">UCA-DHBW collaboration transformed my academic journey, shaping my global career. Proud alum of institutions prioritizing enriching collaborations
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="{{asset('img/user.png')}}" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">X</h4>
                            <small class="text-uppercase">UCA Graduate</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">UCA-DHBW collaboration shaped my computer science journey, exposing me to cutting-edge research and fostering diverse collaboration. Grateful for lasting connections and mentorship.
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Latest News Section -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Latest News</h5>
                <h1 class="mb-0">Explore Insights and Collaborative Endeavors</h1>
            </div>
            <div class="row g-5">
                @foreach($news as $item)
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
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
                            <a class="text-uppercase" href="{{ route('front.news.showNews', ['news' => $item->slug]) }}">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- Footer Section -->
    @include('front.partials.footer')
    
    <!-- Back to Top button -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Include Scripts -->
    @include('front.partials.scripts')
    
</body>

</html>