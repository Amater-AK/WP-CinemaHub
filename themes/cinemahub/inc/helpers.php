<?php

function format_movie_duration(int $duration): string {
    $format = "%sh %sm";

    $h = (string)floor($duration / 60);
    $m = (string)$duration % 60;
    $m = str_pad($m, 2, "0", STR_PAD_LEFT);

    return sprintf($format, $h, $m);
}

// function format_pagination(string $plain_links, array $args): string {
//     $defaults = [
//         "nav" => "",
//         "page-numbers" => "",
//         "next" => "",
//         "prev" => "",
//         "current" => "",
//     ];

//     $end_args = array_merge($defaults, $args);
//     $output = $plain_links;

//     foreach($end_args as $key => $value) {
//         $output = str_replace($key, $value, $output);
//     }

//     return "<nav class='" . $end_args["nav"] . "'>" .$output . "</nav>";
// }

function create_pagination(array|null $links, array $args): string {
    if(!$links) { return ""; }

    $defaults = [
        "nav" => "",
        "link" => "",
        "current" => "",
    ];

    $classes = array_merge($defaults, $args);
    $output = "";

    foreach($links as $link) {
        if(strpos($link, "current") !== false) {
            $output .= str_replace("page-numbers", $classes["current"], $link);

            continue;
        }

        $output .= str_replace("page-numbers", $classes["link"], $link);
    }

    return "<nav class='" . $classes["nav"] . "'>" .$output . "</nav>";;
}