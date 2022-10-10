<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @method User getUser()
 */
abstract class BaseController extends AbstractController
{
    /*
     * This class is only for development purposes so that a developer will get the User class back
     * when working with user objects in the other controllers.   This is similar to Ryan Weaver's
     * in Symfonycasts.
     */

}