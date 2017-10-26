<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle:Home:index.html.twig', array(

        ));
    }

    /**
     * @Route("/questionnaire", name="questionnaire")
     */
    public function questionnaireAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $test = $em->getRepository('AppBundle:Test')->findAll();

        $resultat = 0;

        if ($request->isMethod('POST'))
        {
            foreach($test as $t)
            {
                $question = $request->request->get($t->getId());

                if ($question == '1')
                {
                    ++$resultat;
                }
            }

            return $this->render('AppBundle:Test:index.html.twig', array(
                'resultat' => $resultat
            ));
        }

        return $this->render('AppBundle:Test:index.html.twig', array(
            'test' => $test
        ));
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        //$form = $this->createForm(UserType::class, $user);
        $form = $this->createForm(UserType::class, $user);
        $form->add('submit', SubmitType::class, array(
            'label' => 'S inscrire',
            'attr'  => array('class' => 'btn btn-default pull-right')
        ));

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Utilisateur enregistré !');

            return $this->redirectToRoute('home');
        }

        return $this->render('AppBundle:User:register.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
