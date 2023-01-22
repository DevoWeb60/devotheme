<?php

// add_action('devotheme_import_content', function () {
//     touch(__DIR__ . '/demo-' . time());
// });

// if ($timestamp = wp_next_scheduled('devotheme_import_content')) {
//     wp_unschedule_event($timestamp, 'devotheme_import_content');
// }
// echo '<pre>';
// print_r(_get_cron_array());
// echo '</pre>';
// die();

// add_filter('cron_schedules', function ($schedules) {
//     $schedules['ten_seconds'] = [
//         'interval' => 10,
//         'display' => __('Toutes les 10 secondes', 'devotheme')
//     ];
//     return $schedules;
// });

// if (!wp_next_scheduled('devotheme_import_content')) {
//     wp_schedule_event(time(), 'ten_seconds', 'devotheme_import_content');
// }
