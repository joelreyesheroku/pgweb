<?
/*************************************************************
*
*    This is a configuration file for Web 2.0 PG Admin
*
*************************************************************/

$sys_home 		= str_replace('conf.php', '', substr(__FILE__, strlen($_SERVER['DOCUMENT_ROOT'])));
$def_dbInit 	= false;
$def_dbSession	= false;

$def_css = Array();
$def_css[] 		= 'w20-main.css';
$def_css[] 		= 'w20-buttons.css';
$def_css[] 		= 'w20-ui-blue.css';

// -- users
$def_users = Array();
// $def_users['admin']	= 'minsk78';
$def_users['admin']	= 'Salesforce1';

// -- databases
$sys_dbs = Array();			   // ip:[port]:user:pass
$sys_dbs['dep4u487kkh9qp'] = 'ec2-52-200-46-215.compute-1.amazonaws.com:5432:uc9f9cr45eouj7:pekl84dtm3ekov4s1fqaq8rcqdb';
// $sys_dbs['192.168.1.99 - postgres'] 	= 'localhost::postgres:lum3n';
// $sys_dbs['192.168.1.99 - drupal'] 		= 'localhost::drupal:drupal';
// $sys_dbs['192.168.1.98 - postgres'] 	= '192.168.1.98::postgres:lum3n';

?>