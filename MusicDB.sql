DROP TABLE GENRE;

DROP TABLE PODCASTS;

DROP TABLE FEATURES;

DROP TABLE SONG;

DROP TABLE ALBUM;

DROP TABLE ARTIST;

DROP TABLE PLAYS;

DROP TABLE PLAYLIST;

DROP TABLE USERS_TABLE;

CREATE TABLE USERS_TABLE (
    user_id INT NOT NULL,
    username VARCHAR(20) NOT NULL,
    email VARCHAR(35) NOT NULL,
    password VARCHAR(15) NOT NULL,
    country VARCHAR(20) NOT NULL,
    age INT NOT NULL,
    PRIMARY KEY (user_id) 
);

CREATE TABLE PLAYLIST (
    playlist_id INT NOT NULL,
    name VARCHAR(20) NOT NULL,
    creation_date VARCHAR(20) NOT NULL,
    original_owner VARCHAR(20) NOT NULL,
    PRIMARY KEY (playlist_id) 
);

CREATE TABLE PLAYS(
    user_id INT NOT NULL,
    playlist_id INT NOT NULL,
    last_accessed VARCHAR(20),
    FOREIGN KEY (user_id) REFERENCES USERS_TABLE(user_id) ON DELETE CASCADE,
    FOREIGN KEY (playlist_id) REFERENCES PLAYLIST(playlist_id)  ON DELETE CASCADE
);

CREATE TABLE ARTIST(
    artist_id INT NOT NULL,
    name VARCHAR(20) NOT NULL,
    country VARCHAR(20) NOT NULL,
    PRIMARY KEY (artist_id)
);

CREATE TABLE ALBUM(
    album_id INT NOT NULL,
    name VARCHAR(20) NOT NULL,
    artist_id INT NOT NULL,
    PRIMARY KEY (album_id) ,
    FOREIGN KEY (artist_id) REFERENCES ARTIST(artist_id) ON DELETE CASCADE
);

CREATE TABLE SONG(
    song_id INT NOT NULL,
    title VARCHAR(20) NOT NULL,
    duration VARCHAR(15) NOT NULL,
    release_date VARCHAR(20) NOT NULL,
    album_id INT NOT NULL,
    PRIMARY KEY (song_id) ,
    FOREIGN KEY (album_id) REFERENCES ALBUM(album_id) ON DELETE CASCADE 
);

CREATE TABLE FEATURES (
    playlist_id INT NOT NULL,
    song_id INT NOT NULL,
    song_played INT NOT NULL,
    FOREIGN KEY (song_id) REFERENCES SONG(song_id) ON DELETE CASCADE ,
    FOREIGN KEY (playlist_id) REFERENCES PLAYLIST(playlist_id) ON DELETE CASCADE 
);

CREATE TABLE PODCASTS (
    podcast_id INT NOT NULL,
    duration VARCHAR(15) NOT NULL,
    type VARCHAR(20) NOT NULL,
    artist_id INT NOT NULL,
    FOREIGN KEY (artist_id) REFERENCES ARTIST(artist_id) ON DELETE CASCADE 
);

CREATE TABLE GENRE (
    name VARCHAR(15) NOT NULL,
    description VARCHAR(200) NOT NULL,
    song_id INT NOT NULL,
    FOREIGN KEY (song_id) REFERENCES SONG(song_id) ON DELETE CASCADE 
);

INSERT INTO USERS_TABLE(user_id, username, email, password, country, age) VALUES
(1,'SHIHAB', 'shihab.newaz.563@gmail.com', '1234','Bangladesh',23 );
INSERT INTO USERS_TABLE(user_id, username, email, password, country, age) VALUES
(2,'FAHIM', 'fahim@gmail.com', '40728147','Bangladesh',24);
INSERT INTO USERS_TABLE(user_id, username, email, password, country, age) VALUES
(3,'PIYAS', 'piyas@gmail.com', '4075357','Bangladesh',24);
INSERT INTO USERS_TABLE(user_id, username, email, password, country, age) VALUES
(4,'Mahin', 'Mahin@gmail.com', '44343axsa','Bangladesh',22);

