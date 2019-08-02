<?php
namespace app\admin\controller;
use think\Db;

class Good extends Base{
	public function index()
	{
		$list = Db::name('good')->field('g.id,g.name,g.price,g.pic,c.name as cname')->alias('g')->Join('category c','c.id = g.cid')->paginate(10);
		$this->assign('list',$list);
		return $this->fetch();
	}
	public function add()
	{
		if($this->request->isPost())
		{
			$post = input();
			$post['pic'] = upload('pic');
			$pics = uploads('pics');
			$res = Db::name('goods')->insertGetId($post);
			if($res)
			{
				foreach ($pics as $key => $value) {
					$photo[$key]['pic'] = $value;
					$photo[$key]['gid'] = $res;
				}
				Db::name('goods_photo')->insertAll($photo);
				$this->success('添加成功','index');
			}
			else
			{
				$this->error('添加失败');
			}
		}
		else
		{
			$res = Db::name('category')->select();
			$cate = get_childs($res);
			$this->assign('cate',$cate);
			return $this->fetch();
		}
	}
	public function edit()
	{
		if($this->request->isPost())
		{
			echo '<pre>';
			print_r($_FILES);die;
			$post = input();
			$te_date = explode(' - ', $post['te_date']);
			$post['te_start'] = strtotime($te_date[0]);
			$post['te_end'] = strtotime($te_date[1]);
			unset($post['te_date']);
            //echo '<pre>';
			//print_r($post);die;
			$pic = $_FILES['pic'];
			if(empty($pic['tmp_name']))
			{
				unset($post['pic']);
			}
			else
			{
				$post['pic'] = upload('pic');
			}
			//print_r($_FILES['image']);die;
			if(empty($_FILES['pics']['tmp_name'][0]))
			{
				unset($post['pics']);
			}
			else
			{
				$pics = uploads('pics');
				foreach ($pics as $key => $value) {
					$photo[$key]['pic'] = $value;
					Db::name('goods_photo')->where('gid',$post['id'])->update($photo[$key]);
				}
				//print_r($photo);die;
			}

			$res = Db::name('goods')->update($post);
			if($res)
			{
				$this->success('修改成功','index');
			}
			else
			{
				$this->error('修改失败');
			}
		}
		else
		{
			$id = input('id');
			$res = Db::name('category')->select();
			$cate = get_childs($res);
			$this->assign('cate',$cate);
			$info = Db::name('goods')->find($id);
			$info['te_start'] = date('Y-m-d',$info['te_start']);
			$info['te_end'] = date('Y-m-d',$info['te_end']);
			//print_r($info);die;
			$this->assign('info',$info);
			$pics = Db::name('goods_photo')->where('gid',$id)->select();
			$brand = Db::name('brand')->select();
			$this->assign('brand',$brand);
			$this->assign('pics',$pics);
			return $this->fetch();
		}

	}
	
	public function auto()
	{
		set_time_limit(0); 
		$res = $this->caiji();
		$count = ceil($res / 50);
		//print_r($res);die;
		for ($i=2; $i <= $count; $i++) {
			sleep(10);
			$this->caiji($i);
		}	
	}

	public function caiji($page = 1)
	{
		$url = 'http://api.dataoke.com/index.php?r=Port/index&type=total&appkey=5f619d74fc&v=2&page='.$page;
		$arr = http_curl($url);
		$arr = json_decode($arr,true);
        //print_r($arr);die;
		$total_num = $arr['data']['total_num'];
		if(!empty($arr['result']))
		{
			foreach ($arr['result'] as $key => $value)
			{
				$goods[$key]['name'] = $value['Title'];
				$goods[$key]['price'] = $value['Price'];
				$goods[$key]['pic'] = $value['Pic'];
				$goods[$key]['into'] = $value['Introduce'];
				$cids = [2,3,10,11];
				$k = array_rand($cids);
				$goods[$key]['cid'] = $cids[$k];
		    }

        }
        //echo '<pre>';
        //print_r($goods);die;
		$resa = Db::name('good')->insertAll($goods);
		//print_r($resa);die;
		return $total_num;
	}
	public function hot()
	{
		$post = input();
		$res = Db::name('good')->update($post);
		if($res)
		{
			$arr = ['code'=>0,'msg'=>'修改成功'];
		}
		else
		{
			$arr = ['code'=>1,'msg'=>'修改失败'];
		}
		return json($arr);
	}
	 //物理删除
    public function delete(){
    	if (request()->isGet()) {
    		$id=input('id');
    		$res=db('good')->delete($id);
    		$this->msg($res,'Good/index');
    	}
    }
}