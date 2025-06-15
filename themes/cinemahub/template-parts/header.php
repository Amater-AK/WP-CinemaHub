<?php get_template_part("template-parts/svg-sprite") ?>

<header class="relative py-4 bg-primary-bg border-b border-border-color overflow-x-clip">
    <div class="content-wrapper">
        <nav class="relative z-500">
            <div class="flex justify-between items-center gap-4">
                <div class="font-heading text-2xl font-semibold text-accents-color">
                    <?php get_template_part("template-parts/logo") ?>
                </div>

                <div class="hidden md:block" data-search-block>
                    <?php get_template_part("template-parts/search/search", "form") ?>
                </div>

                <div class="hidden md:block" data-primary-menu>
                    <?php
                        wp_nav_menu([
                            "theme_location" => "header_menu",
                            "container" => false,
                            "menu_class" => "flex items-center gap-6",
                            "fallback_cb" => false,
                            "walker" => new Primary_Walker_Nav_Menu("", "py-1 text-lg hover:text-accents-color active:text-accents-color transition duration-300", "text-accents-color")
                        ]);
                    ?>
                </div>

                <div class="flex items-center gap-4 md:hidden">
                    <button type="button" class="button-square p-1" data-search-btn title="Toggle search" aria-label="Toggle search">
                        <svg class="icon" width="24" height="24" aria-hidden="true">
                            <use href="#icon-search"></use>
                        </svg>
                    </button>

                    <button type="button" class="button-square p-1" data-burger-btn title="Toggle menu" aria-label="Toggle menu">
                        <svg class="icon" width="24" height="24" aria-hidden="true">
                            <use href="#icon-menu"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </nav>
    </div>

    <div class="md:hidden absolute top-full left-0 w-full h-[calc(100svh-100%)] p-8 bg-primary-bg border-t border-border-color z-100 translate-x-full [&.active]:translate-x-0 transition-transform duration-300" data-mobile-menu inert>
        <?php
            wp_nav_menu([
                "theme_location" => "mobile_menu",
                "container" => false,
                "menu_class" => "flex flex-col gap-6",
                "fallback_cb" => false,
                "walker" => new Primary_Walker_Nav_Menu("", "py-1 text-xl hover:text-accents-color active:text-accents-color transition duration-300", "text-accents-color")
            ]);
        ?>
    </div>

    <div class="md:hidden absolute top-full left-0 w-full h-[calc(100svh-100%)] p-8 bg-primary-bg border-t border-border-color z-200 translate-y-[calc(-100svh)] [&.active]:translate-y-0 transition-transform duration-300" data-mobile-search-block inert>
        <?php get_template_part("template-parts/search/search", "form") ?>
    </div>
</header>