<?php

$config = [

	"articleform" => 
	[
		[
			'field' => 'title',
            'label' => 'article Title',
            'rules' => 'required|trim|min_length[5]|max_length[15]'
		],
		[
			'field' => 'body',
            'label' => 'article Body',
            'rules' => 'required|trim|min_length[5]|max_length[250]'
		]
	]
];

?>