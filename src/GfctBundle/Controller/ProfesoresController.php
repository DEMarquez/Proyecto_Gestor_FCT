<?php

namespace GfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GfctBundle\Entity\Profesores;
use GfctBundle\Form\ProfesoresType;
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
      $profesores=new Profesores();
      $form=$this->createForm(ProfesoresType::class,$profesores);

      $form->handleRequest($request);
      if($form->isSubmitted() && $form->isValid()){
        $profesores=$form->getData();

        $em=$this->getDoctrine()->getManager();
        $em->persist($profesores);
        $em->flush();

        //return $this->redirectToRoute('trask_success');
      }

      return $this->render('GfctBundle:Profesores:new.html.twig',array("form"=>$form->createView() ));
    }

}
