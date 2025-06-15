<section class="py-10">
    <div class="content-wrapper">
        <header class="flex justify-between items-center gap-2 mb-4">
            <h2>Latest Releases</h2>
            <a class="text-accents-color hover:underline active:underline" href="<?php echo esc_url(home_url("movies")); ?>">View all</a>
        </header>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            <?php
                $query = new WP_Query([
                    "post_type" => "cinemahub_movie",
                    "posts_per_page" => 6,
                    "orderby" => "post_date"
                ]);
            ?>
            <?php if($query->have_posts()): ?>
                <?php while($query->have_posts()): $query->the_post(); ?>

                    <?php get_template_part("template-parts/movie-item") ?>

                <?php endwhile; wp_reset_postdata(); ?>
            <?php else: ?>
                <p>No releases yet.</p>
            <?php endif; ?>
        </div>
    </div>
</section>