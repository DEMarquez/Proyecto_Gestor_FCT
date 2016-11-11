<?php

namespace GfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AlumnoController extends Controller
{

  public function allAction()
  {
      $repository = $this->getDoctrine()->getRepository('GfctBundle:Alumnos');
      // find *all* alumno
      $alumno = $repository->findAll();
      return $this->render('GfctBundle:Alumnos:all.html.twig',array("alumnos"=>$alumno));
  }


}
