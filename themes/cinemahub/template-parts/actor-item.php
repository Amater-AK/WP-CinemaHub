<article>
    <?php
        $image_id = get_field("actor_photo");
        $image_src = wp_get_attachment_image_src($image_id, "actor_photo");
        $image_alt = get_post_meta($image_id, "_wp_attachment_image_alt", true);
    ?>

    <a class="flex flex-col items-center gap-2 hover:underline active:underline" href="<?php echo esc_url(get_permalink()); ?>">
        <img
            class="size-26 object-cover rounded-full overflow-hidden"
            src="<?php echo esc_url($image_src[0]); ?>"
            alt="<?php echo esc_attr($image_alt); ?>"
            loading="lazy"
        >

        <p class="text-accents-color text-wrap text-center"><?php echo esc_html(get_field("actor_name")); ?></p>
    </a>
</article>