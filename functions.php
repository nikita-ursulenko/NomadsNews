<?php
// функция для подключения tittle
function nomads_theme_setup() {
    // Поддержка заголовка
    add_theme_support('title-tag');

    // Регистрация меню
    register_nav_menus(array(
        'main_menu' => __('Главное меню', 'nomads'),
    ));

    // Поддержка миниатюр
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'nomads_theme_setup');


// Подключение стилей и скриптов
function nomads_enqueue_assets() {
    // Подключение Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,900;1,400;1,900&display=swap', [], null);

    // Подключение основного файла стилей
    wp_enqueue_style('nomads-main-style', get_template_directory_uri() . '/assets/css/style.min.css', [], time(), 'all');
    wp_enqueue_style('responsive-style', get_template_directory_uri() . '/assets/css/responsive.min.css', [], time(), 'all');

    wp_enqueue_script('nomads-script', get_template_directory_uri() . '/assets/js/main.js', [], false, true);
}
add_action('wp_enqueue_scripts', 'nomads_enqueue_assets');


add_action('wp_ajax_callback_mail', 'callback_mail');
add_action('wp_ajax_nopriv_callback_mail', 'callback_mail');



function callback_mail() {
    // Получаем и очищаем данные из POST
    $name    = sanitize_text_field($_POST['name'] ?? '');
    $email   = sanitize_email($_POST['email'] ?? '');
    $phone   = sanitize_text_field($_POST['phone'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    // Проверка обязательных полей
    if (empty($name) || empty($email) || empty($message)) {
        echo 'Ошибка: пожалуйста, заполните все обязательные поля.';
        wp_die();
    }

    if (!is_email($email)) {
        echo 'Ошибка: неверный Email.';
        wp_die();
    }

    $to = 'nomadssupprt@gmail.com'; // Замени на нужный email
    $subject = 'Новая заявка с сайта';

    // Формируем HTML-сообщение
    $body  = "Имя: $name<br>";
    $body .= "Email: $email<br>";
    $body .= "Телефон: $phone<br>";
    $body .= "Сообщение:<br>" . nl2br($message);

    remove_all_filters('wp_mail_from');
    remove_all_filters('wp_mail_from_name');

    $headers = array(
        'From: ' . $name . ' <' . $email . '>',
        'Content-Type: text/html; charset=UTF-8',
    );

    // Отправка письма (без вложений)
    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        echo 'Сообщение успешно отправлено!';
    } else {
        echo 'Ошибка отправки сообщения.';
    }

    wp_die();
}