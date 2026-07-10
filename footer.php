<?php
/**
 * Theme footer template.
 *
 * @package TailPress
 */
?>
</main>

<?php do_action('tailpress_content_end'); ?>
</div>

<?php do_action('tailpress_content_after'); ?>
<?php wp_footer(); ?>

<footer id="colophon" class="bg-brand-blue-dark mt-12" role="contentinfo">
    <div class="container mx-auto pt-12 pb-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="space-y-4">

                <?php if (has_custom_logo()): ?>
                    <?php the_custom_logo(); ?>
                <?php endif; ?>

                <div class="my-4">
                    <div class=" flex flex-col gap-2 text-white">

                        <p class="inline"><strong class="text-brand-red">Dirección:</strong> Av. Siempre Viva 742</p>
                        <p><strong class="text-brand-red">Teléfono:</strong> <a class="!no-underline"
                                href="tel:<?= esc_attr(ThemeOptions::phone()) ?>">
                                <?= esc_html(ThemeOptions::phone()) ?>
                            </a></p>


                        <p class="inline"><strong class="text-brand-red">Email:</strong> <a class="!no-underline"
                                href="mailto:<?= esc_attr(ThemeOptions::email()) ?>">
                                <?= esc_html(ThemeOptions::email()) ?>
                            </a></p>
                    </div>
                    <div class="flex flex-col mt-6 gap-2">
                        <p class="text-white">Siguenos en Nuestras Redes:</p>
                        <div class="flex gap-2">
                            <?
                            $socials = ThemeOptions::socials();
                            foreach ($socials as $network => $url) {
                                if (empty($url)) {
                                    continue;
                                }
                                ?>
                                <a href="<?= esc_url($url) ?>" class="text-xl text-white hover:text-brand-red transition"
                                    target="_blank" rel="noopener noreferrer"
                                    aria-label="<?= esc_attr(ucfirst($network)) ?>">
                                    <?= Icon::social($network) ?>
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
            <?php if (is_active_sidebar('footer-widget-1')): ?>

                <?php dynamic_sidebar('footer-widget-1'); ?>

            <?php endif; ?>
            <?php if (is_active_sidebar('footer-widget-2')): ?>

                <?php dynamic_sidebar('footer-widget-2'); ?>
            <?php endif; ?>
        </div>

        <?php do_action('tailpress_footer'); ?>
        <div class=" text-ms items-center flex gap-4 text-white  justify-center w-full my-4">
            &copy; <?php echo esc_html(date_i18n('Y')); ?> - <?php bloginfo('name'); ?>
            <p class="ml-2 text-xs">Desarrollado Por Juan Granja</p>
        </div>
    </div>
</footer>
</div>
<div class="shadow-layout fixed  w-full h-full">
</div>
</body>

</html>