<?php
/** Change keywords to links */ 

function link_words($text)
{
    $replace = [
        'seo' => '<a href="https://itzen.hu/keresooptimalizalas-elmelete/">Keresőoptimalizálás</a>',
        'keresőoptimalizálás' => '<a href="https://itzen.hu/keresooptimalizalas-elmelete/">Keresőoptimalizálás</a>',

    ];

    $text = str_replace(array_keys($replace), $replace, $text);
    return $text;
}
add_filter('the_content', 'link_words');
add_filter('the_excerpt', 'link_words');
