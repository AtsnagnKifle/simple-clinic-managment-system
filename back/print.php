
<?php
	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: ../");
		exit();
	}


	if(!isset($_POST['submit'])){
		header("Location: ../");
		exit();

	}
	include_once 'db.php';
	$qu = "SELECT * FROM medical_history WHERE id = '".$_POST['historyId']."'";
	$result = mysqli_query($con,$qu);
	$data = mysqli_fetch_assoc($result);

	$date = $data['date'];

	$qu2 = "SELECT `full_name` FROM `user` WHERE `id`='".$data['patient_id']."'";
	$result2 = mysqli_query($con,$qu2);
	$patientName = mysqli_fetch_assoc($result2)['full_name'];

	$qu2 = "SELECT `full_name` FROM `user` WHERE `id`='".$data['doctor_id']."'";
	$result2 = mysqli_query($con,$qu2);
	$doctorName = mysqli_fetch_assoc($result2)['full_name'];
	
	$qu2 = "SELECT `full_name` FROM `user` WHERE `id`='".$data['nurse_id']."'";
	$result2 = mysqli_query($con,$qu2);
	$nurseName = mysqli_fetch_assoc($result2)['full_name'];

	$qu2 = "SELECT `full_name` FROM `user` WHERE `id`='".$data['receptionist_id']."'";
	$result2 = mysqli_query($con,$qu2);
	$receptionistName = mysqli_fetch_assoc($result2)['full_name'];

	$symptom = $data['symptoms'];
	$diagnosis = $data['diagnosis'];


	//laboratory laboratoristId result

	$qu2 = "SELECT * FROM `laboratory` WHERE `laboratory_id`='".$data['laboratory_id']."'";
	$result2 = mysqli_query($con,$qu2);
	$lab = mysqli_fetch_assoc($result2);
	$labRequest = $lab['requested_tests'];
	$labResult = $lab['lab_results'];
	$laboratoristId = $lab['laboratorist_id'];

	$qu2 = "SELECT `full_name` FROM `user` WHERE `id`='".$laboratoristId."'";
	$result2 = mysqli_query($con,$qu2);
	$laboratoristName = mysqli_fetch_assoc($result2)['full_name'];


	//prescription medicine pharmacistId
	$qu2 = "SELECT * FROM `prescription` WHERE `prescription_id`='".$data['prescription_id']."'";
	$result2 = mysqli_query($con,$qu2);
	$pre = mysqli_fetch_assoc($result2);
	$pharmacistId = $pre['pharmacist_id'];
	$medicineId = $pre['medicine_id'];


	$qu2 = "SELECT `full_name` FROM `user` WHERE `id`='".$pharmacistId."'";
	$result2 = mysqli_query($con,$qu2);
	$pharmacistName = mysqli_fetch_assoc($result2)['full_name'];

	//medicine
	$qu2 = "SELECT `name` FROM `medicine` WHERE `medicine_id`='".$medicineId."'";
	$result2 = mysqli_query($con,$qu2);
	$medicineName = mysqli_fetch_assoc($result2)['name'];



?>
		
		
		<div id="pri" style="display:none;">
            <br><br>
			<center>
				<img src="../images/astu.jpg" alt="logo" style="width:150px;">
				<br>
				<div>
					<p><strong class="title">ASTU CLINIC</strong></p>
				</div>
				<br>
				<div>
					<p>This Medical History is Collected On <?php echo $date?></p>
				</div>
				<br><br>
						
			</center>	
			<div style="padding-left:15%;font-size:18px;">
				<p>Patient Name --------- <?php echo $patientName?></p>
				<p>Doctor Name --------- <?php echo $doctorName?></p>
				<p>Laboratorist Name ---- <?php echo $laboratoristName?></p>
				<p>Pharmacist Name ----- <?php echo $pharmacistName?></p>
				<p>Nurse Name ---------- <?php echo $nurseName?></p>
				<p>Receptionist Name ---- <?php echo $receptionistName?></p>
				<br>
			</div>
			<div>
				<center>
					<b style="font-size:20px;text-align:center;">Medical</b>
				</center>
				<div style="padding-left:15%;font-size:18px;">
					<p>Symptoms-----<?php echo $symptom?></p>
					<p>Diagnosis------<?php echo $diagnosis?></p>
				</div>
				
			</div>

			<div>
					<center>
						<b style="font-size:20px;text-align:center;">Laboratory</b>
					</center>
					<div style="padding-left:15%;font-size:18px;">
						<p>Request--------<?php echo $labRequest?></p>
						<p>Result----------<?php echo $labResult?></p>
					</div>
					
			</div>


			<div>
					<center>
						<b style="font-size:20px;text-align:center;">Prescription</b>
					</center>
					<div style="padding-left:15%;font-size:18px;">
						<p>Medicine Id----------<?php echo $medicineId?></p>
						<p>Medicine Name------<?php echo $medicineName?></p>
					</div>
					
			</div>
			<div>
					<center>
						<b style="font-size:20px;text-align:center;">Doctor's Note</b>
					</center>
					<div style="padding-left:15%;font-size:18px;">
						<p><b><?php echo $data['additional_note']?></b></p>
						
					</div>
					
			</div>

		</div>
		<script>
			function printH(){
				var display_seting = "toolbar=yes,location=no,directories=yes,menubar=yes,scrollbars=yes,width=800,height=800,left=100,top=25";
				var content_values = document.getElementById("pri").innerHTML;
				var docP = window.open("","",display_seting);
				docP.document.open();
				docP.document.write('<html><head><title>Print</title>');
				docP.document.write('<head><body onload="self.print() style="width:400px;font-size:12px;font-family:arial;">');
				docP.document.write(content_values);
				docP.document.write("</body></html>");
				docP.document.close();
				docP.document.focus();
				


			}
			printH();
			
		</script>
		