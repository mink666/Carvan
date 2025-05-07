@extends('layouts.app') {{-- Giả sử bạn có layout chung --}}

@section('title', 'About Us - CARVAN') {{-- Tiêu đề trang rõ ràng hơn --}}

@section('content')
    {{-- Sử dụng class content hoặc một wrapper tương tự từ layout app.blade.php nếu có --}}
    {{-- <main class="content"> --}}

        {{-- Khối chính giới hạn chiều rộng và căn giữa nội dung --}}
        <div class="main-content-area">

            {{-- 1. Banner Slider Section --}}
            <section class="hero-banner-section"> {{-- Thêm class để bao bọc slider --}}
                <div class="swiper hero-banner-slider"> {{-- Class cho Swiper và định kiểu banner --}}
                    <div class="swiper-wrapper">
                        {{-- Slide 1 --}}
                        <div class="swiper-slide">
                             <div class="banner-slide"> {{-- Class style cho nội dung slide --}}
                                  <img src="{{ asset('images/slide-1-background.jpg') }}" class="slide-background-image" alt="Company Values">
                                  <div class="slide-overlay"></div>
                                  <div class="slide-content">
                                       <h2>Leading Innovation in Mobility</h2>
                                       <p>Discover our commitment to quality and customer satisfaction.</p>
                                       <a href="#mission" class="cta-button">Learn More</a> {{-- Liên kết đến phần Mission chẳng hạn --}}
                                  </div>
                             </div>
                        </div>
                        {{-- Slide 2 --}}
                        <div class="swiper-slide">
                            <div class="banner-slide">
                                  <img src="{{ asset('images/slide-2-background.jpg') }}" class="slide-background-image" alt="Our Vision">
                                  <div class="slide-overlay"></div>
                                  <div class="slide-content">
                                       <h2>Driving Towards a Sustainable Future</h2>
                                       <p>Explore our goals for eco-friendly practices and community growth.</p>
                                       <a href="#responsibility" class="cta-button">Our Responsibility</a> {{-- Liên kết đến phần Responsibility --}}
                                  </div>
                             </div>
                        </div>
                        {{-- Thêm các slide khác nếu cần --}}
                    </div>
                    {{-- Pagination (dấu chấm) --}}
                    <div class="swiper-pagination"></div>
                    {{-- Navigation (mũi tên) --}}
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </section>

            {{-- 2. About Section --}}
            <section id="about" class="about-section"> {{-- Thêm ID nếu cần anchor link --}}
                <h1>ABOUT CARVAN</h1>

                <div id="mission" class="about-item"> {{-- Thêm ID tương ứng với link nút banner --}}
                    <h2>1. OUR MISSION</h2>
                    <ul>
                        <li>CARVAN's mission is simple: build trust and enrich the car buying and selling experience for everyone. We are committed to building a transparent, reliable, and new car buying and selling environment where customers can easily find a car that suits their needs and budget. Through providing quality vehicles that have undergone rigorous inspection and transparent services, CARVAN aims to become a trusted companion on your journey, turning car buying from a transaction into a memorable milestone.</li>
                    </ul>
                </div>

                <div id="goals" class="about-item">
                    <h2>2. GOALS</h2>
                    <ul>
                        <li>Expand the network: Continue to expand the network strongly and quickly across provinces and key areas across the country, helping customers easily access products and services.</li>
                        <li>Improve service quality: Continuously improve service quality, invest in training a team of professional staff to bring the best experience to customers.</li>
                        <li>Enhance customer value: Put customer satisfaction at the highest level, listen to feedback and meet customer needs.</li>
                        <li>Build a strong brand reputation: Build CARVAN into a strong brand, trusted by customers as the top choice when it comes to buying and selling used cars, based on high quality, transparency, and competitive prices.</li>
                        <li>Sustainable growth: Achieve stable growth in revenue and market share, ensuring long-term and sustainable development for the brand.</li>
                    </ul>
                </div>

                <div id="history" class="about-item">
                    <h2>3. HISTORY OF FORMATION AND DEVELOPMENT</h2>
                    <ul>
                        <li>CARVAN was born from a passion for cars and the desire to create a reliable and transparent used car buying and selling location, especially different from traditional models. Starting from a small showroom [possibly established in the late 201X, but the founding years need to be reviewed for accuracy], CARVAN has quickly established its position in the market thanks to its focus on quality and customer trust. The important initial milestone was the successful launch of the first branch, marking a significant step forward, creating momentum for future expansion strategies. Over the years, CARVAN has continuously expanded its network, strongly developed, and deployed many branches in strategic locations, diversifying product categories and building a professional, dedicated, and knowledgeable team, always putting customer benefits first. CARVAN's history is a continuous effort to bring value to the car-loving community.</li>
                    </ul>
                </div>

                <div id="responsibility" class="about-item">
                    <h2>4. RESPONSIBILITY</h2>
                    <ul>
                        <li>At CARVAN, we understand that the success of a business is closely linked to its responsibility towards customers, employees, and the community.</li>
                        <li>With customers: CARVAN is committed to providing transparent product information, clarifying the vehicle's origin and usage history (if any). We ensure a clear buying and selling process, quick procedures, and protection of customer rights. All vehicles undergo thorough inspection, maintenance, and are built on ensuring peace of mind for customers after purchase.</li>
                        <li>With employees: Build a professional working environment, dynamic, fair, and create development opportunities for all members.</li>
                        <li>With society and the community: CARVAN makes continuous efforts in business ethics, contributing positively to social development and coordinating efforts to develop the local economy not only for profit. We always comply with environmental protection regulations and find ways to optimize operations to minimize negative environmental impacts (e.g., waste sorting regulations, chemical treatment).</li>
                    </ul>
                </div>
            </section> {{-- Kết thúc about-section --}}

            {{-- 3. Speech Section --}}
            <section class="speech-container">
                <div class="image-column">
                     {{-- Sử dụng asset() helper cho ảnh trong thư mục public --}}
                    <img src="{{ asset('picture/download (2).jpg') }}" alt="Mr. Peter Jack - General Director of Carvan VN">
                </div>
                <div class="text-column">
                    <p>
                        First and foremost, CARVAN would like to extend its sincerest thanks to our Customers and Partners who have always trusted and accompanied us, creating a solid foundation for the continuous development of our network, sales, and service quality. With the core commitment of bringing convenience and freedom of movement through comprehensive car ownership solutions, CARVAN constantly strives to ensure maximum peace of mind and satisfaction for every customer throughout their product and service experience journey.
                    </p>
                    <p>
                        Always aware of our responsibility, CARVAN strives towards a sustainable business model, actively promoting more environmentally friendly car options, aligning with current trends and future development directions. We believe that your invaluable support and companionship will continue to be a great driving force for CARVAN to conquer new goals, make positive contributions to the development of the Vietnamese auto market, and strive to become the brand beloved and trusted by customers.
                    </p>
                    <div class="signature">
                         {{-- Nên dùng thẻ strong hoặc p cho từng dòng --}}
                        <strong>Mr. Peter Jack</strong>
                        <span>General Director Carvan VN</span>
                    </div>
                </div>
            </section> {{-- Kết thúc speech-container --}}

        </div> {{-- Kết thúc main-content-area --}}

    {{-- </main> --}} {{-- Kết thúc main content nếu có trong layout --}}
@endsection
