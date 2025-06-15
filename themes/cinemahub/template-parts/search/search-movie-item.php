<article class="p-2 bg-secondary-bg rounded-lg border border-transparent hover:bg-accents-color/20 active:bg-accents-color/20 hover:border-accents-color active:border-accents-color">
    <?php
        $image_id = get_field("movie_poster");
        $image_src = wp_get_attachment_image_src($image_id, "movie_poster");
        $image_alt = get_post_meta($image_id, "_wp_attachment_image_alt", true);
    ?>
    <a class="flex gap-4" href="<?php echo esc_url(get_permalink()); ?>">
        <div class="basis-20 flex items-center">
            <img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>">
        </div>
        <div class="flex-1 flex flex-col justify-between gap-2 py-4">
            <h3><?php echo esc_html(get_field("movie_title")); ?></h3>
            <p class="text-sm"><?php echo esc_html(get_field("movie_release_year")); ?></p>
        </div>
    </a>
</article>