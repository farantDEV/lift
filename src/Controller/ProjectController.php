<?php
namespace App\Controller;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\component\HttpFoundation\Session\Session;

class ProjectController extends Controller
{
	/**
     * @Route("/project", name="project")
	 * 
     */
    public function ProjectAction()
    {
       	$repository = $this->getDoctrine()->getRepository(Project::class);
		$project = new Project;
		$projects = $repository->findAll();
		
		foreach ($projects as $project){
			$project->getName();
			$project->getPresentation();
		}
		
		return $this->render('Project/allProjects.html.twig',[
			'projects'	=> $projects,
		]);
    }
}