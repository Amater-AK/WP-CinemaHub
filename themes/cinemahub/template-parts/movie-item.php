<article class="bg-secondary-bg hover:bg-accents-color/20 border border-transparent hover:border-accents-color active:bg-accents-color/20 active:border-accents-color rounded-lg overflow-hidden duration-300">
    <?php
        $image_id = get_field("movie_poster");
        $image_src = wp_get_attachment_image_src($image_id, "movie_poster");
        $image_alt = get_post_meta($image_id, "_wp_attachment_image_alt", true);

        // $genres = get_field("movie_genres");
        $genres = wp_get_post_terms(get_the_ID(), "cinemahub_genre");
    ?>
    <a class="block" href="<?php echo esc_attr(get_permalink()); ?>">
        <div class="relative h-0 pb-[150%] rounded-md overflow-hidden">
            <img
                class="absolute top-0 left-0 w-full h-full object-cover"
                src="<?php echo esc_url($image_src[0]); ?>"
                alt="<?php echo esc_attr($image_alt); ?>"
                loading="lazy"
            >
        </div>
        <div class="p-2">
            <h3
                class="text-base whitespace-nowrap text-ellipsis overflow-hidden"
                title="<?php echo esc_html(get_field("movie_title")); ?>"
            >
                <?php echo esc_html(get_field("movie_title")); ?>
            </h3>
            <div class="flex justify-between items-center gap-2 text-sm">
                <span><?php echo esc_html(get_field("movie_release_year")); ?></span>
                <span><?php echo esc_html(format_movie_duration(get_field("movie_duration"))); ?></span>
            </div>
            <div>
                <?php if($genres && !is_wp_error($genres)): ?>
                    <?php foreach($genres as $genre): ?>
                        <span class="text-xs"><?php echo esc_html($genre->name); ?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </a>
</article>