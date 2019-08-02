<?php
namespace app\home\controller;
use think\Controller;
class Selfqu extends Base
{
    public function index()
    {
    	
       
        return $this->fetch('Selfqu/index');
       
    }
}
