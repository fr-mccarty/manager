<?php

namespace App\Helpers;

use App\Mail\BasicTextEmail;
use Illuminate\Support\Facades\Mail;

class EmailHelper
{
    //Example usage:
    //EmailHelper::sendBasicEmail('fr.mccarty@gmail.com', 'Good morning', "Lets go friends. \n\n Again.");
    //Note how the message should be in double quotes.  And a line break is created by \n\n
    static function sendBasicEmail($email, $subject, $message)
    {
        Mail::to($email)->send(new BasicTextEmail($subject, $message));
    }

    static function sendIndividualEmailsToArray($tos, $subject, $message)
    {
        foreach($tos as $to) {
            self::sendBasicEmail($to, $subject, $message);
        }
    }



}
