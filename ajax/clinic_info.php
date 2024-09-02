<?php
require_once '../core/database.php';

if (isset($_POST['clinic_id'])):
    $c_id = $_POST['clinic_id'];
    $C_List = $db->query("Call `get_doc_by_clinic_id`($c_id)");
    while ($list = mysqli_fetch_object($C_List)):
?>
        <div class="col-12 col-md-4 mb-3">
            <div class="box">
                <h5><?= $list->clinic_name ?></h5>
                <h6><?= $list->clinic_location ?></h6>
                <div class="doctor_info">
                    <div class="avatar">
                        <img src="img/doc.jpg" alt="">
                    </div>
                    <h5><?= $list->name ?></h5>
                    <div class="about_doctor d-flex flex-column">
                        <span><strong>Certificate:</strong> <?= $list->certificate ?></span>
                        <span><strong>Experience:</strong> <?= $list->experience ?></span>
                    </div>
                </div>
            </div>
        </div>
<?php
    endwhile;
endif;
$C_List->close();
$db->next_result();
?>