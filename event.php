<?php
session_start();
include("Database/connection.php");

// Fetch all events
$sql = "SELECT * FROM events ORDER BY created_at DESC";
$result = mysqli_query($con, $sql);

if ($result) {
    $events = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // Handle the case where the query fails
    die('Query failed: ' . mysqli_error($con));
}

// Free the result set
mysqli_free_result($result);

include 'included/functions.php';

// Counter variable to determine the style
$counter = 0;

// Iterate through events
include('included/header.php');

?>


<div class="intro_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="intro_text">
                    <h1>Event Page</h1>
                    <div class="pages_links">
                        <a href="index.php" title="">Home</a>
                        <a href="#" title="" class="active">Event Page</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</header> <!-- End header -->
<?php include('included/signUp.php') ?>
<section class="events-area">
    <div class="container">
        <div class="row">
            <?php if (isset($events) && is_array($events)) { $perPage = 5; // Number of courses per page
                $totalCourses = count($events); // Total number of courses
                $totalPages = ceil($totalCourses / $perPage); // Calculate total pages
                
                // Get current page or set it to 1 if not provided
                $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                
                // Calculate the starting index for courses on the current page
                $startIndex = ($page - 1) * $perPage;
                
                // Get courses for the current page
                $currentEvents = array_slice($events, $startIndex, $perPage); }foreach ($currentEvents as $event) {
    // Determine the position based on the counter
    $positionClass = ($counter % 2 == 0) ? 'events_single' : 'events_single events_single_left';

    // Display event information with the determined position
    echo '<div class="col-sm-12 events_full_box">';
    echo '<div class="' . $positionClass . '">';
    
    // Toggle the position of the image div
    if ($counter % 2 == 0) {
        echo '<div class="event_banner">';
        echo '<a href="event-details.php?id=' . $event['id'] . '"><img src="' . htmlspecialchars($event['image']) . '" alt="" class="img-fluid" style="min-height: 310px;"></a>';
        echo '</div>';
    }

    echo '<div class="event_info">';
    echo '<h3><a href="event-details.php?id=' . $event['id'] . '" title="">' . htmlspecialchars($event['title']) . '</a></h3>';
    echo '<div class="events_time">';
    echo '<span class="time"><i class="far fa-clock"></i>' . htmlspecialchars($event['time']) . '</span>';
    echo '<span><i class="fas fa-map-marker-alt"></i>KM 46 Along East West Road</span>';
    echo '</div>';
    $originalString = htmlspecialchars($event['eventDescription']);

    // Split the string into an array of words
    $wordsArray = explode(' ', $originalString);
    
    // Extract the first three words
    $firstThreeWords = array_slice($wordsArray, 0, 30);
    
    // Join the words back into a string
    $resultString = implode(' ', $firstThreeWords);
    
    echo '<p>' . $resultString . '</p>';
    echo '<div class="event_dete">';
    echo '<span class="date">' . date('d', strtotime($event['date'])) . '</span>';
    echo '<span>' . date('M', strtotime($event['date'])) . '</span>';
    echo '</div>';
    echo '</div>';

    // Toggle the position of the image div
    if ($counter % 2 != 0) {
        echo '<div class="event_banner">';
        echo '<a href="event-details.php?id=' . $event['id'] . '"><img src="' . htmlspecialchars($event['image']) . '" alt="" class="img-fluid"></a>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';

    // Increment the counter for the next iteration
    $counter++;
} ?>
            <?php
include('included\pagination.php');
        ?>
        </div>
    </div>
</section><!-- ./ End Events Area section -->



<!-- Footer -->
<?php
include('included/footer.php');
?>