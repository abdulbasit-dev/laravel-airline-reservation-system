<?php

namespace App\Notifications;

use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Throwable;

class FcmNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $to
     * @return array
     */
    public  static function send($to,$title,$body,$data=[])
    {

        $json = [
            "to" => $to,
            "notification" => [
                "title" => $title,
                "body" => $body
            ],
            "data"=>$data
        ];

        $client = new Client();
        try{
            $result = $client->post('https://fcm.googleapis.com/fcm/send', [
                'json'    =>
                $json,
                'headers' => [
                    'Authorization' => 'key=' . env('FCM_SERVER_KEY'),
                    'Content-Type'  => 'application/json',
                ],
            ]);
            
        }catch(Throwable $th){
            Log::alert($th);
        }
        
        return json_decode($result->getBody(), true);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
