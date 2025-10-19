<?php
include('./routes/dbcon.php');

// Fetch all approved reviews (or all if you haven’t added moderation)
$reviews = mysqli_query($conn, "SELECT * FROM reviews ORDER BY created_at DESC");
if (!$reviews) {
    die("Error running query: " . mysqli_error($conn));
}

if (mysqli_num_rows($reviews) > 0):
    while ($r = mysqli_fetch_assoc($reviews)):
?>
    <div class="abmin d-flex flex-wrap flex-md-nowrap align-items-center pb-4">
        <div class="img pb-4 pb-md-0 me-4">
            <img src="assets/images/about/comment<?php echo rand(1, 4); ?>.png" alt="image">
        </div>
        <div class="content position-relative p-4 bor">
            <div class="head-wrp pb-1 d-flex flex-wrap justify-content-between">
                <a href="#0">
                    <h4 class="text-capitalize primary-color">
                        <?php echo htmlspecialchars($r['name']); ?>
                        <span class="sm-font ms-2 fw-normal">
                            <?php echo date("d M Y \\a\\t h:i a", strtotime($r['created_at'])); ?>
                        </span>
                    </h4>
                </a>
                <div class="star primary-color">
                    <?php 
                    // If rating column exists, show it dynamically; else default to 5
                    $rating = isset($r['rating']) ? intval($r['rating']) : 5;
                    for ($i = 1; $i <= 5; $i++):
                        if ($i <= $rating): ?>
                            <span><i class="fa-solid fa-star sm-font"></i></span>
                        <?php elseif ($i - 0.5 == $rating): ?>
                            <span><i class="fa-solid fa-star-half-stroke sm-font"></i></span>
                        <?php else: ?>
                            <span><i class="fa-regular fa-star sm-font"></i></span>
                        <?php endif;
                    endfor; ?>
                </div>
            </div>
            <p class="text-justify">
                <?php echo nl2br(htmlspecialchars($r['message'])); ?>
            </p>
        </div>
    </div>
<?php 
    endwhile;
else:
?>
    <p class="text-center text-muted">No reviews yet — be the first to write one!</p>
<?php endif; ?>
