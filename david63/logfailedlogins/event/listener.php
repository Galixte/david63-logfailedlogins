<?php
/**
*
* @package Log Failed Logins
* @copyright (c) 2015 david63
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace david63\logfailedlogins\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\log\log */
	protected $log;

	/**
	* Constructor for listener
	*
	* @param \phpbb\config\config	$config		phpBB config
	* @param \phpbb\log\log			$log		phpBB log
	* @param \phpbb\user            $user		User object
	*
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\log\log $log, \phpbb\user $user)
	{
		$this->config	= $config;
		$this->log		= $log;
		$this->user		= $user;
	}

	/**
	* Assign functions defined in this class to event listeners in the core
	*
	* @return array
	* @static
	* @access public
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.acp_board_config_edit_add'	=> 'acp_board_settings',
			'core.login_box_failed'				=> 'failed_login',
		);
	}

	/**
	* Set ACP board settings
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function acp_board_settings($event)
	{
		if ($event['mode'] == 'registration')
		{
			$new_display_var = array(
				'title'	=> $event['display_vars']['title'],
				'vars'	=> array(),
			);

			foreach ($event['display_vars']['vars'] as $key => $content)
			{
				$new_display_var['vars'][$key] = $content;
				if ($key == 'chg_passforce')
				{
					$new_display_var['vars']['log_failed_logins'] = array(
						'lang'		=> 'FAILED_LOGINS',
						'validate'	=> 'bool',
						'type'		=> 'radio:yes_no',
						'explain' 	=> true,
					);
				}
			}

			$event->offsetSet('display_vars', $new_display_var);
		}
	}

	/**
	* Log the new user
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function failed_login($event)
	{
		if ($this->config['log_failed_logins'] == true)
		{
			$result		= $event['result'];
			$username	= $event['username'];

			$additional_data = array();
			$additional_data['reportee_id']	= $result['user_row']['user_id'];

			// We want to log Admin fails to the Admin log and User fails to the user log
			$log_type = ($result['user_row']['user_type'] == 3) ? 'admin' : 'user';

			switch ($result['status'])
			{
				case 10:
					$error_msg			= 'ERROR_LOGIN_USERNAME';
					$log_type			= 'user'; // This can only be user as we have no data to test
					$additional_data[]	= $username;
				break;

				case 11:
					$error_msg	= 'ERROR_LOGIN_PASSWORD';
				break;

				case 13:
					$error_msg	= 'ERROR_LOGIN_ATTEMPTS';
				break;

				case 15:
					$error_msg	= 'ERROR_LOGIN_PASSWORD_CONVERT';
				break;

				default: // Let's have a catchall for any other fails
					$error_msg			= 'ERROR_LOGIN_UNKNOWN';
					$log_type			= 'user';
					$additional_data[]	= $result['status'];
					$additional_data[]	= $username;
				break;
			}

			$this->log->add($log_type, $result['user_row']['user_id'], $this->user->ip, $error_msg, time(), $additional_data);
		}
	}
}
