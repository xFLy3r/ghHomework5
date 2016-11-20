<?php

namespace BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public $id;
    public $name;
    public $description;

    /**
     * Matches /category
     *
     * @Route("/category", name="category_list")
     */
    public function indexAction()
    {
       //TODO;
        return new Response(
            '<html><body>Here are Categories</body></html>'
        );
    }

    /**
     * Matches /category/*
     *
     * @Route("/category/{id}", name="category_show")
     */
    public function showAction($id)
    {
        return new Response(
            '<html><body>Here are posts from category  #'.$id.'</body></html>'
        );
    }

    public function addAction($name, $description)
    {
        //TODO
    }

    public function editAction($id, $name, $description)
    {
        //TODO
    }

    public function removeAction($id)
    {
        //TODO
    }
}