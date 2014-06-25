<?php
/**
 * phlexible
 *
 * @copyright 2007 brainbits GmbH (http://www.brainbits.net)
 * @license   proprietary
 */

namespace Phlexible\Bundle\UserBundle\Password;

use Phlexible\Bundle\UserBundle\Entity\User;

/**
 * Password checker
 *
 * @author Stephan Wentz <sw@brainbits.net>
 */
class PasswordChecker
{
    /**
     * @param integer $minLength
     */
    public function __construct($minLength)
    {
        $this->minLength = $minLength;
    }

    /**
     * @param $password
     * @param User $user
     * @return boolean|string
     */
    public function test($password, User $user)
    {
        if ($this->minLength && strlen($password) < $this->minLength)
        {
            return 'Password too short';
        }

        return false;
    }
}