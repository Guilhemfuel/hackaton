<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
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
}
