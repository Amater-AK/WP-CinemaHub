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

        <section class="py-8">
            <div class="content-wrapper">
                <h1 class="text-2xl">In the genre of <span class="text-accents-color"><?php echo esc_html(get_queried_object()->name); ?></span></h1>
            </div>
        </section>

        <section class="py-10">
            <div class="content-wrapper">
                <h2 class="sr-only">Movies in this genre</h2>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <?php
                        $term = get_queried_object();
                        $paged = get_query_var("paged") ?: 1;
                        $query = new WP_Query([
                            "post_type" => "cinemahub_movie",
                            "posts_per_page" => 12,
                            "paged" => $paged,
                            "orderby" => "title",
                            "order" => "ASC",
                            // Если бы использовал таксономию по-умолчанию, а
                            // не как поле ACF.
                            "tax_query" => [
                                [
                                    "taxonomy" => "cinemahub_genre",
                                    "field"    => "term_id",
                                    "terms"    => $term->term_id,
                                ]
                            ]
                            // "meta_query" => [
                            //     [
                            //         "key" => "movie_genres", // Имя поля в ACF
                            //         "value" => '"' . $term->term_id . '"',
                            //         "compare" => "LIKE"
                            //     ]
                            // ]
                        ]);
                    ?>
                    <?php if($query->have_posts()): ?>
                        <?php while($query->have_posts()): $query->the_post(); ?>

                            <?php get_template_part("template-parts/movie-item") ?>

                        <?php endwhile; wp_reset_postdata(); ?>
                    <?php else: ?>
                        <p>There are no films in this genre.</p>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <?php
                    $pagi_total = $query->max_num_pages;
                    $pagi_current = $paged;

                    get_template_part("template-parts/pagination");
                ?>
            </div>
        </section>
        
    </main>

    <?php get_template_part("template-parts/footer") ?>

    <?php wp_footer(); ?>
</body>
</html>