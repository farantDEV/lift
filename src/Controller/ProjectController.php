<?php
namespace App\Controller;

use App\Form\ProjectType;
use App\Entity\Project;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\component\HttpFoundation\Session\Session;

class ProjectController extends Controller
{
	/**
     * @Route("/project", name="project")
     */
    public function contactSend()
    {
        return $this->render('Project/project.html.twig');
    }
	
}