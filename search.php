<?php 
  // created by Marin Rusi and Vic Artates
     $lastname = "";
     $firstname = "";
     $email = "";
     $sql = "";
     
     if (isset($_POST['serchlastname']))
     {
        $lastname =  $_POST['searchlastname'];
        $sql = "Select * from userinfo where lastname='".$lastname. "';";
     }

     else if (isset($_POST['searchfirstname']))
     {
        $lastname =  $_POST['searchfirstname'];
        $sql = "Select * from userinfo where firstname='".$firstname. "';";

     }


    else if (isset($_POST['searchemail']))
     {
        $email =  $_POST['searchemail'];
        $sql = "Select * from userinfo where email='".$email. "';";

     }

     // $_POST['search'];

     echo $sql;
     $server = 'localhost';
     $username = 'vicusername';
     $password = 'toronto';
     $dbname ='Signup';

    $connection = mysqli_connect($server,$username,$password,$dbname);

    if (!$connection){
        echo "problem connecting";
    } 
    else {
        // echo "connected sucessfully ";
    }

    // $sql = "Select * from userinfo where lastname='" .$lastname ."';";

    $query = mysqli_query($connection, $sql);
    if ($query){

      //fetch rows is successful
        echo" <table><thead>
            <tr>
                <th>first name<th>
                <th>last name</th>
                <th>email</th>
                <th>phone</th>
                <th>gender</th>
             </tr>
        </thead><tbody>";
        while ($row = mysqli_fetch_row($query)){
        printf("<tr>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
            </tr>"
        ,$row[1], $row[2], $row[3], $row[5], $row[6], $row[7] );
        }

        echo "</tbody></table> ";
        mysqli_free_result($query);
        mysqli_close($connection);
    } else {
        echo "mysql_query error - cound't search signup table";
    }
?>