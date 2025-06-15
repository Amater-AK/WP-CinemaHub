<section class="py-10">
    <div class="content-wrapper">
        <header class="mb-4">
            <h2>Browse by Genre</h2>
        </header>
        <ul class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-[repeat(auto-fit,_minmax(0,_1fr))] gap-4">
            <?php
                $genres = get_terms([
                    "taxonomy" => "cinemahub_genre",
                    "hide_empty" => false,
                ]);
            ?>
            <?php if($genres && !is_wp_error($genres)): ?>
                <?php foreach($genres as $genre): ?>

                    <li>
                        <a class="flex justify-center items-center p-4 text-secondary-text bg-secondary-bg border border-border-color rounded-lg hover:bg-accents-color/20 hover:border-accents-color active:bg-accents-color/20 active:border-accents-color duration-300" href="<?php echo esc_url(get_term_link($genre)); ?>">
                            <?php echo esc_html($genre->name); ?>
                        </a>
                    </li>
                        

                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
</section>