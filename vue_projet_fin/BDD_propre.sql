#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: membre
#------------------------------------------------------------

CREATE TABLE membre(
        id       Int  Auto_increment  NOT NULL ,
        pseudo   Varchar (30) NOT NULL ,
        password Varchar (255) NOT NULL ,
        role     Int NOT NULL ,
        email    Varchar (250) NOT NULL
	,CONSTRAINT membre_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: genre
#------------------------------------------------------------

CREATE TABLE genre(
        id    Int  Auto_increment  NOT NULL ,
        libel Varchar (30) NOT NULL
	,CONSTRAINT genre_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Livre
#------------------------------------------------------------

CREATE TABLE Livre(
        id        Int  Auto_increment  NOT NULL ,
        genres    Varchar (30) NOT NULL ,
        titre     Varchar (150) NOT NULL ,
        resum     Text NOT NULL ,
        image     Varchar (50) NOT NULL ,
        id_membre Int NOT NULL ,
        id_genre  Int NOT NULL
	,CONSTRAINT Livre_PK PRIMARY KEY (id)

	,CONSTRAINT Livre_membre_FK FOREIGN KEY (id_membre) REFERENCES membre(id)
	,CONSTRAINT Livre_genre0_FK FOREIGN KEY (id_genre) REFERENCES genre(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: chapter
#------------------------------------------------------------

CREATE TABLE chapter(
        id            Int  Auto_increment  NOT NULL ,
        title         Varchar (20) NOT NULL ,
        content       Text NOT NULL ,
        creation_date Datetime NOT NULL ,
        number        Int NOT NULL ,
        status        Int ,
        id_Livre      Int NOT NULL
	,CONSTRAINT chapter_PK PRIMARY KEY (id)

	,CONSTRAINT chapter_Livre_FK FOREIGN KEY (id_Livre) REFERENCES Livre(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comment
#------------------------------------------------------------

CREATE TABLE comment(
        id            Int  Auto_increment  NOT NULL ,
        creation_date Datetime NOT NULL ,
        content       Text NOT NULL ,
        alert         Int NOT NULL ,
        id_membre     Int NOT NULL ,
        id_Livre      Int NOT NULL
	,CONSTRAINT comment_PK PRIMARY KEY (id)

	,CONSTRAINT comment_membre_FK FOREIGN KEY (id_membre) REFERENCES membre(id)
	,CONSTRAINT comment_Livre0_FK FOREIGN KEY (id_Livre) REFERENCES Livre(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: suit_livre
#------------------------------------------------------------

CREATE TABLE suit_livre(
        id       Int NOT NULL ,
        id_Livre Int NOT NULL
	,CONSTRAINT suit_livre_PK PRIMARY KEY (id,id_Livre)

	,CONSTRAINT suit_livre_membre_FK FOREIGN KEY (id) REFERENCES membre(id)
	,CONSTRAINT suit_livre_Livre0_FK FOREIGN KEY (id_Livre) REFERENCES Livre(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: suit_membre
#------------------------------------------------------------

CREATE TABLE suit_membre(
        id        Int NOT NULL ,
        id_membre Int NOT NULL
	,CONSTRAINT suit_membre_PK PRIMARY KEY (id,id_membre)

	,CONSTRAINT suit_membre_membre_FK FOREIGN KEY (id) REFERENCES membre(id)
	,CONSTRAINT suit_membre_membre0_FK FOREIGN KEY (id_membre) REFERENCES membre(id)
)ENGINE=InnoDB;

