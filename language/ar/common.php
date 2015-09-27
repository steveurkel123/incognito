<?php
/**
 *
 * @package phpBB Extension - Incognito
 * @copyright (c) 2015 steveurkel
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 * Translated By : Bassel Taha Alhitary - www.alhitary.net
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
		'ANONYM'						=> 'المُشاركة بعضوية مجهولة ',
		'ANONYM_EXPLAIN'				=> 'انقر على هذا المربع لو تريد المُشاركة بعضوية مجهولة. لا يُمكن التراجع عن هذه الخطوة لو تم إرسال المُشاركة.',
		
		'ACP_INCOGNITO_TITLE'			=> 'المُشاركة بعضوية مجهولة ',
		'ACP_INCOGNITO'					=> 'الإعدادات',
		'ACP_INCOGNITO_GOODBYE'			=> 'تفعيل :',
		'ACP_INCOGNITO_SETTING_SAVED'	=> 'تم حفظ الإعدادات بنجاح !',
		'ACP_INCOGNITO_NAME'			=> 'الإسم :',
		'ACP_INCOGNITO_NAME_EXPLAIN'	=> 'أدخل الإسم الذي تريد عرضه عند المُشاركة بعضوية مجهولة. اترك هذا الحقل فارغاً لو تريد استخدام الإسم الإفتراضي.',
));
