<?php
  // Display pagination only if there are more than $perPage courses
  if ($totalCourses > $perPage) {
    echo '<div class="pagination_blog">';
    echo '<ul>';
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="?page=' . $i . '"><li';
        if ($i == $page) {
            echo ' class="current color"';
        }else{
            echo ' class="color2"';
        }
        echo '>' . $i . '</li></a>';
    }
    echo '</ul>';
    echo '</div>';
}
?>