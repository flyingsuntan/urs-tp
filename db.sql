drop table if exists urstp_user;
create table urstp_user
(
	id mediumint unsigned not null auto_increment comment '用户Id',
	username varchar(150) not null comment '用户名称',
	password varchar(150) not null comment '用户密码',
	user_pic varchar(150)  comment '用户头像',
	primary key (id),
)engine=InnoDB default charset=utf8 comment '用户表';


drop table if exists urstp_friends;
create table urstp_friends
(
	id mediumint unsigned not null auto_increment comment 'Id',
	uid mediumint unsigned not null  comment '用户Id',
	fid mediumint unsigned not null  comment '好友Id',
	is_delete enum('0','1') default 0 comment '是否删除 0未删除 1删除',
	is_show enum('0','1') default 1 comment '是否显示 0不显示 1显示',
	is_defriend enum('0','1') default 0 comment '是否拉黑 0未拉黑 1拉黑',
	primary key (id),
)engine=InnoDB default charset=utf8 comment '好友';



create table urstp_email
(
	id mediumint unsigned not null auto_increment comment 'Id',
	uid mediumint unsigned not null  comment '发送用户Id',
	fid mediumint unsigned not null  comment '接受用户Id',
	title varchar (150) not null comment '标题',
	content text not null comment '内容',
	sendtime int not null default "" comment '发送时间',
	status enum('0','1') not null default 0 comment '是否读取 0未读 1已读',
	readtime int not null default "" comment '读取时间',
	primary key (id),
)engine=InnoDB default charset=utf8 comment '站内信息表';