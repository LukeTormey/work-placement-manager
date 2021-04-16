<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    private function createUser($username, $plainPassword, $role = 'ROLE_USER'):User
    {
        $user = new User();
        $user->setEmail($username);
        $user->setRole($role);

        // password - and encoding
        $encodedPassword = $this->passwordEncoder->encodePassword($user, $plainPassword);
        $user->setPassword($encodedPassword);
        return $user;
    }

    public function load(ObjectManager $manager)
    {
        // create objects
        $userUser = $this->createUser('user@user.com', 'user');
        $userMatt = $this->createUser('admin@admin.com', 'admin', 'ROLE_ADMIN');
        $userLuke = $this->createUser('lecturer@lecturer.com', 'lecturer', 'ROLE_LECTURER');
        $userJosh = $this->createUser('employer@employer.com', 'employer', 'ROLE_EMPLOYER');

        // add to DB queue
        $manager->persist($userUser);
        $manager->persist($userMatt);
        $manager->persist($userLuke);
        $manager->persist($userJosh);

        // send query to DB
        $manager->flush();
    }

}
