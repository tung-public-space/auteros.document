<?php

$searchlabel = apply_filters( 'hoot_search_form_label', __( 'Search', 'creattica' ) );
$searchplaceholder = apply_filters( 'hoot_search_form_placeholder', __( 'Type Search Term &hellip;', 'creattica' ) );
$searchsubmit = apply_filters( 'hoot_search_form_submit', __( 'Search', 'creattica' ) );
$searchquery = get_search_query();

echo '<div class="searchbody">';

	echo '<form method="get" class="searchform" action="' . esc_url( home_url( '/' ) ) . '" >';

		echo '<label for="s" class="screen-reader-text">' . esc_html( $searchlabel ) . '</label>';
		echo '<i class="fas fa-search"></i>';
		echo '<input type="text" class="searchtext" name="s" placeholder="' . esc_attr( $searchplaceholder ) . '" value="' . esc_attr( $searchquery ) . '" />';
		echo '<input type="submit" class="submit forcehide" name="submit" value="' . esc_attr( $searchsubmit ) . '" />';

	echo '</form>';

echo '</div><!-- /searchbody -->';