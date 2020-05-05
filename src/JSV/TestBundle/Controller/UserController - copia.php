<?php

namespace JSV\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function indexAction()
    {
        $ver   = $this->getDoctrine() ->getManager();

        $users = $ver->getRepository('JSVTestBundle:User')->findAll();

        $res = 'Lista de usuarios: <br />';

        foreach ($users as $index => $user) {
            $res .= 'Usuario: '.$user->getUsername().' Email: '.$user->getEmail().'<br />';
        }
        return new Response($res);
    }
    public function viewAction($id)
    {
        $ver   = $this->getDoctrine() ->getManager();

        $repository = $ver->getRepository('JSVTestBundle:User');

        //$user = $repository->findOneById($id);
        $user = $repository->find($id);
        //$user = $repository->findOneByUsername($id);

        return new Response('Usuario: '.$user->getUsername().' Email: '.$user->getEmail());
    }
}
