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
    public function index(Request $request)
    {
        $session = new Session();
		$contact = new contact();
		$form = $this->get('form.factory')->create(ContactType::class, $contact);
		
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			
			$em 			= $this->getDoctrine()->getManager();
			$em->persist($contact);
            $em->flush();
			
			$session->getFlashBag()->add('success', 'Votre message a été envoyé !');
			$session->clear();
			
			return $this->redirectToRoute('contact_send');
		}
		
		
		return $this->render('App/index.html.twig', array('form' => $form->createView() ));
    }
 
    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('Admin/index.html.twig');
    }
	/**
     * @Route("/contactSend", name="contact_send")
     */
    public function contactSend()
    {
        return $this->render('App/contactSend.html.twig');
    }
	
	/**
     * @Route("/404", name="404_error")
     */
    public function ErrorRedirection()
    {
        return $this->render('App/404.html.twig');
    }
}
