<?php

namespace BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryController extends Controller
{
    public $id;
    public $name;
    public $description;

    /**
     *  Matches /category and get category list
     *
     * @Route("/category", name="category_list")
     */
    public function indexAction()
    {
        $msg = 'Here is 5 categories from blog';
        return new JsonResponse(array(
            'msg' => $msg,
        ));
    }

    /**
     * Matches /category/* and get posts from category #{id}
     *
     * @Route("/category/{id}", name="category_show", requirements={"id": "\d+"})
     */
    public function showAction(Request $request)
    {
        if($request->get('id') < 1 || $request->get('id') > 5) {
            throw $this->createNotFoundException('Category #' . $request->get('id') . ' not found');
        }
        return new JsonResponse([
            'category' => [
                'name' => 'category # ' . $request->get('id') ,
                'count' => random_int(1, 10),
            ]
        ]);
    }

    /**
     *
     *
     * @Route("/category/add", name="category_add")
     */
    public function addAction(Request $request)
    {
        if ($request->getMethod() == 'PUT') {
            return new JsonResponse(array(
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ), 201);
        }
        return new JsonResponse(array(
            'msg' => 'create',
        ));
    }

    /**
     * Matches /post/*
     *
     * @Route("/category/{id}/edit", name="category_edit", requirements={"id": "\d+"})
     */
    public function editAction(Request $request)
    {
        if ($request->getMethod() == 'PATCH') {
            return new JsonResponse(array(
                'msg' => 'Edited post #' . $request->get('id'),
                'newname' => $request->get('name'),
                'newdescription' => $request->get('description'),
            ));
        }
        return new JsonResponse(array(
            'id' => $request->get('id')
        ));
    }

    /**
     * Matches /category/*
     *
     * @Route("/category/{id}/delete", name="category_delete", requirements={"id": "\d+"})
     */
    public function removeAction(Request $request)
    {
        if ($request->getMethod() == 'DELETE') {
            return new JsonResponse(array(
                'msg' => 'Deleted post #' . $request->get('id'),
            ));
        }
        return new JsonResponse();
    }
}