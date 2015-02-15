<?php

/**
 *
 * @package phpBB Extension - Incognito
 * @copyright (c) 2015 steveurkel
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */
namespace steveurkel\incognito\acp;

class main_info
{
	function module()
	{
		return array(
				'filename'	=> 'steveurkel\incognito\acp\main_module',
				'title'		=> 'INCOGNITO_TITLE',
				'version'	=> '0.9.0',
				'modes'		=> array(
					'settings'	=> array('title' => 'Post as anonymous', 'auth' => 'ext_steveurkel/incognito && acl_a_board', 'cat' => array('INCOGNITO_TITLE')),
				),
		);
	}
}
