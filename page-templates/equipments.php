<?php
/*
Template Name: Equipments Page
*/

get_header();

while (have_posts()):
    the_post();
    ?>

    <section class="container mx-auto py-20">

        <?php

        $equipments = new WP_Query([
            'post_type' => 'equipment',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ]);

        if ($equipments->have_posts()): ?>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <?php while ($equipments->have_posts()):
                    $equipments->the_post(); ?>

                    <?php
                    get_template_part(
                        'template-parts/components/equipment-card',
                        null,
                        [
                            'title' => get_the_title(),
                            'description' => get_field('short_description'),
                            'image' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
                            'link' => get_field('link')
                                ? get_field('link')
                                : get_permalink(),
                            'target' => get_field('link') ? '_blank' : '_self',
                        ]
                    );
                    ?>

                <?php endwhile; ?>

            </div>

            <?php wp_reset_postdata(); ?>

        <?php endif; ?>

    </section>

<?php endwhile; ?>

<?php get_footer(); ?>