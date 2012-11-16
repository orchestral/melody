<?php namespace Melody;

use FileSystemIterator as fIterator;

class Theme {

	/**
	 * Load themes for Orchestra (from a list of folders)
	 *
	 * @static
	 * @access protected
	 * @param  array    $bundles
	 * @return array
	 */
	protected static function load($folders = array())
	{
		$themes = array();

		foreach ($folders as $name => $path)
		{
			if (is_file($path.'theme.json'))
			{
				$themes[$name] = json_decode(file_get_contents($path.'theme.json'));
					
				if (is_null($themes[$name])) 
				{
					// json_decode couldn't parse, throw an exception
					throw new Exception("Theme [{$name}]: cannot decode theme.json file");
				}
			}
		}

		return $themes;
	}
	
	/**
	 * Detect all of the themes for Orchestra
	 *
	 * @static
	 * @access public
	 * @return array
	 */
	public static function detect($folders = array())
	{
		if (empty($folders))
		{
			$items = new fIterator(path('public').'themes'.DS, fIterator::SKIP_DOTS);

			foreach ($items as $item)
			{
				if ( ! $item->isDir()) continue;

				$folders[$item->getFilename()] = rtrim($item->getRealPath(), DS).DS;
			}
		}

		return static::load($folders);
	}
}