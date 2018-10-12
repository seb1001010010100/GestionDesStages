<?php
  use Cake\ORM\TableRegistry;
  $companies = TableRegistry::get('Companies');
  $query = $companies
    ->find()
    ->select(['email'])
    ->where(['DATEDIFF(NOW(), created)' => 15] && 'active' == false);
  $email = new Email('default');
  foreach($query as $row){

    $email->to('sebas84_5@hotmail.com')
          ->subject('Email de test')
          ->send('test');

  }

?>
