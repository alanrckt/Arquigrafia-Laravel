insert into arquigrafia.users (id, name, login, email, password, oldPassword, photo, created_at, updated_at)
select id, name, login, email, encryptedPassword, encryptedPassword, photoURL, creationDate, updateAt
from groupware_workbench_arquigrafia.gw_collab_User 
where id not in (select user_id from groupware_workbench_arquigrafia.gw_collab_Profile);

insert into arquigrafia.users (id, name, lastName, login, gender, email, password, oldPassword, 
	country, state, city, address, birthday, scholarity, photo, phone, site, created_at, updated_at)
select u.id, name, secondName, login, gender, email, encryptedPassword, encryptedPassword, 
	country, stateOrProvince, city, address, birthday, scholarity, photoURL, phone, webPage, creationDate, updateAt
from groupware_workbench_arquigrafia.gw_collab_User u, groupware_workbench_arquigrafia.gw_collab_Profile p
	where u.id = p.user_id;

insert into arquigrafia.occupation (institution, occupation, user_id)
select institution, occupation, user_id from groupware_workbench_arquigrafia.gw_collab_Profile;

insert into arquigrafia.photos (id, aditionalImageComments, allowCommercialUses, allowModifications, 
	cataloguingTime, characterization, city, collection, country, dataCriacao, dataUpload, deleted, 
	description, district, imageAuthor, name, nome_arquivo, state, street, tombo, workAuthor, workdate, 
	user_id, created_at, updated_at)
select id, aditionalImageComments, allowCommercialUses, allowModifications, cataloguingTime, characterization, 
		city, collection, country, dataCriacao, dataUpload, deleted, description, district, imageAuthor, name, 
		nome_arquivo, state, street, tombo, workAuthor, workdate, users_id, now(), now() 
from groupware_workbench_arquigrafia.Photo, groupware_workbench_arquigrafia.Photo_gw_collab_User where Photo_id = id;

insert into arquigrafia.albums (id, creationDate, description, title, urlCover, owner_id)
select id, creationDate, description, title, urlCover, owner_id from groupware_workbench_arquigrafia.gw_collab_Album;

insert into arquigrafia.album_elements (album_id, photo_id)
select Album_id, idReferencedClass from groupware_workbench_arquigrafia.gw_collab_Album_Elements;

insert into arquigrafia.binomial (id, defaultValue, firstDescription, firstLink, firstName, secondDescription,
	secondLink, secondName)
select id, defaultValue, firstDescription, firstLink, firstName, secondDescription, secondLink, secondName 
	from groupware_workbench_arquigrafia.gw_collab_Binomial;

insert into arquigrafia.binomial_evaluation (id, photo_id, evaluationPosition, binomial_id, user_id)
select id, idReferencedClass, evaluationPosition, binomial_id, user_id 
	from groupware_workbench_arquigrafia.gw_collab_Binomial_Evaluation;

insert into arquigrafia.comment (id, postDate, text, user_id, photo_id)
select id, postDate, text, user_id, idReferencedClass from groupware_workbench_arquigrafia.gw_collab_Comment;

insert into arquigrafia.counter (id, dataCriacao, value, photo_id)
select id, dataCriacao, value, idReferencedClass from groupware_workbench_arquigrafia.gw_collab_Counter;

insert into arquigrafia.counterlog (id, accessDate, counter_id, viewer_id)
select id, accessDate, counter_id, viewer_id from groupware_workbench_arquigrafia.CounterLog;

insert into arquigrafia.counter_counterlog (counter_id, counterlog_id)
select gw_collab_Counter_id, CounterLogs_id from groupware_workbench_arquigrafia.gw_collab_Counter_CounterLog;

insert into arquigrafia.external_account (id, accessToken, accountType, tokenSecret, user_id)
select id, accessToken, accountType, tokenSecret, user_id from groupware_workbench_arquigrafia.gw_collab_External_Account;

insert into arquigrafia.friendship (id, user_id)
select id, user_id from groupware_workbench_arquigrafia.gw_collab_Friendship;

insert into arquigrafia.friends (friends_id, user_id)
select friends_id, user_id from groupware_workbench_arquigrafia.gw_collab_Friends;

insert into arquigrafia.friends_requests (friends_id, user_id)
select friends_id, user_id from groupware_workbench_arquigrafia.gw_collab_Friends_Requests;

insert into arquigrafia.role (id, name)
select id, name from groupware_workbench_arquigrafia.gw_collab_Role;

insert into arquigrafia.tag (id, count, name)
select id, count, name from groupware_workbench_arquigrafia.gw_collab_Tag;

insert into arquigrafia.tag_assignments (tag_id, photo_id)
select Tag_id, idReferencedClass from groupware_workbench_arquigrafia.gw_collab_Tag_Assignments;

insert into arquigrafia.users_roles (user_id, role_id)
select gw_collab_User_id, roles_id from groupware_workbench_arquigrafia.gw_collab_users_roles;

insert into arquigrafia.faq (id, pergunta, resposta)
select id, pergunta, resposta from groupware_workbench_arquigrafia.Faq;