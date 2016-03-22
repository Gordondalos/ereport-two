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
        return $this->render('default/index.html.twig');
    }

    public function settingsAction(Request $request)
    {
        return $this->render('default/settings.html.twig');
    }

    public function reportsAction(Request $request)
    {
        return $this->render('default/report.html.twig');
    }

    public function hooImAction(){
        $us  = $this -> getUser();
        //var_dump($us); //die;

        return $this->render('AppBundle:Default:info_user.htnl.twig', array(
            'us' => $us,
        ));
    }
}
