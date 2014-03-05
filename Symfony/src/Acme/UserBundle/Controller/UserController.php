<?php

namespace Acme\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/user")
 */
class UserController extends Controller {

    /**
     * @Route("/show", name="user_show")
     * @Template
     */
    public function indexAction() {
        $em = $this->get('doctrine')->getManager();
        $users = $em->getRepository('AcmeUserBundle:User')
        ->findAllOrderedByName();
        return array(
        'users' => $users
        );
    }

/**
 * @Route("/delete/{id}", name="user_delete")
 * 
 * @param \Symfony\Component\HttpFoundation\Request $request
 */
public function deleteAction(Request $request, $id = null) {
    if ($id) {
        $em = $this->get('doctrine')->getManager();
        $result = $em->getRepository('AcmeUserBundle:User')
                ->delete($id);
        if ($result) {
            $response = new RedirectResponse($this->generateUrl("user_show"));
            return $response;
        }
    } else {
        
    }
}

}
