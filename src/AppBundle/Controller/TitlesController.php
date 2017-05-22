<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Titles;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Title controller.
 *
 * @Route("titles")
 */
class TitlesController extends Controller
{

    /**
     * Lists all title entities.
     *
     * @Route("/", name="titles_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $titles = $em->getRepository('AppBundle:Titles')->findAll();

        return $this->render('titles/index.html.twig', array(
                    'titles' => $titles,
        ));
    }

    /**
     * Creates a new title entity.
     *
     * @Route("/new", name="titles_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $title = new Titles();
        $form = $this->createForm('AppBundle\Form\TitlesType', $title);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($title);
            $em->flush();

            return $this->redirectToRoute('titles_index');
        }

        return $this->render('titles/new.html.twig', array(
                    'title' => $title,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a title entity.
     *
     * @Route("/{idTitles}", name="titles_show")
     * @Method("GET")
     */
    public function showAction(Titles $title)
    {
        $deleteForm = $this->createDeleteForm($title);

        return $this->render('titles/show.html.twig', array(
                    'title' => $title,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing title entity.
     *
     * @Route("/{idTitles}/edit", name="titles_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Titles $title)
    {
        $deleteForm = $this->createDeleteForm($title);
        $editForm = $this->createForm('AppBundle\Form\TitlesType', $title);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('titles_index');
        }

        return $this->render('titles/edit.html.twig', array(
                    'title' => $title,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a title entity.
     *
     * @Route("/{idTitles}", name="titles_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Titles $title)
    {
        $form = $this->createDeleteForm($title);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($title);
            $em->flush();
        }

        return $this->redirectToRoute('titles_index');
    }

    /**
     * Deletes a title entity.
     *
     * @Route("/{idTitles}/delete", name="titles_delete_href")
     */
    public function deletehrefAction(Request $request, Titles $title)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($title);
        $em->flush();


        return $this->redirectToRoute('titles_index');
    }

    /**
     * Creates a form to delete a title entity.
     *
     * @param Titles $title The title entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Titles $title)
    {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('titles_delete', array('idTitles' => $title->getIdtitles())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
