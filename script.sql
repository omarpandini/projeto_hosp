
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
    nr_nota_resposta INT,
    ds_feedback TEXT,
    dt_hora_avaliacao TIMESTAMP DEFAULT NOW(),
    CONSTRAINT fk_setor FOREIGN KEY (id_setor) REFERENCES hosp_setor(id_setor),
    CONSTRAINT fk_pergunta FOREIGN KEY (id_pergunta) REFERENCES hosp_perguntas(id_pergunta),
    CONSTRAINT fk_dispositivo FOREIGN KEY (id_dispositivo) REFERENCES hosp_dispositivos(id_dispositivo)
);

CREATE TABLE hosp_usuarios (
    id_usuario SERIAL PRIMARY KEY,
    cd_usuario VARCHAR(50) NOT NULL,
    ds_senha VARCHAR(255) NOT NULL
);


INSERT INTO hosp_setor (ds_setor) VALUES ('Emergência');
INSERT INTO hosp_setor (ds_setor) VALUES ('UTI');
INSERT INTO hosp_setor (ds_setor) VALUES ('Pediatria');
INSERT INTO hosp_setor (ds_setor) VALUES ('Cirurgia Geral');
INSERT INTO hosp_setor (ds_setor) VALUES ('Oncologia');
INSERT INTO hosp_setor (ds_setor) VALUES ('Cardiologia');
INSERT INTO hosp_setor (ds_setor) VALUES ('Neurologia');
INSERT INTO hosp_setor (ds_setor) VALUES ('Ginecologia');
INSERT INTO hosp_setor (ds_setor) VALUES ('Ortopedia');
INSERT INTO hosp_setor (ds_setor) VALUES ('Dermatologia');



INSERT INTO hosp_perguntas (ds_pergunta, status_pergunta) VALUES 
('Como você avaliaria a qualidade do atendimento recebido?', 'A'),
('A equipe médica foi atenciosa e prestativa?', 'A'),
('Você se sentiu bem informado sobre o seu tratamento?', 'A'),
('A infraestrutura do hospital atendeu às suas expectativas?', 'A'),
('O tempo de espera para atendimento foi adequado?', 'A'),
('Você recomendaria nosso hospital para amigos ou familiares?', 'A'),
('Como você avaliaria a limpeza das instalações?', 'A'),
('Os profissionais de enfermagem foram atenciosos e competentes?', 'A'),
('Você ficou satisfeito com a alimentação durante a internação?', 'A'),
('Há algo que você gostaria de sugerir para melhorar nossos serviços?', 'A');


-- Inserindo dispositivos com nome e status
INSERT INTO hosp_dispositivos (nome_dispositivo, status_dispositivo)
VALUES ('Tablet Recepção', 'A');

INSERT INTO hosp_dispositivos (nome_dispositivo, status_dispositivo)
VALUES ('Terminal Quarto 101', 'A');

INSERT INTO hosp_dispositivos (nome_dispositivo, status_dispositivo)
VALUES ('Totem Entrada', 'I');

INSERT INTO hosp_dispositivos (nome_dispositivo, status_dispositivo)
VALUES ('Computador Enfermagem', 'A');

INSERT INTO hosp_dispositivos (nome_dispositivo, status_dispositivo)
VALUES ('Terminal Quarto 202', 'A');

INSERT INTO hosp_dispositivos (nome_dispositivo, status_dispositivo)
VALUES ('Tablet UTI', 'I');

-- Mais exemplos de inserção
INSERT INTO hosp_dispositivos (nome_dispositivo, status_dispositivo)
VALUES ('Totem Recepção Central', 'A');

INSERT INTO hosp_dispositivos (nome_dispositivo, status_dispositivo)
VALUES ('Tablet Pediatria', 'I');

INSERT INTO hosp_dispositivos (nome_dispositivo, status_dispositivo)
VALUES ('Computador Cirurgia', 'A');

INSERT INTO hosp_dispositivos (nome_dispositivo, status_dispositivo)
VALUES ('Terminal Emergência', 'I');






