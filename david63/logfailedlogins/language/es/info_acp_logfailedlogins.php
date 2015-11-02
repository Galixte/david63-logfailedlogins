<?php
/**
*
* @package Log Failed Logins
* @copyright (c) 2015 david63
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
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
	'ERROR_LOGIN_ATTEMPTS'			=> '<strong>El usuario ha superado los intentos de inicio de sesión</strong>',
	'ERROR_LOGIN_PASSWORD'		=> '<strong>El usuario ha introducido una contraseña incorrecta</strong>',
	'ERROR_LOGIN_PASSWORD_CONVERT'	=> '<strong>Error al convertir la contraseña</strong>',
	'ERROR_LOGIN_UNKNOWN'			=> '<strong>Ha ocurrido un error de inicio de sesión inesperado (%1$s) </strong><br />» %2$s',
	'ERROR_LOGIN_USERNAME'			=> '<strong>Ha introducido un nombre de usuario no válido</strong><br />» %1$s',

	'FAILED_LOGINS'					=> 'Registro de accesos de usuario fallidos',
	'FAILED_LOGINS_EXPLAIN'			=> 'Añade una entrada en los registros de Usuario o de Administrador cuando hay un usuario con intentos de acceso fallidos..',
));
