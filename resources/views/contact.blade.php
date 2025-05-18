@extends('layouts.app')

@section('title', 'Contact - Carvan') {{-- ĐÃ SỬA TIÊU ĐỀ --}}

@section('content')
    {{-- <main class="content"> --}} {{-- Giả sử class="content" đến từ layout app.blade.php --}}

        <div class="main-content-area">

            {{-- 1. Banner Slider Section (Contact Page) --}}
            <section class="hero-banner-section">
                <div class="swiper hero-banner-slider">
                    <div class="swiper-wrapper">
                        {{-- Slide 1 - Contact Banner --}}
                        <div class="swiper-slide">
                             <div class="banner-slide">
                                  {{-- Đảm bảo ảnh 'images/contact-banner-showroom.jpg' tồn tại trong thư mục public/images --}}
                                  <img src="{{ asset('images/contact-banner-showroom.jpg') }}" class="slide-background-image" alt="CARVAN Showroom Contact">
                                  <div class="slide-overlay"></div>
                                  <div class="slide-content">
                                       <h2>Get In Touch With CARVAN</h2>
                                       <p>We are here to assist you with all your automotive needs.</p>
                                       <a href="#contact-form-section" class="cta-button">Send Us a Message</a>
                                  </div>
                             </div>
                        </div>
                        {{-- Slide 2 - Contact Banner (Tùy chọn) --}}
                        <div class="swiper-slide">
                            <div class="banner-slide">
                                  {{-- Đảm bảo ảnh 'images/customer-service-banner.jpg' tồn tại trong thư mục public/images --}}
                                  <img src="{{ asset('images/customer-service-banner.jpg') }}" class="slide-background-image" alt="CARVAN Customer Support">
                                  <div class="slide-overlay"></div>
                                  <div class="slide-content">
                                       <h2>24/7 Customer Support</h2>
                                       <p>Our dedicated team is ready to help you anytime.</p>
                                       <a href="tel:1800888861" class="cta-button">Call Us: 1800 888 861</a>
                                  </div>
                             </div>
                        </div>
                    </div>
                    {{-- Pagination (dấu chấm) --}}
                    <div class="swiper-pagination"></div>
                    {{-- Navigation (mũi tên) --}}
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </section>

            {{-- 2. Contact Container (Bao gồm Overview và Form) --}}
            <section class="contact-container">

                {{-- 2.1. Overview Section (Map & Details) --}}
                <div class="contact-overview">
                    <h2 class="section-title">OVERVIEW</h2>
                    <div class="contact-overview-content">
                        <div class="contact-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.342359087539!2d106.70103767451737!3d10.785069159035338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f08ec5b72dd%3A0xade3331f598c844e!2sAudi%20Ho%20Chi%20Minh%20City!5e0!3m2!1svi!2s!4v1746583813549!5m2!1svi!2s" {{-- SRC IFRAME MỚI CỦA BẠN --}}
                                width="100%"
                                height="450" {{-- CHIỀU CAO MỚI TỪ IFRAME CỦA BẠN --}}
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="contact-details">
                            <h3>CARVAN SAIGON</h3>
                            <p class="address">68 Ton Duc Thang Street, Ben Nghe Ward, District 1, Ho Chi Minh City, Vietnam</p>
                            <ul>
                                <li><strong>Hotline:</strong> 1800 888 861</li>
                                <li><strong>Tel:</strong> +84 (0) 28 39 118 008</li>
                                <li><strong>Fax:</strong> +84 (0) 28 39 243 961</li>
                                <li>
                                    <strong>Email:</strong>
                                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=contact@carvan.vn" target="_blank">
                                      carvanOfficial@gmail.com
                                    </a>
                                </li>
                            </ul>
                            {{-- THAY THẾ bằng link Google Maps thực tế của bạn --}}
                            <a href="https://maps.google.com/?q=68+Ton+Duc+Thang+Street,+Ben+Nghe+Ward,+District+1,+Ho+Chi+Minh+City" class="cta-button map-button" target="_blank" rel="noopener noreferrer">View Map</a>
                        </div>
                    </div>
                </div>
            </section> {{-- Kết thúc contact-container --}}

        </div> {{-- Kết thúc main-content-area --}}

    {{-- </main> --}}
@endsection
