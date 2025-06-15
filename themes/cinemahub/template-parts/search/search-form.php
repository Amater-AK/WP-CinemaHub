<form
    class="min-w-60 flex items-center ps-4 pe-3 py-1 bg-primary-bg-alt rounded-lg focus-within:outline-1 focus-within:outline-accents-color"
    action="<?php echo esc_url(home_url("/")); ?>"
    method="GET"
>
    <input type="search" class="flex-1 outline-none" name="s" value="<?php echo trim(get_search_query()); ?>" placeholder="Search..." required>
    <button type="submit" class="p-1 hover:bg-accents-color/20 active:bg-accents-color/20 cursor-pointer rounded-lg">
        <svg class="icon size-6" width="24" height="24" aria-hidden="true">
            <use href="#icon-search"></use>
        </svg>
        <span class="sr-only">Search</span>
    </button>
</form>