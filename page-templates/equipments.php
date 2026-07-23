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
            ]);

            // Sort the posts so that items with order >= 1 show up first,
            // and items with order 0 (or empty) are pushed to the very bottom.
            usort($equipments->posts, function ($a, $b) {
                $val_a = (int) get_post_meta($a->ID, 'order', true);
                $val_b = (int) get_post_meta($b->ID, 'order', true);

                // If one is 0 and the other isn't, the one that is NOT 0 comes first
                if ($val_a === 0 && $val_b !== 0)
                    return 1;
                if ($val_b === 0 && $val_a !== 0)
                    return -1;

                // If both are > 0, or both are 0, sort in ascending order
                if ($val_a === $val_b)
                    return 0;
                return ($val_a < $val_b) ? -1 : 1;
            });


            if ($equipments->have_posts()):
                ?>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">

                    <?php while ($equipments->have_posts()):

                        $equipments->the_post();

                        if (!get_field('show_home')) {
                            continue;
                        }

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