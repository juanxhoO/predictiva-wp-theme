<?php

if (is_file(__DIR__ . '/vendor/autoload_packages.php')) {
    require_once __DIR__ . '/vendor/autoload_packages.php';
}

function tailpress(): TailPress\Framework\Theme
{
    return TailPress\Framework\Theme::instance()
        ->assets(
            fn($manager) => $manager
                ->withCompiler(
                    new TailPress\Framework\Assets\ViteCompiler,
                    fn($compiler) => $compiler
                        ->registerAsset('resources/css/app.css')
                        ->registerAsset('resources/js/app.js')
                        ->editorStyleFile('resources/css/editor-style.css')
                )
                ->enqueueAssets()
        )
        ->features(fn($manager) => $manager->add(TailPress\Framework\Features\MenuOptions::class))
        ->menus(fn($manager) => $manager->add('primary', __('Primary Menu', 'tailpress')))
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
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('site_phone', [
        'label' => __('Phone Number', 'your-theme'),
        'section' => 'title_tagline', // Site Identity section
        'type' => 'text',
        'priority' => 50,
    ]);

    // Email
    $wp_customize->add_setting('site_email', [
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ]);

    $wp_customize->add_control('site_email', [
        'label' => __('Email', 'your-theme'),
        'section' => 'title_tagline',
        'type' => 'email',
        'priority' => 51,
    ]);

    // Address
    $wp_customize->add_setting('site_address', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('site_address', [
        'label' => __('Address', 'your-theme'),
        'section' => 'title_tagline',
        'type' => 'text',
        'priority' => 52,
    ]);

    $wp_customize->add_panel('theme_options', [
        'title' => __('Theme Options', 'tailpress'),
        'priority' => 160,
        'description' => __('Customize your theme settings.', 'tailpress'),
    ]);


    $wp_customize->add_section('social_networks', [
        'title' => __('Social Networks', 'tailpress'),
        'panel' => 'theme_options',
    ]);


    $socials = [
        'facebook' => 'Facebook',
        'instagram' => 'Instagram',
        'linkedin' => 'LinkedIn',
        'youtube' => 'YouTube',
    ];

    foreach ($socials as $key => $label) {

        $wp_customize->add_setting("social_$key", [
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ]);

        $wp_customize->add_control("social_$key", [
            'label' => $label,
            'section' => 'social_networks',
            'type' => 'url',
        ]);
    }


});

// function predictiva_enqueue_scripts()
// {
//     // CAMBIA ESTO A 'false' SOLO CUANDO VAYAS A SUBIR EL TEMA A PRODUCCIÓN
//     $is_development = false;

//     if ($is_development) {
//         // 1. Inyectamos el cliente de Vite apuntando a tu Linux local (puerto 3000)
//         wp_enqueue_script('vite-client', 'http://localhost:3000/resources/@vite/client', array(), null, false);

//         // 2. Cargamos tus estilos y scripts de desarrollo directo desde tu entorno local
//         wp_enqueue_style('predictiva-styles', 'http://localhost:3000/resources/css/app.css', array(), null);
//         wp_enqueue_script('predictiva-js', 'http://localhost:3000/resources/js/app.js', array(), null, true);

//         // 3. Filtro obligatorio para que el navegador entienda los scripts como módulos de Vite
//         add_filter('script_loader_tag', function ($tag, $handle, $src) {
//             if (in_array($handle, ['vite-client', 'predictiva-js'])) {
//                 return '<script type="module" src="' . esc_url($src) . '"></script>';
//             }
//             return $tag;
//         }, 10, 3);

//     } else {
//         // Código original de producción de TailPress (cuando corres npm run build)
//         $manifest_path = get_template_directory() . '/dist/.vite/manifest.json';
//         if (file_exists($manifest_path)) {
//             $manifest = json_decode(file_get_contents($manifest_path), true);
//             wp_enqueue_style('predictiva-styles', get_template_directory_uri() . '/dist/' . $manifest['resources/css/app.css']['file']);
//             wp_enqueue_script('predictiva-js', get_template_directory_uri() . '/dist/' . $manifest['resources/js/app.js']['file'], array(), null, true);
//         }
//     }
// }
// add_action('wp_enqueue_scripts', 'predictiva_enqueue_scripts');



function predictiva_registrar_widgets()
{


    register_sidebar(array(
        'name' => __('Footer Widget 1', 'predictiva-wp-theme'),
        'id' => 'footer-widget-1',
        'description' => __('Área de widgets que aparece en el lateral o pie de página.', 'predictiva-wp-theme'),
        'before_widget' => '<section id="%1$s" class="widget text-white px-6 ">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="inline-block widget-title text-2xl font-bold  border-b-4 border-brand-red pb-1 text-white mb-4">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Widget 2', 'predictiva-wp-theme'),
        'id' => 'footer-widget-2',
        'description' => __('Área de widgets que aparece en el lateral o pie de página.', 'predictiva-wp-theme'),
        'before_widget' => '<section id="%1$s" class="widget px-6  text-white rounded-xl shadow-sm mb-6 ">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="inline-block widget-title text-2xl font-bold  border-b-4 border-brand-red pb-1 text-white mb-4">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'predictiva_registrar_widgets');


class ThemeOptions
{
    public static function phone()
    {
        return get_theme_mod('site_phone');
    }

    public static function address()
    {
        return get_theme_mod('site_address');
    }

    public static function email()
    {
        return get_theme_mod('site_email');
    }

    public static function socials(): array
    {
        return [
            'facebook' => get_theme_mod('social_facebook'),
            'instagram' => get_theme_mod('social_instagram'),
            'x' => get_theme_mod('social_x'),
            'linkedin' => get_theme_mod('social_linkedin'),
            'youtube' => get_theme_mod('social_youtube'),
            'tiktok' => get_theme_mod('social_tiktok'),
            'github' => get_theme_mod('social_github'),
        ];
    }
}

class Icon
{
    public static function social(string $network): string
    {
        return match ($network) {
            'facebook' => '<i class="fa-brands fa-facebook-f"></i>',
            'instagram' => '<i class="fa-brands fa-instagram"></i>',
            'x' => '<i class="fa-brands fa-x-twitter"></i>',
            'linkedin' => '<i class="fa-brands fa-linkedin-in"></i>',
            'youtube' => '<i class="fa-brands fa-youtube"></i>',
            'github' => '<i class="fa-brands fa-github"></i>',
            'tiktok' => '<i class="fa-brands fa-tiktok"></i>',
            'whatsapp' => '<i class="fa-brands fa-whatsapp"></i>',
            'telegram' => '<i class="fa-brands fa-telegram"></i>',
            default => '',
        };
    }
}





