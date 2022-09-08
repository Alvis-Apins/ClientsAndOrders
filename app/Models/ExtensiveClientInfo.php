<?php

namespace App\Models;

class ExtensiveClientInfo
{
    private string $name;
    private string $address;
    private ?string $orderDate = null;
    private ?int $orderType = null;
    private ?float $orderTotal = null;

    public function __construct(string $name, string $address, ?string $orderDate, ?int $orderType, ?float $orderTotal)
    {
        $this->name = $name;
        $this->address = $address;
        $this->orderDate = $orderDate;
        $this->orderType = $orderType;
        $this->orderTotal = $orderTotal;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getOrderDate(): ?string
    {
        return $this->orderDate;
    }

    public function getOrderTotal(): ?float
    {
        return $this->orderTotal;
    }

    public function getOrderType(): ?int
    {
        return $this->orderType;
    }
}
