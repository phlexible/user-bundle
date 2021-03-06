<?php

/*
 * This file is part of the phlexible package.
 *
 * (c) Stephan Wentz <sw@brainbits.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phlexible\Bundle\UserBundle\Controller;

use Phlexible\Bundle\GuiBundle\Response\ResultResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Options controller.
 *
 * @author Stephan Wentz <sw@brainbits.net>
 * @Route("/users/options")
 */
class OptionsController extends Controller
{
    /**
     * Save details.
     *
     * @param Request $request
     *
     * @return ResultResponse
     * @Route("/savedetails", name="users_options_savedetails")
     */
    public function savedetailsAction(Request $request)
    {
        $user = $this->getUser()
            ->setFirstname($request->request->get('firstname'))
            ->setLastname($request->request->get('lastname'))
            ->setEmail($request->request->get('email'));

        $this->get('phlexible_user.user_manager')->updateUser($user);

        return new ResultResponse(true, 'User details saved.');
    }

    /**
     * Save password.
     *
     * @param Request $request
     *
     * @return ResultResponse
     * @Route("/savepassword", name="users_options_savepassword")
     */
    public function savepasswordAction(Request $request)
    {
        $user = $this->getUser();

        if ($request->request->has('password')) {
            $user->setPlainPassword($request->request->get('password'));
        }

        $this->get('phlexible_user.user_manager')->updateUser($user);

        return new ResultResponse(true, 'User password saved.');
    }

    /**
     * Save preferences.
     *
     * @param Request $request
     *
     * @return ResultResponse
     * @Route("/savepreferences", name="users_options_savepreferences")
     */
    public function savepreferencesAction(Request $request)
    {
        $user = $this->getUser()
            ->setInterfaceLanguage($request->request->get('interfaceLanguage', 'en'));

        $this->get('phlexible_user.user_manager')->updateUser($user);

        return new ResultResponse(true, 'User preferences saved.');
    }

    /**
     * Save preferences.
     *
     * @param Request $request
     *
     * @return ResultResponse
     * @Route("/savetheme", name="users_options_savetheme")
     */
    public function savethemeAction(Request $request)
    {
        $user = $this->getUser()
            ->setProperty('theme', $request->request->get('theme', 'default'));

        $this->get('phlexible_user.user_manager')->updateUser($user);

        return new ResultResponse(true, 'User theme saved.');
    }
}
