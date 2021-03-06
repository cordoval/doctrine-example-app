<?php
namespace CarDealer\Basic;

use Doctrine\ORM\EntityManager;
use CarFramework\ConsoleScenario;
use CarDealer\Entity\Vehicle;

class BatchInsertScenario extends ConsoleScenario
{
    public function play(EntityManager $entityManager, array $input)
    {
        for ($i = 0; $i < 2000; $i++) {

            $vehicle = new Vehicle();
            $vehicle->setOffer("Brand New Audi A8 for just 80.000 €");
            $vehicle->setPrice(1000 * ($i % 100));
            $vehicle->setAdmission(new \DateTime( (1980 + rand(0, 32)) . "-01-01"));
            $vehicle->setKilometres(400 * rand(1, 10000));

            $entityManager->persist($vehicle);

            if ($i % 1000 == 0) {
                $entityManager->flush();
                $entityManager->clear();
            }
        }

        $entityManager->flush();
        $entityManager->clear();
    }
}

