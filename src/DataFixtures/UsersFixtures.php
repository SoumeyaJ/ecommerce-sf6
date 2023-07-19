<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\Types\This;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker;
class UsersFixtures extends Fixture
{

public function __construct
(private UserPasswordHasherInterface $passwordEncoder)
{
    
}


    public function load(ObjectManager $manager): void
    {
       $admin = new Users();
       $admin->setEmail('admin@demo.fr');
       $admin->setLastname('Dupont');
       $admin->setFirstname('Brad');
       $admin->setAdress('12 rue des marins');
       $admin->setZipcode('75001');
       $admin->setCity('Paris');
       $admin->setPassword(
             $this->passwordEncoder->hashPassword($admin, 'admin')
       );
       $admin->setRoles(['ROLE_ADMIN']);

       $manager->persist($admin);


       $faker = Faker\Factory::create('fr_FR');

       for($usr = 1; $usr <= 5; $usr++) {
            
        $user = new Users();
        $user->setEmail($faker->email);
        $user->setLastname($faker->lastName);
        $user->setFirstname($faker->firstName);
        $user->setAdress($faker->streetAddress);
        $user->setZipcode(\str_replace(' ', '', $faker->postcode));
        $user->setCity($faker->city);
        $user->setPassword(
              $this->passwordEncoder->hashPassword($user, 'secret')
        );
        $user->setRoles(['ROLE_ADMIN']);
 
        $manager->persist($user);
       }

        $manager->flush();
    }
}
