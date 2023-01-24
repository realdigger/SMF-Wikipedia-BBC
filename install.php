<?php 

// SSI.php! Where are you? 
if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF')) 
	require_once(dirname(__FILE__) . '/SSI.php');
elseif (!defined('SMF'))
	exit('<b>Error:</b> Cannot install - please verify you put this in the same place as SMF\'s index.php.'); 
	
// Integration hooks! I just love them!
$hooks = array(
	'integrate_bbc_codes' => 'wiki_bbc_add_code',
	'integrate_bbc_buttons' => 'wiki_bbc_add_button',
	'integrate_pre_include' => '$sourcedir/Subs-WikiBBC.php',
);

foreach ($hooks as $hook => $function)
	add_integration_function($hook, $function); 

// If we're using SSI, tell them we're done
if(SMF == 'SSI')
	echo 'Database changes are complete!';

?>