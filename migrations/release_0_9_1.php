<?php 
/**
*
* @package incognito
* @copyright (c) 2015 steveurkel
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
namespace steveurkel\incognito\migrations;

class release_0_9_1 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['incognito_name']);
	}
	
	static public function depends_on()
	{
		return array('\steveurkel\incognito\migrations\release_0_9_0');
	}
	
	public function update_data()
	{
		return array(
				array('config.add', array('incognito_name', '')),
		);
	}
}
