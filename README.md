# skeleton-package-login

## Description

This library enables user login functionality for Skeleton


## Installation

Installation via composer:

    composer require tigron/skeleton-package-login

## Howto

Create a module in your application that extends from Skeleton\Package\Web\Module\User\Login

    <?php
	/**
	 * Module Login
	 *
	 * @author Christophe Gosiau <christophe@tigron.be>
	 * @author Gerry Demaret <gerry@tigron.be>
	 * @author David Vandemaele <david@tigron.be>
	 */

	use Skeleton\Package\Login\Web\Module\Login;

	class Web_Module_Login extends Login {

		/**
		 * The template
		 *
		 * @access public
		 */
		public $template = 'login.twig';
	}

Create a template for your module that injects the generated templates into your layout

	{% extends "_default/layout.base.twig" %}


	{% block header_js %}
		{% embed "@skeleton-package-login/javascript.twig" %}{% endembed %}
	{% endblock header_js %}

	{% block header_css %}
		{% embed "@skeleton-package-login/css.twig" %}{% endembed %}
	{% endblock header_css %}

	{% block content %}
		{% embed "@skeleton-package-login/content.twig" %}{% endembed %}
	{% endblock content %}


Create a route in your application Config.php

	/**
	 * Routes
	 */
	'routes' => [
		'web_module_login' => [
			'$language/login'
		],
	]
