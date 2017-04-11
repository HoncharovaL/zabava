<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DogTitles;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Dogtitle controller.
 *
 * @Route("dogtitles")
 */
class DogTitlesController extends Controller
{
    /**
     * Lists all dogTitle entities.
     *
     * @Route("/", name="dogtitles_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dogTitles = $em->getRepository('AppBundle:DogTitles')->findAll();

        return $this->render('dogtitles/index.html.twig', array(
            'dogTitles' => $dogTitles,
        ));
    }

    /**
     * Creates a new dogTitle entity.
     *
     * @Route("/new", name="dogtitles_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $dogTitle = new Dogtitle();
        $form = $this->createForm('AppBundle\Form\DogTitlesType', $dogTitle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dogTitle);
            $em->flush();

            return $this->redirectToRoute('dogtitles_show', array('idDogTit' => $dogTitle->getIddogtit()));
        }

        return $this->render('dogtitles/new.html.twig', array(
            'dogTitle' => $dogTitle,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a dogTitle entity.
     *
     * @Route("/{idDogTit}", name="dogtitles_show")
     * @Method("GET")
     */
    public function showAction(DogTitles $dogTitle)
    {
        $deleteForm = $this->createDeleteForm($dogTitle);

        return $this->render('dogtitles/show.html.twig', array(
            'dogTitle' => $dogTitle,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing dogTitle entity.
     *
     * @Route("/{idDogTit}/edit", name="dogtitles_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DogTitles $dogTitle)
    {
        $deleteForm = $this->createDeleteForm($dogTitle);
        $editForm = $this->createForm('AppBundle\Form\DogTitlesType', $dogTitle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dogtitles_edit', array('idDogTit' => $dogTitle->getIddogtit()));
        }

        return $this->render('dogtitles/edit.html.twig', array(
            'dogTitle' => $dogTitle,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a dogTitle entity.
     *
     * @Route("/{idDogTit}", name="dogtitles_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DogTitles $dogTitle)
    {
        $form = $this->createDeleteForm($dogTitle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dogTitle);
            $em->flush();
        }

        return $this->redirectToRoute('dogtitles_index');
    }

    /**
     * Creates a form to delete a dogTitle entity.
     *
     * @param DogTitles $dogTitle The dogTitle entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DogTitles $dogTitle)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dogtitles_delete', array('idDogTit' => $dogTitle->getIddogtit())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
