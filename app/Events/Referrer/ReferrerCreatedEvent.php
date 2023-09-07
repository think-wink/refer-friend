<?php

namespace App\Events\Referrer;

use App\Models\Customer\Referrer;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReferrerCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Referrer $referrer;

    /**
     * Create a new event instance.
     */
    public function __construct(Referrer $referrer)
    {
        $this->referrer = $referrer;
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
