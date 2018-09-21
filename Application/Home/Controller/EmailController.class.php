<?php
namespace Home\Controller;
use Home\Controller\BaseController;
use Think\Controller;
class EmailController extends BaseController{
    /*****************发送站内信********************/
    public function add(){
        if(IS_POST){
            if(I('post.act')=='addemail'){
                $model = D('Email');
                //var_dump($_POST);die;
                if($model->create()){
                    $data = I('post.');
                    $data['uid'] = $_SESSION['user_id'];
                    if($model->addEmail($data)) {
                        $this->success('发送成功', U('index/index'));
                    }
                }
                $this->error($model->getError());
            }
        }
        //加载发送页面
        $this->display();
    }
}