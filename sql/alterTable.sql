ALTER TABLE reviews DROP COLUMN title;

ALTER TABLE films CHANGE COLUMN genre summary VARCHAR(100) NULL DEFAULT NULL;

ALTER TABLE films MODIFY summary VARCHAR(500);