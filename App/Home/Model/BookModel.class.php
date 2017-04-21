<?php
namespace Home\Model;
use Think\Model;
class BookModel extends Model
{
	public function getNewest($cid)
	{
		$map['cid'] = $cid;
		$res = $this -> where($map) -> field('id,l_title,l_thumbnail,create_time') -> order('create_time desc') -> find();
		$res['create_time'] = time_format($res['create_time']);
		return $res;
	}
/**
 * 添加功能：当index为null或false时，取出试读列表，为true时取出所有列表
 */
	public function getAllLists($cid,$index=null)
	{
		$map['cid'] = $cid;
		if (!$index) {
			$map['view'] = 1;
		}
		$res = $this -> where($map) -> field('id,l_title,create_time as time,l_thumbnail,text as s_text,view') -> order('create_time desc') -> select();
		for ($i=0; $i < sizeof($res); $i++) { 
			$res[$i]['time'] = time_format($res[$i]['time']);
			if (strlen($res[$i]['s_text'])>69) {
				$res[$i]['s_text'] = mb_substr($res[$i]['s_text'],0,19,'utf-8').'......';
			}
			
		}
		return $res;
	}

	public function getText($id)
	{
		$map['id'] = $id;
		$res = $this -> where($map) -> field('id,cid,l_title,text,l_banner,create_time as time') -> find();
		$res['time'] = time_format($res['time']);
		//todo time filter
		$res['author'] = D("Course") -> getAuthorByCid($res['cid']);
		$res['price'] = D("Course") -> getPriceByCid($res['cid']);
		return $res;
	}

	public function getCidByLid($lid)
	{
		$map['id'] = $lid;
		$res = $this -> where($map) -> field('cid') -> find();
		return $res['cid'];
	}

	public function getViewOrNot($lid)
	{
		$map['id'] = $lid;
		$res = $this -> where($map) -> field('view') -> find();
		return $res['view'];
	}

	/**
	 * 获取最新更新内容，默认三条
	 */
	public function getNews($cid,$count=3)
	{
		$map['cid'] = $cid;
		$res = $this -> where($map) -> field('l_title,text,l_thumbnail,create_time,id') -> order('create_time desc') -> limit($count) -> select();
		for ($i=0; $i < sizeof($res); $i++) { 
			$res[$i]['text'] = mb_substr($res[$i]['text'], 0,15,'utf-8');
			$res[$i]['create_time'] = time_format($res[$i]['create_time']);
		}
		return $res;
	}
	
}
?>
