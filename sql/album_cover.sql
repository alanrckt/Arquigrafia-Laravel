alter table albums drop column urlCover;
alter table albums add column cover_id bigint(20) unsigned;
alter table albums add constraint album_photo_cover_id_foreign FOREIGN KEY (cover_id) REFERENCES photos(id);