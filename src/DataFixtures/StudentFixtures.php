<?php

namespace App\DataFixtures;

use App\Entity\Cv;
use App\Entity\Student;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StudentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $email1 = new User();
        $email1->setEmail("myemail@user.com");

        $cv1 = new Cv();
        $cv1->setName("John Doe");
        $cv1->setAddress("23 Somewhereville, Dublin");
        $cv1->setCollege("Trinity College");
        $cv1->setDegree("Master of Digital Marketing");
        $cv1->setDOB(new DateTime('1998-10-16'));
        $cv1->setReferees("Tony Holohan 0873333214");
        $cv1->setImage("student1.png");

        $manager->persist($cv1);

        $student1 = new Student();
        $student1->setStudentno(B00103993);
        $student1->setEmployed(false);
        $student1->setEmail($email1);
        $student1->setCv($cv1);

        $manager->persist($cv1);
        $manager->flush();
    }
}
