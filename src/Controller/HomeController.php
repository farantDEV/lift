<?php
namespace App\Controller;

use App\Form\ContactType;
use App\Entity\Contact;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\component\HttpFoundation\Session\Session;

class HomeController extends Controller
{
   
    /**
     * @Route("/", name="index")
     */
    public function indexAction(Request $request)
    {
        $session = new Session();
		$contact = new contact();
		$form = $this->get('form.factory')->create(ContactType::class, $contact);
		
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			
			$em 			= $this->getDoctrine()->getManager();
			$em->persist($contact);
            $em->flush();
			
			$session->getFlashBag()->add('success', 'Your message have been send!');
			$session->clear();
			
			return $this->redirectToRoute('contact_send');
		}
		
		
		return $this->render('Home/index.html.twig', ['form' => $form->createView()] );
    }
 
    
	/**
     * @Route("/contactSend", name="contact_send")
     */
    public function contactSendAction()
    {
        return $this->render('contactSend.html.twig');
    }
	
	/**
     * @Route("/404", name="404_error")
     */
    public function ErrorRedirectionAction()
    {
        return $this->render('404.html.twig');
    }
	
	/**
     * @Route("/credits", name="app_credits")
     */
    public function CreditsAction()
    {
        return $this->render('credits.html.twig');
    }
	
	/**
     * @Route("/story", name="story")
     */
	 public function storyAction(Request $request)
    {
        $session = new Session();
		$contact = new contact();
		$form = $this->get('form.factory')->create(ContactType::class, $contact);
		
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			
			$em 			= $this->getDoctrine()->getManager();
			$em->persist($contact);
            $em->flush();
			
			$session->getFlashBag()->add('success', 'Your message have been send!');
			$session->clear();
			
			return $this->redirectToRoute('contact_send');
		}
		
		
		return $this->render('Story/story.html.twig', array('form' => $form->createView() ));
    }
}