INSERT INTO ARTIST(artist_id, name, country)
VALUES (1, 'The Weeknd', 'USA');
INSERT INTO ARTIST(artist_id, name, country)
VALUES (2, 'Taylor Swift', 'USA');
INSERT INTO ARTIST(artist_id, name, country)
VALUES (3, 'Ariana Grande', 'USA');
INSERT INTO ARTIST(artist_id, name, country)
VALUES (4, 'Dua lipa', 'UK');
INSERT INTO ARTIST(artist_id, name, country)
VALUES (5, 'Benny Blanco', 'Spain');
INSERT INTO ARTIST(artist_id, name, country)
VALUES (6, 'Camilla Cabello', 'Cuba');
INSERT INTO ARTIST(artist_id, name, country)
VALUES (7, 'Charlie Puth', 'USA');
INSERT INTO ARTIST(artist_id, name, country)
VALUES (8, 'A.R Rahman', 'India');
INSERT INTO ARTIST(artist_id, name, country)
VALUES (9, 'Eminem', 'USA');
INSERT INTO ARTIST(artist_id, name, country)
VALUES (10, 'Dr.Dre', 'USA');
INSERT INTO ARTIST(artist_id, name, country)
VALUES (11, 'K.K', 'India');

--Inserting data into ALBUM after adding a column and renaming that column
ALTER TABLE ALBUM ADD year INT NOT NULL;
ALTER TABLE ALBUM RENAME COLUMN year to release_year ;
DESCRIBE ALBUM;
INSERT INTO ALBUM(album_id, name, artist_id,release_year)
VALUES (1, 'After Hours', 1, 2020);
INSERT INTO ALBUM(album_id, name, artist_id,release_year)
VALUES (2, 'Dawn FM', 1, 2022);
INSERT INTO ALBUM(album_id, name, artist_id,release_year)
VALUES (11, 'Red', 2, 2021);
INSERT INTO ALBUM(album_id, name, artist_id,release_year)
VALUES (12, '1989', 2, 2014);
INSERT INTO ALBUM(album_id, name, artist_id,release_year)
VALUES (31, 'Sweetener', 3, 2018);
INSERT INTO ALBUM(album_id, name, artist_id,release_year)
VALUES (32, 'Thank u,next', 3, 2019);
INSERT INTO ALBUM(album_id, name, artist_id,release_year)
VALUES (21, 'Future Nostalgia', 4, 2021);
INSERT INTO ALBUM(album_id, name, artist_id,release_year)
VALUES (41, 'Familia', 6, 2022);
INSERT INTO ALBUM(album_id, name, artist_id,release_year)
VALUES (42, 'Senorita', 6, 2019);
INSERT INTO ALBUM(album_id, name, artist_id,release_year)
VALUES (61, 'Voicenotes', 7, 2018);
INSERT INTO ALBUM(album_id, name, artist_id,release_year)
VALUES (71, 'Revival', 9, 2013);
INSERT INTO ALBUM(album_id, name, artist_id,release_year)
VALUES (72, 'Marshall Mathers LP1', 9, 2011);

INSERT INTO PODCASTS(podcast_id, duration, type, artist_id)
VALUES (1, '40:00', 'Interview', 1);
INSERT INTO PODCASTS(podcast_id, duration, type, artist_id)
VALUES (2, '45:00', 'Storytelling', 3);
INSERT INTO PODCASTS(podcast_id, duration, type, artist_id)
VALUES (3, '40:00', 'Monologue', 5);
INSERT INTO PODCASTS(podcast_id, duration, type, artist_id)
VALUES (4, '40:00', 'Conversational', 9);

--Inserting data into SONG after modifying a column and adding a column
ALTER TABLE SONG MODIFY(release_date DATE);
ALTER TABLE SONG ADD ratings FLOAT;
DESCRIBE SONG;
INSERT INTO SONG(song_id,title,duration,release_date,album_id,ratings)
VALUES (100, 'Save Your Tears', '3:35', TO_DATE('2020-MAY-23','YYYY-MON-DD'), 1, 9.5);
INSERT INTO SONG(song_id,title,duration,release_date,album_id,ratings)
VALUES(102, 'Blinding Lights', '3:31', TO_DATE('2020-MAY-23','YYYY-MON-DD'), 1, 9.9);
INSERT INTO SONG(song_id,title,duration,release_date,album_id,ratings)
VALUES(201, 'Blank Space', '3:51', TO_DATE('2014-JUNE-23','YYYY-MON-DD'), 12, 9.9);
INSERT INTO SONG(song_id,title,duration,release_date,album_id,ratings)
VALUES(202, 'Levitating', '3:24', TO_DATE('2021-SEPTEMBER-11','YYYY-MON-DD'), 21, 9.4);
INSERT INTO SONG(song_id,title,duration,release_date,album_id,ratings)
VALUES(301, 'No tears left to cry', '3:33', TO_DATE('2018-FEBRUARY-25','YYYY-MON-DD'), 31, 8.9); 
INSERT INTO SONG(song_id,title,duration,release_date,album_id,ratings)
VALUES(302, 'Thank u,next', '4:45', TO_DATE('2019-MARCH-22','YYYY-MON-DD'), 32, 8.7); 
INSERT INTO SONG(song_id,title,duration,release_date,album_id,ratings)
VALUES(702, 'Love the way you lie', '3:42', TO_DATE('2011-JANUARY-01','YYYY-MON-DD'), 71, 10.0); 
INSERT INTO SONG(song_id,title,duration,release_date,album_id,ratings)
VALUES(703, 'Monster', '2:22', TO_DATE('2011-JANUARY-01','YYYY-MON-DD'), 71, 7.9);


