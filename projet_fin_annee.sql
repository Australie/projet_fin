#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: level
#------------------------------------------------------------

CREATE TABLE level(
        id    Int  Auto_increment  NOT NULL ,
        label Varchar (50) NOT NULL
	,CONSTRAINT level_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: member
#------------------------------------------------------------

CREATE TABLE member(
        id       Int  Auto_increment  NOT NULL ,
        pseudo   Varchar (50) NOT NULL ,
        password Varchar (50) NOT NULL
	,CONSTRAINT member_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: chapter
#------------------------------------------------------------

CREATE TABLE chapter(
        id            Int  Auto_increment  NOT NULL ,
        title         Int NOT NULL ,
        content       Text NOT NULL ,
        creation_date Datetime NOT NULL ,
        number        Int NOT NULL ,
        id_member     Int NOT NULL
	,CONSTRAINT chapter_PK PRIMARY KEY (id)

	,CONSTRAINT chapter_member_FK FOREIGN KEY (id_member) REFERENCES member(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comment
#------------------------------------------------------------

CREATE TABLE comment(
        id            Int  Auto_increment  NOT NULL ,
        creation_date Datetime NOT NULL ,
        content       Text NOT NULL ,
        alert         Int NOT NULL ,
        id_chapter    Int NOT NULL ,
        id_member     Int NOT NULL
	,CONSTRAINT comment_PK PRIMARY KEY (id)

	,CONSTRAINT comment_chapter_FK FOREIGN KEY (id_chapter) REFERENCES chapter(id)
	,CONSTRAINT comment_member0_FK FOREIGN KEY (id_member) REFERENCES member(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: a
#------------------------------------------------------------

CREATE TABLE a(
        id       Int NOT NULL ,
        id_level Int NOT NULL
	,CONSTRAINT a_PK PRIMARY KEY (id,id_level)

	,CONSTRAINT a_member_FK FOREIGN KEY (id) REFERENCES member(id)
	,CONSTRAINT a_level0_FK FOREIGN KEY (id_level) REFERENCES level(id)
)ENGINE=InnoDB;

