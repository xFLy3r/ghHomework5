<?php

namespace BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{

    public $id;
    public $name;
    public $text;

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        // replace this example code with whatever you need
        return $this->render('post/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * Matches /post/*
     *
     * @Route("/post/{id}", name="post_show")
     */
    public function showAction($id)
    {
        return new Response(
            '<html><body>Here is post  #'.$id.'</body></html>'
        );
    }

    /**
     * Matches /post/*
     *
     * @Route("/post/create", name="post_create")
     */
    public function createAction ($name, $text)
    {
        //TODO
    }

    /**
     * Matches /post/*
     *
     * @Route("/post/{id}/edit", name="post_edit")
     */
    public function editAction ($id, $name, $text)
    {
        //TODO
    }

    /**
     * Matches /post/*
     *
     * @Route("/post/{id}/delete", name="post_delete")
     */
    public function deleteAction ($id)
    {
        //TODO
    }

}
