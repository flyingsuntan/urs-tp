<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends BaseController{
    /*****************修改用户信息*********************/
    public function edit(){
        if(IS_POST){
            if(I('post.act')=='edit'){
                $model = D('user');
                //var_dump($_POST);die;
                    if ($model->validate($model->_validate)->create()) {
                        //$path = $this->upload(I('files.'));
                        if ($model->save(I('post.'))) {
                            session_destroy();
                            $this->success('修改成功', U('Login/login'));exit;
                        }
                    }
                $this->error($model->getError());
            }
        }
        $data['username'] = $_SESSION['username'];
        $data['id'] = $_SESSION['user_id'];
        $data['user_pic'] = $_SESSION['user_pic'];
        $this->assign(array(
            'data' => $data,
            '_page_title'=>'修改用户姓名',
            'username'=>$_SESSION['username']
            ));
        //载入页面
        $this->display();
    }
}