--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: cargos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cargos (
    cargo_id integer NOT NULL,
    cargo character varying(50)
);


ALTER TABLE public.cargos OWNER TO postgres;

--
-- Name: cargos_cargo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cargos_cargo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cargos_cargo_id_seq OWNER TO postgres;

--
-- Name: cargos_cargo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cargos_cargo_id_seq OWNED BY cargos.cargo_id;


--
-- Name: centros_hospitalarios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE centros_hospitalarios (
    centro_id integer NOT NULL,
    nombre character varying(80) NOT NULL,
    tipo_centro_id integer NOT NULL,
    direccion text,
    estado_id integer NOT NULL,
    municipio_id integer NOT NULL,
    parroquia_id integer NOT NULL,
    region_id integer NOT NULL,
    ctx_id integer NOT NULL
);


ALTER TABLE public.centros_hospitalarios OWNER TO postgres;

--
-- Name: condicion_paciente; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE condicion_paciente (
    condicion_id integer NOT NULL,
    condicion character varying(50) NOT NULL
);


ALTER TABLE public.condicion_paciente OWNER TO postgres;

--
-- Name: condicion_paciente_condicion_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE condicion_paciente_condicion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.condicion_paciente_condicion_id_seq OWNER TO postgres;

--
-- Name: condicion_paciente_condicion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE condicion_paciente_condicion_id_seq OWNED BY condicion_paciente.condicion_id;


--
-- Name: donantes; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE donantes (
    donante_id integer NOT NULL,
    cedula character varying(20),
    apellido1 character varying(20),
    apellido2 character varying(20),
    nombre1 character varying(20),
    nombre2 character varying(20),
    fecha_nacimiento date,
    causa_muerte character varying(20),
    fecha_muerte date,
    tipo_donante_id integer,
    centro_id integer
);


ALTER TABLE public.donantes OWNER TO postgres;

--
-- Name: donantes_donante_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE donantes_donante_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.donantes_donante_id_seq OWNER TO postgres;

--
-- Name: donantes_donante_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE donantes_donante_id_seq OWNED BY donantes.donante_id;


--
-- Name: estados; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE estados (
    estado_id integer NOT NULL,
    estado character varying(30)
);


ALTER TABLE public.estados OWNER TO postgres;

--
-- Name: estatus_pac; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE estatus_pac (
    estatus_id integer NOT NULL,
    estatus character varying(20)
);


ALTER TABLE public.estatus_pac OWNER TO postgres;

--
-- Name: estatus_pac_estatus_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE estatus_pac_estatus_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estatus_pac_estatus_id_seq OWNER TO postgres;

--
-- Name: estatus_pac_estatus_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE estatus_pac_estatus_id_seq OWNED BY estatus_pac.estatus_id;


--
-- Name: estatus_per; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE estatus_per (
    estatus_id integer NOT NULL,
    estatus character varying(20)
);


ALTER TABLE public.estatus_per OWNER TO postgres;

--
-- Name: estatus_per_estatus_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE estatus_per_estatus_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estatus_per_estatus_id_seq OWNER TO postgres;

--
-- Name: estatus_per_estatus_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE estatus_per_estatus_id_seq OWNED BY estatus_per.estatus_id;


--
-- Name: estatus_usr; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE estatus_usr (
    estatus_id integer NOT NULL,
    estatus character varying(20) NOT NULL
);


ALTER TABLE public.estatus_usr OWNER TO postgres;

--
-- Name: examenes; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE examenes (
    examen_id integer NOT NULL,
    paciente_id integer NOT NULL,
    fecha_examen date NOT NULL,
    aghbs integer,
    anticore integer,
    hvc integer,
    acaghbs integer
);


ALTER TABLE public.examenes OWNER TO postgres;

--
-- Name: examenes_examen_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE examenes_examen_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.examenes_examen_id_seq OWNER TO postgres;

--
-- Name: examenes_examen_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE examenes_examen_id_seq OWNED BY examenes.examen_id;


--
-- Name: generos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE generos (
    id character(1) NOT NULL,
    genero character varying(12)
);


ALTER TABLE public.generos OWNER TO postgres;

--
-- Name: hla_a; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE hla_a (
    locus_a_id integer NOT NULL,
    locus_a_alelo_1 character varying(20),
    locus_a_alelo_2 character varying(20)
);


ALTER TABLE public.hla_a OWNER TO postgres;

--
-- Name: hla_a_locus_a_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE hla_a_locus_a_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hla_a_locus_a_id_seq OWNER TO postgres;

--
-- Name: hla_a_locus_a_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE hla_a_locus_a_id_seq OWNED BY hla_a.locus_a_id;


--
-- Name: hla_b; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE hla_b (
    locus_b_id integer NOT NULL,
    locus_b_alelo_1_ character varying(20),
    locus_b_alelo_2 character varying(20),
    locus_b_alelo_1 character varying(20)
);


ALTER TABLE public.hla_b OWNER TO postgres;

--
-- Name: hla_b_locus_b_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE hla_b_locus_b_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hla_b_locus_b_id_seq OWNER TO postgres;

--
-- Name: hla_b_locus_b_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE hla_b_locus_b_id_seq OWNED BY hla_b.locus_b_id;


--
-- Name: hla_dr; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE hla_dr (
    locus_dr_id integer NOT NULL,
    locus_dr_alelo_1 character varying(20),
    locus_dr_alelo_2 character varying(20)
);


ALTER TABLE public.hla_dr OWNER TO postgres;

--
-- Name: hla_dr_locus_dr_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE hla_dr_locus_dr_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hla_dr_locus_dr_id_seq OWNER TO postgres;

--
-- Name: hla_dr_locus_dr_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE hla_dr_locus_dr_id_seq OWNED BY hla_dr.locus_dr_id;


--
-- Name: hla_paciente; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE hla_paciente (
    paciente_id integer NOT NULL,
    fecha_prueba date,
    identificacion_prueba character varying(30),
    locus_a_alelo_1 character varying(20),
    locus_a_alelo_2 character varying(20),
    locus_b_alelo_1_ character varying(20),
    locus_b_alelo_2 character varying(20),
    locus_dr_alelo_1 character varying(20),
    locus_dr_alelo_2 character varying(20)
);


ALTER TABLE public.hla_paciente OWNER TO postgres;

--
-- Name: migration; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE migration (
    version character varying(180) NOT NULL,
    apply_time integer
);


ALTER TABLE public.migration OWNER TO postgres;

--
-- Name: municipios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE municipios (
    municipio_id integer NOT NULL,
    estado_id integer,
    municipio character varying(30)
);


ALTER TABLE public.municipios OWNER TO postgres;

--
-- Name: nacionalidad; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE nacionalidad (
    id character(1) NOT NULL,
    nacionalidad character varying(12)
);


ALTER TABLE public.nacionalidad OWNER TO postgres;

--
-- Name: pacientes; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE pacientes (
    paciente_id integer NOT NULL,
    tipo_trasplante_id integer,
    cedula character varying(20) NOT NULL,
    nacionalidad character varying(1),
    apellido1 character varying(30) NOT NULL,
    apellido2 character varying(30),
    nombre1 character varying(30) NOT NULL,
    nombre2 character varying(30),
    fecha_nac date NOT NULL,
    peso numeric(5,3) NOT NULL,
    talla numeric(5,3) NOT NULL,
    sangre_id character varying(20),
    centro_id integer NOT NULL,
    fecha_ini_prog date,
    fecha_ini_dial date,
    dialisis_id integer,
    parametros_dialisis text,
    direccion text NOT NULL,
    telefono character varying(20) NOT NULL,
    celular character varying(20) NOT NULL,
    correo_electronico character varying(50) NOT NULL,
    region_id integer NOT NULL,
    estado_id integer NOT NULL,
    municipio_id integer NOT NULL,
    parroquia_id integer NOT NULL,
    persona_contacto character varying(50),
    telefono_contacto character varying(20),
    porcentaje_par numeric,
    fecha__act_par date,
    enfermedad_actual text,
    antecedentes_pers text,
    accesos_vasculares text,
    genero character varying(1) NOT NULL,
    condicion_id integer,
    estatus_id integer
);


ALTER TABLE public.pacientes OWNER TO postgres;

--
-- Name: pacientes_alfa; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW pacientes_alfa AS
 SELECT pacientes.paciente_id,
    (((((((pacientes.apellido1)::text || ' '::text) || (pacientes.nombre1)::text) || ', '::text) || (pacientes.nombre1)::text) || ' '::text) || (pacientes.nombre2)::text) AS nombre
   FROM pacientes
  ORDER BY pacientes.paciente_id;


ALTER TABLE public.pacientes_alfa OWNER TO postgres;

--
-- Name: pacientes_paciente_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pacientes_paciente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pacientes_paciente_id_seq OWNER TO postgres;

--
-- Name: pacientes_paciente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE pacientes_paciente_id_seq OWNED BY pacientes.paciente_id;


--
-- Name: parroquias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE parroquias (
    parroquia_id integer NOT NULL,
    municipio_id integer,
    parroquia character varying(50)
);


ALTER TABLE public.parroquias OWNER TO postgres;

--
-- Name: personal; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE personal (
    personal_id integer NOT NULL,
    cedula integer,
    apellido1 character varying(30),
    apellido2 character varying(30),
    nombre1 character varying(30),
    nombre2 character varying(20),
    centro_id integer,
    cargo_id integer,
    fecha_ingreso date,
    estatus_id integer
);


ALTER TABLE public.personal OWNER TO postgres;

--
-- Name: personal_centro_hospitalario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE personal_centro_hospitalario (
    personal_id integer NOT NULL,
    centro_id integer NOT NULL
);


ALTER TABLE public.personal_centro_hospitalario OWNER TO postgres;

--
-- Name: posinega; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE posinega (
    id integer NOT NULL,
    valor character varying(15)
);


ALTER TABLE public.posinega OWNER TO postgres;

--
-- Name: posinega_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE posinega_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.posinega_id_seq OWNER TO postgres;

--
-- Name: posinega_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE posinega_id_seq OWNED BY posinega.id;


--
-- Name: region_estado; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE region_estado (
    region_id integer NOT NULL,
    estado_id integer NOT NULL
);


ALTER TABLE public.region_estado OWNER TO postgres;

--
-- Name: regiones; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE regiones (
    region_id integer NOT NULL,
    region character varying(50)
);


ALTER TABLE public.regiones OWNER TO postgres;

