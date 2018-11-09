<?php
    require_once('validator.php');

    $requirements = [
        "courseID"      =>  [ "max" => 150 ],
        "lecturer"      =>  [ "max" => 200 ],
        "description"   =>  [ "min" => 10 ]
    ];
    $validate = new ValidateCourse($_POST, $requirements);
    if(!$validate->isValid())
    {
        $validate->printError();
    }
    else
    { 
        $host   = "127.0.0.1";
        $db     = "webhw";
        $user   = "root";
        $pass   = "";
        $conn   = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        
        $conn->beginTransaction();
        $checkCol = "SHOW COLUMNS FROM electives WHERE Field = 'created_at'";
        $query = $conn->query($checkCol) or die("failed!");
        if ($row = $query->fetch(PDO::FETCH_ASSOC))
        {
            // Column exists -> do nothing
        }
        else
        {
            // Column does not exists -> add it
            $st = $conn->prepare("ALTER TABLE electives ADD created_at".
                                        " TIMESTAMP DEFAULT CURRENT_TIMESTAMP");
            $st->execute(); 
        }
        
        $st = $conn->prepare("INSERT INTO electives (title, description, lecturer)" .
                                " VALUES(?, ?, ?)");
        $st->execute(array( $_POST["courseID"],
                            $_POST["description"],
                            $_POST["lecturer"],));
        
        $conn->commit();
        echo "end";
    }
?>