<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Historial;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HistorialFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $historial1 = new Historial();
        $historial1->setFecha(new \DateTime());
        $historial1->setPaciente("Juan Pérez");
        $historial1->setCodigoHistorial(1);
        $historial1->setEspecialista("Dr. Especialista 1");
        $historial1->setAlergias("Ninguna");
        $historial1->setAntecedentes("Ninguno");
        $historial1->setSintomas("Tos");
        $historial1->setDiagnostico("Resfriado");
        $manager->persist($historial1);
        
        $historial2 = new Historial();
        $historial2->setFecha(new \DateTime());
        $historial2->setPaciente("María López");
        $historial2->setCodigoHistorial(2);
        $historial2->setEspecialista("Dr. Especialista 2");
        $historial2->setAlergias("Ninguna");
        $historial2->setAntecedentes("Ninguno");
        $historial2->setSintomas("Vómitos");
        $historial2->setDiagnostico("Gastroenteritis");
        $manager->persist($historial2);
        
        $historial3 = new Historial();
        $historial3->setFecha(new \DateTime());
        $historial3->setPaciente("Firulais");
        $historial3->setCodigoHistorial(3);
        $historial3->setEspecialista("Dr. Especialista 3");
        $historial3->setAlergias("Polen");
        $historial3->setAntecedentes("Ninguno");
        $historial3->setSintomas("Estornudos");
        $historial3->setDiagnostico("Resfriado común");
        $manager->persist($historial3);

        $manager->flush();

        $this->addReference('historial1', $historial1);
        $this->addReference('historial2', $historial2);
        $this->addReference('historial3', $historial3);
    }
}
