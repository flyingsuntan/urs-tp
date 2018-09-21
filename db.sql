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
	primary key (id),
)engine=InnoDB default charset=utf8 comment '好友';
