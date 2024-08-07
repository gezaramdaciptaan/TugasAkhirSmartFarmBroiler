<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SensorDataUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $idKandang, $suhu, $kelembapan, $amonia, $suhuOutlier, $kelembapanOutlier, $amoniaOutlier;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($idKandang, $suhu, $kelembapan, $amonia, $suhuOutlier = null, $kelembapanOutlier = null, $amoniaOutlier = null)
    {
        $this->idKandang = $idKandang;
        $this->suhu = $suhu;
        $this->kelembapan = $kelembapan;
        $this->amonia = $amonia;
        $this->suhuOutlier = $suhuOutlier;
        $this->kelembapanOutlier = $kelembapanOutlier;
        $this->amoniaOutlier = $amoniaOutlier;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('sensor-data');
    }
}
