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
                $image_id = get_field("actor_photo");
                $image_src = wp_get_attachment_image_src($image_id, "actor_photo");
                $image_alt = get_post_meta($image_id, "_wp_attachment_image_alt", true);
            ?>

            <section class="min-h-100 md:min-h-125 grid py-4">
                <div
                    class="content-wrapper grid items-center sm:grid-cols-[60%_40%] gap-4 bg-no-repeat bg-right bg-contain"
                    style="background-image: url(<?php echo esc_url($image_src[0]); ?>)"
                >
                    <div class="grid justify-items-start gap-4 py-2 bg-primary-bg/80 rounded-lg">
                        <h1><?php echo esc_html(get_field("actor_name")); ?></h1>

                        <div class="flex items-center gap-6 text-sm">
                            <span><?php echo esc_html(get_field("date_of_birth")); ?></span>
                            <span><?php echo esc_html(get_field("actor_country")); ?></span>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-10 bg-primary-bg-alt">
                <div class="content-wrapper">
                    <h2 class="mb-4">Biography</h2>
                    <p class="text-sm sm:text-base"><?php echo esc_html(get_field("actor_desc")); ?></p>
                </div>
            </section>

            <section class="py-10">
                <div class="content-wrapper">
                    <h2 class="mb-4">Filmography</h2>
                    
                    <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-6">
                        <?php
                            $query = new WP_Query([
                                "post_type" => "cinemahub_movie",
                                "posts_per_page" => -1,
                                "orderby" => "meta_value",
                                "meta_key" => "movie_release_year",
                                "meta_query" => [
                                    [
                                        "key" => "movie_actors", // Имя поля в ACF
                                        "value" => '"' . get_the_ID() . '"',
                                        "compare" => "LIKE"
                                    ]
                                ]
                            ]);
                        ?>

                        <?php if($query->have_posts()): ?>
                            <?php while($query->have_posts()): $query->the_post(); ?>

                                <?php get_template_part("template-parts/movie-item") ?>

                            <?php endwhile; wp_reset_postdata(); ?>
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