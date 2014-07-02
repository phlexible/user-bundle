<?php
/**
 * phlexible
 *
 * @copyright 2007-2013 brainbits GmbH (http://www.brainbits.net)
 * @license   proprietary
 */

namespace Phlexible\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Resources controller
 *
 * @author Stephan Wentz <sw@brainbits.net>
 */
class ResourcesController extends Controller
{
    /**
     * Return user javascripts
     *
     * @return Response
     */
    public function scriptsAction()
    {
        $content = '';
        $content .= file_get_contents(__DIR__ . '/../Resources/scripts/ChangePasswordWindow.js');
        $content .= file_get_contents(__DIR__ . '/../Resources/scripts/ValidateWindow.js');
        $content .= file_get_contents(__DIR__ . '/../Resources/scripts/SetPasswordWindow.js');

        return new Response($content, 200, array('Content-Type' => 'text/javascript'));
    }

    /**
     * Return user stylesheets
     *
     * @return Response
     */
    public function stylesAction()
    {
        $content = file_get_contents(__DIR__ . '/../Resources/styles/users.css');

        return new Response($content, 200, array('Content-Type' => 'text/css'));
    }

    /**
     * Return users icons
     *
     * @return Response
     */
    public function iconsAction()
    {
        $content = '';

        return new Response($content, 200, array('Content-Type' => 'text/css'));
    }

    /**
     * Return users translations
     *
     * @param string $language
     *
     * @return Response
     */
    public function translationsAction($language)
    {
        $language = $this->getUser()->getInterfaceLanguage($language);

        $translations = $this->get('resourcesTranslations');
        $content = $translations->get($language);

        return new Response($content, 200, array('Content-Type' => 'text/javascript'));
    }
}
