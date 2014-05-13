<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Auth
 * @subpackage Zend_Auth_Adapter
 * @copyright  Copyright (c) 2005-2009 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */

/**
 * @see Zend_Auth_Adapter_Interface
 */
require_once 'Zend/Auth/Adapter/Interface.php';

/**
 * CAS Authentication Adapter
 *
 * Central Authentication Service project, more commonly referred to as CAS.  
 * CAS is an authentication system originally created by Yale University to 
 * provide a trusted way for an application to authenticate a user.
 *
 * @see http://www.jasig.org/cas
 *
 * @category   Zend
 * @package    Zend_Auth
 * @subpackage Zend_Auth_Adapter_Cas
 * @copyright  Copyright (c) 2005-2009 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Auth_Adapter_Cas implements Zend_Auth_Adapter_Interface {
	
	/**
	 * Error messages to return with @see Zend_Auth_Result
	 *
	 * @var array   $_errors
	 */
	protected $_errors = array ();
	
	/**
	 * The CAS server hostname
	 *
	 * @var string  $_hostname
	 */
	protected $_hostname;
	
	/**
	 * The CAS server URI path
	 *
	 * @var string  $_path
	 */
	protected $_path = '';
	
	/**
	 * The CAS server port
	 *
	 * @var integer $_port
	 */
	protected $_port = 443;
	
	/**
	 * The CAS server protocol
	 *
	 * @var integer $_protocol
	 */
	protected $_protocol = 'https';
	
	/**
	 * The service parameter
	 *
	 * @var string  $_service
	 */
	protected $_serviceParam = 'service';
	
	/**
	 * The service value
	 *
	 * @var string  $_service
	 */
	protected $_service = '';
	
	/**
	 * The ticket parameter
	 *
	 * @var string  $_ticketParam
	 */
	protected $_ticketParam = 'ticket';
	
	/**
	 * The validation parameter
	 *
	 * CAS 1: validate
	 * CAS 2: serviceValidate
	 * CAS 3: serviceValidate
	 *
	 * @var string  $_validationParam
	 */
	protected $_validationParam = 'serviceValidate';
	
	/**
	 * The ticket value
	 *
	 * @var string  $_ticket
	 */
	protected $_ticket = '';
	
	/**
	 * The XML name space for the CAS response
	 *
	 * @var string  $_xmlNameSpace
	 */
	protected $_xmlNameSpace = 'http://www.yale.edu/tp/cas';
	
	/**
	 * Create instance of the CAS Authenticator
	 *
	 * @param  mixed $config  An array or Zend_Config object with adapter parameters.
	 */
	public function __construct($config) {
		
		/*
                 * Convert Zend_Config argument to a plain array.
                 */
		if ($config instanceof Zend_Config) {
			$config = $config->toArray ();
		}
		
		/*
         * Verify that adapter parameters are in an array.
         */
		if (! is_array ( $config )) {
			/**
			 * @see Zend_Auth_Exception
			 */
			require_once 'Zend/Auth/Exception.php';
			throw new Zend_Auth_Exception ( 'Adapter parameters must be in an array or a Zend_Config object' );
		}
		
		/*
         * Verify that adapter parameters are in an array.
         */
		if (! isset ( $config ['hostname'] )) {
			/**
			 * @see Zend_Auth_Exception
			 */
			require_once 'Zend/Auth/Exception.php';
			throw new Zend_Auth_Exception ( 'Hostname must be set in params.' );
		} else {
			$this->_hostname = $config ['hostname'];
		}
		
		/*
         * Set the path
         */
		if (! empty ( $config ['path'] )) {
			$this->_path = $config ['path'];
			$this->_path = (! empty ( $this->_path ) && substr ( $this->_path, - 1 ) == '/') ? substr ( $this->_path, 0, - 1 ) : '';
		}
		
		/*
         * Set the port
         */
		if (! empty ( $config ['port'] )) {
			
			$port = intval ( $config ['port'] );
			if (! empty ( $port )) {
				$this->_port = $port;
			}
		}
		
		/*
         * Set the protocol
         */
		if (! empty ( $config ['protocol'] )) {
			$this->_protocol = $config ['protocol'];
		}
		
		/*
         * Set the service parameter
         */
		if (! empty ( $config ['serviceParam'] )) {
			$this->_serviceParam = $config ['serviceParam'];
		}
		
		/*
         * Set the ticket parameter
         */
		if (! empty ( $config ['ticketParam'] )) {
			$this->_ticketParam = $config ['ticketParam'];
		}
		
		/*
         * Set the validation parameter
         */
		if (! empty ( $config ['validationParam'] )) {
			$this->_validationParam = $config ['validationParam'];
		}
		
		/*
         * Set the XML name space parameter
         */
		if (! empty ( $config ['xmlNameSpace'] )) {
			$this->_xmlNameSpace = $config ['xmlNameSpace'];
		}
		
		/*
                 * Set the URL
                 */
		$this->setUrl ();
		
		/*
                 * Set service URL
                 */
		$this->setService ();
	
	}
	
	/**
	 * Set service URL
	 */
	private function setService() {
		$this->_service = $this->selfUrl ();
	}
	
	/**
	 * Set URL to server
	 */
	private function setUrl() {
		$path = (empty ( $this->_path )) ? '' : '/' . $this->_path;
		
		$port = '';
		
		if ($this->_port != 443) {
			
			$port = ':' . $this->_port;
		}
		
		$this->url = $this->_protocol . '://' . $this->_hostname . $port . $path;
	}
	
	/**
	 * Returns the URL to login to the CAS server.
	 *
	 * @param string $service The service url requesting authentication.
	 * 
	 * @return string
	 */
	public function getLoginURL($service = '') {
		if (empty ( $service )) {
			$service = $this->_service;
		}
		return $this->url . '/login?' . $this->_serviceParam . '=' . $service;
	}
	
	/**
	 * Returns the URL to logout of the CAS server.
	 *
	 * @param string $service The service url requesting logout.
	 * 
	 * @return string
	 */
	public function getLogoutURL($service = '') {
		if (empty ( $service )) {
			$service = $this->_service;
		}
		return $this->url . '/logout?' . $this->_serviceParam . '=' . $service;
	}
	
	/**
	 * Returns the ticket parameter
	 * 
	 * @return string
	 */
	public function getTicketParam() {
		return $this->_ticketParam;
	}
	
	/**
	 * Returns true if a ticket is set and not empty in the $_GET array
	 * Ticket value will be set if it exists
	 *
	 * @uses        Zend_Auth_Adapter_Cas::_ticket
	 * @return  boolean
	 */
	public function hasTicket() {
		if (isset ( $_GET [$this->getTicketParam ()] ) && ! empty ( $_GET [$this->getTicketParam ()] )) {
			
			// Set ticket value 
			$this->_ticket = $_GET [$this->getTicketParam ()];
			
			return true;
		}
		
		return false;
	}
	
	/**
	 * Returns the validation URL to get a ticket
	 * 
	 * @return string
	 */
	public function getValidationURL() {
		return $this->url . '/' . $this->_validationParam . '?';
	}
	
	/**
	 * Returns the array of validation parameters.
	 *
	 * @param string $ticket  Ticket to validate given by CAS Server
	 * @param string $service URL to the service requesting authentication
	 *
	 * @return array
	 */
	protected function getValidationParams($ticket, $service) {
		return array ($this->_serviceParam => $service, $this->_ticketParam => $ticket );
	}
	
	/**
	 * Sets the CAS validation ticket
	 *
	 * @param string $ticket  Ticket to validate given by CAS Server
	 */
	public function setTicket($ticket = '') {
		if ($this->hasTicket ()) {
			$this->_ticket = $_GET [$this->getTicketParam ()];
		} else {
			$this->_ticket = $ticket;
		}
	}
	
	/**
	 * Zend_Auth Authentication
	 *
	 * @param return boolean
	 */
	public function authenticate() {
		if ($user = $this->validateTicket ( $this->_ticket, $this->_service )) {
			return new Zend_Auth_Result ( Zend_Auth_Result::SUCCESS, $user );
		} else {
			return new Zend_Auth_Result ( Zend_Auth_Result::FAILURE, null, $this->_errors );
		}
	}
	
	/**
	 * Validate a ticket for a service.
	 *
	 * @param string $ticket  Ticket to validate given by CAS Server
	 * @param string $service URL to the service requesting authentication
	 * @uses    Zend_Http_Client
	 *
	 * @return false|string     Returns false on failure, CAS user on success.
	 */
	protected function validateTicket($ticket, $service) {
		
		/**
		 * @see Zend_Http_Client
		 */
		require_once 'Zend/Http/Client.php';
		
		try {
			$client = new Zend_Http_Client ( $this->getValidationURL () );
			
			$client->setParameterGet ( $this->getValidationParams ( $ticket, $service ) );
			
			$response = $client->request ();
			
			if ($response->getStatus () == 200) {
				
				$result = $this->getResponseBody ( $response->getBody () );
				
				if ($result === false) {
					return false;
				} else {
					return $result;
				}
			}
		
		} catch ( Exception $e ) {
			
			// Set error messages for failure 
			$this->_errors [] = 'Authentication failed: Failed to connect to server';
			$this->_errors [] = $e->getMessage ();
			
			return false;
		}
	}
	
	/**
	 * Parses the xml response from the CAS server
	 *
	 * @param string $body      The response body of the CAS validation request
	 * 
	 * @return false|string     Returns false on failure, CAS user on success.
	 */
	protected function getResponseBody($body) {
		
		$xml = simplexml_load_string ( $body, 'SimpleXMLElement', 0, $this->_xmlNameSpace );
		
		if (isset ( $xml->authenticationSuccess )) {
			return current ( $xml->authenticationSuccess->user );
		} else {
			$this->_errors [] = 'Authentication failed: Server response error';
			foreach ( $xml->authenticationFailure as $i => $failure ) {
				$this->_errors [] = $failure->attributes ()->code . ': ' . trim ( $failure );
			}
		}
		
		return false;
	}
	
	/**
	 * Returns a full URL that was requested on current HTTP request.
	 *
	 * @see Zend_OpenId::selfUrl()
	 *
	 * @return string
	 */
	static public function selfUrl() {
		if (isset ( $_SERVER ['SCRIPT_URI'] )) {
			return $_SERVER ['SCRIPT_URI'];
		}
		$url = '';
		$port = '';
		if (isset ( $_SERVER ['HTTP_HOST'] )) {
			if (($pos = strpos ( $_SERVER ['HTTP_HOST'], ':' )) === false) {
				if (isset ( $_SERVER ['SERVER_PORT'] )) {
					$port = ':' . $_SERVER ['SERVER_PORT'];
				}
				$url = $_SERVER ['HTTP_HOST'];
			} else {
				$url = substr ( $_SERVER ['HTTP_HOST'], 0, $pos );
				$port = substr ( $_SERVER ['HTTP_HOST'], $pos );
			}
		} else if (isset ( $_SERVER ['SERVER_NAME'] )) {
			$url = $_SERVER ['SERVER_NAME'];
			if (isset ( $_SERVER ['SERVER_PORT'] )) {
				$port = ':' . $_SERVER ['SERVER_PORT'];
			}
		}
		if (isset ( $_SERVER ['HTTPS'] ) && $_SERVER ['HTTPS'] == 'on') {
			$url = 'https://' . $url;
			if ($port == ':443') {
				$port = '';
			}
		} else {
			$url = 'http://' . $url;
			if ($port == ':80') {
				$port = '';
			}
		}
		
		$url .= $port;
		if (isset ( $_SERVER ['HTTP_X_REWRITE_URL'] )) {
			$url .= $_SERVER ['HTTP_X_REWRITE_URL'];
		} elseif (isset ( $_SERVER ['REQUEST_URI'] )) {
			$query = strpos ( $_SERVER ['REQUEST_URI'], '?' );
			if ($query === false) {
				$url .= $_SERVER ['REQUEST_URI'];
			} else {
				$url .= substr ( $_SERVER ['REQUEST_URI'], 0, $query );
			}
		} else if (isset ( $_SERVER ['SCRIPT_URL'] )) {
			$url .= $_SERVER ['SCRIPT_URL'];
		} else if (isset ( $_SERVER ['REDIRECT_URL'] )) {
			$url .= $_SERVER ['REDIRECT_URL'];
		} else if (isset ( $_SERVER ['PHP_SELF'] )) {
			$url .= $_SERVER ['PHP_SELF'];
		} else if (isset ( $_SERVER ['SCRIPT_NAME'] )) {
			$url .= $_SERVER ['SCRIPT_NAME'];
			if (isset ( $_SERVER ['PATH_INFO'] )) {
				$url .= $_SERVER ['PATH_INFO'];
			}
		}
		return $url;
	}
}