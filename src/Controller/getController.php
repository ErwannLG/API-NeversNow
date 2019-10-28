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
use App\Entity\Allverre;
use App\Entity\Alldech;
use App\Entity\Allwifi;
use App\Entity\Alltext;
use App\Entity\Allpmr;

class getController extends AbstractController {
    /** @Route("/{action}") */
    public function pmr($action) {

      $request = Request::createFromGlobals();

      $response = new Response();
      $response->headers->set('Content-Type', 'application/json');

      $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
      $match = true;

      if ($request->headers->get('app') != 'neversNow') {
        switch ($action) {
          case 'getPmr':
            $infos = $this->getDoctrine()->getRepository(Allpmr::class)->findAll();
            break;
          case 'getWifi':
            $infos = $this->getDoctrine()->getRepository(Allwifi::class)->findAll();
            break;
          case 'getDech':
            $infos = $this->getDoctrine()->getRepository(Alldech::class)->findAll();
            break;
          case 'getVerre':
            $infos = $this->getDoctrine()->getRepository(Allverre::class)->findAll();
            break;
          case 'getText':
            $infos = $this->getDoctrine()->getRepository(Alltext::class)->findAll();
            break;
          default:
            $match = false;
            break;
        }
      }

      if ($match) {
        $json = $serializer->serialize($infos, 'json');
        $response->setContent($json);
      }

      // $response->send();
      return $response;
    }
}
