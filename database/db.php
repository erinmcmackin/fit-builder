<?php
  $dbconn = null;
  if(getenv('DATABASE_URL')){
    // $connectionConfig = parse_url(getenv('DATABASE_URL'));
    // $host = $connectionConfig['host'];
    // $user = $connectionConfig['user'];
    // $password = $connectionConfig['pass'];
    // $port = $connectionConfig['port'];
    // $dbname = trim($connectionConfig['path'],'/');
    // $dbconn = pg_connect(
    //   "host=".$host." ".
    //   "user=".$user." ".
    //   "password=".$password." ".
    //   "port=".$port." ".
    //   "dbname=".$dbname
    // );
    $dbconn = pg_connect(getenv('DATABASE_URL'));
  } else {
    $dbconn = pg_connect("host=localhost dbname=fit_builder");
  }
?>

<!-- postgres://bcqpskctdwqqxe:c2c631a154ce05a0d07a06f9a22fd9a7e197767f6775f00abce907cf92768608@ec2-50-19-232-205.compute-1.amazonaws.com:5432/dc8403qd4rjc9t -->
