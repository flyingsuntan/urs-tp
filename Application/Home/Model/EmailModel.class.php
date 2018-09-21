<?php
namespace Home\Model;
use Think\Model;
class EmailModel extends Model{
    protected $insertFields = array('friend_name','content','title');
    protected $updateFields = array('friend_name','content','title');

    protected $_validate = array(
        array('friend_name','require','用户名不能为空',1 ),
        //array('friend_name','hysfcz','用户不存在',1 ,'callback',1),
        array('content','require','信息不能为空',1 ),
    );

    /******************验证好友是否存在********************/
    public function hysfcz($data){
        $model = D('User');
        $res = $model->where('username',$data)->select();
        $fid = $res['id'];
        if($fid){
            return true;
        }else{
            return false;
        }
    }
    /*************************发送站内信******************************/
    public function addEmail($data){
        $friendname = $data['friend_name'];
        $model = D('User');
        $res = $model->where(array(
            'username'=>array('eq',$friendname)
        ))->find();
        $fid = $res['id'];
        //查看用户是否存在
        if(!$fid){
            $this->error = '用户不存在！';
            return FALSE;
        }
        //查询是否有消息未读
        $uid = $data['uid'];
        $res = $this->where(array(
            'uid'=>array('eq',$uid),
            'fid'=>array('eq',$fid),
            'status'=>array('eq','0'),
        ))->find();
        //var_dump($res);die;
        if($res) {
            $this->error = '对方还有信息未读，不允许再发送信息！';
            return FALSE;exit;
        }
        $data['fid'] = $fid;
        $result = $this->add($data);
        if($result){
           return true;
        }else{
            $this->error = '发送失败！';
            return FALSE;
        }
    }
    /************************其他方法**************************/
    public function _before_insert(&$data,$option){
        $data['sendtime'] = time();
    }
}