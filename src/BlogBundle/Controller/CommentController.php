<?php

namespace BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CommentController extends Controller
{
    public $id;
    public $name;
    public $text;

    /**
     * Show comments from post {id}
     *
     * @Route("/comment/{idPost}", name="comments_show", requirements={"idPost": "\d+"})
     */
    public function showAction(Request $request)
    {
        if($request->get('idPost') < 1 || $request->get('idPost') > 10) {
            throw $this->createNotFoundException('Comments for post #' . $request->get('idPost') . ' not found');
        }
        return new JsonResponse([
            'Comments' => [
                'name' => 'Comment name for post # ' . $request->get('idPost') ,
                'text' => 'Comment text for post # ' . $request->get('idPost'),
            ]
        ]);
    }

    /**
     * Add comment for post {idPost}
     *
     * @Route("/post/{idPost}/comment/add", name="comment_add", requirements={"idPost": "\d+"})
     */
    public function addAction(Request $request)
    {
        if ($request->getMethod() == 'PUT') {
        return new JsonResponse(array(
            'author' => $request->get('author'),
            'text' => $request->get('text'),
        ), 201);
    }
        return new JsonResponse(array(
            'msg' => 'create',
        ));
    }

    /**
     * Edit comment for post {id}
     *
     * @Route("/post/{idPost}/comment/{idComment}/edit", name="comment_edit", requirements={"idPost": "\d+", "idComment": "\d+"})
     */
    public function editAction(Request $request)
    {
        if ($request->getMethod() == 'PATCH') {
            return new JsonResponse(array(
                'msg' => 'Edited comment #' . $request->get('idComment') . ' from post #' . $request->get('idPost'),
                'text' => $request->get('text'),
            ));
        }
        return new JsonResponse(array(
            'idPost' => $request->get('idPost'),
            'idComment' => $request->get('idComment'),
        ));
    }
    /**
     * Matches /post/*
     *
     * @Route("/post/{idPost}/comment/{idComment}/remove", name="comment_delete", requirements={"idPost": "\d+", "idComment": "\d+"})
     */
    public function removeAction(Request $request)
    {
        if ($request->getMethod() == 'DELETE') {
            return new JsonResponse(array(
                'msg' => 'Deleted comment #' . $request->get('idComment') . ' from post #' . $request->get('idPost'),
            ));
        }
        return new JsonResponse();
    }
}