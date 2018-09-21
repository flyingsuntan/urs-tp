<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>用户管理中心 </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/Public/home/Styles/general.css" rel="stylesheet" type="text/css" />
    <link href="/Public/home/Styles/main.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/umeditor1_2_2-utf8-php/third-party/jquery.min.js"></script>
</head>
<body>
<h1>
    <?php if($_page_btn_name): ?>
    <span class="action-span"><a href="<?php echo $_page_btn_link; ?>"><?php echo $_page_btn_name; ?></a></span>
    <?php endif; ?>
    <span class="action-span1"><a href="#">管理中心</a></span>
    <span id="search_id" class="action-span1"> - <?php echo $_page_title; ?> </span>
    <div style="clear:both"></div>
</h1>

<!--  内容  -->

<div class="main-div">
    <form name="main_form" method="POST" action="/index.php/Home/User/edit.html" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <input type="hidden" name="id" value="<?php echo ($data['id']); ?>">
                <td class="label">用户姓名：</td>
                <td>
                    <input  type="text" name="username" value="<?php echo ($data['username']); ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">用户密码：</td>
                <td>
                    <input  type="password" name="password" value="" />
                </td>
            </tr>
            <tr>
                <td class="label">确认密码：</td>
                <td>
                    <input  type="password" name="cpassword" value="" />
                </td>
            </tr>
            <tr>
                <td class="label">用户头像：</td>
                <td>
                    <input  type="file" name="user_pic" value="" />
                </td>
            </tr>
            <tr>
                <td class="label"></td>
                <td>
                    <input type="text" value="<?php echo ($data['user_pic']); ?>" disabled="disabled" size="50">
                </td>
            </tr>
            <tr>
                <td colspan="99" align="center">
                    <input type="hidden" name="act" value="edit">
                    <input type="submit" class="button" value=" 确定 " />
                    <input type="reset" class="button" value=" 重置 " />
                </td>
            </tr>
        </table>
    </form>
</div>

<div id="footer"> @2018 39.com </div>
</body>
</html>