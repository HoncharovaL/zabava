<?php

namespace AppBundle\Controller;

use AppBundle\Entity\News;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {   $request = $this->get('translator')->getLocale();
        $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository('AppBundle:News')->findBy([], ['ndate' => 'DESC']);

        return $this->render('default/index.html.twig', array(
            'news' => $news,
            'loc'=>$request,
        ));
       
    }
    public function downloadImageAction(Image $image)
    {
        $downloadHandler = $this->get('vich_uploader.download_handler');

        return $downloadHandler->downloadObject($image, $fileField = 'photoFile');
    }
}
