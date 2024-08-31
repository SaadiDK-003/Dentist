<?php
require_once '../core/database.php';
if (isset($_POST['docID'])) :
    $docID = $_POST['docID'];

    $cafe_Q = $db->query("CALL `get_doctor_info`($docID)");

    $doc_data = mysqli_fetch_object($cafe_Q); ?>

    <div class="grid-box">
        <div class="item">
            <div class="text"><span class="d-block fw-bold">Doctor Name</span><?= $doc_data->name ?></div>
            <div class="text"><span class="d-block fw-bold">Doctor Phone</span><?= $doc_data->phone ?></div>
        </div>
        <div class="item">
            <div class="text"><span class="d-block fw-bold">Certificate</span><?= $doc_data->certificate ?></div>
            <div class="text"><span class="d-block fw-bold">Experience</span><?= $doc_data->experience ?></div>
        </div>
        <div class="item">
            <div class="text"><span class="d-block fw-bold">Clinic Name</span><?= $doc_data->clinic_name ?></div>
            <div class="text">
                <a class="btn btn-primary btn-sm" href="./cafe_menu.php?cafe_id=<?= $docID ?>&cafe_name=<?= $doc_data->clinic_name ?>" target="_blank">Clinic</a>
                <a class="btn btn-primary btn-sm" href="./cafe_review.php?cafe_id=<?= $docID ?>&cafe_name=<?= $doc_data->clinic_name ?>" target="_blank">Reviews</a>
            </div>
        </div>
        <div class="item">
            <div class="text"><span class="d-block fw-bold">Clinic Open</span>
                <?= date('h:i A', strtotime($doc_data->clinic_open)) ?>
            </div>
            <div class="text"><span class="d-block fw-bold">Clinic Close</span>
                <?= date('h:i A', strtotime($doc_data->clinic_close)) ?>
            </div>
            <input type="hidden" id="store_open_time" value="<?= $doc_data->clinic_open ?>">
            <input type="hidden" id="store_close_time" value="<?= $doc_data->clinic_close ?>">
            <input type="hidden" name="clinic_id" id="clinic_id" value="<?= $doc_data->c_id ?>">
        </div>
    </div>

<?php
    $cafe_Q->close();
    $db->next_result();
endif;


if (isset($_POST['cafeID_modal'])) :
    $docID = $_POST['cafeID_modal'];

    $cafe_Q = $db->query("CALL `get_cafe_info`($docID)");
    $response = array();
    $cafe_data = mysqli_fetch_object($cafe_Q);
    $store_open = date('h:i A', strtotime($cafe_data->store_open));
    $store_close = date('h:i A', strtotime($cafe_data->store_close));
    $response = ["cafeName" => $cafe_data->store_name, "ownerName" => $cafe_data->name, "ownerPhone" => $cafe_data->phone, "shopLocation" => $cafe_data->store_location, "shopOpen" => $store_open, "shopClose" => $store_close];
    echo json_encode($response);
    $cafe_Q->close();
    $db->next_result();
endif;
?>