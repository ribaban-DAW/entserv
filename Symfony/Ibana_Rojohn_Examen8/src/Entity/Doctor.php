<?php

namespace App\Entity;

use App\Repository\DoctorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DoctorRepository::class)]
class Doctor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $Especialidad = null;

    #[ORM\Column(length: 45)]
    private ?string $Nombre = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Historial $Historial = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEspecialidad(): ?string
    {
        return $this->Especialidad;
    }

    public function setEspecialidad(string $Especialidad): static
    {
        $this->Especialidad = $Especialidad;

        return $this;
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

    public function getHistorial(): ?Historial
    {
        return $this->Historial;
    }

    public function setHistorial(?Historial $Historial): static
    {
        $this->Historial = $Historial;

        return $this;
    }
}
