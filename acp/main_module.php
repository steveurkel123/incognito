<?php

/**
 *
 * @package phpBB Extension - Incognito
 * @copyright (c) 2015 steveurkel
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */
namespace steveurkel\incognito\acp;

class main_module
{
	var $u_action;
	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache, $request;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;
		$user->add_lang('acp/common');
		$this->tpl_name = 'incognito_body';
		$this->page_title = $user->lang('ACP_INCOGNITO_TITLE');
		add_form_key('steveurkel/incognito');
		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('steveurkel/incognito'))
			{
				trigger_error('FORM_INVALID');
			}
			$config->set('incognito_enabled', $request->variable('incognito_enabled', 0));
			trigger_error($user->lang('ACP_INCOGNITO_SETTING_SAVED') . adm_back_link($this->u_action));
		}
		$template->assign_vars(array(
				'U_ACTION'				=> $this->u_action,
				'INCOGNITO_ENABLED'		=> $config['incognito_enabled'],
		));
	}
}
