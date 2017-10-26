<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Test;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $question1 = new Test();
        $question1->setQuestion("Avez-vous des difficultés à vous rappeler des événements de l’actualité récente ?");
        $manager->persist($question1);

        $question2 = new Test();
        $question2->setQuestion("Avez-vous des difficultés à suivre un film (ou une émission de TV ou un livre) parce que vous oubliez ce qui vient de se passer ?");
        $manager->persist($question2);

        $question3 = new Test();
        $question3->setQuestion("Vous arrive-t-il d’entrer dans une pièce et de ne plus savoir ce que vous venez chercher ?");
        $manager->persist($question3);

        $question4 = new Test();
        $question4->setQuestion("Vous arrive-t-il d’oublier de faire des choses importantes que vous aviez prévues ou que vous deviez faire (payer des factures, aller à un rendez-vous ou à une invitation) ?");
        $manager->persist($question4);

        $question5 = new Test();
        $question5->setQuestion("Avez-vous des difficultés à vous souvenir des numéros de téléphone habituels ?");
        $manager->persist($question5);

        $question6 = new Test();
        $question6->setQuestion("Oubliez-vous le nom ou le prénom des personnes qui vous sont familières ?");
        $manager->persist($question6);

        $question7 = new Test();
        $question7->setQuestion("Vous arrive-t-il de vous perdre dans des lieux familiers ?");
        $manager->persist($question7);

        $question8 = new Test();
        $question8->setQuestion("Vous arrive-t-il de ne plus savoir où sont rangés les objets usuels ?");
        $manager->persist($question8);

        $question9 = new Test();
        $question9->setQuestion("Vous arrive-t-il d’oublier d’éteindre le gaz (ou les plaques électriques, ou le robinet, ou la fermeture de la maison) ?");
        $manager->persist($question9);

        $question10 = new Test();
        $question10->setQuestion("Vous arrive-t-il de répéter plusieurs fois la même chose parce que vous oubliez l’avoir déjà dite ?");
        $manager->persist($question10);

        /*
        $question11 = new Test();
        $question11->setQuestion("Avez-vous des difficultés à retrouver des noms propres de personnes ou de lieux (acteurs connus, relations, lieux de vacances...) ?");
        $manager->persist($question11);

        $question12 = new Test();
        $question12->setQuestion("Avez-vous des difficultés à apprendre des choses nouvelles (jeux de cartes, nouvelle recette, mode d’emploi...) ?");
        $manager->persist($question12);

        $question13 = new Test();
        $question13->setQuestion("Avez-vous besoin de tout noter ?");
        $manager->persist($question13);

        $question14 = new Test();
        $question14->setQuestion("Vous arrive-t-il de perdre des objets ?");
        $manager->persist($question14);

        $question15 = new Test();
        $question15->setQuestion("Vous arrive-t-il d’oublier immédiatement ce que les gens viennent de vous dire ?");
        $manager->persist($question15);
        */

        $manager->flush();
    }
}