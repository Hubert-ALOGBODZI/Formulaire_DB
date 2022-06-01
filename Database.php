<?php


$name = $_POST["name"];
$Message = $_POST["Message"];
$priority = filter_input(INPUT_POST, "priority", FILTER_VALIDATE_INT);
$type = filter_input(INPUT_POST, "type", FILTER_VALIDATE_INT);
$terms = filter_input(INPUT_POST, "terms", FILTER_VALIDATE_BOOL);


if( ! $terms) {
    die("Terms most be accepted");
}

$host = "localhost";
$dbname = "message_db";
$username = "root";
$password = "";

$conn = mysqli_connect (hostname : $host,
                username : $username,
                password : $password,
                database : $dbname );

            
if(mysqli_connect_errno()){
    die("connection error".mysqli_connect_errno());
}               

 
$sql = "INSERT INTO     message (name, body, priority, type)
         VALUES(?,?,?,?)";


$stmt = mysqli_stmt_init($conn);

if( ! mysqli_stmt_prepare($stmt , $sql)) {
    die( mysqli_error($conn));
}


mysqli_stmt__bind_param($stmt, "ssii",
                        $name,
                        $message,
                        $priority,
                        $type);


mysqli_stmt_execute($stmt);
echo "Record saved.";   

?>