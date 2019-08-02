<?php
namespace app\home\controller;
use think\Controller;
class Vipqu extends Base
{
    public function index()
    {
    	
       
        return $this->fetch('Vipqu/index');
       
    }
}
