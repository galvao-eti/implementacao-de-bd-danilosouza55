-- Table: public.professor_pos

-- DROP TABLE public.professor_pos;
DROP TABLE IF EXISTS public.professor_pos;

CREATE TABLE public.professor_pos
(
    id             SERIAL NOT NULL,
    nome           character varying(255) COLLATE pg_catalog."default",
    codigo_interno integer,
    CONSTRAINT professor_pos_pkey PRIMARY KEY (id)
)
    WITH (
        OIDS = FALSE
    )
    TABLESPACE pg_default;

ALTER TABLE public.professor_pos
    OWNER to sistema;

INSERT INTO public.professor_pos (nome, codigo_interno)
values ('galvão', 30),
       ('Burnes', 31);
