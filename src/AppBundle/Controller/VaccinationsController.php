<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Vaccinations;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Vaccination controller.
 *
 * @Route("vaccinations")
 */
class VaccinationsController extends Controller
{
    /**
     * Lists all vaccination entities.
     *
     * @Route("/", name="vaccinations_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vaccinations = $em->getRepository('AppBundle:Vaccinations')->findAll();

        return $this->render('vaccinations/index.html.twig', array(
            'vaccinations' => $vaccinations,
        ));
    }

    /**
     * Creates a new vaccination entity.
     *
     * @Route("/new", name="vaccinations_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vaccination = new Vaccinations();
        $form = $this->createForm('AppBundle\Form\VaccinationsType', $vaccination);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vaccination);
            $em->flush();

            return $this->redirectToRoute('vaccinations_show', array('idVaccinations' => $vaccination->getIdvaccinations()));
        }

        return $this->render('vaccinations/new.html.twig', array(
            'vaccination' => $vaccination,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vaccination entity.
     *
     * @Route("/{idVaccinations}", name="vaccinations_show")
     * @Method("GET")
     */
    public function showAction(Vaccinations $vaccination)
    {
        $deleteForm = $this->createDeleteForm($vaccination);

        return $this->render('vaccinations/show.html.twig', array(
            'vaccination' => $vaccination,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vaccination entity.
     *
     * @Route("/{idVaccinations}/edit", name="vaccinations_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Vaccinations $vaccination)
    {
        $deleteForm = $this->createDeleteForm($vaccination);
        $editForm = $this->createForm('AppBundle\Form\VaccinationsType', $vaccination);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vaccinations_edit', array('idVaccinations' => $vaccination->getIdvaccinations()));
        }

        return $this->render('vaccinations/edit.html.twig', array(
            'vaccination' => $vaccination,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vaccination entity.
     *
     * @Route("/{idVaccinations}", name="vaccinations_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Vaccinations $vaccination)
    {
        $form = $this->createDeleteForm($vaccination);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vaccination);
            $em->flush();
        }

        return $this->redirectToRoute('vaccinations_index');
    }

    /**
     * Creates a form to delete a vaccination entity.
     *
     * @param Vaccinations $vaccination The vaccination entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vaccinations $vaccination)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vaccinations_delete', array('idVaccinations' => $vaccination->getIdvaccinations())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
