<?php

namespace App\DataFixtures;

use App\Entity\Campervan;
use App\Entity\Equipment;
use App\Entity\EquipmentQuantity;
use App\Entity\EquipmentQuantityPerDay;
use App\Entity\OrderEquipment;
use App\Entity\Order;
use App\Entity\Station;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Stations
        $madridStation = new Station();
        $madridStation->setName("Madrid Camp");
        $madridStation->setAddress("Plaza del Rey");
        $madridStation->setCity("Madrid");
        $madridStation->setCountry("Spain");
        $manager->persist($madridStation);

        $munichStation = new Station();
        $munichStation->setName("Munich Camp");
        $munichStation->setAddress("Markt Schwaben");
        $munichStation->setCity("Munich");
        $munichStation->setCountry("Germany");
        $manager->persist($munichStation);

        // Equipments
        $portableToilet = new Equipment();
        $portableToilet->setName("portable toilet");
        $manager->persist($portableToilet);

        $bedSheet = new Equipment();
        $bedSheet->setName("bed sheet");
        $manager->persist($bedSheet);

        // Equipment Quantities
        $eq1 = new EquipmentQuantity();
        $eq1->setStation($madridStation);
        $eq1->setEquipment($bedSheet);
        $eq1->setQuantity(200);
        $manager->persist($eq1);

        $eq2 = new EquipmentQuantity();
        $eq2->setStation($madridStation);
        $eq2->setEquipment($portableToilet);
        $eq2->setQuantity(50);
        $manager->persist($eq2);

        $eq3 = new EquipmentQuantity();
        $eq3->setStation($munichStation);
        $eq3->setEquipment($bedSheet);
        $eq3->setQuantity(100);
        $manager->persist($eq3);

        $eq4 = new EquipmentQuantity();
        $eq4->setStation($munichStation);
        $eq4->setEquipment($portableToilet);
        $eq4->setQuantity(70);
        $manager->persist($eq4);

        // Campervans
        $c1 = new Campervan();
        $c1->setStation($madridStation);
        $c1->setTargetPlate("MS1057");
        $manager->persist($c1);

        $c2 = new Campervan();
        $c2->setStation($madridStation);
        $c2->setTargetPlate("MS7078");
        $manager->persist($c2);

        $c3 = new Campervan();
        $c3->setStation($munichStation);
        $c3->setTargetPlate("MG9098");
        $manager->persist($c3);

        $c4 = new Campervan();
        $c4->setStation($munichStation);
        $c4->setTargetPlate("MG8089");
        $manager->persist($c4);

        //Orders
        $order1 = new Order();
        $order1->setCampervan($c3);
        $order1->setStartStation($munichStation);
        $order1->setEndStation($madridStation);
        $order1->setStartDate(new \DateTime("2021-07-01 10:00:00"));
        $order1->setEndDate(new \DateTime("2021-07-05 10:00:00"));
        $manager->persist($order1);

        $order2 = new Order();
        $order2->setCampervan($c1);
        $order2->setStartStation($madridStation);
        $order2->setEndStation($munichStation);
        $order2->setStartDate(new \DateTime("2021-07-01 10:00:00"));
        $order2->setEndDate(new \DateTime("2021-07-05 10:00:00"));
        $manager->persist($order2);

        // Order Equipments
        $orderEquipment1 = new OrderEquipment();
        $orderEquipment1->setParentOrder($order1);
        $orderEquipment1->setEquipment($bedSheet);
        $orderEquipment1->setQuantity(3);
        $manager->persist($orderEquipment1);

        $orderEquipment2 = new OrderEquipment();
        $orderEquipment2->setParentOrder($order1);
        $orderEquipment2->setEquipment($portableToilet);
        $orderEquipment2->setQuantity(1);
        $manager->persist($orderEquipment2);

        $orderEquipment3 = new OrderEquipment();
        $orderEquipment3->setParentOrder($order2);
        $orderEquipment3->setEquipment($bedSheet);
        $orderEquipment3->setQuantity(4);
        $manager->persist($orderEquipment3);

        $orderEquipment4 = new OrderEquipment();
        $orderEquipment4->setParentOrder($order2);
        $orderEquipment4->setEquipment($portableToilet);
        $orderEquipment4->setQuantity(1);
        $manager->persist($orderEquipment4);

        // Equipment Quantities Per Day
        $july1MunchenSheets = new EquipmentQuantityPerDay();
        $july1MunchenSheets->setEquipmentQuantity($eq3);
        $july1MunchenSheets->setBookingsCounter(3);
        $july1MunchenSheets->setDay(new \DateTime("2021-07-01 10:00:00"));
        $manager->persist($july1MunchenSheets);

        $july2MunchenSheets = new EquipmentQuantityPerDay();
        $july2MunchenSheets->setEquipmentQuantity($eq3);
        $july2MunchenSheets->setBookingsCounter(3);
        $july2MunchenSheets->setDay(new \DateTime("2021-07-02 10:00:00"));
        $manager->persist($july2MunchenSheets);

        $july3MunchenSheets = new EquipmentQuantityPerDay();
        $july3MunchenSheets->setEquipmentQuantity($eq3);
        $july3MunchenSheets->setBookingsCounter(3);
        $july3MunchenSheets->setDay(new \DateTime("2021-07-03 10:00:00"));
        $manager->persist($july3MunchenSheets);


        $july4MunchenSheets = new EquipmentQuantityPerDay();
        $july4MunchenSheets->setEquipmentQuantity($eq3);
        $july4MunchenSheets->setBookingsCounter(3);
        $july4MunchenSheets->setDay(new \DateTime("2021-07-04 10:00:00"));
        $manager->persist($july4MunchenSheets);

        $july5MunchenSheets = new EquipmentQuantityPerDay();
        $july5MunchenSheets->setEquipmentQuantity($eq3);
        $july5MunchenSheets->setBookingsCounter(3);
        $july5MunchenSheets->setDay(new \DateTime("2021-07-05 10:00:00"));
        $manager->persist($july5MunchenSheets);

        $july1MunchenWC = new EquipmentQuantityPerDay();
        $july1MunchenWC->setEquipmentQuantity($eq4);
        $july1MunchenWC->setBookingsCounter(1);
        $july1MunchenWC->setDay(new \DateTime("2021-07-01 10:00:00"));
        $manager->persist($july1MunchenWC);

        $july2MunchenWC = new EquipmentQuantityPerDay();
        $july2MunchenWC->setEquipmentQuantity($eq4);
        $july2MunchenWC->setBookingsCounter(1);
        $july2MunchenWC->setDay(new \DateTime("2021-07-02 10:00:00"));
        $manager->persist($july2MunchenWC);

        $july3MunchenWC = new EquipmentQuantityPerDay();
        $july3MunchenWC->setEquipmentQuantity($eq4);
        $july3MunchenWC->setBookingsCounter(1);
        $july3MunchenWC->setDay(new \DateTime("2021-07-03 10:00:00"));
        $manager->persist($july3MunchenWC);

        $july4MunchenWC = new EquipmentQuantityPerDay();
        $july4MunchenWC->setEquipmentQuantity($eq4);
        $july4MunchenWC->setBookingsCounter(1);
        $july4MunchenWC->setDay(new \DateTime("2021-07-04 10:00:00"));
        $manager->persist($july4MunchenWC);

        $july5MunchenWC = new EquipmentQuantityPerDay();
        $july5MunchenWC->setEquipmentQuantity($eq4);
        $july5MunchenWC->setBookingsCounter(1);
        $july5MunchenWC->setDay(new \DateTime("2021-07-05 10:00:00"));
        $manager->persist($july5MunchenWC);

        $july1MadridSheets = new EquipmentQuantityPerDay();
        $july1MadridSheets->setEquipmentQuantity($eq1);
        $july1MadridSheets->setBookingsCounter(4);
        $july1MadridSheets->setDay(new \DateTime("2021-07-01 10:00:00"));
        $manager->persist($july1MadridSheets);

        $july2MadridSheets = new EquipmentQuantityPerDay();
        $july2MadridSheets->setEquipmentQuantity($eq1);
        $july2MadridSheets->setBookingsCounter(4);
        $july2MadridSheets->setDay(new \DateTime("2021-07-02 10:00:00"));
        $manager->persist($july2MadridSheets);

        $july3MadridSheets = new EquipmentQuantityPerDay();
        $july3MadridSheets->setEquipmentQuantity($eq1);
        $july3MadridSheets->setBookingsCounter(4);
        $july3MadridSheets->setDay(new \DateTime("2021-07-03 10:00:00"));
        $manager->persist($july3MadridSheets);

        $july4MadridSheets = new EquipmentQuantityPerDay();
        $july4MadridSheets->setEquipmentQuantity($eq1);
        $july4MadridSheets->setBookingsCounter(4);
        $july4MadridSheets->setDay(new \DateTime("2021-07-04 10:00:00"));
        $manager->persist($july4MadridSheets);

        $july5MadridSheets = new EquipmentQuantityPerDay();
        $july5MadridSheets->setEquipmentQuantity($eq1);
        $july5MadridSheets->setBookingsCounter(4);
        $july5MadridSheets->setDay(new \DateTime("2021-07-05 10:00:00"));
        $manager->persist($july5MadridSheets);

        $july1MadridWC = new EquipmentQuantityPerDay();
        $july1MadridWC->setEquipmentQuantity($eq2);
        $july1MadridWC->setBookingsCounter(1);
        $july1MadridWC->setDay(new \DateTime("2021-07-01 10:00:00"));
        $manager->persist($july1MadridWC);

        $july2MadridWC = new EquipmentQuantityPerDay();
        $july2MadridWC->setEquipmentQuantity($eq2);
        $july2MadridWC->setBookingsCounter(1);
        $july2MadridWC->setDay(new \DateTime("2021-07-02 10:00:00"));
        $manager->persist($july2MadridWC);

        $july3MadridWC = new EquipmentQuantityPerDay();
        $july3MadridWC->setEquipmentQuantity($eq2);
        $july3MadridWC->setBookingsCounter(1);
        $july3MadridWC->setDay(new \DateTime("2021-07-03 10:00:00"));
        $manager->persist($july3MadridWC);

        $july4MadridWC = new EquipmentQuantityPerDay();
        $july4MadridWC->setEquipmentQuantity($eq2);
        $july4MadridWC->setBookingsCounter(1);
        $july4MadridWC->setDay(new \DateTime("2021-07-04 10:00:00"));
        $manager->persist($july4MadridWC);

        $july5MadridWC = new EquipmentQuantityPerDay();
        $july5MadridWC->setEquipmentQuantity($eq2);
        $july5MadridWC->setBookingsCounter(1);
        $july5MadridWC->setDay(new \DateTime("2021-07-05 10:00:00"));
        $manager->persist($july5MadridWC);

        $manager->flush();
    }

}
