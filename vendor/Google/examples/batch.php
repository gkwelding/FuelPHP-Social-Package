<?php
session_start();

require_once "../src/apiClient.php";

$client = new apiClient();
$client->discover('plus');
$client->setScopes(array('https://www.googleapis.com/auth/plus.me'));

if (isset($_GET['logout'])) {
  unset($_SESSION['token']);
}

if (isset($_GET['code'])) {
  $client->authenticate();
  $_SESSION['token'] = $client->getAccessToken();
  header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
}

if (isset($_SESSION['token'])) {
  $client->setAccessToken($_SESSION['token']);
  $ret = apiBatch::execute(
    $client->plus->activities->list(array('userId' => 'me', 'collection' => 'public'), 'listActivities'),
    $client->plus->people->get(array('userId' => 'me'), 'getPerson')
  );

  print "<pre>" . print_r($ret, true) . "</pre>";
} else {
  $client->authenticate();
}