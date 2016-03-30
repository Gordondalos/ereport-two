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

        $u = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $ent = $em->getRepository('UserBundle:User')->find($u->getId());
        $role = $ent->getRoles();
        $isadmin = in_array('ROLE_ADMIN',$role);

        return $this->render('default/index.html.twig', array(
            'isadmin' => $isadmin,
        ));
    }

    public function settingsAction(Request $request)
    {
        return $this->render('default/settings.html.twig');
    }

    public function hooImAction(){
        $us  = $this -> getUser();
        //var_dump($us); //die;
        $locale = $this->get('request')->getLocale();

        return $this->render('AppBundle:Default:info_user.html.twig', array(
            'us' => $us,
            'locale'=>$locale,
        ));
    }



//    public function setRussianAction(){
//        $this->get('request')->setLocale('ru_Ru');
//        return $this->render('AppBundle:Default:info_user.html.twig', array(
//
//
//        ));
//    }



    public function isadminAction(){
        $us  = $this -> getUser();
        //var_dump($us); //die;

        $u = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $ent = $em->getRepository('UserBundle:User')->find($u->getId());
        $role = $ent->getRoles();
        $isadmin = in_array('ROLE_ADMIN',$role);
        return $this->render('AppBundle:Default:navigation.html.twig', array(
           'isadmin'=> $isadmin
        ));
    }



}
