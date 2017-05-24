<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comments;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * Comment controller.
 *
 * @Route("comments")
 */
class CommentsController extends Controller
{
    /**
     * Lists all comment entities.
     *
     * @Route("/", name="comments_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
        'SELECT c.idComments,c.cdate, c.klname, c.phone, c.email, c.question, s.services FROM AppBundle:Comments c, '
                . 'AppBundle:services s '
                . 'WHERE c.idNursery is null and c.idServices=s.idServices ' 
                . 'order by c.cdate desc');
        $comments = $query->getResult();
        $querydogs = $em->createQuery(
        'SELECT  c.idComments,c.klname, c.cdate,c.phone, c.email, c.question, d.name FROM AppBundle:Comments c, '
                . 'AppBundle:dogs d '
                . 'WHERE c.idNursery is null and c.idDogs=d.idDogs ' 
                . 'order by c.cdate desc');
        $commentsdogs = $querydogs->getResult();
        return $this->render('comments/index.html.twig', array(
            'comments' => $comments,
            'commentsdogs' => $commentsdogs,
        ));
    }

    /**
     * Creates a new comment entity.
     *
     * @Route("/new", name="comments_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $comment = new Comment();
        $form = $this->createForm('AppBundle\Form\CommentsType', $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('comments_show', array('idComments' => $comment->getIdcomments()));
        }

        return $this->render('comments/new.html.twig', array(
            'comment' => $comment,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a comment entity.
     *
     * @Route("/{idComments}", name="comments_show")
     * @Method("GET")
     */
    public function showAction(Comments $comment)
    {
        $deleteForm = $this->createDeleteForm($comment);

        return $this->render('comments/show.html.twig', array(
            'comment' => $comment,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing comment entity.
     *
     * @Route("/{idComments}/edit", name="comments_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Comments $comment)
    {
        $deleteForm = $this->createDeleteForm($comment);
        $editForm = $this->createForm('AppBundle\Form\CommentsType', $comment);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comments_edit', array('idComments' => $comment->getIdcomments()));
        }

        return $this->render('comments/edit.html.twig', array(
            'comment' => $comment,
            'form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a comment entity.
     *
     * @Route("/{idComments}", name="comments_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Comments $comment)
    {
        $form = $this->createDeleteForm($comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comment);
            $em->flush();
        }

        return $this->redirectToRoute('homepage');
    }

    /**
     * Creates a form to delete a comment entity.
     *
     * @param Comments $comment The comment entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Comments $comment)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comments_delete', array('idComments' => $comment->getIdcomments())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    /**
    * @param Comments $comment
    *
    * @Route("/{id}/entity-remove", requirements={"id" = "\d+"}, name="delete_route_name")
    * @return RedirectResponse
    *
    */
   public function deleteActionName(Comments $comment)
   {
        $em = $this->getDoctrine()->getManager();
        $em->remove($comment);
        $em->flush();
        return $this->redirectToRoute('comments_index');
    }
}
