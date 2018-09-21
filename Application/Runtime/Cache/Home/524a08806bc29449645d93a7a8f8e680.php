<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($title); ?></title>
</head>
<body>
<form method="post" action="/index.php/Home/Login/register.html" onsubmit="return validate()">
    <table cellspacing="0" cellpadding="0" style="margin-top:100px" align="center">
        <tr>
            <td style="padding-left: 50px">
                <table>
                    <tr>
                        <td>用户姓名：</td>
                        <td>
                            <input type="text" name="username" />
                        </td>
                    </tr>
                    <tr>
                        <td>用户密码：</td>
                        <td>
                            <input type="password" name="password" />
                        </td>
                    </tr>
                    <tr>
                        <td>确认密码：</td>
                        <td>
                            <input type="password" name="cpassword" />
                        </td>
                    </tr>
                    <tr>
                        <td>验证码：</td>
                        <td>
                            <input type="text" name="chkcode" class="capital" />
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" align="right">
                            <img  style="cursor: pointer" onclick="this.src='<?php echo U('chkcode');?>#'+Math.random();" width="150" height="30"  src="<?php echo U('chkcode')?>" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="checkbox" value="1" name="remember" id="remember" />
                            <label for="remember">请保存我这次的登录信息。</label>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" value="注册" class="button" />
                        </td>

                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <input type="hidden" name="act" value="register" />
</form>
</body>
</html>