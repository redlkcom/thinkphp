<?php
namespace app\wp\controller;
class Address extends Base
{
    public function index()
    {
    	$this->check_login();
    	$res=db('address',[],false)->alias('a')->field('a.*,b.province p_name,c.city c_name,d.area d_name')->join('province b','a.province=b.provinceid')->join('cities c','a.city=c.cityid')->join('area d','a.area=d.areaid')->where(['is_del'=>0,'uid'=>session('user.id')])->limit(4)->select();
        $find=db('address',[],false)->where(['is_del'=>0,'uid'=>session('user.id'),'curruct'=>1])->find();
        session('address',$find['id']);
        $province=db('province',[],false)->select();
    	$this->assign(['res'=>$res,'province'=>$province]); 
        return $this->fetch('Address/index');
    }

    public function ajax()
    {
        $this->check_login();
    	if (request()->isPost()) {
    		$id=input('id');
    		$del=input('del');
    		if ($del==0) {
    			$update=db('address',[],false)->where(['uid'=>session('user.id')])->update(['curruct'=>0]);
	    		$res=db('address',[],false)->where(['id'=>$id])->update(['curruct'=>1]);
                session('address',$id);
	    		if ($update&&$res) {
	    			return 1;
	    		}else{
	    			return 0;
	    		}
    		}else if ($del==1) {
    			$res=db('address',[],false)->where('id',$id)->setField('is_del','1');
	    		if ($res) {
	    			return 1;
	    		}else{
	    			return 0;
	    		}
    		}
    	}
        
    }
    public function pro_ajax(){
        $code=substr(input('pro_code'),0,-2);
        $res=db('cities',[],false)->where(['provinceid'=>['like',$code.'%']])->select();
        return json($res);
    }
    public function city_ajax(){
        $code=substr(input('city_code'),0,-2);
        $res=db('area',[],false)->where(['cityid'=>['like',$code.'%']])->select();
        return json($res);
    }
    public function add(){
        $this->check_login();
        $res=db('address',[],false)->alias('a')->field('a.*,b.province p_name,c.city c_name,d.area d_name')->join('province b','a.province=b.provinceid')->join('cities c','a.city=c.cityid')->join('area d','a.area=d.areaid')->where(['is_del'=>0,'uid'=>session('user.id')])->limit(4)->select();
        $find=db('address',[],false)->where(['is_del'=>0,'uid'=>session('user.id'),'curruct'=>1])->find();
        session('address',$find['id']);
        $province=db('province',[],false)->select();

        if (request()->isPost()) {
            $post=input();
            $count=db('address',[],false)->where(['is_del'=>0,'uid'=>session('user.id')])->count();
            if ($count>4) {
                $this->error('地址过多');
            }else{
                if (isset($post['curruct'])&&$post['curruct']==1) {
                    $update=db('address',[],false)->where(['uid'=>session('user.id')])->update(['curruct'=>0]);

                    $post['uid']=session('user.id');
                    $res=db('address',[],false)->insert($post);
                    $this->msg($res,'Address/index');
                }
            }
        }

    	
    	$this->assign(['res'=>$res,'province'=>$province]); 
        return $this->fetch('Address/add');
    }
}
