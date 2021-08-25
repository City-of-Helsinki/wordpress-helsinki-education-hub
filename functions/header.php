<?php

/** Override polylang settings */
function helsinki_available_languages() {
    if ( class_exists('Polylang') ) {
        return pll_the_languages(array(
            'echo'                   => 0,
            'hide_if_empty'          => 1,
            'hide_current'           => 0,
            'display_names_as'       => 'slug',
            'hide_if_no_translation' => 0,
            'raw'                    => true
        ));
    } else {
        return array();
    }
}