--Inserting data into PLAYLIST after modifying a column
ALTER TABLE PLAYLIST MODIFY(creation_date DATE);

INSERT INTO  PLAYLIST(playlist_id, name, creation_date, original_owner) 
VALUES(10, 'New Releases', TO_DATE('2020-NOVEMBER-03','YYYY-MON-DD'), 'NEWAZ');
INSERT INTO  PLAYLIST(playlist_id, name, creation_date, original_owner) 
VALUES(11, 'Summer', TO_DATE('2021-DECEMBER-25','YYYY-MON-DD'), 'GATEN');
INSERT INTO  PLAYLIST(playlist_id, name, creation_date, original_owner) 
VALUES(12, 'Made For You', TO_DATE('2022-JULY-08','YYYY-MON-DD'), 'KASEY');
INSERT INTO  PLAYLIST(playlist_id, name, creation_date, original_owner) 
VALUES(13, 'Workout', TO_DATE('2022-JULY-08','YYYY-MON-DD'), 'KYLE');


INSERT INTO PLAYS(user_id, playlist_id, last_accessed)
 VALUES(1, 10, '2022-07-02');
INSERT INTO PLAYS(user_id, playlist_id, last_accessed)
 VALUES(2, 11, '2022-07-03');
 INSERT INTO PLAYS(user_id, playlist_id, last_accessed)
 VALUES(3, 11, '2021-05-22');

INSERT INTO FEATURES(playlist_id, song_id, song_played)
VALUES(10, 703, 1000543);
INSERT INTO FEATURES(playlist_id, song_id, song_played)
VALUES(11, 201, 111000543);
INSERT INTO FEATURES(playlist_id, song_id, song_played)
VALUES(12, 301, 680003433);
INSERT INTO FEATURES(playlist_id, song_id, song_played)
VALUES(12, 202, 2001300);

--adding a temporary column and then dropping it 
ALTER TABLE GENRE ADD dummy_column VARCHAR(20) NOT NULL;
DESCRIBE GENRE;
ALTER TABLE GENRE DROP COLUMN dummy_column;
DESCRIBE GENRE;
INSERT INTO GENRE(name, description, song_id)
VALUES
( 'Rock',
'Rock music is a broad genre of popular music that originated as rock and roll in the United States in the late 1940s and early 1950s',
 100 );
 INSERT INTO GENRE(name, description, song_id)
VALUES
( 'Jazz',
'Jazz is a music genre that originated in the African-American communities of New Orleans,
 Louisiana, United States, in the late 19th and early 20th centuries, with its roots in blues and ragtime',
 102 );
 INSERT INTO GENRE(name, description, song_id)
VALUES
( 'Pop',
'A type of music, usually played on electronic instruments, that is popular with many people because 
 it consists of short songs with a strong beat and simple tunes that are easy to remember',
 201 );

DESCRIBE  USERS_TABLE;
DESCRIBE  PLAYLIST;
DESCRIBE  ARTIST;
DESCRIBE  ALBUM;
DESCRIBE  PODCASTS;
DESCRIBE  FEATURES;
DESCRIBE  PLAYS;
DESCRIBE  GENRE;


SELECT * FROM USERS_TABLE;
SELECT * FROM PLAYLIST;
SELECT * FROM ARTIST;
SELECT * FROM ALBUM;
SELECT * FROM SONG;
SELECT * FROM PODCASTS;
SELECT * FROM FEATURES;
SELECT * FROM PLAYS;
SELECT * FROM GENRE;

--Updating records from SONG table
UPDATE SONG SET ratings=8.5 WHERE song_id=101;
SELECT * FROM SONG;

--Deleting records from SONG table
DELETE FROM SONG where song_id=101;
SELECT * FROM SONG;


--applying conditions to SELECT clause
SELECT title,duration,ratings FROM SONG;
SELECT name,artist_id,release_year FROM ALBUM WHERE album_id=31;

--range search
SELECT * FROM features WHERE song_played BETWEEN 1000000 AND 10000000;
SELECT name,artist_id,release_year FROM ALBUM WHERE release_year>=2018 AND release_year<2022; 

--pattern matching

SELECT podcast_id,duration, artist_id FROM PODCASTS
WHERE type LIKE '%Monologue%';

