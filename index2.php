

<?php

include './Helpers/mailer.php';

$data= array(
    "FullName"=>"Brahim AFASSY",
    "Exam"=> "DS1",
    "Filiere"=>"CP1",
    "Local"=> "SALLE 6",
    "date"=>"14/01/2020",
    "HeureD"=>"08:00",
    "HeureF"=>"10:00"
    );
$mailResult = sendMail("afassybrahim@gmail.com","Brahim AFASSY9","About The Surviance",$data);
echo $mailResult;
