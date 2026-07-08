<?php

if (is_file(__DIR__.'/vendor/autoload_packages.php')) {
    require_once __DIR__.'/vendor/autoload_packages.php';
}

function tailpress(): TailPress\Framework\Theme
{
    return TailPress\Framework\Theme::instance()
        ->assets(fn($manager) => $manager
            ->withCompiler(new TailPress\Framework\Assets\ViteCompiler, fn($compiler) => $compiler
                ->registerAsset('resources/css/app.css')
                ->registerAsset('resources/js/app.js')
                ->editorStyleFile('resources/css/editor-style.css')
            )
            ->enqueueAssets()
        )
        ->features(fn($manager) => $manager->add(TailPress\Framework\Features\MenuOptions::class))
        ->menus(fn($manager) => $manager->add('primary', __( 'Primary Menu', 'tailpress')))
        ->themeSupport(fn($manager) => $manager->add([
            'title-tag',
            'custom-logo',
            'post-thumbnails',
            'align-wide',
            'wp-block-styles',
            'responsive-embeds',
            'html5' => [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ]
        ]));
}

tailpress();

add_action('customize_register', function ($wp_customize) {

    // Phone Number
    $wp_customize->add_setting('site_phone', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('site_phone', [
        'label'    => __('Phone Number', 'your-theme'),
        'section'  => 'title_tagline', // Site Identity section
        'type'     => 'text',
        'priority' => 50,
    ]);

    // Email
    $wp_customize->add_setting('site_email', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ]);

    $wp_customize->add_control('site_email', [
        'label'    => __('Email', 'your-theme'),
        'section'  => 'title_tagline',
        'type'     => 'email',
        'priority' => 51,
    ]);

    // Address
    $wp_customize->add_setting('site_address', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('site_address', [
        'label'    => __('Address', 'your-theme'),
        'section'  => 'title_tagline',
        'type'     => 'text',
        'priority' => 52,
    ]);

});