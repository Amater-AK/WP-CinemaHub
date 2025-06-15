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

        <?php get_template_part("template-parts/front-page/front-page", "latest") ?>

        <?php get_template_part("template-parts/front-page/front-page", "genres") ?>
        
    </main>

    <?php get_template_part("template-parts/footer") ?>

    <?php wp_footer(); ?>
</body>
</html>