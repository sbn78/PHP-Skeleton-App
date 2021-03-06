<?php
/**
 * The PHP Skeleton App
 *
 * @author      Goran Halusa <gor@webcraftr.com>
 * @copyright   2015 Goran Halusa
 * @link        https://github.com/ghalusa/PHP-Skeleton-App
 * @license     https://github.com/ghalusa/PHP-Skeleton-App/wiki/License
 * @version     0.1.1
 * @package     PHP Skeleton App
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Find User Account
 *
 * Controller for the User Account module.
 *
 * @author      Goran Halusa <gor@webcraftr.com>
 * @since       0.1.0
 */

function find_user_account()
{
    $app = \Slim\Slim::getInstance();
    $final_global_template_vars = $app->config('final_global_template_vars');
    
    require_once $final_global_template_vars["absolute_path_to_this_module"] . "/models/user_account.class.php";
    $db_conn = new \PHPSkeleton\models\db($final_global_template_vars["db_connection"]);
    $db_resource = $db_conn->get_resource();
    $useraccount = new \PHPSkeleton\UserAccount($db_resource, $final_global_template_vars["session_key"]);
    $search = $app->request()->get("q");
    $results = $useraccount->find_user_account($search);
    echo json_encode($results);
    die();
}
