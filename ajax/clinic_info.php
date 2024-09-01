<?php
require_once '../core/database.php';

if (isset($_POST['clinic_id'])):
    $c_id = $_POST['clinic_id'];
?>

    <div class="row">
        <div class="col-12 col-md-4 mb-3">
            <div class="box">
                <h5>Clinic <?= $c_id ?></h5>
                <h6>abx xyz street, 15025</h6>
                <div class="doctor_info">
                    <div class="avatar">
                        <img src="img/doc.jpg" alt="">
                    </div>
                    <h5>Dr.Junaid</h5>
                    <div class="about_doctor d-flex flex-column">
                        <span><strong>Certificate:</strong> MBBA</span>
                        <span><strong>Experience:</strong> 3 years</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
endif;
?>