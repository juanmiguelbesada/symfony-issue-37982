<?php

namespace App\DataFixtures;

use App\Entity\Season;
use App\Entity\SeasonPrice;
use App\Entity\TicketType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $ticketTypes = [];
        foreach (['adults', 'children1', 'children2'] as $ticketType) {
            $ticketTypes[$ticketType] = (new TicketType())->setName($ticketType);
            $manager->persist($ticketTypes[$ticketType]);
        }

        $season = (new Season())
            ->setName("Test season")
            ->addPrice((new SeasonPrice())
                ->setTicketType($ticketTypes['adults'])
                ->setPrice(20)
            )
            ->addPrice((new SeasonPrice())
                ->setTicketType($ticketTypes['children1'])
                ->setPrice(10)
            )
            ->addPrice((new SeasonPrice())
                ->setTicketType($ticketTypes['children2'])
                ->setPrice(0)
            );

        $manager->persist($season);

        $manager->flush();
    }
}
