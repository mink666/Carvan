<div class="bg-black text-gray-300 container mx-auto px-4 sm:px-6 lg:px-8">
    {{-- Hàng trên cùng: Links và Social Icons --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 pb-8 border-b border-gray-700">
        {{-- Footer Navigation Links --}}
        <nav class="footer-nav mb-6 md:mb-0">
            <ul class="flex flex-wrap justify-center md:justify-start gap-x-4 gap-y-2 text-xs uppercase tracking-wider font-semibold">
                <li><a href="#" class="hover:text-white transition-colors">Company</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Contact Us</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Privacy & Legal</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Cookie Settings</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Sitemap</a></li>
            </ul>
        </nav>
        {{-- Social Media Icons --}}
        <div class="social-icons flex space-x-3">
            <a href="https://cdn-icons-png.flaticon.com/512/1362/1362894.png" aria-label="Instagram" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-instagram fa-lg"></i></a>
            <a href="#" aria-label="Facebook" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-facebook-f fa-lg"></i></a>
            <a href="#" aria-label="X (Twitter)" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-twitter fa-lg"></i></a>
            <a href="#" aria-label="Youtube" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-youtube fa-lg"></i></a>
            <a href="#" aria-label="LinkedIn" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-linkedin-in fa-lg"></i></a>
            <a href="#" aria-label="TikTok" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-tiktok fa-lg"></i></a>
            <a href="#" aria-label="Discord" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-discord fa-lg"></i></a>
        </div>
    </div>
    {{-- Company Information and Copyright --}}
    <div class="text-xs text-gray-400 space-y-2 text-left">
        <p>Carvan Online Marketplace<br>
        123 Carvan Street, Suite 100<br>
        Imaginary City, FC 12345, Fictionland</p>
        <p>Telephone: +1 (555) 123-4567 | Email: support@carvanmarketplace.com</p>
        <p>Copyright © {{ date('Y') }} Carvan Online Marketplace. All rights reserved.</p>
    </div>
</div>
