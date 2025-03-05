-- Adminer 4.8.1 PostgreSQL 14.2 (Ubuntu 14.2-1.pgdg20.04+1+b1) dump

DROP TABLE IF EXISTS "admin";
DROP SEQUENCE IF EXISTS admin_id_seq;
CREATE SEQUENCE admin_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 1 CACHE 1;

CREATE TABLE "public"."admin" (
    "id" integer DEFAULT nextval('admin_id_seq') NOT NULL,
    "uname" character varying(50) NOT NULL,
    "pwd" character varying(50) NOT NULL,
    CONSTRAINT "admin_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "admin" ("id", "uname", "pwd") VALUES
(1,	'admin',	'admin12345');

DROP TABLE IF EXISTS "contact";
DROP SEQUENCE IF EXISTS contact_id_seq;
CREATE SEQUENCE contact_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 3 CACHE 1;

CREATE TABLE "public"."contact" (
    "id" integer DEFAULT nextval('contact_id_seq') NOT NULL,
    "name" character varying(50) NOT NULL,
    "email" character varying(50) NOT NULL,
    "message" character varying(100) NOT NULL,
    CONSTRAINT "contact_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "contact" ("id", "name", "email", "message") VALUES
(1,	'Soham Das',	'sd@gmail.com',	'interested in bba classes'),
(3,	'Rahul Jash',	'sd@gmail.com',	'Want to know more about your MCA course');

DROP TABLE IF EXISTS "feedback";
DROP SEQUENCE IF EXISTS feedback_id_seq;
CREATE SEQUENCE feedback_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 3 CACHE 1;

CREATE TABLE "public"."feedback" (
    "id" integer DEFAULT nextval('feedback_id_seq') NOT NULL,
    "fname" character varying(50) NOT NULL,
    "lname" character varying(50) NOT NULL,
    "email" character varying(50) NOT NULL,
    "phone" character varying(10) NOT NULL,
    "comment" character varying(100) NOT NULL,
    CONSTRAINT "feedback_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "feedback" ("id", "fname", "lname", "email", "phone", "comment") VALUES
(1,	'Soham',	'Das',	'sd@gmail.com',	'8756903254',	'Nice Website'),
(3,	'Rahul',	'Jash',	'rj@gmail.com',	'9590346565',	'Sheeeeesh!');

DROP TABLE IF EXISTS "user";
CREATE TABLE "public"."user" (
    "fname" character varying(50) NOT NULL,
    "lname" character varying(50) NOT NULL,
    "email" character varying(50) NOT NULL,
    "phone" character varying(10) NOT NULL,
    "course" character varying(3) NOT NULL,
    "password" character varying(50) NOT NULL,
    CONSTRAINT "user_pkey" PRIMARY KEY ("email")
) WITH (oids = false);

INSERT INTO "user" ("fname", "lname", "email", "phone", "course", "password") VALUES
('Souvik',	'Chandra',	'sv@gmail.com',	'6834095433',	'BCA',	'pass'),
('Rahul',	'Jash',	'rj@gmail.com',	'9590346565',	'MBA',	'pass'),
('Subhajit',	'Singha',	'ss@gmail.com',	'7353454354',	'MBA',	'pass'),
('Soham',	'Das',	'sd@gmail.com',	'8756903254',	'BCA',	'pass');

-- 2022-05-25 10:48:15.700034+00
