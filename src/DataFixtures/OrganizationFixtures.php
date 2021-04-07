<?php

namespace App\DataFixtures;

use App\Entity\Organization;
use App\Entity\Jobs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class OrganizationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $job1 = new Jobs();
        $job1->setName('Software Developer');
        $job2 = new Jobs();
        $job2->setName('Frontend Developer');
        $job3 = new Jobs();
        $job3->setName('VM Technician');

        $organization1 = new Organization();
        $organization1->setName('TUDublin');
        $organization1->setHiringmanager('bobomurchu@tudublin.com');
        $organization1->setLocation('Clare');
        $organization1->setStaffno(1000);
        $organization2->setJob($job2);

        $organization2 = new Organization();
        $organization2->setName('Facebook');
        $organization2->setHiringmanager('markzuckerberg@facebook.com');
        $organization2->setLocation('Clare');
        $organization2->setStaffno(700);
        $organization2->setJob($job1);

        $organization3 = new Organization();
        $organization3->setName('Google');
        $organization3->setHiringmanager('sundarpichai@gmail.com');
        $organization3->setLocation('Clare');
        $organization3->setStaffno(900);
        $organization2->setJob($job3);

        $organization4 = new Organization();
        $organization4->setName('Amazon');
        $organization4->setHiringmanager('jeffbezos@amazon.com');
        $organization4->setLocation('Dublin');
        $organization4->setStaffno(350);
        $organization2->setJob($job1);

        $organization5 = new Organization();
        $organization5->setName('SAP');
        $organization5->setHiringmanager('billmcdermott@sap.com');
        $organization5->setLocation('Dublin');
        $organization5->setStaffno(20);
        $organization2->setJob($job3);

        $organization6 = new Organization();
        $organization6->setName('MongoDB');
        $organization6->setHiringmanager(' DevIttycheria@mongodb.com');
        $organization6->setLocation('Galway');
        $organization6->setStaffno(400);
        $organization2->setJob($job2);

        $manager->persist($job1);
        $manager->persist($job2);
        $manager->persist($job3);
        $manager->persist($organization1);
        $manager->persist($organization2);
        $manager->persist($organization3);
        $manager->persist($organization4);
        $manager->persist($organization5);
        $manager->persist($organization6);

        $manager->flush();
    }
}
