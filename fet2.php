<?php

if ( !isset($_REQUEST['term']) )
    exit;

//$dblink = mysql_connect('server', 'username', 'password') or die( mysql_error() );
$dblink =  mysql_connect('50.63.105.50','weeereg','Weeereg@123') or die( mysql_error() );
//mysql_select_db('database_name');
mysql_select_db('weeereg');

$rs = mysql_query('select orgname from weeereg where orgname like "'. mysql_real_escape_string($_REQUEST['term']) .'%" order by orgname asc limit 0,10', $dblink);

$data = array();
if ( $rs && mysql_num_rows($rs) )
{
    while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
    {
        $data[] = array(
            'label' => $row['orgname']  ,
            'value' => $row['orgname']
        );
    }
}

echo json_encode($data);
flush();

