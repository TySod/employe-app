CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(100),
    password VARCHAR(255),
    email VARCHAR(100),
    PRIMARY KEY(id),
    INDEX(username)
);

CREATE TABLE qualifications (
    id INT(11) NOT NULL AUTO_INCREMENT,
    title VARCHAR(100),
    PRIMARY KEY(id),
    INDEX(title)
);
INSERT INTO `qualifications`(`title`) VALUES('SSCE');
INSERT INTO `qualifications`(`title`) VALUES('NCE');
INSERT INTO `qualifications`(`title`) VALUES('ND');
INSERT INTO `qualifications`(`title`) VALUES('HND');
INSERT INTO `qualifications`(`title`) VALUES('BSc');
INSERT INTO `qualifications`(`title`) VALUES('MSc');
INSERT INTO `qualifications`(`title`) VALUES('PhD');



CREATE TABLE employees (
    id INT(11) NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(100),
    lastname VARCHAR(100),
    salary VARCHAR(50),
    dob DATE,
    date_joined DATE,
    user_id INT(11) NOT NULL,
    qualification_id INT(11) NOT NULL,

    PRIMARY KEY(id),
    CONSTRAINT user_id_fk FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT qual_id_fk FOREIGN KEY(qualification_id) REFERENCES qualifications(id),
    INDEX(lastname)
);