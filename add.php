<?php include('include/database.php'); ?>
<?php
    error_reporting(0);

    $uid='';
    $uid = $_GET['uid'];

    if(isset($uid)&&(!empty($uid))){
    $uid = $_GET['uid'];

    //Get Current Date and Time To Set
    date_default_timezone_set("America/Toronto");
    $finalDate = date("Y/m/d");
    date_default_timezone_set("America/Toronto");
    $time = date("H.i");
    
    //Get How Many Records are in here with the specific uid
	$presence ="SELECT COUNT($uid) AS presence FROM present_record WHERE date='$finalDate' && uid='$uid'";
	$presenceResults = $mysqli->query($presence) or die($mysqli->error.__LINE__);
    $presenceResults = $presenceResults->fetch_assoc();
    $isPresent = $presenceResults['presence'];

    if($isPresent>2||$isPresent==2){
        $query = " DELETE FROM present_record WHERE uid='$uid'";
            $mysqli->query($query);
            
        $query = "INSERT INTO present_record (id, uid, date, time, state) VALUES (null,'$uid','$finalDate','$time','0')";
            $mysqli->query($query);
        $archive = "INSERT INTO archive (id, uid, date, time, state) VALUES (null,'$uid','$finalDate','$time','0')";
            $mysqli->query($archive);
        $p=0;
        $update = "UPDATE `members` SET presence='$p' WHERE uid='$uid'";
            $mysqli->query($update);

        echo 0;
        header('Location: index.php');
		exit;
    }else{
        if($isPresent==1){
            $query = "INSERT INTO present_record (id, uid, date, time, state) VALUES (null,'$uid','$finalDate','$time','1')";
            $mysqli->query($query);

            $archive = "INSERT INTO archive (id, uid, date, time, state) VALUES (null,'$uid','$finalDate','$time','1')";
            $mysqli->query($archive);

            //Get Punch In Time
            $hourState1 ="SELECT time AS h FROM present_record WHERE date='$finalDate' && state='0' && uid='$uid'";
	            $hoursResults = $mysqli->query($hourState1) or die($mysqli->error.__LINE__);
                    $hoursResults = $hoursResults->fetch_assoc();
                        $punchIn = (double)$hoursResults['h'];
            
            //Get Punch In Time
            $hourState1 ="SELECT time AS h FROM present_record WHERE date='$finalDate' && state='1' && uid='$uid'";
                $hoursResults = $mysqli->query($hourState1) or die($mysqli->error.__LINE__);
                    $hoursResults = $hoursResults->fetch_assoc();
                        $punchOut = (double)$hoursResults['h'];
            
            //Get Punch In Time
            $getCurrentHours ="SELECT hours AS currentHour FROM members WHERE uid='$uid'";
                $getHoursResults = $mysqli->query($getCurrentHours) or die($mysqli->error.__LINE__);
                    $getHoursResults = $getHoursResults->fetch_assoc();
                        $hourOne = (double)$getHoursResults['currentHour'];
            
            //Get Previous Time and Add new Time for this session
            $a = $punchOut-$punchIn;
            $b = $hourOne+$a;

            $updateHour = "UPDATE `members` SET hours='$b' WHERE uid='$uid'";
                $mysqli->query($updateHour);
            $p=1;
            $update = "UPDATE `members` SET presence='$p' WHERE uid='$uid'";
                $mysqli->query($update);
            echo 0;
            header('Location: index.php');
            exit;          
        }else{
            $query = "INSERT INTO present_record (id, uid, date, time, state) VALUES (null,'$uid','$finalDate','$time','0')";
            $mysqli->query($query);

            $archive = "INSERT INTO archive (id, uid, date, time, state) VALUES (null,'$uid','$finalDate','$time','0')";
            $mysqli->query($archive);

            //Get Punch In Time
            $hourState1 ="SELECT time AS h FROM present_record WHERE date='$finalDate' && state='0' && uid='$uid'";
	            $hoursResults = $mysqli->query($hourState1) or die($mysqli->error.__LINE__);
                    $hoursResults = $hoursResults->fetch_assoc();
                        $punchIn = $hoursResults['h'];

            $b=0;
            $update = "UPDATE `members` SET presence='$b' WHERE uid='$uid'";
                $mysqli->query($update);
            echo 0;
            header('Location: index.php');
            exit;
        }
    }
}
//Insert
    // $query = "INSERT INTO present_record (id, uid, date, time, state) VALUES (null,'$uid','$finalDate','$time','1')";
    // $mysqli->query($query);

    // $hourState1 ="SELECT time AS hL FROM present_record WHERE date='$finalDate' && state='0' && uid='$uid'";
	// $hoursResults = $mysqli->query($hourState1) or die($mysqli->error.__LINE__);
    // $hoursResults = $hoursResults->fetch_assoc();
    // $punchIn = $hoursResults['hL'];

    // $hourState1 ="SELECT time AS hL FROM present_record WHERE date='$finalDate' && state='1' && uid='$uid'";
	// $hoursResults = $mysqli->query($hourState1) or die($mysqli->error.__LINE__);
    // $hoursResults = $hoursResults->fetch_assoc();
    // $punchOut = $hoursResults['hL'];

    // $getCurrentHours ="SELECT hours AS currentHour FROM members WHERE uid='$uid'";
	// $getHoursResults = $mysqli->query($getCurrentHours) or die($mysqli->error.__LINE__);
    // $getHoursResults = $getHoursResults->fetch_assoc();
    // $hourOne = $getHoursResults['currentHour'];

    // $updatedHour = $hourOne+($punchIn-$punchOut);
    

    // $updateHour = "UPDATE `members` SET hours='$updateHour' WHERE uid='$uid'";
    // $mysqli->query($updateHour);
?>