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

    public function newAction(Request $request)
    {
      $empresa=new Profesores();
      $form=$this->createForm(ProfesoresType::class,$profesor);

      $form->handleRequest($request);
      if($form->isSubmitted() && $form->isValid()){
        $profesor=$form->getData();

        $em=$this->getDoctrine()->getManager();
        $em->persist($profesor);
        $em->flush();

        //return $this->redirectToRoute('trask_success');
      }

      return $this->render('GfctBundle:profesores:new.html.twig',array("form"=>$form->createView() ));
    }

}
