<?php
// 🔗 Enqueue Styles and Scripts
function custom_theme_assets() {
    // Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap',
        [],
        null
    );

    // Main CSS
    wp_enqueue_style(
        'main-style',
        get_template_directory_uri() . '/main.css',
        [],
        filemtime(get_template_directory() . '/main.css')
    );

    // Optional JS
    wp_enqueue_script(
        'main-js',
        get_template_directory_uri() . '/main.js',
        [],
        filemtime(get_template_directory() . '/main.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'custom_theme_assets');


// 🎨 Theme Supports
function custom_theme_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('menus');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
}
add_action('after_setup_theme', 'custom_theme_setup');


// 🧭 Register Navigation Menus
function custom_register_menus() {
    register_nav_menus([
        'primary' => __('Primary Menu', 'custom-theme'),
    ]);
}
add_action('init', 'custom_register_menus');


// 🧱 Register Sidebar
function custom_register_sidebar() {
    register_sidebar([
        'name' => __('Main Sidebar', 'custom-theme'),
        'id' => 'main-sidebar',
        'description' => __('Widgets in this area will be shown in the sidebar.', 'custom-theme'),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'custom_register_sidebar');


// 🧩 Custom Widget: Info Box
class Custom_Info_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'custom_info_widget',
            __('Custom Info Box', 'custom-theme'),
            ['description' => __('Displays a custom message.', 'custom-theme')]
        );
    }

    function widget($args, $instance) {
        echo $args['before_widget'];
        echo $args['before_title'] . esc_html($instance['title']) . $args['after_title'];
        echo '<p>' . esc_html($instance['message']) . '</p>';
        echo $args['after_widget'];
    }

    function form($instance) {
        $title = $instance['title'] ?? '';
        $message = $instance['message'] ?? '';
        ?>
        <p>
            <label>Title:</label>
            <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label>Message:</label>
            <textarea class="widefat" name="<?php echo $this->get_field_name('message'); ?>"><?php echo esc_textarea($message); ?></textarea>
        </p>
        <?php
    }

    function update($new, $old) {
        return [
            'title' => sanitize_text_field($new['title']),
            'message' => sanitize_textarea_field($new['message']),
        ];
    }
}
add_action('widgets_init', function() {
    register_widget('Custom_Info_Widget');
});


// 🔗 Custom Shortcode: Greeting
function custom_greeting_shortcode($atts) {
    $atts = shortcode_atts(['name' => 'Aadam'], $atts);
    return "<p>Hello, {$atts['name']}! Welcome to my site.</p>";
}
add_shortcode('greeting', 'custom_greeting_shortcode');
