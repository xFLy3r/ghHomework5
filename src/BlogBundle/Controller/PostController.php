<?php

namespace BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{

    public $id;
    public $name;
    public $text;

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $msg = 'Here is 10 posts from blog';
        return new JsonResponse(array(
            'msg' => $msg,
        ));
    }

    /**
     * Matches /post/*
     *
     * @Route("/post/{id}", name="post_show", requirements={"id": "\d+"})
     */
    public function showAction(Request $request)
    {
        if($request->get('id') < 1 || $request->get('id') > 10) {
            throw $this->createNotFoundException('Post #' . $request->get('id') . ' not found');
        }
        return new JsonResponse([
            'blog' => [
                'name' => 'post # ' . $request->get('id') ,
                'text' => 'mytext # ' . $request->get('id'),
            ]
        ]);
    }


    /**
     * Matches /post/*
     *
     * @Route("/post/create", name="post_create")
     */
    public function createAction (Request $request)
    {
        if ($request->getMethod() == 'PUT') {
            return new JsonResponse(array(
                'name' => $request->get('name'),
            ), 201);
        }
        return new JsonResponse(array(
            'msg' => 'create',
        ));
    }

    /**
     * Matches /post/*
     *
     * @Route("/post/{id}/edit", name="post_edit", requirements={"id": "\d+"})
     */
    public function editAction (Request $request)
    {
        if ($request->getMethod() == 'PATCH') {
            return new JsonResponse(array(
                'msg' => 'Edited post #' . $request->get('id'),
                'newname' => $request->get('name'),
                'newtext' => $request->get('text'),
            ));
        }
        return new JsonResponse(array(
            'id' => $request->get('id')
        ));
    }

    /**
     * Matches /post/*
     *
     * @Route("/post/{id}/delete", name="post_delete", requirements={"id": "\d+"})
     */
    public function deleteAction (Request $request)
    {
        if ($request->getMethod() == 'DELETE') {
            return new JsonResponse(array(
                'msg' => 'Deleted post #' . $request->get('id'),
            ));
        }
        return new JsonResponse();
    }

}
