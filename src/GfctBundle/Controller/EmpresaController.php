<?php

namespace GfctBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GfctBundle\Entity\Empresa;
use GfctBundle\Form\EmpresaType;
use Symfony\Component\HttpFoundation\Request;

class EmpresaController extends Controller
{

  public function allAction()
  {
      $repository = $this->getDoctrine()->getRepository('GfctBundle:Empresa');
      // find *all* emp
      $emp = $repository->findAll();
      return $this->render('GfctBundle:Empresa:all.html.twig',array("empresa"=>$emp));
  }

  public function newAction(Request $request)
  {
    $empresa=new Empresa();
    $form=$this->createForm(EmpresaType::class,$empresa);

    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
      $empresa=$form->getData();

      $em=$this->getDoctrine()->getManager();
      $em->persist($empresa);
      $em->flush();

      //return $this->redirectToRoute('trask_success');
    }

    return $this->render('GfctBundle:Empresa:new.html.twig',array("form"=>$form->createView() ));
  }

}
