<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Litters;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Litter controller.
 *
 * @Route("litters")
 */
class LittersController extends Controller
{
    /**
     * Lists all litter entities.
     *
     * @Route("/", name="litters_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $litters = $em->getRepository('AppBundle:Litters')->findAll();

        return $this->render('litters/index.html.twig', array(
            'litters' => $litters,
        ));
    }

    /**
     * Creates a new litter entity.
     *
     * @Route("/new", name="litters_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $litter = new Litters();
        $form = $this->createForm('AppBundle\Form\LittersType', $litter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($litter);
            $em->flush();

            return $this->redirectToRoute('litters_show', array('idLitters' => $litter->getIdlitters()));
        }

        return $this->render('litters/new.html.twig', array(
            'litter' => $litter,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a litter entity.
     *
     * @Route("/{idLitters}", name="litters_show")
     * @Method("GET")
     */
    public function showAction(Litters $litter)
    {
        $deleteForm = $this->createDeleteForm($litter);

        return $this->render('litters/show.html.twig', array(
            'litter' => $litter,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing litter entity.
     *
     * @Route("/{idLitters}/edit", name="litters_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Litters $litter)
    {
        $deleteForm = $this->createDeleteForm($litter);
        $editForm = $this->createForm('AppBundle\Form\LittersType', $litter);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('litters_edit', array('idLitters' => $litter->getIdlitters()));
        }

        return $this->render('litters/edit.html.twig', array(
            'litter' => $litter,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a litter entity.
     *
     * @Route("/{idLitters}", name="litters_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Litters $litter)
    {
        $form = $this->createDeleteForm($litter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($litter);
            $em->flush();
        }

        return $this->redirectToRoute('litters_index');
    }

    /**
     * Creates a form to delete a litter entity.
     *
     * @param Litters $litter The litter entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Litters $litter)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('litters_delete', array('idLitters' => $litter->getIdlitters())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
