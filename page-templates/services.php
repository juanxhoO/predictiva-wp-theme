<?php
/*
Template Name: Services Page
*/

get_header();

?>

<?php while (have_posts()):
    the_post(); ?>

    <section class="container mx-auto py-20">
        <div class="mb-10">
            <?php the_content(); ?>
        </div>

        <?php

        $page_slug = get_post_field('post_name', get_post());

        $query_args = [
            'post_type' => 'service',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ];

        // If a category exists with the same slug as this Page, filter by it automatically!
        if (term_exists($page_slug, 'service_category')) {
            $query_args['tax_query'] = [
                [
                    'taxonomy' => 'service_category',
                    'field'    => 'slug',
                    'terms'    => $page_slug,
                ],
            ];
        }

        $services = new WP_Query($query_args);

        if ($services->have_posts()):

            ?>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <?php while ($services->have_posts()):
                    $services->the_post(); ?>

                    <?php
                    get_template_part(
                        'template-parts/components/service-card',
                        null,
                        [
                            'title' => get_the_title(),
                            'description' => get_field('short_description'),
                            'image' => get_the_post_thumbnail_url(),
                            'link' => get_permalink(),
                        ]
                    );
                    ?>

                <?php endwhile; ?>

            </div>

            <?php

            wp_reset_postdata();

        endif;

        ?>

    </section>

<?php endwhile; ?>

<?php get_footer(); ?>