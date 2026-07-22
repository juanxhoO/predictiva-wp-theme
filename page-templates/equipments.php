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

        <div class="container mx-auto px-6">

            <div class="mb-12 text-center">

                <span class="text-brand-red text-3xl uppercase tracking-widest font-semibold">
                    Catálogo
                </span>

                <h2 class="mt-3 text-4xl font-bold text-slate-900">
                    Nuestros Equipos
                </h2>

                <p class="mt-4 max-w-3xl mx-auto text-gray-600">
                    Descubra nuestra selección de equipos para mantenimiento predictivo,
                    monitoreo de condición e inspección industrial.
                </p>

            </div>

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

    <!-- CTA -->
    <section class="bg-slate-900 text-white py-20">

        <div class="container mx-auto px-6">

            <div class="rounded-2xl bg-brand-red p-12 text-center">

                <h2 class="text-4xl font-bold">
                    ¿Necesita asesoría para elegir el equipo adecuado?
                </h2>

                <p class="mt-4 max-w-2xl mx-auto text-lg">
                    Nuestro equipo le ayudará a seleccionar la mejor solución
                    para sus necesidades de mantenimiento predictivo.
                </p>

                <a href="/contactanos"
                    class="inline-flex mt-8 rounded-lg bg-white px-8 py-4 font-semibold text-brand-red transition hover:shadow-xl hover:-translate-y-1">
                    Solicitar Asesoría
                </a>

            </div>

        </div>

    </section>

<?php endwhile; ?>

<?php get_footer(); ?>