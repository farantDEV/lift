<?php

namespace App\Controller;
 
use App\Form\UserType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\component\HttpFoundation\Session\Session;

 
class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
		$session = new Session();
		
        $form = $this->createForm(UserType::class, $user);
 
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
 
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
 
            // Par defaut l'utilisateur aura toujours le rôle ROLE_USER
            $user->setRoles(['ROLE_USER']);
 
            // On enregistre l'utilisateur dans la base
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
			
			$session->getFlashBag()->add('success', 'Your account is active, please log in.'); 
            return $this->redirectToRoute('index');
        }
		else{
			$session->getFlashBag()->add('warning', 'Something must be wrong, please try again.');
			
		}
 
        return $this->render(
            'Security/register.html.twig',
            array('form' => $form->createView())
        );
    }
}
