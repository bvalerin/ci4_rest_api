drop table if exists tb_user;
create table tb_user(
	id int not null auto_increment primary key,
	name varchar(100) not null,
	username varchar(100) unique not null,
	password varchar(256) not null,
	email varchar(100) unique not null,
	phone varchar(100),
	deteled int(1) default 0 not null,
	created_at datetime not null,
	updated_at datetime not null,
	deleted_at datetime not null
);

