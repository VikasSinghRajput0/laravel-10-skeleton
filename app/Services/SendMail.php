<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Exception;
use Illuminate\Support\Facades\Log;

class SendMail
{
    /**
     * Send mail
     *
     * @param [array] $data
     * @return void
     */
    public function send($data)
    {
        try {


            if($data['cc'] != '' && $data['bcc'] != ''){
                mail::to($data['to'])
                ->cc($data['cc'])
                ->bcc($data['bcc'])
                ->send(new \App\Mail\MailNotification($data));
            }elseif($data['cc'] != '' && $data['bcc'] == ''){
                mail::to($data['to'])
                ->cc($data['cc'])
                ->send(new \App\Mail\MailNotification($data));
            }elseif($data['cc'] == '' && $data['bcc'] != ''){
                mail::to($data['to'])
                ->bcc($data['bcc'])
                ->send(new \App\Mail\MailNotification($data));
            }else{
                mail::to($data['to'])
                ->send(new \App\Mail\MailNotification($data));
            }
        } catch (Exception $e) {
            dd($e);
            Log::error($e);
        }
    }
}
