/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : PostgreSQL
 Source Server Version : 130010 (130010)
 Source Host           : localhost:5432
 Source Catalog        : db_skripsit
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 130010 (130010)
 File Encoding         : 65001

 Date: 22/06/2023 00:32:08
*/


-- ----------------------------
-- Sequence structure for laporan_kegiatan_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."laporan_kegiatan_id_seq";
CREATE SEQUENCE "public"."laporan_kegiatan_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for master_area_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."master_area_id_seq";
CREATE SEQUENCE "public"."master_area_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for master_category_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."master_category_id_seq";
CREATE SEQUENCE "public"."master_category_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for master_status_tiket_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."master_status_tiket_id_seq";
CREATE SEQUENCE "public"."master_status_tiket_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for master_transaksi_customer_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."master_transaksi_customer_id_seq";
CREATE SEQUENCE "public"."master_transaksi_customer_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for master_type_kabel_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."master_type_kabel_id_seq";
CREATE SEQUENCE "public"."master_type_kabel_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for master_vendor_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."master_vendor_id_seq";
CREATE SEQUENCE "public"."master_vendor_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for migrations_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."migrations_id_seq";
CREATE SEQUENCE "public"."migrations_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for person_in_charge_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."person_in_charge_id_seq";
CREATE SEQUENCE "public"."person_in_charge_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for role_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."role_id_seq";
CREATE SEQUENCE "public"."role_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tiket_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tiket_id_seq";
CREATE SEQUENCE "public"."tiket_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id_seq";
CREATE SEQUENCE "public"."users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for laporan_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS "public"."laporan_kegiatan";
CREATE TABLE "public"."laporan_kegiatan" (
  "id" int8 NOT NULL DEFAULT nextval('laporan_kegiatan_id_seq'::regclass),
  "kegiatan" varchar(255) COLLATE "pg_catalog"."default",
  "deskripsi" text COLLATE "pg_catalog"."default",
  "image" varchar(255) COLLATE "pg_catalog"."default",
  "tanggal" timestamp(0),
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Records of laporan_kegiatan
-- ----------------------------
INSERT INTO "public"."laporan_kegiatan" VALUES (1, 'Hijau', 'Person Tanggal', '1687368444.jpg', '2023-06-23 12:22:00', '2023-06-22 00:27:24', '2023-06-22 00:28:58', NULL);

-- ----------------------------
-- Table structure for master_area
-- ----------------------------
DROP TABLE IF EXISTS "public"."master_area";
CREATE TABLE "public"."master_area" (
  "id" int8 NOT NULL DEFAULT nextval('master_area_id_seq'::regclass),
  "nama" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Records of master_area
-- ----------------------------
INSERT INTO "public"."master_area" VALUES (1, 'Ciracas', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for master_category
-- ----------------------------
DROP TABLE IF EXISTS "public"."master_category";
CREATE TABLE "public"."master_category" (
  "id" int8 NOT NULL DEFAULT nextval('master_category_id_seq'::regclass),
  "nama" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Records of master_category
-- ----------------------------
INSERT INTO "public"."master_category" VALUES (1, 'Link Down', NULL, NULL, NULL);
INSERT INTO "public"."master_category" VALUES (2, 'FO CUT', NULL, NULL, NULL);
INSERT INTO "public"."master_category" VALUES (3, 'FO Degrade', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for master_status_tiket
-- ----------------------------
DROP TABLE IF EXISTS "public"."master_status_tiket";
CREATE TABLE "public"."master_status_tiket" (
  "id" int8 NOT NULL DEFAULT nextval('master_status_tiket_id_seq'::regclass),
  "nama" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0),
  "role" int4
)
;

-- ----------------------------
-- Records of master_status_tiket
-- ----------------------------
INSERT INTO "public"."master_status_tiket" VALUES (2, 'CLOSE', NULL, NULL, NULL, 1);
INSERT INTO "public"."master_status_tiket" VALUES (1, 'OPEN', NULL, NULL, NULL, 1);
INSERT INTO "public"."master_status_tiket" VALUES (3, 'CANCEL', NULL, NULL, NULL, 2);
INSERT INTO "public"."master_status_tiket" VALUES (4, 'OUT SLA', NULL, NULL, NULL, 2);
INSERT INTO "public"."master_status_tiket" VALUES (5, 'MEET SLA', NULL, NULL, NULL, 2);

-- ----------------------------
-- Table structure for master_transaksi_customer
-- ----------------------------
DROP TABLE IF EXISTS "public"."master_transaksi_customer";
CREATE TABLE "public"."master_transaksi_customer" (
  "id" int8 NOT NULL DEFAULT nextval('master_transaksi_customer_id_seq'::regclass),
  "nama" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Records of master_transaksi_customer
-- ----------------------------
INSERT INTO "public"."master_transaksi_customer" VALUES (1, 'XL Axiata', NULL, NULL, NULL);
INSERT INTO "public"."master_transaksi_customer" VALUES (2, 'Indosat', NULL, NULL, NULL);
INSERT INTO "public"."master_transaksi_customer" VALUES (3, 'H3I', NULL, NULL, NULL);
INSERT INTO "public"."master_transaksi_customer" VALUES (4, 'Smartfren', NULL, NULL, NULL);
INSERT INTO "public"."master_transaksi_customer" VALUES (5, 'Reguler', NULL, NULL, NULL);
INSERT INTO "public"."master_transaksi_customer" VALUES (6, 'JVBB', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for master_type_kabel
-- ----------------------------
DROP TABLE IF EXISTS "public"."master_type_kabel";
CREATE TABLE "public"."master_type_kabel" (
  "id" int8 NOT NULL DEFAULT nextval('master_type_kabel_id_seq'::regclass),
  "nama" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Records of master_type_kabel
-- ----------------------------
INSERT INTO "public"."master_type_kabel" VALUES (1, '12C', NULL, NULL, NULL);
INSERT INTO "public"."master_type_kabel" VALUES (2, '24C', NULL, NULL, NULL);
INSERT INTO "public"."master_type_kabel" VALUES (3, '48C', NULL, NULL, NULL);
INSERT INTO "public"."master_type_kabel" VALUES (4, '144C', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for master_vendor
-- ----------------------------
DROP TABLE IF EXISTS "public"."master_vendor";
CREATE TABLE "public"."master_vendor" (
  "id" int8 NOT NULL DEFAULT nextval('master_vendor_id_seq'::regclass),
  "nama" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Records of master_vendor
-- ----------------------------
INSERT INTO "public"."master_vendor" VALUES (1, 'Iforte', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS "public"."migrations";
CREATE TABLE "public"."migrations" (
  "id" int4 NOT NULL DEFAULT nextval('migrations_id_seq'::regclass),
  "migration" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "batch" int4 NOT NULL
)
;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO "public"."migrations" VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO "public"."migrations" VALUES (2, '2023_06_06_152825_role_users', 2);
INSERT INTO "public"."migrations" VALUES (3, '2014_10_12_100000_create_password_resets_table', 3);
INSERT INTO "public"."migrations" VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 3);
INSERT INTO "public"."migrations" VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 3);
INSERT INTO "public"."migrations" VALUES (7, '2023_06_08_051126_create_master_transaksi_customer', 3);
INSERT INTO "public"."migrations" VALUES (8, '2023_06_08_051558_create_master_area', 4);
INSERT INTO "public"."migrations" VALUES (9, '2023_06_08_051711_create_master_category', 5);
INSERT INTO "public"."migrations" VALUES (10, '2023_06_08_051759_create_master_status_tiket', 5);
INSERT INTO "public"."migrations" VALUES (11, '2023_06_08_051919_create_master_vendor', 5);
INSERT INTO "public"."migrations" VALUES (12, '2023_06_08_034622_create_table_tiket', 6);
INSERT INTO "public"."migrations" VALUES (14, '2023_06_08_034622_create_table_person_in_charge', 7);
INSERT INTO "public"."migrations" VALUES (15, '2023_06_08_051558_create_master_type_kabel', 8);
INSERT INTO "public"."migrations" VALUES (17, '2023_06_08_051558_create_laporan_kegiatan', 9);

-- ----------------------------
-- Table structure for person_in_charge
-- ----------------------------
DROP TABLE IF EXISTS "public"."person_in_charge";
CREATE TABLE "public"."person_in_charge" (
  "id" int8 NOT NULL DEFAULT nextval('person_in_charge_id_seq'::regclass),
  "no" int4,
  "date" timestamp(0),
  "week" int4,
  "area" varchar(255) COLLATE "pg_catalog"."default",
  "area_pic" varchar(255) COLLATE "pg_catalog"."default",
  "TT_NUMBER" int4,
  "customer" varchar(255) COLLATE "pg_catalog"."default",
  "SEGMENT_ID" varchar(255) COLLATE "pg_catalog"."default",
  "CID" int4,
  "TR_CID" int4,
  "span" varchar(255) COLLATE "pg_catalog"."default",
  "id_fo_cut" int4,
  "NE_IMPACT" varchar(255) COLLATE "pg_catalog"."default",
  "IMPACT_TT" int4,
  "ring" varchar(255) COLLATE "pg_catalog"."default",
  "start_time" int4,
  "stop_clock" int4,
  "end_time" int4,
  "start_date" timestamp(0),
  "end_date" timestamp(0),
  "root_cause" varchar(255) COLLATE "pg_catalog"."default",
  "status" int4,
  "aging_time" int4,
  "remark" varchar(255) COLLATE "pg_catalog"."default",
  "note" text COLLATE "pg_catalog"."default",
  "status_pic" int4,
  "ceklis" int4,
  "id_type_kabel" int4,
  "tikor" int4,
  "time_travel" varchar(255) COLLATE "pg_catalog"."default",
  "time_tracking" int4,
  "join_cut_point" int4,
  "SLA_TROUBLESHOOT" int4,
  "cut_point" int4,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of person_in_charge
-- ----------------------------
INSERT INTO "public"."person_in_charge" VALUES (8, 1, '2023-06-21 12:00:00', 2, 'a', 'b', 3, 'c', 'd', 4, 5, 'e', 2, 'f', 6, 'g', 7, 8, 9, '2023-06-21 12:00:00', '2023-06-21 12:00:00', 'h', 2, 10, 'da', 'adad', 4, 233, 2, 23, 'ada', 2, 2, 22, 2, '2023-06-21 23:06:32', NULL);

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS "public"."role";
CREATE TABLE "public"."role" (
  "id" int8 NOT NULL DEFAULT nextval('role_id_seq'::regclass),
  "role" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO "public"."role" VALUES (1, 'Helpdesk', NULL, NULL, NULL);
INSERT INTO "public"."role" VALUES (2, 'PIC', NULL, NULL, NULL);
INSERT INTO "public"."role" VALUES (3, 'Maintenance Server', NULL, NULL, NULL);
INSERT INTO "public"."role" VALUES (4, 'Manager Area', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tiket
-- ----------------------------
DROP TABLE IF EXISTS "public"."tiket";
CREATE TABLE "public"."tiket" (
  "id" int8 NOT NULL DEFAULT nextval('tiket_id_seq'::regclass),
  "id_master_transaksi_customer" int4,
  "TT_FLP" int4,
  "id_master_area" int4,
  "span_problem" varchar(255) COLLATE "pg_catalog"."default",
  "ring" int4,
  "CID" varchar(255) COLLATE "pg_catalog"."default",
  "span_length" varchar(255) COLLATE "pg_catalog"."default",
  "id_master_category" int4,
  "down_time" timestamp(0),
  "clear_time" timestamp(0),
  "duration" int4,
  "root_cause" varchar(255) COLLATE "pg_catalog"."default",
  "problem_location" varchar(255) COLLATE "pg_catalog"."default",
  "status" int4,
  "id_master_vendor" int4,
  "PIC" int4,
  "note" text COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of tiket
-- ----------------------------
INSERT INTO "public"."tiket" VALUES (3, 3, 998, 1, 'span prob', 333, 'cid', 'span length', 2, '2023-06-11 12:00:00', '2023-06-19 12:00:00', 33, 'root cause', 'problem location', 2, 1, 8, 'asss', '2023-06-16 06:46:06', NULL);
INSERT INTO "public"."tiket" VALUES (1, 1, 21, 1, 'span prob', 123, 'cid', 'span length', 2, '2023-06-11 12:00:00', '2023-06-11 12:00:00', 1, 'root cause', 'problem location', 2, 1, 8, 'note edit', '2023-06-16 06:46:06', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" int8 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "role" int4 NOT NULL,
  "email_verified_at" timestamp(0),
  "remember_token" varchar(100) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (5, 'Brayen PIC', 'brayen_pic@gmail.com', '$2y$10$zm5v1.IUwLW3ugeognE6d.iWEdpQWU8Pjq2PQ.kJejH31CzKxHPTe', 2, NULL, NULL, '2023-06-10 18:59:23', '2023-06-10 18:59:23');
INSERT INTO "public"."users" VALUES (6, 'Brayen Maintenance Server', 'brayen_server@gmail.com', '$2y$10$hiv9kZ9a/N9tmQEU5L.rzezbNSXPiVAS.fN7QLJ4la.7xrQpKYkiu', 3, NULL, NULL, '2023-06-10 19:00:05', '2023-06-10 19:00:05');
INSERT INTO "public"."users" VALUES (7, 'Brayen Manager Area', 'brayen_manager@gmail.com', '$2y$10$k33sTw2rIUHyKSuiJzZAI.fUy7oXMRsVl16IvB7eI9YWPtzIzytlS', 4, NULL, NULL, '2023-06-10 19:00:32', '2023-06-10 19:00:32');
INSERT INTO "public"."users" VALUES (4, 'Brayen Helpdesk', 'brayen@gmail.com', '$2y$10$PU3jEPV7aC184OCc2SAX6.fqMgC9YOLein8E4aY3L3u0t5h4.G1uK', 1, NULL, NULL, '2023-06-06 15:50:41', '2023-06-06 15:50:41');

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."laporan_kegiatan_id_seq"
OWNED BY "public"."laporan_kegiatan"."id";
SELECT setval('"public"."laporan_kegiatan_id_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."master_area_id_seq"
OWNED BY "public"."master_area"."id";
SELECT setval('"public"."master_area_id_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."master_category_id_seq"
OWNED BY "public"."master_category"."id";
SELECT setval('"public"."master_category_id_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."master_status_tiket_id_seq"
OWNED BY "public"."master_status_tiket"."id";
SELECT setval('"public"."master_status_tiket_id_seq"', 5, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."master_transaksi_customer_id_seq"
OWNED BY "public"."master_transaksi_customer"."id";
SELECT setval('"public"."master_transaksi_customer_id_seq"', 6, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."master_type_kabel_id_seq"
OWNED BY "public"."master_type_kabel"."id";
SELECT setval('"public"."master_type_kabel_id_seq"', 4, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."master_vendor_id_seq"
OWNED BY "public"."master_vendor"."id";
SELECT setval('"public"."master_vendor_id_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."migrations_id_seq"
OWNED BY "public"."migrations"."id";
SELECT setval('"public"."migrations_id_seq"', 17, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."person_in_charge_id_seq"
OWNED BY "public"."person_in_charge"."id";
SELECT setval('"public"."person_in_charge_id_seq"', 8, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."role_id_seq"
OWNED BY "public"."role"."id";
SELECT setval('"public"."role_id_seq"', 4, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tiket_id_seq"
OWNED BY "public"."tiket"."id";
SELECT setval('"public"."tiket_id_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_id_seq"
OWNED BY "public"."users"."id";
SELECT setval('"public"."users_id_seq"', 7, true);

-- ----------------------------
-- Primary Key structure for table laporan_kegiatan
-- ----------------------------
ALTER TABLE "public"."laporan_kegiatan" ADD CONSTRAINT "laporan_kegiatan_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table master_area
-- ----------------------------
ALTER TABLE "public"."master_area" ADD CONSTRAINT "master_area_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table master_category
-- ----------------------------
ALTER TABLE "public"."master_category" ADD CONSTRAINT "master_category_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table master_status_tiket
-- ----------------------------
ALTER TABLE "public"."master_status_tiket" ADD CONSTRAINT "master_status_tiket_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table master_transaksi_customer
-- ----------------------------
ALTER TABLE "public"."master_transaksi_customer" ADD CONSTRAINT "master_transaksi_customer_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table master_type_kabel
-- ----------------------------
ALTER TABLE "public"."master_type_kabel" ADD CONSTRAINT "master_type_kabel_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table master_vendor
-- ----------------------------
ALTER TABLE "public"."master_vendor" ADD CONSTRAINT "master_vendor_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table migrations
-- ----------------------------
ALTER TABLE "public"."migrations" ADD CONSTRAINT "migrations_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table person_in_charge
-- ----------------------------
ALTER TABLE "public"."person_in_charge" ADD CONSTRAINT "person_in_charge_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table role
-- ----------------------------
ALTER TABLE "public"."role" ADD CONSTRAINT "role_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table tiket
-- ----------------------------
ALTER TABLE "public"."tiket" ADD CONSTRAINT "tiket_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_email_unique" UNIQUE ("email");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");
