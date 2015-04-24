# CSS Compress Module

* Date:    April 16, 2014
* Author:  Jaime A. Rodriguez <hi.i.am.jaime@gmail.com>
* Version: 1.2
* License: http://opensource.org/licenses/MIT

Concatenates and compresses CSS in the LIVE environment

## Usage

To pull CSS files from */css/* folder just add them to the CSS placeholder without using the CSS extension.

~~~ php
	{{ CSS normalize style }}
~~~

You can also attach external CSS by putting the full URL

~~~ php
	{{ CSS normalize style http://example.com/css/fonts.css }}
~~~