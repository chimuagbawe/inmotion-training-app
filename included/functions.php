<?php
// Function to format elapsed time
function formatElapsedTime($seconds) {
    $interval = floor($seconds / 60);

    if ($interval < 2) {
        return 'Just now';
    } elseif ($interval < 60) {
        return $interval . ' minutes ago';
    } elseif ($interval < 1440) {
        $hours = floor($interval / 60);
        return $hours . ' ' . ($hours > 1 ? 'hours' : 'hour') . ' ago';
    } elseif ($interval < 10080) {
        $days = floor($interval / 1440);
        return $days . ' ' . ($days > 1 ? 'days' : 'day') . ' ago';
    } elseif ($interval < 40320) {
        $weeks = floor($interval / 10080);
        return $weeks . ' ' . ($weeks > 1 ? 'weeks' : 'week') . ' ago';
    } elseif ($interval < 525600) {
        $months = floor($interval / 40320);
        return $months . ' ' . ($months > 1 ? 'months' : 'month') . ' ago';
    } else {
        $years = floor($interval / 525600);
        return $years . ' ' . ($years > 1 ? 'years' : 'year') . ' ago';
    }
}
?>