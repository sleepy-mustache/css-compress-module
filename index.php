<?php
namespace Module\CSS;

require_once(dirname(__FILE__) . '/../../core/class.debug.php');
require_once(dirname(__FILE__) . '/../../core/class.sm.php');
require_once(dirname(__FILE__) . '/../../core/global.php');

/**
 * This is where the <link> tag points to. It should be in the format of:
 *
 * <code>
 * <link rel="stylesheet" href="/modules/enabled/css-compress/?css=reset&main" >
 * </code>
 */

// Do nothing if the get string is empty
if (!empty($_GET['c'])) {
	require_once('class.css.php');

	$c = new Compress();
	$files = explode("&", $_GET['c']);

	foreach ($files as $file) {
		$c->add(DIRBASE . "../css/" . $file . ".css");
	}

	$c->show();
}