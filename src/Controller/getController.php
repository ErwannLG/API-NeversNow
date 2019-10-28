<?php

namespace App\Controller;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;
use App\Entity\Allwifi;
use App\Entity\Allpmr;

class getController extends AbstractController {
    /** @Route("/{action}") */
    public function pmr($action) {

      if ($action != 'favicon.ico') {
        $request = Request::createFromGlobals();
        $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
        if ($request->headers->get('app') == 'neversNow') {
          switch ($action) {
            case 'getPmr':
              $infos = $this->getDoctrine()->getRepository(Allpmr::class)->findAll();

              $json = $serializer->serialize($infos, 'json');

              $response = new Response();
              $response->setContent($json);
              $response->headers->set('Content-Type', 'application/json');
              $response->send();

              return $response;
              break;
            case 'getWifi':
              $infos = $this->getDoctrine()->getRepository(Allwifi::class)->findAll();

              $json = $serializer->serialize($infos, 'json');

              $response = new Response();
              $response->setContent($json);
              $response->headers->set('Content-Type', 'application/json');
              $response->send();

              return $response;
              break;
            case 'getDech':
              $infos = $this->getDoctrine()->getRepository(Alldech::class)->findAll();

              $json = $serializer->serialize($infos, 'json');

              $response = new Response();
              $response->setContent($json);
              $response->headers->set('Content-Type', 'application/json');
              $response->send();

              return $response;
              break;
            default:
              break;
          }
        }
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->send();
        return $response;
      }
    }
}
