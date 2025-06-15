<?php

class Primary_Walker_Nav_Menu extends Walker_Nav_Menu {
    protected $item_classes;
    protected $link_classes;
    protected $current_classes;

    public function __construct(string $item_classes, string $link_classes, string $current_classes) {
        $this->item_classes = $item_classes ?? "";
        $this->link_classes = $link_classes ?? "";
        $this->current_classes = $current_classes ?? "";
    }

    public function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0) {
        $template_str = "<li class='%s'><a class='%s %s' href='%s'>%s</a></li>";
        $output .= sprintf(
            $template_str,
            esc_attr($this->item_classes),
            esc_attr($this->link_classes),
            esc_attr($data_object->current ? $this->current_classes : ""),
            esc_url($data_object->url),
            esc_html($data_object->title)
        );
    }
}