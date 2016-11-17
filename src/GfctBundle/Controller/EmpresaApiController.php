<?php

namespace GfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GfctBundle\Entity\Empresa;
use Symfony\Component\HttpFoundation\JsonResponse;

class EmpresaApiController extends Controller
{
  private function serializeEmpresa(Empresa $empresa)
   {
     return array(
         'id' => $empresa->getId(),
         'nombre' => $empresa->getNombre(),
         'direccion' => $empresa->getDireccion(),
         'cp' => $empresa->getCp(),
         'telefono1' => $empresa->getTelefono1(),
         'telefono2' => $empresa->getTelefono2(),
         'fechaCreacion' => $empresa->getFechaCreacion(),
     );
   }
   public function JSONAction()
   {
       $repository = $this->getDoctrine()->getRepository('GfctBundle:Empresa');
       $empresas = $repository->findAll();

       $data = array('empresas' => array());
       foreach ($empresas as $empresa) {
           $data['empresas'][] = $this->serializeEmpresa($empresa);
       }
       $response = new JsonResponse($data, 200);
       return $response;
   }

}
