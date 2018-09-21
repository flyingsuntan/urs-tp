<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller{
    public function __construct()
    {
        //必须先调用父类得构造函数
        parent::__construct();
        //判断登录
        if(!session('user_id'))
            $this->error('必须先登录！',U('Login/login'));
    }
}