<?php

namespace app\accessFilters;


#[\Attribute]

class Login implements \app\core\AccessFilters {
    public function redirected(){
		//make sure that the user is logged in
		if(!isset($_SESSION['user_id'])){
			header('location:/User/login');
			return true;
		}
		if($_SESSION['secret']!=NULL){
			header('location:/User/check2fa');
			return true;
		}
		return false;//not denied
	}
}