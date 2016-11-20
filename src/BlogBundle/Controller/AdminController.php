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
     * @Route("/admin", name="admin")
     */
    public function indexAction()
    {
        //TODO;
        return new Response(
            '<html><body>Hello admin!</body></html>'
        );
    }

    /**
     * Matches /admin/login
     *
     * @Route("/admin/login", name="login")
     */
    public function loginAction($username, $password)
    {
        //TODO;
        return new Response(
            '<html><body>Here are fields for entering username and password</body></html>'
        );
    }

}