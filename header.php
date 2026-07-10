<?php
/**
 * Theme header template.
 *
 * @package Generic Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-zinc-900 antialiased'); ?>>
    <?php do_action('tailpress_site_before'); ?>

    <div id="page" class="min-h-screen flex flex-col">
        <?php do_action('tailpress_header'); ?>

        <header class="w-full relative">
            <div class="flex contact-bar justify-end bg-blue-500 gap-10 py-2 w-full px-[4rem]">
                <div class="flex gap-4 items-center justify-end">
                    <?

                    $socials = ThemeOptions::socials();

                    foreach ($socials as $network => $url) {
                        if (empty($url)) {
                            continue;
                        }
                        ?>
                        <a href="<?= esc_url($url) ?>" class="text-xl hover:text-primary transition" target="_blank"
                            rel="noopener noreferrer" aria-label="<?= esc_attr(ucfirst($network)) ?>">
                            <?= Icon::social($network) ?>
                        </a>
                        <?php
                    }
                    ?>

                </div>
                <div class="flex gap-6">
                    <a href="tel:<?= esc_attr(ThemeOptions::phone()); ?>" class="flex text-white items-center gap-2">
                        <i class="fa-solid fa-phone"></i>
                        <?= esc_html(ThemeOptions::phone()); ?>
                    </a>
                    <a href="mailto:<?= esc_attr(ThemeOptions::email()); ?>" class="flex text-white items-center gap-2">
                        <i class="fa-solid fa-envelope"></i>
                        <?= esc_html(ThemeOptions::email()); ?>
                    </a>
                </div>
            </div>
            <div class="md:flex md:justify-center md:items-center">
                <div class="flex justify-between items-center p-4 md:px-[2rem]">
                    <div>
                        <?php if (has_custom_logo()): ?>
                            <?php the_custom_logo(); ?>
                        <?php else: ?>
                            <div class="flex items-center gap-2">
                                <a href="<?php echo esc_url(home_url('/')); ?>"
                                    class="!no-underline lowercase font-medium text-lg">
                                    <?php bloginfo('name'); ?>
                                </a>
                                <?php if ($description = get_bloginfo('description')): ?>
                                    <span class="text-sm font-light text-dark/80">|</span>
                                    <span class="text-sm font-light text-dark/80"><?php echo esc_html($description); ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if (has_nav_menu('primary')): ?>
                        <div class="md:hidden">
                            <button type="button" aria-label="Toggle navigation" aria-expanded="false"
                                id="primary-menu-toggle">
                                <!-- Hamburger icon (shown by default) -->
                                <svg class="icon-open size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                                <!-- Close icon (hidden by default) -->
                                <svg class="icon-close size-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>

                <div id="primary-navigation"
                    class="hidden md:flex md:bg-transparent gap-6 items-center border border-light md:border-none rounded-xl p-4 md:p-0 mobile-nav">
                    <div class="mobile-nav-header flex items-center justify-between py-4">
                        <div>
                            <?php if (has_custom_logo()): ?>
                                <?php the_custom_logo(); ?>
                            <?php else: ?>
                                <div class="flex items-center gap-2">
                                    <a href="<?php echo esc_url(home_url('/')); ?>"
                                        class="!no-underline lowercase font-medium text-lg">
                                        <?php bloginfo('name'); ?>
                                    </a>
                                    <?php if ($description = get_bloginfo('description')): ?>
                                        <span class="text-sm font-light text-dark/80">|</span>
                                        <span class="text-sm font-light text-dark/80">
                                            <?php echo esc_html($description); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <button id="primary-menu-close-btn" type="button">
                            <i class="fa-solid fa-xmark"></i>
                        </button>

                    </div>

                    <nav>
                        <?php if (current_user_can('administrator') && !has_nav_menu('primary')): ?>
                            <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>"
                                class="text-sm text-zinc-600"><?php esc_html_e('Edit Menus', 'tailpress'); ?></a>
                        <?php else: ?>
                            <?php
                            wp_nav_menu([
                                'theme_location' => 'primary',
                                'container' => false,
                                'menu_class' => 'nav-primary gap-2 flex items-center',
                                'walker' => new \TailPress\Walkers\MegaMenuWalker(),
                            ]);
                            ?>
                        <?php endif; ?>
                    </nav>
                    <!-- <div class="inline-block mt-4 md:mt-0"><?php get_search_form(); ?></div> -->
                </div>
            </div>
        </header>

        <div id="content" class="site-content grow">
            <?php do_action('tailpress_content_start'); ?>
            <main>