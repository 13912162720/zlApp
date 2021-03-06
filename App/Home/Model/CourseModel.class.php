<?php
namespace Home\Model;
use Think\Model;
class CourseModel extends Model
{
	public function getCourses($uid=null)
	{
		$map['uid'] = $uid;
		
		$res = $this -> field('id,title,subhead,news,price,thumbnail') -> select();
		for ($i=0; $i < sizeof($res); $i++) { 
			$res[$i]['title'] = br_insert($res[$i]['title'],11);
			$res[$i]['subhead'] = br_insert($res[$i]['subhead'],15);
		}
		//todo  最新内容取一个

		//下列代码为已订阅不显示
		//$res1 = M('Subscribe') -> where($map) -> field('cid') -> select();
		// for ($i=0; $i < sizeof($res1); $i++) { 
		// 	for ($j=0; $j < sizeof($res); $j++) { 
		// 		if ($res1[$i]['cid']==$res[$j]['id']) {
		// 			unset($res[$j]);
		// 		}
		// 	}
		// }
		// $res = array_merge($res);
		return $res;
	}

	public function getCourse($id)
	{
		$map['id'] = $id;
		$res = $this -> where($map) -> field('id,title,s_intro,l_intro,author_intro,suit,notice,news,reco,price,banner') -> find();
		//todo  最新，推荐语，评分的过滤
		return $res;
	}

	public function getSubscribeInfo($id)
	{
		$map['id'] = $id;
		$res = $this -> where($map) -> field('id,title,s_intro,thumbnail,price,author') -> find();
		$daypay = $res['price']/365;
		if (strlen($res['title'])>60) {
			$res['title'] = mb_substr($res['title'], 0,18,'utf-8').'...';
		}
		$res['daypay'] = sprintf("%.2f",$daypay);
		$res['s_time'] = date("Y-m-d");
		$res['e_time'] = date("Y-m-d",time()+86400*365);
		return $res;
	}

	public function getTitleAndAuthor($id)
	{
		$map['id'] = $id;
		$res = $this -> where($map) -> field('id,title,author,s_intro') -> find();
		return $res;
	}
	
	public function getCourseInfoFromCourse($id)
	{
		$map['id'] = $id;
		$res = $this -> where($map) -> field('id,title,author') -> find();
		if (strlen($res['title'])>36) {
			$res['title'] = mb_substr($res['title'],0,12).'...';
		}
		return $res;
	}

	public function getAuthorByCid($id)
	{
		$map['id'] = $id;
		$res = $this -> where($map) -> field('author') -> find();
		return $res['author'];
	}

	public function getPriceByCid($id)
	{
		$map['id'] = $id;
		$res = $this -> where($map) -> field('price') -> find();
		return $res['price'];
	}

	public function getIntro($id)
	{
		$map['id'] = $id;
		$res = $this -> where($map) -> field('id,thumbnail,title,s_intro,l_intro,author_intro') -> find();
		return $res;
	}

	public function getSuccessInfo($id)
	{
		$map['id'] = $id;
		$res = $this -> where($map) -> field('id,title') -> find();
		return $res;
	}

	public function getComment($cid)
	{
		$map['id'] = $cid;
		$res = $this -> where($map) -> field('comment') -> find();
		return json_decode($res['comment']);
	}

}

?>