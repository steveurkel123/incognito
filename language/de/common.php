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
		'ANONYM'           				=> 'Beitrag anonym schreiben',
		'ANONYM_EXPLAIN'				=> 'Kreuze das Feld an, wenn Du anonym schreiben möchtest. Dies kann nicht rückgängig gemacht werden, wenn der Beitrag abgesendet wurde.',
		
		'ACP_INCOGNITO_TITLE'			=> 'Incognito Module',
		'ACP_INCOGNITO'					=> 'Einstellungen',
		'ACP_INCOGNITO_GOODBYE'			=> 'Anonymes Schreiben aktiv?',
		'ACP_INCOGNITO_SETTING_SAVED'	=> 'Einstellungen wurden erfolgreich gespeichert!',
		'ACP_INCOGNITO_NAME'			=> 'Angezeigter Benutzername',
		'ACP_INCOGNITO_NAME_EXPLAIN'	=> 'Wenn dieses Feld gefüllt ist, wird der Wert als Benutzername am Beitrag angezeigt. Wird das Feld leergelassen wird der Standardwert angezeigt.',
));
