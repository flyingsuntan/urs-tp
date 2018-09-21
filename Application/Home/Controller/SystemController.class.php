<?php
namespace Home\Controller;
use Think\Controller;
class SystemController extends BaseController{
    public function add(){
        if(IS_POST){
            if(I('post.act')=='add'){
                var_dump($_POST);die;
            }
        }
        $this->assign(array(
            '_page_title'=>'发表系统消息',
        ));
        $this->display();
    }
}