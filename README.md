# phpStudy


MYSQL学习：
SQL 语句

```
/Applications/XAMPP/xamppfiles/bin/mysql -u root 进入数据库
SHOW databases;//显示数据库
//查看表
SELECT * FROM MyGuests;

create DATABASE publications; 创建一个数据库
//使用数据库
 use publications; 
/
GRANT ALL ON publications.* TO 'hapii'@'localhost' IDENTIFIED BY 'qwer1234'; 允许hapii'@'localhost' 用密码直接访问数据库

/Applications/XAMPP/xamppfiles/bin/mysql -u hapii -p;新用户登录

创建一张表
 CREATE TABLE classics(
    -> author VARCHAR(128),
    -> title VARCHAR(128),
    -> type VARCHAR(16),
    -> year CHAR(4)) ENGINE MyISAM;
检查表: 查看表的头
DESCRIBE classics;

增加ID:
ALTER TABLE classics ADD id INT UNSIGNED NULL AUTO_INCREMENT KEY;

删除ID：
 ALTER TABLE classics DROP id;

插入：
INSERT INTO classics(author,title,type,year) VALUES('wq','my ancle uouo','type self','2010');

查看表:
SELECT * FROM classics;

重命名
ALTER TABLE classics RENAME pre1900;
改变列数据类型:
ALTER TABLE pre1900  MODIFY year SMALLINT;

添加新列
ALTER TABLE pre1900 ADD pages SMALLINT UNSIGNED;
//重命名列type 改为category
ALTER TABLE classics CHANGE type category VARCHAR(16);
//删除某一列
ALTER TABLE classics DROP pages;
//删除表
DROP TABLE idsposable;
创建索引
 ALTER TABLE classics ADD INDEX(category(20));
CREATE INDEX author ON classics(author(20));

创建带索引的表
CREATE TABLE classics(
author VARCHAR(128),
title VARCHAR(128),
category VARCHAR(16),
year SMALLINT,
INDEX (author(20)),
INDEX (title(20)),
INDEX (category(4)),
INDEX (year)) ENGINE MyISAM;
//国际公认的ISBN号主键

//添加FULLTEXT索引
ALTER TABLE classics ADD FULLTEXT(author,title);

//查找特定列
SELECT title,isbn FROM classics;
//所有行数
SELCET COUNT(*) FROM classics;
//去重复
SELECT DISTINCT author FROM classics;
删除year为
DELETE FROM classics WHERE year='2010';

//LIKE = 与WHERE
SELECT author FROM classics WHERE author LIKE "wq";
SELECT author FROM classics WHERE author="wq";

//LIMIT 1; 限定一行
SELECT author FROM classics WHERE author LIKE "wq" LIMIT 1;

//MATCH AGAINST 允许输入多个单词，并对FLLTEXT所有单词核对
SELECT author,title FROM classics
    -> WHERE MATCH(author,title) AGAINST('wq');
//bool模式下的 + 表示必须存在 -表示决不能存在吗否者从返回值中删除
 SELECT author,title FROM classics WHERE MATCH(author,title) AGAINST(+'w' IN BOOLEAN MODE);
//UPDATE SET 将 更新为
 UPDATE classics SET title = "live" WHERE title = "my ancle";
//ORDER BY 排序
SELECT author,title FROM classics ORDER BY title;
// GROUP BY 查询返回结果
SELECT category,COUNT(author) FROM classics GROUP BY category;

//两个表连接成一个单一的SELECT
SELECT name,author,title from customers,classics
    -> WHERE customers.isbn = classics.isbn;
NATURAL JION （自然连接）节省一些输入
SELECT name,author,title FROM customers NATURAL JOIN classics;

JOIN..ON 制定一个列将两个表连接在一起
SELECT name,author,title FROM customers JOIN classics ON customers.isbn = classics.isbn;
//AS 创建别名
SELECT name,author,title from customers AS cust,classics AS class WHERE cust.isbn = class.isbn;
//SQL中使用逻辑运算符
SELECT author,title FROM classics WHERE author LIKE 'mark%' AND author LIKE "%towen";
```

[留言板](https://www.php.cn/course/875.html)
