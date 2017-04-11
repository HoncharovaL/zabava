<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Nursery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Nursery controller.
 *
 * @Route("nursery")
 */
class NurseryController extends Controller
{
    /**
     * Lists all nursery entities.
     *
     * @Route("/", name="nursery_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $nurseries = $em->getRepository('AppBundle:Nursery')->findAll();

        return $this->render('nursery/index.html.twig', array(
            'nurseries' => $nurseries,
        ));
    }

    /**
     * Creates a new nursery entity.
     *
     * @Route("/new", name="nursery_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $nursery = new Nursery();
        $form = $this->createForm('AppBundle\Form\NurseryType', $nursery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nursery);
            $em->flush();

            return $this->redirectToRoute('nursery_show', array('idNursery' => $nursery->getIdnursery()));
        }

        return $this->render('nursery/new.html.twig', array(
            'nursery' => $nursery,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a nursery entity.
     *
     * @Route("/{idNursery}", name="nursery_show")
     * @Method("GET")
     */
    public function showAction(Nursery $nursery)
    {
        $deleteForm = $this->createDeleteForm($nursery);

        return $this->render('nursery/show.html.twig', array(
            'nursery' => $nursery,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing nursery entity.
     *
     * @Route("/{idNursery}/edit", name="nursery_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Nursery $nursery)
    {
        $deleteForm = $this->createDeleteForm($nursery);
        $editForm = $this->createForm('AppBundle\Form\NurseryType', $nursery);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('nursery_edit', array('idNursery' => $nursery->getIdnursery()));
        }

        return $this->render('nursery/edit.html.twig', array(
            'nursery' => $nursery,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a nursery entity.
     *
     * @Route("/{idNursery}", name="nursery_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Nursery $nursery)
    {
        $form = $this->createDeleteForm($nursery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($nursery);
            $em->flush();
        }

        return $this->redirectToRoute('nursery_index');
    }

    /**
     * Creates a form to delete a nursery entity.
     *
     * @param Nursery $nursery The nursery entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Nursery $nursery)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nursery_delete', array('idNursery' => $nursery->getIdnursery())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
