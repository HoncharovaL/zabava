<?php

namespace AppBundle\Controller;

use AppBundle\Entity\News;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * News controller.
 *
 * @Route("news")
 */
class newsController extends Controller
{
    /**
     * Lists all news entities.
     *
     * @Route("/", name="news_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $news = $em->getRepository('AppBundle:News')->findAll();

        return $this->render('news/index.html.twig', array(
            'news' => $news,
        ));
    }

    /**
     * Creates a new news entity.
     *
     * @Route("/new", name="news_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $news = new News();
        $form = $this->createForm('AppBundle\Form\newsType', $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($news);
            $em->flush();

            return $this->redirectToRoute('news_show', array('idNews' => $news->getIdnews()));
        }

        return $this->render('news/new.html.twig', array(
            'news' => $news,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a news entity.
     *
     * @Route("/{idNews}", name="news_show")
     * @Method("GET")
     */
    public function showAction(news $news)
    {
        $request = $this->get('translator')->getLocale();
        $deleteForm = $this->createDeleteForm($news);

        return $this->render('news/show.html.twig', array(
            'news' => $news,
            'delete_form' => $deleteForm->createView(),
            'loc'=>$request,
        ));
    }

    /**
     * Displays a form to edit an existing news entity.
     *
     * @Route("/{idNews}/edit", name="news_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, news $news)
    {
        $deleteForm = $this->createDeleteForm($news);
        $editForm = $this->createForm('AppBundle\Form\newsType', $news);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('news_edit', array('idNews' => $news->getIdnews()));
        }

        return $this->render('news/edit.html.twig', array(
            'news' => $news,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a news entity.
     *
     * @Route("/{idNews}", name="news_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, news $news)
    {
        $form = $this->createDeleteForm($news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($news);
            $em->flush();
        }

        return $this->redirectToRoute('news_index');
    }

    /**
     * Creates a form to delete a news entity.
     *
     * @param news $news The news entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(news $news)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('news_delete', array('idNews' => $news->getIdnews())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
