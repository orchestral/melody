<?php

use Orchestra\Site,
	Orchestra\View;

class Melody_Themes_Controller extends Controller {

	/**
	 * Use restful verb.
	 * 
	 * @var boolean
	 */
	public $restful = true;

	/**
	 * Show a welcome page for Theme Manager
	 *
	 * GET (orchestra)/manages/melody.themes
	 *
	 * @access public
	 * @return Response
	 */
	public function get_index()
	{
		Site::set('title', 'Themes Manager');

		return View::make('melody::home');
	}

	/**
	 * Show frontend theme for Orchestra
	 *
	 * GET (orchestra)/manages/melody.themes/frontend
	 *
	 * @access public
	 * @return Response
	 */
	public function get_frontend()
	{
		$current_theme = Orchestra::memory()->get('site.theme.frontend');
		$themes        = Melody\Theme::detect();
		$type          = 'frontend';

		Site::set('title', 'Frontend Themes Manager');

		return View::make('melody::themes.list', compact(
			'current_theme',
			'type',
			'themes'
		));
	}

	/**
	 * Show backend theme for Orchestra
	 *
	 * GET (orchestra)/manages/melody.themes/backend
	 *
	 * @access public
	 * @return Response
	 */
	public function get_backend()
	{
		$current_theme = Orchestra::memory()->get('site.theme.backend');
		$themes        = Melody\Theme::detect();
		$type          = 'backend';

		Site::set('title', 'Backend Themes Manager');

		return View::make('melody::themes.list', compact(
			'current_theme',
			'type',
			'themes'
		));
	}

	/**
	 * Set active theme for Orchestra
	 *
	 * GET (orchestra)/manages/melody.themes/activate/(:type)/(:theme_id)
	 *
	 * @access public
	 * @return Response
	 */
	public function get_activate($type, $theme_id)
	{
		if ( ! in_array($type, array('frontend', 'backend')))
		{
			return Response::error('404');
		}

		$memory = Orchestra::memory();
		$memory->put("site.theme.{$type}", $theme_id);

		// Trigger a shutdown to force save the change theme to database 
		// so it would be affected in the following request.
		Orchestra\Memory::shutdown();

		$msg = Orchestra\Messages::make();
		$msg->add('success', __('melody::response.theme_updated', array(
			'type' => Str::title($type),
		)));

		return Redirect::to(handles("orchestra::manages/melody.themes/{$type}"));
	}
}
