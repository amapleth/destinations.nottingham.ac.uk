<?php
class Config
{
		public $ldaphost = "portalresourcetest.nottingham.ac.uk";
		public $ldapport = "10389";
		public $ldapuser = "uid=dbrowser,ou=People,o=nottingham.ac.uk,o=cp";
		public $ldappass = "catbertkfc";
		public $ldaprootdn = "o=nottingham.ac.uk,o=cp";
		public $ldapquery;
		public $ldapattributes = array("displayname", "pdsaccountstatus", "pdsexternalsystemid", "pdsrole", "employeeNumber");
		public $rolesWithAccess=array("Staff","cn_Staff","my_staff"); 
		public $ldapFilter="(objectclass=Person)";
		
	public function __construct($username)
	{
		$this->ldapquery = "uid=".trim($username);
	}
}

?>