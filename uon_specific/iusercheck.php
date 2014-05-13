<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<link rel="SHORTCUT ICON" href="favicon.ico"/>
<head>
  <title>User Check</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style type="text/css">
  <!--
    body	{ font: 75% Helvetica, Arial, sans-serif; padding: 0 10% 10px;}
    		/* body font will cascade to all elements except buttons and inputs */
    h1		{ color:#03406F; font-size: 1.3em;  border-bottom:4px solid #C3E1FE; margin-bottom:10px;}
    p		{ margin: 0.5em 0; padding: 0}
    		/* ie != ff re padding and margins so always specify */
    td 		{ padding-right: 12px;}
    th 		{ font-style: bold; padding-right: 12px; text-align: left;}
    .footer	{ margin-top: 40px; padding-top: 5px; border-top: solid 1px #C3E1FE; }
    
    .mlHidden	{display:none}    
    
    .headerRow th, .headerRow td { padding-top: 1em; }
    td em 			{ color: #999;  /*#999*/  }
    .infobox { background:#C3E1FE; border:2px solid #598BB9; margin:10px 0 0; padding:4px 1em;}
    
  -->
  </style>
  
  <!-- load jquery and script for more/less -->
  <script type="text/javascript" src="https://my.nottingham.ac.uk/js/jquery/jquery.js"></script>
  <script type="text/javascript" src="https://my.nottingham.ac.uk/js/jquery/plugins-packed.js"></script>
  
</head>
<body>

<?php
/* UserCheck - Tool for USERS to check their NDS/Portal passwords to see if in synch
   v 1.1  08.06.05  altered NDS disabled logic & capitalisation of var
   v 1.2  08.07.05    [altered MY ldapuser to Directory Browser] ** Backed out as dont get enough details **
   v 1.3  14.07.05  altered MY enabled logic to encompass 'suspended until ...'

   v 2.0  18.9.06   parallel deployment: ldap on 'portalresourcetest' & o=nottingham.o=cp

   v 3.0  8.3.07    add ActiveDomain lookup
   v 3.1  24.9.08   add uon-auth (aka Vault) lookup plus catch if 'unwilling to perform'
   v 3.2  29.10.08  restyle so looks better in portal   
   v 3.3  1.12.08   add gracelogins logic to NDS plus allow for no pdsAccountEnabled on portal
   
   v 4.0  4.12.08   refactor - new subroutines to process and display results from ldapsearch
   v 4.1  8.12.08   finish refactor and swap for 'bbrowser' for portal search
   v 4.2  3.4.09	dont display ldap_error if its success (as its misleading) 
   
   v 5.0  13.8.09	add portal roles and external accounts plus AD groups
   					remove "password mismatch" and add in info box ONLY when Novell != portal
   v 5.1  18.9.09	change NDS logic re enabled account (remove 'unable to determine')
   v 5.2  18.9.09	add attributes to NDS search so can get pwdchangedtime (not returned by default)
   					add times.php (soft link to usercheck.php) version to just do nds passwd change times
   					add attributes to other searches so more efficient (getting less data back)
   					add createTimestamp					
   v 5.3  16.4.10   add employeeNumber to portal fields   		
   v 5.4  27.9.10   change charset from iso-8859-1 to utf-8 (as utf-8 encoded data from NDS was displaying incorrectly)
   
   
NEXT -> Fix AD bitwise stuff re account enabled  
  
*/

## VARIABLES ##########################################################
$debug=0;    #  1 = print data array; 2 = print return array; 3 = print connect debug; 4 = print raw ldap results 
# if DEV set errors to display on screen...
#error_reporting(E_ALL ^ E_NOTICE);
#ini_set(display_errors, '1');

$user = $_REQUEST['user'];

#magic_quotes_gpc is ON so adds slashes to ' " \  -> use stripslashes to remove these
$pass = stripslashes($_REQUEST['pass']);

# details of ldaps to check.  label = label for output block; type = nds/vault/luminis/ad for dif logic in processresults
$nds = array (    label => "Novell (Nottingham tree)",
    			  type => "nds",
    			  ldaphost => "ldap.nottingham.ac.uk",
                  ldapport => "389",
                  ldapuser => "",
                  ldappass => "",
                  ldaprootdn => "ou=users,o=University",
                  ldapquery => "cn=$user",
                  ldapattributes => array("fullname", "ou", "logingraceremaining", "logindisabled", "pwdChangedTime", "createTimestamp"));
                  
$auth = array (   label => "Novell (Auth tree)",
    			  type => "nds",
    			  ldaphost => "uon-auth.nottingham.ac.uk",
                  ldapport => "389",
                  ldapuser => "",
                  ldappass => "",
                  ldaprootdn => "ou=Accounts,o=University",
                  ldapquery => "cn=$user",
                  ldapattributes => array("fullname", "ou", "logingraceremaining", "logindisabled", "pwdChangedTime", "createTimestamp"));             
    
$vault= array (   label => "The Vault",
    			  type => "vault",
    			  ldaphost => "uon-vault.nottingham.ac.uk",
                  ldapport => "389",
                  ldapuser => "",
                  ldappass => "",
                  ldaprootdn => "ou=Accounts,o=University",
                  ldapquery => "uid=$user",
                  ldapattributes => array("givenname", "sn", "createTimestamp"));    
                  # "logingraceremaining" "pwdChangedTime" dont exist in Vault
    
$ad = array  (    label => "UK AD",
    			  type => "ad",
    			  ldaphost => "ad.nottingham.ac.uk",
                  ldapport => "389",
                  ldapuser => "cn=service_confluence,cn=users,dc=ad,dc=nottingham,dc=ac,dc=uk",
                  ldappass => "c0nflu3nc3298",
                  ldaprootdn => "OU=Users,OU=university,DC=ad,DC=nottingham,DC=ac,DC=uk",
                  ldapquery => "cn=$user",
                  ldapattributes => array("sn", "displayname", "department", "useraccountcontrol", "memberof", "forename", "surname"));
                  
$int = array (    label => "International LDAP",
    			  type => "ad",
    			  ldaphost => "ldaps://ildap.nottingham.ac.uk",
                  ldapport => "636",
                  ldapuser => "CN=LDAP_destinations,CN=Users,DC=intdir,DC=nottingham,DC=ac,DC=uk",
                  ldappass => "LdapD3stinati0n",
                  ldaprootdn => "OU=University,DC=intdir,DC=nottingham,DC=ac,DC=uk",
                  ldapquery => "sAMAccountName=$user",
                  ldapattributes => array("displayname", "department", "useraccountcontrol", "memberof"));

    
# 'Directory Manager' can see all attributes eg pdsAccountStatus, pdsRole etc; BUT dont want to use that user here so...
# Added 'helpdeskadmin' role to new dbrowser user and can see pdsRole and externalaccounts but NOT pdsAccountStatus
# so had to add 'admin' role to dbrowser user (OR may be able to tweak ldap ACIs to do this??)
$my = array  (    label => "Portal",
    			  type => "luminis",
    			  ldaphost => "portalresourcetest.nottingham.ac.uk",
                  ldapport => "10389",
                  ldapuser => "uid=dbrowser,ou=People,o=nottingham.ac.uk,o=cp",
                  ldappass => "catbertkfc",
                  ldaprootdn => "o=nottingham.ac.uk,o=cp",
                  ldapquery => "uid=$user",
                  ldapattributes => array("displayname", "pdsaccountstatus", "pdsexternalsystemid", "pdsrole", "employeenumber"));

# array of ldaps to checkin order want to display; servicename maps to arrays of data above
$servicestocheck = array ("nds", "auth", "vault", "my", "ad");

# DEV...  
$servicestocheck = array ("my");
$servicestocheck = array ("int","nds", "auth", "vault", "my", "ad");

## PROGRAM FLOW #######################################################

$self = basename($_SERVER['PHP_SELF']);
$debug=4;
if ($self == "times.php")
{
	## just check NDS for account created and password changed times...
	$servicestocheck = array ("nds", "auth", "vault");
?>
	<h1>User Check</h1>
	<ul>
		<li>Use this form to check account exists and password changed times</li>
	</ul>

	<form action="times.php" method="post">
	<table cellpadding="3" summary="Username/password" border="0" style="margin-left: 20px">
	  <tr>
		<td>Username:</td>
		<td><input type="text" size="12" name="user" value="<?php echo $user?>" /></td>
	  </tr>
	  <tr>
		<td></td>
		<td><input type="submit" value="Check" /></td>
	  </tr>  
	</table>
	</form>
<?php
}
else
{
	## "full" usercheck
?>

<h1>User Check</h1>
<ul>
	<li>Use this form to check your user accounts</li>
	<li>You can omit the password to just check that an user exists on the different systems</li>
</ul>

<form action="iusercheck.php" method="post">
<table cellpadding="3" summary="Username/password" border="0" style="margin-left: 20px">
  <tr>
    <td>Username:</td>
    <td><input type="text" size="12" name="user" value="<?php echo $user?>" /></td>
  </tr>
  <tr>
    <td>Password:</td>
    <td><input type="password" size="12" name="pass" value="" /></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" value="Check" /></td>
  </tr>  
</table>
</form>

<?php
}


if ($user)
{
  print "<p style=\"margin-top: 1.6em\">Results for <b>$user</b>:</p>\n\n";
  
  print '<table cellspacing="2" summary="LDAP data">' . "\n\n";
  
  foreach ($servicestocheck as $service)
  {  
    if ($debug) print "<p>Label: <b>" . ${$service}["label"] . "</b> Type: <b>" . ${$service}["type"] . "</b></p>\n";
    
    $return = checkldap(${$service}["label"], ${$service}, $user, $pass);  	# eg Portal, $my, username-to-check, password-to-check
	if (!$return["error"])
	{
	  	# process ldapsearch results and display ...
	  	$data = processresults (${$service}["label"], ${$service}["type"], $return);	# eg Portal, <ldap type>, $return-data
		if ($debug)
		{
			print "<pre><b>Data after processresults for " . ${$service}["label"] . "</b>\n";
			var_dump($data);
			print "</pre>\n";
	  	}
	}
	printresults (${$service}["label"], $return, $data);				# will also print nice error if $return["error"]	
	flush();    
	
	#######################
	# store UK and Int AD group membership for later...
	if ($service == 'ad')
	{
		$ukadgroups = $data{'adgroups'};
	}
	elseif ($service == 'int')
	{
		$intadgroups = $data{'adgroups'};
	}
	#######################
	
  }  
  
  print "</table>\n\n";
  
  
  #######################
  # print UK AD groups and tick if appear in Int
  print "<h2>UK AD Groups</h2>\n<p>List of groups from UK AD; ticked if found exact match in International LDAP</p>\n";
  
	sort ($ukadgroups);
	foreach ($ukadgroups as $group)
	{
		# check to see if group is in INT list...
		if (in_array("$group", $intadgroups))
		{
			print "  <img src=\"https://my.nottingham.ac.uk/media/1.gif\" alt=\"tick\"/> $group<br/>\n";
		}
		else
		{
			print "  <img src=\"https://my.nottingham.ac.uk/media/0.gif\" alt=\"cross\"/> <b>$group</b><br/>\n";
		}
	}
	print "\n";
	
				
  #######################				
  
  if ($debug >1)
  {
  	print "<b>Debug: PasswordsInfo:</b>";
  	print_r($passwords);
  }
  # if NDS != portal password print info box...
  
  if ($passwords['nds'] == 'OK' and $passwords['portal'] == 'FAIL')
  {
	print '<div class="infobox">' . "\n";
	print 'Your Portal password wont be updated until you next login to the Portal.';
	print '</div>' . "\n";  
  }
  elseif ($passwords['nds'] == FAIL and $passwords['portal'] == 'OK')
  {
  	print '<div class="infobox">' . "\n";
  	print '<ul><li>Your Novell and Portal passwords are out of synch. Please ask the <a href="">IT Helpdesk</a> to reset your Novell password and then use this new password to login to the Portal</li>';
    print '<li>When you log into the Portal with your Novell (NDS) password the Portal will recognise that your password has changed</li>';
    print '<li>On the Password Changed page you can click on the "click here to continue..." link to continue the login</li></ul>';
	print '</div>' . "\n";  
  }
  

}


/* ********************************************************************
CHECKLDAP: lookup user details, then bind with DN+pass (ie tests pass)
INPUTS:    label - label for this ldap (eg Portal or Novell)
           ldap  - array of ldap config settings
           user  - username to test
           pass  - password to test
OUTPUTS:   results - array of user information OR error message 
******************************************************************** */
function checkldap ($label, $ldap, $user, $pass)
{
  global $debug,$passwords;
  
  ## Connect to LDAP
  if ($debug >= '3') print '<br>DEBUG: CONNECT: ' . $ldap["ldaphost"] . ': ' . $ldap["ldapport"];
  if (!$connection = @ldap_connect ($ldap["ldaphost"], $ldap["ldapport"]))
  {
    if ($debug >= '3') print '<br>DEBUG: CONNECT FAILED';
    $return = array( error => "ERROR: Failed to connect to $label LDAP (" . $ldap["ldaphost"] .
          ':' . $ldap["ldapport"] . ')');
    return ($return);   # return array so can contain results array & error msgs
  }
  else
  {
    ## Bind (to lookup user details including dn - used for password test)
    if ($debug >= '3') print '<br>DEBUG: BIND: ' . $ldap["ldapuser"] . ': ' . $ldap["ldappass"];   
    $bind = @ldap_bind($connection, $ldap["ldapuser"], $ldap["ldappass"]);
    if (!$bind)
    {
    	if ($debug >= '3') print '<BR> DEBUG: BIND FAILED (ldap error says: ' . ldap_error ($connection) . ')';
    	$return = array( error => "ERROR: Failed to bind to LDAP");
		return ($return);  		# return results array with error msg
    }
    
    ## Search
    if ($debug >= '3') print '<br>DEBUG: SEARCH: ' . $ldap["ldaprootdn"] . ': ' . $ldap["ldapquery"];        
    $search = @ldap_search($connection, $ldap["ldaprootdn"], $ldap["ldapquery"], $ldap["ldapattributes"]);
    
    ## Get results
    $count = @ldap_count_entries($connection, $search);
    if ($debug >= '3') print "<br> DEBUG: COUNT: $count";
    $results = @ldap_get_entries($connection, $search);
    			//var_dump($results);
    
    if ($debug >= '4'){
      print "<br>Raw data from search for $label\n";
      foreach ($results[0] as $key => $value) {
        print "<br> $key => $value";
      }
    }
    
    if ($pass)
    {
	    ## Bind as user to test password
	    if ($debug >= '3') print '<br>DEBUG: BIND AS USER: ' . $results[0]["dn"] . ": password as supplied:";  # . "<b>" . $pass . "</b>";  
	    $authbind = @ldap_bind($connection, $results[0]["dn"], $pass);
	    if ($authbind)
	    {
	    	$testpass = 'OK';    						# passwd is OK as bound OK
	    	if ($label == "Novell (Nottingham tree)") $passwords['nds'] = "OK";		# save for later cf
	    	elseif ($label == "Portal") $passwords['portal'] = "OK";				# save for later cf
	    }	
	    else 
	    {
	    	$testpass = ldap_error ($connection);
	    	if ($label == "Novell (Nottingham tree)") $passwords['nds'] = "FAIL";	# save for later cf
	    	elseif ($label == "Portal") $passwords['portal'] = "FAIL";				# save for later cf
	    }	
	    	    
	    if ($debug >= '3')
	    {
			if ($authbind) print '<br>DEBUG: BOUND OK (ie password correct)';
			else print '<br>DEBUG: BIND FAILED (ie password wrong)';
			print '. ldap_error: ' . $testpass;
			print '<br>DEBUG: PASSWORDS ';
			print_r ($passwords);
	    }
    }
    else
    {
    	if ($debug >= '3') print '<br>DEBUG: NO PASSWORD SO DIDNT TEST';
    }
    
    ## Close LDAP connection
    if ($debug >= '3') print '<br>DEBUG: CLOSE<br>';
    ldap_close($connection);
    
    ## Return
    $return = array (results => $results, count => $count, pass => $testpass);
    if ($debug >= '2')
	{
	    print "<pre><b>Return data from checkldap for $label:</b>\n";
	    var_dump($return);
	    print "</pre>\n";
  	}    
    return ($return);   # return results array
  }
}


/* ********************************************************************
PROCESS RESULTS: search results --logic--> data array to print out; this is the logic step...
INPUTS:    label   - label for this ldap (eg Portal or Novell)
           type    - type of ldap: nds/ad/luminis
           return  - (raw) results returned from ldapsearch
NB For luminis: returned labels are all LOWERCASE      
OUTPUTS:   data    - array of data want to display...
						userexists	yes/no/multiple		
						username	<name>		
						department	<dept>		

						accountenabled	yes/no/empty	
						accountstatus	enabled/expired/disabled	
						accountmessage	eg was suspended until... OR suspended until ... or Grace logins expired
						pwdchangedtime <time>
						accountcreated <time>

						externalaccounts <list (with commas)>
						roles 			 <list (with commas)>
						adgroups		 <list (array)>
						employeenumber	 <ID>

						passwordchecked	yes/no				
						passwordok	yes/no/empty				
						passwordmessage	eg Invalid credentials	OR unwilling to perform		
******************************************************************** */
function processresults ($label, $type, $return)
{
	global $debug;                      
	if ($return["results"] && $return["count"] == 1)
	{
		# user exists... 
    	$data{'userexists'} = 'yes';  
    
    	# user data
    	# ---------
    	if ($type == 'ad')
		{
			# note NDS data is utf8 so change this to utf8 to match (tehn can display all utf8); was iso-8859-1
			$data{'username'} = utf8_encode($return["results"][0]["displayname"][0]);	
			$data{'department'} = $return["results"][0]["department"][0];
    	}
    	elseif ($type == 'vault')
		{
			# vault attributes slightly different to nottingham and auth NDS trees!
			$data{'username'} = $return["results"][0]["givenname"][0] . ' ' . $return["results"][0]["sn"][0];
			# NO DEPT
			#$data{'department'} = $return["results"][0]["ou"][0];
    	}   
    	elseif ($type == 'nds')
		{
					$data{'username'} = $return["results"][0]["fullname"][0];
					$data{'department'} = $return["results"][0]["ou"][0];
    	} 
    	elseif ($type == 'luminis')
    	{
    		$data{'username'} = $return["results"][0]["displayname"][0];
      		# no department data, its part of roles so tricky to extract
    	}
     
    	# account enabled/disabled/expired + times
    	# ----------------------------------------
    	if ($type == 'ad')
		{
## bitwise stuff should really go here ...
		    
			if ($return["results"][0]["useraccountcontrol"][0] == "514" or $return["results"][0]["useraccountcontrol"][0] == "66050" or $return["results"][0]["useraccountcontrol"][0] == "66082")
			{
				$data{'accountenabled'} = 'no';
				$data{'accountstatus'} = 'Account Disabled';
				## $data{'accountmessage'} = 'grace logins: ' . $return["results"][0]["logingraceremaining"][0];
			}
			elseif ($return["results"][0]["useraccountcontrol"][0] == "512" or $return["results"][0]["useraccountcontrol"][0] == "66048")
			{
				$data{'accountenabled'} = 'yes';
				$data{'accountstatus'} = 'Account Enabled';	
				## $data{'accountmessage'} = 'grace logins: ' . $return["results"][0]["logingraceremaining"][0];
			}
			else
			{
				$data{'accountenabled'} = '';
				$data{'accountstatus'} = 'Unable to determine account status';	
				$data{'accountmessage'} = 'useraccountcontrol=' . $return["results"][0]["useraccountcontrol"][0];
			}		    		    
    	} # # end ad
    	
    	elseif ($type == 'nds')
		{
			# check grace logins  (if expired then cant login even if account isnt 'disabled')
			if ($return["results"][0]["logingraceremaining"][0] == "0")
			{
				$data{'accountenabled'} = 'no';
				$data{'accountstatus'} = 'Account Disabled';
				$data{'accountmessage'} = 'grace logins expired';			
			}
			else
			# check enabled/disabled
			# disabled: logindisabled = TRUE;  enabled: logindisabled = FALSE / doesnt exist
			{
				if ($return["results"][0]["logindisabled"][0] == "TRUE")
				{
					$data{'accountenabled'} = 'no';
					$data{'accountstatus'} = 'Account Disabled';
					$data{'accountmessage'} = 'grace logins: ' . $return["results"][0]["logingraceremaining"][0];
				}
				else
				{
					$data{'accountenabled'} = 'yes';
					$data{'accountstatus'} = 'Account Enabled';	
					$data{'accountmessage'} = 'grace logins: ' . $return["results"][0]["logingraceremaining"][0];			
				}			
			}
		    # pwdchangedtime
		    $data{'pwdchangedtime'} = $return["results"][0]["pwdchangedtime"][0];	
		    # account created
		    $data{'accountcreated'} = $return["results"][0]["createtimestamp"][0];
		    
    	}   # end nds 
    	
    	elseif ($type == 'vault')
    	# vault attributes slightly different to nottingham and auth NDS trees!
		{
			# DONT check grace logins  
			# check enabled/disabled by checking if account is in the Active or Inactive trees
			# eg dn: cn=lpxnm4,ou=Students,ou=Inactive,ou=Accounts,o=University
				if (eregi('ou=Inactive', $return["results"][0]["dn"]))
				{
					$data{'accountenabled'} = 'no';
					$data{'accountstatus'} = 'Account Disabled';
					# DONT display grace logins
					#$data{'accountmessage'} = 'grace logins: ' . $return["results"][0]["logingraceremaining"][0];
				}
				elseif (eregi('ou=Active', $return["results"][0]["dn"]))
				{
					$data{'accountenabled'} = 'yes';
					$data{'accountstatus'} = 'Account Enabled';	
					# DONT display grace logins
					# $data{'accountmessage'} = 'grace logins: ' . $return["results"][0]["logingraceremaining"][0];
				}
				else
				{
					$data{'accountenabled'} = '';
					$data{'accountstatus'} = 'Unable to determine account status';	
					$data{'accountmessage'} = 'dn: ' . $return["results"][0]["dn"];			
				}		
		    	# account created
		    	$data{'accountcreated'} = $return["results"][0]["createtimestamp"][0];				
    	}   # end vault     	
    	
    	elseif ($type == 'luminis')
    	{
    		if ($return["results"][0]["pdsaccountstatus"][0] == "enabled" || $return["results"][0]["pdsaccountstatus"][0] == "") 
      		{ 
      			$data{'accountenabled'} = 'yes';
      			$data{'accountstatus'} = 'Account Enabled';
      		}
    		elseif ($return["results"][0]["pdsaccountstatus"][0] == "disabled")
			{ 
				$data{'accountenabled'} = 'no';
				$data{'accountstatus'} = 'Account Disabled';
			}    	
			elseif ($return["results"][0]["pdsaccountstatus"][0] == "expired")
    		{ 
				$data{'accountenabled'} = 'no';
				$data{'accountstatus'} = 'Account Disabled';
				$data{'accountmessage'} = 'expired';
      		}
      		elseif (eregi('^suspended until ([-:0-9 ]*).*', $return["results"][0]["pdsaccountstatus"][0], $matches))
			{
				# is/was suspended; convert date/time to timestamp to compare with current time to see if passed				
				if (strtotime ($matches[1]) <= time())
				{
					# suspension period has ended -> account is enabled
			  		$data{'accountenabled'} = 'yes';
			  		$data{'accountstatus'} = 'Account Enabled';
			  		$data{'accountmessage'} = 'was suspended until ' . $matches[1];				  
			  	}
			  	else
			  	{
			  		$data{'accountenabled'} = 'no';
			  		$data{'accountstatus'} = 'Account Disabled';
			  		$data{'accountmessage'} = 'suspended until ' . $matches[1];	
        	 	}
      		} 
      		else
      		{
				$data{'accountenabled'} = '';
				$data{'accountstatus'} = 'Unable to determine account status';	
				$data{'accountmessage'} = 'pdsaccountstatus: ' . $return["results"][0]["pdsaccountstatus"][0];		   		
      		}
    	} # end luminis     
    	
    	
    	# roles and external accounts
    	# ---------------------------
    	if ($type == 'ad')
		{
		    # first remove count as dont want in output
    		unset($return["results"][0]["memberof"]['count']);	
    		foreach ($return["results"][0]["memberof"] as $memberof)
    		{
    			# eg CN=UI-Portal-Team,OU=Groups,OU=UI,OU=U,OU=Groups,OU=University,DC=ad,DC=nottingham,DC=ac,DC=uk
    			# strip CN= and trailing OU... to leave just actual group (ie UI-Portal-Team)
				preg_match("/CN=(.*),/U", $memberof, $matches);	# U=ungreedy so stops match at first comma
    			$data{'adgroups'}[] = $matches[1];				# matches[1] = first matched subpattern (ie bit in brackets)  		
    		}
    	}
    	elseif ($type == 'luminis')
    	{   		
    		# first remove count as dont want in output
    		unset($return["results"][0]["pdsexternalsystemid"]['count']);	
    		# convert users external accounts to string (as easy to search with regular expresion)
    		# eg uazmjg::webctcustom, uazmjg::metalib, 493062414410091::gtmb, uazmjg::epars, ...
    		$userscpips = implode (", ", $return["results"][0]["pdsexternalsystemid"]);
    		$userscpips .= ',';		# add trailing comma so ALL cpips end in comma (use in match below)
    		# only interested in these core cpips so just look for these
    		$corecpips = explode (',', 'blog,epars,metalib,mydetailsreg,nexus,publications,webct,wiki');
    		foreach ($corecpips as $cpip)
    		{
    			# look for this cpip in users list of cpips and if found add it to results array
    		    if (preg_match("/$cpip,/", $userscpips)) $cpips[] = $cpip;
    		}
    		# convert results array to comma to seperated string
    		$data{'externalaccounts'} = implode (", ", $cpips);
    		
    		# first remove count as dont want in output
    		unset($return["results"][0]["pdsrole"]['count']);	 
    		# sort
    		$roles = $return["results"][0]["pdsrole"];
    		sort ($roles);
    		# convert array comma to seperated string + omit admin role (so obscure fact that this account is an admin one)
    		$data{'roles'} = eregi_replace('admin(, )?', '', implode (", ", $roles));		
    		
    		
    		$data{'employeenumber'} = $return["results"][0]["employeenumber"][0];
    	}    	
    	
  	
    	# password check
    	# --------------
    	if ($return["pass"]) 				
    	{
    		$data{'passwordchecked'} = 'yes';
    		
    		if ($return["pass"] == "OK") $data{'passwordok'} = 'yes';
    		elseif (ereg("unwilling to perform", $return["pass"]))
    		{
    			$data{'passwordok'} = '';						# ie failed to test password (not that password is wrong)
    			$data{'passwordmessage'} = 'unwilling to perform - please try again';
    		}
    		else 
    		{
    			$data{'passwordok'} = 'no';						# password is wrong as bind failed
    			$data{'passwordmessage'} = $return["pass"];		# eg Invalid credentials
    		}
    	}
    	else $data{'passwordchecked'} = 'no';   	
  }
  
  elseif ($return["results"] && $return["count"] > 1)
  {
    # multiple users found, cant continue as dont know which one to display data for
    $data{'userexists'} = 'multiple';  
  }
  
  else
  {
    # user not found
    $data{'userexists'} = 'no';
  }
 
  return $data;
}


/* ********************************************************************
PRINT RESULTS: print out results (or error msg) in html table
INPUTS:    label   - label for this ldap (eg Portal or Novell)
           return  - (raw) results returned from ldapsearch (includes error if fails to search)
           data	   - processed data (if search ran ok) 
OUTPUTS:   prints block for this ldap on screen
			eg <ldap name>  tick  User Exists
							tick  Account Enabled
							tick  Password OK
******************************************************************** */
function printresults ($label, $return, $data)
{
	global $self;
	# label
	print "\n\n <tr class=\"headerRow\"><th nowrap>$label</th>\n";
	if ($return["error"])
  	{
		print '    <td></td><td>' . $return["error"] . '</td></tr>' . "\n";
	} 
	else
	{
		# ldapsearch ran OK ...
		# user exists? ...
		if ($data{'userexists'} == 'no')
		{
			print '    <td><img src="https://my.nottingham.ac.uk/media/0.gif" alt="cross"/></td>';
			print '    <td>User not found</td></tr>' . "\n";		
		}
		elseif ($data{'userexists'} == 'multiple')
		{
			print '    <td> <b>?</b></td>';
			print '    <td>Error: Found multiple users</td></tr>' . "\n";			
		}
		else
		{
			# user exists
			print '    <td><img src="https://my.nottingham.ac.uk/media/1.gif" alt="tick"/></td>';		
			print '    <td>User exists: ' . $data{'username'};
			if ($data{'department'}) print '; ' . $data{'department'};
			print '</td></tr>' . "\n";
			
			# enabled/disabled ...
			if ($data{'accountenabled'} == 'yes') print ' <tr><th></th><td><img src="https://my.nottingham.ac.uk/media/1.gif" alt="tick"/></td>';
			elseif ($data{'accountenabled'} == 'no') print ' <tr><th></th><td><img src="https://my.nottingham.ac.uk/media/0.gif" alt="cross"/></td>';
			else print '<tr><th></th><td><b>?</b></td>';
			
			print '<td>' . $data{'accountstatus'};
			if ($data{'accountmessage'}) print ' (' . $data{'accountmessage'} . ')';
			print "</td></tr>\n";
			
			# accountcreated			
			if ($self == 'times.php' && $data{'accountcreated'})
			{
				# in times mode and got data -> display times
				# eg 20090817131224Z = yyyymmddhhmmssZ -> drop the Z and reformat
				preg_match ("/(\d{4})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/", $data{'accountcreated'}, $matches);
				$accountcreatedtime = $matches[4] . ':' . $matches[5] . ':' . $matches[6] . ' ' . $matches[3] . '-' . $matches[2] . '-' . $matches[1];	
				print '<tr><td></td><td></td>';
				print "<td>Account created $accountcreatedtime</td></tr>\n";
			}	
						
			# pwdchangedtime			
			if ($self == 'times.php' && $data{'pwdchangedtime'})
			{
				# in times mode and got data -> display times
				# eg 20090817131224Z = yyyymmddhhmmssZ -> drop the Z and reformat
				preg_match ("/(\d{4})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/", $data{'pwdchangedtime'}, $matches);
				$pwdchangedtime = $matches[4] . ':' . $matches[5] . ':' . $matches[6] . ' ' . $matches[3] . '-' . $matches[2] . '-' . $matches[1];	
				print '<tr><td></td><td></td>';
				print "<td>Password changed $pwdchangedtime</td></tr>\n";
			}			
			
			
			# roles, external accounts, AD groups
			if ($data{'roles'}) print " <tr><th></th><td></td><td>Roles: ". $data{'roles'} . "</td></tr>\n";
			if ($data{'externalaccounts'}) print " <tr><th></th><td></td><td>External Accounts: ". $data{'externalaccounts'} . "</td></tr>\n";
			
			if ($data{'employeenumber'}) print " <tr><th></th><td></td><td>ID: ". $data{'employeenumber'} . "</td></tr>\n";		
			
			if ($data{'adgroups'}) 
			{
				print " <tr><th></th><td></td><td><div class=\"mlTxt\">Group Membership</div>\n";
				print "<div class=\"mlHidden\">\n<ul>\n";
				$adgroups = $data{'adgroups'};
				sort ($adgroups);
				foreach ($adgroups as $group)
				{
					print "  <li>$group</li>\n";
				}
				print "</ul>\n</div>\n</td></tr>\n";
			
			}
			
				
			# password ...
		    if ($data{'passwordchecked'} == "yes")
		    {
				if ($data{'passwordok'} == 'yes') print ' <tr><th></th><td><img src="https://my.nottingham.ac.uk/media/1.gif" alt="tick"/></td><td>Password OK';
				elseif ($data{'passwordok'} == 'no') print ' <tr><th></th><td><img src="https://my.nottingham.ac.uk/media/0.gif" alt="cross"/></td><td>Password Incorrect';
				else print ' <tr><th></th><td><b>?</b></td><td>Error: Failed to check password';
				
				if ($data{'passwordmessage'} and $data{'passwordmessage'} != "Success") print ' (' . $data{'passwordmessage'} . ')';		# if fail to bind still get msg of Success - just dont show it
				print "</td></tr>\n";		
			}
			elseif ($data{'passwordchecked'} == "no")
			{
				print " <tr><th></th><td></td><td><em>Password not checked as not supplied</em></td></tr>\n";
			}			
		}
	}
}
?>

<p class="footer">
<?php
print "IP: <b>" . $_SERVER['REMOTE_ADDR'] . "</b><br />";
print "Browser: ". $_SERVER["HTTP_USER_AGENT"] . "</p>";

print "<p><a href='usercheck.php'>Reload</a> this page.</p>";
?>

</body>
</html>