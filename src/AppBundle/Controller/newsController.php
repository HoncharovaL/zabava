<?php

namespace AppBundle\Controller;

use AppBundle\Entity\News;
use AppBundle\Entity\Videos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * News controller.
 *
 * @Route("news")
 */
class newsController extends Controller {

    /**
     * Lists all news entities.
     *
     * @Route("/", name="news_index")
     * @Method("GET")
     */
    public function indexAction(Request $newsType) {
        $em = $this->getDoctrine()->getManager();

        $news = $em->getRepository('AppBundle:News')->findBy(['newsType' => $newsType->get('newsType')]);


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
    public function newAction(Request $request, Request $request1) {
        $em = $this->getDoctrine()->getManager();
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
    public function showAction(news $news) {
        $em = $this->getDoctrine()->getManager();
        $request = $this->get('translator')->getLocale();
        $deleteForm = $this->createDeleteForm($news);
        $photos = $em->getRepository('AppBundle:DogsPhotos')->findBy(['idNews' => $news->getIdnews()]);
        $videos = $em->getRepository('AppBundle:Videos')->findBy(['idNews' => $news->getIdnews()]);
        return $this->render('news/show.html.twig', array(
                    'news' => $news,
                    'delete_form' => $deleteForm->createView(),
                    'loc' => $request,
                    'photos' => $photos,
                    'videos' => $videos,
        ));
    }

    /**
     * Displays a form to edit an existing news entity.
     *
     * @Route("/{idNews}/edit", name="news_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, News $news, Request $request1) {
        $em = $this->getDoctrine()->getManager();
        $deleteForm = $this->createDeleteForm($news);
        $originalVideos = new ArrayCollection();
        foreach ($news->getVideos() as $videos) {
            $originalVideos->add($videos);
        }
        $editForm = $this->createForm('AppBundle\Form\newsType', $news);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            foreach ($originalVideos as $video) {
                if (false === $news->getVideos()->contains($video)) {
                    $news->getVideos()->removeElement($video);
                    $em->remove($video);
                }
            }

            $this->getDoctrine()->getManager()->persist($news);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('news_edit', array(
                        'idNews' => $news->getIdnews(),
            ));
        }
        return $this->render('news/new.html.twig', array(
                    'news' => $news,
                    'form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a news entity.
     *
     * @Route("/{idNews}", name="news_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, news $news) {
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
    private function createDeleteForm(news $news) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('news_delete', array('idNews' => $news->getIdnews())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
