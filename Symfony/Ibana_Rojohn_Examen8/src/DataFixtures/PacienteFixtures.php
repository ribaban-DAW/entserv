<?php

namespace App\DataFixtures;

use App\Entity\Paciente;
use App\Entity\Doctor;
use App\DataFixtures\DoctorFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use Doctrine\Persistence\ObjectManager;

class PacienteFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $paciente1 = new Paciente();
        $paciente1->setNombre("Ricardo");
        $paciente1->setApellidos("Sánchez");
        $paciente1->setSexo("Masculino");
        $paciente1->setEdad(30);
        $paciente1->setDoctor($this->getReference('doctor1', Doctor::class));
        $manager->persist($paciente1);

        $paciente2 = new Paciente();
        $paciente2->setNombre("Luis");
        $paciente2->setApellidos("Torres");
        $paciente2->setSexo("Masculino");
        $paciente2->setEdad(20);
        $paciente2->setDoctor($this->getReference('doctor2', Doctor::class));
        $manager->persist($paciente2);

        $paciente3 = new Paciente();
        $paciente3->setNombre("Nicki");
        $paciente3->setApellidos("Gutiérrez");
        $paciente3->setSexo("Femenino");
        $paciente3->setEdad(25);
        $paciente3->setDoctor($this->getReference('doctor3', Doctor::class));
        $manager->persist($paciente3);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            DoctorFixtures::class,
        ];
    }
}
