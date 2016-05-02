<?php
/**
*
* @package Log Failed Logins
* @copyright (c) 2015 david63
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace david63\logfailedlogins\migrations;

class version_1_1_0 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\david63\logfailedlogins\migrations\version_1_0_0');
	}

	public function update_data()
	{
		return array(
			array('config.remove', array('logfailedlogins_version')),
		);
	}
}
