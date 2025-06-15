<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo("charset") ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class("footer-at-bottom"); ?>>
    <?php get_template_part("template-parts/header") ?>

    <main>
        <?php if(have_posts()): the_post(); ?>
            <?php
                $image_id = get_field("movie_poster");
                $image_src = wp_get_attachment_image_src($image_id, "movie_poster");
                $image_alt = get_post_meta($image_id, "_wp_attachment_image_alt", true);

                $genres = wp_get_post_terms(get_the_ID(), "cinemahub_genre");
            ?>

            <section class="min-h-100 md:min-h-125 grid py-4">
                <div
                    class="content-wrapper grid items-center sm:grid-cols-[60%_40%] gap-4 bg-no-repeat bg-right bg-contain"
                    style="background-image: url(<?php echo esc_url($image_src[0]); ?>)"
                >
                    <div class="grid justify-items-start gap-4 py-2 bg-primary-bg/80 rounded-lg">
                        <h1><?php echo esc_html(get_field("movie_title")); ?></h1>

                        <div class="flex items-center gap-6 text-sm">
                            <span><?php echo esc_html(get_field("movie_release_year")); ?></span>
                            <span><?php echo esc_html(format_movie_duration(get_field("movie_duration"))); ?></span>
                        </div>

                        <div>
                            <?php if($genres && !is_wp_error($genres)): ?>
                                <?php foreach($genres as $genre): ?>
                                    <span class="px-2 py-1 text-xs text-accents-color bg-accents-color/20 rounded-full"><?php echo esc_html($genre->name); ?></span>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <p class="text-sm sm:text-base"><?php echo esc_html(get_field("movie_desc")); ?></p>
                    </div>
                </div>
            </section>

            <section class="py-10 bg-primary-bg-alt">
                <div class="content-wrapper">
                    <h2 class="mb-4">Summary</h2>
                    <p class="text-sm sm:text-base"><?php echo esc_html(get_field("movie_summary")); ?></p>
                </div>
            </section>

            <section class="py-10">
                <div class="content-wrapper">
                    <h2 class="mb-4">Official Trailer</h2>
                    
                    <div class="m-auto md:max-w-4xl">
                        <div class="embeded-video bg-secondary-bg">
                            <?php //the_field("movie_trailer"); ?>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-10 bg-primary-bg-alt">
                <div class="content-wrapper">
                    <h2 class="mb-4">Cast</h2>
                    
                    <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-6">
                        <?php
                            $actors = get_field("movie_actors");
                        ?>

                        <?php if($actors): ?>
                            <?php foreach($actors as $actor): $post = $actor; setup_postdata($actor); ?>

                                <?php get_template_part("template-parts/actor-item") ?>

                            <?php endforeach; wp_reset_postdata(); ?>

                            <!-- Можно вывести иначе -->
                            <!-- foreach ($actors as $actor) {
                                $fields = get_fields($actor->ID);
                                echo '<h3>' . get_the_title($actor->ID) . '</h3>';
                                echo '<p>' . esc_html($fields['birth_date']) . '</p>';
                            } -->
                        <?php else: ?>
                            <p>No actors yet.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

        <?php endif; ?>
    </main>

    <?php get_template_part("template-parts/footer") ?>

    <?php wp_footer(); ?>
</body>
</html>