--setting membership

SELECT album_id,name,release_year FROM ALBUM WHERE release_year IN (2018,2021,2022);

--sorting
SELECT * FROM SONG ORDER BY release_date;
SELECT * FROM ALBUM ORDER BY release_year DESC;

--aggregate functions
SELECT MAX(song_played),MIN(song_played) FROM FEATURES;
SELECT COUNT(age),SUM(age),AVG(age) FROM USERS_TABLE;

--group by clause
SELECT song_id,COUNT(release_date) FROM SONG GROUP BY song_id;

--having clause
SELECT artist_id,COUNT(album_id) from ALBUM
GROUP BY artist_id HAVING COUNT(album_id)>1;

SELECT creation_date,COUNT(playlist_id) FROM PLAYLIST 
GROUP BY creation_date HAVING count(playlist_id)>1;

--nested query
SELECT name,country FROM ARTIST WHERE artist_id IN 
(SELECT artist_id FROM ARTIST WHERE artist_id>1 AND artist_id<6);

SELECT username FROM USERS_TABLE WHERE user_id IN
(SELECT user_id FROM USERS_TABLE WHERE country='Bangladesh' AND age>22);

--Set operations
--UNION ALL
SELECT name from ALBUM WHERE  release_year=2019
UNION ALL       
SELECT a.name from ALBUM a
WHERE a.artist_id=1;

--UNION
select name from ARTIST
WHERE  country LIKE '%USA%'
UNION  
SELECT a.name from ARTIST a
where a.name IN(
SELECT name FROM ARTIST WHERE country='India');

--INTERSECTION
select name from ARTIST
WHERE  country LIKE '%USA%'
INTERSECT  
SELECT a.name from ARTIST a
where a.name IN(
SELECT x.name FROM ARTIST x,PODCASTS p  WHERE x.artist_id=p.artist_id);

--MINUS
select name from ARTIST
WHERE  country LIKE '%USA%'
MINUS  
SELECT a.name from ARTIST a
WHERE a.name IN(
SELECT x.name FROM ARTIST x,PODCASTS p  WHERE x.artist_id=p.artist_id);

--JOIN 
SELECT ar.name,al.name,country,release_year FROM ARTIST ar JOIN ALBUM al
USING(artist_id) WHERE release_year>2015;

--NATURAL JOIN
SELECT name AS album_name,title,release_date,ratings,release_year 
FROM ALBUM NATURAL JOIN SONG
 WHERE ratings>=9.0;

--CROSS JOIN
SELECT last_accessed,username FROM USERS_TABLE CROSS JOIN PLAYS;

--FULL OUTER JOIN
SELECT g.name AS genre_name,s.title
FROM GENRE g FULL OUTER JOIN SONG s ON s.song_id=g.song_id;

--PL/SQL 
--finding artist of the song that is played the most in a playlist
SET SERVEROUTPUT ON
DECLARE
maxplayed FEATURES.song_played%TYPE;
maxplayed_song_id FEATURES.song_id%TYPE;
song_album_id SONG.album_id%TYPE;
song_artist_id ALBUM.artist_id%TYPE;
song_artist_name ARTIST.name%TYPE;

BEGIN
SELECT max(song_played) INTO maxplayed FROM FEATURES; 
SELECT song_id INTO maxplayed_song_id FROM FEATURES 
WHERE song_played=maxplayed;
SELECT album_id INTO song_album_id FROM SONG 
WHERE song_id=maxplayed_song_id;
SELECT artist_id INTO song_artist_id FROM ALBUM 
WHERE album_id=song_album_id;
SELECT name INTO song_artist_name FROM ARTIST 
WHERE artist_id=song_artist_id;

dbms_output.put_line ('The artist of the song that is 
played most is->'||song_artist_name||'');
END;
/

--PL/SQL normal loop example




--PL/SQL for loop and cursor
SET SERVEROUTPUT ON
DECLARE
    CURSOR artist_podcast IS 
    SELECT name,country,type,duration FROM ARTIST,PODCASTS
    WHERE ARTIST.artist_id=PODCASTS.artist_id;
    podcast_info artist_podcast%ROWTYPE;
    loopp NUMBER(2);

BEGIN
    OPEN artist_podcast;
    FOR loopp in 1..4
    LOOP
        FETCH artist_podcast into podcast_info;
        DBMS_OUTPUT.PUT_LINE('Artist name->'||podcast_info.name||
        ' Country->'||podcast_info.country||
        ' Podcast Type->'||podcast_info.type||
        ' Duration->'||podcast_info.duration||'');
    END LOOP;
    CLOSE artist_podcast;
END;
/