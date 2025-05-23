@extends('layouts.app')

@section('title', 'About Us - Carvan')

@section('content')
        <div class="main-content-area">
            {{-- 1. Banner Slider Section --}}
            <section class="hero-banner-section">
                <div class="swiper hero-banner-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                             <div class="banner-slide">
                                  <img src="{{ asset('images/about/picture/evgeny-tchebotarev-aiwuLjLPFnU-unsplash.jpg') }}" class="slide-background-image" alt="Company Values">
                                  <div class="slide-overlay"></div>
                                  <div class="slide-content">
                                       <h2>Leading Innovation in Mobility</h2>
                                       <p>Discover our commitment to quality and customer satisfaction.</p>
                                       <a href="#mission" class="cta-button">Learn More</a>
                                  </div>
                             </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="banner-slide">
                                  <img src="{{ asset('images/about/picture/Универсальный красный спортивный автомобиль других производителей, изолированные на темном фоне _ Премиум Фото.jpg') }}" class="slide-background-image" alt="Our Vision">
                                  <div class="slide-overlay"></div>
                                  <div class="slide-content">
                                       <h2>Driving Towards a Sustainable Future</h2>
                                       <p>Explore our goals for eco-friendly practices and community growth.</p>
                                       <a href="#responsibility" class="cta-button">Our Responsibility</a>
                                  </div>
                             </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </section>

            {{-- 2. About Section --}}
            <section id="about" class="about-section">
                <h1>ABOUT CARVAN</h1>
                <div class="about-grid-container">
                    <div class="about-card" id="mission">
                        <div class="about-card-icon">
                            <i class="fas fa-bullseye" style="color: red;"></i>
                        </div>
                        <h2>OUR MISSION</h2>
                        <p>Building trust and enriching the car buying/selling experience with transparency and reliability for every customer.</p>
                    </div>
                    <div class="about-card" id="goals">
                        <div class="about-card-icon">
                            <i class="fas fa-tasks" style="color: red;"></i>
                        </div>
                        <h2>OUR GOALS</h2>
                        <p>Expanding our network, enhancing service quality, maximizing customer value, building a strong brand, and ensuring sustainable growth.</p>
                    </div>
                    <div class="about-card" id="history">
                        <div class="about-card-icon">
                            <i class="fas fa-history" style="color: red;"></i>
                        </div>
                        <h2>OUR HISTORY</h2>
                        <p>Born from passion, CARVAN quickly established its mark with a focus on quality, evolving into a trusted name in the auto community.</p>
                    </div>
                    <div class="about-card" id="responsibility">
                        <div class="about-card-icon">
                            <i class="fas fa-hands-helping" style="color: red;"></i>
                        </div>
                        <h2>OUR RESPONSIBILITY</h2>
                        <p>Committed to our customers with transparent dealings, to our employees with a dynamic environment, and to society with ethical practices.</p>
                    </div>
                </div>
            </section>

            {{-- 3. Speech Section --}}
            <section class="speech-container">
                <div class="image-column">
                    <img src="{{ asset('images/about/picture/download (2).jpg') }}" alt="Mr. Peter Jack - General Director of Carvan VN">
                </div>
                <div class="text-column">
                    <p>
                        First and foremost, CARVAN would like to extend its sincerest thanks to our Customers and Partners who have always trusted and accompanied us, creating a solid foundation for the continuous development of our network, sales, and service quality. With the core commitment of bringing convenience and freedom of movement through comprehensive car ownership solutions, CARVAN constantly strives to ensure maximum peace of mind and satisfaction for every customer throughout their product and service experience journey.
                    </p>
                    <p>
                        Always aware of our responsibility, CARVAN strives towards a sustainable business model, actively promoting more environmentally friendly car options, aligning with current trends and future development directions. We believe that your invaluable support and companionship will continue to be a great driving force for CARVAN to conquer new goals, make positive contributions to the development of the Vietnamese auto market, and strive to become the brand beloved and trusted by customers.
                    </p>
                    <div class="signature">
                        <strong>Mr. Peter Jack</strong>
                        <span>General Director Carvan VN</span>
                    </div>
                </div>
            </section>
        </div>
@endsection
