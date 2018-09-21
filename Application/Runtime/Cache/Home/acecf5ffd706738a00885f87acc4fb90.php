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
    <form name="main_form" method="POST" action="/index.php/Home/System/add.html" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <input type="hidden" name="id" value="<?php echo ($data['id']); ?>">
                <td class="label" style="text-align: left">标题：</td>
            </tr>
            <tr>
                <td align="left">
                    <input  type="text" size="50" name="title" value="" />
                </td>
            </tr>
            <tr>
                <td class="label">发送内容：</td>
            </tr>
            <tr>
                <td>
                    <textarea name="content" id="content"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="99" align="center">
                    <input type="hidden" name="act" value="add">
                    <input type="submit" class="button" value=" 确定 " />
                    <input type="reset" class="button" value=" 重置 " />
                </td>
            </tr>
        </table>
    </form>
</div>

<!-- 加载编辑器的容器 -->

<!-- 配置文件 -->
<script type="text/javascript" src="/Public/umeditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/Public/umeditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('content');
</script>


<div id="footer"> @2018 39.com </div>
</body>
</html>