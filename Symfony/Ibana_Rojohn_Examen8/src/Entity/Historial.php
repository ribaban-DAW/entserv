<?php

namespace App\Entity;

use App\Repository\HistorialRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistorialRepository::class)]
class Historial
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $Fecha = null;

    #[ORM\Column(length: 45)]
    private ?string $Paciente = null;

    #[ORM\Column]
    private ?int $CodigoHistorial = null;

    #[ORM\Column(length: 45)]
    private ?string $Especialista = null;

    #[ORM\Column(length: 45)]
    private ?string $Alergias = null;

    #[ORM\Column(length: 45)]
    private ?string $Antecedentes = null;

    #[ORM\Column(length: 45)]
    private ?string $Sintomas = null;

    #[ORM\Column(length: 45)]
    private ?string $Diagnostico = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTime
    {
        return $this->Fecha;
    }

    public function setFecha(\DateTime $Fecha): static
    {
        $this->Fecha = $Fecha;

        return $this;
    }

    public function getPaciente(): ?string
    {
        return $this->Paciente;
    }

    public function setPaciente(string $Paciente): static
    {
        $this->Paciente = $Paciente;

        return $this;
    }

    public function getCodigoHistorial(): ?int
    {
        return $this->CodigoHistorial;
    }

    public function setCodigoHistorial(int $CodigoHistorial): static
    {
        $this->CodigoHistorial = $CodigoHistorial;

        return $this;
    }

    public function getEspecialista(): ?string
    {
        return $this->Especialista;
    }

    public function setEspecialista(string $Especialista): static
    {
        $this->Especialista = $Especialista;

        return $this;
    }

    public function getAlergias(): ?string
    {
        return $this->Alergias;
    }

    public function setAlergias(string $Alergias): static
    {
        $this->Alergias = $Alergias;

        return $this;
    }

    public function getAntecedentes(): ?string
    {
        return $this->Antecedentes;
    }

    public function setAntecedentes(string $Antecedentes): static
    {
        $this->Antecedentes = $Antecedentes;

        return $this;
    }

    public function getSintomas(): ?string
    {
        return $this->Sintomas;
    }

    public function setSintomas(string $Sintomas): static
    {
        $this->Sintomas = $Sintomas;

        return $this;
    }

    public function getDiagnostico(): ?string
    {
        return $this->Diagnostico;
    }

    public function setDiagnostico(string $Diagnostico): static
    {
        $this->Diagnostico = $Diagnostico;

        return $this;
    }
}
