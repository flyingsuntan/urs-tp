<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
    protected $insertFields = array('username','password','cpassword','chkcode','user_pic','user_pic_old');
    protected $updateFields = array('id','username','password','cpassword','user_pic','user_pic_old');
    // 修改用户名时使用的表单验证规则
    protected $_validate = array(
        array('username', 'require', '用户名不能为空！', 1, 'regex', 3),
        array('username','email','用户名必须是邮箱',1,'regex',3),
        array('username', '', '用户名已经存在！', 1, 'unique', 3),
        // 第六个参数：规则什么时候生效： 1：添加时生效 2：修改时生效 3：所有情况都生效
        array('password', 'require', '密码不能为空！', 1, 'regex', 3),
        array('cpassword', 'password', '两次密码输入不一致！', 1, 'confirm', 3),
        array('password','chkpassword','密码必须是大小写加数字',1,'callback',3),
    );
    // 为登录和注册的表单定义一个验证规则
    public $_login_validate = array(
        array('username', 'require', '用户名不能为空！', 1),
        array('username','email','用户名必须是邮箱',1),
        // 第六个参数：规则什么时候生效： 1：添加时生效 2：修改时生效 3：所有情况都生效
        array('password', 'require', '密码不能为空！', 1),
        array('password','chkpassword','密码必须是大小写加数字', 1, 'callback'),
        array('cpassword', 'password', '两次密码输入不一致！', 1,'',2),
        array('chkcode', 'require', '验证码不能为空！', 1),
        array('chkcode', 'check_verify', '验证码不正确！', 1, 'callback'),
    );

    // 验证验证码是否正确
    function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
    /**************判断密码必须由大小写和数字组成******************/
    public function chkpassword($password){
        if(preg_match('/(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[A-Za-z0-9]/', $password)){
            return true;
        }else{
            return false;
        }
    }
    /***************用户注册*****************/
    public function register(){
        $username = $this->username;
        $password = $this->password;

    }
    /***********************用户登录**************************/
    public function login(){
        $username = $this->username;
        $password = $this->password;
        //var_dump(md5($password));die;
        //查询用户是否存在
        $res = $this->where(array(
            'username'=>array('eq',$username),
        ))->find();
        if($res) {
            if ($res['password'] == md5($password)) {
                $_SESSION['user_id'] = $res['id'];
                $_SESSION['username'] = $res['username'];
                $_SESSION['user_pic'] = $res['user_pic'];
                return true;
            }else{
                $this->error = '密码不正确！';
                return false;
            }
        }else{
            $this->error='用户名不存在';
            return false;
        }
    }
    /***********************其他方法****************************/
    public function _before_insert(&$data,$option){
        $data['password'] = md5($data['password']);
    }
    public function _before_update(&$data,$option){
       $id = $option['where']['id'];
        $data['password'] = md5($data['password']);
        $data['id'] = $_SESSION['user_id'];
        $upload = new \Think\Upload();// 实例化上传类
        $upload->rootPath  =      './public/Uploads/'; // 设置附件上传根目录
        $info   =   $upload->upload();
        $data['user_pic'] = $info['user_pic']['savepath'].$info['user_pic']['savename'];
        //如果原来有图片先删除原有的图片
        $res = $this->field('user_pic')->find($id);
        if($res) {
            $path = "./public/Uploads/" . $res['user_pic'];
            //echo $path;die;
            unlink($path);
        }


    }
}