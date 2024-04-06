<?php

/**
 * Plugin Name: Соціальна плагін Social Share
 * Description: Додає блок кнопок поділитися в соціальних мережах на сторінці
 * Version: 1.0.0
 * Author: Oleh Kohut
 * Author URI: https://web-desing.com.ua/
 * License: GPL2
 */

// Додаємо функцію, яка створює HTML-код для кнопки поділитися на Facebook
function social_share_facebook()
{
    global $post; // Отримуємо інформацію про поточний запис

    // Формуємо URL для поділитися на Facebook
    $url = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode(get_permalink());

    // Створюємо HTML-код для кнопки
    $button = '<a href="' . esc_url($url) . '" target="_blank">';
    $button .= '<i class="fab fa-facebook"></i> Поділитися на Facebook';
    $button .= '</a>';

    // Виводимо HTML-код кнопки
    echo $button;
}

// Додаємо функцію, яка додає кнопки до постів
function social_share_buttons($content)
{
    // Перевіряємо, що це один пост, а не архів чи головна сторінка
    if (is_single()) {
        // Створюємо HTML-код для блоку кнопок
        $buttons = '<div class="social-share-buttons">';
        $buttons .= '<h4>Поділитися:</h4>';
        $buttons .= social_share_facebook(); // Додаємо кнопку Facebook
        $buttons .= '</div>';

        // Додаємо блок кнопок після змісту поста
        $content .= $buttons;
    }

    return $content;
}
add_filter('the_content', 'social_share_buttons');
//підключаємо Font Awesome
// Додаємо FontAwesome до WordPress
function add_font_awesome()
{
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'add_font_awesome');
