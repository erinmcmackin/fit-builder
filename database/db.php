<?php
  $dbconn = null;
  if(getenv('DATABASE_URL')){
    $connectionConfig = parse_url(getenv('DATABASE_URL'));
    $host = $connectionConfig['host'];
    $user = $connectionConfig['user'];
    $password = $connectionConfig['pass'];
    $port = $connectionConfig['port'];
    $dbname = trim($connectionConfig['path'],'/');
    $dbconn = pg_connect(
      "host=".$host." ".
      "user=".$user." ".
      "password=".$password." ".
      "port=".$port." ".
      "dbname=".$dbname
    );
    // $dbconn = pg_connect(getenv('DATABASE_URL'));
  } else {
    $dbconn = pg_connect("host=localhost dbname=fit_builder");
  }
?>
