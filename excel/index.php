<!DOCTYPE html>
<html>
<head>
	<title>XLSx</title>
</head>
<body>
<form action="#" method="POST" enctype="multipart/form-data">
	<input type="file" name="excel">
	<input type="submit" name="submit">
</form>
<?php

if (isset($_FILES['excel']['name'])) {
    //$con=mysqli_connect("localhost", "deancoaryp_pradakshina", "Swadha@20684$", "deancoaryp_app");
		$con=mysqli_connect("localhost", "root", "", "deancoaryp");



    include "xlsx.php";
    if ($con) {

			echo "DB Connected";
        $excel=SimpleXLSX::parse($_FILES['excel']['tmp_name']);

        //print_r($excel->dimension(2));
        //print_r($excel->sheetNames());
       $rowcol=$excel->dimension(0);

//var_dump($rowcol);
//var_dump($excel->rows(0));
            $i=0;
            if ($rowcol[0]!=1 &&$rowcol[1]!=1) {
                foreach ($excel->rows(0) as $key => $row) {
                    //print_r($row);

										$uniq_id = uniqid();
										$user_id = $row[0];
                    $name = $row[1];
										$mobile_no = $row[2];
										$email_id = $row[3];



                    $query='insert into user (uuid,user_id,name,mobile_no,email_id) values ("'.$uniq_id.'","'.$user_id.'","'.$name.'","'.$mobile_no.'","'.$email_id.'")';


                    echo $query;
                    if (mysqli_query($con, $query)) {
                    }
                    echo "<br>";
                    $i++;
                }
            }
    }
}

?>
</body>
</html>
