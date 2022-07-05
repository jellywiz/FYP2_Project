<?php

namespace App\Notifications;

use App\Models\Attendance;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class AdminAttendanceComplainNotification extends Notification
{
    use Queueable;

    public Attendance $attendance;
    public $request;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($attendance, $request)
    {
        $this->attendance = $attendance;
        $this->request = $request;
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
        // user === employee
        // action === status 

        return [
            "is_admin" => true,
            "user_name" => $this->attendance->user->first_name . " " . $this->attendance->user->last_name,
            "current_status" => $this->request->current_status,
            "status" => $this->request->status,
            "message" => $this->request->message,
            "attendance_id" => $this->attendance->id,
            "attendance_date" => $this->attendance->created_at,
        ];
    }
}
