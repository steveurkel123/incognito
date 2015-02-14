<?php 
/**
*
* @package incognito
* @copyright (c) 2015 steveurkel
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
namespace steveurkel\incognito\migrations;

class release_0_9_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['incognito_enabled']);
	}
	
	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\alpha2');
	}
	
	public function update_schema()
	{
		return array(
			'add_columns'	=> array(
				$this->table_prefix . 'posts'	=> array(
					'real_poster_id'    => array('UINT:8', null),
				),
			),
		);
	}
	
	public function revert_schema()
	{
		return array(
				'drop_columns'    => array(
					$this->table_prefix . 'posts'	=> array(
                		'real_poster_id',
            		),
				),
		);
	}
	
	public function update_data()
	{
		return array(
				array('config.add', array('incognito_enabled', 1)),
				array('module.add', array(
						'acp',
						'ACP_CAT_DOT_MODS',
						'ACP_INCOGNITO_TITLE'
				)),
				array('module.add', array(
						'acp',
						'ACP_INCOGNITO_TITLE',
						array(
								'module_basename'	=> '\steveurkel\incognito\acp\main_module',
								'modes'				=> array('settings'),
						),
				)),
		);
	}
}
?>