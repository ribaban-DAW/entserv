<?php

namespace App\DataFixtures;

use App\Entity\Doctor;
use App\Entity\Historial;
use App\DataFixtures\HistorialFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DoctorFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $doctor1 = new Doctor();
        $doctor1->setEspecialidad("Cardiología");
        $doctor1->setNombre("Juan Pérez");
        $doctor1->setHistorial($this->getReference('historial1', Historial::class));
        $manager->persist($doctor1);

        $doctor2 = new Doctor();
        $doctor2->setEspecialidad("Radiología");
        $doctor2->setNombre("María López");
        $doctor2->setHistorial($this->getReference('historial2', Historial::class));
        $manager->persist($doctor2);

        $doctor3 = new Doctor();
        $doctor3->setEspecialidad("Pediatría");
        $doctor3->setNombre("Firulais");
        $doctor3->setHistorial($this->getReference('historial3', Historial::class));
        $manager->persist($doctor3);

        $manager->flush();

        $this->addReference('doctor1', $doctor1);
        $this->addReference('doctor2', $doctor2);
        $this->addReference('doctor3', $doctor3);
    }

    public function getDependencies(): array
    {
        return [
            HistorialFixtures::class,
        ];
    }
}
