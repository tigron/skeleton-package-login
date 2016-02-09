<?php
/**
 * Module Login
 *
 * @author Christophe Gosiau <christophe@tigron.be>
 * @author David Vandemaele <david@tigron.be>
 * @author Gerry Demaret <gerry@tigron.be>
 */

namespace Skeleton\Package\Web\Module\User;

use \Skeleton\Core\Web\Template;
use \Skeleton\Core\Web\Module;
use \Skeleton\Core\Web\Session;

class Login extends Module {

	/**
	 * Login required ?
	 * Default = yes
	 *
	 * @access public
	 * @var bool $login_required
	 */
	public $login_required = false;

	/**
	 * Template to use
	 *
	 * @access public
	 * @var string $template
	 */
	public $template = '@skeleton-package-user-login\login.twig';

	/**
	 * Display method
	 *
	 * @access public
	 */
	public function display() {
		if (isset($_POST['username']) AND isset($_POST['password'])) {
			try {
				$user = \User::authenticate($_POST['username'], $_POST['password']);
				$_SESSION['user'] = $user;
				Session::redirect('/');
			} catch (\Exception $e) {
				Template::get()->assign('error', true);
			}
		}
	}

	/**
	 * Logout
	 *
	 * @access public
	 */
	public function display_logout() {
		Session::destroy();
		Session::redirect('/');
	}
}
