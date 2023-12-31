PGDMP     :    0    	            {            db_skripsit    13.10    13.10 [    *           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            +           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            ,           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            -           1262    67351    db_skripsit    DATABASE     o   CREATE DATABASE db_skripsit WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_United States.1252';
    DROP DATABASE db_skripsit;
                postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
                postgres    false            .           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                   postgres    false    3            �            1259    67568    laporan_kegiatan    TABLE     U  CREATE TABLE public.laporan_kegiatan (
    id bigint NOT NULL,
    kegiatan character varying(255),
    deskripsi text,
    image character varying(255),
    tanggal timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);
 $   DROP TABLE public.laporan_kegiatan;
       public         heap    postgres    false    3            �            1259    67566    laporan_kegiatan_id_seq    SEQUENCE     �   CREATE SEQUENCE public.laporan_kegiatan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.laporan_kegiatan_id_seq;
       public          postgres    false    223    3            /           0    0    laporan_kegiatan_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.laporan_kegiatan_id_seq OWNED BY public.laporan_kegiatan.id;
          public          postgres    false    222            �            1259    67479    master_area    TABLE     �   CREATE TABLE public.master_area (
    id bigint NOT NULL,
    nama character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);
    DROP TABLE public.master_area;
       public         heap    postgres    false    3            �            1259    67477    master_area_id_seq    SEQUENCE     {   CREATE SEQUENCE public.master_area_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.master_area_id_seq;
       public          postgres    false    209    3            0           0    0    master_area_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.master_area_id_seq OWNED BY public.master_area.id;
          public          postgres    false    208            �            1259    67487    master_category    TABLE     �   CREATE TABLE public.master_category (
    id bigint NOT NULL,
    nama character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);
 #   DROP TABLE public.master_category;
       public         heap    postgres    false    3            �            1259    67485    master_category_id_seq    SEQUENCE        CREATE SEQUENCE public.master_category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.master_category_id_seq;
       public          postgres    false    211    3            1           0    0    master_category_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.master_category_id_seq OWNED BY public.master_category.id;
          public          postgres    false    210            �            1259    67495    master_status_tiket    TABLE       CREATE TABLE public.master_status_tiket (
    id bigint NOT NULL,
    nama character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone,
    role integer
);
 '   DROP TABLE public.master_status_tiket;
       public         heap    postgres    false    3            �            1259    67493    master_status_tiket_id_seq    SEQUENCE     �   CREATE SEQUENCE public.master_status_tiket_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.master_status_tiket_id_seq;
       public          postgres    false    3    213            2           0    0    master_status_tiket_id_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.master_status_tiket_id_seq OWNED BY public.master_status_tiket.id;
          public          postgres    false    212            �            1259    67470    master_transaksi_customer    TABLE     �   CREATE TABLE public.master_transaksi_customer (
    id bigint NOT NULL,
    nama character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);
 -   DROP TABLE public.master_transaksi_customer;
       public         heap    postgres    false    3            �            1259    67468     master_transaksi_customer_id_seq    SEQUENCE     �   CREATE SEQUENCE public.master_transaksi_customer_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 7   DROP SEQUENCE public.master_transaksi_customer_id_seq;
       public          postgres    false    3    207            3           0    0     master_transaksi_customer_id_seq    SEQUENCE OWNED BY     e   ALTER SEQUENCE public.master_transaksi_customer_id_seq OWNED BY public.master_transaksi_customer.id;
          public          postgres    false    206            �            1259    67548    master_type_kabel    TABLE     �   CREATE TABLE public.master_type_kabel (
    id bigint NOT NULL,
    nama character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);
 %   DROP TABLE public.master_type_kabel;
       public         heap    postgres    false    3            �            1259    67546    master_type_kabel_id_seq    SEQUENCE     �   CREATE SEQUENCE public.master_type_kabel_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.master_type_kabel_id_seq;
       public          postgres    false    221    3            4           0    0    master_type_kabel_id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.master_type_kabel_id_seq OWNED BY public.master_type_kabel.id;
          public          postgres    false    220            �            1259    67503    master_vendor    TABLE     �   CREATE TABLE public.master_vendor (
    id bigint NOT NULL,
    nama character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);
 !   DROP TABLE public.master_vendor;
       public         heap    postgres    false    3            �            1259    67501    master_vendor_id_seq    SEQUENCE     }   CREATE SEQUENCE public.master_vendor_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.master_vendor_id_seq;
       public          postgres    false    215    3            5           0    0    master_vendor_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.master_vendor_id_seq OWNED BY public.master_vendor.id;
          public          postgres    false    214            �            1259    67396 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false    3            �            1259    67394    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    201    3            6           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    200            �            1259    67537    person_in_charge    TABLE     q  CREATE TABLE public.person_in_charge (
    id bigint NOT NULL,
    no integer,
    date timestamp(0) without time zone,
    week integer,
    area character varying(255),
    area_pic character varying(255),
    "TT_NUMBER" integer,
    customer character varying(255),
    "SEGMENT_ID" character varying(255),
    "CID" integer,
    "TR_CID" integer,
    span character varying(255),
    id_fo_cut integer,
    "NE_IMPACT" character varying(255),
    "IMPACT_TT" integer,
    ring character varying(255),
    start_time integer,
    stop_clock integer,
    end_time integer,
    start_date timestamp(0) without time zone,
    end_date timestamp(0) without time zone,
    root_cause character varying(255),
    status integer,
    aging_time integer,
    remark character varying(255),
    note text,
    status_pic integer,
    ceklis integer,
    id_type_kabel integer,
    tikor integer,
    time_travel character varying(255),
    time_tracking integer,
    join_cut_point integer,
    "SLA_TROUBLESHOOT" integer,
    cut_point integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 $   DROP TABLE public.person_in_charge;
       public         heap    postgres    false    3            �            1259    67535    person_in_charge_id_seq    SEQUENCE     �   CREATE SEQUENCE public.person_in_charge_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.person_in_charge_id_seq;
       public          postgres    false    219    3            7           0    0    person_in_charge_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.person_in_charge_id_seq OWNED BY public.person_in_charge.id;
          public          postgres    false    218            �            1259    67417    role    TABLE     �   CREATE TABLE public.role (
    id bigint NOT NULL,
    role character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);
    DROP TABLE public.role;
       public         heap    postgres    false    3            �            1259    67415    role_id_seq    SEQUENCE     t   CREATE SEQUENCE public.role_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.role_id_seq;
       public          postgres    false    3    205            8           0    0    role_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.role_id_seq OWNED BY public.role.id;
          public          postgres    false    204            �            1259    67511    tiket    TABLE     �  CREATE TABLE public.tiket (
    id bigint NOT NULL,
    id_master_transaksi_customer integer,
    "TT_FLP" integer,
    id_master_area integer,
    span_problem character varying(255),
    ring integer,
    "CID" character varying(255),
    span_length character varying(255),
    id_master_category integer,
    down_time timestamp(0) without time zone,
    clear_time timestamp(0) without time zone,
    duration integer,
    root_cause character varying(255),
    problem_location character varying(255),
    status integer,
    id_master_vendor integer,
    "PIC" integer,
    note text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.tiket;
       public         heap    postgres    false    3            �            1259    67509    tiket_id_seq    SEQUENCE     u   CREATE SEQUENCE public.tiket_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.tiket_id_seq;
       public          postgres    false    217    3            9           0    0    tiket_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.tiket_id_seq OWNED BY public.tiket.id;
          public          postgres    false    216            �            1259    67404    users    TABLE     �  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    role integer NOT NULL,
    email_verified_at timestamp(0) without time zone,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         heap    postgres    false    3            �            1259    67402    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    3    203            :           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    202            s           2604    67571    laporan_kegiatan id    DEFAULT     z   ALTER TABLE ONLY public.laporan_kegiatan ALTER COLUMN id SET DEFAULT nextval('public.laporan_kegiatan_id_seq'::regclass);
 B   ALTER TABLE public.laporan_kegiatan ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    222    223    223            l           2604    67482    master_area id    DEFAULT     p   ALTER TABLE ONLY public.master_area ALTER COLUMN id SET DEFAULT nextval('public.master_area_id_seq'::regclass);
 =   ALTER TABLE public.master_area ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    208    209    209            m           2604    67490    master_category id    DEFAULT     x   ALTER TABLE ONLY public.master_category ALTER COLUMN id SET DEFAULT nextval('public.master_category_id_seq'::regclass);
 A   ALTER TABLE public.master_category ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    211    210    211            n           2604    67498    master_status_tiket id    DEFAULT     �   ALTER TABLE ONLY public.master_status_tiket ALTER COLUMN id SET DEFAULT nextval('public.master_status_tiket_id_seq'::regclass);
 E   ALTER TABLE public.master_status_tiket ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    213    212    213            k           2604    67473    master_transaksi_customer id    DEFAULT     �   ALTER TABLE ONLY public.master_transaksi_customer ALTER COLUMN id SET DEFAULT nextval('public.master_transaksi_customer_id_seq'::regclass);
 K   ALTER TABLE public.master_transaksi_customer ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    207    206    207            r           2604    67551    master_type_kabel id    DEFAULT     |   ALTER TABLE ONLY public.master_type_kabel ALTER COLUMN id SET DEFAULT nextval('public.master_type_kabel_id_seq'::regclass);
 C   ALTER TABLE public.master_type_kabel ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    220    221            o           2604    67506    master_vendor id    DEFAULT     t   ALTER TABLE ONLY public.master_vendor ALTER COLUMN id SET DEFAULT nextval('public.master_vendor_id_seq'::regclass);
 ?   ALTER TABLE public.master_vendor ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    214    215    215            h           2604    67399    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    201    200    201            q           2604    67540    person_in_charge id    DEFAULT     z   ALTER TABLE ONLY public.person_in_charge ALTER COLUMN id SET DEFAULT nextval('public.person_in_charge_id_seq'::regclass);
 B   ALTER TABLE public.person_in_charge ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    219    218    219            j           2604    67420    role id    DEFAULT     b   ALTER TABLE ONLY public.role ALTER COLUMN id SET DEFAULT nextval('public.role_id_seq'::regclass);
 6   ALTER TABLE public.role ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    204    205    205            p           2604    67514    tiket id    DEFAULT     d   ALTER TABLE ONLY public.tiket ALTER COLUMN id SET DEFAULT nextval('public.tiket_id_seq'::regclass);
 7   ALTER TABLE public.tiket ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    217    217            i           2604    67407    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    202    203    203            '          0    67568    laporan_kegiatan 
   TABLE DATA           w   COPY public.laporan_kegiatan (id, kegiatan, deskripsi, image, tanggal, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    223   �p                 0    67479    master_area 
   TABLE DATA           S   COPY public.master_area (id, nama, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    209   q                 0    67487    master_category 
   TABLE DATA           W   COPY public.master_category (id, nama, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    211   1q                 0    67495    master_status_tiket 
   TABLE DATA           a   COPY public.master_status_tiket (id, nama, created_at, updated_at, deleted_at, role) FROM stdin;
    public          postgres    false    213   tq                 0    67470    master_transaksi_customer 
   TABLE DATA           a   COPY public.master_transaksi_customer (id, nama, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    207   �q       %          0    67548    master_type_kabel 
   TABLE DATA           Y   COPY public.master_type_kabel (id, nama, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    221   "r                 0    67503    master_vendor 
   TABLE DATA           U   COPY public.master_vendor (id, nama, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    215   [r                 0    67396 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    201   �r       #          0    67537    person_in_charge 
   TABLE DATA           �  COPY public.person_in_charge (id, no, date, week, area, area_pic, "TT_NUMBER", customer, "SEGMENT_ID", "CID", "TR_CID", span, id_fo_cut, "NE_IMPACT", "IMPACT_TT", ring, start_time, stop_clock, end_time, start_date, end_date, root_cause, status, aging_time, remark, note, status_pic, ceklis, id_type_kabel, tikor, time_travel, time_tracking, join_cut_point, "SLA_TROUBLESHOOT", cut_point, created_at, updated_at) FROM stdin;
    public          postgres    false    219   �s                 0    67417    role 
   TABLE DATA           L   COPY public.role (id, role, created_at, updated_at, deleted_at) FROM stdin;
    public          postgres    false    205    t       !          0    67511    tiket 
   TABLE DATA             COPY public.tiket (id, id_master_transaksi_customer, "TT_FLP", id_master_area, span_problem, ring, "CID", span_length, id_master_category, down_time, clear_time, duration, root_cause, problem_location, status, id_master_vendor, "PIC", note, created_at, updated_at) FROM stdin;
    public          postgres    false    217   xt                 0    67404    users 
   TABLE DATA           {   COPY public.users (id, name, email, password, role, email_verified_at, remember_token, created_at, updated_at) FROM stdin;
    public          postgres    false    203   u       ;           0    0    laporan_kegiatan_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.laporan_kegiatan_id_seq', 1, true);
          public          postgres    false    222            <           0    0    master_area_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.master_area_id_seq', 1, true);
          public          postgres    false    208            =           0    0    master_category_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.master_category_id_seq', 3, true);
          public          postgres    false    210            >           0    0    master_status_tiket_id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.master_status_tiket_id_seq', 5, true);
          public          postgres    false    212            ?           0    0     master_transaksi_customer_id_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.master_transaksi_customer_id_seq', 6, true);
          public          postgres    false    206            @           0    0    master_type_kabel_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.master_type_kabel_id_seq', 4, true);
          public          postgres    false    220            A           0    0    master_vendor_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.master_vendor_id_seq', 1, true);
          public          postgres    false    214            B           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 17, true);
          public          postgres    false    200            C           0    0    person_in_charge_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.person_in_charge_id_seq', 8, true);
          public          postgres    false    218            D           0    0    role_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('public.role_id_seq', 4, true);
          public          postgres    false    204            E           0    0    tiket_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.tiket_id_seq', 3, true);
          public          postgres    false    216            F           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 7, true);
          public          postgres    false    202            �           2606    67576 &   laporan_kegiatan laporan_kegiatan_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.laporan_kegiatan
    ADD CONSTRAINT laporan_kegiatan_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.laporan_kegiatan DROP CONSTRAINT laporan_kegiatan_pkey;
       public            postgres    false    223                       2606    67484    master_area master_area_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.master_area
    ADD CONSTRAINT master_area_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.master_area DROP CONSTRAINT master_area_pkey;
       public            postgres    false    209            �           2606    67492 $   master_category master_category_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.master_category
    ADD CONSTRAINT master_category_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.master_category DROP CONSTRAINT master_category_pkey;
       public            postgres    false    211            �           2606    67500 ,   master_status_tiket master_status_tiket_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.master_status_tiket
    ADD CONSTRAINT master_status_tiket_pkey PRIMARY KEY (id);
 V   ALTER TABLE ONLY public.master_status_tiket DROP CONSTRAINT master_status_tiket_pkey;
       public            postgres    false    213            }           2606    67475 8   master_transaksi_customer master_transaksi_customer_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY public.master_transaksi_customer
    ADD CONSTRAINT master_transaksi_customer_pkey PRIMARY KEY (id);
 b   ALTER TABLE ONLY public.master_transaksi_customer DROP CONSTRAINT master_transaksi_customer_pkey;
       public            postgres    false    207            �           2606    67553 (   master_type_kabel master_type_kabel_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.master_type_kabel
    ADD CONSTRAINT master_type_kabel_pkey PRIMARY KEY (id);
 R   ALTER TABLE ONLY public.master_type_kabel DROP CONSTRAINT master_type_kabel_pkey;
       public            postgres    false    221            �           2606    67508     master_vendor master_vendor_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.master_vendor
    ADD CONSTRAINT master_vendor_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.master_vendor DROP CONSTRAINT master_vendor_pkey;
       public            postgres    false    215            u           2606    67401    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    201            �           2606    67545 &   person_in_charge person_in_charge_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.person_in_charge
    ADD CONSTRAINT person_in_charge_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.person_in_charge DROP CONSTRAINT person_in_charge_pkey;
       public            postgres    false    219            {           2606    67422    role role_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.role
    ADD CONSTRAINT role_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.role DROP CONSTRAINT role_pkey;
       public            postgres    false    205            �           2606    67519    tiket tiket_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.tiket
    ADD CONSTRAINT tiket_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.tiket DROP CONSTRAINT tiket_pkey;
       public            postgres    false    217            w           2606    67414    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            postgres    false    203            y           2606    67412    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    203            '   \   x�3����J,�H-*��SI�KOO��44�076�011��*H�4202�50�52V04�22�20@�)X�[���YX�Zp��q��qqq ���            x�3�t�,JLN,�� �=... Q��         3   x�3�����Vp�/��� .#N7����1H�%5�(1%!���� 3�         @   x�3�t��v��"C.CN� W?dcNgG?gW���	�h�B��#��)���+�h� �         N   x�3��Qp��L,I�� .#Nϼ������1���'�k���XT�V���4�JM/�I-B�qz�99!�1z\\\ �D      %   )   x�3�44r�� .#N#$�1��ׄ��Y:F��� ���            x�3��L�/*I�� �=... J�o           x����n� F��aşwi2u���b �ٷ/�k]�YB$�|L>ZA��4����1�ų��Y����b�`t�:;>1�e���������CǞÞ��|UjT��I��~�ls�f���|����8��hDj[�Q�O�Y�W��.v�J>���h�4���{e�*ь���K�N� �x�XwF�JiS'��8~?pXH�R��Sg������;���ZH�ߑ[��O�~���(%������8Pã�$�տ�#�6֎_z
4�Z~~H)� \��Q      #   f   x�m���0��*� �y/�"����	�_v>� �V�#��Dd��Ҡ���f���C����ȗ�����޹ag�Q���J������ʳ��b]��!\2"         H   x�3��H�)HI-��� .#� Ogט�713�$5/1/9U!8��,�!k��KLO-Rp,JMD���qqq �}      !   �   x���A!��+���Ɛ�G��� K�a����x@&�����)cf ���r���|\_$�|iWP�P�z"��,b�`f�>�Kiһ{�<L�&S�Œ����:�Z��GmQ�r��>�H�m����\Z�a���rB< ��J�         c  x�u�Ko�@��5�
n�΅���RQT(�-&ͨ#�\T~}S[Ӥ��,��E�d�d��ڦ��Ϗ#_��	�1X�����*Q.��ՙ�"d�0���Sks��A�ݟ�끨��]�̪�c&`a9�:1iB����Z����5Q}p��9Ki�f�ϲ����{��E�:}�y�Y�‬b�j��\>i�`;�<�'�h��;��/R���5Q��4d���}В��l�9��8��n��ޫml�R;���I�T��ј�ϧn^�U�Ǿ �g#������e�q��я���do����%��5��3lO����#��e�tNR�\���}��@UB��@CFuM\Q?Y��     