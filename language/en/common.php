<?php
/**
 *
 * @package phpBB Extension - Incognito
 * @copyright (c) 2015 steveurkel
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
		'ANONYM'						=> 'Post as anonymous',
		'ANONYM_EXPLAIN'				=> 'Check this field if you want to post anonymous. This cannot be reverted once the post has been sent.',
		
		'ACP_INCOGNITO_TITLE'			=> 'Incognito Module',
		'ACP_INCOGNITO'					=> 'Settings',
		'ACP_INCOGNITO_GOODBYE'			=> 'Post as anonymous active?',
		'ACP_INCOGNITO_SETTING_SAVED'	=> 'Settings have been saved successfully!',
		'ACP_INCOGNITO_NAME'			=> 'Displayed username',
		'ACP_INCOGNITO_NAME_EXPLAIN'	=> 'Entered value will be shown as username for post. When left empty the standard value will be shown.',
));
