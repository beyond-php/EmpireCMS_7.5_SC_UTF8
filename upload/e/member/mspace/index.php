<?php
require('../../class/connect.php');
require('../../class/db_sql.php');
require('../class/user.php');
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
eCheckCloseMods('member');//关闭模块
$enews=$_POST['enews'];
if(empty($enews))
{
	$enews=$_GET['enews'];
}
//关闭
if($public_r['openspace']==1)
{
	printerror('CloseMemberSpace','',1);
}
//导入文件
if($enews=='ChangeSpaceStyle'||$enews=='DoSetSpace')
{
	include('spacecomfun.php');
}
elseif($enews=='AddMemberGbook'||$enews=='ReMemberGbook'||$enews=='DelMemberGbook'||$enews=='DelMemberGbook_All')
{
	include('gbookfun.php');
}
elseif($enews=='AddMemberFeedback'||$enews=='DelMemberFeedback'||$enews=='DelMemberFeedback_All')
{
	include('feedbackfun.php');
}
if($enews=="ChangeSpaceStyle")//选择空间模板
{
	ChangeSpaceStyle($_GET);
}
elseif($enews=="DoSetSpace")//设置空间信息
{
	DoSetSpace($_POST);
}
elseif($enews=="AddMemberGbook")//留言
{
	AddMemberGbook($_POST);
}
elseif($enews=="ReMemberGbook")//回复留言
{
	ReMemberGbook($_POST);
}
elseif($enews=="DelMemberGbook")//删除留言
{
	DelMemberGbook($_GET);
}
elseif($enews=="DelMemberGbook_All")//批量删除留言
{
	DelMemberGbook_All($_POST);
}
elseif($enews=="AddMemberFeedback")//提交反馈
{
	AddMemberFeedback($_POST);
}
elseif($enews=="DelMemberFeedback")//删除反馈
{
	DelMemberFeedback($_GET);
}
elseif($enews=="DelMemberFeedback_All")//批量删除反馈
{
	DelMemberFeedback_All($_POST);
}
else
{
	printerror("ErrorUrl","history.go(-1)",1);
}
db_close();
$empire=null;
?>