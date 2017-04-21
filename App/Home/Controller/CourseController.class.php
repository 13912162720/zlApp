<?php
namespace Home\Controller;
use Home\Controller\HController;

class CourseController extends HController
{
    private $appId = 'wx9922497712255467';
    private $appSecret = 'f5d5e9355c335edeec98c4d3695788e9';

//未订阅内容详情显示
	public function index()
	{
        //获取课程id
		$cid = I('get.cid');
        $uid = session('uid');
        //查询用户是否订阅此课程
        $t = D('Subscribe') -> subscribeOrNot($uid,$cid);
        if ($t) {
            //已订阅则跳转到已订阅界面
            header("Location:http://zl.weilaimeixue.com/course/subscribed?cid=$cid");
        }else{
            //未订阅则显示未订阅页面
            $res = D('Course') -> getCourse($cid);
            $this -> assign('l',$res);
            $this -> display();
        }
		
	}

//已订阅内容详情显示
    public function subscribed()
    {
        $cid = I('get.cid');
        $uid = session('uid');
        $res = D('Course') -> getCourse($cid);
        // $res = D('Course') -> getIntro($cid);
        $this -> assign('l',$res);
        $this -> display();
    }

//未订阅试读列表
    //未订阅应该显示可试读的文章列表，而不是所有文章列表
    public function lists()
    {
        $cid = I('get.cid');//?I('get.cid'):$cid;
        $uid = session('uid');
        $r = D('Course') -> getCourseInfoFromCourse($cid);
        $res = D("Book") -> getAllLists($cid);

        $this -> assign('t',$r);
        $this -> assign('list',$res);
        $this -> display('lists');
    }

//已订阅游览列表
	public function course()
	{
		if (null!==session('uid')) {
    		$uid = session('uid');
    		$cid = I('get.cid');
        /**
         * cid查询数据库防盗链
         */
        /**start**/
            if (!(D('Subscribe')->subscribeOrNot($uid,$cid))) {
                $this -> redirect('index/index');
            }
        /**end**/
    		$res1 = D('Course') -> getCourseInfoFromCourse($cid);
    		$res2 = D('Book') -> getAllLists($cid,true);
    		$this -> assign('t',$res1);
    		$this -> assign('list',$res2);
			$this -> display();
    	}else{
			$this -> redirect('index/index');
		}
	}

//已订阅正文部分
    public function text()
    {
        $lid = I('get.lid');
        $uid = session('uid');
        /**
         * cid查询数据库防盗链
         */
        /**start**/
        //获取cid
        $cid = D('Book') -> getCidByLid($lid);
            if (!(D('Subscribe')->subscribeOrNot($uid,$cid))) {
                $this -> redirect('index/index');
            }
        /**end**/
        $res = D('Book') -> getText($lid);
        $res['likeit'] = D('Likeit') -> likeItOrNot($uid,$lid);
        $wx_js = A('Subscribe') -> js_info();
        $this -> assign('wx',$wx_js);
        $this -> assign('l',$res);
        $this -> display();
    }


//未订阅试读正文部分
/**
 * @todo 增加试读验证部分
 */
    public function unsubscribe()
    {
        $lid = I('get.lid');
        $uid = session('uid');
         /**
         * cid查询数据库防盗链
         * 此处防盗链应该防用户访问不可试读的文章
         * 但当用户已经订阅了此专栏时，不会触发跳转
         * @todo 跳转到相关指定页面
         */
        /**start**/
        $cid = D('Book') -> getCidByLid($lid);
            if (!(D('Subscribe')->subscribeOrNot($uid,$cid))) 
            {
                if (!(D('Book')->getViewOrNot($lid))) {
                            $this -> redirect('index/index');
                        }
            }
        /**end**/
        $res = D("Book") -> getText($lid);
        $wx_js = A('Subscribe') -> js_info();
        $this -> assign('wx',$wx_js);
        $this -> assign('l',$res);
        $this -> display();
    }

//评分部分，可惜不用了
    public function comment(){
        $cid = I('get.cid');
        $res = D('Course') -> getComment($cid);
        $r = (array)$res;
        $max = max($r);
        foreach ($res as $key => $value) {
            $a[$key] = (int)ceil($value/$max*100);
        }
        $this -> assign('l',$a);
        $this -> display();
    }

/**
 * @todo 增加最新更新功能
 */
  //最新更新
  public function news()
  {
    $lid = I('post.lid');
    $cid = I('post.cid')?I('post.cid'):D('Book') -> getCidByLid($lid);
    echo $cid;
  }
}


?>
