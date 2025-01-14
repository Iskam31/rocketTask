<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function my_custom_theme_scripts() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_custom_theme_scripts');

function my_theme_setup() {
    // Подключение меню
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'my_theme'),
    ));
    // Подключение стилей
    wp_enqueue_style('my-theme-style', get_stylesheet_uri());
}
add_action('after_setup_theme', 'my_theme_setup');

function create_custom_post_types() {
    register_post_type('promotions', array(
        'labels' => array(
            'name' => 'Акции',
            'singular_name' => 'Акция'
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'promotions'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    ));
}
add_action('init', 'create_custom_post_types');

function my_theme_enqueue_styles() {
    wp_enqueue_style('my-style', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'));
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');



// Регистрация миниатюр
add_theme_support('post-thumbnails');

// Регистрация кастомного типа записи "Услуги"
function register_promotions_post_type() {
    register_post_type('promotions', array(
        'label' => 'Услуги',
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array('type'),
    ));

    // Регистрация таксономии "Тип"
    register_taxonomy('type', 'promotions', array(
        'label' => 'Тип',
        'hierarchical' => true,
        'public' => true,
    ));
}
add_action('init', 'register_promotions_post_type');


// Добавление пользовательского поля "Цена" в админке для кастомного типа записи "promotions"
function add_price_meta_box() {
    add_meta_box(
        'price_meta_box',       // ID мета-бокса
        'Цена услуги',          // Название
        'display_price_meta_box', // Callback-функция
        'promotions',           // Тип записи
        'side',                 // Позиция
        'default'               // Приоритет
    );
}
add_action('add_meta_boxes', 'add_price_meta_box');

// Функция отображения мета-бокса
function display_price_meta_box($post) {
    $price = get_post_meta($post->ID, 'price', true);
    ?>
    <label for="price">Цена (р):</label>
    <input type="number" id="price" name="price" value="<?php echo esc_attr($price); ?>" style="width: 100%;" />
    <?php
}

// Сохранение значения мета-бокса
function save_price_meta_box($post_id) {
    if (array_key_exists('price', $_POST)) {
        update_post_meta($post_id, 'price', sanitize_text_field($_POST['price']));
    }
}
add_action('save_post', 'save_price_meta_box');

// swiper
function enqueue_swiper_styles() {
    wp_enqueue_style( 'swiper-style', 'https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css', [], null);
    wp_enqueue_script( 'swiper-script', 'https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_swiper_styles' );

function enqueue_custom_scripts() {
    // Подключить инициализацию Swiper
    wp_enqueue_script('swiper-init', get_template_directory_uri() . '/js/swiper-init.js', ['swiper-script'], null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

?>