<?php
session_start();
if (!isset($_SESSION['logedIn'])) // If session is not set then redirect to Login Page
{
    header("Location:../../loginui.php");
}
header("Access-Control-Allow-Origin: *");
header("Content-Type:json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Accept:application/x-www-form-urlencoded");
require_once('../../config/database.php');
//require_once('config/database.php');


try {
    $database = new Database();
    $conn = $database->getConnection();

    $query = "SELECT distinct s.id as \"كود\" 
    ,s.fullname as \"الاسم\"
    ,s.phonenumber as \"الرقم\"
    ,s.guardianphonenumber as \"رقم ولى الامر\"
    ,  CASE
		           WHEN s.status = 0
		                THEN 'متاح'
		           WHEN s.status = 1
		                THEN 'غير متاح'
		       	END  \"حاله الطالب\"
    ,s.governorate as \"المحافظه\"
    ,s.email as \"االبريد الالكترونى\"
    ,s.groupname as \"اسم المجموعه\"
    ,s.stagename \"الفرقه\"
    ,total_count
    from 
    (SELECT ss.* , g.name as groupname ,st.\"name\" as stagename FROM students ss
        left join 
        stages st on ss.stageid =st.id 
        left join \"groups\" g 
        on g.id =ss.groupid
        where 1=1
     ) s
    cross join (select count( distinct id) as total_count from students ) c";


    //$data = json_decode(file_get_contents("php://input"));
    //echo  json_encode($_POST['startIndex']);
    if (!empty($_POST['queryString'])) {
        $query = str_replace("1=1", "fullname like '%" . $_POST['queryString']  . "%' and 1=1", $query);
    }
    if (!empty($_POST['startIndex'])) {
        $query = str_replace("1=1", " ss.id >= " . $_POST['startIndex'] . " and 1=1", $query);
    }
    if (!empty($_POST['lastIndex'])) {
        $query = str_replace("1=1", " ss.id <= " . $_POST['lastIndex'], $query);
    }


    $stmt = $conn->prepare($query);

    // execute query
    $stmt->execute();

    //$num = $stmt->rowCount();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    echo $json;
} catch (Exception $exception) {
//     echo  $exception->getMessage();
}
