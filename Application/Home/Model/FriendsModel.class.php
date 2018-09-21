<?php
namespace Home\Model;
use Think\Model;
class FriendsModel extends Model{
    protected $insertFields = array('fid','act');
    protected $updateFields = array('fid','act');
    // 修改用户名时使用的表单验证规则
    protected $_validate = array(
        array('fid', 'require', '用户名不能为空！', 1, 'regex', 3),
        array('fid','email','用户名必须是邮箱',1,'regex',3),
    );

    /********************根据好友名查询好友ID并判断是否存在好友**********************/
    public function getIdByName($fname,$uid,$username){
        $userModel = D('user');

        $fid = $userModel->field('id')->where(array('username'=>$fname))->find();
        if($fid){
            $res = $this->where(array(
                'fid'=>$fid['id'],
                'uid'=>$uid
            ))->find();
            if($res){
                $this->error = '已添加过此好友';
                return false;
            }
            if($fname==$username){
                $this->error = '不能添加自己为好友';
                return false;
            }
            return $fid;
        }else{
            $this->error = '好友不存在';
            return false;
        }
    }
    /*********************好友列表************************/
    public function lst($id){
        $data['is_friends'] = $this
            ->alias('a')
            ->field('a.*,b.username')
            ->join('LEFT JOIN __USER__ b on a.fid=b.id')
            ->where(array('status'=>'1','uid'=>$id,'is_show'=>'1','is_defriend'=>'0'))->select();
        //echo $this->_sql();die;
        $data['not_friends']= $this
            ->alias('a')
            ->field('a.*,b.username')
            ->join('LEFT JOIN __USER__ b on a.fid=b.id')
            ->where(array('status'=>'0','fid'=>$id,'is_show'=>'1','is_defriend'=>'0'))->select();
        $data['is_defriend']= $this
            ->alias('a')
            ->field('a.*,b.username')
            ->join('LEFT JOIN __USER__ b on a.fid=b.id')
            ->where(array('status'=>'0','uid'=>$id,'is_show'=>'1','is_defriend'=>'1'))->select();

        return $data;
    }

    /*************************同意好友添加*************************/
    public function agree($data){
            $uid = $data['uid'];
            $fid = $data['fid'];
            $data1['status'] = 1;
            $res = $this->where(array(
                'uid'=>$uid,
                'fid'=>$fid
            ))->data($data1)->save();
            if(!$res){
                $this->error = '同意添加好友失败';
                return false;
            }

            $data2['uid'] = $fid;
            $data2['fid'] = $uid;
            $data2['status'] = '1';
            $res1 = $this->data($data2)->add();
        //echo $this->_sql();die;
            if(!$res1){
                $this->error = '同意添加好友失败';
                return false;
            }
            return true;

    }
    /******************拒绝添加好友***********************/
    public function refuse($id){
        $data['is_show'] = 0;
        $this->data($data)->save($id);
    }
    /***********************删除好友******************************/
    public function del($id){
        $data['is_show']='0';
        $res = $this->data($data)->where(array('id'=>$id))->save();
        if($res){
            return true;
        }else{
            $this->error='删除好友失败';
            return false;
        }
    }
    /********************拉黑好友***********************/
    public function defriend($id){
        $data['is_defriend']='1';
        $data['status'] ='0';
        $res = $this->data($data)->where(array('id'=>$id))->save();
        if($res){
            return true;
        }else{
            $this->error='加入黑名单失败';
            return false;
        }
    }
    /*******************取消好友拉黑*********************/
    public function friend($id){
        $data['is_defriend']='0';
        $data['status'] ='1';
        $res = $this->data($data)->where(array('id'=>$id))->save();
        //echo $this->_sql();die;
        if($res){
            return true;
        }else{
            $this->error='移除黑名单失败';
            return false;
        }
    }
    /*********************其他方法**********************/
    public function _before_update($data){
        //var_dump($data);die;
    }
}