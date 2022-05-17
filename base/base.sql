--create database climat;

--use climat;

create table typeInformation(
    id int primary key AUTO_INCREMENT,
    typeInformation varchar(50)
);

create table information(
    id int primary key AUTO_INCREMENT, 
    idTypeInformation int,
    titre varchar(255),
    icone varchar(50),
    lien varchar(255),
    FOREIGN KEY (idTypeInformation) REFERENCES typeInformation(id)
);


create table domaine(
    id int primary key AUTO_INCREMENT,
    domaine varchar(50)
);

create table detailInformation(
    id int primary key AUTO_INCREMENT,
    idInformation int,
    idDomaine int,
    photo varchar(255),
    texteInformation text,
    titre varchar(255),
    FOREIGN KEY (idInformation) REFERENCES information(id),
    FOREIGN KEY (idDomaine) REFERENCES domaine(id)
);

create table admini(
    id int primary key AUTO_INCREMENT,
    mail varchar(150),
    mdp varchar(255),
    nom varchar(50)
);

insert into admini values(
    1,'rabe@gmail.com', sha1('0000'),'rabe'
);


insert into typeInformation values(
    1, 'cause'
);
insert into typeInformation values(
    2, 'probleme'
);
insert into typeInformation values(
    3, 'solution'
);
insert into typeInformation values(
    4, 'consequence'
);


insert into information values(
    1, 4,'Les plus touchees', 'concerne.jpg','Les-plus-touchees'
);
insert into information values(
    2, 2,'Raison du rechauffement climatique', 'cause.png', 'Raison-du-rechauffement-climatique'
);
insert into information values(
    3, 3,'Stopper le rechauffement climatique', 'stop.png', 'Stopper-le-rechauffement-climatique'
);



insert into domaine values(
    1, 'Animaux'
);
insert into domaine values(
    2, 'Humaines'
);
insert into domaine values(
    3, 'Agriculture'
);


insert into detailInformation values(
    1,1, 1, 'ours.jpg',
    'Le changement climatique constitue la principale menace 
    pesant sur l ours polaire. Si la fonte des glaces se poursuit au rythme 
    actuel, la surface de son habitat estival se sera contractee de plus de 
    40% d ici le milieu du 21e siecle faisant diminuer sa population de plus de deux tiers.',
    'Les ours polaires ne peuvent pas vivre sans glace'
);
insert into detailInformation values(
    2,2, 3, 'culture.jpg',
    'L agriculture est l une des causes du bouleversement climatique. 
    Elle est en effet responsable de pres d un quart des emissions mondiales 
    de gaz a effet de serre lorsque l on prend en compte la deforestation 
    (dont les raisons sont souvent d origine agricole).',
    'La culture face aux changements climatiques'
);
insert into detailInformation values(
    3,1, 2, 'chine.jpg',
    'L ex-empire du milieu y accuse le plus grand nombre de victimes avec
    plus de 12.5 millions de deces et plus de 3,3 de personnes impactees. 
    Il se classe deuxieme pour le montant des pertes economiques subies, estimees 
    a pres de 800 milliards de dollars. Plus que tout autre pays, la Chine a ete 
    affectee par les secheresses (39 evenements recenses depuis 1902).',
    'La chine et le climat: une relation tres ambigue'
);
insert into detailInformation values(
    4,3, 1,'question.jpg' ,
    'Des experts du climat ont rendu un rapport super alarmant sur le rechauffement 
    climatique. Le probleme est simple : si la temperature a la surface de la terre 
    augmente au-dela de 1,5 degres, la planete va connaitre des changements dramatiques 
    et irreversibles : disparition de territoires engloutis sous les eaux, extinction 
    des especes animales, montee des oceans, secheresse... Il nous reste 15 ans pour 
    agir avant qu’il ne soit trop tard, et le pire est que meme si les gouvernements du 
    monde respectent leurs engagements actuels, la temperature va monter de 3 degres d’ici 
    la fin du siecle ! La seule solution d’apres les scientifiques : changer completement de
    mode de transports, d’alimentation, de production. En gros, l un des plus grands 
    changements de l’histoire de l’Humanite. En est-on en est capable ? Peut-on stopper 
    le rechauffement climatique ? C’est la battle du jour.',
    'Est-ce possible de le stopper?'
);



create view informationTypeGeneral as
select i.id as idInformation,i.idTypeInformation, i.titre, i.icone, i.lien, ti.typeInformation
from information as i join typeInformation as ti on i.idtypeinformation = ti.id;

create view informationGlobale as
select i.id as idInfo, i.titre as titreInfo , d.id as idDomaine, d.domaine , di.texteInformation as descri, di.id, di.titre as theme 
from information as i join detailInformation as di on i.id = di.idInformation
join domaine as d on d.id = di.idDomaine;