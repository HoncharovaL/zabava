<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Services;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Comments;

/**
 * Service controller.
 *
 * @Route("services")
 */
class ServicesController extends Controller
{
    /**
     * Lists all service entities.
     *
     * @Route("/", name="services_index")
     * @Method("GET")
     */
    public function indexAction()
    {$request = $this->get('translator')->getLocale();
        $em = $this->getDoctrine()->getManager();

        $services = $em->getRepository('AppBundle:Services')->findAll();

        return $this->render('services/index.html.twig', array(
            'services' => $services,
            'loc'=>$request,
        ));
    }

    /**
     * Creates a new service entity.
     *
     * @Route("/new", name="services_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $service = new Services();
        $form = $this->createForm('AppBundle\Form\ServicesType', $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($service);
            $em->flush();

            return $this->redirectToRoute('services_show', array('idServices' => $service->getIdservices()));
        }

        return $this->render('services/new.html.twig', array(
            'service' => $service,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a service entity.
     *
     * @Route("/{idServices}", name="services_show")
     * @Method("GET")
     */
    public function showAction(Services $service,Request $request1)
    {   $request = $this->get('translator')->getLocale();
        $comment = new Comments();
        $form = $this->createForm('AppBundle\Form\CommentsType', $comment);
        $form->handleRequest($request1);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager(); 
            $comment->setIdServices($service);
            $dt = new DateTime();
            $comment->setCdate($dt);
            $em->persist($comment);
            $em->flush();
            $comment = new Comments();
        }
        
        return $this->render('services/show.html.twig', array(
            'service' => $service,
            'loc'=>$request,
            'comment' => $comment,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing service entity.
     *
     * @Route("/{idServices}/edit", name="services_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Services $service)
    {
        $deleteForm = $this->createDeleteForm($service);
        $editForm = $this->createForm('AppBundle\Form\ServicesType', $service);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('services_edit', array('idServices' => $service->getIdservices()));
        }

        return $this->render('services/edit.html.twig', array(
            'service' => $service,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a service entity.
     *
     * @Route("/{idServices}", name="services_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Services $service)
    {
        $form = $this->createDeleteForm($service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($service);
            $em->flush();
        }

        return $this->redirectToRoute('services_index');
    }

    /**
     * Creates a form to delete a service entity.
     *
     * @param Services $service The service entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Services $service)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('services_delete', array('idServices' => $service->getIdservices())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
