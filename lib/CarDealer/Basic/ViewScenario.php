<?php
namespace CarDealer\Basic;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Input\InputInterface;
use CarFramework\ConsoleScenario;

class ViewScenario extends ConsoleScenario
{
    public function play(EntityManager $entityManager, InputInterface $input)
    {
        $args = $input->getArgument("args");
        if (count($args) == 0) {
            throw new \InvalidArgumentException("Eine ID wird als Parameter erwartet!");
        }
        $id = $args[0];

        // 1. entity aus datenbank holen
        // 2. entity anzeigen
        $vehicle = $entityManager->find('CarDealer\Basic\Vehicle', $id);

        echo "The price is: " . $vehicle->getPrice() . "\n";
    }
}

