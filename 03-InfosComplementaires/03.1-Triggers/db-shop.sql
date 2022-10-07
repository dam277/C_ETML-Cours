create database db_shop;
use db_shop;

create table t_client (
     idClient varchar(36) not null,
     nom varchar(50) not null,
     rue varchar(50) not null,
     numeroRue varchar(10) not null,
     Ville varchar(50) not null,
     NPA varchar(10) not null,
     constraint ID_t_client_ID primary key (idClient));

create table t_commande (
     idCommande char(1) not null,
     prixTotal char(1) not null,
     quantite int not null,
     idClient varchar(36) not null,
     idProduit varchar(36) not null,
     constraint ID_t_commande_ID primary key (idCommande));

create table t_produit (
     idProduit varchar(36) not null,
     nom varchar(20) not null,
     description varchar(255) not null,
     prix int not null,
     stock int not null,
     constraint ID_t_produit_ID primary key (idProduit));

alter table t_commande add constraint FKrealise_FK
     foreign key (idClient)
     references t_client (idClient);

alter table t_commande add constraint FKcontient_FK
     foreign key (idProduit)
     references t_produit (idProduit);

create unique index ID_t_client_IND
     on t_client (idClient);

create unique index ID_t_commande_IND
     on t_commande (idCommande);

create index FKrealise_IND
     on t_commande (idClient);

create index FKcontient_IND
     on t_commande (idProduit);

create unique index ID_t_produit_IND
     on t_produit (idProduit);