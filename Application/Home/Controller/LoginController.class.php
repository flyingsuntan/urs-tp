<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
        if(IS_POST){
            if(I('post.act')=='signin'){
                $model = D('User');
                if($model->validate($model->_login_validate)->create()){
                    if($model->login()){
                        $this->success('登录成功！',U('Index/index'));
                        exit;
                    }
                }
                $this->error($model->getError());
            }
        }

        $this->assign(array(
            'title'=>'登录页面'
        ));
        //载入登录页面
        $this->display();
    }
    /*****************生成验证码******************/
    public function chkcode(){

        $Verify = new \Think\Verify(array(
            'fontSize'    =>    100,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
            ));
        $Verify->entry();
    }

    /**********************用户注册*********************/
    public function register(){
        if(IS_POST){
            if(I('post.act')=='register'){
                $model = D('User');
                if($model->validate($model->_login_validate)->create()){
                    if($model->add()){
                        $this->success('注册成功',U('login'));exit;
                    }
                }
            }
            $this->error($model->getError());
        }

        $this->assign('title','用户注册');
        //载入注册页面
        $this->display();
    }
}