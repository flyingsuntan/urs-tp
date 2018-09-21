<?php
namespace Home\Controller;
use Home\Controller\BaseController;
use Think\Controller;
class EmailController extends BaseController{
    /*****************发送站内信********************/
    public function add(){
        if(IS_POST){
            if(I('post.act')=='addemail'){
                $friendname = I('post.friendname');
                $model = D('User');
                $res = $model->where('username',$friendname)->find();
                $fid = $res['id'];
            }
        }



        //加载发送页面
        $this->display();
    }
}