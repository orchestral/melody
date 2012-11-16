<?php

class Melody_Themes_Controller extends Controller {
	
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
		return View::make('melody::themes.home');
	}

	/**
	 * Show frontend theme for Theme Manager
	 *
	 * GET (orchestra)/manages/melody.themes/frontend
	 *
	 * @access public
	 * @return Response
	 */
	public function get_frontend()
	{

		$active_theme = Orchestra\Core::memory()->get('site.theme.frontend');
		$themes       = Melody\Theme::detect();
		$type         = 'frontend';

		return View::make('melody::themes.themes', compact('active_theme', 'type', 'themes'));
	}

	/**
	 * Show backend theme for Theme Manager
	 *
	 * GET (orchestra)/manages/melody.themes/backend
	 *
	 * @access public
	 * @return Response
	 */
	public function get_backend()
	{
		$active_theme = Orchestra\Core::memory()->get('site.theme.backend');
		$themes       = Melody\Theme::detect();
		$type         = 'backend';

		return View::make('melody::themes.themes', compact('active_theme', 'type', 'themes'));
	}
}
