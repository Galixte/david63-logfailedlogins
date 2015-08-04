<?php
/**
*
* @package Log Failed Logins
* @copyright (c) 2015 david63
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
* Translated By : Bassel Taha Alhitary - www.alhitary.net
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
	'ERROR_LOGIN_ATTEMPTS'			=> '<strong>العضو تجاوز الحد المسموح لمحاولات تسجيل الدخول</strong>',
	'ERROR_LOGIN_PASSWORD'			=> '<strong>العضو أدخل كلمة سر غير صحيحة</strong>',
	'ERROR_LOGIN_PASSWORD_CONVERT'	=> '<strong>فشل في تحويل كلمة السر</strong>',
	'ERROR_LOGIN_UNKNOWN'			=> '<strong>حدث خطأ غير متوقع لتسجيل الدخول (%1$s)</strong><br />» %2$s',
	'ERROR_LOGIN_USERNAME'			=> '<strong>تم ادخال إسم مستخدم غير صحيح</strong><br />» %1$s',

	'FAILED_LOGINS'					=> 'سجل محاولات الدخول الفاشلة للعضو ',
	'FAILED_LOGINS_EXPLAIN'			=> 'إضافة سجل إلى سجلات المدير أو العضو عندما يفشل العضو في تسجيل الدخول.',
));
