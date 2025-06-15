<?php
    global $pagi_total;
    global $pagi_current;

    $links = paginate_links([
        "total" => $pagi_total ?? 1,
        "current" => $pagi_current ?? 1,
        "type" => "array",
    ]);
    $args = [
        "nav" => "flex items-center gap-2 mt-4",
        "link" => "flex justify-center items-center px-4 py-2 text-secondary-text bg-secondary-bg border border-border-color rounded-lg hover:bg-accents-color/20 hover:border-accents-color active:bg-accents-color/20 active:border-accents-color duration-300",
        "current" => "flex justify-center items-center px-4 py-2 text-primary-bg bg-accents-color border border-accents-color rounded-lg",
    ];

    echo create_pagination($links, $args);
?>