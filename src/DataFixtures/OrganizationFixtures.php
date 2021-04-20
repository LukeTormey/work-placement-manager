<?php

namespace App\DataFixtures;

use App\Entity\Organization;
use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTime;


class OrganizationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $job1 = new Job();
        $job1->setName('Software Developer');
        $job1->setCompany('MongoDB');
        $job1->setAvailable(true);
        $job1->setDeadline( new DateTime('2021-10-16'));
        $job2 = new Job();
        $job2->setName('Frontend Developer');
        $job2->setCompany('Google');
        $job2->setAvailable(true);
        $job2->setDeadline( new DateTime('2021-09-21'));
        $job3 = new Job();
        $job3->setName('VM Technician');
        $job3->setCompany('TU Dublin');
        $job3->setAvailable(true);
        $job3->setDeadline( new DateTime('2021-12-10'));
        $job4 = new Job();
        $job4->setName('Marketing expert');
        $job4->setCompany('Facebook');
        $job4->setAvailable(true);
        $job4->setDeadline( new DateTime('2021-07-11'));
        $job5 = new Job();
        $job5->setName('Project Manager');
        $job5->setCompany('Amazon');
        $job5->setAvailable(true);
        $job5->setDeadline( new DateTime('2021-11-03'));
        $job6 = new Job();
        $job6->setName('IT Support Technican');
        $job6->setCompany('SAP');
        $job6->setAvailable(true);
        $job6->setDeadline( new DateTime('2021-12-15'));

        $manager->persist($job1);
        $manager->persist($job2);
        $manager->persist($job3);
        $manager->persist($job4);
        $manager->persist($job5);
        $manager->persist($job6);

        $organization1 = new Organization();
        $organization1->setName('TUDublin');
        $organization1->setHiringmanager('bobomurchu@tudublin.com');
        $organization1->setLocation('Clare');
        $organization1->setStaffno(1000);
        $organization1->setJob($job2);

        $organization2 = new Organization();
        $organization2->setName('Facebook');
        $organization2->setHiringmanager('markzuckerberg@facebook.com');
        $organization2->setLocation('Clare');
        $organization2->setStaffno(700);
        $organization2->setJob($job4);

        $organization3 = new Organization();
        $organization3->setName('Google');
        $organization3->setHiringmanager('sundarpichai@gmail.com');
        $organization3->setLocation('Clare');
        $organization3->setStaffno(900);
        $organization3->setJob($job2);

        $organization4 = new Organization();
        $organization4->setName('Amazon');
        $organization4->setHiringmanager('jeffbezos@amazon.com');
        $organization4->setLocation('Dublin');
        $organization4->setStaffno(350);
        $organization4->setJob($job5);

        $organization5 = new Organization();
        $organization5->setName('SAP');
        $organization5->setHiringmanager('billmcdermott@sap.com');
        $organization5->setLocation('Dublin');
        $organization5->setStaffno(20);
        $organization5->setJob($job6);

        $organization6 = new Organization();
        $organization6->setName('MongoDB');
        $organization6->setHiringmanager(' DevIttycheria@mongodb.com');
        $organization6->setLocation('Galway');
        $organization6->setStaffno(400);
        $organization6->setJob($job1);

        $manager->persist($organization1);
        $manager->persist($organization2);
        $manager->persist($organization3);
        $manager->persist($organization4);
        $manager->persist($organization5);
        $manager->persist($organization6);

        $manager->flush();
    }
}
