<?php
/**
 * The template for displaying all single equipments
 */

get_header(); ?>

<?php while (have_posts()):
    the_post();
    $description = get_field('short_description'); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php
        // Fetch the ACF banner field if it exists
        $banner = get_field('banner');
        ?>
        <div class="bg-opacity-50 flex items-center justify-center">
            <h1 class="text-red-600 text-2xl md:text-3xl font-bold text-center px-4 drop-shadow-md">
                <?php the_title(); ?>
            </h1>
        </div>
        <section class="container mx-auto py-12 px-4 md:px-0">
            <div class="w-full">
                <?php echo $description; ?>
            </div>
        </section>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>