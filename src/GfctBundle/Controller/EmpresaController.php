<?php

namespace GfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EmpresaController extends Controller
{
  public function allAction()
  {
      $repository = $this->getDoctrine()->getRepository('GfctBundle:Empresa');
      // find *all* emp
      $emp = $repository->findAll();
      return $this->render('GfctBundle:Empresa:all.html.twig',array("empresa"=>$emp));
  }

}
