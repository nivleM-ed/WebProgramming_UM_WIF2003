<?php
        // First method
        // $country=$_POST[]
        // $conn = mysqli_connect("localhost", "root", "", "recommendation");

        // $result = mysqli_query($conn, "SELECT * FROM recommend");

        // $data = array();
        // while($row = mysqli_fetch_assoc($result)){
        //     $data[] = $row;
        // }
        // echo "Data: ";
        // echo json_encode($data);
        // echo $data;

        // 2nd method
        // if (isset($_POST['country']) === true && empty($_POST['name']) === false){
        //     $conn = mysqli_connect("localhost", "root", "", "recommendation");
        //     // $result = mysqli_query($conn, "SELECT * FROM recommend");
        //     $result =  mysql_query("
        //         SELECT *
        //         FROM recommend
                
        //     ");

        //     echo $result;
        // }


        // 3rd method
        // $conn = mysqli_connect("localhost", "root", "", "recommendation");
        // $set = "Korea";
        // if($set){
        //     $show = "SELECT * FROM recommend WHERE Country='$set'";
        //     $result = mysqli_query($conn,$show);
        //     $row = mysqli_fetch_array($result);
        //     echo $row;
        //     echo "<td>".$row['Country']."</td>";
        //     echo "<td>".$row['Place']."</td>";
        //     echo "<td>".$row['Description']."</td>";	
            // echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		

        // }
    ?>