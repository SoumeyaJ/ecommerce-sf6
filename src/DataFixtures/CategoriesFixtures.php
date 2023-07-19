<?php

namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categories;

class CategoriesFixtures extends Fixture
{
    private $counter = 1;
    public function load(ObjectManager $manager): void
    {
        //Créer un nouvel objet Categorie et Nourrir l'objet Categorie
        $parent = $this->createCategory('Informatique',null, $manager);

        $this->createCategory('Ordinateurs portables', $parent, $manager);
        $this->createCategory('Ecrans', $parent, $manager);
        $this->createCategory('Souris', $parent, $manager);

        $parent = $this->createCategory('Mode',null, $manager);

        $this->createCategory('Homme', $parent, $manager);
        $this->createCategory('Femme', $parent, $manager);
        $this->createCategory('Enfant', $parent, $manager);

        // pusher le tout dans la BDD
        $manager->flush();
    }

    public function createCategory(string $name, Categories $parent = null, ObjectManager $manager)
    {
        $category = new Categories();
        $category->setName($name);
        $category->setParent($parent);
        $manager->persist($category);
        //faire un return de la category de façon à récupérer si c'est un parent:


        $this->addReference('cat-'.$this->counter, $category);
        $this->counter++;
        return $category;
    }
   }