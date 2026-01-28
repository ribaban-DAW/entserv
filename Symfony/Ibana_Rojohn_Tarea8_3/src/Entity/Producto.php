<?php

namespace App\Entity;

use App\Repository\ProductoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductoRepository::class)]
class Producto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Piedra $piedra = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pintura $pintura = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPiedra(): ?Piedra
    {
        return $this->piedra;
    }

    public function setPiedra(?Piedra $piedra): static
    {
        $this->piedra = $piedra;

        return $this;
    }

    public function getPintura(): ?Pintura
    {
        return $this->pintura;
    }

    public function setPintura(?Pintura $pintura): static
    {
        $this->pintura = $pintura;

        return $this;
    }
}
