<?php

$debug_tags = array();
add_action('all', function ($tag) {
    global $debug_tags;
    if (in_array($tag, $debug_tags)) {
        return;
    }
    echo "<pre>" . $tag . "</pre>";
    $debug_tags[] = $tag;
});

add_action('woocommerce_blocks_payment_method_type_registration', 'test_hook');

function test_hook()
{
    echo "<h1>" . current_action() . "</h1>";
}
