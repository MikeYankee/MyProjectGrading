<?php

namespace ConnexionBundle\Redirection;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class AfterLoginRedirection implements AuthenticationSuccessHandlerInterface
{
    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;

    /**
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @param Request $request
     * @param TokenInterface $token
     * @return RedirectResponse
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        // Get list of roles for current user
        $roles = $token->getRoles();
        // Tranform this list in array
        $rolesTab = array_map(function($role){
            return $role->getRole();
        }, $roles);
        // If is a admin or super admin we redirect to the backoffice area
        if (in_array('ROLE_ADMIN', $rolesTab, true) || in_array('ROLE_SUPER_ADMIN', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('accueil_admin'));
        elseif (in_array('ROLE_RESPONSABLE', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('visionner_details_heures'));
        elseif (in_array('ROLE_ENSEIGNANT', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('visionner_ets_jour'));
        elseif (in_array('ROLE_DELEGUE', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('creer_feuille_presence'));
        elseif (in_array('ROLE_ETUDIANT', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('visionner_cours_jour'));
        elseif (in_array('ROLE_CFA', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('visionner_details_heures'));
        elseif (in_array('ROLE_SECRETAIRE', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('visionner_ets_jour'));

        return $redirection;
    }
}