<?php

/*
	Plugin Name: Register CinemaHub Taxonomy and Post Types
*/

if(!defined("ABSPATH")) {
	exit;
}

function cinemahub_register_genre_taxonomy() {
	$labels = [
		"name" => "Genres",
		"singular_name" => "Genre",
		"add_new" => "Add Genre",
		"add_new_item" => "Add new Genre",
		"edit_item" => "Edit Genre",
		"new_item" => "New Genre",
		"view_item" => "View Genre",
		"search_items" => "Search Genre",
		"not_found" => "Genre not found",
		"parent_item" => "Parent Genre",
		"parent_item_colon" => "Parent Genre:",
		"update_item" => "Update Genre",
	];
	$args = [
		"labels" => $labels,
		"public" => true,
		"has_archive" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rewrite" => [
			"slug" => "genre",
			"with_front" => false,
		],
	];

	register_taxonomy("cinemahub_genre", ["cinemahub_movie"], $args);
}

function cinemahub_register_movie_post_type() {
	$labels = [
		"name" => "Movies",
		"singular_name" => "Movie",
		"add_new" => "Add movie",
		"add_new_item" => "Add new movie",
		"edit_item" => "Edit movie",
		"new_item" => "New movie",
		"view_item" => "View movie",
		"search_items" => "Search movie",
		"not_found" => "Movie not found",
	];
	$args = [
		"labels" => $labels,
		"public" => true,
		"has_archive" => false,
		"menu_icon" => "dashicons-editor-video",
		"supports" => ["title", "thumbnail", "custom-fields"],
		// Если не используется архив, а создаётся отдельная страница movies со своим запросом
		// (ведёт себя как архив, т.к. нужно чтобы она имена свой title и thumbnail),
		// то из-за изменения slug на movies WordPress резервирует URL /movies/ как архив,
		// что ведёт к проблемам, например с пагинацией.
		"rewrite" => ["slug" => "movie"],
		"show_in_rest" => true,
	];
	
	register_post_type("cinemahub_movie", $args);
}

function cinemahub_register_actor_post_type() {
	$labels = [
		"name" => "Actors",
		"singular_name" => "Actor",
		"add_new" => "Add actor",
		"add_new_item" => "Add new actor",
		"edit_item" => "Edit actor",
		"new_item" => "New actor",
		"view_item" => "View actor",
		"search_items" => "Search actor",
		"not_found" => "Actor not found",
	];
	$args = [
		"labels" => $labels,
		"public" => true,
		"has_archive" => false,
		"menu_icon" => "dashicons-groups",
		"supports" => ["title", "thumbnail", "custom-fields"],
		"rewrite" => ["slug" => "actor"],
		"show_in_rest" => true,
	];
	
	register_post_type("cinemahub_actor", $args);
}

add_action("init", "cinemahub_register_genre_taxonomy");
add_action("init", "cinemahub_register_movie_post_type");
add_action("init", "cinemahub_register_actor_post_type");