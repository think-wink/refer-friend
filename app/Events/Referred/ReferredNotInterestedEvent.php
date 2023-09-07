<?php

namespace App\Events\Referred;

use App\Models\Customer\Referred;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReferredNotInterestedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Referred $referred;

    /**
     * Create a new event instance.
     */
    public function __construct(Referred $referred)
    {
        $this->referred = $referred;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
//            new PrivateChannel('channel-name'),
        ];
    }
}
