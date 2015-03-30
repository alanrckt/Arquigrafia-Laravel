alter table photos
	add column deleted_at timestamp null;

update photos set deleted_at = now() 
	where id in (select id from (select id from photos where deleted = 1) as t);	