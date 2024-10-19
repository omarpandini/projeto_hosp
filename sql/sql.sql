
drop table if exists hosp_avaliacoes;
drop table if exists hosp_setor;
drop table if exists hosp_perguntas;
drop table if exists hosp_dispositivos;

CREATE TABLE hosp_setor
(
    id_setor SERIAL PRIMARY KEY,
    ds_setor VARCHAR(255) NOT NULL
);

CREATE TABLE hosp_perguntas (
    id_pergunta SERIAL PRIMARY KEY,
    ds_pergunta TEXT NOT NULL,
    status_pergunta VARCHAR(1) 
);

CREATE TABLE hosp_dispositivos (
    id_dispositivo SERIAL PRIMARY KEY,
    nome_dispositivo VARCHAR(255) NOT NULL,
    status_dispositivo VARCHAR(1) 
);

CREATE TABLE hosp_avaliacoes (
    id_avaliacao SERIAL PRIMARY KEY,
    id_setor INT NOT NULL,
    id_pergunta INT NOT NULL,
    id_dispositivo INT NOT NULL,
    nr_resposta INT NOT NULL,
    ds_feedback TEXT,
    dt_hora_avaliacao TIMESTAMP NOT NULL,
    CONSTRAINT fk_setor FOREIGN KEY (id_setor) REFERENCES hosp_setor(id_setor),
    CONSTRAINT fk_pergunta FOREIGN KEY (id_pergunta) REFERENCES hosp_perguntas(id_pergunta),
    CONSTRAINT fk_dispositivo FOREIGN KEY (id_dispositivo) REFERENCES hosp_dispositivos(id_dispositivo)
);


