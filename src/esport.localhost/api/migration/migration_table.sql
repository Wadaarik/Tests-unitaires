CREATE TABLE IF NOT EXISTS dataleague_pays (
id_pays INT NOT NULL AUTO_INCREMENT,
libelle VARCHAR(60) NOT NULL,
drapeau VARCHAR(60) NOT NULL,
PRIMARY KEY (id_pays),
UNIQUE INDEX id_pays_UNIQUE (id_pays ASC))
    ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS dataleague_equipe (
id_equipe INT NOT NULL AUTO_INCREMENT,
nom VARCHAR(60) NULL,
logo VARCHAR(60) NULL,
pays_id_pays INT NOT NULL,
date_creation VARCHAR(20) NULL,
link_fb VARCHAR(80) NULL,
link_twitter VARCHAR(80) NULL,
link_insta VARCHAR(80) NULL,
PRIMARY KEY (id_equipe),
UNIQUE INDEX id_equipe_UNIQUE (id_equipe ASC),
INDEX fk_equipe_pays_idx (pays_id_pays ASC),
CONSTRAINT fk_equipe_pays
    FOREIGN KEY (pays_id_pays)
        REFERENCES dataleague_pays (id_pays)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)
    ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS dataleague_jeux (
id_jeux INT NOT NULL AUTO_INCREMENT,
nom VARCHAR(60) NULL,
accronyme VARCHAR(45) NULL,
logo VARCHAR(150) NULL,
PRIMARY KEY (id_jeux),
UNIQUE INDEX id_jeux_UNIQUE (id_jeux ASC))
    ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS dataleague_poste (
id_poste INT NOT NULL AUTO_INCREMENT,
nom VARCHAR(60) NULL,
PRIMARY KEY (id_poste),
UNIQUE INDEX id_jeux_UNIQUE (id_poste ASC))
    ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS dataleague_joueur (
id_joueur INT NOT NULL AUTO_INCREMENT,
nom VARCHAR(60) NULL,
prenom VARCHAR(60) NULL,
pseudo VARCHAR(60) NULL,
jeux_id_jeux INT NOT NULL,
poste_id_poste INT NOT NULL,
equipe_id_equipe INT NOT NULL,
pays_id_pays INT NOT NULL,
photo VARCHAR(150) NULL,
PRIMARY KEY (id_joueur),
UNIQUE INDEX id_equipe_UNIQUE (id_joueur ASC),
INDEX fk_equipe_pays_idx (pays_id_pays ASC),
INDEX fk_joueur_equipe1_idx (equipe_id_equipe ASC),
INDEX fk_joueur_jeux1_idx (jeux_id_jeux ASC),
INDEX fk_joueur_poste1_idx (poste_id_poste ASC),
CONSTRAINT fk_equipe_pays0
    FOREIGN KEY (pays_id_pays)
        REFERENCES dataleague_pays (id_pays)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
CONSTRAINT fk_joueur_equipe1
    FOREIGN KEY (equipe_id_equipe)
        REFERENCES dataleague_equipe (id_equipe)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
CONSTRAINT fk_joueur_jeux1
    FOREIGN KEY (jeux_id_jeux)
        REFERENCES dataleague_jeux (id_jeux)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
CONSTRAINT fk_joueur_poste1
    FOREIGN KEY (poste_id_poste)
        REFERENCES dataleague_poste (id_poste)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)
    ENGINE = InnoDB;

