--CREATE THE SYSTEM_USER TABLE
--
--
CREATE TABLE system_user (
	system_user_id  	INT 					CONSTRAINT nn_su_1 	NOT NULL,
	username 					VARCHAR(80) 	CONSTRAINT nn_su_2 	NOT NULL,
	password 					VARCHAR(80) 	CONSTRAINT nn_su_3 	NOT NULL,
	email							VARCHAR(80)		CONSTRAINT nn_su_4 	NOT NULL,
	first_name				VARCHAR(80) 	CONSTRAINT nn_su_5 	NOT NULL,
	last_name					VARCHAR(80)	 	CONSTRAINT nn_su_6 	NOT NULL,
	created_by				INT  					CONSTRAINT nn_su_7 	NOT NULL,
	creation_date	   	DATE         	CONSTRAINT nn_su_8 	NOT NULL,
	last_updated_by   INT  					CONSTRAINT nn_su_9 	NOT NULL,
	last_update_date  DATE 					CONSTRAINT nn_su_10 NOT NULL,
	CONSTRAINT pk_su_1 PRIMARY KEY (system_user_id)
);

CREATE SEQUENCE system_user_s1 START 1001;

INSERT INTO system_user
VALUES(
	nextval('system_user_s1')
,	'ronald1195'
,   'cangetin'
,		'mun16012@byui.edu'
,   'Ronald'
,   'Muñoz'
,   1001
,   current_date
,   1001
,   current_date
);

ALTER TABLE system_user
ADD	CONSTRAINT fk_su_1 FOREIGN KEY (created_by) REFERENCES system_user(system_user_id),
ADD	CONSTRAINT fk_su_2 FOREIGN KEY (last_updated_by) REFERENCES system_user(system_user_id);

--CREATE THE CLIENT TABLE
--
--
CREATE TABLE client(
	client_id					INT 					CONSTRAINT nn_client_1 		NOT NULL,
	client_name				VARCHAR(80)		CONSTRAINT nn_client_2		NOT NULL,
	created_by				INT  					CONSTRAINT nn_client_3		NOT NULL,
	creation_date	   	DATE         	CONSTRAINT nn_client_4		NOT NULL,
	last_updated_by   INT  					CONSTRAINT nn_client_5 		NOT NULL,
	last_update_date  DATE 					CONSTRAINT nn_client_6 		NOT NULL,
	CONSTRAINT pk_client_1 PRIMARY KEY (client_id),
	CONSTRAINT fk_client_1 FOREIGN KEY (client_id) REFERENCES system_user(system_user_id),
	CONSTRAINT fk_client_2 FOREIGN KEY (created_by) REFERENCES system_user(system_user_id),
	CONSTRAINT fk_client_3 FOREIGN KEY (last_updated_by) REFERENCES system_user(system_user_id)
	);

	CREATE SEQUENCE client_s1 START 1001;

--CREATE THE PROJECT TABLE
--
--
CREATE TABLE project (
	project_id  			INT 					CONSTRAINT nn_project_1 	NOT NULL,
	project_name 			VARCHAR(80) 	CONSTRAINT nn_project_2 	NOT NULL,
	crop		 					VARCHAR(80) 	CONSTRAINT nn_project_3 	NOT NULL,
	client_id					INT  					CONSTRAINT nn_project_4 	NOT NULL,
	treatment					VARCHAR(80) 	CONSTRAINT nn_project_5 	NOT NULL,
	start_date				DATE	 				CONSTRAINT nn_project_6 	NOT NULL,
	end_date					DATE	 				CONSTRAINT nn_project_7 	NOT NULL,
	created_by				INT  					CONSTRAINT nn_project_8 	NOT NULL,
	creation_date	   	DATE         	CONSTRAINT nn_project_9 	NOT NULL,
	last_updated_by   INT  					CONSTRAINT nn_project_10 	NOT NULL,
	last_update_date  DATE 					CONSTRAINT nn_project_11 	NOT NULL,
	CONSTRAINT pk_project_1 PRIMARY KEY (project_id),
	CONSTRAINT fk_project_1 FOREIGN KEY (client_id) REFERENCES client(client_id),
	CONSTRAINT fk_project_2 FOREIGN KEY (created_by) REFERENCES system_user(system_user_id),
	CONSTRAINT fk_project_3 FOREIGN KEY (last_updated_by) REFERENCES system_user(system_user_id)
);

CREATE SEQUENCE project_s1 START 1001;

--CREATE THE PROJECT_DETAIL TABLE
--
--
CREATE TABLE project_detail (
	project_detail_id 	INT 					CONSTRAINT nn_pd_1 		NOT NULL,
	project_id 					INT 					CONSTRAINT nn_pd_2 		NOT NULL,
	analyst		 					INT 					CONSTRAINT nn_pd_3 		NOT NULL,
	project_variable		VARCHAR(80)		CONSTRAINT nn_pd_4 		NOT NULL,
	replication					VARCHAR(80) 	CONSTRAINT nn_pd_5 		NOT NULL,
	created_by					INT  					CONSTRAINT nn_pd_6 		NOT NULL,
	creation_date	   		DATE         	CONSTRAINT nn_pd_7 		NOT NULL,
	last_updated_by   	INT  					CONSTRAINT nn_pd_8 		NOT NULL,
	last_update_date  	DATE 					CONSTRAINT nn_pd_9 		NOT NULL,
	CONSTRAINT pk_pd_1 PRIMARY KEY (project_detail_id),
	CONSTRAINT fk_pd_1 FOREIGN KEY (project_id) REFERENCES project(project_id),
	CONSTRAINT fk_pd_3 FOREIGN KEY (analyst) REFERENCES system_user(system_user_id),
	CONSTRAINT fk_pd_4 FOREIGN KEY (created_by) REFERENCES system_user(system_user_id),
	CONSTRAINT fk_pd_5 FOREIGN KEY (last_updated_by) REFERENCES system_user(system_user_id)
);

CREATE SEQUENCE pd_s1 START 1001;

--CREATE THE OBSERVATION TABLE
--
--
CREATE TABLE observation (
	observation_id 			INT 					CONSTRAINT nn_observation_1 		NOT NULL,
	project_detail_id 	INT 					CONSTRAINT nn_observation_2 		NOT NULL,
	data								VARCHAR				CONSTRAINT nn_observation_3 		NOT NULL,
	created_by					INT  					CONSTRAINT nn_observation_6 		NOT NULL,
	creation_date	   		DATE         	CONSTRAINT nn_observation_7 		NOT NULL,
	last_updated_by   	INT  					CONSTRAINT nn_observation_8 		NOT NULL,
	last_update_date  	DATE 					CONSTRAINT nn_observation_9 		NOT NULL,
	CONSTRAINT pk_observation_1 PRIMARY KEY (observation_id),
	CONSTRAINT fk_observation_1 FOREIGN KEY (project_detail_id) REFERENCES project_detail(project_detail_id),
	CONSTRAINT fk_observation_4 FOREIGN KEY (created_by) REFERENCES system_user(system_user_id),
	CONSTRAINT fk_observation_5 FOREIGN KEY (last_updated_by) REFERENCES system_user(system_user_id)
);

CREATE SEQUENCE observation_s1 START 1001;
