<?php
namespace App\Controller;

use App\Entity\Project;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ProjectRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\component\HttpFoundation\Session\Session;

class ProjectController extends Controller
{
	/**
     * @Route("/project", name="project")
	 * 
     */
    public function ProjectAction(Request $request)
    {
       	$repository = $this->getDoctrine()->getRepository(Project::class);
		$project = new Project;
		$projects = $repository->findAll();
		/*
		* Projects display
		*/
		foreach ($projects as $project){
			$project->getId();
			$project->getName();
			$project->getPresentation();
			$project->getImages();
			$project->getTools();
		}
		/*
		*Contact form
		*/
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
		
		return $this->render('Project/project.html.twig',[
			'projects'	=> $projects,
			'form' => $form->createView(),
		]);
    }
}
