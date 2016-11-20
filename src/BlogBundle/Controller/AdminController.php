<?php

namespace BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class AdminController extends Controller
{
    protected $username;
    protected $password;

    /**
     * Matches /login
     *
     * @Route("/login", name="login")
     */
    public function loginAction($username, $password)
    {
        $username = 'admin';
        return $this->render('admin/index.html.twig', [
            'message' => $username
        ]);
    }

}