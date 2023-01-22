<?php
/* 
Plugin Name: Devo Plugin
*/

register_activation_hook(__FILE__, function () {
    touch(__DIR__ . '/demo');
});


register_deactivation_hook(__FILE__, function () {
    unlink(__DIR__ . '/demo');
});
