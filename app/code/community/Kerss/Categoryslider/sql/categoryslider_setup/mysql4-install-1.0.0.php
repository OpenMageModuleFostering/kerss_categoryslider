<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table categoryslider(
slider_id int not null auto_increment,
title varchar(100),
image varchar(255),
alttext varchar(100),
showurl int(11),
url varchar(100),
urltarget int(11),
description text,
showdesc int(11),
category_id varchar(100),
sortorder int(11),
status int(11),
primary key(slider_id));
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 