<?php
require_once '../core/database.php';

if (isset($_POST['specialist']) && empty($_POST['rating'])):

    $specialist = $_POST['specialist'];

    $spe_q = $db->query("CALL `doctor_by_specialist`('$specialist')");
    while ($spe_list = mysqli_fetch_object($spe_q)):
?>

        <div class="doctor-card">
            <img src="./img/doc.jpg" alt="Doctor Photo">
            <h3><?= $spe_list->name ?></h3>
            <p><?= $spe_list->certificate ?> | <?= $spe_list->city ?></p>
            <a href="#!callus.php"><button type="button">View Profile</button></a>
        </div>

    <?php endwhile;
    $spe_q->close();
    $db->next_result();
endif;


// With Both Filters
if (isset($_POST['specialist']) && $_POST['rating'] != ''):

    $specialist = $_POST['specialist'];
    $rating = $_POST['rating'];

    $spe_q_ = $db->query("CALL `doctor_by_specialist_and_rating`('$specialist',$rating)");
    while ($spe_list_ = mysqli_fetch_object($spe_q_)):
    ?>

        <div class="doctor-card">
            <img src="./img/doc.jpg" alt="Doctor Photo">
            <h3><?= $spe_list_->name ?></h3>
            <p><?= $spe_list_->certificate ?> | <?= $spe_list_->city ?></p>
            <?php
            if ($spe_list_->rating == 1):
            ?>
                <p>★</p>
            <?php elseif ($spe_list_->rating == 2): ?>
                <p>★★</p>
            <?php elseif ($spe_list_->rating == 3): ?>
                <p>★★★</p>
            <?php elseif ($spe_list_->rating == 4): ?>
                <p>★★★★</p>
            <?php elseif ($spe_list_->rating == 5): ?>
                <p>★★★★★</p>
            <?php endif; ?>
            <a href="#!callus.php"><button type="button">View Profile</button></a>
        </div>

<?php
    endwhile;
    $spe_q_->close();
    $db->next_result();
endif;
?>