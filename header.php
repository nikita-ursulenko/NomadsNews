<!DOCTYPE html>
<html lang="<?php echo get_locale(); ?>">
<head>
    <meta charset="UTF-8">
    <!-- установка tittle страницы -->
    <title>Nomads News Tech - Nomads | Nomads News | Gadgeturi pentru călătorii</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nomads News Tech - Gadgeturi Nomads pentru călătorii. Nomads News, Nomads - descoperă soluții inteligente pentru orice aventură.">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="48x48" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon-48x48.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/icons/site.webmanifest">

    <!-- Open Graph -->
    <meta property="og:title" content="Nomads News Tech - Nomads | Nomads News | Gadgeturi pentru călătorii">
    <meta property="og:description" content="Nomads News Tech - Gadgeturi Nomads pentru călătorii. Nomads News, Nomads - descoperă soluții inteligente pentru orice aventură.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://nomadsnews.tech/">
    <meta property="og:image" content="https://nomadsnews.tech/wp-content/uploads/2025/07/cropped-IMG_2974-270x270.jpg">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Nomads News Tech - Nomads | Nomads News | Gadgeturi pentru călătorii">
    <meta name="twitter:description" content="Nomads News Tech - Gadgeturi Nomads pentru călătorii. Nomads News, Nomads - descoperă soluții inteligente pentru orice aventură.">
    <meta name="twitter:image" content="https://nomadsnews.tech/wp-content/uploads/2025/07/cropped-IMG_2974-270x270.jpg">

    <!-- Предзагрузка и подключение шрифта -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,900;1,400;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Подключение стилей Glide.js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.theme.min.css">

    <!-- Подключаем библиотеку intl-tel-input -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.6/build/css/intlTelInput.css">
    
    <link rel="canonical" href="https://nomadsnews.tech/"> 

    <?php wp_head(); ?>
</head>
<body>
    <div class="mainer-container">
        <header class="header">
            <div class="container">
                <nav class="main-menu">
                    <!-- Логотип -->
                    <a href="/" class="logo scroll-reveal">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header_nomads.png" alt="Nomad's Logo">
                    </a>

                    <!-- Левое меню -->
                    <ul class="menu-items scroll-reveal">
                        <li><a href="#about" data-i18n="menuAbout">Despre noi</a></li>
                        <li><a href="#partners" data-i18n="menuPartners">Colaborare</a></li>
                        <li><a href="#help" data-i18n="menuHelp">Ajutor</a></li>
                    </ul>

                    <!-- Правое меню -->
                    <div class="right-menu">
                        <a href="https://www.emag.ro/prelungitor-compact-pentru-calatorii-nomad-s-2xusb-c-pd20w-1xusb-a-12w-1xpriza-schuko-priza-multipla-5-in-1-cu-incarcare-rapida-compartiment-pentru-cablu-type-c-0-5m-cablu-inclus-cablu-alimentare-1-5m/pd/D219BT3BM/?utm_medium=ios&utm_source=mobile%20app&utm_campaign=share%20product" class="menu-link" data-i18n="menuWhereBuy">Unde să cumperi?</a>
                        <button class="menu-toggle">
                            <span class="menu-icon">&#9776;</span>
                        </button>
                    </div>
                </nav>
                <div class="language-switcher scroll-reveal">
                    <button class="lang-btn">
                        <img class="lang-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/ro.svg" alt="RO">
                        <span class="lang-text">RO</span>
                        <span class="arrow">&#9662;</span>
                    </button>
                    <ul class="lang-menu">
                        <li data-lang="en">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/en.svg" alt="EN"> EN
                        </li>
                    </ul>
                </div>
            </div>
        <!-- Блок с текстом -->
        <div class="hero-text">
            
            <h1 class="desc scroll-reveal" data-i18n="headerText" >DESCOPERĂ O NOUĂ EXPERIENȚĂ <br>
                A CĂLĂTORIILOR <br>
             CU DISPOZITIVUL DE LA NOMAD'S</h1>
        
            
        </div>
        <div class="hero-text-mobile">
            <h1 class="mobile scroll-reveal" data-i18n="headerMobile">
                O nouă experiență <br>de calatorie
            </h1>
            <br>
            <p class=" scroll-reveal" data-i18n="headerMobileText">Dacă aveți întrebări, suntem mereu aici pentru tine – scrie-ne oricând!</p>
            <div class="header__button scroll-reveal">
                <a href="#help">Contact</a>
            </div>
        </div>
        
        </header>

