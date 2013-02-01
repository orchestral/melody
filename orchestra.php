<?php

Event::listen('orchestra.started: backend', function ()
{
	// Attach a menu only if user has the authorization to manage Orchestra
	$acl  = Orchestra::acl();
	$menu = Orchestra::menu();

	if ($acl->can('manage-orchestra'))
	{
		$menu->add('melody', 'after:extensions')
			->title(__('melody::title.themes')->get())
			->link(handles('orchestra::manages/melody.themes'));
	}
});

Event::listen('orchestra.manages: melody.themes', function()
{
	$params = func_get_args();
	$action = 'index';

	// get the action name if available.
	if (count($params) > 0) $action = array_shift($params);

	return Controller::call("melody::themes@{$action}", $params);
});