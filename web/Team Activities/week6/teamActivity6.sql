CREATE TABLE topic (
  id    SERIAL,
  name  VARCHAR(255) CONSTRAINT nn_topic_1 NOT NULL,
  CONSTRAINT pk_topic_1 PRIMARY KEY(id));


INSERT INTO topic
(name)
VALUES
('charity');

INSERT INTO topic
(name)
VALUES
('sacrifice');

INSERT INTO topic
(name)
VALUES
('faith');

CREATE TABLE topic_scripture(
  ts_id       	SERIAL
,	topic_id    	INT CONSTRAINT nn_ts_1 NOT NULL
,	scripture_id  INT CONSTRAINT nn_ts_1 NOT NULL
, CONSTRAINT pk_ts_1 PRIMARY KEY(ts_id)
, CONSTRAINT fk_ts_1 FOREIGN KEY(topic_id) REFERENCES topic(id)
,	CONSTRAINT fk_ts_2 FOREIGN KEY(scripture_id) REFERENCES scriptures(id));
