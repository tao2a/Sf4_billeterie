<?php

namespace App\Controller;


use App\Entity\Visit;
use App\Form\VisitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;



class LouvreController extends Controller
{
    /**
     * @Route("/booking", name="booking")
     */
    public function addPurchaseAction(Request $request, SessionInterface $session)
    {

        $visit = new Visit();
        $visit = $session->get('visit', $visit);
        $form = $this->createForm(VisitType::class, $visit);
        $form->handleRequest($request);
        dump($session);

        if ($form->isSubmitted() && $form->isValid())
        {

            $session->set('visit', $visit);
            $em = $this->getDoctrine()->getManager();
            $em->persist($visit);
            $em->flush();

            return $this->redirectToRoute('booking');

        }
        return $this->render('booking/booking.html.twig', array('form' => $form->createView()));

    }

    /**
     * @param Request $request
     * @param SessionInterface $session
     * @return \Symfony\Component\HttpFoundation\Response
     *
     *
     */
//    public function viewCaddyAction(Request $request, SessionInterface $session)
//    {

////        $visit = $session->get('visit');
//

//        if ($session !== null) {
//            return $this->render('booking/caddy.html.twig', array(
//                'tickets' => $tickets,

//            ));
//        }else{
//            return $this->render('booking/booking.html.twig');
//        }
//    }

}