<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DogVaccinations;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Dogvaccination controller.
 *
 * @Route("dogvaccinations")
 */
class DogVaccinationsController extends Controller
{
    /**
     * Lists all dogVaccination entities.
     *
     * @Route("/", name="dogvaccinations_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dogVaccinations = $em->getRepository('AppBundle:DogVaccinations')->findAll();

        return $this->render('dogvaccinations/index.html.twig', array(
            'dogVaccinations' => $dogVaccinations,
        ));
    }

    /**
     * Creates a new dogVaccination entity.
     *
     * @Route("/new", name="dogvaccinations_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $dogVaccination = new Dogvaccination();
        $form = $this->createForm('AppBundle\Form\DogVaccinationsType', $dogVaccination);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dogVaccination);
            $em->flush();

            return $this->redirectToRoute('dogvaccinations_show', array('idDogVac' => $dogVaccination->getIddogvac()));
        }

        return $this->render('dogvaccinations/new.html.twig', array(
            'dogVaccination' => $dogVaccination,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a dogVaccination entity.
     *
     * @Route("/{idDogVac}", name="dogvaccinations_show")
     * @Method("GET")
     */
    public function showAction(DogVaccinations $dogVaccination)
    {
        $deleteForm = $this->createDeleteForm($dogVaccination);

        return $this->render('dogvaccinations/show.html.twig', array(
            'dogVaccination' => $dogVaccination,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing dogVaccination entity.
     *
     * @Route("/{idDogVac}/edit", name="dogvaccinations_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DogVaccinations $dogVaccination)
    {
        $deleteForm = $this->createDeleteForm($dogVaccination);
        $editForm = $this->createForm('AppBundle\Form\DogVaccinationsType', $dogVaccination);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dogvaccinations_edit', array('idDogVac' => $dogVaccination->getIddogvac()));
        }

        return $this->render('dogvaccinations/edit.html.twig', array(
            'dogVaccination' => $dogVaccination,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a dogVaccination entity.
     *
     * @Route("/{idDogVac}", name="dogvaccinations_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DogVaccinations $dogVaccination)
    {
        $form = $this->createDeleteForm($dogVaccination);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dogVaccination);
            $em->flush();
        }

        return $this->redirectToRoute('dogvaccinations_index');
    }

    /**
     * Creates a form to delete a dogVaccination entity.
     *
     * @param DogVaccinations $dogVaccination The dogVaccination entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DogVaccinations $dogVaccination)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dogvaccinations_delete', array('idDogVac' => $dogVaccination->getIddogvac())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
