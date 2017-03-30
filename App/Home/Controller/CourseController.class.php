<?php
namespace Home\Controller;
use Home\Controller\HController;

class CourseController extends HController
{
	public function index()
	{
		$cid = I('get.cid');
        $uid = session('uid');
        $t = D('Subscribe') -> subscribeOrNot($uid,$cid);
        if ($t) {
            header("Location:http://zl.weilaimeixue.com/course/subscribed?cid=$cid");
        }else{
            $res = D('Course') -> getCourse($cid);
            $this -> assign('l',$res);
            $this -> display();
        }
		
	}

	public function course()
	{
		session('uid',1);

		if (null!==session('uid')) {
    		$uid = session('uid');
    		$cid = I('get.cid');
    		//todo 加防盗链过滤
    		$res1 = D('Course') -> getCourseInfoFromCourse($cid);
    		$res2 = D('Book') -> getAllLists($cid);
    		$this -> assign('t',$res1);
    		$this -> assign('list',$res2);
			$this -> display();
    	}else{
			$this -> redirect('index/index');
		}
	}

    public function text()
    {
        $lid = I('get.lid');
        $uid = session('uid');
        $res = D('Book') -> getText($lid);
        $this -> assign('l',$res);
        $this -> display();
    }

    public function subscribed()
    {
        $cid = I('get.cid');
        $uid = session('uid');
        $res = D('Course') -> getIntro($cid);
        $this -> assign('l',$res);
        $this -> display();
    }

    public function lists()
    {
        $cid = I('get.cid');
        $uid = session('uid');
        $r = D('Course') -> getTitle($cid);
        $res = D("Book") -> getAllLists($cid);
        $this -> assign('t',$r);
        $this -> assign('list',$res);
        $this -> display();
    }

    public function unsubscribe()
    {
        $lid = I('get.lid');
        $uid = session('uid');
        $res = D("Book") -> getText($lid);
        $this -> assign('l',$res);
        $this -> display();
    }

    public function comment(){
        $cid = 3;//I('get.cid');
        $res = D('Course') -> getComment($cid);
        $r = (array)$res;
        $max = max($r);
        foreach ($res as $key => $value) {
            $a[$key] = (int)ceil($value/$max*100);
        }
        $this -> assign('l',$a);
        $this -> display();
       
        
        //$this -> display();
    }
}


?>