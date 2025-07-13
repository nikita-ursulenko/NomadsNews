
<footer class="footer">
    <div class="footer__container">
        <div class="footer__logo">
            <div class="p-wrapper">

                <p data-i18n="footerContactTittle">Contact information:</p>
            </div>
            <div class="image-wrapper">
                <img class="quote__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/header_nomads.png" alt="emag logo">
            </div>
        </div>
        <div class="footer__contacts">
            <p><strong>Mail:</strong><span> nomadssupprt@gmail.com</span></p>
            <p><strong>Mobile:</strong><span> +373 60 957 805</span></p>
            <p><strong>Address:</strong><span> București Sectorul 6, Splaiul INDEPENDENȚEI, Nr. 202B, Camera 42</span></p>
        </div>
    </div>

    
    <!-- Подключение скрипта Glide.js -->
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/glide.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Первая карусель
        new Glide(".glide-carousel", {
            type: "carousel",
            autoplay: 3000,
            animationDuration: 800,
            startAt: 0,
            perView: 3,
            gap: 20,
            breakpoints: {
                1024: { perView: 2 },
                768: { perView: 1 }
            }
        }).mount();

        // Вторая карусель
        new Glide(".review-carousel", {
            type: 'carousel',
            autoplay: 3000,
            startAt: 0,
            perView: 1,
            gap: 20,
            animationDuration: 800,
            breakpoints: {
                1024: { perView: 1 },
                768: { perView: 1 },
                480: { perView: 1 }
            }
        }).mount();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.6/build/js/intlTelInput.min.js"></script>

</footer>
<p class="footer__right">&copy; <?php echo date('Y'); ?> Nomad's. <?php esc_html_e('All rights reserved.', 'nomads'); ?></p>
<?php wp_footer(); ?>
</div>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Nomads News Tech",
  "url": "https://nomadsnews.tech",
  "logo": "https://nomadsnews.tech/wp-content/uploads/2025/07/cropped-IMG_2974-270x270.jpg",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+373 600 000 00",
    "contactType": "Customer Support",
    "areaServed": "RO, MD, EU",
    "availableLanguage": ["ro", "en"]
  },
  "sameAs": [
    "https://facebook.com/nomadsnewstech",
    "https://instagram.com/nomadsnewstech"
  ]
}
</script>
</body>
</html>