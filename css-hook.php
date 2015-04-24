<?php
namespace Module\CSS;

require_once('class.css.php');

/**
 * Automatically compresses CSS files when the environment is live
 * @return string The CSS tags to embed in the head
 * @internal
 */
function render() {
	$buffer = "";
	$args = func_get_args();
	$args = \Sleepy\Hook::addFilter("csscompress_files", array($args));

	if (\Sleepy\SM::isLive()) {
		$files = "";

		foreach ($args as $file) {
			if (empty($file)) {
				continue;
			}

			if (stripos($file, 'http') === 0) {
				$buffer .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"{$file}\">\n\t";
				continue;
			}

			if (strlen($files) < 1) {
				$files = $file;
			} else {
				$files .= "&" . $file;
			}
		}

		$files = urlencode($files);
		$buffer .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . URLBASE . "app/modules/css-compress/?c={$files}\">\n\t";
		return $buffer;
	} else {
		foreach ($args as $file) {
			if (empty($file)) {
				continue;
			}
			if (stripos($file, 'http') === 0) {
				$buffer .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"{$file}\">\n\t";
			} else {
				$buffer .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . URLBASE . "css/{$file}.css\">\n\t";
			}
		}

		return $buffer;
	}
}

\Sleepy\Hook::applyFilter('render_placeholder_css', '\Module\CSS\render');