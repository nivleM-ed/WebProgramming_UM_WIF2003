<?php

//insert.php

$connect = new PDO('mysql:host=localhost;dbname=loginsystem', 'root', '');
echo "test";
if(isset($_POST["title"]))
{
    $title= $_POST["title"];
 $query = "
 INSERT INTO events 
 (title, start_event, end_event) 
 VALUES (:title, :start_event, :end_event)
 ";
 $statement = $connect->prepare($query);
//  $statement->execute(
//   array(
//    ':title'  => $_POST['title'],
//    ':start_event' => $_POST['start'],
//    ':end_event' => $_POST['end']
//   )
//  );
$statement->execute(
    array(
     ':title'  => "abc",
     ':start_event' => "2019/09/12",
     ':end_event' => "2020/09/12"
    )
   );
}


?>
