<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     * @Template()
     */
    public function index()
    {
        return [];
    }
}
