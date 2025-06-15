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
        <?php get_template_part("template-parts/page/page", "info") ?>

        <section class="py-10">
            <div class="content-wrapper">
                <h2 class="sr-only">All actors</h2>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <?php
                        $paged = get_query_var("paged") ?: 1;
                        $query = new WP_Query([
                            "post_type" => "cinemahub_actor",
                            "posts_per_page" => 12,
                            "paged" => $paged,
                            "orderby" => "title",
                            "order" => "ASC",
                        ]);
                    ?>
                    <?php if($query->have_posts()): ?>
                        <?php while($query->have_posts()): $query->the_post(); ?>

                            <?php get_template_part("template-parts/actor-item") ?>

                        <?php endwhile; wp_reset_postdata(); ?>
                    <?php else: ?>
                        <p>No actors yet.</p>
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