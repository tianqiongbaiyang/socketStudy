CREATE TABLE staffs(
                       id INT PRIMARY KEY AUTO_INCREMENT,
                       name VARCHAR(24) NOT NULL DEFAULT '' COMMENT '姓名',
                       age INT NOT NULL DEFAULT 0 COMMENT '年龄',
                       pos VARCHAR(20) NOT NULL DEFAULT '' COMMENT '职位',
                       add_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '入职时间'
) CHARSET utf8 COMMENT '员工记录表';

INSERT INTO staffs(name,age, pos,add_time)VALUES('z3',22,'manager',NOW());
INSERT INTO staffs(name,age, pos,add_time)VALUES('July',23,'dev',NOW());
INSERT INTO staffs(name,age, pos,add_time)VALUES('2000',23,'dev',NOW());
SELECT * FROM staffs;

ALTER TABLE staffs ADD INDEX idx_staffs_nameAgePos(name,age,pos);

SHOW INDEX FROM staffs;

EXPLAIN SELECT * FROM staffs WHERE name = 'July';
EXPLAIN SELECT * FROM staffs WHERE age = 25;
EXPLAIN SELECT * FROM staffs WHERE pos = 'dev';
EXPLAIN SELECT * FROM staffs WHERE name = 'July' AND age = 25 AND pos='dev';
EXPLAIN SELECT * FROM staffs WHERE age = 25 AND pos='dev' AND name = 'July';
EXPLAIN SELECT * FROM staffs WHERE name = 'July' AND age = 25;
EXPLAIN SELECT * FROM staffs WHERE name = 'July' AND pos='dev';
EXPLAIN SELECT * FROM staffs WHERE age = 25 AND pos='dev';