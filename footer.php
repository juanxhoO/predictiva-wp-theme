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

<footer id="colophon" class="bg-blue-500 mt-12" role="contentinfo">
    <div class="container mx-auto pt-12 pb-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="space-y-4">

                <?php if (has_custom_logo()): ?>
                    <?php the_custom_logo(); ?>
                <?php endif; ?>

                <div class="my-4">
                    <p>
                        <strong>Dirección:</strong> Av. Siempre Viva 742<br>
                        <strong>Teléfono:</strong> <a class="!no-underline"
                            href="tel:<?= esc_attr(ThemeOptions::phone()) ?>">
                            <?= esc_html(ThemeOptions::phone()) ?>
                        </a><br>
                        <strong>Email:</strong> <a class="!no-underline"
                            href="mailto:<?= esc_attr(ThemeOptions::email()) ?>">
                            <?= esc_html(ThemeOptions::email()) ?>
                        </a>
                    </p>
                    <div class="flex flex-col mt-6 gap-2">
                        <p>Siguenos en Nuestras Redes:</p>
                        <div class="flex gap-2">

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
        <div class=" text-ms items-center flex text-white  justify-center w-full my-4">
            &copy; <?php echo esc_html(date_i18n('Y')); ?> - <?php bloginfo('name'); ?>
        </div>
    </div>
</footer>
</div>

</body>

</html>