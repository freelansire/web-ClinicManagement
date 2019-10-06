<?php
	/*
	 * You can add custom links in the home page by appending them here ...
	 * The format for each link is:
		$homeLinks[] = array(
			'url' => 'path/to/link', 
			'title' => 'Link title', 
			'description' => 'Link text',
			'groups' => array('group1', 'group2'), // groups allowed to see this link, use '*' if you want to show the link to all groups
			'grid_column_classes' => '', // optional CSS classes to apply to link block. See: http://getbootstrap.com/css/#grid
			'panel_classes' => '', // optional CSS classes to apply to panel. See: http://getbootstrap.com/components/#panels
			'link_classes' => '', // optional CSS classes to apply to link. See: http://getbootstrap.com/css/#buttons
			'icon' => 'path/to/icon' // optional icon to use with the link
		);
	 */


$homeLinks[] = array(
			'url' => 'hooks/calendar.php', 
			'title' => 'Calendar', 
			'description' => 'show all events that you have',
			'groups' => array('*'), // groups allowed to see this link, use '*' if you want to show the link to all groups
			'grid_column_classes' => 'col-md-6 col-lg-6', // optional CSS classes to apply to link block. See: http://getbootstrap.com/css/#grid
			'panel_classes' => 'panel-success', // optional CSS classes to apply to panel. See: http://getbootstrap.com/components/#panels
			'link_classes' => 'btn-success', // optional CSS classes to apply to link. See: http://getbootstrap.com/css/#buttons
			'icon' => '' // optional icon to use with the link
		);


$homeLinks[] = array(
			'url' => 'hooks/reports.php', 
			'title' => 'Reports', 
			'description' => 'Smart Reports for your work'
                          . '      ',
			'groups' => array('*'), // groups allowed to see this link, use '*' if you want to show the link to all groups
			'grid_column_classes' => 'col-md-6 col-lg-6', // optional CSS classes to apply to link block. See: http://getbootstrap.com/css/#grid
			'panel_classes' => 'panel-success', // optional CSS classes to apply to panel. See: http://getbootstrap.com/components/#panels
			'link_classes' => 'btn-success', // optional CSS classes to apply to link. See: http://getbootstrap.com/css/#buttons
			'icon' => '' // optional icon to use with the link
		);