<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

use function PHPSTORM_META\type;

class EmployeeAttendanceNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $action, $message)
    {
        $this->user = $user;
        $this->message = $message;

        Log::info('action: ' . $action);
        $type = gettype($action);
        Log::info("type: " . $type);
        if ($type == "integer") {
            Log::info("if statment");
            if ($action === 1) {
                $this->action = "Absent";
            } else {
                $this->action = "Late";
            }
        } else {
            $this->action = $action;
        }
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            "is_admin" => false,
            "user_id" => $this->user->id,
            "message" => $this->message,
            "action" => $this->action,
        ];
    }
}
