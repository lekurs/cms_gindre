<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 23/10/2018
 * Time: 14:48
 */

namespace App\Domain\Security;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;

class UserAuthenticationGuard extends AbstractFormLoginAuthenticator
{
    const ALLOW_URL = ['administrator'];

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEndoder;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * UserAuthenticationGuard constructor.
     * @param UserPasswordEncoderInterface $passwordEndoder
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(UserPasswordEncoderInterface $passwordEndoder, UrlGeneratorInterface $urlGenerator)
    {
        $this->passwordEndoder = $passwordEndoder;
        $this->urlGenerator = $urlGenerator;
    }

    public function supports(Request $request): bool
    {
        if (in_array($request->attributes->get('_route'), static::ALLOW_URL) && 'POST' === $request->getMethod()) {
            return true;
        }

        return false;
    }

    public function getCredentials(Request $request)
    {
        return [
            'username' => $request->request->get('login_form')["username"],
            'password' => $request->request->get('login_form')["password"],
        ];
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        if (!$credentials['username'] || !$credentials['password']) {
            return;
        }

        return $userProvider->loadUserByUsername($credentials['username']);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        return $this->passwordEndoder->isPasswordValid($user, $credentials['password']);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $data = [
            'message' => 'Erreur d\'authentification !',
        ];

        return new Response($data['message'], Response::HTTP_FORBIDDEN);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        if (in_array('ROLE_ADMIN', $token->getUser()->getRoles())) {
            return new RedirectResponse($this->urlGenerator->generate('admin'));
        }

        $token->getUser();
    }

    public function supportsRememberMe(): bool
    {
        return false;
    }

    public function getLoginUrl()
    {
        return $this->urlGenerator->generate('administrator');
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        return parent::start($request, $authException);
    }
}
