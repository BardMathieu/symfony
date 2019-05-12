<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog_index")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'owner' => 'Thomas',
        ]);
    }

    /**
     * @Route("/blog/show/{page}", name="blog_show", requirements={"page"="^[a-z0-9]+(?:-[a-z0-9]+)*$"}, methods={"GET"}, defaults={"page"="1"})
     *
     */
    public function show($page)
    {


        if($page === "1") {
            $page = "Article Sans Titre";
            return $this->render('blog/show.html.twig', [
                'page' => $page,
            ]);
        }else {
            $page=ucwords(implode(" ",explode("-",$page)));
            return $this->render('blog/show.html.twig', [
                'page' => $page,
            ]);
        }
    }
}