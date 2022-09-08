<?php

namespace App\Models;

class DeliveriesInfo
{
    private string $address;
    private string $date;
    private float $total;
    private int $status;

    public function __construct(string $address, string $date, float $total, int $status)
    {
        $this->address = $address;
        $this->date = $date;
        $this->total = $total;
        $this->status = $status;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getTotal(): float
    {
        return $this->total;
    }
}
