<?php

return [
	'font_path' => base_path('resources/fonts/'),
	'font_data' => [
		'khmerfont' => [
			'R'  => 'KhmerOSsiemreap.ttf',    // regular font
			'B'  => 'KhmerOSmuollight.ttf',       // optional: bold font
			'I'  => 'KhmerOSsiemreap.ttf',     // optional: italic font
			'BI' => 'KhmerOSsiemreap.ttf', // optional: bold-italic font
			'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
			//'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
		]
	],
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('../temp/'),
	'pdf_a'                 => false,
	'pdf_a_auto'            => false,
	'icc_profile_path'      => ''
];
