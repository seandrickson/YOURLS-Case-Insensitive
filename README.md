YOURLS Case Insensitive Plugin
==============================

Makes all keywords case insensitive (creates all keywords and calls all keywords lowercase.) Only works if you are using Base 36. Fixes disappearing capital letters.

Installation
------------

Move the `case-insensitive` folder into the `/users/plugins` folder. Then, activate the plugin in the admin interface. That's all there is to it.

Requirements
------------

User must have [YOURLS](http://yourls.org/#Install) 1.5.1+ installed. Verified compatible through YOURLS 1.10.6 (latest release as of this writing) — the plugin only relies on the `get_request`, `add_new_link_custom_keyword`, `custom_keyword`, and `get_shorturl_charset` hooks, which are unchanged in current YOURLS.

Bonus
-----

Works with [YOURLS QR Code Plugin](https://github.com/seandrickson/yourls-qrcode-plugin) to generate smaller QR codes! This is because QR codes store upper-case characters significantly more efficiently than lower-case (ratio 5.5:8)

Credits
-------

Borrowed code from Ozh's [Force Lowercase](https://github.com/YOURLS/force-lowercase) plugin
