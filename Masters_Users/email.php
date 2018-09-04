<?php 
if (isset($_POST['uemail'])){ 
     $uemail = $_POST['uemail']; 
     if (!empty($uemail)){
        if (filter_var($uemail,FILTER_VALIDATE_EMAIL) ===false){
         echo 'Not Valid, Enter valid email address...';
         }else{
         echo 'Valid email address!';
		}
	}
}
    ?>