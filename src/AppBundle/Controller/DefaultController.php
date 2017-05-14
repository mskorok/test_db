<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     * @param Request $request
     * @return array
     */
    public function indexAction(Request $request)
    {

        return [];
    }

    /**
     * @Route("/api", name="add-visitor")
     * @param Request $request
     * @return JsonResponse
     *
     */
    public function apiAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $re = realpath($this->getParameter('kernel.root_dir').'/..')
                .DIRECTORY_SEPARATOR.'app/Resources/data/response.json';
            $content = file_get_contents($re);
            $jsonContent = (array) json_decode($content, true);
            return new JsonResponse($jsonContent);
        } else {
            return new JsonResponse(['response' => 'not XmlHttp']);
        }
    }
}
