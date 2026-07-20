<?php
/*
Template Name: Services Page
*/

get_header();

?>

<?php while (have_posts()) : the_post(); ?>

<section class="container mx-auto py-20">

    <h1 class="text-5xl font-bold mb-4">
        <?php the_title(); ?>
    </h1>

    <div class="mb-10">
        <?php the_content(); ?>
    </div>

    <?php

    $services = new WP_Query([
        'post_type' => 'service',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
    ]);

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