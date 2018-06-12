<?php

namespace App\Events;

use App\Doctor;
use App\Wound;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ReceiveWoundImage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $progress;
    public $user;

    /**
     * Create a new event instance.
     *
     * @param $progress
     * @param $user
     */
    public function __construct($progress, $user)
    {
        $this->progress = $progress;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('doctor-notification');
    }

    public function broadcastWith()
    {
        $waiting_cases = 0;

        $user_id = $this->user->id;
        $doctor = Doctor::where('user_id', $user_id)->first();

        if(sizeof($doctor) == 1){
            foreach ($doctor->cases as $c){
                $is_waiting = false;
                foreach ($c->wounds as $wound){
                    foreach ($wound->progress as $p){
                        if($p->status == 'Waiting'){
                            $is_waiting = true;
                        }
                    }
                }

                if($is_waiting){
                    $waiting_cases++;
                }
            }
        }

        return [
            'user_id' => $user_id,
            'wait_case' => $waiting_cases
        ];
    }
}
