<?php
$this->addRoute('','Welcome,index');
$this->addRoute('home','Welcome,index');
$this->addRoute('map','Welcome,map');
$this->addRoute('User/registration','User,register');
$this->addRoute('User/login','User,login');
$this->addRoute('User/update','User,updateUser');
$this->addRoute('User/setup2fa' , 'User,setup2fa');
$this->addRoute('User/check2fa' , 'User,check2fa');