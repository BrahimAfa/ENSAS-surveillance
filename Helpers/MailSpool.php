<?php
require 'mailer.php';

class MailSpool
{
  public static $mails = [];

  public static function addMail($recipient,$fullName,$subject,$data)
  {
    self::$mails[] = ['recipient'=>$recipient, 'fullName'=>$fullName, 'subject' => $subject, 'data' => $data ];
  }

  public static function send()
  {
    foreach(self::$mails as $mail) {
      sendMail($mail['recipient'], $mail['fullName'], $mail['subject'],$mail['data']);
    }
  }
}
