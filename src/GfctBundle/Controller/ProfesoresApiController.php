<?php

namespace GfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GfctBundle\Entity\Profesores;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProfesoresApiController extends Controller
{
  private function serializeEmpresa(Profesores $profesor)
   {//seleccionamos la info del entity Profesor
     return array(
         'id' => $profesor->getId(),
         'nombre' => $profesor->getNombre(),
         'apellido' => $profesor->getApellidos(),
         'departamento' => $profesor->getDepartamento(),

     );
   }
   public function JSONAction()
   {//generamos json
       $repository = $this->getDoctrine()->getRepository('GfctBundle:Profesores');
       $profesores = $repository->findAll();

       $data = array('profesores' => array());
       foreach ($profesores as $profesor) {
           $data['profesores'][] = $this->serializeEmpresa($profesor);
       }
       $response = new JsonResponse($data, 200);
       return $response;
   }

}
