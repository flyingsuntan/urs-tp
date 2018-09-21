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


<!-- 列表 -->
<div class="list-div" id="listDiv">
    <table cellpadding="3" cellspacing="1">
        <p>好友列表</p>
        <tr>
            <th >好友名</th>
            <th width="150">操作</th>
        </tr>
        <?php foreach ($data['is_friends'] as $k => $v): ?>
        <tr class="tron">
            <td><?php echo $v['username']; ?></td>
            <td align="center" >
                <a href="" title="属性列表">属性</a>
                <a href="<?php echo U('del?id='.$v['id'])?>" title="删除好友">删除好友</a> |
                <a href="<?php echo U('defriend?id='.$v['id'])?>" onclick="return confirm('确定要拉黑吗？');" title="加入黑名单">加入黑名单</a>
            </td>
        </tr>
        <?php endforeach; ?>

        <tr><td>待通过好友列表</td></tr>
        <tr>
            <th >好友名</th>
            <th width="150">操作</th>
        </tr>
        <?php foreach ($data['not_friends'] as $k => $v): ?>
        <tr class="tron">
            <td><?php echo $v['username']; ?></td>
            <td align="center" >
                <a href="<?php echo U('agree?uid='.$v['uid'].'&fid='.$v['fid'])?>" title="同意">同意</a>
                <a href="<?php echo U('refuse?id='.$v['id'])?>" onclick="return confirm('确定要拒绝好友添加吗？');" title="拒绝">拒绝</a> |
                <a href="" onclick="return confirm('确定要拒绝好友添加吗？');" title="移除">移除</a>
            </td>
        </tr>
        <?php endforeach; ?>

        <tr><td>拉黑好友列表</td></tr>
        <tr>
            <th >好友名</th>
            <th width="150">操作</th>
        </tr>
        <?php foreach ($data['is_defriend'] as $k => $v): ?>
        <tr class="tron">
            <td><?php echo $v['username']; ?></td>
            <td align="center" >
                <a href="<?php echo U('friend?id='.$v['id'])?>"  title="移除黑名单">移除黑名单</a> |
                <a href="<?php echo U('del?id='.$v['id'])?>" onclick="return confirm('确定要删除好友吗？');" title="删除">删除</a>
            </td>
        </tr>
        <?php endforeach; ?>


        <?php if(preg_match('/\d/', $page)): ?>
        <tr><td align="right" nowrap="true" colspan="99" height="30"><?php echo $page; ?></td></tr>
        <?php endif; ?>
    </table>
</div>

<script>
</script>

<script src="/Public/home/Js/tron.js"></script>

<div id="footer"> @2018 39.com </div>
</body>
</html>