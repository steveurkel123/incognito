<?php
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
		'ANONYM'           				=> 'Post as anonymous',
		'ANONYM_EXPLAIN'				=> 'Check this field if you want to post anonymous. This cannot be reverted once the post has been sent.',
		
		'ACP_INCOGNITO_TITLE'			=> 'Incognito Module',
		'ACP_INCOGNITO'					=> 'Settings',
		'ACP_INCOGNITO_GOODBYE'			=> 'Post as anonymous active?',
		'ACP_INCOGNITO_SETTING_SAVED'	=> 'Settings have been saved successfully!',
));
