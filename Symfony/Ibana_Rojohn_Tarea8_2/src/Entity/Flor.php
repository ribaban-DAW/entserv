<?php

namespace App\Entity;

use App\Repository\FlorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FlorRepository::class)]
class Flor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $Nombre = null;

    #[ORM\Column(length: 100)]
    private ?string $Color = null;

    #[ORM\Column]
    private ?int $Tamano = null;

    #[ORM\Column(length: 50)]
    private ?string $Pais = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tipo $Tipo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): static
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->Color;
    }

    public function setColor(string $Color): static
    {
        $this->Color = $Color;

        return $this;
    }

    public function getTamano(): ?int
    {
        return $this->Tamano;
    }

    public function setTamano(int $Tamano): static
    {
        $this->Tamano = $Tamano;

        return $this;
    }

    public function getPais(): ?string
    {
        return $this->Pais;
    }

    public function setPais(string $Pais): static
    {
        $this->Pais = $Pais;

        return $this;
    }

    public function getTipo(): ?Tipo
    {
        return $this->Tipo;
    }

    public function setTipo(?Tipo $Tipo): static
    {
        $this->Tipo = $Tipo;

        return $this;
    }
}
