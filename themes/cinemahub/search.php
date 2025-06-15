<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo("charset") ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class("footer-at-bottom"); ?>>
    <?php get_template_part("template-parts/header"); ?>

    <main>
        <section class="py-8">
            <div class="content-wrapper">
                <h1 class="text-2xl">Search Results</h1>
                <p>
                    Found
                    <span class="text-accents-color">
                        <?php echo esc_html($wp_query->found_posts); ?>
                        entities
                    </span>
                    for
                    "<span class="text-accents-color"><?php echo trim(get_search_query()); ?></span>"
                </p>
            </div>
        </section>

        <section class="py-8">
            <div class="content-wrapper">
                <?php
                    $grouped_posts = [];
                    foreach($wp_query->posts as $post) {
                        $grouped_posts[$post->post_type][] = $post;
                    }
                ?>
                <?php if(!empty($grouped_posts)): ?>
                    
                    <?php if(!empty($grouped_posts["cinemahub_movie"])): ?>
                        <section class="mb-4">
                            <h2 class="mb-4">Movies</h2>
                            <ul class="grid gap-2">

                                <?php foreach($grouped_posts["cinemahub_movie"] as $post): setup_postdata($post); ?>
                                    <li>
                                        <?php get_template_part("template-parts/search/search", "movie-item"); ?>
                                    </li>
                                <?php endforeach; ?>

                            </ul>
                        </section>
                    <?php endif; ?>

                    <?php if(!empty($grouped_posts["cinemahub_actor"])): ?>
                        <section>
                            <h2 class="mb-4">Actors</h2>
                            <ul class="grid gap-2">

                                <?php foreach($grouped_posts["cinemahub_actor"] as $post): setup_postdata($post); ?>
                                    <li>
                                        <?php get_template_part("template-parts/search/search", "actor-item"); ?>
                                    </li>
                                <?php endforeach; ?>

                            </ul>
                        </section>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>

                <?php else: ?>
                    <p>Nothing was found.</p>
                <?php endif; ?>
            </div>
        </section>
        
    </main>

    <?php get_template_part("template-parts/footer"); ?>

    <?php wp_footer(); ?>
</body>
</html>