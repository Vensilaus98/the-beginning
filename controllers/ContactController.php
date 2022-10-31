<?php

namespace app\controllers;
use app\core\Controller;
use app\core\Request;

class ContactController extends Controller {

    public function home(){
        $params = [
            'name' => 'Name is pTRICK'
        ];
        return $this->render('users',$params);
    }


    public function handeSubmittedForm(Request $request){
        var_dump($request->getBody());
        return 'Handle submitted data';
    }


}