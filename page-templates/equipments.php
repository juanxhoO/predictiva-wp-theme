<?php
/*
Template Name: Equipments Page
*/

get_header();

while (have_posts()):
    the_post();
    ?>
    <!-- Products -->
    <section class="bg-gray-50 py-10">
        <div class="mb-10">
            <?php the_content(); ?>
        </div>
        <div class="container mx-auto px-6">
            <?php
            $equipments = new WP_Query([
                'post_type' => 'equipment',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            ]);

            if ($equipments->have_posts()):
                ?>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">

                    <?php while ($equipments->have_posts()):

                        $equipments->the_post();

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
                                'target' => get_field('link')
                                    ? '_blank'
                                    : '_self',
                            ]
                        );

                    endwhile; ?>

                </div>

                <?php wp_reset_postdata(); ?>

            <?php endif; ?>

        </div>

    </section>

<?php endwhile; ?>

<?php get_footer(); ?>