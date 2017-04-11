<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Dogs;
use AppBundle\Entity\Litters;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Dog controller.
 *
 * @Route("dogs")
 */
class DogsController extends Controller
{
    /**
     * Lists all dog entities.
     *
     * @Route("/", name="dogs_index")
     * @Method("GET")
     */
    public function indexAction()
    {
$em = $this->getDoctrine()->getManager();
$query = $em->createQuery(
    'SELECT d.name, d.bdate, d.description, d.photo, d.quality,	d.sex,	d.idDogs, n.nameNur
    FROM AppBundle:Dogs d
    left join d.nursery n
');


$dogs = $query->getResult();

 return $this->render('dogs/index.html.twig', array(
            'dogs' => $dogs,
        ));
    }

    /**
     * Creates a new dog entity.
     *
     * @Route("/new", name="dogs_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $dog = new Dogs();
        $form = $this->createForm('AppBundle\Form\DogsType', $dog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dog);
            $em->flush($dog);

            return $this->redirectToRoute('dogs_show', array('id' => $dog->getIdDogs()));
        }

        return $this->render('dogs/new.html.twig', array(
            'dog' => $dog,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a dog entity.
     *
     * @Route("/{id}", name="dogs_show")
     * @Method("GET")
     */
    public function showAction(Dogs $dog)
    {
        $deleteForm = $this->createDeleteForm($dog);

        return $this->render('dogs/show.html.twig', array(
            'dog' => $dog,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing dog entity.
     *
     * @Route("/{id}/edit", name="dogs_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Dogs $dog)
    {
        $deleteForm = $this->createDeleteForm($dog);
        $editForm = $this->createForm('AppBundle\Form\DogsType', $dog);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dogs_edit', array('id' => $dog->getIdDogs()));
        }

        return $this->render('dogs/edit.html.twig', array(
            'dog' => $dog,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a dog entity.
     *
     * @Route("/{id}", name="dogs_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Dogs $dog)
    {
        $form = $this->createDeleteForm($dog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dog);
            $em->flush();
        }

        return $this->redirectToRoute('dogs_index');
    }

    /**
     * Creates a form to delete a dog entity.
     *
     * @param Dogs $dog The dog entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Dogs $dog)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dogs_delete', array('id' => $dog->getIdDogs())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
