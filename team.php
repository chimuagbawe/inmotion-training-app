<?php
session_start();
include("Database/connection.php");

$sql = "SELECT * FROM teachers ORDER BY created_at DESC";
$result = mysqli_query($con, $sql);

if ($result) {
    // Fetch the first row
    // $course = mysqli_fetch_assoc($result);

    if ($result && mysqli_num_rows($result) > 0) {
      
    } else {
        // Handle the case where no course is found
        $noCourse = "No teacher found"; 
    }

    // Rewind the result set pointer
    mysqli_data_seek($result, 0);

    // Fetch all rows
    $teachers = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result); // Free the result set
} else {
    // Handle the case where the query fails
    echo "Query failed: " . mysqli_error($con);
}
include('included/header.php');

?>

<div class="intro_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="intro_text">
                    <h1>Our Instructors</h1>
                    <div class="pages_links">
                        <a href="index.php" title="">Home</a>
                        <a href="javascript:void()" title="" class="active">Esteemed Instructors Page</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</header> <!-- End header -->
<?php
include('included/signUp.php');
?>
<!--========={ Our Instructiors }========-->
<section class="our_instructors" id="instructors_page">
    <div class="container">
        <div class="row">
            <?php 
                 $perPage = 9; // Number of courses per page
                 $totalCourses = count($teachers); // Total number of courses
                 $totalPages = ceil($totalCourses / $perPage); // Calculate total pages
                 
                 // Get current page or set it to 1 if not provided
                 $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                 
                 // Calculate the starting index for courses on the current page
                 $startIndex = ($page - 1) * $perPage;
                 
                 // Get courses for the current page
                 $currentCourses = array_slice($teachers, $startIndex, $perPage);
                 
                foreach($currentCourses as $teacher){
                    $userId = $teacher['user_id'];
                    $sql1 = "SELECT * FROM users WHERE id = $userId";
$result = mysqli_query($con, $sql1);

if ($result) {
       if ($result && mysqli_num_rows($result) > 0) {
      
    } else {
        $noCourse = "No teacher found"; 
    }
    mysqli_data_seek($result, 0);    
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result); 

} else {
    // Handle the case where the query fails
    echo "Query failed: " . mysqli_error($con);
}?> <div class="single-wrappe col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="team-single-item">
                    <figure>
                        <div class="member-img">
                            <div class="teachars_pro">
                                <img src=<?php if($teacher){echo $teacher['Image'];}?> alt="member img"
                                    class="img-fluid" style="min-width: 100%;min-height: 334px;max-height: 334px;">
                            </div>
                        </div>
                        <figcaption>
                            <div class="member-name">
                                <h4><a href="teachersDetails.php?id=<?php echo $teacher['id'];?>"
                                        title=""><?php if($user){echo $user['full_name'];}?></a></h4>
                                <span><?php if($teacher){echo $teacher['programming_language'] . "  Instructor";}?></span>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <?php } ?>
            <?php
include('included\pagination.php');
        ?>

        </div>
    </div>
</section><!-- ./ End Our Instructiors -->




<!-- Footer -->
<?php
include('included/footer.php');
?>