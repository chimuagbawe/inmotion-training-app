<div class="col-12 col-sm-12 col-md-12 col-lg-12">
    <div id="related_courses" class="owlCarousel">
        <?php 
                $perPage = 900000; // Number of courses per page
                $totalCourses = count($courses); // Total number of courses
                $totalPages = ceil($totalCourses / $perPage); // Calculate total pages
                
                // Get current page or set it to 1 if not provided
                $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                
                // Calculate the starting index for courses on the current page
                $startIndex = ($page - 1) * $perPage;
                
                // Get courses for the current page
                $currentCourses = array_slice($courses, $startIndex, $perPage);
                
                foreach ($currentCourses as $course) {
                    $dropTimestamp = strtotime($course['created_at']); // Replace this with your actual timestamp

                    // Calculate the time difference
                    $currentTimestamp = time();
                    $timeDifference = $currentTimestamp - $dropTimestamp;
                    
                    // Convert the time difference to a human-readable format
                    $elapsedTime = formatElapsedTime($timeDifference);
                    $teacherId = $course['teacher_id'];
                    
                    $sql1 = "SELECT * FROM teachers WHERE id = $teacherId";
                    $result1 = mysqli_query($con, $sql1);
                    $teacher = mysqli_fetch_assoc($result1);
                    
                    $userId = $teacher['user_id'];
                    $sql2 = "SELECT * FROM users WHERE id = $userId";
                    $result2 = mysqli_query($con, $sql2);
                    $user = mysqli_fetch_assoc($result2);
                    if(isset($_SESSION['loginId'])){
                    $userId1 = $_SESSION['loginId'];
                    $id = $course['id'];
                    $sql3 = "SELECT * FROM user_purchases WHERE user_id = $userId1 AND course_id = $id";
                    $result3 = mysqli_query($con, $sql3);
                    if($result3 && mysqli_num_rows($result3) > 0){
                    $_SESSION['bought'] = "Course has been purchased";
                    }else{
                    $_SESSION['bought'] = "";
                    }
                    }
                    ?>
        <div class="single-courses">
            <div class="courses_banner_wrapper">
                <div class="courses_banner"><a href="course-details.php?id=<?php echo $course['id'];?>"><img
                            src=<?php echo htmlspecialchars($course['image']);?> alt="" class="img-fluid"
                            style="min-height:240px; max-height: 240px;"></a></div>
                <div class="purchase_price">
                    <a href="#" class="read_more-btn"><?php echo htmlspecialchars($course['price']);?></a>
                </div>
            </div>
            <div class="courses_info_wrapper">
                <div class="courses_title">
                    <h3><a
                            href="course-details.php?id=<?php echo $course['id'];?>"><?php echo htmlspecialchars($course['title']);?></a>
                    </h3>
                    <div class="teachers_name">Teacher - <a
                            href="teachersDetails.php?id=<?php echo $course['teacher_id'];?>"
                            title=""><?php if($user){echo $user['full_name'];}?></a></div>
                </div>
                <div class="courses_info">
                    <ul class="list-unstyled">
                        <li><i class="fas fa-user"></i><?php echo htmlspecialchars($course['duration']);?>
                        </li>
                        <li><?php echo $course['student_count'] . " Students . " . $elapsedTime; ?></li>
                    </ul>
                    <form method="post" action="Form_handlers\addToCart.php">
                        <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
                        <?php if(isset($_SESSION['loginId']) && $_SESSION['bought'] == "Course has been purchased"): ?>
                        <button type="button" style="border: none; cursor: not-allowed;" class="cart_btn"
                            title="Already bought by you">Purchased!!</button>
                        <?php elseif(isset($_SESSION['loginId']) && empty($_SESSION['bought'])): ?>
                        <button type="submit" style="border: none" name="submit" class="cart_btn">Add to
                            Cart</button>
                        <?php else: ?>
                        <button type="button" style="border: none"
                            class="cart_btn nav-link apply_btn sign-in js-modal-show">Add to
                            Cart</button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div><!-- Ends: .single courses -->
        <?php } ?>

    </div><!-- Ends: . -->
</div>

</div>
</section><!-- ./ End Courses Area section -->