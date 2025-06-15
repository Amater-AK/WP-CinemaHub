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
        <section class="py-6">
            <div class="content-wrapper">
                <h1 class="mb-4">Resource not found</h1>
                <p>
                    <a class="underline" href="<?php echo esc_url(home_url("/")) ?>">Return to home page</a>
                </p>
            </div>
        </section>
    </main>

    <?php get_template_part("template-parts/footer") ?>

    <?php wp_footer(); ?>
</body>
</html>