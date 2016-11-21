<?php

namespace GfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GfctBundle\Entity\Profesores;
//use GfctBundle\Form\EmpresaType;
use Symfony\Component\HttpFoundation\Request;

class ProfesoresController extends Controller
{
    public function allAction()
    {
      $repository = $this->getDoctrine()->getRepository('GfctBundle:Profesores');
      // find *all* pro
      $pro = $repository->findAll();
      return $this->render('GfctBundle:Profesores:all.html.twig',array("profesores"=>$pro));
    }
}
