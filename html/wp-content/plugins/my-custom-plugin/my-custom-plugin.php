<?php
/**
 * Plugin Name: My Custom Plugin
 * Description: 自作ショートコードプラグイン
 * Version: 1.0.0
 * Author: Yoshi
 */

add_shortcode('current_year', function() {
    return date('Y');
});

add_shortcode('greeting', function($atts) {
    $atts = shortcode_atts([
        'name'  => '名無し',
        'label' => '',
    ], $atts);
    
    $output = 'こんにちは、' . $atts['name'] . 'さん！';
    
    if (!empty($atts['label'])) {
        $output = '<strong>' . $atts['label'] . '：</strong>' . $output;
    }
    
    return $output;
});

add_shortcode('acf_field', function($atts) {
    $atts = shortcode_atts([
        'field' => 'achievements__project_name',
        'id'    => null,
    ], $atts);

    if (empty($atts['field'])) {
        return '';
    }

    $id = $atts['id'] ? intval($atts['id']) : null;
    return get_field($atts['field'], $id);
});

add_action('admin_menu', function() {
    add_menu_page(
        'My Custom Plugin',
        'カスタム設定',
        'manage_options',
        'my-custom-plugin',
        function() {
            echo '<div class="wrap"><h1>カスタム設定</h1><p>プラグインの設定画面です。</p></div>';
        },
        'dashicons-admin-generic',
        100
    );
});
