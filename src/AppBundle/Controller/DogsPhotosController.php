<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DogsPhotos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Dogsphoto controller.
 *
 * @Route("dogsphotos")
 */
class DogsPhotosController extends Controller
{
    /**
     * Lists all dogsPhoto entities.
     *
     * @Route("/", name="dogsphotos_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dogsPhotos = $em->getRepository('AppBundle:DogsPhotos')->findAll();
        $videos = $em->getRepository('AppBundle:Videos')->findAll();
        return $this->render('dogsphotos/index.html.twig', array(
            'dogsPhotos' => $dogsPhotos,
            'videos' => $videos,
        ));
    }

    /**
     * Creates a new dogsPhoto entity.
     *
     * @Route("/new", name="dogsphotos_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $dogsPhoto = new Dogsphoto();
        $form = $this->createForm('AppBundle\Form\DogsPhotosType', $dogsPhoto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dogsPhoto);
            $em->flush();

            return $this->redirectToRoute('dogsphotos_show', array('idDogPh' => $dogsPhoto->getIddogph()));
        }

        return $this->render('dogsphotos/new.html.twig', array(
            'dogsPhoto' => $dogsPhoto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a dogsPhoto entity.
     *
     * @Route("/{idDogPh}", name="dogsphotos_show")
     * @Method("GET")
     */
    public function showAction(DogsPhotos $dogsPhoto)
    {
        $deleteForm = $this->createDeleteForm($dogsPhoto);

        return $this->render('dogsphotos/show.html.twig', array(
            'dogsPhoto' => $dogsPhoto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing dogsPhoto entity.
     *
     * @Route("/{idDogPh}/edit", name="dogsphotos_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DogsPhotos $dogsPhoto)
    {
        $deleteForm = $this->createDeleteForm($dogsPhoto);
        $editForm = $this->createForm('AppBundle\Form\DogsPhotosType', $dogsPhoto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dogsphotos_edit', array('idDogPh' => $dogsPhoto->getIddogph()));
        }

        return $this->render('dogsphotos/edit.html.twig', array(
            'dogsPhoto' => $dogsPhoto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a dogsPhoto entity.
     *
     * @Route("/{idDogPh}", name="dogsphotos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DogsPhotos $dogsPhoto)
    {
        $form = $this->createDeleteForm($dogsPhoto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dogsPhoto);
            $em->flush();
        }

        return $this->redirectToRoute('dogsphotos_index');
    }

    /**
     * Creates a form to delete a dogsPhoto entity.
     *
     * @param DogsPhotos $dogsPhoto The dogsPhoto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DogsPhotos $dogsPhoto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dogsphotos_delete', array('idDogPh' => $dogsPhoto->getIddogph())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
