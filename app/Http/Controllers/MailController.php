<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;
use App\Jobs\MyJob;

// require_once app_path('Mail/DemoMail.php');

class MailController extends Controller{

    
    public function sendmail(){
        // $details = [
        //     'title' => 'Mail',
        //     'body' => 'This is a test email' 
        // ];

        // Mail::to('yash.bhambhani02@gmail.com')->send(new DemoMail($details));

        // return "email sent successfully";
        $emailData = [
            'recipient' => 'yash.bhambhani02@gmail.com',
            'subject' => 'Hello',
            'body' => 'This is the email content',
        ];
        MyJob::dispatch($emailData);
    }
    


    


}