<?php 
    $formdata = explode('&', $_POST['data']);
     parse_str($_POST['data'], $values);
     // echo $values;

     // foreach ($values as $key => $value) {
     // 	echo " ".$key. " is " .$value .",";
     // }
     //connecting to database

     $server = 'localhost';
     $username = 'vicusername';
     $password = 'toronto';
     $dbname ='Signup';

    $connection = mysqli_connect($server,$username,$password,$dbname);

    if (!$connection){
        echo "problem connecting";
    } 
    else {
        echo "connected sucessfully, ";
    }

    $encryptedPassword = password_hash ($values['password'],PASSWORD_DEFAULT);

    $sql = "Insert into userinfo (firstname,lastname,email,password,skills,phone,gender)
            VALUES('"
            .$values['firstname'] . "','"
            .$values['lastname'] . "','"
            .$values['email']. "','"
            .$encryptedPassword . "','"
            .$values['skills'] . "','"
            .$values['phone'] . "','"
            .$values['gender'] . "') ;";

    $query = mysqli_query($connection, $sql);
    if ($query) {
        echo "1 row inserted";
    } else {
        echo "mysql_query error - cound't insert to the signup table";
    }
?>