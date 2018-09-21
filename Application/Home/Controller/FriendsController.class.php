<?php
namespace Home\Controller;
use Think\Controller;
class FriendsController extends BaseController{
    public function lst(){

        //获取好友列表
        $model = D('Friends');
        //获取用户ID
        $id = $_SESSION['user_id'];
        //获取好友列表
        $data = $model->lst($id);
        //var_dump($data);die;
        $this->assign(array(
            'data' => $data,
            '_page_title'=>'好友列表',
        ));
        $this->display();
    }
    /*******************添加好友**********************/
    public function add(){
        if(IS_POST){
            if(I('post.act')=='addfriends'){
                $model = D('Friends');
                if($model->create()) {
                    $data = I('post.');
                    $data['uid'] = $_SESSION['user_id'];
                    //获取好友id
                    $fid = $model->getIdByName(I('post.fid'),$data['uid'],$_SESSION['username']);
                    if ($fid) {
                        //查询所添加好友是否已经添加
                        $data['fid'] = $fid['id'];
                        //var_dump($data);die;
                        if ($model->add($data)) {
                            $this->success('好友添加信息已发送', U('Friends/lst'));exit;
                        }
                    }
                }
               // var_dump($_POST);die;
                $this->error($model->getError());
            }
        }
        $this->assign(array(
            '_page_title'=>'好友添加',
        ));
        $this->display();
    }

    /*******************同意好友添加***********************/
    public function agree(){
        $model = D('Friends');
        $res = $model->agree(I('get.'));
        if($res){
            $this->success('同意添加好友成功',U('lst'));
        }else{
            $this->error($model->getError());
        }
    }
    /********************拒绝添加好友**********************/
    public function refuse(){
        $model = D('Friends');
        if($model->refuse(I('get.'))){
            $this->success('拒绝添加好友成功',U('lst'));exit;
        }
        $this->error($model->getError());
    }
    /********************删除好友************************/
    public function del(){
        $model = D('Friends');
        $res = $model->del(I('get.id'));
        if($res){
            $this->success('删除好友成功',U('lst'));
        }else{
            $this->error($model->getError());
        }
    }
    /*********************拉黑好友*************************/
    public function defriend(){
        $model = D('Friends');
        $res = $model->defriend(I('get.id'));
        if($res){
            $this->success('加入黑名单成功',U('lst'));
        }else{
            $this->error($model->getError());
        }
    }
    /*************取消好友拉黑********************/
    public function friend(){
        $model = D('Friends');
        $res = $model->friend(I('get.id'));
        if($res){
            $this->success('移除黑名单成功',U('lst'));
        }else{
            $this->error($model->getError());
        }
    }
}