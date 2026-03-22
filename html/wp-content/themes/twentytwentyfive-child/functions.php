<?php
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style(
        'parent-style',
        get_template_directory_uri() . '/style.css'
    );
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        ['parent-style']
    );
});

function register_works_post_type() {
    register_post_type('works', [
        'labels' => [
            'name' => '実績',
            'singular_name' => '実績',
        ],
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);
}
add_action('init', 'register_works_post_type');

add_action('wp_footer', function() {
    echo '<p>これはフッターに差し込んだテキストです</p>';
});

add_filter('the_content', function($content) {
    return '<p>【本文の前に追加したテキスト】</p>' . $content;
});

add_action('wpcf7_mail_sent', function($contact_form) {
    $submission = WPCF7_Submission::get_instance();
    $data = $submission->get_posted_data();
    
    $log = date('Y-m-d H:i:s') . "\n";
    $log .= print_r($data, true) . "\n";
    $log .= "---\n";
    
    file_put_contents(
        ABSPATH . 'wp-content/debug.log',
        $log,
        FILE_APPEND
    );
});

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script(
        'my-custom-js',
        get_stylesheet_directory_uri() . '/js/custom.js',
        [],
        '1.0.0',
        true
    );
});
