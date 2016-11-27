<?php

namespace BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


class AdminController extends Controller
{
    protected $username;
    protected $password;

    /**
     * @Route("/admin", name="admin")
     */
    public function indexAction(Request $request)
    {
        //TODO;
        return new JsonResponse(array(
            'msg' => 'Hello admin!'
        ));
    }

    /**
     * Matches /admin/login
     *
     * @Route("/admin/login", name="login")
     */
    public function loginAction(Request $request)
    {
        if (($request->get('login'))) {
            if (($request->get('login') === 'admin') && ($request->get('password') === 'password')) {
                return new JsonResponse([
                    'admin' => [
                        'login' => $request->get('login'),
                        'password' => $request->get('password'),
                    ]
                ]);
            } else {
                throw $this->createAccessDeniedException('Access Denied');
            }
        }
        return new JsonResponse();
    }

}