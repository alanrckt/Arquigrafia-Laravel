alter table albums drop column urlCover;
alter table albums add column cover_id bigint(20) unsigned;
alter table albums add constraint album_photo_cover_id_foreign FOREIGN KEY (cover_id) REFERENCES photos(id);

update albums a set cover_id = (select photo_id from album_elements where album_id = a.id and album_id in (select album_id from album_elements group by album_id having count(photo_id) > 0) limit 1) where cover_id is null;