<section
    class="relative min-h-100 md:min-h-125 grid bg-center bg-no-repeat bg-cover before:absolute before:inset-0 before:bg-primary-bg/80"
    style="background-image: url(<?php if(has_post_thumbnail()): echo esc_url(get_the_post_thumbnail_url(get_the_ID(), "page_thumbnail")); endif; ?>)"
>
    <div class="content-wrapper relative grid items-center md:grid-cols-[40%_60%]">
        <div class="grid justify-items-start gap-6">
            <?php if(have_posts()): the_post(); ?>
                <h1 class=""><?php echo do_shortcode(esc_html(get_field("page_title"))); ?></h1>
                <p><?php echo esc_html(get_field("page_desc")); ?></p>

                <?php if(is_page("front-page")): ?>
                    <a
                        class="inline-flex items-center gap-1 px-6 py-2 text-primary-bg bg-accents-color hover:bg-accents-color/70 active:bg-accents-color/70 rounded-lg duration-300" href="<?php echo esc_url(home_url("movies")); ?>"
                    >
                        <svg class="icon w-6 h-6" width="24" height="24" aria-hidden="true">
                            <use href="#icon-play"></use>
                        </svg>
                        Browse Now
                    </a>
                <?php elseif(is_page("movies")): ?>
                    <p class="flex items-center gap-2">
                        <span class="flex items-center gap-1 text-accents-color">
                            <svg class="icon w-5 h-5" width="24" height="24" aria-hidden="true">
                                <use href="#icon-film"></use>
                            </svg>
                            <?php echo esc_html(wp_count_posts("cinemahub_movie")->publish); ?>
                        </span>
                        Movies
                    </p>
                <?php elseif(is_page("actors")): ?>
                    <p class="flex items-center gap-2">
                        <span class="flex items-center gap-1 text-accents-color">
                            <svg class="icon w-5 h-5" width="24" height="24" aria-hidden="true">
                                <use href="#icon-group"></use>
                            </svg>
                            <?php echo esc_html(wp_count_posts("cinemahub_actor")->publish); ?>
                        </span>
                        Actors
                    </p>
                <?php endif; ?>

            <?php endif; ?>
        </div>
    </div>
</section>