create table tb_comments
(
	id int(10) unsigned not null auto_increment
		primary key,
	comment text null,
	path_img varchar(255) null,
	status tinyint(1) default '0' null,
	cdate timestamp default CURRENT_TIMESTAMP not null,
	name varchar(255) null,
	email varchar(255) not null,
	admin_date_change timestamp default '0000-00-00 00:00:00' not null
);


create table user
(
	login varchar(255) null,
	password varchar(255) null,
	id int not null auto_increment primary key,
	user_hash varchar(255) null
);

INSERT INTO db_test_m.user (login, password, user_hash) VALUES ('admin', 'd9b1d7db4cd6e70935368a1efb10e377', '');