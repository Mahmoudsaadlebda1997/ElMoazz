<?php

namespace Modules\CommonModule\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class QrcodePrintReservation implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $data;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;

    }
    public function broadcastWith()
    {
        return [$this->data];
    }

    public function broadcastOn()
    {
        return [new Channel('new-print-reservation')];
    }

    public function broadcastAs()
    {
        return 'NewPrintReservation';
    }
}