--
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE roles (
    rol_id integer NOT NULL,
    rol character varying(50) NOT NULL
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- Name: roles_rol_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE roles_rol_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_rol_id_seq OWNER TO postgres;

--
-- Name: roles_rol_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE roles_rol_id_seq OWNED BY roles.rol_id;


--
-- Name: sangre; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE sangre (
    sangre_id character varying(20) NOT NULL,
    grupo_sanguineo character varying(20) NOT NULL
);


ALTER TABLE public.sangre OWNER TO postgres;

--
-- Name: suero_donante; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE suero_donante (
    donante_id integer NOT NULL,
    tipo_donante_id integer,
    locus_a_alelo_1 character varying(20),
    locus_a_alelo_2 character varying(20),
    locus_b_alelo_1 character varying(20),
    locus_b_alelo_2 character varying(20),
    locus_dr_alelo_1 character varying(20),
    locus_dr_alelo_2 character varying(20)
);


ALTER TABLE public.suero_donante OWNER TO postgres;

--
-- Name: suero_paciente; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE suero_paciente (
    suero_pac_id integer NOT NULL,
    paciente_id integer NOT NULL,
    fecha_entrega date,
    identificacion_muestra character varying(30),
    identificacion_prueba character varying(30)
);


ALTER TABLE public.suero_paciente OWNER TO postgres;

--
-- Name: suero_paciente_suero_pac_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE suero_paciente_suero_pac_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.suero_paciente_suero_pac_id_seq OWNER TO postgres;

--
-- Name: suero_paciente_suero_pac_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE suero_paciente_suero_pac_id_seq OWNED BY suero_paciente.suero_pac_id;


--
-- Name: tipos_centros; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipos_centros (
    tipo_centro_id integer NOT NULL,
    tipo_centro character varying(30)
);


ALTER TABLE public.tipos_centros OWNER TO postgres;

--
-- Name: tipos_dialisis; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipos_dialisis (
    dialisis_id integer NOT NULL,
    tipo_dialisis character varying(60)
);


ALTER TABLE public.tipos_dialisis OWNER TO postgres;

--
-- Name: tipos_trasplantes; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipos_trasplantes (
    tipo_trasplante_id integer NOT NULL,
    tipo_trasplante character varying(60) NOT NULL
);


ALTER TABLE public.tipos_trasplantes OWNER TO postgres;

--
-- Name: tipos_trasplantes_tipo_trasplante_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipos_trasplantes_tipo_trasplante_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipos_trasplantes_tipo_trasplante_id_seq OWNER TO postgres;

--
-- Name: tipos_trasplantes_tipo_trasplante_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipos_trasplantes_tipo_trasplante_id_seq OWNED BY tipos_trasplantes.tipo_trasplante_id;


--
-- Name: user; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "user" (
    id integer NOT NULL,
    username character varying(255) NOT NULL,
    auth_key character varying(32) NOT NULL,
    password_hash character varying(255) NOT NULL,
    password_reset_token character varying(255),
    email character varying(255) NOT NULL,
    role smallint DEFAULT 10 NOT NULL,
    status smallint DEFAULT 10 NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL
);


ALTER TABLE public."user" OWNER TO postgres;

--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_id_seq OWNER TO postgres;

--
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE user_id_seq OWNED BY "user".id;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuarios (
    usuario_id integer NOT NULL,
    usuario character varying(30) NOT NULL,
    clave character varying(30) NOT NULL,
    nombre character varying(60) NOT NULL,
    centro_id integer NOT NULL,
    rol_id integer NOT NULL,
    estatus_id integer NOT NULL,
    tipo_trasplante_id integer NOT NULL
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- Name: usuarios_usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usuarios_usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_usuario_id_seq OWNER TO postgres;

--
-- Name: usuarios_usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE usuarios_usuario_id_seq OWNED BY usuarios.usuario_id;


--
-- Name: cargo_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cargos ALTER COLUMN cargo_id SET DEFAULT nextval('cargos_cargo_id_seq'::regclass);


--
-- Name: condicion_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY condicion_paciente ALTER COLUMN condicion_id SET DEFAULT nextval('condicion_paciente_condicion_id_seq'::regclass);


--
-- Name: donante_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY donantes ALTER COLUMN donante_id SET DEFAULT nextval('donantes_donante_id_seq'::regclass);


--
-- Name: estatus_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estatus_pac ALTER COLUMN estatus_id SET DEFAULT nextval('estatus_pac_estatus_id_seq'::regclass);


--
-- Name: estatus_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estatus_per ALTER COLUMN estatus_id SET DEFAULT nextval('estatus_per_estatus_id_seq'::regclass);


--
-- Name: examen_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY examenes ALTER COLUMN examen_id SET DEFAULT nextval('examenes_examen_id_seq'::regclass);


--
-- Name: locus_a_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hla_a ALTER COLUMN locus_a_id SET DEFAULT nextval('hla_a_locus_a_id_seq'::regclass);


--
-- Name: locus_b_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hla_b ALTER COLUMN locus_b_id SET DEFAULT nextval('hla_b_locus_b_id_seq'::regclass);


--
-- Name: locus_dr_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hla_dr ALTER COLUMN locus_dr_id SET DEFAULT nextval('hla_dr_locus_dr_id_seq'::regclass);


--
-- Name: paciente_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pacientes ALTER COLUMN paciente_id SET DEFAULT nextval('pacientes_paciente_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY posinega ALTER COLUMN id SET DEFAULT nextval('posinega_id_seq'::regclass);


--
-- Name: rol_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY roles ALTER COLUMN rol_id SET DEFAULT nextval('roles_rol_id_seq'::regclass);


--
-- Name: suero_pac_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY suero_paciente ALTER COLUMN suero_pac_id SET DEFAULT nextval('suero_paciente_suero_pac_id_seq'::regclass);


--
-- Name: tipo_trasplante_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipos_trasplantes ALTER COLUMN tipo_trasplante_id SET DEFAULT nextval('tipos_trasplantes_tipo_trasplante_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "user" ALTER COLUMN id SET DEFAULT nextval('user_id_seq'::regclass);


--
-- Name: usuario_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuarios ALTER COLUMN usuario_id SET DEFAULT nextval('usuarios_usuario_id_seq'::regclass);


--
-- Data for Name: cargos; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: cargos_cargo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cargos_cargo_id_seq', 1, false);


--
-- Data for Name: centros_hospitalarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO centros_hospitalarios VALUES (2, 'Hospital Miguel Perez Carreño', 1, 'El Pescozon', 1, 1, 1, 1, 1);
INSERT INTO centros_hospitalarios VALUES (3, 'Hospital de Niños J.M de los Ríos', 1, 'San Bernardino', 1, 1, 1, 1, 1);
INSERT INTO centros_hospitalarios VALUES (4, 'Hospital Militar Dr. Carlos Arvelo', 1, 'San Juan', 1, 1, 1, 1, 1);
INSERT INTO centros_hospitalarios VALUES (6, 'Clinica Santa Sofia', 1, 'Santa Sofia', 1, 1, 1, 1, 1);
INSERT INTO centros_hospitalarios VALUES (9, 'Hospital Universitario de Mérida', 1, 'Merida', 14, 155, 492, 2, 1);
INSERT INTO centros_hospitalarios VALUES (10, 'Hospital Universitario de Maracaibo', 1, 'Maracaibo', 23, 327, 930, 3, 1);
INSERT INTO centros_hospitalarios VALUES (11, 'Hospital Central de Acarigua-Araure J.M. Casal Ramos', 1, 'Acarigua', 18, 224, 655, 2, 1);
INSERT INTO centros_hospitalarios VALUES (12, 'Hospital Ciudad Hospitalaria Dr. Enrique Tejera de Valencia (pediatría)', 1, 'Valencia', 8, 92, 273, 2, 1);
INSERT INTO centros_hospitalarios VALUES (15, 'Instituto de Inmunologia', 1, 'UCV', 1, 1, 1, 1, 2);
INSERT INTO centros_hospitalarios VALUES (1, 'Hospital Universitario de Caracas', 1, 'UCV', 1, 1, 1, 1, 1);
INSERT INTO centros_hospitalarios VALUES (5, 'Policlinica Metropolitana', 2, 'Caurimare', 1, 1, 1, 1, 1);
INSERT INTO centros_hospitalarios VALUES (7, 'Clinica El Avila', 2, 'Altamira', 1, 1, 1, 1, 1);
INSERT INTO centros_hospitalarios VALUES (8, 'Clinica Loira', 2, 'El Paraiso', 1, 1, 1, 1, 1);
INSERT INTO centros_hospitalarios VALUES (13, 'Instituto Docente de Urología (IDU)', 2, 'Valencia', 8, 92, 273, 2, 1);
INSERT INTO centros_hospitalarios VALUES (14, 'Sede MPPS', 4, 'CSB Torre Sur', 1, 1, 1, 1, 2);


--
-- Data for Name: condicion_paciente; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO condicion_paciente VALUES (1, 'Filtración glomerular menor o igual a 20 cc/min');
INSERT INTO condicion_paciente VALUES (2, '	Inicio de diálisis y evaluación pretrasplante com');


--
-- Name: condicion_paciente_condicion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('condicion_paciente_condicion_id_seq', 3, true);


--
-- Data for Name: donantes; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: donantes_donante_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('donantes_donante_id_seq', 1, false);


--
-- Data for Name: estados; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO estados VALUES (1, 'Distrito Capital');
INSERT INTO estados VALUES (2, 'Amazonas');
INSERT INTO estados VALUES (3, 'Anzoátegui');
INSERT INTO estados VALUES (4, 'Apure');
INSERT INTO estados VALUES (5, 'Aragua');
INSERT INTO estados VALUES (6, 'Barinas');
INSERT INTO estados VALUES (7, 'Bolívar');
INSERT INTO estados VALUES (8, 'Carabobo');
INSERT INTO estados VALUES (9, 'Cojedes');
INSERT INTO estados VALUES (10, 'Delta Amacuro');
INSERT INTO estados VALUES (11, 'Falcón');
INSERT INTO estados VALUES (12, 'Guárico');
INSERT INTO estados VALUES (13, 'Lara');
INSERT INTO estados VALUES (14, 'Mérida');
INSERT INTO estados VALUES (15, 'Miranda');
INSERT INTO estados VALUES (16, 'Monagas');
INSERT INTO estados VALUES (17, 'Nueva Esparta');
INSERT INTO estados VALUES (18, 'Portuguesa');
INSERT INTO estados VALUES (19, 'Sucre');
INSERT INTO estados VALUES (20, 'Táchira');
INSERT INTO estados VALUES (21, 'Trujillo');
INSERT INTO estados VALUES (22, 'Yaracuy');
INSERT INTO estados VALUES (23, 'Zulia');
INSERT INTO estados VALUES (24, 'Vargas');


--
-- Data for Name: estatus_pac; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO estatus_pac VALUES (2, 'Paciente Activo');
INSERT INTO estatus_pac VALUES (1, 'Nuevo Ingreso');
INSERT INTO estatus_pac VALUES (3, 'Paciente Inactivo');
INSERT INTO estatus_pac VALUES (4, 'Trasplantado');
INSERT INTO estatus_pac VALUES (5, 'Fallecido');


--
-- Name: estatus_pac_estatus_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('estatus_pac_estatus_id_seq', 5, true);


--
-- Data for Name: estatus_per; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: estatus_per_estatus_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('estatus_per_estatus_id_seq', 1, false);


--
-- Data for Name: estatus_usr; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO estatus_usr VALUES (1, 'Usuario Activo');
INSERT INTO estatus_usr VALUES (2, 'Usuario Inactivo');


--
-- Data for Name: examenes; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO examenes VALUES (1, 1, '2012-01-01', 1, 1, 1, 1);
INSERT INTO examenes VALUES (34, 1, '2014-03-07', 2, 1, 1, 2);


--
-- Name: examenes_examen_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('examenes_examen_id_seq', 34, true);


--
-- Data for Name: generos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO generos VALUES ('F', 'Femenino');
INSERT INTO generos VALUES ('M', 'Masculino');


--
-- Data for Name: hla_a; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO hla_a VALUES (1, 'A*0101', 'A*0101');
INSERT INTO hla_a VALUES (2, 'A*0102', 'A*0102');
INSERT INTO hla_a VALUES (3, 'A*0103', 'A*0103');
INSERT INTO hla_a VALUES (4, 'A*0104N', 'A*0104N');
INSERT INTO hla_a VALUES (5, 'A*02011', 'A*02011');
INSERT INTO hla_a VALUES (6, 'A*0202', 'A*0202');
INSERT INTO hla_a VALUES (7, 'A*0203', 'A*0203');
INSERT INTO hla_a VALUES (8, 'A*0204', 'A*0204');
INSERT INTO hla_a VALUES (9, 'A*0205', 'A*0205');
INSERT INTO hla_a VALUES (10, 'A*0206', 'A*0206');
INSERT INTO hla_a VALUES (11, 'A*0207', 'A*0207');
INSERT INTO hla_a VALUES (12, 'A*0208', 'A*0208');
INSERT INTO hla_a VALUES (13, 'A*0209', 'A*0209');
INSERT INTO hla_a VALUES (14, 'A*0210', 'A*0210');
INSERT INTO hla_a VALUES (15, 'A*0211', 'A*0211');
INSERT INTO hla_a VALUES (16, 'A*0212', 'A*0212');
INSERT INTO hla_a VALUES (17, 'A*0213', 'A*0213');
INSERT INTO hla_a VALUES (18, 'A*0214', 'A*0214');
INSERT INTO hla_a VALUES (19, 'A*0215N', 'A*0215N');
INSERT INTO hla_a VALUES (20, 'A*0216', 'A*0216');
INSERT INTO hla_a VALUES (21, 'A*02171', 'A*02171');
INSERT INTO hla_a VALUES (22, 'A*02172', 'A*02172');
INSERT INTO hla_a VALUES (23, 'A*0218', 'A*0218');
INSERT INTO hla_a VALUES (24, 'A*0219', 'A*0219');
INSERT INTO hla_a VALUES (25, 'A*0220', 'A*0220');
INSERT INTO hla_a VALUES (26, 'A*0221', 'A*0221');
INSERT INTO hla_a VALUES (27, 'A*0222', 'A*0222');
INSERT INTO hla_a VALUES (28, 'A*0224', 'A*0224');
INSERT INTO hla_a VALUES (29, 'A*0225', 'A*0225');
INSERT INTO hla_a VALUES (30, 'A*0226', 'A*0226');
INSERT INTO hla_a VALUES (31, 'A*0301', 'A*0301');
INSERT INTO hla_a VALUES (32, 'A*0302', 'A*0302');
INSERT INTO hla_a VALUES (33, 'A*0303N', 'A*0303N');
INSERT INTO hla_a VALUES (34, 'A*0304', 'A*0304');
INSERT INTO hla_a VALUES (35, 'A*1101', 'A*1101');
INSERT INTO hla_a VALUES (36, 'A*1102', 'A*1102');
INSERT INTO hla_a VALUES (37, 'A*1103', 'A*1103');
INSERT INTO hla_a VALUES (38, 'A*1104', 'A*1104');
INSERT INTO hla_a VALUES (39, 'A*2301', 'A*2301');
INSERT INTO hla_a VALUES (40, 'A*240210', 'A*240210');
INSERT INTO hla_a VALUES (41, 'A*240210L', 'A*240210L');
INSERT INTO hla_a VALUES (42, 'A*2403', 'A*2403');
INSERT INTO hla_a VALUES (43, 'A*2404', 'A*2404');
INSERT INTO hla_a VALUES (44, 'A*2405', 'A*2405');
INSERT INTO hla_a VALUES (45, 'A*2406', 'A*2406');
INSERT INTO hla_a VALUES (46, 'A*2407', 'A*2407');
INSERT INTO hla_a VALUES (47, 'A*2408', 'A*2408');
INSERT INTO hla_a VALUES (48, 'A*2409', 'A*2409');
INSERT INTO hla_a VALUES (49, 'A*2410', 'A*2410');
INSERT INTO hla_a VALUES (50, 'A*2411N', 'A*2411N');
INSERT INTO hla_a VALUES (51, 'A*2413', 'A*2413');
INSERT INTO hla_a VALUES (52, 'A*2414', 'A*2414');
INSERT INTO hla_a VALUES (53, 'A*2501', 'A*2501');
INSERT INTO hla_a VALUES (54, 'A*2502', 'A*2502');
INSERT INTO hla_a VALUES (55, 'A*2601', 'A*2601');
INSERT INTO hla_a VALUES (56, 'A*2602', 'A*2602');
INSERT INTO hla_a VALUES (57, 'A*2603', 'A*2603');
INSERT INTO hla_a VALUES (58, 'A*2604', 'A*2604');
INSERT INTO hla_a VALUES (59, 'A*2605', 'A*2605');
INSERT INTO hla_a VALUES (60, 'A*2606', 'A*2606');
INSERT INTO hla_a VALUES (61, 'A*2607', 'A*2607');
INSERT INTO hla_a VALUES (62, 'A*2608', 'A*2608');
INSERT INTO hla_a VALUES (63, 'A*2609', 'A*2609');
INSERT INTO hla_a VALUES (64, 'A*2610', 'A*2610');
INSERT INTO hla_a VALUES (65, 'A*2611N', 'A*2611N');
INSERT INTO hla_a VALUES (66, 'A*2901', 'A*2901');
INSERT INTO hla_a VALUES (67, 'A*2902', 'A*2902');
INSERT INTO hla_a VALUES (68, 'A*2903', 'A*2903');
INSERT INTO hla_a VALUES (69, 'A*3001', 'A*3001');
INSERT INTO hla_a VALUES (70, 'A*3002', 'A*3002');
INSERT INTO hla_a VALUES (71, 'A*3003', 'A*3003');
INSERT INTO hla_a VALUES (72, 'A*3004', 'A*3004');
INSERT INTO hla_a VALUES (73, 'A*3006', 'A*3006');
INSERT INTO hla_a VALUES (74, 'A*31012', 'A*31012');
INSERT INTO hla_a VALUES (75, 'A*3201', 'A*3201');
INSERT INTO hla_a VALUES (76, 'A*3202', 'A*3202');
INSERT INTO hla_a VALUES (77, 'A*3301', 'A*3301');
INSERT INTO hla_a VALUES (78, 'A*3303', 'A*3303');
INSERT INTO hla_a VALUES (79, 'A*3401', 'A*3401');
INSERT INTO hla_a VALUES (80, 'A*3402', 'A*3402');
INSERT INTO hla_a VALUES (81, 'A*3601', 'A*3601');
INSERT INTO hla_a VALUES (82, 'A*4301', 'A*4301');
INSERT INTO hla_a VALUES (83, 'A*6601', 'A*6601');
INSERT INTO hla_a VALUES (84, 'A*6602', 'A*6602');
INSERT INTO hla_a VALUES (85, 'A*6603', 'A*6603');
INSERT INTO hla_a VALUES (86, 'A*68011', 'A*68011');
INSERT INTO hla_a VALUES (87, 'A*68012', 'A*68012');
INSERT INTO hla_a VALUES (88, 'A*6802', 'A*6802');
INSERT INTO hla_a VALUES (89, 'A*68031', 'A*68031');
INSERT INTO hla_a VALUES (90, 'A*68032', 'A*68032');
INSERT INTO hla_a VALUES (91, 'A*6804', 'A*6804');
INSERT INTO hla_a VALUES (92, 'A*6805', 'A*6805');
INSERT INTO hla_a VALUES (93, 'A*6806', 'A*6806');
INSERT INTO hla_a VALUES (94, 'A*6901', 'A*6901');
INSERT INTO hla_a VALUES (95, 'A*7401', 'A*7401');
INSERT INTO hla_a VALUES (96, 'A*7402', 'A*7402');
INSERT INTO hla_a VALUES (97, 'A*7403', 'A*7403');
INSERT INTO hla_a VALUES (98, 'A*8001', 'A*8001');


--
-- Name: hla_a_locus_a_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('hla_a_locus_a_id_seq', 98, true);


--
-- Data for Name: hla_b; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO hla_b VALUES (1, NULL, 'B*07021', 'B*07021');
INSERT INTO hla_b VALUES (2, NULL, 'B*07022', 'B*07022');
INSERT INTO hla_b VALUES (3, NULL, 'B*07023', 'B*07023');
INSERT INTO hla_b VALUES (4, NULL, 'B*0703', 'B*0703');
INSERT INTO hla_b VALUES (5, NULL, 'B*0704', 'B*0704');
INSERT INTO hla_b VALUES (6, NULL, 'B*0705', 'B*0705');
INSERT INTO hla_b VALUES (7, NULL, 'B*0706', 'B*0706');
INSERT INTO hla_b VALUES (8, NULL, 'B*0707', 'B*0707');
INSERT INTO hla_b VALUES (9, NULL, 'B*0708', 'B*0708');
INSERT INTO hla_b VALUES (10, NULL, 'B*0801', 'B*0801');
INSERT INTO hla_b VALUES (11, NULL, 'B*0802', 'B*0802');
INSERT INTO hla_b VALUES (12, NULL, 'B*0803', 'B*0803');
INSERT INTO hla_b VALUES (13, NULL, 'B*0804', 'B*0804');
INSERT INTO hla_b VALUES (14, NULL, 'B*0805', 'B*0805');
INSERT INTO hla_b VALUES (15, NULL, 'B*1301', 'B*1301');
INSERT INTO hla_b VALUES (16, NULL, 'B*1302', 'B*1302');
INSERT INTO hla_b VALUES (17, NULL, 'B*1303', 'B*1303');
INSERT INTO hla_b VALUES (18, NULL, 'B*1304', 'B*1304');
INSERT INTO hla_b VALUES (19, NULL, 'B*1401', 'B*1401');
INSERT INTO hla_b VALUES (20, NULL, 'B*1402', 'B*1402');
INSERT INTO hla_b VALUES (21, NULL, 'B*1403', 'B*1403');
INSERT INTO hla_b VALUES (22, NULL, 'B*1404', 'B*1404');
INSERT INTO hla_b VALUES (23, NULL, 'B*1405', 'B*1405');
INSERT INTO hla_b VALUES (24, NULL, 'B*1501', 'B*1501');
INSERT INTO hla_b VALUES (25, NULL, 'B*1502', 'B*1502');
INSERT INTO hla_b VALUES (26, NULL, 'B*1503', 'B*1503');
INSERT INTO hla_b VALUES (27, NULL, 'B*1504', 'B*1504');
INSERT INTO hla_b VALUES (28, NULL, 'B*1505', 'B*1505');
INSERT INTO hla_b VALUES (29, NULL, 'B*1506', 'B*1506');
INSERT INTO hla_b VALUES (30, NULL, 'B*1507', 'B*1507');
INSERT INTO hla_b VALUES (31, NULL, 'B*1508', 'B*1508');
INSERT INTO hla_b VALUES (32, NULL, 'B*1509', 'B*1509');
INSERT INTO hla_b VALUES (33, NULL, 'B*1510', 'B*1510');
INSERT INTO hla_b VALUES (34, NULL, 'B*1511', 'B*1511');
INSERT INTO hla_b VALUES (35, NULL, 'B*1512', 'B*1512');
INSERT INTO hla_b VALUES (36, NULL, 'B*1513', 'B*1513');
INSERT INTO hla_b VALUES (37, NULL, 'B*1514', 'B*1514');
INSERT INTO hla_b VALUES (38, NULL, 'B*1515', 'B*1515');
INSERT INTO hla_b VALUES (39, NULL, 'B*1516', 'B*1516');
INSERT INTO hla_b VALUES (40, NULL, 'B*1517', 'B*1517');
INSERT INTO hla_b VALUES (41, NULL, 'B*1518', 'B*1518');
INSERT INTO hla_b VALUES (42, NULL, 'B*1519', 'B*1519');
INSERT INTO hla_b VALUES (43, NULL, 'B*1520', 'B*1520');
INSERT INTO hla_b VALUES (44, NULL, 'B*1521', 'B*1521');
INSERT INTO hla_b VALUES (45, NULL, 'B*1522', 'B*1522');
INSERT INTO hla_b VALUES (46, NULL, 'B*1523', 'B*1523');
INSERT INTO hla_b VALUES (47, NULL, 'B*1524', 'B*1524');
INSERT INTO hla_b VALUES (48, NULL, 'B*1525', 'B*1525');
INSERT INTO hla_b VALUES (49, NULL, 'B*1526N', 'B*1526N');
INSERT INTO hla_b VALUES (50, NULL, 'B*1527', 'B*1527');
INSERT INTO hla_b VALUES (51, NULL, 'B*1528', 'B*1528');
INSERT INTO hla_b VALUES (52, NULL, 'B*1529', 'B*1529');
INSERT INTO hla_b VALUES (53, NULL, 'B*1530', 'B*1530');
INSERT INTO hla_b VALUES (54, NULL, 'B*1531', 'B*1531');
INSERT INTO hla_b VALUES (55, NULL, 'B*1532', 'B*1532');
INSERT INTO hla_b VALUES (56, NULL, 'B*1533', 'B*1533');
INSERT INTO hla_b VALUES (57, NULL, 'B*1534', 'B*1534');
INSERT INTO hla_b VALUES (58, NULL, 'B*1535', 'B*1535');
INSERT INTO hla_b VALUES (59, NULL, 'B*1536', 'B*1536');
INSERT INTO hla_b VALUES (60, NULL, 'B*1537', 'B*1537');
INSERT INTO hla_b VALUES (61, NULL, 'B*1538', 'B*1538');
INSERT INTO hla_b VALUES (62, NULL, 'B*1539', 'B*1539');
INSERT INTO hla_b VALUES (63, NULL, 'B*1540', 'B*1540');
INSERT INTO hla_b VALUES (64, NULL, 'B*1541', 'B*1541');
INSERT INTO hla_b VALUES (65, NULL, 'B*1801', 'B*1801');
INSERT INTO hla_b VALUES (66, NULL, 'B*1802', 'B*1802');
INSERT INTO hla_b VALUES (67, NULL, 'B*1803', 'B*1803');
INSERT INTO hla_b VALUES (68, NULL, 'B*1804', 'B*1804');
INSERT INTO hla_b VALUES (69, NULL, 'B*1805', 'B*1805');
INSERT INTO hla_b VALUES (70, NULL, 'B*2701', 'B*2701');
INSERT INTO hla_b VALUES (71, NULL, 'B*2701', 'B*2701');
INSERT INTO hla_b VALUES (72, NULL, 'B*2702', 'B*2702');
INSERT INTO hla_b VALUES (73, NULL, 'B*2703', 'B*2703');
INSERT INTO hla_b VALUES (74, NULL, 'B*2704', 'B*2704');
INSERT INTO hla_b VALUES (75, NULL, 'B*27052', 'B*27052');
INSERT INTO hla_b VALUES (76, NULL, 'B*27053', 'B*27053');
INSERT INTO hla_b VALUES (77, NULL, 'B*2706', 'B*2706');
INSERT INTO hla_b VALUES (78, NULL, 'B*2707', 'B*2707');
INSERT INTO hla_b VALUES (79, NULL, 'B*2708', 'B*2708');
INSERT INTO hla_b VALUES (80, NULL, 'B*2709', 'B*2709');
INSERT INTO hla_b VALUES (81, NULL, 'B*2710', 'B*2710');
INSERT INTO hla_b VALUES (82, NULL, 'B*2711', 'B*2711');
INSERT INTO hla_b VALUES (83, NULL, 'B*2712', 'B*2712');
INSERT INTO hla_b VALUES (84, NULL, 'B*3501', 'B*3501');
INSERT INTO hla_b VALUES (85, NULL, 'B*3502', 'B*3502');
INSERT INTO hla_b VALUES (86, NULL, 'B*3503', 'B*3503');
INSERT INTO hla_b VALUES (87, NULL, 'B*3504', 'B*3504');
INSERT INTO hla_b VALUES (88, NULL, 'B*3505', 'B*3505');
INSERT INTO hla_b VALUES (89, NULL, 'B*3506', 'B*3506');
INSERT INTO hla_b VALUES (90, NULL, 'B*3507', 'B*3507');
INSERT INTO hla_b VALUES (91, NULL, 'B*3508', 'B*3508');
INSERT INTO hla_b VALUES (92, NULL, 'B*35091', 'B*35091');
INSERT INTO hla_b VALUES (93, NULL, 'B*35092', 'B*35092');
INSERT INTO hla_b VALUES (94, NULL, 'B*3510', 'B*3510');
INSERT INTO hla_b VALUES (95, NULL, 'B*3511', 'B*3511');
INSERT INTO hla_b VALUES (96, NULL, 'B*3512', 'B*3512');
INSERT INTO hla_b VALUES (97, NULL, 'B*3513', 'B*3513');
INSERT INTO hla_b VALUES (98, NULL, 'B*3514', 'B*3514');
INSERT INTO hla_b VALUES (99, NULL, 'B*3515', 'B*3515');
INSERT INTO hla_b VALUES (100, NULL, 'B*3516', 'B*3516');
INSERT INTO hla_b VALUES (101, NULL, 'B*3517', 'B*3517');
INSERT INTO hla_b VALUES (102, NULL, 'B*3518', 'B*3518');
INSERT INTO hla_b VALUES (103, NULL, 'B*3519', 'B*3519');
INSERT INTO hla_b VALUES (104, NULL, 'B*3520', 'B*3520');
INSERT INTO hla_b VALUES (105, NULL, 'B*3701', 'B*3701');
INSERT INTO hla_b VALUES (106, NULL, 'B*3702', 'B*3702');
INSERT INTO hla_b VALUES (107, NULL, 'B*3801', 'B*3801');
INSERT INTO hla_b VALUES (108, NULL, 'B*38021', 'B*38021');
INSERT INTO hla_b VALUES (109, NULL, 'B*38022', 'B*38022');
INSERT INTO hla_b VALUES (110, NULL, 'B*39011', 'B*39011');
INSERT INTO hla_b VALUES (111, NULL, 'B*39013', 'B*39013');
INSERT INTO hla_b VALUES (112, NULL, 'B*39021', 'B*39021');
INSERT INTO hla_b VALUES (113, NULL, 'B*39022', 'B*39022');
INSERT INTO hla_b VALUES (114, NULL, 'B*3903', 'B*3903');
INSERT INTO hla_b VALUES (115, NULL, 'B*3904', 'B*3904');
INSERT INTO hla_b VALUES (116, NULL, 'B*3905', 'B*3905');
INSERT INTO hla_b VALUES (117, NULL, 'B*39061', 'B*39061');
INSERT INTO hla_b VALUES (118, NULL, 'B*39062', 'B*39062');
INSERT INTO hla_b VALUES (119, NULL, 'B*3907', 'B*3907');
INSERT INTO hla_b VALUES (120, NULL, 'B*3908', 'B*3908');
INSERT INTO hla_b VALUES (121, NULL, 'B*3909', 'B*3909');
INSERT INTO hla_b VALUES (122, NULL, 'B*3910', 'B*3910');
INSERT INTO hla_b VALUES (123, NULL, 'B*3911', 'B*3911');
INSERT INTO hla_b VALUES (124, NULL, 'B*3912', 'B*3912');
INSERT INTO hla_b VALUES (125, NULL, 'B*40011', 'B*40011');
INSERT INTO hla_b VALUES (126, NULL, 'B*40012', 'B*40012');
INSERT INTO hla_b VALUES (127, NULL, 'B*4002', 'B*4002');
INSERT INTO hla_b VALUES (128, NULL, 'B*4003', 'B*4003');
INSERT INTO hla_b VALUES (129, NULL, 'B*4004', 'B*4004');
INSERT INTO hla_b VALUES (130, NULL, 'B*4005', 'B*4005');
INSERT INTO hla_b VALUES (131, NULL, 'B*4006', 'B*4006');
INSERT INTO hla_b VALUES (132, NULL, 'B*4007', 'B*4007');
INSERT INTO hla_b VALUES (133, NULL, 'B*4008', 'B*4008');
INSERT INTO hla_b VALUES (134, NULL, 'B*4009', 'B*4009');
INSERT INTO hla_b VALUES (135, NULL, 'B*4010', 'B*4010');
INSERT INTO hla_b VALUES (136, NULL, 'B*4011', 'B*4011');
INSERT INTO hla_b VALUES (137, NULL, 'B*4012', 'B*4012');
INSERT INTO hla_b VALUES (138, NULL, 'B*4013', 'B*4013');
INSERT INTO hla_b VALUES (139, NULL, 'B*4014', 'B*4014');
INSERT INTO hla_b VALUES (140, NULL, 'B*4015', 'B*4015');
INSERT INTO hla_b VALUES (141, NULL, 'B*4016', 'B*4016');
INSERT INTO hla_b VALUES (142, NULL, 'B*4017', 'B*4017');
INSERT INTO hla_b VALUES (143, NULL, 'B*4018', 'B*4018');
INSERT INTO hla_b VALUES (144, NULL, 'B*4101', 'B*4101');
INSERT INTO hla_b VALUES (145, NULL, 'B*4102', 'B*4102');
INSERT INTO hla_b VALUES (146, NULL, 'B*4103', 'B*4103');
INSERT INTO hla_b VALUES (147, NULL, 'B*4201', 'B*4201');
INSERT INTO hla_b VALUES (148, NULL, 'B*4202', 'B*4202');
INSERT INTO hla_b VALUES (149, NULL, 'B*4402', 'B*4402');
INSERT INTO hla_b VALUES (150, NULL, 'B*44031', 'B*44031');
INSERT INTO hla_b VALUES (151, NULL, 'B*44032', 'B*44032');
INSERT INTO hla_b VALUES (152, NULL, 'B*4404', 'B*4404');
INSERT INTO hla_b VALUES (153, NULL, 'B*4405', 'B*4405');
INSERT INTO hla_b VALUES (154, NULL, 'B*4406', 'B*4406');
INSERT INTO hla_b VALUES (155, NULL, 'B*4407', 'B*4407');
INSERT INTO hla_b VALUES (156, NULL, 'B*4408', 'B*4408');
INSERT INTO hla_b VALUES (157, NULL, 'B*4409', 'B*4409');
INSERT INTO hla_b VALUES (158, NULL, 'B*4410', 'B*4410');
INSERT INTO hla_b VALUES (159, NULL, 'B*4501', 'B*4501');
INSERT INTO hla_b VALUES (160, NULL, 'B*4601', 'B*4601');
INSERT INTO hla_b VALUES (161, NULL, 'B*4701', 'B*4701');
INSERT INTO hla_b VALUES (162, NULL, 'B*4702', 'B*4702');
INSERT INTO hla_b VALUES (163, NULL, 'B*4703', 'B*4703');
INSERT INTO hla_b VALUES (164, NULL, 'B*4801', 'B*4801');
INSERT INTO hla_b VALUES (165, NULL, 'B*4802', 'B*4802');
INSERT INTO hla_b VALUES (166, NULL, 'B*4803', 'B*4803');
INSERT INTO hla_b VALUES (167, NULL, 'B*4901', 'B*4901');
INSERT INTO hla_b VALUES (168, NULL, 'B*5001', 'B*5001');
INSERT INTO hla_b VALUES (169, NULL, 'B*5002', 'B*5002');
INSERT INTO hla_b VALUES (170, NULL, 'B*51011', 'B*51011');
INSERT INTO hla_b VALUES (171, NULL, 'B*51012', 'B*51012');
INSERT INTO hla_b VALUES (172, NULL, 'B*51021', 'B*51021');
INSERT INTO hla_b VALUES (173, NULL, 'B*51022', 'B*51022');
INSERT INTO hla_b VALUES (174, NULL, 'B*5103', 'B*5103');
INSERT INTO hla_b VALUES (175, NULL, 'B*5104', 'B*5104');
INSERT INTO hla_b VALUES (176, NULL, 'B*5105', 'B*5105');
INSERT INTO hla_b VALUES (177, NULL, 'B*5106', 'B*5106');
INSERT INTO hla_b VALUES (178, NULL, 'B*5107', 'B*5107');
INSERT INTO hla_b VALUES (179, NULL, 'B*5108', 'B*5108');
INSERT INTO hla_b VALUES (180, NULL, 'B*5109', 'B*5109');
INSERT INTO hla_b VALUES (181, NULL, 'B*5110', 'B*5110');
INSERT INTO hla_b VALUES (182, NULL, 'B*5111N', 'B*5111N');
INSERT INTO hla_b VALUES (183, NULL, 'B*52011', 'B*52011');
INSERT INTO hla_b VALUES (184, NULL, 'B*52012', 'B*52012');
INSERT INTO hla_b VALUES (185, NULL, 'B*5301', 'B*5301');
INSERT INTO hla_b VALUES (186, NULL, 'B*5302', 'B*5302');
INSERT INTO hla_b VALUES (187, NULL, 'B*5401', 'B*5401');
INSERT INTO hla_b VALUES (188, NULL, 'B*5501', 'B*5501');
INSERT INTO hla_b VALUES (189, NULL, 'B*5502', 'B*5502');
INSERT INTO hla_b VALUES (190, NULL, 'B*5503', 'B*5503');
INSERT INTO hla_b VALUES (191, NULL, 'B*5504', 'B*5504');
INSERT INTO hla_b VALUES (192, NULL, 'B*5505', 'B*5505');
INSERT INTO hla_b VALUES (193, NULL, 'B*5506', 'B*5506');
INSERT INTO hla_b VALUES (194, NULL, 'B*5601', 'B*5601');
INSERT INTO hla_b VALUES (195, NULL, 'B*5602', 'B*5602');
INSERT INTO hla_b VALUES (196, NULL, 'B*5603', 'B*5603');
INSERT INTO hla_b VALUES (197, NULL, 'B*5604', 'B*5604');
INSERT INTO hla_b VALUES (198, NULL, 'B*5701', 'B*5701');
INSERT INTO hla_b VALUES (199, NULL, 'B*5702', 'B*5702');
INSERT INTO hla_b VALUES (200, NULL, 'B*5703', 'B*5703');
INSERT INTO hla_b VALUES (201, NULL, 'B*5704', 'B*5704');
INSERT INTO hla_b VALUES (202, NULL, 'B*5801', 'B*5801');
INSERT INTO hla_b VALUES (203, NULL, 'B*5802', 'B*5802');
INSERT INTO hla_b VALUES (204, NULL, 'B*5901', 'B*5901');
INSERT INTO hla_b VALUES (205, NULL, 'B*67011', 'B*67011');
INSERT INTO hla_b VALUES (206, NULL, 'B*67012', 'B*67012');
INSERT INTO hla_b VALUES (207, NULL, 'B*7301', 'B*7301');
INSERT INTO hla_b VALUES (208, NULL, 'B*7801', 'B*7801');
INSERT INTO hla_b VALUES (209, NULL, 'B*78021', 'B*78021');
INSERT INTO hla_b VALUES (210, NULL, 'B*78022', 'B*78022');
INSERT INTO hla_b VALUES (211, NULL, 'B*8101', 'B*8101');
INSERT INTO hla_b VALUES (212, NULL, 'B*8102', 'B*8102');


--
-- Name: hla_b_locus_b_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('hla_b_locus_b_id_seq', 212, true);


--
-- Data for Name: hla_dr; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO hla_dr VALUES (1, '﻿DRA*0101', '﻿DRA*0101');
INSERT INTO hla_dr VALUES (2, 'DRA*0102', 'DRA*0102');
INSERT INTO hla_dr VALUES (3, 'DRB1*01022', 'DRB1*01022');
INSERT INTO hla_dr VALUES (4, 'DRB1*0103', 'DRB1*0103');
INSERT INTO hla_dr VALUES (5, 'DRB1*0104', 'DRB1*0104');
INSERT INTO hla_dr VALUES (6, 'DRB1*03011', 'DRB1*03011');
INSERT INTO hla_dr VALUES (7, 'DRB1*03012', 'DRB1*03012');
INSERT INTO hla_dr VALUES (8, 'DRB1*03021', 'DRB1*03021');
INSERT INTO hla_dr VALUES (9, 'DRB1*03022', 'DRB1*03022');
INSERT INTO hla_dr VALUES (10, 'DRB1*0303', 'DRB1*0303');
INSERT INTO hla_dr VALUES (11, 'DRB1*0304', 'DRB1*0304');
INSERT INTO hla_dr VALUES (12, 'DRB1*0305', 'DRB1*0305');
INSERT INTO hla_dr VALUES (13, 'DRB1*0306', 'DRB1*0306');
INSERT INTO hla_dr VALUES (14, 'DRB1*0307', 'DRB1*0307');
INSERT INTO hla_dr VALUES (15, 'DRB1*0308', 'DRB1*0308');
INSERT INTO hla_dr VALUES (16, 'DRB1*0309', 'DRB1*0309');
INSERT INTO hla_dr VALUES (17, 'DRB1*0310', 'DRB1*0310');
INSERT INTO hla_dr VALUES (18, 'DRB1*0311', 'DRB1*0311');
INSERT INTO hla_dr VALUES (19, 'DRB1*04011', 'DRB1*04011');
INSERT INTO hla_dr VALUES (20, 'DRB1*04012', 'DRB1*04012');
INSERT INTO hla_dr VALUES (21, 'DRB1*0402', 'DRB1*0402');
INSERT INTO hla_dr VALUES (22, 'DRB1*0403', 'DRB1*0403');
INSERT INTO hla_dr VALUES (23, 'DRB1*0404', 'DRB1*0404');
INSERT INTO hla_dr VALUES (24, 'DRB1*04051', 'DRB1*04051');
INSERT INTO hla_dr VALUES (25, 'DRB1*04052', 'DRB1*04052');
INSERT INTO hla_dr VALUES (26, 'DRB1*0406', 'DRB1*0406');
INSERT INTO hla_dr VALUES (27, 'DRB1*0407', 'DRB1*0407');
INSERT INTO hla_dr VALUES (28, 'DRB1*0408', 'DRB1*0408');
INSERT INTO hla_dr VALUES (29, 'DRB1*0409', 'DRB1*0409');
INSERT INTO hla_dr VALUES (30, 'DRB1*0410', 'DRB1*0410');
INSERT INTO hla_dr VALUES (31, 'DRB1*0411', 'DRB1*0411');
INSERT INTO hla_dr VALUES (32, 'DRB1*0412', 'DRB1*0412');
INSERT INTO hla_dr VALUES (33, 'DRB1*0413', 'DRB1*0413');
INSERT INTO hla_dr VALUES (34, 'DRB1*0101', 'DRB1*0101');
INSERT INTO hla_dr VALUES (35, 'DRB1*01021', 'DRB1*01021');
INSERT INTO hla_dr VALUES (36, 'DRB1*0416', 'DRB1*0416');
INSERT INTO hla_dr VALUES (37, 'DRB1*0417', 'DRB1*0417');
INSERT INTO hla_dr VALUES (38, 'DRB1*0418', 'DRB1*0418');
INSERT INTO hla_dr VALUES (39, 'DRB1*0419', 'DRB1*0419');
INSERT INTO hla_dr VALUES (40, 'DRB1*0420', 'DRB1*0420');
INSERT INTO hla_dr VALUES (41, 'DRB1*0421', 'DRB1*0421');
INSERT INTO hla_dr VALUES (42, 'DRB1*0422', 'DRB1*0422');
INSERT INTO hla_dr VALUES (43, 'DRB1*0423', 'DRB1*0423');
INSERT INTO hla_dr VALUES (44, 'DRB1*0424', 'DRB1*0424');
INSERT INTO hla_dr VALUES (45, 'DRB1*0425', 'DRB1*0425');
INSERT INTO hla_dr VALUES (46, 'DRB1*0426', 'DRB1*0426');
INSERT INTO hla_dr VALUES (47, 'DRB1*0427', 'DRB1*0427');
INSERT INTO hla_dr VALUES (48, 'DRB1*0701', 'DRB1*0701');
INSERT INTO hla_dr VALUES (49, 'DRB1*0703', 'DRB1*0703');
INSERT INTO hla_dr VALUES (50, 'DRB1*0801', 'DRB1*0801');
INSERT INTO hla_dr VALUES (51, 'DRB1*08021', 'DRB1*08021');
INSERT INTO hla_dr VALUES (52, 'DRB1*08022', 'DRB1*08022');
INSERT INTO hla_dr VALUES (53, 'DRB1*08032', 'DRB1*08032');
INSERT INTO hla_dr VALUES (54, 'DRB1*08041', 'DRB1*08041');
INSERT INTO hla_dr VALUES (55, 'DRB1*08042', 'DRB1*08042');
INSERT INTO hla_dr VALUES (56, 'DRB1*08043', 'DRB1*08043');
INSERT INTO hla_dr VALUES (57, 'DRB1*0805', 'DRB1*0805');
INSERT INTO hla_dr VALUES (58, 'DRB1*0806', 'DRB1*0806');
INSERT INTO hla_dr VALUES (59, 'DRB1*0807', 'DRB1*0807');
INSERT INTO hla_dr VALUES (60, 'DRB1*0808', 'DRB1*0808');
INSERT INTO hla_dr VALUES (61, 'DRB1*0809', 'DRB1*0809');
INSERT INTO hla_dr VALUES (62, 'DRB1*0810', 'DRB1*0810');
INSERT INTO hla_dr VALUES (63, 'DRB1*0811', 'DRB1*0811');
INSERT INTO hla_dr VALUES (64, 'DRB1*0812', 'DRB1*0812');
INSERT INTO hla_dr VALUES (65, 'DRB1*0813', 'DRB1*0813');
INSERT INTO hla_dr VALUES (66, 'DRB1*0814', 'DRB1*0814');
INSERT INTO hla_dr VALUES (67, 'DRB1*0414', 'DRB1*0414');
INSERT INTO hla_dr VALUES (68, 'DRB1*0415', 'DRB1*0415');
INSERT INTO hla_dr VALUES (69, 'DRB1*0817', 'DRB1*0817');
INSERT INTO hla_dr VALUES (70, 'DRB1*0818', 'DRB1*0818');
INSERT INTO hla_dr VALUES (71, 'DRB1*0819', 'DRB1*0819');
INSERT INTO hla_dr VALUES (72, 'DRB1*09012', 'DRB1*09012');
INSERT INTO hla_dr VALUES (73, 'DRB1*1001', 'DRB1*1001');
INSERT INTO hla_dr VALUES (74, 'DRB1*11011', 'DRB1*11011');
INSERT INTO hla_dr VALUES (75, 'DRB1*11012', 'DRB1*11012');
INSERT INTO hla_dr VALUES (76, 'DRB1*11013', 'DRB1*11013');
INSERT INTO hla_dr VALUES (77, 'DRB1*1102', 'DRB1*1102');
INSERT INTO hla_dr VALUES (78, 'DRB1*1103', 'DRB1*1103');
INSERT INTO hla_dr VALUES (79, 'DRB1*11041', 'DRB1*11041');
INSERT INTO hla_dr VALUES (80, 'DRB1*11042', 'DRB1*11042');
INSERT INTO hla_dr VALUES (81, 'DRB1*1105', 'DRB1*1105');
INSERT INTO hla_dr VALUES (82, 'DRB1*1106', 'DRB1*1106');
INSERT INTO hla_dr VALUES (83, 'DRB1*1107', 'DRB1*1107');
INSERT INTO hla_dr VALUES (84, 'DRB1*1108', 'DRB1*1108');
INSERT INTO hla_dr VALUES (85, 'DRB1*1109', 'DRB1*1109');
INSERT INTO hla_dr VALUES (86, 'DRB1*1110', 'DRB1*1110');
INSERT INTO hla_dr VALUES (87, 'DRB1*1112', 'DRB1*1112');
INSERT INTO hla_dr VALUES (88, 'DRB1*1113', 'DRB1*1113');
INSERT INTO hla_dr VALUES (89, 'DRB1*1114', 'DRB1*1114');
INSERT INTO hla_dr VALUES (90, 'DRB1*1115', 'DRB1*1115');
INSERT INTO hla_dr VALUES (91, 'DRB1*1116', 'DRB1*1116');
INSERT INTO hla_dr VALUES (92, 'DRB1*1117', 'DRB1*1117');
INSERT INTO hla_dr VALUES (93, 'DRB1*1118', 'DRB1*1118');
INSERT INTO hla_dr VALUES (94, 'DRB1*1119', 'DRB1*1119');
INSERT INTO hla_dr VALUES (95, 'DRB1*1120', 'DRB1*1120');
INSERT INTO hla_dr VALUES (96, 'DRB1*1121', 'DRB1*1121');
INSERT INTO hla_dr VALUES (97, 'DRB1*1122', 'DRB1*1122');
INSERT INTO hla_dr VALUES (98, 'DRB1*1123', 'DRB1*1123');
INSERT INTO hla_dr VALUES (99, 'DRB1*1124', 'DRB1*1124');
INSERT INTO hla_dr VALUES (100, 'DRB1*0815', 'DRB1*0815');
INSERT INTO hla_dr VALUES (101, 'DRB1*0816', 'DRB1*0816');
INSERT INTO hla_dr VALUES (102, 'DRB1*1127', 'DRB1*1127');
INSERT INTO hla_dr VALUES (103, 'DRB1*1128', 'DRB1*1128');
INSERT INTO hla_dr VALUES (104, 'DRB1*1129', 'DRB1*1129');
INSERT INTO hla_dr VALUES (105, 'DRB1*1130', 'DRB1*1130');
INSERT INTO hla_dr VALUES (106, 'DRB1*1131', 'DRB1*1131');
INSERT INTO hla_dr VALUES (107, 'DRB1*1201', 'DRB1*1201');
INSERT INTO hla_dr VALUES (108, 'DRB1*12021', 'DRB1*12021');
INSERT INTO hla_dr VALUES (109, 'DRB1*12022', 'DRB1*12022');
INSERT INTO hla_dr VALUES (110, 'DRB1*12032', 'DRB1*12032');
INSERT INTO hla_dr VALUES (111, 'DRB1*1204', 'DRB1*1204');
INSERT INTO hla_dr VALUES (112, 'DRB1*1205', 'DRB1*1205');
INSERT INTO hla_dr VALUES (113, 'DRB1*1301', 'DRB1*1301');
INSERT INTO hla_dr VALUES (114, 'DRB1*1302', 'DRB1*1302');
INSERT INTO hla_dr VALUES (115, 'DRB1*13031', 'DRB1*13031');
INSERT INTO hla_dr VALUES (116, 'DRB1*13032', 'DRB1*13032');
INSERT INTO hla_dr VALUES (117, 'DRB1*1304', 'DRB1*1304');
INSERT INTO hla_dr VALUES (118, 'DRB1*1305', 'DRB1*1305');
INSERT INTO hla_dr VALUES (119, 'DRB1*1306', 'DRB1*1306');
INSERT INTO hla_dr VALUES (120, 'DRB1*13071', 'DRB1*13071');
INSERT INTO hla_dr VALUES (121, 'DRB1*1308', 'DRB1*1308');
INSERT INTO hla_dr VALUES (122, 'DRB1*1309', 'DRB1*1309');
INSERT INTO hla_dr VALUES (123, 'DRB1*1310', 'DRB1*1310');
INSERT INTO hla_dr VALUES (124, 'DRB1*1311', 'DRB1*1311');
INSERT INTO hla_dr VALUES (125, 'DRB1*1312', 'DRB1*1312');
INSERT INTO hla_dr VALUES (126, 'DRB1*1313', 'DRB1*1313');
INSERT INTO hla_dr VALUES (127, 'DRB1*1314', 'DRB1*1314');
INSERT INTO hla_dr VALUES (128, 'DRB1*1315', 'DRB1*1315');
INSERT INTO hla_dr VALUES (129, 'DRB1*1316', 'DRB1*1316');
INSERT INTO hla_dr VALUES (130, 'DRB1*1317', 'DRB1*1317');
INSERT INTO hla_dr VALUES (131, 'DRB1*1318', 'DRB1*1318');
INSERT INTO hla_dr VALUES (132, 'DRB1*1319', 'DRB1*1319');
INSERT INTO hla_dr VALUES (133, 'DRB1*1125', 'DRB1*1125');
INSERT INTO hla_dr VALUES (134, 'DRB1*1126', 'DRB1*1126');
INSERT INTO hla_dr VALUES (135, 'DRB1*1322', 'DRB1*1322');
INSERT INTO hla_dr VALUES (136, 'DRB1*1323', 'DRB1*1323');
INSERT INTO hla_dr VALUES (137, 'DRB1*1324', 'DRB1*1324');
INSERT INTO hla_dr VALUES (138, 'DRB1*1325', 'DRB1*1325');
INSERT INTO hla_dr VALUES (139, 'DRB1*1326', 'DRB1*1326');
INSERT INTO hla_dr VALUES (140, 'DRB1*1327', 'DRB1*1327');
INSERT INTO hla_dr VALUES (141, 'DRB1*1328', 'DRB1*1328');
INSERT INTO hla_dr VALUES (142, 'DRB1*1329', 'DRB1*1329');
INSERT INTO hla_dr VALUES (143, 'DRB1*1330', 'DRB1*1330');
INSERT INTO hla_dr VALUES (144, 'DRB1*1331', 'DRB1*1331');
INSERT INTO hla_dr VALUES (145, 'DRB1*1332', 'DRB1*1332');
INSERT INTO hla_dr VALUES (146, 'DRB1*1333', 'DRB1*1333');
INSERT INTO hla_dr VALUES (147, 'DRB1*1401', 'DRB1*1401');
INSERT INTO hla_dr VALUES (148, 'DRB1*1402', 'DRB1*1402');
INSERT INTO hla_dr VALUES (149, 'DRB1*1403', 'DRB1*1403');
INSERT INTO hla_dr VALUES (150, 'DRB1*1404', 'DRB1*1404');
INSERT INTO hla_dr VALUES (151, 'DRB1*1405', 'DRB1*1405');
INSERT INTO hla_dr VALUES (152, 'DRB1*1406', 'DRB1*1406');
INSERT INTO hla_dr VALUES (153, 'DRB1*1407', 'DRB1*1407');
INSERT INTO hla_dr VALUES (154, 'DRB1*1408', 'DRB1*1408');
INSERT INTO hla_dr VALUES (155, 'DRB1*1409', 'DRB1*1409');
INSERT INTO hla_dr VALUES (156, 'DRB1*1410', 'DRB1*1410');
INSERT INTO hla_dr VALUES (157, 'DRB1*1411', 'DRB1*1411');
INSERT INTO hla_dr VALUES (158, 'DRB1*1412', 'DRB1*1412');
INSERT INTO hla_dr VALUES (159, 'DRB1*1413', 'DRB1*1413');
INSERT INTO hla_dr VALUES (160, 'DRB1*1414', 'DRB1*1414');
INSERT INTO hla_dr VALUES (161, 'DRB1*1415', 'DRB1*1415');
INSERT INTO hla_dr VALUES (162, 'DRB1*1416', 'DRB1*1416');
INSERT INTO hla_dr VALUES (163, 'DRB1*1417', 'DRB1*1417');
INSERT INTO hla_dr VALUES (164, 'DRB1*1418', 'DRB1*1418');
INSERT INTO hla_dr VALUES (165, 'DRB1*1419', 'DRB1*1419');
INSERT INTO hla_dr VALUES (166, 'DRB1*1320', 'DRB1*1320');
INSERT INTO hla_dr VALUES (167, 'DRB1*1321', 'DRB1*1321');
INSERT INTO hla_dr VALUES (168, 'DRB1*1422', 'DRB1*1422');
INSERT INTO hla_dr VALUES (169, 'DRB1*1423', 'DRB1*1423');
INSERT INTO hla_dr VALUES (170, 'DRB1*1424', 'DRB1*1424');
INSERT INTO hla_dr VALUES (171, 'DRB1*1425', 'DRB1*1425');
INSERT INTO hla_dr VALUES (172, 'DRB1*1426', 'DRB1*1426');
INSERT INTO hla_dr VALUES (173, 'DRB1*1427', 'DRB1*1427');
INSERT INTO hla_dr VALUES (174, 'DRB1*1428', 'DRB1*1428');
INSERT INTO hla_dr VALUES (175, 'DRB1*1429', 'DRB1*1429');
INSERT INTO hla_dr VALUES (176, 'DRB1*1430', 'DRB1*1430');
INSERT INTO hla_dr VALUES (177, 'DRB1*1431', 'DRB1*1431');
INSERT INTO hla_dr VALUES (178, 'DRB1*15011', 'DRB1*15011');
INSERT INTO hla_dr VALUES (179, 'DRB1*15012', 'DRB1*15012');
INSERT INTO hla_dr VALUES (180, 'DRB1*15021', 'DRB1*15021');
INSERT INTO hla_dr VALUES (181, 'DRB1*15022', 'DRB1*15022');
INSERT INTO hla_dr VALUES (182, 'DRB1*15023', 'DRB1*15023');
INSERT INTO hla_dr VALUES (183, 'DRB1*1503', 'DRB1*1503');
INSERT INTO hla_dr VALUES (184, 'DRB1*1504', 'DRB1*1504');
INSERT INTO hla_dr VALUES (185, 'DRB1*1505', 'DRB1*1505');
INSERT INTO hla_dr VALUES (186, 'DRB1*1506', 'DRB1*1506');
INSERT INTO hla_dr VALUES (187, 'DRB1*16011', 'DRB1*16011');
INSERT INTO hla_dr VALUES (188, 'DRB1*16012', 'DRB1*16012');
INSERT INTO hla_dr VALUES (189, 'DRB1*16021', 'DRB1*16021');
INSERT INTO hla_dr VALUES (190, 'DRB1*16022', 'DRB1*16022');
INSERT INTO hla_dr VALUES (191, 'DRB1*1603', 'DRB1*1603');
INSERT INTO hla_dr VALUES (192, 'DRB1*1604', 'DRB1*1604');
INSERT INTO hla_dr VALUES (193, 'DRB1*1605', 'DRB1*1605');
INSERT INTO hla_dr VALUES (194, 'DRB1*1607', 'DRB1*1607');
INSERT INTO hla_dr VALUES (195, 'DRB1*1608', 'DRB1*1608');
INSERT INTO hla_dr VALUES (196, 'DRB1*1420', 'DRB1*1420');
INSERT INTO hla_dr VALUES (197, 'DRB1*1421', 'DRB1*1421');


--
-- Name: hla_dr_locus_dr_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('hla_dr_locus_dr_id_seq', 197, true);


--
-- Data for Name: hla_paciente; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO hla_paciente VALUES (1, '2014-07-07', '122dfd', 'A*0104N', 'A*0212', 'B*07021', 'B*07021', '﻿DRA*0101', '﻿DRA*0101');


--
-- Data for Name: migration; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO migration VALUES ('m000000_000000_base', 1406338357);
INSERT INTO migration VALUES ('m130524_201442_init', 1406338360);


--
-- Data for Name: municipios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO municipios VALUES (1, 1, 'LIBERTADOR');
INSERT INTO municipios VALUES (2, 2, 'AUTÓNOMO ALTO ORINOCO');
INSERT INTO municipios VALUES (3, 2, 'AUTÓNOMO ATABAPO');
INSERT INTO municipios VALUES (4, 2, 'AUTÓNOMO ATURES');
INSERT INTO municipios VALUES (5, 2, 'AUTÓNOMO AUTANA');
INSERT INTO municipios VALUES (6, 2, 'AUTÓNOMO MAROA');
INSERT INTO municipios VALUES (7, 2, 'AUTÓNOMO MANAPIARE');
INSERT INTO municipios VALUES (8, 2, 'AUTÓNOMO RIO NEGRO');
INSERT INTO municipios VALUES (9, 3, 'ANACO');
INSERT INTO municipios VALUES (10, 3, 'ARAGUA');
INSERT INTO municipios VALUES (11, 3, 'FERNANDO DE PEÑALVER');
INSERT INTO municipios VALUES (12, 3, 'FRANCISCO DEL CARMEN CARVAJAL');
INSERT INTO municipios VALUES (13, 3, 'FRANCISCO DE MIRANDA');
INSERT INTO municipios VALUES (14, 3, 'GUANTA');
INSERT INTO municipios VALUES (15, 3, 'INDEPENDENCIA');
INSERT INTO municipios VALUES (16, 3, 'JUAN ANTONIO SOTILLO');
INSERT INTO municipios VALUES (17, 3, 'JUAN MANUEL CAJIGAL');
INSERT INTO municipios VALUES (18, 3, 'JOSÉ GREGORIO MONAGAS');
INSERT INTO municipios VALUES (19, 3, 'LIBERTAD');
INSERT INTO municipios VALUES (20, 3, 'MANUEL EZEQUIEL BRUZUAL');
INSERT INTO municipios VALUES (21, 3, 'PEDRO MARÍA FREITES');
INSERT INTO municipios VALUES (22, 3, 'PÍRITU');
INSERT INTO municipios VALUES (23, 3, 'SAN JOSÉ DE GUANIPA');
INSERT INTO municipios VALUES (24, 3, 'SAN JUAN DE CAPISTRANO');
INSERT INTO municipios VALUES (25, 3, 'SANTA ANA');
INSERT INTO municipios VALUES (26, 3, 'SIMÓN BOLÍVAR');
INSERT INTO municipios VALUES (27, 3, 'SIMÓN RODRÍGUEZ');
INSERT INTO municipios VALUES (28, 3, 'SIR ARTUR MC GREGOR');
INSERT INTO municipios VALUES (29, 3, 'DIEGO BAUTISTA URBANEJA');
INSERT INTO municipios VALUES (30, 4, 'ACHAGUAS');
INSERT INTO municipios VALUES (31, 4, 'BIRUACA');
INSERT INTO municipios VALUES (32, 4, 'MUÑOZ');
INSERT INTO municipios VALUES (33, 4, 'PÁEZ');
INSERT INTO municipios VALUES (34, 4, 'PEDRO CAMEJO');
INSERT INTO municipios VALUES (35, 4, 'RÓMULO GALLEGOS');
INSERT INTO municipios VALUES (36, 4, 'SAN FERNANDO');
INSERT INTO municipios VALUES (37, 4, 'ALTO APURE');
INSERT INTO municipios VALUES (38, 5, 'BOLÍVAR');
INSERT INTO municipios VALUES (39, 5, 'CAMATAGUA');
INSERT INTO municipios VALUES (40, 5, 'GIRARDOT');
INSERT INTO municipios VALUES (41, 5, 'JOSÉ ANGEL LAMAS');
INSERT INTO municipios VALUES (42, 5, 'JOSÉ FÉLIX RIBAS');
INSERT INTO municipios VALUES (43, 5, 'JOSÉ RAFAEL REVENGA');
INSERT INTO municipios VALUES (44, 5, 'LIBERTADOR');
INSERT INTO municipios VALUES (45, 5, 'MARIO BRICEÑO IRAGORRY');
INSERT INTO municipios VALUES (46, 5, 'SAN CASIMIRO');
INSERT INTO municipios VALUES (47, 5, 'OCUMARE DE LA COSTA DE ORO');
INSERT INTO municipios VALUES (48, 5, 'SAN SEBASTIÁN');
INSERT INTO municipios VALUES (49, 5, 'SANTIAGO MARIÑO');
INSERT INTO municipios VALUES (50, 5, 'SANTOS MICHELENA');
INSERT INTO municipios VALUES (51, 5, 'SUCRE');
INSERT INTO municipios VALUES (52, 5, 'TOVAR');
INSERT INTO municipios VALUES (53, 5, 'URDANETA');
INSERT INTO municipios VALUES (54, 5, 'ZAMORA');
INSERT INTO municipios VALUES (55, 5, 'FRANCISCO LINARES ALCÁNTARA');
INSERT INTO municipios VALUES (56, 6, 'ALBERTO ARVELO TORREALBA');
INSERT INTO municipios VALUES (57, 6, 'ANTONIO JOSÉ DE SUCRE');
INSERT INTO municipios VALUES (58, 6, 'ARISMENDI');
INSERT INTO municipios VALUES (59, 6, 'BARINAS');
INSERT INTO municipios VALUES (60, 6, 'BOLÍVAR');
INSERT INTO municipios VALUES (61, 6, 'CRUZ PAREDES');
INSERT INTO municipios VALUES (62, 6, 'EZEQUIEL ZAMORA');
INSERT INTO municipios VALUES (63, 6, 'OBISPOS');
INSERT INTO municipios VALUES (64, 6, 'PEDRAZA');
INSERT INTO municipios VALUES (65, 6, 'ROJAS');
INSERT INTO municipios VALUES (66, 6, 'SOSA');
INSERT INTO municipios VALUES (67, 6, 'ANDRÉS ELOY BLANCO');
INSERT INTO municipios VALUES (68, 7, 'CARONÍ');
INSERT INTO municipios VALUES (69, 7, 'CEDEÑO');
INSERT INTO municipios VALUES (70, 7, 'EL CALLAO');
INSERT INTO municipios VALUES (71, 7, 'GRAN SABANA');
INSERT INTO municipios VALUES (72, 7, 'HERES');
INSERT INTO municipios VALUES (73, 7, 'PIAR');
INSERT INTO municipios VALUES (74, 7, 'RAÚL LEONI');
INSERT INTO municipios VALUES (75, 7, 'ROSCIO');
INSERT INTO municipios VALUES (76, 7, 'SIFONTES');
INSERT INTO municipios VALUES (77, 7, 'SUCRE');
INSERT INTO municipios VALUES (78, 7, 'PADRE PEDRO CHIEN');
INSERT INTO municipios VALUES (79, 8, 'BEJUMA');
INSERT INTO municipios VALUES (80, 8, 'CARLOS ARVELO');
INSERT INTO municipios VALUES (81, 8, 'DIEGO IBARRA');
INSERT INTO municipios VALUES (82, 8, 'GUACARA');
INSERT INTO municipios VALUES (83, 8, 'JUAN JOSÉ MORA');
INSERT INTO municipios VALUES (84, 8, 'LIBERTADOR');
INSERT INTO municipios VALUES (85, 8, 'LOS GUAYOS');
INSERT INTO municipios VALUES (86, 8, 'MIRANDA');
INSERT INTO municipios VALUES (87, 8, 'MONTALBÁN');
INSERT INTO municipios VALUES (88, 8, 'NAGUANAGUA');
INSERT INTO municipios VALUES (89, 8, 'PUERTO CABELLO');
INSERT INTO municipios VALUES (90, 8, 'SAN DIEGO');
INSERT INTO municipios VALUES (91, 8, 'SAN JOAQUÍN');
INSERT INTO municipios VALUES (92, 8, 'VALENCIA');
INSERT INTO municipios VALUES (93, 9, 'ANZOÁTEGUI');
INSERT INTO municipios VALUES (94, 9, 'FALCÓN');
INSERT INTO municipios VALUES (95, 9, 'GIRARDOT');
INSERT INTO municipios VALUES (96, 9, 'LIMA BLANCO');
INSERT INTO municipios VALUES (97, 9, 'PAO DE SAN JUAN BAUTISTA');
INSERT INTO municipios VALUES (98, 9, 'RICAURTE');
INSERT INTO municipios VALUES (99, 9, 'RÓMULO GALLEGOS');
INSERT INTO municipios VALUES (100, 9, 'SAN CARLOS');
INSERT INTO municipios VALUES (101, 9, 'TINACO');
INSERT INTO municipios VALUES (102, 10, 'ANTONIO DÍAZ');
INSERT INTO municipios VALUES (103, 10, 'CASACOIMA');
INSERT INTO municipios VALUES (104, 10, 'PEDERNALES');
INSERT INTO municipios VALUES (105, 10, 'TUCUPITA');
INSERT INTO municipios VALUES (106, 11, 'ACOSTA');
INSERT INTO municipios VALUES (107, 11, 'BOLÍVAR');
INSERT INTO municipios VALUES (108, 11, 'BUCHIVACOA');
INSERT INTO municipios VALUES (109, 11, 'CACIQUE MANAURE');
INSERT INTO municipios VALUES (110, 11, 'CARIRUBANA');
INSERT INTO municipios VALUES (111, 11, 'COLINA');
INSERT INTO municipios VALUES (112, 11, 'DABAJURO');
INSERT INTO municipios VALUES (113, 11, 'DEMOCRACIA');
INSERT INTO municipios VALUES (114, 11, 'FALCÓN');
INSERT INTO municipios VALUES (115, 11, 'FEDERACIÓN');
INSERT INTO municipios VALUES (116, 11, 'JACURA');
INSERT INTO municipios VALUES (117, 11, 'LOS TAQUES DE MAUROA');
INSERT INTO municipios VALUES (118, 11, 'MAUROA');
INSERT INTO municipios VALUES (119, 11, 'MIRANDA');
INSERT INTO municipios VALUES (120, 11, 'MONSEÑOR ITURRIZA');
INSERT INTO municipios VALUES (121, 11, 'PALMASOLA');
INSERT INTO municipios VALUES (122, 11, 'PETIT');
INSERT INTO municipios VALUES (123, 11, 'PÍRITU');
INSERT INTO municipios VALUES (124, 11, 'SAN FRANCISCO');
INSERT INTO municipios VALUES (125, 11, 'SILVA');
INSERT INTO municipios VALUES (126, 11, 'SUCRE');
INSERT INTO municipios VALUES (127, 11, 'TOCÓPERO');
INSERT INTO municipios VALUES (128, 11, 'UNIÓN');
INSERT INTO municipios VALUES (129, 11, 'URUMACO');
INSERT INTO municipios VALUES (130, 11, 'ZAMORA');
INSERT INTO municipios VALUES (131, 12, 'CAMAGUÁN');
INSERT INTO municipios VALUES (132, 12, 'CHAGUARAMAS');
INSERT INTO municipios VALUES (133, 12, 'EL SOCORRO');
INSERT INTO municipios VALUES (134, 12, 'SAN GERONIMO DE GUAYABAL');
INSERT INTO municipios VALUES (135, 12, 'LEONARDO INFANTE');
INSERT INTO municipios VALUES (136, 12, 'LAS MERCEDES');
INSERT INTO municipios VALUES (137, 12, 'JULIÁN MELLADO');
INSERT INTO municipios VALUES (138, 12, 'FRANCISCO DE MIRANDA');
INSERT INTO municipios VALUES (139, 12, 'JOSÉ TADEO MONAGAS');
INSERT INTO municipios VALUES (140, 12, 'ORTIZ');
INSERT INTO municipios VALUES (141, 12, 'JOSÉ FÉLIX RIBAS');
INSERT INTO municipios VALUES (142, 12, 'JUAN GERMÁN ROSCIO');
INSERT INTO municipios VALUES (143, 12, 'SAN JOSÉ DE GUARIBE');
INSERT INTO municipios VALUES (144, 12, 'SANTA MARÍA DE IPIRE');
INSERT INTO municipios VALUES (145, 12, 'PEDRO ZARAZA');
INSERT INTO municipios VALUES (146, 13, 'ANDRÉS ELOY BLANCO');
INSERT INTO municipios VALUES (147, 13, 'CRESPO');
INSERT INTO municipios VALUES (148, 13, 'IRIBARREN');
INSERT INTO municipios VALUES (149, 13, 'JIMÉNEZ');
INSERT INTO municipios VALUES (150, 13, 'MORÁN');
INSERT INTO municipios VALUES (151, 13, 'PALAVECINO');
INSERT INTO municipios VALUES (152, 13, 'SIMÓN PLANAS');
INSERT INTO municipios VALUES (153, 13, 'TORRES');
INSERT INTO municipios VALUES (154, 13, 'URDANETA');
INSERT INTO municipios VALUES (155, 14, 'ALBERTO ADRIANI');
INSERT INTO municipios VALUES (156, 14, 'ANDRÉS BELLO');
INSERT INTO municipios VALUES (157, 14, 'ANTONIO PINTO SALINAS');
INSERT INTO municipios VALUES (158, 14, 'ARICAGUA');
INSERT INTO municipios VALUES (159, 14, 'ARZOBISPO CHACÓN');
INSERT INTO municipios VALUES (160, 14, 'CAMPO ELÍAS');
INSERT INTO municipios VALUES (161, 14, 'CARACCIOLO PARRA OLMEDO');
INSERT INTO municipios VALUES (162, 14, 'CARDENAL QUINTERO');
INSERT INTO municipios VALUES (163, 14, 'GUARAQUE');
INSERT INTO municipios VALUES (164, 14, 'JULIO CÉSAR SALAS');
INSERT INTO municipios VALUES (165, 14, 'JUSTO BRICEÑO');
INSERT INTO municipios VALUES (166, 14, 'LIBERTADOR');
INSERT INTO municipios VALUES (167, 14, 'MIRANDA');
INSERT INTO municipios VALUES (168, 14, 'OBISPO RAMOS DE LORA');
INSERT INTO municipios VALUES (169, 14, 'PADRE NOGUERA');
INSERT INTO municipios VALUES (170, 14, 'PUEBLO LLANO');
INSERT INTO municipios VALUES (171, 14, 'RANGEL');
INSERT INTO municipios VALUES (172, 14, 'RIVAS DÁVILA');
INSERT INTO municipios VALUES (173, 14, 'SANTOS MARQUINA');
INSERT INTO municipios VALUES (174, 14, 'SUCRE');
INSERT INTO municipios VALUES (175, 14, 'TOVAR');
INSERT INTO municipios VALUES (176, 14, 'TULIO FEBRES CORDERO');
INSERT INTO municipios VALUES (177, 14, 'ZEA');
INSERT INTO municipios VALUES (178, 15, 'ACEVEDO');
INSERT INTO municipios VALUES (179, 15, 'ANDRÉS BELLO');
INSERT INTO municipios VALUES (180, 15, 'BARUTA');
INSERT INTO municipios VALUES (181, 15, 'BRIÓN');
INSERT INTO municipios VALUES (182, 15, 'BUROZ');
INSERT INTO municipios VALUES (183, 15, 'CARRIZAL');
INSERT INTO municipios VALUES (184, 15, 'CHACAO');
INSERT INTO municipios VALUES (185, 15, 'CRISTÓBAL ROJAS');
INSERT INTO municipios VALUES (186, 15, 'EL HATILLO');
INSERT INTO municipios VALUES (187, 15, 'GUAICAIPURO');
INSERT INTO municipios VALUES (188, 15, 'INDEPENDENCIA');
INSERT INTO municipios VALUES (189, 15, 'LANDER');
INSERT INTO municipios VALUES (190, 15, 'LOS SALIAS');
INSERT INTO municipios VALUES (191, 15, 'PÁEZ');
INSERT INTO municipios VALUES (192, 15, 'PAZ CASTILLO');
INSERT INTO municipios VALUES (193, 15, 'PEDRO GUAL');
INSERT INTO municipios VALUES (194, 15, 'PLAZA');
INSERT INTO municipios VALUES (195, 15, 'SIMÓN BOLÍVAR');
INSERT INTO municipios VALUES (196, 15, 'SUCRE');
INSERT INTO municipios VALUES (197, 15, 'URDANETA');
INSERT INTO municipios VALUES (198, 15, 'ZAMORA');
INSERT INTO municipios VALUES (199, 16, 'ACOSTA');
INSERT INTO municipios VALUES (200, 16, 'AGUASAY');
INSERT INTO municipios VALUES (201, 16, 'BOLÍVAR');
INSERT INTO municipios VALUES (202, 16, 'CARIPE');
INSERT INTO municipios VALUES (203, 16, 'CEDEÑO');
INSERT INTO municipios VALUES (204, 16, 'EZEQUIEL ZAMORA');
INSERT INTO municipios VALUES (205, 16, 'LIBERTADOR');
INSERT INTO municipios VALUES (206, 16, 'MATURÍN');
INSERT INTO municipios VALUES (207, 16, 'PIAR');
INSERT INTO municipios VALUES (208, 16, 'PUNCERES');
INSERT INTO municipios VALUES (209, 16, 'SANTA BÁRBARA');
INSERT INTO municipios VALUES (210, 16, 'SOTILLO');
INSERT INTO municipios VALUES (211, 16, 'URACOA');
INSERT INTO municipios VALUES (212, 17, 'ANTOLIN DEL CAMPO');
INSERT INTO municipios VALUES (213, 17, 'ARISMENDI');
INSERT INTO municipios VALUES (214, 17, 'DIAZ');
INSERT INTO municipios VALUES (215, 17, 'GARCÍA');
INSERT INTO municipios VALUES (216, 17, 'GÓMEZ');
INSERT INTO municipios VALUES (217, 17, 'MANEIRO');
INSERT INTO municipios VALUES (218, 17, 'MARCANO');
INSERT INTO municipios VALUES (219, 17, 'MARIÑO');
INSERT INTO municipios VALUES (220, 17, 'PENÍNSULA DE MACANAO');
INSERT INTO municipios VALUES (221, 17, 'TUBORES');
INSERT INTO municipios VALUES (222, 17, 'VILLALBA');
INSERT INTO municipios VALUES (223, 18, 'AGUA BLANCA');
INSERT INTO municipios VALUES (224, 18, 'ARAURE');
INSERT INTO municipios VALUES (225, 18, 'ESTELLER');
INSERT INTO municipios VALUES (226, 18, 'GUANARE');
INSERT INTO municipios VALUES (227, 18, 'GUANARITO');
INSERT INTO municipios VALUES (228, 18, 'MONSEÑOR JOSE VICENTE DE UNDA');
INSERT INTO municipios VALUES (229, 18, 'OSPINO');
INSERT INTO municipios VALUES (230, 18, 'PÁEZ');
INSERT INTO municipios VALUES (231, 18, 'PAPELÓN');
INSERT INTO municipios VALUES (232, 18, 'SAN GENARO DE BOCONOITO');
INSERT INTO municipios VALUES (233, 18, 'SAN RAFAEL DE ONOTO');
INSERT INTO municipios VALUES (234, 18, 'SANTA ROSALÍA');
INSERT INTO municipios VALUES (235, 18, 'SUCRE');
INSERT INTO municipios VALUES (236, 18, 'TURÉN');
INSERT INTO municipios VALUES (237, 19, 'ANDRÉS ELOY BLANCO');
INSERT INTO municipios VALUES (238, 19, 'ANDRÉS MATA');
INSERT INTO municipios VALUES (239, 19, 'ARISMENDI');
INSERT INTO municipios VALUES (240, 19, 'BENÍTEZ');
INSERT INTO municipios VALUES (241, 19, 'BERMÚDEZ');
INSERT INTO municipios VALUES (242, 19, 'BOLÍVAR');
INSERT INTO municipios VALUES (243, 19, 'CAGIGAL');
INSERT INTO municipios VALUES (244, 19, 'CRUZ SALMERÓN ACOSTA');
INSERT INTO municipios VALUES (245, 19, 'LIBERTADOR');
INSERT INTO municipios VALUES (246, 19, 'MARIÑO');
INSERT INTO municipios VALUES (247, 19, 'MEJÍA');
INSERT INTO municipios VALUES (248, 19, 'MONTES');
INSERT INTO municipios VALUES (249, 19, 'RIBERO');
INSERT INTO municipios VALUES (250, 19, 'SUCRE');
INSERT INTO municipios VALUES (251, 19, 'VALDÉZ');
INSERT INTO municipios VALUES (252, 20, 'ANDRÉS BELLO');
INSERT INTO municipios VALUES (253, 20, 'ANTONIO RÓMULO COSTA');
INSERT INTO municipios VALUES (254, 20, 'AYACUCHO');
INSERT INTO municipios VALUES (255, 20, 'BOLÍVAR');
INSERT INTO municipios VALUES (256, 20, 'CÁRDENAS');
INSERT INTO municipios VALUES (257, 20, 'CORDOBA');
INSERT INTO municipios VALUES (258, 20, 'FERNÁNDEZ FEO');
INSERT INTO municipios VALUES (259, 20, 'FRANCISCO DE MIRANDA');
INSERT INTO municipios VALUES (260, 20, 'GARCÍA DE HEVIA');
INSERT INTO municipios VALUES (261, 20, 'GUÁSIMOS');
INSERT INTO municipios VALUES (262, 20, 'INDEPENDENCIA');
INSERT INTO municipios VALUES (263, 20, 'JÁUREGUI');
INSERT INTO municipios VALUES (264, 20, 'JOSÉ MARÍA VARGAS');
INSERT INTO municipios VALUES (265, 20, 'JUNÍN');
INSERT INTO municipios VALUES (266, 20, 'LIBERTAD');
INSERT INTO municipios VALUES (267, 20, 'LIBERTADOR');
INSERT INTO municipios VALUES (268, 20, 'LOBATERA');
INSERT INTO municipios VALUES (269, 20, 'MICHELENA');
INSERT INTO municipios VALUES (270, 20, 'PANAMERICANO');
INSERT INTO municipios VALUES (271, 20, 'PEDRO MARÍA UREÑA');
INSERT INTO municipios VALUES (272, 20, 'RAFAEL URDANETA');
INSERT INTO municipios VALUES (273, 20, 'SAMUEL DARÍO MALDONADO');
INSERT INTO municipios VALUES (274, 20, 'SAN CRISTÓBAL');
INSERT INTO municipios VALUES (275, 20, 'SEBORUCO');
INSERT INTO municipios VALUES (276, 20, 'SIMÓN RODRÍGUEZ');
INSERT INTO municipios VALUES (277, 20, 'SUCRE');
INSERT INTO municipios VALUES (278, 20, 'TORBES');
INSERT INTO municipios VALUES (279, 20, 'URIBANTE');
INSERT INTO municipios VALUES (280, 20, 'SAN JUDAS TADEO');
INSERT INTO municipios VALUES (281, 21, 'ANDRÉS BELLO');
INSERT INTO municipios VALUES (282, 21, 'BOCONÓ');
INSERT INTO municipios VALUES (283, 21, 'BOLÍVAR');
INSERT INTO municipios VALUES (284, 21, 'CANDELARIA');
INSERT INTO municipios VALUES (285, 21, 'CARACHE');
INSERT INTO municipios VALUES (286, 21, 'ESCUQUE');
INSERT INTO municipios VALUES (287, 21, 'JOSÉ FÉLIPE MÁRQUEZ CAÑIZALES');
INSERT INTO municipios VALUES (288, 21, 'JUAN VICENTE CAMPO ELÍAS');
INSERT INTO municipios VALUES (289, 21, 'LA CEIBA');
INSERT INTO municipios VALUES (290, 21, 'MIRANDA');
INSERT INTO municipios VALUES (291, 21, 'MONTE CARMELO');
INSERT INTO municipios VALUES (292, 21, 'MOTATÁN');
INSERT INTO municipios VALUES (293, 21, 'PAMPÁN');
INSERT INTO municipios VALUES (294, 21, 'PAMPANITO');
INSERT INTO municipios VALUES (295, 21, 'RAFAEL RANGEL');
INSERT INTO municipios VALUES (296, 21, 'SAN RAFAEL DE CARVAJAL');
INSERT INTO municipios VALUES (297, 21, 'SUCRE');
INSERT INTO municipios VALUES (298, 21, 'TRUJILLO');
INSERT INTO municipios VALUES (299, 21, 'URDANETA');
INSERT INTO municipios VALUES (300, 21, 'VALERA');
INSERT INTO municipios VALUES (301, 22, 'ARÍSTIDES BASTIDAS');
INSERT INTO municipios VALUES (302, 22, 'BOLÍVAR');
INSERT INTO municipios VALUES (303, 22, 'BRUZUAL');
INSERT INTO municipios VALUES (304, 22, 'COCOROTE');
INSERT INTO municipios VALUES (305, 22, 'INDEPENDENCIA');
INSERT INTO municipios VALUES (306, 22, 'JOSÉ ANTONIO PÁEZ');
INSERT INTO municipios VALUES (307, 22, 'LA TRINIDAD');
INSERT INTO municipios VALUES (308, 22, 'MANUEL MONGE');
INSERT INTO municipios VALUES (309, 22, 'NIRGUA');
INSERT INTO municipios VALUES (310, 22, 'PEÑA');
INSERT INTO municipios VALUES (311, 22, 'SAN FELIPE');
INSERT INTO municipios VALUES (312, 22, 'SUCRE');
INSERT INTO municipios VALUES (313, 22, 'URACHICHE');
INSERT INTO municipios VALUES (314, 22, 'VEROES');
INSERT INTO municipios VALUES (315, 23, 'ALMIRANTE PADILLA');
INSERT INTO municipios VALUES (316, 23, 'BARALT');
INSERT INTO municipios VALUES (317, 23, 'CABIMAS');
INSERT INTO municipios VALUES (318, 23, 'CATATUMBO');
INSERT INTO municipios VALUES (319, 23, 'COLÓN');
INSERT INTO municipios VALUES (320, 23, 'FRANCISCO JAVIER PULGAR');
INSERT INTO municipios VALUES (321, 23, 'JESÚS ENRIQUE LOSSADA');
INSERT INTO municipios VALUES (322, 23, 'JESÚS MARÍA SEMPRUN');
INSERT INTO municipios VALUES (323, 23, 'LA CAÑADA DE URDANETA');
INSERT INTO municipios VALUES (324, 23, 'LAGUNILLAS');
INSERT INTO municipios VALUES (325, 23, 'MACHIQUES DE PERIJÁ');
INSERT INTO municipios VALUES (326, 23, 'MARA');
INSERT INTO municipios VALUES (327, 23, 'MARACAIBO');
INSERT INTO municipios VALUES (328, 23, 'MIRANDA');
INSERT INTO municipios VALUES (329, 23, 'PÁEZ');
INSERT INTO municipios VALUES (330, 23, 'ROSARIO DE PERIJÁ');
INSERT INTO municipios VALUES (331, 23, 'SAN FRANCISCO');
INSERT INTO municipios VALUES (332, 23, 'SANTA RITA');
INSERT INTO municipios VALUES (333, 23, 'SIMÓN BOLÍVAR');
INSERT INTO municipios VALUES (334, 23, 'SUCRE');
INSERT INTO municipios VALUES (335, 23, 'VALMORE RODRÍGUEZ');
INSERT INTO municipios VALUES (336, 24, 'VARGAS');


--
-- Data for Name: nacionalidad; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO nacionalidad VALUES ('V', 'Venezolano');
INSERT INTO nacionalidad VALUES ('E', 'Extranjero');

--
-- Name: pacientes_paciente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pacientes_paciente_id_seq', 1, true);


--
-- Data for Name: parroquias; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO parroquias VALUES (1, 1, 'ALTAGRACIA');
INSERT INTO parroquias VALUES (2, 1, 'ANTÍMANO');
INSERT INTO parroquias VALUES (3, 1, 'CANDELARIA');
INSERT INTO parroquias VALUES (4, 1, 'CARICUAO');
INSERT INTO parroquias VALUES (5, 1, 'CATEDRAL');
INSERT INTO parroquias VALUES (6, 1, 'COCHE');
INSERT INTO parroquias VALUES (7, 1, 'EL JUNQUITO');
INSERT INTO parroquias VALUES (8, 1, 'EL PARAÍSO');
INSERT INTO parroquias VALUES (9, 1, 'EL RECREO');
INSERT INTO parroquias VALUES (10, 1, 'EL VALLE');
INSERT INTO parroquias VALUES (11, 1, 'LA PASTORA');
INSERT INTO parroquias VALUES (12, 1, 'LA VEGA');
INSERT INTO parroquias VALUES (13, 1, 'MACARAO');
INSERT INTO parroquias VALUES (14, 1, 'SAN AGUSTÍN');
INSERT INTO parroquias VALUES (15, 1, 'SAN BERNARDINO');
INSERT INTO parroquias VALUES (16, 1, 'SAN JOSÉ');
INSERT INTO parroquias VALUES (17, 1, 'SAN JUAN');
INSERT INTO parroquias VALUES (18, 1, 'SAN PEDRO');
INSERT INTO parroquias VALUES (19, 1, 'SANTA ROSALÍA');
INSERT INTO parroquias VALUES (20, 1, 'SANTA TERESA');
INSERT INTO parroquias VALUES (21, 1, 'SUCRE');
INSERT INTO parroquias VALUES (22, 1, '23 DE ENERO');
INSERT INTO parroquias VALUES (23, 2, 'HUACHAMACARE');
INSERT INTO parroquias VALUES (24, 2, 'MARAWAKA');
INSERT INTO parroquias VALUES (25, 2, 'MAVACA');
INSERT INTO parroquias VALUES (26, 2, 'SIERRA PARIMA');
INSERT INTO parroquias VALUES (27, 3, 'UCATA');
INSERT INTO parroquias VALUES (28, 3, 'YAPACANA');
INSERT INTO parroquias VALUES (29, 3, 'CANAME');
INSERT INTO parroquias VALUES (30, 4, 'FERNANDO GIRÓN TOVAR');
INSERT INTO parroquias VALUES (31, 4, 'LUIS ALBERTO GÓMEZ');
INSERT INTO parroquias VALUES (32, 4, 'PARHUEÑA');
INSERT INTO parroquias VALUES (33, 4, 'PLATANILLAL');
INSERT INTO parroquias VALUES (34, 5, 'SAMARIAPO');
INSERT INTO parroquias VALUES (35, 5, 'SIPAPO');
INSERT INTO parroquias VALUES (36, 5, 'MUNDUAPO');
INSERT INTO parroquias VALUES (37, 5, 'GUAYAPO');
INSERT INTO parroquias VALUES (38, 6, 'VICTORINO');
INSERT INTO parroquias VALUES (39, 6, 'COMUNIDAD');
INSERT INTO parroquias VALUES (40, 7, 'ALTO VENTUARI');
INSERT INTO parroquias VALUES (41, 7, 'MEDIO VENTUARI');
INSERT INTO parroquias VALUES (42, 7, 'BAJO VENTUARI');
INSERT INTO parroquias VALUES (43, 8, 'SOLANO');
INSERT INTO parroquias VALUES (44, 8, 'CASIQUIARE');
INSERT INTO parroquias VALUES (45, 8, 'COCUY');
INSERT INTO parroquias VALUES (46, 9, 'ANACO');
INSERT INTO parroquias VALUES (47, 9, 'SAN JOAQUÍN');
INSERT INTO parroquias VALUES (48, 10, 'CACHIPO');
INSERT INTO parroquias VALUES (49, 11, 'SAN MIGUEL');
INSERT INTO parroquias VALUES (50, 11, 'SUCRE');
INSERT INTO parroquias VALUES (51, 12, 'VALLE DE GUANAPE');
INSERT INTO parroquias VALUES (52, 12, 'SANTA BÁRBARA');
INSERT INTO parroquias VALUES (53, 13, 'ATAPIRIRE');
INSERT INTO parroquias VALUES (54, 13, 'BOCA DEL PAO');
INSERT INTO parroquias VALUES (55, 13, 'EL PAO');
INSERT INTO parroquias VALUES (56, 13, 'MÚCURA');
INSERT INTO parroquias VALUES (57, 14, 'GUANTA');
INSERT INTO parroquias VALUES (58, 14, 'CHORRERÓN');
INSERT INTO parroquias VALUES (59, 15, 'MAMO');
INSERT INTO parroquias VALUES (60, 16, 'PUERTO LA CRUZ');
INSERT INTO parroquias VALUES (61, 16, 'POZUELOS');
INSERT INTO parroquias VALUES (62, 17, 'ONOTO');
INSERT INTO parroquias VALUES (63, 17, 'SAN PABLO');
INSERT INTO parroquias VALUES (64, 18, 'PIAR');
INSERT INTO parroquias VALUES (65, 18, 'SAN DIEGO DE CABRUTICA');
INSERT INTO parroquias VALUES (66, 18, 'SANTA CLARA');
INSERT INTO parroquias VALUES (67, 18, 'UVERITO');
INSERT INTO parroquias VALUES (68, 18, 'ZUATA');
INSERT INTO parroquias VALUES (69, 19, 'EL CARITO');
INSERT INTO parroquias VALUES (70, 19, 'SANTA INÉS');
INSERT INTO parroquias VALUES (71, 20, 'CLARINES');
INSERT INTO parroquias VALUES (72, 20, 'GUANAPE');
INSERT INTO parroquias VALUES (73, 20, 'SABANA DE UCHIRE');
INSERT INTO parroquias VALUES (74, 21, 'LIBERTADOR');
INSERT INTO parroquias VALUES (75, 21, 'SANTA ROSA');
INSERT INTO parroquias VALUES (76, 21, 'URICA');
INSERT INTO parroquias VALUES (77, 22, 'PÍRITU');
INSERT INTO parroquias VALUES (78, 22, 'SAN FRANCISCO');
INSERT INTO parroquias VALUES (79, 24, 'BOCA DE UCHIRE');
INSERT INTO parroquias VALUES (80, 24, 'BOCA DE CHÁVEZ');
INSERT INTO parroquias VALUES (81, 25, 'SANTA ANA');
INSERT INTO parroquias VALUES (82, 25, 'PUEBLO NUEVO');
INSERT INTO parroquias VALUES (83, 26, 'EL CARMEN');
INSERT INTO parroquias VALUES (84, 26, 'SAN CRISTÓBAL');
INSERT INTO parroquias VALUES (85, 26, 'BERGANTÍN');
INSERT INTO parroquias VALUES (86, 26, 'CAIGUA');
INSERT INTO parroquias VALUES (87, 26, 'EL PILAR');
INSERT INTO parroquias VALUES (88, 26, 'NARICUAL');
INSERT INTO parroquias VALUES (89, 27, 'EDMUNDO BARRIOS');
INSERT INTO parroquias VALUES (90, 27, 'MIGUEL OTERO SILVA');
INSERT INTO parroquias VALUES (91, 28, 'EL CHAPARRO');
INSERT INTO parroquias VALUES (92, 28, 'TOMÁS ALFARO CALATRAVA');
INSERT INTO parroquias VALUES (93, 29, 'LECHERÍAS');
INSERT INTO parroquias VALUES (94, 29, 'EL MORRO');
INSERT INTO parroquias VALUES (95, 30, 'URBANA ACHAGUAS');
INSERT INTO parroquias VALUES (96, 30, 'APURITO');
INSERT INTO parroquias VALUES (97, 30, 'EL YAGUAL');
INSERT INTO parroquias VALUES (98, 30, 'GUACHARA');
INSERT INTO parroquias VALUES (99, 30, 'MUCURITAS');
INSERT INTO parroquias VALUES (100, 30, 'QUESERAS DEL MEDIO');
INSERT INTO parroquias VALUES (101, 31, 'URBANA BIRUACA');
INSERT INTO parroquias VALUES (102, 32, 'URBANA BRUZUAL');
INSERT INTO parroquias VALUES (103, 32, 'MANTECAL');
INSERT INTO parroquias VALUES (104, 32, 'QUINTERO');
INSERT INTO parroquias VALUES (105, 32, 'RINCÓN HONDO');
INSERT INTO parroquias VALUES (106, 32, 'SAN VICENTE');
INSERT INTO parroquias VALUES (107, 33, 'URBANA GUASDUALITO');
INSERT INTO parroquias VALUES (108, 33, 'ARAMENDI');
INSERT INTO parroquias VALUES (109, 33, 'EL AMPARO');
INSERT INTO parroquias VALUES (110, 33, 'SAN CAMILO');
INSERT INTO parroquias VALUES (111, 33, 'URDANETA');
INSERT INTO parroquias VALUES (112, 34, 'URBANA SAN JUAN DE PAYARA');
INSERT INTO parroquias VALUES (113, 34, 'CODAZZI');
INSERT INTO parroquias VALUES (114, 34, 'CUNAVICHE');
INSERT INTO parroquias VALUES (115, 35, 'URBANA ELORZA');
INSERT INTO parroquias VALUES (116, 35, 'LA TRINIDAD');
INSERT INTO parroquias VALUES (117, 36, 'URBANA SAN FERNANDO');
INSERT INTO parroquias VALUES (118, 36, 'EL RECREO');
INSERT INTO parroquias VALUES (119, 36, 'PEÑALVER');
INSERT INTO parroquias VALUES (120, 36, 'SAN RAFAEL DE ATAMAICA');
INSERT INTO parroquias VALUES (121, 39, 'NO URBANA CARMEN DE CURA');
INSERT INTO parroquias VALUES (122, 40, 'NO URBANA CHORONÍ');
INSERT INTO parroquias VALUES (123, 40, 'URBANA LAS DELICIAS');
INSERT INTO parroquias VALUES (124, 40, 'URBANA MADRE MARÍA DE SAN JOSÉ');
INSERT INTO parroquias VALUES (125, 40, 'URBANA JOAQUÍN CRESPO');
INSERT INTO parroquias VALUES (126, 40, 'URBANA PEDRO JOSÉ OVALLES');
INSERT INTO parroquias VALUES (127, 40, 'URBANA JOSÉ CASANOVA GODOY');
INSERT INTO parroquias VALUES (128, 40, 'URBANA ANDRÉS ELOY BLANCO');
INSERT INTO parroquias VALUES (129, 40, 'URBANA LOS TACARIGUAS');
INSERT INTO parroquias VALUES (130, 42, 'URBANA CASTOR NIEVES RÍOS');
INSERT INTO parroquias VALUES (131, 42, 'NO URBANA LAS GUACAMAYAS');
INSERT INTO parroquias VALUES (132, 42, 'NO URBANA PAO DE ZÁRATE');
INSERT INTO parroquias VALUES (133, 42, 'NO URBANA ZUATA');
INSERT INTO parroquias VALUES (134, 44, 'NO URBANA SAN MARTÍN DE PORRES');
INSERT INTO parroquias VALUES (135, 45, 'URBANA CAÑA DE AZÚCAR');
INSERT INTO parroquias VALUES (136, 46, 'NO URBANA GÜIRIPA');
INSERT INTO parroquias VALUES (137, 46, 'NO URBANA OLLAS DE CARAMACATE');
INSERT INTO parroquias VALUES (138, 46, 'NO URBANA VALLE MORÍN');
INSERT INTO parroquias VALUES (139, 49, 'NO URBANA ARÉVALO APONTE');
INSERT INTO parroquias VALUES (140, 49, 'NO URBANA CHUAO');
INSERT INTO parroquias VALUES (141, 49, 'NO URBANA SAMÁN DE GÜERE');
INSERT INTO parroquias VALUES (142, 49, 'NO URBANA ALFREDO PACHECO MIRANDA');
INSERT INTO parroquias VALUES (143, 50, 'NO URBANA TIARA');
INSERT INTO parroquias VALUES (144, 51, 'NO URBANA BELLA VISTA');
INSERT INTO parroquias VALUES (145, 53, 'NO URBANA LAS PEÑITAS');
INSERT INTO parroquias VALUES (146, 53, 'NO URBANA SAN FRANCISCO DE CARA');
INSERT INTO parroquias VALUES (147, 53, 'NO URBANA TAGUAY');
INSERT INTO parroquias VALUES (148, 54, 'NO URBANA MAGDALENO');
INSERT INTO parroquias VALUES (149, 54, 'NO URBANA SAN FRANCISCO DE ASÍS');
INSERT INTO parroquias VALUES (150, 54, 'NO URBANA VALLES DE TUCUTUNEMO');
INSERT INTO parroquias VALUES (151, 54, 'NO URBANA AUGUSTO MIJARES');
INSERT INTO parroquias VALUES (152, 55, 'NO URBANA FRANCISCO DE MIRANDA');
INSERT INTO parroquias VALUES (153, 55, 'NO URBANA MONSEÑOR FELICIANO GONZÁLEZ');
INSERT INTO parroquias VALUES (154, 56, 'SABANETA');
INSERT INTO parroquias VALUES (155, 56, 'RODRÍGUEZ DOMÍNGUEZ');
INSERT INTO parroquias VALUES (156, 57, 'TICOPORO');
INSERT INTO parroquias VALUES (157, 57, 'ANDRÉS BELLO');
INSERT INTO parroquias VALUES (158, 57, 'NICOLÁS PULIDO');
INSERT INTO parroquias VALUES (159, 58, 'ARISMENDI');
INSERT INTO parroquias VALUES (160, 58, 'GUADARRAMA');
INSERT INTO parroquias VALUES (161, 58, 'LA UNIÓN');
INSERT INTO parroquias VALUES (162, 58, 'SAN ANTONIO');
INSERT INTO parroquias VALUES (163, 59, 'BARINAS');
INSERT INTO parroquias VALUES (164, 59, 'ALFREDO ARVELO LARRIVA');
INSERT INTO parroquias VALUES (165, 59, 'SAN SILVESTRE');
INSERT INTO parroquias VALUES (166, 59, 'SANTA INÉS');
INSERT INTO parroquias VALUES (167, 59, 'SANTA LUCÍA');
INSERT INTO parroquias VALUES (168, 59, 'TORUNOS');
INSERT INTO parroquias VALUES (169, 59, 'EL CARMEN');
INSERT INTO parroquias VALUES (170, 59, 'RÓMULO BETANCOURT');
INSERT INTO parroquias VALUES (171, 59, 'CORAZÓN DE JESÚS');
INSERT INTO parroquias VALUES (172, 59, 'RAMÓN IGNACIO MÉNDEZ');
INSERT INTO parroquias VALUES (173, 59, 'ALTO BARINAS');
INSERT INTO parroquias VALUES (174, 59, 'MANUEL PALACIO FAJARDO');
INSERT INTO parroquias VALUES (175, 59, 'JUAN ANTONIO RODRÍGUEZ DOMÍNGUEZ');
INSERT INTO parroquias VALUES (176, 59, 'DOMINGA ORTIZ DE PÁEZ');
INSERT INTO parroquias VALUES (177, 60, 'BARINITAS');
INSERT INTO parroquias VALUES (178, 60, 'ALTAMIRA');
INSERT INTO parroquias VALUES (179, 60, 'CALDERAS');
INSERT INTO parroquias VALUES (180, 61, 'BARRANCAS');
INSERT INTO parroquias VALUES (181, 61, 'EL SOCORRO');
INSERT INTO parroquias VALUES (182, 61, 'MASPARRITO');
INSERT INTO parroquias VALUES (183, 62, 'SANTA BÁRBARA');
INSERT INTO parroquias VALUES (184, 62, 'JOSÉ IGNACIO DEL PUMAR');
INSERT INTO parroquias VALUES (185, 62, 'PEDRO BRICEÑO MÉNDEZ');
INSERT INTO parroquias VALUES (186, 62, 'RAMÓN IGNACIO MÉNDEZ');
INSERT INTO parroquias VALUES (187, 63, 'OBISPOS');
INSERT INTO parroquias VALUES (188, 63, 'EL REAL');
INSERT INTO parroquias VALUES (189, 63, 'LA LUZ');
INSERT INTO parroquias VALUES (190, 63, 'LOS GUASIMITOS');
INSERT INTO parroquias VALUES (191, 64, 'CIUDAD BOLIVIA');
INSERT INTO parroquias VALUES (192, 64, 'IGNACIO BRICEÑO');
INSERT INTO parroquias VALUES (193, 64, 'JOSÉ FÉLIX RIBAS');
INSERT INTO parroquias VALUES (194, 64, 'PÁEZ');
INSERT INTO parroquias VALUES (195, 65, 'LIBERTAD');
INSERT INTO parroquias VALUES (196, 65, 'DOLORES');
INSERT INTO parroquias VALUES (197, 65, 'PALACIOS FAJARDO');
INSERT INTO parroquias VALUES (198, 65, 'SANTA ROSA');
INSERT INTO parroquias VALUES (199, 66, 'CIUDAD DE NUTRIAS');
INSERT INTO parroquias VALUES (200, 66, 'EL REGALO');
INSERT INTO parroquias VALUES (201, 66, 'PUERTO DE NUTRIAS');
INSERT INTO parroquias VALUES (202, 66, 'SANTA CATALINA');
INSERT INTO parroquias VALUES (203, 67, 'EL CANTÓN');
INSERT INTO parroquias VALUES (204, 67, 'SANTA CRUZ DE GUACAS');
INSERT INTO parroquias VALUES (205, 67, 'PUERTO VIVAS');
INSERT INTO parroquias VALUES (206, 68, 'CACHAMAY');
INSERT INTO parroquias VALUES (207, 68, 'CHIRICA');
INSERT INTO parroquias VALUES (208, 68, 'DALLA COSTA');
INSERT INTO parroquias VALUES (209, 68, 'ONCE DE ABRIL');
INSERT INTO parroquias VALUES (210, 68, 'SIMÓN BOLÍVAR');
INSERT INTO parroquias VALUES (211, 68, 'UNARE');
INSERT INTO parroquias VALUES (212, 68, 'UNIVERSIDAD');
INSERT INTO parroquias VALUES (213, 68, 'VISTA AL SOL');
INSERT INTO parroquias VALUES (214, 68, 'POZO VERDE');
INSERT INTO parroquias VALUES (215, 68, 'YOCOIMA');
INSERT INTO parroquias VALUES (216, 69, 'ALTAGRACIA');
INSERT INTO parroquias VALUES (217, 69, 'ASCENSIÓN FARRERAS');
INSERT INTO parroquias VALUES (218, 69, 'GUANIAMO');
INSERT INTO parroquias VALUES (219, 69, 'LA URBANA');
INSERT INTO parroquias VALUES (220, 69, 'PIJIGUAOS');
INSERT INTO parroquias VALUES (221, 71, 'IKABARÚ');
INSERT INTO parroquias VALUES (222, 72, 'AGUA SALADA');
INSERT INTO parroquias VALUES (223, 72, 'CATEDRAL');
INSERT INTO parroquias VALUES (224, 72, 'JOSÉ ANTONIO PÁEZ');
INSERT INTO parroquias VALUES (225, 72, 'LA SABANITA');
INSERT INTO parroquias VALUES (226, 72, 'MARHUANTA');
INSERT INTO parroquias VALUES (227, 72, 'VISTA HERMOSA');
INSERT INTO parroquias VALUES (228, 72, 'ORINOCO');
INSERT INTO parroquias VALUES (229, 72, 'PANAPANA');
INSERT INTO parroquias VALUES (230, 72, 'ZEA');
INSERT INTO parroquias VALUES (231, 73, 'ANDRÉS ELOY BLANCO');
INSERT INTO parroquias VALUES (232, 73, 'PEDRO COVA');
INSERT INTO parroquias VALUES (233, 74, 'BARCELONETA');
INSERT INTO parroquias VALUES (234, 74, 'SAN FRANCISCO');
INSERT INTO parroquias VALUES (235, 74, 'SANTA BÁRBARA');
INSERT INTO parroquias VALUES (236, 75, 'SALOM');
INSERT INTO parroquias VALUES (237, 76, 'DALLA COSTA');
INSERT INTO parroquias VALUES (238, 76, 'SAN ISIDRO');
INSERT INTO parroquias VALUES (239, 77, 'ARIPAO');
INSERT INTO parroquias VALUES (240, 77, 'GUARATARO');
INSERT INTO parroquias VALUES (241, 77, 'LAS MAJADAS');
INSERT INTO parroquias VALUES (242, 77, 'MOITACO');
INSERT INTO parroquias VALUES (243, 79, 'URBANA BEJUMA');
INSERT INTO parroquias VALUES (244, 79, 'NO URBANA CANOABO');
INSERT INTO parroquias VALUES (245, 79, 'NO URBANA SIMÓN BOLÍVAR');
INSERT INTO parroquias VALUES (246, 80, 'URBANA GÜIGÜE');
INSERT INTO parroquias VALUES (247, 80, 'NO URBANA BELÉN');
INSERT INTO parroquias VALUES (248, 80, 'NO URBANA TACARIGUA');
INSERT INTO parroquias VALUES (249, 81, 'URBANA AGUAS CALIENTES');
INSERT INTO parroquias VALUES (250, 81, 'URBANA MARIARA');
INSERT INTO parroquias VALUES (251, 82, 'URBANA CIUDAD ALIANZA');
INSERT INTO parroquias VALUES (252, 82, 'URBANA GUACARA');
INSERT INTO parroquias VALUES (253, 82, 'NO URBANA YAGUA');
INSERT INTO parroquias VALUES (254, 83, 'URBANA MORÓN');
INSERT INTO parroquias VALUES (255, 83, 'NO URBANA URAMA');
INSERT INTO parroquias VALUES (256, 84, 'URBANA TOCUYITO');
INSERT INTO parroquias VALUES (257, 84, 'URBANA INDEPENDENCIA');
INSERT INTO parroquias VALUES (258, 85, 'URBANA LOS GUAYOS');
INSERT INTO parroquias VALUES (259, 86, 'URBANA MIRANDA');
INSERT INTO parroquias VALUES (260, 87, 'URBANA MONTALBÁN');
INSERT INTO parroquias VALUES (261, 88, 'URBANA NAGUANAGUA');
INSERT INTO parroquias VALUES (262, 89, 'URBANA BARTOLOMÉ SALOM');
INSERT INTO parroquias VALUES (263, 89, 'URBANA DEMOCRACIA');
INSERT INTO parroquias VALUES (264, 89, 'URBANA FRATERNIDAD');
INSERT INTO parroquias VALUES (265, 89, 'URBANA GOAIGOAZA');
INSERT INTO parroquias VALUES (266, 89, 'URBANA JUAN JOSÉ FLORES');
INSERT INTO parroquias VALUES (267, 89, 'URBANA UNIÓN');
INSERT INTO parroquias VALUES (268, 89, 'NO URBANA BORBURATA');
INSERT INTO parroquias VALUES (269, 89, 'NO URBANA PATANEMO');
INSERT INTO parroquias VALUES (270, 90, 'URBANA SAN DIEGO');
INSERT INTO parroquias VALUES (271, 91, 'URBANA SAN JOAQUÍN');
INSERT INTO parroquias VALUES (272, 92, 'URBANA CANDELARIA');
INSERT INTO parroquias VALUES (273, 92, 'URBANA CATEDRAL');
INSERT INTO parroquias VALUES (274, 92, 'URBANA EL SOCORRO');
INSERT INTO parroquias VALUES (275, 92, 'URBANA MIGUEL PEÑA');
INSERT INTO parroquias VALUES (276, 92, 'URBANA RAFAEL URDANETA');
INSERT INTO parroquias VALUES (277, 92, 'URBANA SAN BLAS');
INSERT INTO parroquias VALUES (278, 92, 'URBANA SAN JOSÉ');
INSERT INTO parroquias VALUES (279, 92, 'URBANA SANTA ROSA');
INSERT INTO parroquias VALUES (280, 92, 'NO URBANA NEGRO PRIMERO');
INSERT INTO parroquias VALUES (281, 93, 'COJEDES');
INSERT INTO parroquias VALUES (282, 93, 'JUAN DE MATA SUÁREZ');
INSERT INTO parroquias VALUES (283, 94, 'TINAQUILLO');
INSERT INTO parroquias VALUES (284, 95, 'EL BAÚL');
INSERT INTO parroquias VALUES (285, 95, 'SUCRE');
INSERT INTO parroquias VALUES (286, 96, 'MACAPO');
INSERT INTO parroquias VALUES (287, 96, 'LA AGUADITA');
INSERT INTO parroquias VALUES (288, 97, 'EL PAO');
INSERT INTO parroquias VALUES (289, 98, 'LIBERTAD DE COJEDES');
INSERT INTO parroquias VALUES (290, 98, 'EL AMPARO');
INSERT INTO parroquias VALUES (291, 99, 'RÓMULO GALLEGOS');
INSERT INTO parroquias VALUES (292, 100, 'SAN CARLOS DE AUSTRIA');
INSERT INTO parroquias VALUES (293, 100, 'JUAN ANGEL BRAVO');
INSERT INTO parroquias VALUES (294, 100, 'MANUEL MANRIQUE');
INSERT INTO parroquias VALUES (295, 101, 'GENERAL EN JEFE JOSÉ LAURENCIO SILVA');
INSERT INTO parroquias VALUES (296, 102, 'CURIAPO');
INSERT INTO parroquias VALUES (297, 102, 'ALMIRANTE LUIS BRIÓN');
INSERT INTO parroquias VALUES (298, 102, 'FRANCISCO ANICETO LUGO');
INSERT INTO parroquias VALUES (299, 102, 'MANUEL RENAUD');
INSERT INTO parroquias VALUES (300, 102, 'PADRE BARRAL');
INSERT INTO parroquias VALUES (301, 102, 'SANTOS DE ABELGAS');
INSERT INTO parroquias VALUES (302, 103, 'IMATACA');
INSERT INTO parroquias VALUES (303, 103, 'CINCO DE JULIO');
INSERT INTO parroquias VALUES (304, 103, 'JUAN BAUTISTA ARISMENDI');
INSERT INTO parroquias VALUES (305, 103, 'MANUEL PIAR');
INSERT INTO parroquias VALUES (306, 103, 'RÓMULO GALLEGOS');
INSERT INTO parroquias VALUES (307, 104, 'PEDERNALES');
INSERT INTO parroquias VALUES (308, 104, 'LUIS BELTRÁN PRIETO FIGUEROA');
INSERT INTO parroquias VALUES (309, 105, 'SAN JOSÉ');
INSERT INTO parroquias VALUES (310, 105, 'JOSÉ VIDAL MARCANO');
INSERT INTO parroquias VALUES (311, 105, 'JUAN MILLÁN');
INSERT INTO parroquias VALUES (312, 105, 'LEONARDO RUÍZ PINEDA');
INSERT INTO parroquias VALUES (313, 105, 'MARISCAL ANTONIO JOSÉ DE SUCRE');
INSERT INTO parroquias VALUES (314, 105, 'MONSEÑOR ARGIMIRO GARCÍA');
INSERT INTO parroquias VALUES (315, 105, 'SAN RAFAEL');
INSERT INTO parroquias VALUES (316, 105, 'VIRGEN DEL VALLE');
INSERT INTO parroquias VALUES (317, 106, 'SAN JUAN DE LOS CAYOS');
INSERT INTO parroquias VALUES (318, 106, 'CAPADARE');
INSERT INTO parroquias VALUES (319, 106, 'LA PASTORA');
INSERT INTO parroquias VALUES (320, 106, 'LIBERTADOR');
INSERT INTO parroquias VALUES (321, 107, 'SAN LUIS');
INSERT INTO parroquias VALUES (322, 107, 'ARACUA');
INSERT INTO parroquias VALUES (323, 107, 'LA PEÑA');
INSERT INTO parroquias VALUES (324, 108, 'CAPATÁRIDA');
INSERT INTO parroquias VALUES (325, 108, 'BARIRO');
INSERT INTO parroquias VALUES (326, 108, 'BOROJÓ');
INSERT INTO parroquias VALUES (327, 108, 'GUAJIRO');
INSERT INTO parroquias VALUES (328, 108, 'SEQUE');
INSERT INTO parroquias VALUES (329, 108, 'ZAZÁRIDA');
INSERT INTO parroquias VALUES (330, 110, 'CARIRUBANA');
INSERT INTO parroquias VALUES (331, 110, 'NORTE');
INSERT INTO parroquias VALUES (332, 110, 'PUNTA CARDÓN');
INSERT INTO parroquias VALUES (333, 110, 'SANTA ANA');
INSERT INTO parroquias VALUES (334, 111, 'LA VELA DE CORO');
INSERT INTO parroquias VALUES (335, 111, 'ACURIGUA');
INSERT INTO parroquias VALUES (336, 111, 'GUAIBACOA');
INSERT INTO parroquias VALUES (337, 111, 'LAS CALDERAS');
INSERT INTO parroquias VALUES (338, 111, 'MACORUCA');
INSERT INTO parroquias VALUES (339, 113, 'PEDREGAL');
INSERT INTO parroquias VALUES (340, 113, 'AGUA CLARA');
INSERT INTO parroquias VALUES (341, 113, 'AVARIA');
INSERT INTO parroquias VALUES (342, 113, 'PIEDRA GRANDE');
INSERT INTO parroquias VALUES (343, 113, 'PURURECHE');
INSERT INTO parroquias VALUES (344, 114, 'PUEBLO NUEVO');
INSERT INTO parroquias VALUES (345, 114, 'ADÍCORA');
INSERT INTO parroquias VALUES (346, 114, 'BARAIVED');
INSERT INTO parroquias VALUES (347, 114, 'BUENA VISTA');
INSERT INTO parroquias VALUES (348, 114, 'JADACAQUIVA');
INSERT INTO parroquias VALUES (349, 114, 'MORUY');
INSERT INTO parroquias VALUES (350, 114, 'ADAURE');
INSERT INTO parroquias VALUES (351, 114, 'EL HATO');
INSERT INTO parroquias VALUES (352, 114, 'EL VÍNCULO');
INSERT INTO parroquias VALUES (353, 115, 'CHURUGUARA');
INSERT INTO parroquias VALUES (354, 115, 'AGUA LARGA');
INSERT INTO parroquias VALUES (355, 115, 'PAUJÍ');
INSERT INTO parroquias VALUES (356, 115, 'INDEPENDENCIA');
INSERT INTO parroquias VALUES (357, 115, 'MAPARARÍ');
INSERT INTO parroquias VALUES (358, 116, 'JACURA');
INSERT INTO parroquias VALUES (359, 116, 'AGUA LINDA');
INSERT INTO parroquias VALUES (360, 116, 'ARAURIMA');
INSERT INTO parroquias VALUES (361, 117, 'LOS TAQUES');
INSERT INTO parroquias VALUES (362, 117, 'JUDIBANA');
INSERT INTO parroquias VALUES (363, 118, 'MENE DE MAUROA');
INSERT INTO parroquias VALUES (364, 118, 'CASIGUA');
INSERT INTO parroquias VALUES (365, 118, 'SAN FÉLIX');
INSERT INTO parroquias VALUES (366, 119, 'SAN ANTONIO');
INSERT INTO parroquias VALUES (367, 119, 'SAN GABRIEL');
INSERT INTO parroquias VALUES (368, 119, 'SANTA ANA');
INSERT INTO parroquias VALUES (369, 119, 'GUZMÁN GUILLERMO');
INSERT INTO parroquias VALUES (370, 119, 'MITARE');
INSERT INTO parroquias VALUES (371, 119, 'RÍO SECO');
INSERT INTO parroquias VALUES (372, 119, 'SABANETA');
INSERT INTO parroquias VALUES (373, 120, 'CHICHIRIVICHE');
INSERT INTO parroquias VALUES (374, 120, 'BOCA DE TOCUYO');
INSERT INTO parroquias VALUES (375, 120, 'TOCUYO DE LA COSTA');
INSERT INTO parroquias VALUES (376, 122, 'CABURE');
INSERT INTO parroquias VALUES (377, 122, 'COLINA');
INSERT INTO parroquias VALUES (378, 122, 'CURIMAGUA');
INSERT INTO parroquias VALUES (379, 123, 'PÍRITU');
INSERT INTO parroquias VALUES (380, 123, 'SAN JOSÉ DE LA COSTA');
INSERT INTO parroquias VALUES (381, 125, 'TUCACAS');
INSERT INTO parroquias VALUES (382, 125, 'BOCA DE AROA');
INSERT INTO parroquias VALUES (383, 126, 'SUCRE');
INSERT INTO parroquias VALUES (384, 126, 'PECAYA');
INSERT INTO parroquias VALUES (385, 128, 'SANTA CRUZ DE BUCARAL');
INSERT INTO parroquias VALUES (386, 128, 'EL CHARAL');
INSERT INTO parroquias VALUES (387, 128, 'LAS VEGAS DEL TUY');
INSERT INTO parroquias VALUES (388, 129, 'URUMACO');
INSERT INTO parroquias VALUES (389, 129, 'BRUZUAL');
INSERT INTO parroquias VALUES (390, 130, 'PUERTO CUMAREBO');
INSERT INTO parroquias VALUES (391, 130, 'LA CIÉNAGA');
INSERT INTO parroquias VALUES (392, 130, 'LA SOLEDAD');
INSERT INTO parroquias VALUES (393, 130, 'PUEBLO CUMAREBO');
INSERT INTO parroquias VALUES (394, 130, 'ZAZÁRIDA');
INSERT INTO parroquias VALUES (395, 131, 'CAMAGUÁN');
INSERT INTO parroquias VALUES (396, 131, 'PUERTO MIRANDA');
INSERT INTO parroquias VALUES (397, 131, 'UVERITO');
INSERT INTO parroquias VALUES (398, 132, 'CHAGUARAMAS');
INSERT INTO parroquias VALUES (399, 133, 'EL SOCORRO');
INSERT INTO parroquias VALUES (400, 134, 'CAZORLA');
INSERT INTO parroquias VALUES (401, 135, 'VALLE DE LA PASCUA');
INSERT INTO parroquias VALUES (402, 135, 'ESPINO');
INSERT INTO parroquias VALUES (403, 136, 'LAS MERCEDES');
INSERT INTO parroquias VALUES (404, 136, 'CABRUTA');
INSERT INTO parroquias VALUES (405, 136, 'SANTA RITA DE MANAPIRE');
INSERT INTO parroquias VALUES (406, 137, 'EL SOMBRERO');
INSERT INTO parroquias VALUES (407, 137, 'SOSA');
INSERT INTO parroquias VALUES (408, 138, 'CALABOZO');
INSERT INTO parroquias VALUES (409, 138, 'EL CALVARIO');
INSERT INTO parroquias VALUES (410, 138, 'EL RASTRO');
INSERT INTO parroquias VALUES (411, 138, 'GUARDATINAJAS');
INSERT INTO parroquias VALUES (412, 139, 'ALTAGRACIA DE ORITUCO');
INSERT INTO parroquias VALUES (413, 139, 'LEZAMA');
INSERT INTO parroquias VALUES (414, 139, 'LIBERTAD DE ORITUCO');
INSERT INTO parroquias VALUES (415, 139, 'PASO REAL DE MACAIRA');
INSERT INTO parroquias VALUES (416, 139, 'SAN FRANCISCO DE MACAIRA');
INSERT INTO parroquias VALUES (417, 139, 'SAN RAFAEL DE ORITUCO');
INSERT INTO parroquias VALUES (418, 139, 'SOUBLETTE');
INSERT INTO parroquias VALUES (419, 140, 'ORTIZ');
INSERT INTO parroquias VALUES (420, 140, 'SAN FRANCISCO DE TIZNADOS');
INSERT INTO parroquias VALUES (421, 140, 'SAN JOSÉ DE TIZNADOS');
INSERT INTO parroquias VALUES (422, 140, 'SAN LORENZO DE TIZNADOS');
INSERT INTO parroquias VALUES (423, 141, 'TUCUPIDO');
INSERT INTO parroquias VALUES (424, 141, 'SAN RAFAEL DE LAYA');
INSERT INTO parroquias VALUES (425, 142, 'SAN JUAN DE LOS MORROS');
INSERT INTO parroquias VALUES (426, 142, 'CANTAGALLO');
INSERT INTO parroquias VALUES (427, 142, 'PARAPARA');
INSERT INTO parroquias VALUES (428, 143, 'SAN JOSÉ DE GUARIBE');
INSERT INTO parroquias VALUES (429, 144, 'SANTA MARÍA DE IPIRE');
INSERT INTO parroquias VALUES (430, 144, 'ALTAMIRA');
INSERT INTO parroquias VALUES (431, 145, 'ZARAZA');
INSERT INTO parroquias VALUES (432, 145, 'SAN JOSÉ DE UNARE');
INSERT INTO parroquias VALUES (433, 146, 'PÍO TAMAYO');
INSERT INTO parroquias VALUES (434, 146, 'QUEBRADA HONDA DE GUACHE');
INSERT INTO parroquias VALUES (435, 146, 'YACAMBÚ');
INSERT INTO parroquias VALUES (436, 147, 'FRÉITEZ');
INSERT INTO parroquias VALUES (437, 147, 'JOSÉ MARÍA BLANCO');
INSERT INTO parroquias VALUES (438, 148, 'CATEDRAL');
INSERT INTO parroquias VALUES (439, 148, 'CONCEPCIÓN');
INSERT INTO parroquias VALUES (440, 148, 'EL CUJÍ');
INSERT INTO parroquias VALUES (441, 148, 'JUAN DE VILLEGAS');
INSERT INTO parroquias VALUES (442, 148, 'SANTA ROSA');
INSERT INTO parroquias VALUES (443, 148, 'TAMACA');
INSERT INTO parroquias VALUES (444, 148, 'UNIÓN');
INSERT INTO parroquias VALUES (445, 148, 'AGUEDO FELIPE ALVARADO');
INSERT INTO parroquias VALUES (446, 148, 'BUENA VISTA');
INSERT INTO parroquias VALUES (447, 148, 'JUÁREZ');
INSERT INTO parroquias VALUES (448, 149, 'JUAN BAUTISTA RODRÍGUEZ');
INSERT INTO parroquias VALUES (449, 149, 'CUARA');
INSERT INTO parroquias VALUES (450, 149, 'DIEGO DE LOZADA');
INSERT INTO parroquias VALUES (451, 149, 'PARAÍSO DE SAN JOSÉ');
INSERT INTO parroquias VALUES (452, 149, 'SAN MIGUEL');
INSERT INTO parroquias VALUES (453, 149, 'TINTORERO');
INSERT INTO parroquias VALUES (454, 149, 'JOSÉ BERNARDO DORANTE');
INSERT INTO parroquias VALUES (455, 149, 'CORONEL MARIANO PERAZA');
INSERT INTO parroquias VALUES (456, 150, 'BOLÍVAR');
INSERT INTO parroquias VALUES (457, 150, 'ANZOÁTEGUI');
INSERT INTO parroquias VALUES (458, 150, 'GUARICO');
INSERT INTO parroquias VALUES (459, 150, 'HILARIO LUNA Y LUNA');
INSERT INTO parroquias VALUES (460, 150, 'HUMOCARO ALTO');
INSERT INTO parroquias VALUES (461, 150, 'HUMOCARO BAJO');
INSERT INTO parroquias VALUES (462, 150, 'LA CANDELARIA');
INSERT INTO parroquias VALUES (463, 150, 'MORÁN');
INSERT INTO parroquias VALUES (464, 151, 'CABUDARE');
INSERT INTO parroquias VALUES (465, 151, 'JOSÉ GREGORIO BASTIDAS');
INSERT INTO parroquias VALUES (466, 151, 'AGUA VIVA');
INSERT INTO parroquias VALUES (467, 152, 'SARARE');
INSERT INTO parroquias VALUES (468, 152, 'BURÍA');
INSERT INTO parroquias VALUES (469, 152, 'GUSTAVO VEGAS LEÓN');
INSERT INTO parroquias VALUES (470, 153, 'TRINIDAD SAMUEL');
INSERT INTO parroquias VALUES (471, 153, 'ANTONIO DÍAZ');
INSERT INTO parroquias VALUES (472, 153, 'CAMACARO');
INSERT INTO parroquias VALUES (473, 153, 'CASTAÑEDA');
INSERT INTO parroquias VALUES (474, 153, 'CECILIO ZUBILLAGA');
INSERT INTO parroquias VALUES (475, 153, 'CHIQUINQUIRÁ');
INSERT INTO parroquias VALUES (476, 153, 'EL BLANCO');
INSERT INTO parroquias VALUES (477, 153, 'ESPINOZA DE LOS MONTEROS');
INSERT INTO parroquias VALUES (478, 153, 'LARA');
INSERT INTO parroquias VALUES (479, 153, 'LAS MERCEDES');
INSERT INTO parroquias VALUES (480, 153, 'MANUEL MORILLO');
INSERT INTO parroquias VALUES (481, 153, 'MONTAÑA VERDE');
INSERT INTO parroquias VALUES (482, 153, 'MONTES DE OCA');
INSERT INTO parroquias VALUES (483, 153, 'TORRES');
INSERT INTO parroquias VALUES (484, 153, 'HERIBERTO ARROYO');
INSERT INTO parroquias VALUES (485, 153, 'REYES VARGAS');
INSERT INTO parroquias VALUES (486, 153, 'ALTAGRACIA');
INSERT INTO parroquias VALUES (487, 154, 'SIQUISIQUE');
INSERT INTO parroquias VALUES (488, 154, 'MOROTURO');
INSERT INTO parroquias VALUES (489, 154, 'SAN MIGUEL');
INSERT INTO parroquias VALUES (490, 154, 'XAGUAS');
INSERT INTO parroquias VALUES (491, 155, 'PRESIDENTE BETANCOURT');
INSERT INTO parroquias VALUES (492, 155, 'PRESIDENTE PÁEZ');
INSERT INTO parroquias VALUES (493, 155, 'PRESIDENTE RÓMULO GALLEGOS');
INSERT INTO parroquias VALUES (494, 155, 'GABRIEL PICÓN GONZÁLEZ');
INSERT INTO parroquias VALUES (495, 155, 'HÉCTOR AMABLE MORA');
INSERT INTO parroquias VALUES (496, 155, 'JOSÉ NUCETE SARDI');
INSERT INTO parroquias VALUES (497, 155, 'PULIDO MÉNDEZ');
INSERT INTO parroquias VALUES (498, 157, 'MESA BOLÍVAR');
INSERT INTO parroquias VALUES (499, 157, 'MESA DE LAS PALMAS');
INSERT INTO parroquias VALUES (500, 158, 'SAN ANTONIO');
INSERT INTO parroquias VALUES (501, 159, 'CAPURÍ');
INSERT INTO parroquias VALUES (502, 159, 'CHACANTÁ');
INSERT INTO parroquias VALUES (503, 159, 'EL MOLINO');
INSERT INTO parroquias VALUES (504, 159, 'GUAIMARAL');
INSERT INTO parroquias VALUES (505, 159, 'MUCUTUY');
INSERT INTO parroquias VALUES (506, 159, 'MUCUCHACHÍ');
INSERT INTO parroquias VALUES (507, 160, 'FERNÁNDEZ PEÑA');
INSERT INTO parroquias VALUES (508, 160, 'MATRIZ');
INSERT INTO parroquias VALUES (509, 160, 'MONTALBÁN');
INSERT INTO parroquias VALUES (510, 160, 'ACEQUIAS');
INSERT INTO parroquias VALUES (511, 160, 'JAJÍ');
INSERT INTO parroquias VALUES (512, 160, 'LA MESA');
INSERT INTO parroquias VALUES (513, 160, 'SAN JOSÉ DEL SUR');
INSERT INTO parroquias VALUES (514, 161, 'FLORENCIO RAMÍREZ');
INSERT INTO parroquias VALUES (515, 162, 'LAS PIEDRAS');
INSERT INTO parroquias VALUES (516, 163, 'MESA DE QUINTERO');
INSERT INTO parroquias VALUES (517, 163, 'RÍO NEGRO');
INSERT INTO parroquias VALUES (518, 164, 'PALMIRA');
INSERT INTO parroquias VALUES (519, 165, 'SAN CRISTÓBAL DE TORONDOY');
INSERT INTO parroquias VALUES (520, 166, 'ANTONIO SPINETTI DINI');
INSERT INTO parroquias VALUES (521, 166, 'ARIAS');
INSERT INTO parroquias VALUES (522, 166, 'CARACCIOLO PARRA PÉREZ');
INSERT INTO parroquias VALUES (523, 166, 'DOMINGO PEÑA');
INSERT INTO parroquias VALUES (524, 166, 'EL LLANO');
INSERT INTO parroquias VALUES (525, 166, 'GONZALO PICÓN FEBRES');
INSERT INTO parroquias VALUES (526, 166, 'JACINTO PLAZA');
INSERT INTO parroquias VALUES (527, 166, 'JUAN RODRÍGUEZ SUÁREZ');
INSERT INTO parroquias VALUES (528, 166, 'LASSO DE LA VEGA');
INSERT INTO parroquias VALUES (529, 166, 'MARIANO PICÓN SALAS');
INSERT INTO parroquias VALUES (530, 166, 'MILLA');
INSERT INTO parroquias VALUES (531, 166, 'OSUNA RODRÍGUEZ');
INSERT INTO parroquias VALUES (532, 166, 'SAGRARIO');
INSERT INTO parroquias VALUES (533, 166, 'EL MORRO');
INSERT INTO parroquias VALUES (534, 166, 'LOS NEVADOS');
INSERT INTO parroquias VALUES (535, 167, 'ANDRÉS ELOY BLANCO');
INSERT INTO parroquias VALUES (536, 167, 'LA VENTA');
INSERT INTO parroquias VALUES (537, 167, 'PIÑANGO');
INSERT INTO parroquias VALUES (538, 168, 'ELOY PAREDES');
INSERT INTO parroquias VALUES (539, 168, 'SAN RAFAEL DE ALCÁZAR');
INSERT INTO parroquias VALUES (540, 171, 'CACUTE');
INSERT INTO parroquias VALUES (541, 171, 'LA TOMA');
INSERT INTO parroquias VALUES (542, 171, 'MUCURUBÁ');
INSERT INTO parroquias VALUES (543, 171, 'SAN RAFAEL');
INSERT INTO parroquias VALUES (544, 172, 'GERÓNIMO MALDONADO');
INSERT INTO parroquias VALUES (545, 174, 'CHIGUARÁ');
INSERT INTO parroquias VALUES (546, 174, 'ESTÁNQUES');
INSERT INTO parroquias VALUES (547, 174, 'LA TRAMPA');
INSERT INTO parroquias VALUES (548, 174, 'PUEBLO NUEVO DEL SUR');
INSERT INTO parroquias VALUES (549, 174, 'SAN JUAN');
INSERT INTO parroquias VALUES (550, 175, 'EL AMPARO');
INSERT INTO parroquias VALUES (551, 175, 'EL LLANO');
INSERT INTO parroquias VALUES (552, 175, 'SAN FRANCISCO');
INSERT INTO parroquias VALUES (553, 175, 'TOVAR');
INSERT INTO parroquias VALUES (554, 176, 'INDEPENDENCIA');
INSERT INTO parroquias VALUES (555, 176, 'MARÍA DE LA CONCEPCIÓN PALACIOS BLANCO');
INSERT INTO parroquias VALUES (556, 176, 'SANTA APOLONIA');
INSERT INTO parroquias VALUES (557, 177, 'CAÑO EL TIGRE');
INSERT INTO parroquias VALUES (558, 178, 'CAUCAGUA');
INSERT INTO parroquias VALUES (559, 178, 'ARAGÜITA');
INSERT INTO parroquias VALUES (560, 178, 'ARÉVALO GONZÁLEZ');
INSERT INTO parroquias VALUES (561, 178, 'CAPAYA');
INSERT INTO parroquias VALUES (562, 178, 'EL CAFÉ');
INSERT INTO parroquias VALUES (563, 178, 'MARIZAPA');
INSERT INTO parroquias VALUES (564, 178, 'PANAQUIRE');
INSERT INTO parroquias VALUES (565, 178, 'RIBAS');
INSERT INTO parroquias VALUES (566, 179, 'SAN JOSÉ DE BARLOVENTO');
INSERT INTO parroquias VALUES (567, 179, 'CUMBO');
INSERT INTO parroquias VALUES (568, 180, 'BARUTA');
INSERT INTO parroquias VALUES (569, 180, 'EL CAFETAL');
INSERT INTO parroquias VALUES (570, 180, 'LAS MINAS DE BARUTA');
INSERT INTO parroquias VALUES (571, 181, 'HIGUEROTE');
INSERT INTO parroquias VALUES (572, 181, 'CURIEPE');
INSERT INTO parroquias VALUES (573, 181, 'TACARIGUA');
INSERT INTO parroquias VALUES (574, 182, 'MAMPORAL');
INSERT INTO parroquias VALUES (575, 183, 'CARRIZAL');
INSERT INTO parroquias VALUES (576, 184, 'CHACAO');
INSERT INTO parroquias VALUES (577, 185, 'CHARALLAVE');
INSERT INTO parroquias VALUES (578, 185, 'LAS BRISAS');
INSERT INTO parroquias VALUES (579, 186, 'EL HATILLO');
INSERT INTO parroquias VALUES (580, 187, 'LOS TEQUES');
INSERT INTO parroquias VALUES (581, 187, 'ALTAGRACIA DE LA MONTAÑA');
INSERT INTO parroquias VALUES (582, 187, 'CECILIO ACOSTA');
INSERT INTO parroquias VALUES (583, 187, 'EL JARILLO');
INSERT INTO parroquias VALUES (584, 187, 'PARACOTOS');
INSERT INTO parroquias VALUES (585, 187, 'SAN PEDRO');
INSERT INTO parroquias VALUES (586, 187, 'TÁCATA');
INSERT INTO parroquias VALUES (587, 188, 'SANTA TERESA DEL TUY');
INSERT INTO parroquias VALUES (588, 188, 'EL CARTANAL');
INSERT INTO parroquias VALUES (589, 189, 'OCUMARE DEL TUY');
INSERT INTO parroquias VALUES (590, 189, 'LA DEMOCRACIA');
INSERT INTO parroquias VALUES (591, 189, 'SANTA BÁRBARA');
INSERT INTO parroquias VALUES (592, 190, 'SAN ANTONIO DE LOS ALTOS');
INSERT INTO parroquias VALUES (593, 191, 'RÍO CHICO');
INSERT INTO parroquias VALUES (594, 191, 'EL GUAPO');
INSERT INTO parroquias VALUES (595, 191, 'TACARIGUA DE LA LAGUNA');
INSERT INTO parroquias VALUES (596, 191, 'PAPARO');
INSERT INTO parroquias VALUES (597, 191, 'SAN FERNANDO DEL GUAPO');
INSERT INTO parroquias VALUES (598, 192, 'SANTA LUCÍA');
INSERT INTO parroquias VALUES (599, 193, 'CÚPIRA');
INSERT INTO parroquias VALUES (600, 193, 'MACHURUCUTO');
INSERT INTO parroquias VALUES (601, 194, 'GUARENAS');
INSERT INTO parroquias VALUES (602, 195, 'SAN FRANCISCO DE YARE');
INSERT INTO parroquias VALUES (603, 195, 'SAN ANTONIO DE YARE');
INSERT INTO parroquias VALUES (604, 196, 'PETARE');
INSERT INTO parroquias VALUES (605, 196, 'CAUCAGÜITA');
INSERT INTO parroquias VALUES (606, 196, 'FILA DE MARICHES');
INSERT INTO parroquias VALUES (607, 196, 'LA DOLORITA');
INSERT INTO parroquias VALUES (608, 196, 'LEONCIO MARTÍNEZ');
INSERT INTO parroquias VALUES (609, 197, 'CÚA');
INSERT INTO parroquias VALUES (610, 197, 'NUEVA CÚA');
INSERT INTO parroquias VALUES (611, 198, 'GUATIRE');
INSERT INTO parroquias VALUES (612, 198, 'BOLÍVAR');
INSERT INTO parroquias VALUES (613, 199, 'SAN FRANCISCO');
INSERT INTO parroquias VALUES (614, 202, 'EL GUÁCHARO');
INSERT INTO parroquias VALUES (615, 202, 'LA GUANOTA');
INSERT INTO parroquias VALUES (616, 202, 'SABANA DE PIEDRA');
INSERT INTO parroquias VALUES (617, 202, 'SAN AGUSTÍN');
INSERT INTO parroquias VALUES (618, 202, 'TERESÉN');
INSERT INTO parroquias VALUES (619, 203, 'AREO');
INSERT INTO parroquias VALUES (620, 203, 'SAN FÉLIX');
INSERT INTO parroquias VALUES (621, 203, 'VIENTO FRESCO');
INSERT INTO parroquias VALUES (622, 204, 'EL TEJERO');
INSERT INTO parroquias VALUES (623, 205, 'CHAGUARAMAS');
INSERT INTO parroquias VALUES (624, 205, 'LAS ALHUACAS');
INSERT INTO parroquias VALUES (625, 205, 'TABASCA');
INSERT INTO parroquias VALUES (626, 206, 'ALTO DE LOS GODOS');
INSERT INTO parroquias VALUES (627, 206, 'BOQUERÓN');
INSERT INTO parroquias VALUES (628, 206, 'LAS COCUIZAS');
INSERT INTO parroquias VALUES (629, 206, 'SAN SIMÓN');
INSERT INTO parroquias VALUES (630, 206, 'SANTA CRUZ');
INSERT INTO parroquias VALUES (631, 206, 'EL COROZO');
INSERT INTO parroquias VALUES (632, 206, 'EL FURRIAL');
INSERT INTO parroquias VALUES (633, 206, 'JUSEPÍN');
INSERT INTO parroquias VALUES (634, 206, 'LA PICA');
INSERT INTO parroquias VALUES (635, 206, 'SAN VICENTE');
INSERT INTO parroquias VALUES (636, 207, 'APARICIO');
INSERT INTO parroquias VALUES (637, 207, 'CHAGUARAMAL');
INSERT INTO parroquias VALUES (638, 207, 'EL PINTO');
INSERT INTO parroquias VALUES (639, 207, 'GUANAGUANA');
INSERT INTO parroquias VALUES (640, 207, 'LA TOSCANA');
INSERT INTO parroquias VALUES (641, 207, 'TAGUAYA');
INSERT INTO parroquias VALUES (642, 208, 'CACHIPO');
INSERT INTO parroquias VALUES (643, 210, 'LOS BARRANCOS DE FAJARDO');
INSERT INTO parroquias VALUES (644, 214, 'ZABALA');
INSERT INTO parroquias VALUES (645, 215, 'FRANCISCO FAJARDO');
INSERT INTO parroquias VALUES (646, 216, 'BOLÍVAR');
INSERT INTO parroquias VALUES (647, 216, 'GUEVARA');
INSERT INTO parroquias VALUES (648, 216, 'MATASIETE');
INSERT INTO parroquias VALUES (649, 216, 'SUCRE');
INSERT INTO parroquias VALUES (650, 217, 'AGUIRRE');
INSERT INTO parroquias VALUES (651, 218, 'ADRIÁN');
INSERT INTO parroquias VALUES (652, 220, 'SAN FRANCISCO');
INSERT INTO parroquias VALUES (653, 221, 'LOS BARALES');
INSERT INTO parroquias VALUES (654, 222, 'VICENTE FUENTES');
INSERT INTO parroquias VALUES (655, 224, 'RÍO ACARIGUA');
INSERT INTO parroquias VALUES (656, 225, 'UVERAL');
INSERT INTO parroquias VALUES (657, 226, 'CÓRDOBA');
INSERT INTO parroquias VALUES (658, 226, 'SAN JOSÉ DE LA MONTAÑA');
INSERT INTO parroquias VALUES (659, 226, 'SAN JUAN DE GUANAGUANARE');
INSERT INTO parroquias VALUES (660, 226, 'VIRGEN DE LA COROMOTO');
INSERT INTO parroquias VALUES (661, 227, 'TRINIDAD DE LA CAPILLA');
INSERT INTO parroquias VALUES (662, 227, 'DIVINA PASTORA');
INSERT INTO parroquias VALUES (663, 228, 'PEÑA BLANCA');
INSERT INTO parroquias VALUES (664, 229, 'LA APARICIÓN');
INSERT INTO parroquias VALUES (665, 229, 'LA ESTACIÓN');
INSERT INTO parroquias VALUES (666, 230, 'PAYARA');
INSERT INTO parroquias VALUES (667, 230, 'PIMPINELA');
INSERT INTO parroquias VALUES (668, 230, 'RAMÓN PERAZA');
INSERT INTO parroquias VALUES (669, 231, 'CAÑO DELGADITO');
INSERT INTO parroquias VALUES (670, 232, 'ANTOLÍN TOVAR');
INSERT INTO parroquias VALUES (671, 233, 'SANTA FE');
INSERT INTO parroquias VALUES (672, 233, 'THERMO MORLES');
INSERT INTO parroquias VALUES (673, 234, 'FLORIDA');
INSERT INTO parroquias VALUES (674, 235, 'CONCEPCIÓN');
INSERT INTO parroquias VALUES (675, 235, 'SAN RAFAEL DE PALO ALZADO');
INSERT INTO parroquias VALUES (676, 235, 'UVENCIO ANTONIO VELÁSQUEZ');
INSERT INTO parroquias VALUES (677, 235, 'SAN JOSÉ DE SAGUAZ');
INSERT INTO parroquias VALUES (678, 235, 'VILLA ROSA');
INSERT INTO parroquias VALUES (679, 236, 'CANELONES');
INSERT INTO parroquias VALUES (680, 236, 'SANTA CRUZ');
INSERT INTO parroquias VALUES (681, 236, 'SAN ISIDRO LABRADOR');
INSERT INTO parroquias VALUES (682, 237, 'MARIÑO');
INSERT INTO parroquias VALUES (683, 237, 'RÓMULO GALLEGOS');
INSERT INTO parroquias VALUES (684, 238, 'SAN JOSÉ DE AEROCUAR');
INSERT INTO parroquias VALUES (685, 238, 'TAVERA ACOSTA');
INSERT INTO parroquias VALUES (686, 239, 'RÍO CARIBE');
INSERT INTO parroquias VALUES (687, 239, 'ANTONIO JOSÉ DE SUCRE');
INSERT INTO parroquias VALUES (688, 239, 'EL MORRO DE PUERTO SANTO');
INSERT INTO parroquias VALUES (689, 239, 'PUERTO SANTO');
INSERT INTO parroquias VALUES (690, 239, 'SAN JUAN DE LAS GALDONAS');
INSERT INTO parroquias VALUES (691, 240, 'EL PILAR');
INSERT INTO parroquias VALUES (692, 240, 'EL RINCÓN');
INSERT INTO parroquias VALUES (693, 240, 'GENERAL FRANCISCO ANTONIO VÁSQUEZ');
INSERT INTO parroquias VALUES (694, 240, 'GUARAÚNOS');
INSERT INTO parroquias VALUES (695, 240, 'TUNAPUICITO');
INSERT INTO parroquias VALUES (696, 240, 'UNIÓN');
INSERT INTO parroquias VALUES (697, 241, 'BOLÍVAR');
INSERT INTO parroquias VALUES (698, 241, 'MACARAPANA');
INSERT INTO parroquias VALUES (699, 241, 'SANTA CATALINA');
INSERT INTO parroquias VALUES (700, 241, 'SANTA ROSA');
INSERT INTO parroquias VALUES (701, 241, 'SANTA TERESA');
INSERT INTO parroquias VALUES (702, 243, 'YAGUARAPARO');
INSERT INTO parroquias VALUES (703, 243, 'EL PAUJIL');
INSERT INTO parroquias VALUES (704, 243, 'LIBERTAD');
INSERT INTO parroquias VALUES (705, 244, 'ARAYA');
INSERT INTO parroquias VALUES (706, 244, 'CHACOPATA');
INSERT INTO parroquias VALUES (707, 244, 'MANICUARE');
INSERT INTO parroquias VALUES (708, 245, 'TUNAPUY');
INSERT INTO parroquias VALUES (709, 245, 'CAMPO ELÍAS');
INSERT INTO parroquias VALUES (710, 246, 'IRAPA');
INSERT INTO parroquias VALUES (711, 246, 'CAMPO CLARO');
INSERT INTO parroquias VALUES (712, 246, 'MARABAL');
INSERT INTO parroquias VALUES (713, 246, 'SAN ANTONIO DE IRAPA');
INSERT INTO parroquias VALUES (714, 246, 'SORO');
INSERT INTO parroquias VALUES (715, 248, 'CUMANACOA');
INSERT INTO parroquias VALUES (716, 248, 'ARENAS');
INSERT INTO parroquias VALUES (717, 248, 'ARICAGUA');
INSERT INTO parroquias VALUES (718, 248, 'COCOLLAR');
INSERT INTO parroquias VALUES (719, 248, 'SAN FERNANDO');
INSERT INTO parroquias VALUES (720, 248, 'SAN LORENZO');
INSERT INTO parroquias VALUES (721, 249, 'CARIACO');
INSERT INTO parroquias VALUES (722, 249, 'CATUARO');
INSERT INTO parroquias VALUES (723, 249, 'RENDÓN');
INSERT INTO parroquias VALUES (724, 249, 'SANTA CRUZ');
INSERT INTO parroquias VALUES (725, 249, 'SANTA MARÍA');
INSERT INTO parroquias VALUES (726, 250, 'ALTAGRACIA');
INSERT INTO parroquias VALUES (727, 250, 'AYACUCHO');
INSERT INTO parroquias VALUES (728, 250, 'SANTA INÉS');
INSERT INTO parroquias VALUES (729, 250, 'VALENTÍN VALIENTE');
INSERT INTO parroquias VALUES (730, 250, 'SAN JUAN');
INSERT INTO parroquias VALUES (731, 250, 'RAÚL LEONI');
INSERT INTO parroquias VALUES (732, 250, 'SANTA FE');
INSERT INTO parroquias VALUES (733, 251, 'GÜIRIA');
INSERT INTO parroquias VALUES (734, 251, 'BIDEAU');
INSERT INTO parroquias VALUES (735, 251, 'CRISTÓBAL COLÓN');
INSERT INTO parroquias VALUES (736, 251, 'PUNTA DE PIEDRAS');
INSERT INTO parroquias VALUES (737, 254, 'RIVAS BERTI');
INSERT INTO parroquias VALUES (738, 254, 'SAN PEDRO DEL RÍO');
INSERT INTO parroquias VALUES (739, 255, 'PALOTAL');
INSERT INTO parroquias VALUES (740, 255, 'JUAN VICENTE GÓMEZ');
INSERT INTO parroquias VALUES (741, 255, 'ISAÍAS MEDINA ANGARITA');
INSERT INTO parroquias VALUES (742, 256, 'AMENODORO RANGEL LAMÚS');
INSERT INTO parroquias VALUES (743, 256, 'LA FLORIDA');
INSERT INTO parroquias VALUES (744, 258, 'ALBERTO ADRIANI');
INSERT INTO parroquias VALUES (745, 258, 'SANTO DOMINGO');
INSERT INTO parroquias VALUES (746, 260, 'BOCA DE GRITA');
INSERT INTO parroquias VALUES (747, 260, 'JOSÉ ANTONIO PÁEZ');
INSERT INTO parroquias VALUES (748, 262, 'JUAN GERMÁN ROSCIO');
INSERT INTO parroquias VALUES (749, 262, 'ROMÁN CÁRDENAS');
INSERT INTO parroquias VALUES (750, 263, 'EMILIO CONSTANTINO GUERRERO');
INSERT INTO parroquias VALUES (751, 263, 'MONSEÑOR MIGUEL ANTONIO SALAS');
INSERT INTO parroquias VALUES (752, 265, 'LA PETRÓLEA');
INSERT INTO parroquias VALUES (753, 265, 'QUINIMARÍ');
INSERT INTO parroquias VALUES (754, 265, 'BRAMÓN');
INSERT INTO parroquias VALUES (755, 266, 'CIPRIANO CASTRO');
INSERT INTO parroquias VALUES (756, 266, 'MANUEL FELIPE RUGELES');
INSERT INTO parroquias VALUES (757, 267, 'EMETERIO OCHOA');
INSERT INTO parroquias VALUES (758, 267, 'DORADAS');
INSERT INTO parroquias VALUES (759, 267, 'SAN JOAQUÍN DE NAVAY');
INSERT INTO parroquias VALUES (760, 268, 'CONSTITUCIÓN');
INSERT INTO parroquias VALUES (761, 270, 'LA PALMITA');
INSERT INTO parroquias VALUES (762, 271, 'NUEVA ARCADIA');
INSERT INTO parroquias VALUES (763, 273, 'BOCONÓ');
INSERT INTO parroquias VALUES (764, 273, 'HERNÁNDEZ');
INSERT INTO parroquias VALUES (765, 274, 'LA CONCORDIA');
INSERT INTO parroquias VALUES (766, 274, 'PEDRO MARÍA MORANTES');
INSERT INTO parroquias VALUES (767, 274, 'SAN JUAN BAUTISTA');
INSERT INTO parroquias VALUES (768, 274, 'SAN SEBASTIÁN');
INSERT INTO parroquias VALUES (769, 274, 'DR. FRANCISCO ROMERO LOBO');
INSERT INTO parroquias VALUES (770, 277, 'ELEAZAR LÓPEZ CONTRERAS');
INSERT INTO parroquias VALUES (771, 277, 'SAN PABLO');
INSERT INTO parroquias VALUES (772, 279, 'CÁRDENAS');
INSERT INTO parroquias VALUES (773, 279, 'JUAN PABLO PEÑALOZA');
INSERT INTO parroquias VALUES (774, 279, 'POTOSÍ');
INSERT INTO parroquias VALUES (775, 281, 'SANTA ISABEL');
INSERT INTO parroquias VALUES (776, 281, 'ARAGUANEY');
INSERT INTO parroquias VALUES (777, 281, 'EL JAGÜITO');
INSERT INTO parroquias VALUES (778, 281, 'LA ESPERANZA');
INSERT INTO parroquias VALUES (779, 282, 'BOCONÓ');
INSERT INTO parroquias VALUES (780, 282, 'EL CARMEN');
INSERT INTO parroquias VALUES (781, 282, 'MOSQUEY');
INSERT INTO parroquias VALUES (782, 282, 'AYACUCHO');
INSERT INTO parroquias VALUES (783, 282, 'BURBUSAY');
INSERT INTO parroquias VALUES (784, 282, 'GENERAL RIVAS');
INSERT INTO parroquias VALUES (785, 282, 'GUARAMACAL');
INSERT INTO parroquias VALUES (786, 282, 'VEGA DE GUARAMACAL');
INSERT INTO parroquias VALUES (787, 282, 'MONSEÑOR JÁUREGUI');
INSERT INTO parroquias VALUES (788, 282, 'RAFAEL RANGEL');
INSERT INTO parroquias VALUES (789, 282, 'SAN MIGUEL');
INSERT INTO parroquias VALUES (790, 282, 'SAN JOSÉ');
INSERT INTO parroquias VALUES (791, 283, 'SABANA GRANDE');
INSERT INTO parroquias VALUES (792, 283, 'CHEREGÜÉ');
INSERT INTO parroquias VALUES (793, 283, 'GRANADOS');
INSERT INTO parroquias VALUES (794, 284, 'CHEJENDÉ');
INSERT INTO parroquias VALUES (795, 284, 'ARNOLDO GABALDÓN');
INSERT INTO parroquias VALUES (796, 284, 'BOLIVIA');
INSERT INTO parroquias VALUES (797, 284, 'CARRILLO');
INSERT INTO parroquias VALUES (798, 284, 'CEGARRA');
INSERT INTO parroquias VALUES (799, 284, 'MANUEL SALVADOR ULLOA');
INSERT INTO parroquias VALUES (800, 284, 'SAN JOSÉ');
INSERT INTO parroquias VALUES (801, 285, 'CARACHE');
INSERT INTO parroquias VALUES (802, 285, 'CUICAS');
INSERT INTO parroquias VALUES (803, 285, 'LA CONCEPCIÓN');
INSERT INTO parroquias VALUES (804, 285, 'PANAMERICANA');
INSERT INTO parroquias VALUES (805, 285, 'SANTA CRUZ');
INSERT INTO parroquias VALUES (806, 286, 'ESCUQUE');
INSERT INTO parroquias VALUES (807, 286, 'LA UNIÓN');
INSERT INTO parroquias VALUES (808, 286, 'SABANA LIBRE');
INSERT INTO parroquias VALUES (809, 286, 'SANTA RITA');
INSERT INTO parroquias VALUES (810, 287, 'EL SOCORRO');
INSERT INTO parroquias VALUES (811, 287, 'ANTONIO JOSÉ DE SUCRE');
INSERT INTO parroquias VALUES (812, 287, 'LOS CAPRICHOS');
INSERT INTO parroquias VALUES (813, 288, 'CAMPO ELÍAS');
INSERT INTO parroquias VALUES (814, 288, 'ARNOLDO GABALDÓN');
INSERT INTO parroquias VALUES (815, 289, 'SANTA APOLONIA');
INSERT INTO parroquias VALUES (816, 289, 'EL PROGRESO');
INSERT INTO parroquias VALUES (817, 289, 'LA CEIBA');
INSERT INTO parroquias VALUES (818, 289, 'TRES DE FEBRERO');
INSERT INTO parroquias VALUES (819, 290, 'EL DIVIDIVE');
INSERT INTO parroquias VALUES (820, 290, 'AGUA SANTA');
INSERT INTO parroquias VALUES (821, 290, 'AGUA CALIENTE');
INSERT INTO parroquias VALUES (822, 290, 'EL CENIZO');
INSERT INTO parroquias VALUES (823, 290, 'VALERITA');
INSERT INTO parroquias VALUES (824, 291, 'MONTE CARMELO');
INSERT INTO parroquias VALUES (825, 291, 'BUENA VISTA');
INSERT INTO parroquias VALUES (826, 291, 'SANTA MARÍA DEL HORCÓN');
INSERT INTO parroquias VALUES (827, 292, 'MOTATÁN');
INSERT INTO parroquias VALUES (828, 292, 'EL BAÑO');
INSERT INTO parroquias VALUES (829, 292, 'JALISCO');
INSERT INTO parroquias VALUES (830, 293, 'PAMPÁN');
INSERT INTO parroquias VALUES (831, 293, 'FLOR DE PATRIA');
INSERT INTO parroquias VALUES (832, 293, 'LA PAZ');
INSERT INTO parroquias VALUES (833, 293, 'SANTA ANA');
INSERT INTO parroquias VALUES (834, 294, 'PAMPANITO');
INSERT INTO parroquias VALUES (835, 294, 'LA CONCEPCIÓN');
INSERT INTO parroquias VALUES (836, 294, 'PAMPANITO II');
INSERT INTO parroquias VALUES (837, 295, 'BETIJOQUE');
INSERT INTO parroquias VALUES (838, 295, 'LA PUEBLITA');
INSERT INTO parroquias VALUES (839, 295, 'LOS CEDROS');
INSERT INTO parroquias VALUES (840, 295, 'JOSÉ GREGORIO HERNÁNDEZ');
INSERT INTO parroquias VALUES (841, 296, 'CARVAJAL');
INSERT INTO parroquias VALUES (842, 296, 'ANTONIO NICOLÁS BRICEÑO');
INSERT INTO parroquias VALUES (843, 296, 'CAMPO ALEGRE');
INSERT INTO parroquias VALUES (844, 296, 'JOSÉ LEONARDO SUÁREZ');
INSERT INTO parroquias VALUES (845, 297, 'SABANA DE MENDOZA');
INSERT INTO parroquias VALUES (846, 297, 'EL PARAÍSO');
INSERT INTO parroquias VALUES (847, 297, 'JUNÍN');
INSERT INTO parroquias VALUES (848, 297, 'VALMORE RODRÍGUEZ');
INSERT INTO parroquias VALUES (849, 298, 'ANDRÉS LINARES');
INSERT INTO parroquias VALUES (850, 298, 'CHIQUINQUIRÁ');
INSERT INTO parroquias VALUES (851, 298, 'CRISTÓBAL MENDOZA');
INSERT INTO parroquias VALUES (852, 298, 'CRUZ CARRILLO');
INSERT INTO parroquias VALUES (853, 298, 'MATRIZ');
INSERT INTO parroquias VALUES (854, 298, 'MONSEÑOR CARRILLO');
INSERT INTO parroquias VALUES (855, 298, 'TRES ESQUINAS');
INSERT INTO parroquias VALUES (856, 299, 'LA QUEBRADA');
INSERT INTO parroquias VALUES (857, 299, 'CABIMBÚ');
INSERT INTO parroquias VALUES (858, 299, 'JAJÓ');
INSERT INTO parroquias VALUES (859, 299, 'LA MESA');
INSERT INTO parroquias VALUES (860, 299, 'SANTIAGO');
INSERT INTO parroquias VALUES (861, 299, 'TUÑAME');
INSERT INTO parroquias VALUES (862, 300, 'JUAN IGNACIO MONTILLA');
INSERT INTO parroquias VALUES (863, 300, 'LA BEATRIZ');
INSERT INTO parroquias VALUES (864, 300, 'MERCEDES DÍAZ');
INSERT INTO parroquias VALUES (865, 300, 'SAN LUIS');
INSERT INTO parroquias VALUES (866, 300, 'LA PUERTA');
INSERT INTO parroquias VALUES (867, 300, 'MENDOZA');
INSERT INTO parroquias VALUES (868, 303, 'CAMPO ELÍAS');
INSERT INTO parroquias VALUES (869, 309, 'SALOM');
INSERT INTO parroquias VALUES (870, 309, 'TEMERLA');
INSERT INTO parroquias VALUES (871, 310, 'SAN ANDRÉS');
INSERT INTO parroquias VALUES (872, 311, 'ALBARICO');
INSERT INTO parroquias VALUES (873, 311, 'SAN JAVIER');
INSERT INTO parroquias VALUES (874, 314, 'EL GUAYABO');
INSERT INTO parroquias VALUES (875, 315, 'ISLA DE TOAS');
INSERT INTO parroquias VALUES (876, 315, 'MONAGAS');
INSERT INTO parroquias VALUES (877, 316, 'SAN TIMOTEO');
INSERT INTO parroquias VALUES (878, 316, 'GENERAL URDANETA');
INSERT INTO parroquias VALUES (879, 316, 'LIBERTADOR');
INSERT INTO parroquias VALUES (880, 316, 'MANUEL GUANIPA MATOS');
INSERT INTO parroquias VALUES (881, 316, 'MARCELINO BRICEÑO');
INSERT INTO parroquias VALUES (882, 316, 'PUEBLO NUEVO');
INSERT INTO parroquias VALUES (883, 317, 'AMBROSIO');
INSERT INTO parroquias VALUES (884, 317, 'CARMEN HERRERA');
INSERT INTO parroquias VALUES (885, 317, 'GERMÁN RÍOS LINARES');
INSERT INTO parroquias VALUES (886, 317, 'LA ROSA');
INSERT INTO parroquias VALUES (887, 317, 'JORGE HERNÁNDEZ');
INSERT INTO parroquias VALUES (888, 317, 'RÓMULO BETANCOURT');
INSERT INTO parroquias VALUES (889, 317, 'SAN BENITO');
INSERT INTO parroquias VALUES (890, 317, 'ARÍSTIDES CALVANI');
INSERT INTO parroquias VALUES (891, 317, 'PUNTA GORDA');
INSERT INTO parroquias VALUES (892, 318, 'ENCONTRADOS');
INSERT INTO parroquias VALUES (893, 318, 'UDÓN PÉREZ');
INSERT INTO parroquias VALUES (894, 319, 'SAN CARLOS DEL ZULIA');
INSERT INTO parroquias VALUES (895, 319, 'MORALITO');
INSERT INTO parroquias VALUES (896, 319, 'SANTA BÁRBARA');
INSERT INTO parroquias VALUES (897, 319, 'SANTA CRUZ DEL ZULIA');
INSERT INTO parroquias VALUES (898, 319, 'URRIBARRI');
INSERT INTO parroquias VALUES (899, 320, 'SIMÓN RODRÍGUEZ');
INSERT INTO parroquias VALUES (900, 320, 'CARLOS QUEVEDO');
INSERT INTO parroquias VALUES (901, 320, 'FRANCISCO JAVIER PULGAR');
INSERT INTO parroquias VALUES (902, 321, 'LA CONCEPCIÓN');
INSERT INTO parroquias VALUES (903, 321, 'JOSÉ RAMÓN YEPEZ');
INSERT INTO parroquias VALUES (904, 321, 'MARIANO PARRA LEÓN');
INSERT INTO parroquias VALUES (905, 321, 'SAN JOSÉ');
INSERT INTO parroquias VALUES (906, 322, 'JESÚS MARÍA SEMPRÚN');
INSERT INTO parroquias VALUES (907, 322, 'BARÍ');
INSERT INTO parroquias VALUES (908, 323, 'CONCEPCIÓN');
INSERT INTO parroquias VALUES (909, 323, 'ANDRÉS BELLO');
INSERT INTO parroquias VALUES (910, 323, 'CHIQUINQUIRÁ');
INSERT INTO parroquias VALUES (911, 323, 'EL CARMELO');
INSERT INTO parroquias VALUES (912, 323, 'POTRERITOS');
INSERT INTO parroquias VALUES (913, 324, 'ALONSO DE OJEDA');
INSERT INTO parroquias VALUES (914, 324, 'LIBERTAD');
INSERT INTO parroquias VALUES (915, 324, 'CAMPO LARA');
INSERT INTO parroquias VALUES (916, 324, 'ELEAZAR LÓPEZ CONTRERAS');
INSERT INTO parroquias VALUES (917, 324, 'VENEZUELA');
INSERT INTO parroquias VALUES (918, 325, 'LIBERTAD');
INSERT INTO parroquias VALUES (919, 325, 'BARTOLOMÉ DE LAS CASAS');
INSERT INTO parroquias VALUES (920, 325, 'RÍO NEGRO');
INSERT INTO parroquias VALUES (921, 325, 'SAN JOSÉ DE PERIJÁ');
INSERT INTO parroquias VALUES (922, 326, 'SAN RAFAEL');
INSERT INTO parroquias VALUES (923, 326, 'LA SIERRITA');
INSERT INTO parroquias VALUES (924, 326, 'LAS PARCELAS');
INSERT INTO parroquias VALUES (925, 326, 'LUIS DE VICENTE');
INSERT INTO parroquias VALUES (926, 326, 'MONSEÑOR MARCOS SERGIO GODOY');
INSERT INTO parroquias VALUES (927, 326, 'RICAURTE');
INSERT INTO parroquias VALUES (928, 326, 'TAMARE');
INSERT INTO parroquias VALUES (929, 327, 'ANTONIO BORJAS ROMERO');
INSERT INTO parroquias VALUES (930, 327, 'BOLÍVAR');
INSERT INTO parroquias VALUES (931, 327, 'CACIQUE MARA');
INSERT INTO parroquias VALUES (932, 327, 'CARACCIOLO PARRA PÉREZ');
INSERT INTO parroquias VALUES (933, 327, 'CECILIO ACOSTA');
INSERT INTO parroquias VALUES (934, 327, 'CRISTO DE ARANZA');
INSERT INTO parroquias VALUES (935, 327, 'COQUIVACOA');
INSERT INTO parroquias VALUES (936, 327, 'CHIQUINQUIRÁ');
INSERT INTO parroquias VALUES (937, 327, 'FRANCISCO EUGENIO BUSTAMANTE');
INSERT INTO parroquias VALUES (938, 327, 'IDELFONSO VÁSQUEZ');
INSERT INTO parroquias VALUES (939, 327, 'JUANA DE AVILA');
INSERT INTO parroquias VALUES (940, 327, 'LUIS HURTADO HIGUERA');
INSERT INTO parroquias VALUES (941, 327, 'MANUEL DAGNINO');
INSERT INTO parroquias VALUES (942, 327, 'OLEGARIO VILLALOBOS');
INSERT INTO parroquias VALUES (943, 327, 'RAÚL LEONI');
INSERT INTO parroquias VALUES (944, 327, 'SANTA LUCÍA');
INSERT INTO parroquias VALUES (945, 327, 'VENANCIO PULGAR');
INSERT INTO parroquias VALUES (946, 327, 'SAN ISIDRO');
INSERT INTO parroquias VALUES (947, 328, 'ALTAGRACIA');
INSERT INTO parroquias VALUES (948, 328, 'ANA MARÍA CAMPOS');
INSERT INTO parroquias VALUES (949, 328, 'FARÍA');
INSERT INTO parroquias VALUES (950, 328, 'SAN ANTONIO');
INSERT INTO parroquias VALUES (951, 328, 'SAN JOSÉ');
INSERT INTO parroquias VALUES (952, 329, 'SINAMAICA');
INSERT INTO parroquias VALUES (953, 329, 'ALTA GUAJIRA');
INSERT INTO parroquias VALUES (954, 329, 'ELÍAS SÁNCHEZ RUBIO');
INSERT INTO parroquias VALUES (955, 329, 'GUAJIRA');
INSERT INTO parroquias VALUES (956, 330, 'EL ROSARIO');
INSERT INTO parroquias VALUES (957, 330, 'DONALDO GARCÍA');
INSERT INTO parroquias VALUES (958, 330, 'SIXTO ZAMBRANO');
INSERT INTO parroquias VALUES (959, 331, 'SAN FRANCISCO');
INSERT INTO parroquias VALUES (960, 331, 'EL BAJO');
INSERT INTO parroquias VALUES (961, 331, 'DOMITILA FLORES');
INSERT INTO parroquias VALUES (962, 331, 'FRANCISCO OCHOA');
INSERT INTO parroquias VALUES (963, 331, 'LOS CORTIJOS');
INSERT INTO parroquias VALUES (964, 331, 'MARCIAL HERNÁNDEZ');
INSERT INTO parroquias VALUES (965, 332, 'SANTA RITA');
INSERT INTO parroquias VALUES (966, 332, 'EL MENE');
INSERT INTO parroquias VALUES (967, 332, 'JOSÉ CENOVIO URRIBARRI');
INSERT INTO parroquias VALUES (968, 332, 'PEDRO LUCAS URRIBARRI');
INSERT INTO parroquias VALUES (969, 333, 'MANUEL MANRIQUE');
INSERT INTO parroquias VALUES (970, 333, 'RAFAEL MARÍA BARALT');
INSERT INTO parroquias VALUES (971, 333, 'RAFAEL URDANETA');
INSERT INTO parroquias VALUES (972, 334, 'BOBURES');
INSERT INTO parroquias VALUES (973, 334, 'EL BATEY');
INSERT INTO parroquias VALUES (974, 334, 'GIBRALTAR');
INSERT INTO parroquias VALUES (975, 334, 'HERAS');
INSERT INTO parroquias VALUES (976, 334, 'MONSEÑOR ARTURO CELESTINO ALVAREZ');
INSERT INTO parroquias VALUES (977, 334, 'RÓMULO GALLEGOS');
INSERT INTO parroquias VALUES (978, 335, 'LA VICTORIA');
INSERT INTO parroquias VALUES (979, 335, 'RAFAEL URDANETA');
INSERT INTO parroquias VALUES (980, 335, 'RAÚL CUENCA');
INSERT INTO parroquias VALUES (981, 336, 'CARABALLEDA');
INSERT INTO parroquias VALUES (982, 336, 'CARAYACA');
INSERT INTO parroquias VALUES (983, 336, 'CARUAO');
INSERT INTO parroquias VALUES (984, 336, 'CATIA LA MAR');
INSERT INTO parroquias VALUES (985, 336, 'EL JUNKO');
INSERT INTO parroquias VALUES (986, 336, 'LA GUAIRA');
INSERT INTO parroquias VALUES (987, 336, 'MACUTO');
INSERT INTO parroquias VALUES (988, 336, 'MAIQUETÍA');
INSERT INTO parroquias VALUES (989, 336, 'NAIGUATÁ');
INSERT INTO parroquias VALUES (990, 336, 'RAÚL LEONI');
INSERT INTO parroquias VALUES (991, 336, 'CARLOS SOUBLETTE');
INSERT INTO parroquias VALUES (992, 2, 'LA ESMERALDA');
INSERT INTO parroquias VALUES (993, 3, 'SAN FERNANDO DE ATABAPO');
INSERT INTO parroquias VALUES (994, 5, 'ISLA DE RATON');
INSERT INTO parroquias VALUES (995, 7, 'SAN JUAN DE MANAPIARE');
INSERT INTO parroquias VALUES (996, 6, 'MAROA');
INSERT INTO parroquias VALUES (997, 8, 'SAN CARLOS DE RÍO NEGRO');
INSERT INTO parroquias VALUES (998, 10, 'ARAGUA DE BARCELONA');
INSERT INTO parroquias VALUES (999, 11, 'PUERTO PÍRITU');
INSERT INTO parroquias VALUES (1000, 13, 'PARIAGUÁN');
INSERT INTO parroquias VALUES (1001, 15, 'SOLEDAD');
INSERT INTO parroquias VALUES (1002, 18, 'MAPIRE');
INSERT INTO parroquias VALUES (1003, 19, 'SAN MATEO');
INSERT INTO parroquias VALUES (1004, 21, 'CANTAURA');
INSERT INTO parroquias VALUES (1005, 23, 'SAN JOSÉ DE GUANIPA');
INSERT INTO parroquias VALUES (1006, 38, 'SAN MATEO');
INSERT INTO parroquias VALUES (1007, 39, 'CAMATAGUA');
INSERT INTO parroquias VALUES (1008, 55, 'SANTA RITA');
INSERT INTO parroquias VALUES (1009, 41, 'SANTA CRUZ');
INSERT INTO parroquias VALUES (1010, 42, 'LA VICTORIA');
INSERT INTO parroquias VALUES (1011, 43, 'EL CONSEJO');
INSERT INTO parroquias VALUES (1012, 44, 'PALO NEGRO');
INSERT INTO parroquias VALUES (1013, 45, 'EL LIMÓN');
INSERT INTO parroquias VALUES (1014, 47, 'OCUMARE DE LA COSTA');
INSERT INTO parroquias VALUES (1015, 46, 'SAN CASIMIRO');
INSERT INTO parroquias VALUES (1016, 48, 'SAN SEBASTIÁN');
INSERT INTO parroquias VALUES (1017, 49, 'TURMERO');
INSERT INTO parroquias VALUES (1018, 50, 'LAS TEJERÍAS');
INSERT INTO parroquias VALUES (1019, 51, 'CAGUA');
INSERT INTO parroquias VALUES (1020, 52, 'COLONIA TOVAR');
INSERT INTO parroquias VALUES (1021, 53, 'BARBACOAS');
INSERT INTO parroquias VALUES (1022, 54, 'VILLA DE CURA');
INSERT INTO parroquias VALUES (1023, 69, 'CAICARA DEL ORINOCO');
INSERT INTO parroquias VALUES (1024, 70, 'EL CALLAO');
INSERT INTO parroquias VALUES (1025, 71, 'SANTA ELENA DE UAIRÉN');
INSERT INTO parroquias VALUES (1026, 78, 'EL PALMAR');
INSERT INTO parroquias VALUES (1027, 73, 'UPATA');
INSERT INTO parroquias VALUES (1028, 74, 'CIUDAD PIAR');
INSERT INTO parroquias VALUES (1029, 75, 'GUASIPATI');
INSERT INTO parroquias VALUES (1030, 76, 'TUMEREMO');
INSERT INTO parroquias VALUES (1031, 77, 'MARIPA');
INSERT INTO parroquias VALUES (1032, 109, 'YARACAL');
INSERT INTO parroquias VALUES (1033, 112, 'DABAJURO');
INSERT INTO parroquias VALUES (1034, 121, 'PALMASOLA');
INSERT INTO parroquias VALUES (1035, 124, 'MIRIMIRE');
INSERT INTO parroquias VALUES (1036, 127, 'TOCÓPERO');
INSERT INTO parroquias VALUES (1037, 134, 'GUAYABAL');
INSERT INTO parroquias VALUES (1038, 199, 'SAN ANTONIO');
INSERT INTO parroquias VALUES (1039, 200, 'AGUASAY');
INSERT INTO parroquias VALUES (1040, 201, 'CARIPITO');
INSERT INTO parroquias VALUES (1041, 202, 'CARIPE');
INSERT INTO parroquias VALUES (1042, 203, 'CAICARA');
INSERT INTO parroquias VALUES (1043, 204, 'PUNTA DE MATA');
INSERT INTO parroquias VALUES (1044, 205, 'TEMBLADOR');
INSERT INTO parroquias VALUES (1045, 207, 'ARAGUA');
INSERT INTO parroquias VALUES (1046, 208, 'QUIRIQUIRE');
INSERT INTO parroquias VALUES (1047, 209, 'SANTA BARBARA');
INSERT INTO parroquias VALUES (1048, 210, 'BARRANCAS');
INSERT INTO parroquias VALUES (1049, 211, 'URACOA');
INSERT INTO parroquias VALUES (1050, 156, 'LA AZULITA');
INSERT INTO parroquias VALUES (1051, 157, 'SANTA CRUZ DE MORA');
INSERT INTO parroquias VALUES (1052, 158, 'ARICAGUA');
INSERT INTO parroquias VALUES (1053, 159, 'CANAGUÁ');
INSERT INTO parroquias VALUES (1054, 161, 'TUCANÍ');
INSERT INTO parroquias VALUES (1055, 162, 'SANTO DOMINGO');
INSERT INTO parroquias VALUES (1056, 163, 'GUARAQUE');
INSERT INTO parroquias VALUES (1057, 164, 'ARAPUEY');
INSERT INTO parroquias VALUES (1058, 165, 'TORONDOY');
INSERT INTO parroquias VALUES (1059, 167, 'TIMOTES');
INSERT INTO parroquias VALUES (1060, 168, 'SANTA ELENA DE ARENALES');
INSERT INTO parroquias VALUES (1061, 169, 'SANTA MARIA DE CAPARO');
INSERT INTO parroquias VALUES (1062, 170, 'PUEBLO LLANO');
INSERT INTO parroquias VALUES (1063, 171, 'MUCUCHÍES');
INSERT INTO parroquias VALUES (1064, 172, 'BAILADORES');
INSERT INTO parroquias VALUES (1065, 173, 'TABAY');
INSERT INTO parroquias VALUES (1066, 174, 'LAGUNILLAS');
INSERT INTO parroquias VALUES (1067, 176, 'NUEVA BOLIVIA');
INSERT INTO parroquias VALUES (1068, 177, 'ZEA');
INSERT INTO parroquias VALUES (1069, 212, 'LA PLAZA DE MARAGUACHÍ');
INSERT INTO parroquias VALUES (1070, 213, 'LA ASUNCIÓN');
INSERT INTO parroquias VALUES (1071, 214, 'SAN JUAN BAUTISTA');
INSERT INTO parroquias VALUES (1072, 215, 'EL VALLE DEL ESPÍRITU SANTO');
INSERT INTO parroquias VALUES (1073, 216, 'SANTA ANA');
INSERT INTO parroquias VALUES (1074, 217, 'PAMPATAR');
INSERT INTO parroquias VALUES (1075, 218, 'JUAN GRIEGO');
INSERT INTO parroquias VALUES (1076, 219, 'PORLAMAR');
INSERT INTO parroquias VALUES (1077, 220, 'BOCA DEL RÍO');
INSERT INTO parroquias VALUES (1078, 221, 'PUNTA DE PIEDRAS');
INSERT INTO parroquias VALUES (1079, 222, 'SAN PEDRO DE COCHE');
INSERT INTO parroquias VALUES (1080, 223, 'AGUA BLANCA');
INSERT INTO parroquias VALUES (1081, 224, 'ARAURE');
INSERT INTO parroquias VALUES (1082, 225, 'PÍRITU');
INSERT INTO parroquias VALUES (1083, 226, 'GUANARE');
INSERT INTO parroquias VALUES (1084, 227, 'GUANARITO');
INSERT INTO parroquias VALUES (1085, 228, 'PARAISO DE CHABASQUÉN');
INSERT INTO parroquias VALUES (1086, 229, 'OSPINO');
INSERT INTO parroquias VALUES (1087, 231, 'PAPELÓN');
INSERT INTO parroquias VALUES (1088, 230, 'ACARIGUA');
INSERT INTO parroquias VALUES (1089, 232, 'BOCONOITO');
INSERT INTO parroquias VALUES (1090, 233, 'SAN RAFAEL DE ONOTO');
INSERT INTO parroquias VALUES (1091, 234, 'EL PLAYÓN');
INSERT INTO parroquias VALUES (1092, 235, 'BISCUCUY');
INSERT INTO parroquias VALUES (1093, 236, 'VILLA BRUZUAL');
INSERT INTO parroquias VALUES (1094, 242, 'MARIGUITAR');
INSERT INTO parroquias VALUES (1095, 247, 'SAN ANTONIO DEL GOLFO');
INSERT INTO parroquias VALUES (1096, 252, 'CORDERO');
INSERT INTO parroquias VALUES (1097, 253, 'LAS MESAS');
INSERT INTO parroquias VALUES (1098, 254, 'COLÓN');
INSERT INTO parroquias VALUES (1099, 255, 'SAN ANTONIO DEL TÁCHIRA');
INSERT INTO parroquias VALUES (1100, 257, 'SANTA ANA DEL TÁCHIRA');
INSERT INTO parroquias VALUES (1101, 256, 'TÁRIBA');
INSERT INTO parroquias VALUES (1102, 258, 'SAN RAFAEL DEL PIÑAL');
INSERT INTO parroquias VALUES (1103, 259, 'SAN JOSÉ DE BOLÍVAR');
INSERT INTO parroquias VALUES (1104, 260, 'LA FRÍA');
INSERT INTO parroquias VALUES (1105, 261, 'PALMIRA');
INSERT INTO parroquias VALUES (1106, 262, 'CAPACHO NUEVO');
INSERT INTO parroquias VALUES (1107, 264, 'EL COBRE');
INSERT INTO parroquias VALUES (1108, 265, 'RUBIO');
INSERT INTO parroquias VALUES (1109, 263, 'LA GRITA');
INSERT INTO parroquias VALUES (1110, 266, 'CAPACHO VIEJO');
INSERT INTO parroquias VALUES (1111, 267, 'ABEJALES');
INSERT INTO parroquias VALUES (1112, 268, 'LOBATERA');
INSERT INTO parroquias VALUES (1113, 269, 'MICHELENA');
INSERT INTO parroquias VALUES (1114, 270, 'COLONCITO');
INSERT INTO parroquias VALUES (1115, 271, 'UREÑA');
INSERT INTO parroquias VALUES (1116, 272, 'DELICIAS');
INSERT INTO parroquias VALUES (1117, 273, 'LA TENDIDA');
INSERT INTO parroquias VALUES (1118, 280, 'UMUQUENA');
INSERT INTO parroquias VALUES (1119, 275, 'SEBORUCO');
INSERT INTO parroquias VALUES (1120, 276, 'SAN SIMÓN');
INSERT INTO parroquias VALUES (1121, 277, 'QUENIQUEA');
INSERT INTO parroquias VALUES (1122, 278, 'SAN JOSECITO');
INSERT INTO parroquias VALUES (1123, 279, 'PREGONERO');
INSERT INTO parroquias VALUES (1124, 301, 'SAN PABLO');
INSERT INTO parroquias VALUES (1125, 302, 'AROA');
INSERT INTO parroquias VALUES (1126, 303, 'CHIVACOA');
INSERT INTO parroquias VALUES (1127, 304, 'COCOROTE');
INSERT INTO parroquias VALUES (1128, 305, 'INDEPENDENCIA');
INSERT INTO parroquias VALUES (1129, 306, 'SABANA DE PARRA');
INSERT INTO parroquias VALUES (1130, 307, 'BORAURE');
INSERT INTO parroquias VALUES (1131, 308, 'YUMARE');
INSERT INTO parroquias VALUES (1132, 309, 'NIRGUA');
INSERT INTO parroquias VALUES (1133, 310, 'YARITAGUA');
INSERT INTO parroquias VALUES (1134, 311, 'SAN FELIPE');
INSERT INTO parroquias VALUES (1135, 312, 'GUAMA');
INSERT INTO parroquias VALUES (1136, 313, 'URACHICHE');
INSERT INTO parroquias VALUES (1137, 314, 'FARRIAR');


--
-- Data for Name: personal; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: personal_centro_hospitalario; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: posinega; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO posinega VALUES (1, 'NEGATIVO');
INSERT INTO posinega VALUES (2, 'POSITIVO');


--
-- Name: posinega_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('posinega_id_seq', 2, true);


--
-- Data for Name: region_estado; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: regiones; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO regiones VALUES (1, 'Region 1 - Capital');
INSERT INTO regiones VALUES (2, 'Region 2 - Central');
INSERT INTO regiones VALUES (3, 'Region 3 - Zulia');


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO roles VALUES (1, 'Administrador MPPS');
INSERT INTO roles VALUES (2, 'Coord. Hospitalario de Trasplante');
INSERT INTO roles VALUES (3, 'Administrador IDI');


--
-- Name: roles_rol_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('roles_rol_id_seq', 3, true);


--
-- Data for Name: sangre; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO sangre VALUES ('1', 'Grupo O');
INSERT INTO sangre VALUES ('2', 'Grupo A');
INSERT INTO sangre VALUES ('3', 'Grupo B');
INSERT INTO sangre VALUES ('4', 'Grupo AB');


--
-- Data for Name: suero_donante; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: suero_paciente; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: suero_paciente_suero_pac_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('suero_paciente_suero_pac_id_seq', 1, false);


--
-- Data for Name: tipos_centros; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tipos_centros VALUES (1, 'Centro Asistencial Publico');
INSERT INTO tipos_centros VALUES (2, 'Centro Asistencial Privado');
INSERT INTO tipos_centros VALUES (3, 'Centro de Dialisis');
INSERT INTO tipos_centros VALUES (5, 'Lab. Histocompatibilidad');
INSERT INTO tipos_centros VALUES (4, 'Sede Administrativa');


--
-- Data for Name: tipos_dialisis; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tipos_dialisis VALUES (1, 'Hemodialisis');
INSERT INTO tipos_dialisis VALUES (2, 'Peritoneal');


--
-- Data for Name: tipos_trasplantes; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tipos_trasplantes VALUES (1, 'Trasplante Renal');
INSERT INTO tipos_trasplantes VALUES (2, 'Trasplante de Higado');
INSERT INTO tipos_trasplantes VALUES (3, 'Trasplante Medula Osea / CPH');
INSERT INTO tipos_trasplantes VALUES (4, 'Trasplante de Cornea');


--
-- Name: tipos_trasplantes_tipo_trasplante_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipos_trasplantes_tipo_trasplante_id_seq', 4, true);


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "user" VALUES (1, 'Luis Almaro', 'cZ4AJ0kNHWqdqdnYF8sM4fD00ICEOo4j', '$2y$13$8hE3EWId9jltLDs.5Rh.BeyDwoYKbMUhGoNbcFT2A8uTRIkkXwyPu', NULL, 'lalmaros@gmail.com', 10, 10, 1406338996, 1406338996);


--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('user_id_seq', 1, true);


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO usuarios VALUES (3, 'usu3', '123', 'Marina Suarez', 3, 2, 1, 1);
INSERT INTO usuarios VALUES (4, 'usu4', '123', 'Livia Carrasco', 4, 2, 1, 1);
INSERT INTO usuarios VALUES (5, 'usu5', '123', 'Nicole Pressman', 5, 2, 1, 1);
INSERT INTO usuarios VALUES (6, 'usu6', '123', 'Juan Urquia', 6, 2, 1, 1);
INSERT INTO usuarios VALUES (7, 'usu7', '123', 'Miguel Villalonga', 7, 2, 1, 1);
INSERT INTO usuarios VALUES (8, 'usu8', '123', 'Saul Martinez', 8, 2, 1, 1);
INSERT INTO usuarios VALUES (9, 'usu9', '123', 'Maria Mendez', 9, 2, 1, 1);
INSERT INTO usuarios VALUES (10, 'usu10', '123', 'Jesus Marquez', 10, 2, 1, 1);
INSERT INTO usuarios VALUES (12, 'usu12', '123', 'Blas Zaccaro', 12, 2, 1, 1);
INSERT INTO usuarios VALUES (13, 'usu13', '123', 'Victoria Larez', 13, 2, 1, 1);
INSERT INTO usuarios VALUES (14, 'usu14', '123', 'Jose Rio Bueno', 14, 1, 1, 1);
INSERT INTO usuarios VALUES (15, 'usu15', '123', 'Maritza Perez', 15, 3, 1, 1);
INSERT INTO usuarios VALUES (11, 'usu11', '123', 'Mercedes Garcia', 11, 2, 1, 1);
INSERT INTO usuarios VALUES (1, 'usu1', '123', 'Jose Torres', 1, 2, 1, 1);
INSERT INTO usuarios VALUES (2, 'usu2', '123', 'Luis Zambrano', 2, 2, 1, 1);


--
-- Name: usuarios_usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usuarios_usuario_id_seq', 1, false);


--
-- Name: cargos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cargos
    ADD CONSTRAINT cargos_pkey PRIMARY KEY (cargo_id);


--
-- Name: centros_hospitalarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY centros_hospitalarios
    ADD CONSTRAINT centros_hospitalarios_pkey PRIMARY KEY (centro_id);


--
-- Name: condicion_paciente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY condicion_paciente
    ADD CONSTRAINT condicion_paciente_pkey PRIMARY KEY (condicion_id);


--
-- Name: donantes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY donantes
    ADD CONSTRAINT donantes_pkey PRIMARY KEY (donante_id);


--
-- Name: estados_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY estados
    ADD CONSTRAINT estados_pkey PRIMARY KEY (estado_id);


--
-- Name: estatus_pac_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY estatus_pac
    ADD CONSTRAINT estatus_pac_pkey PRIMARY KEY (estatus_id);


--
-- Name: estatus_per_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY estatus_per
    ADD CONSTRAINT estatus_per_pkey PRIMARY KEY (estatus_id);


--
-- Name: estatus_usr_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY estatus_usr
    ADD CONSTRAINT estatus_usr_pkey PRIMARY KEY (estatus_id);


--
-- Name: examenes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY examenes
    ADD CONSTRAINT examenes_pkey PRIMARY KEY (examen_id);


--
-- Name: generos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY generos
    ADD CONSTRAINT generos_pkey PRIMARY KEY (id);


--
-- Name: hla_a_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY hla_a
    ADD CONSTRAINT hla_a_pkey PRIMARY KEY (locus_a_id);


--
-- Name: hla_b_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY hla_b
    ADD CONSTRAINT hla_b_pkey PRIMARY KEY (locus_b_id);


--
-- Name: hla_dr_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY hla_dr
    ADD CONSTRAINT hla_dr_pkey PRIMARY KEY (locus_dr_id);


--
-- Name: hla_paciente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY hla_paciente
    ADD CONSTRAINT hla_paciente_pkey PRIMARY KEY (paciente_id);


--
-- Name: migration_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY migration
    ADD CONSTRAINT migration_pkey PRIMARY KEY (version);


--
-- Name: municipios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY municipios
    ADD CONSTRAINT municipios_pkey PRIMARY KEY (municipio_id);


--
-- Name: nacionalidad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY nacionalidad
    ADD CONSTRAINT nacionalidad_pkey PRIMARY KEY (id);


--
-- Name: pacientes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY pacientes
    ADD CONSTRAINT pacientes_pkey PRIMARY KEY (paciente_id);


--
-- Name: parroquias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY parroquias
    ADD CONSTRAINT parroquias_pkey PRIMARY KEY (parroquia_id);


--
-- Name: personal_centro_hospitalario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY personal_centro_hospitalario
    ADD CONSTRAINT personal_centro_hospitalario_pkey PRIMARY KEY (personal_id, centro_id);


--
-- Name: personal_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY personal
    ADD CONSTRAINT personal_pkey PRIMARY KEY (personal_id);


--
-- Name: region_estado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY region_estado
    ADD CONSTRAINT region_estado_pkey PRIMARY KEY (region_id, estado_id);


--
-- Name: regiones_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY regiones
    ADD CONSTRAINT regiones_pkey PRIMARY KEY (region_id);


--
-- Name: roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (rol_id);


--
-- Name: sangre_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY sangre
    ADD CONSTRAINT sangre_pkey PRIMARY KEY (sangre_id);


--
-- Name: suero_donante_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY suero_donante
    ADD CONSTRAINT suero_donante_pkey PRIMARY KEY (donante_id);


--
-- Name: suero_paciente_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY suero_paciente
    ADD CONSTRAINT suero_paciente_pk PRIMARY KEY (suero_pac_id);


--
-- Name: tipos_centros_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipos_centros
    ADD CONSTRAINT tipos_centros_pkey PRIMARY KEY (tipo_centro_id);


--
-- Name: tipos_dialisis_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipos_dialisis
    ADD CONSTRAINT tipos_dialisis_pkey PRIMARY KEY (dialisis_id);


--
-- Name: tipos_trasplantes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipos_trasplantes
    ADD CONSTRAINT tipos_trasplantes_pkey PRIMARY KEY (tipo_trasplante_id);


--
-- Name: user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- Name: usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (usuario_id);


--
-- Name: Relation_1; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_1" ON municipios USING btree (estado_id);


--
-- Name: Relation_10; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_10" ON hla_paciente USING btree (paciente_id);


--
-- Name: Relation_11; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_11" ON personal USING btree (cargo_id);


--
-- Name: Relation_12; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_12" ON personal USING btree (estatus_id);


--
-- Name: Relation_13; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_13" ON suero_donante USING btree (donante_id);


--
-- Name: Relation_14; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_14" ON examenes USING btree (paciente_id);


--
-- Name: Relation_15; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_15" ON personal_centro_hospitalario USING btree (centro_id);


--
-- Name: Relation_16; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_16" ON personal_centro_hospitalario USING btree (personal_id);


--
-- Name: Relation_17; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_17" ON region_estado USING btree (region_id);


--
-- Name: Relation_2; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_2" ON parroquias USING btree (municipio_id);


--
-- Name: Relation_20; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_20" ON region_estado USING btree (estado_id);


--
-- Name: Relation_21; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_21" ON suero_paciente USING btree (paciente_id);


--
-- Name: Relation_22; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_22" ON usuarios USING btree (rol_id);


--
-- Name: Relation_3; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_3" ON centros_hospitalarios USING btree (tipo_centro_id);


--
-- Name: Relation_33; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_33" ON pacientes USING btree (centro_id);


--
-- Name: Relation_34; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_34" ON usuarios USING btree (centro_id);


--
-- Name: Relation_37; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_37" ON usuarios USING btree (estatus_id);


--
-- Name: Relation_4; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_4" ON centros_hospitalarios USING btree (estado_id);


--
-- Name: Relation_5; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_5" ON centros_hospitalarios USING btree (municipio_id);


--
-- Name: Relation_6; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_6" ON centros_hospitalarios USING btree (parroquia_id);


--
-- Name: Relation_7; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_7" ON centros_hospitalarios USING btree (region_id);


--
-- Name: Relation_8; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_8" ON donantes USING btree (centro_id);


--
-- Name: Relation_9; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "Relation_9" ON pacientes USING btree (tipo_trasplante_id);


--
-- Name: paciente_condicion; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX paciente_condicion ON pacientes USING btree (condicion_id);


--
-- Name: paciente_estatus; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX paciente_estatus ON pacientes USING btree (estatus_id);


--
-- Name: centros_hospitalarios_estado_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY centros_hospitalarios
    ADD CONSTRAINT centros_hospitalarios_estado_id_fkey FOREIGN KEY (estado_id) REFERENCES estados(estado_id);


--
-- Name: centros_hospitalarios_municipio_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY centros_hospitalarios
    ADD CONSTRAINT centros_hospitalarios_municipio_id_fkey FOREIGN KEY (municipio_id) REFERENCES municipios(municipio_id);


--
-- Name: centros_hospitalarios_parroquia_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY centros_hospitalarios
    ADD CONSTRAINT centros_hospitalarios_parroquia_id_fkey FOREIGN KEY (parroquia_id) REFERENCES parroquias(parroquia_id);


--
-- Name: centros_hospitalarios_region_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY centros_hospitalarios
    ADD CONSTRAINT centros_hospitalarios_region_id_fkey FOREIGN KEY (region_id) REFERENCES regiones(region_id);


--
-- Name: centros_hospitalarios_tipo_centro_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY centros_hospitalarios
    ADD CONSTRAINT centros_hospitalarios_tipo_centro_id_fkey FOREIGN KEY (tipo_centro_id) REFERENCES tipos_centros(tipo_centro_id);


--
-- Name: donantes_centro_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY donantes
    ADD CONSTRAINT donantes_centro_id_fkey FOREIGN KEY (centro_id) REFERENCES centros_hospitalarios(centro_id) DEFERRABLE;


--
-- Name: examenes_paciente_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY examenes
    ADD CONSTRAINT examenes_paciente_id_fkey FOREIGN KEY (paciente_id) REFERENCES pacientes(paciente_id);


--
-- Name: hla_paciente_paciente_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY hla_paciente
    ADD CONSTRAINT hla_paciente_paciente_id_fkey FOREIGN KEY (paciente_id) REFERENCES pacientes(paciente_id);


--
-- Name: municipios_estado_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY municipios
    ADD CONSTRAINT municipios_estado_id_fkey FOREIGN KEY (estado_id) REFERENCES estados(estado_id);


--
-- Name: pacientes_centro_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pacientes
    ADD CONSTRAINT pacientes_centro_id_fkey FOREIGN KEY (centro_id) REFERENCES centros_hospitalarios(centro_id);


--
-- Name: pacientes_condicion_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pacientes
    ADD CONSTRAINT pacientes_condicion_id_fkey FOREIGN KEY (condicion_id) REFERENCES condicion_paciente(condicion_id);


--
-- Name: pacientes_estatus_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pacientes
    ADD CONSTRAINT pacientes_estatus_id_fkey FOREIGN KEY (estatus_id) REFERENCES estatus_pac(estatus_id);


--
-- Name: pacientes_tipo_trasplante_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pacientes
    ADD CONSTRAINT pacientes_tipo_trasplante_id_fkey FOREIGN KEY (tipo_trasplante_id) REFERENCES tipos_trasplantes(tipo_trasplante_id);


--
-- Name: parroquias_municipio_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY parroquias
    ADD CONSTRAINT parroquias_municipio_id_fkey FOREIGN KEY (municipio_id) REFERENCES municipios(municipio_id);


--
-- Name: personal_cargo_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personal
    ADD CONSTRAINT personal_cargo_id_fkey FOREIGN KEY (cargo_id) REFERENCES cargos(cargo_id);


--
-- Name: personal_centro_hospitalario_centro_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personal_centro_hospitalario
    ADD CONSTRAINT personal_centro_hospitalario_centro_id_fkey FOREIGN KEY (centro_id) REFERENCES centros_hospitalarios(centro_id);


--
-- Name: personal_centro_hospitalario_personal_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personal_centro_hospitalario
    ADD CONSTRAINT personal_centro_hospitalario_personal_id_fkey FOREIGN KEY (personal_id) REFERENCES personal(personal_id);


--
-- Name: personal_estatus_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personal
    ADD CONSTRAINT personal_estatus_id_fkey FOREIGN KEY (estatus_id) REFERENCES estatus_per(estatus_id);


--
-- Name: region_estado_estado_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY region_estado
    ADD CONSTRAINT region_estado_estado_id_fkey FOREIGN KEY (estado_id) REFERENCES estados(estado_id);


--
-- Name: region_estado_region_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY region_estado
    ADD CONSTRAINT region_estado_region_id_fkey FOREIGN KEY (region_id) REFERENCES regiones(region_id);


--
-- Name: suero_donante_donante_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY suero_donante
    ADD CONSTRAINT suero_donante_donante_id_fkey FOREIGN KEY (donante_id) REFERENCES donantes(donante_id);


--
-- Name: suero_paciente_paciente_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY suero_paciente
    ADD CONSTRAINT suero_paciente_paciente_id_fkey FOREIGN KEY (paciente_id) REFERENCES pacientes(paciente_id);


--
-- Name: tipo_trasplante_usuario_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT tipo_trasplante_usuario_fk FOREIGN KEY (tipo_trasplante_id) REFERENCES tipos_trasplantes(tipo_trasplante_id);


--
-- Name: usuarios_centro_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_centro_id_fkey FOREIGN KEY (centro_id) REFERENCES centros_hospitalarios(centro_id);


--
-- Name: usuarios_estatus_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_estatus_id_fkey FOREIGN KEY (estatus_id) REFERENCES estatus_usr(estatus_id);


--
-- Name: usuarios_rol_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_rol_id_fkey FOREIGN KEY (rol_id) REFERENCES roles(rol_id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

