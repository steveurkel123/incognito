<?php

/**
 *
 * @package phpBB Extension - Incognito
 * @copyright (c) 2015 steveurkel
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */
namespace steveurkel\incognito\event;
/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class post_listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
				'core.user_setup'                    => 'load_language_on_setup',
				'core.posting_modify_template_vars'	 => 'modify_posting_template',
				'core.submit_post_modify_sql_data'   => 'modify_post_sql_data',
		);
	}
	
	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config		$config		Config object
	 * @param \phpbb\template\template	$template	Template object
	 * @param \phpbb\user				$user		User object
	 * @param \phpbb\request\request    $request	Request object
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template, \phpbb\user $user, \phpbb\request\request $request)
	{
		$this->config = $config;
		$this->template = $template;
		$this->user = $user;
		$this->request = $request;
	}
	
	public function load_language_on_setup($event)
	{ 
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
				'ext_name' => 'steveurkel/incognito',
				'lang_set' => 'common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}
	
	public function modify_posting_template($event)
	{
		if ((int) $this->request->variable('mod_anonymous', 0, true) != 0)
		{
			$this->template->assign_vars(array(
				'S_ANONYM_CHECKED'	=> 'checked="checked"',
			));
		}
		
		$this->template->assign_vars(array(
				'INCOGNITO_ENABLED'	=> $this->config['incognito_enabled'],
		));
	}
	
	public function modify_post_sql_data($event)
	{	
		$post_sql_data = $event['sql_data'];
		
		if ((int) $this->request->variable('mod_anonymous', 0, true) != 0)
		{	
			//set all poster info to ANONYMOUS - store the real poster id for admin tracking reasons
			$post_sql_data[POSTS_TABLE]['sql']['real_poster_id'] = $post_sql_data[POSTS_TABLE]['sql']['poster_id'];
			$post_sql_data[POSTS_TABLE]['sql']['poster_id'] = ANONYMOUS;
			$post_sql_data[POSTS_TABLE]['sql']['post_username'] = '';
			
			$post_sql_data[TOPICS_TABLE]['sql']['topic_last_poster_id'] = ANONYMOUS;
			$post_sql_data[TOPICS_TABLE]['sql']['topic_last_poster_name'] = '';
			$post_sql_data[TOPICS_TABLE]['sql']['topic_last_poster_colour'] = '';
			
			//in case of first post of topic (new/edit) set poster info to ANONYMOUS
			switch ($event['post_mode'])
			{
				case 'edit_topic':
				case 'edit_first_post':
				case 'post' :
					$post_sql_data[TOPICS_TABLE]['sql']['topic_poster'] = ANONYMOUS;
					//$post_sql_data[TOPICS_TABLE]['sql']['topic_first_post_id'] = ANONYMOUS;
					$post_sql_data[TOPICS_TABLE]['sql']['topic_first_poster_name'] = '';
					$post_sql_data[TOPICS_TABLE]['sql']['topic_first_poster_colour'] = '';
					break;
			}
			
			//don't update user stats - so remove this info from sql data
			unset($post_sql_data[USERS_TABLE]['stat']);
			
			//reset user data for now
			$this->user->data['user_id'] = ANONYMOUS;
			$this->user->data['user_colour'] = '';			
		}
		
		$event['sql_data'] = $post_sql_data;		
	}
}
?>