<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')] // Backticks for reserved keyword
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $amount = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\ManyToOne(targetEntity: Shop::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(name: 'shop_id', nullable: false)]
    private ?Shop $shop = null;

    #[ORM\ManyToOne(targetEntity: Payment::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(name: 'payment_id', nullable: false)]
    private ?Payment $payment = null;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'orders')] // Changed to ManyToOne
    #[ORM\JoinColumn(name: 'product_id', nullable: false)] // Foreign key to product
    private ?Product $product = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    public function __construct()
    {
        // No collection needed for ManyToOne
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): static
    {
        $this->amount = $amount;
        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;
        return $this;
    }

    public function getShop(): ?Shop
    {
        return $this->shop;
    }

    public function setShop(?Shop $shop): static
    {
        $this->shop = $shop;
        return $this;
    }

    public function getPayment(): ?Payment
    {
        return $this->payment;
    }

    public function setPayment(?Payment $payment): static
    {
        $this->payment = $payment;
        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): static
    {
        $this->product = $product;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;
        return $this;
    }
}