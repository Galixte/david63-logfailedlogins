<?php
/**
*
* @package Log Failed Logins
* @copyright (c) 2015 david63
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translate by alex75 http://www.phpbb-store.it
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'ERROR_LOGIN_ATTEMPTS'			=> '<strong>L\'utente ha superato i tentativi di login</strong>',
	'ERROR_LOGIN_PASSWORD'			=> '<strong>L\'utente ha inserito una password sbagliata</strong>',
	'ERROR_LOGIN_PASSWORD_CONVERT'	=> '<strong>Password convert error</strong>',
	'ERROR_LOGIN_UNKNOWN'			=> '<strong>Errore login imprevisto (%1$s) si è verificato</strong><br />» %2$s',
	'ERROR_LOGIN_USERNAME'			=> '<strong>È stato inserito un nome utente non valido</strong><br />» %1$s',

	'FAILED_LOGINS'					=> 'Log failed user logins',
	'FAILED_LOGINS_EXPLAIN'			=> 'Aggiunge una voce nei log utente o Admin, quando un utente non riesce ad effettuare il login.',
));
