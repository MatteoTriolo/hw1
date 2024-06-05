-- Creazione del database
CREATE DATABASE my_app_db;

-- Utilizzo del database creato
USE my_app_db;

-- Creazione della tabella 'users'
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- Identificatore unico per ogni utente
    email VARCHAR(255) NOT NULL UNIQUE, -- Email dell'utente, deve essere unica
    password VARCHAR(255) NOT NULL      -- Password hashata dell'utente
);

select * from users;




CREATE TABLE prodotti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categoria VARCHAR(100) NOT NULL,
    titolo VARCHAR(255) NOT NULL,
    prezzo DECIMAL(10, 2) NOT NULL,
    url_immagine VARCHAR(255) NOT NULL,
    descrizione TEXT
);


-- Creazione tabella carrello
CREATE TABLE carrello (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    prodotto_id INT NOT NULL,
    quantita INT NOT NULL DEFAULT 1,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (prodotto_id) REFERENCES prodotti(id)
);

-- Creazione tabella wishlist
CREATE TABLE wishlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    prodotto_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (prodotto_id) REFERENCES prodotti(id)
);


INSERT INTO prodotti (categoria, titolo, prezzo, url_immagine, descrizione) 
VALUES 
('mouse', 'Razer DeathAdder V2', 69.99, 'https://example.com/deathadder.jpg', 'Il mouse da gioco più iconico'),
('sedie gaming', 'Razer Iskur', 499.99, 'https://example.com/iskur.jpg', 'La sedia gaming definitiva con supporto lombare'),
('luci da gaming', 'Razer Chroma RGB Strip', 29.99, 'https://example.com/chroma-strip.jpg', 'Striscia LED RGB per personalizzare il tuo setup'),
('cuffie', 'Razer BlackShark V2', 99.99, 'https://example.com/blackshark.jpg', 'Cuffie da gioco leggere e confortevoli'),
('tastiere', 'Razer BlackWidow V3', 139.99, 'https://example.com/blackwidow.jpg', 'Tastiera meccanica con switch Razer Green'),
('elementi da streaming', 'Razer Kiyo', 99.99, 'https://example.com/kiyo.jpg', 'Webcam con anello luminoso per streaming di alta qualità');


select*from prodotti;

-- Elimina la tabella prodotti
DROP TABLE IF EXISTS prodotti;

-- Ricrea la tabella prodotti con il nuovo campo quantita
CREATE TABLE prodotti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categoria VARCHAR(100) NOT NULL,
    titolo VARCHAR(255) NOT NULL,
    prezzo DECIMAL(10, 2) NOT NULL,
    url_immagine VARCHAR(255) NOT NULL,
    descrizione TEXT,
    quantita INT NOT NULL DEFAULT 0  -- Aggiunta del nuovo campo quantita
);

-- Inserisci nuovamente i dati nella tabella prodotti, includendo il campo quantita

-- Visualizza i dati nella tabella prodotti per confermare le modifiche
SELECT * FROM prodotti;
select quantita from prodotti ;
-- Inserimento di altri prodotti per tutte le categorie

-- Cuffie
INSERT INTO prodotti (categoria, titolo, prezzo, url_immagine, descrizione, quantita) VALUES
('Cuffie', 'Razer BlackShark V2 Pro (PS Edition)', 150, 'https://assets3.razerzone.com/YfOCuZ_xhmXCFoK5_BByssAGj1E=/1500x1000/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh5e%2Fhb9%2F9761352122398%2F240409-blackshark-v2-pro-ps-black-1500x1000-1.jpg', 'Cuffie da gaming wireless con audio THX Spatial Audio, microfono rimovibile con cancellazione del rumore attivo e batteria con autonomia fino a 24 ore.', 10),
('Cuffie', 'Razer BlackShark V2 Pro (Xbox Edition)', 200, 'https://assets3.razerzone.com/BtmBoWfMJWLxtJUsEAKRvRw46TE=/1500x1000/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh37%2Fhb2%2F9761352351774%2F240409-blackshark-v2-pro-xbox-black-1500x1000-1.jpg', 'Cuffie da gaming wireless progettate per Xbox con audio THX Spatial Audio, connessione wireless 2.4GHz senza ritardi e microfono rimovibile.', 5),
('Cuffie', 'Razer Kraken Kitty v2 (Black)', 350, 'https://assets3.razerzone.com/7b9umnG2Zmgr-5-k1UtbhRpZJa4=/1500x1000/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fhfb%2Fhd1%2F9631979044894%2F230808-kraken-kitty-v2-black-1500x1000-3.jpg', 'Cuffie da gaming con illuminazione RGB Chroma, auricolari con gel raffreddante e microfono flessibile con cancellazione del rumore.', 15),
('Cuffie', 'Razer Barracuda X (PUBG Edition)', 175, 'https://assets3.razerzone.com/fqPJrZ3gW6vKx6kppisqoER30_g=/1500x1000/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh7f%2Fh0a%2F9594534658078%2F230706-barracuda-x-pubg-1500x1000-1.jpg', 'Cuffie wireless leggere e confortevoli con audio immersivo, connessione Bluetooth 5.1 e compatibilità multi-piattaforma.', 8),
('Cuffie', 'Razer BlackShark V2 Pro (Xbox White)', 325, 'https://assets3.razerzone.com/JKehdtTbMp0lpqqoeqVNY9ZjNNk=/1500x1000/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fhd0%2Fhab%2F9761352515614%2F240409-blackshark-v2-pro-xbox-white-1500x1000-1.jpg', 'Cuffie da gaming progettate per Xbox con audio THX Spatial Audio, connessione wireless 2.4GHz senza ritardi e driver ottimizzati per Xbox.', 12);

-- Sedie
INSERT INTO prodotti (categoria, titolo, prezzo, url_immagine, descrizione, quantita) VALUES
('Sedie', 'Razer Iskur V2 (Black/Green)', 270, 'https://assets3.razerzone.com/_WF3jg2m4jnoLVqh02i63Wjk_Dk=/1500x1000/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh55%2Fh87%2F9717264744478%2F240109-iskur-v2-black-green-1500x1000-1.jpg', 'Sedia da gaming ergonomica con supporto lombare integrato, schiuma a densità multipla per il massimo comfort e poggiatesta regolabile.', 7),
('Sedie', 'Razer Iskur V2 (Black)', 175, 'https://assets3.razerzone.com/s36swI-FCU2tulks-LHfU7Qy_Zg=/1500x1000/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh73%2Fh32%2F9717265104926%2F240109-iskur-v2-black-1500x1000-1.jpg', 'Sedia da gaming con schienale ergonomico, braccioli regolabili 4D e supporto lombare regolabile per un comfort personalizzato.', 5),
('Sedie', 'Razer Iskur (Black)', 155, 'https://assets3.razerzone.com/Jrd00_GtpNo3aGJJmxd-n0M2tBc=/1500x1000/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh45%2Fh7a%2F9198275526686%2Fiskurblack-gallery-1500x1000-rsl5-1.jpg', 'Sedia da gaming con design ergonomico, supporto lombare regolabile e braccioli 4D per una postura comoda e supportata.', 10),
('Sedie', 'Razer Iskur (Black)', 235, 'https://assets3.razerzone.com/WWvyfFkFL0i90mSgkFxf_-bvmtA=/1500x1000/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh07%2Fh19%2F9439960825886%2Fiskurblack-gallery-1500x1000-rsl5-1.jpg', 'Sedia da gaming con schiuma memory foam, supporto lombare regolabile e design ergonomico per un comfort duraturo durante le lunghe sessioni di gioco.', 6),
('Sedie', 'Razer Iskur X', 155, 'https://assets3.razerzone.com/lUCWJ5aG3nbqD7SXyWdFfWw86RQ=/1500x1000/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh64%2Fhef%2F9184349290526%2Fiskur-x-gallery-1500x1000-04.jpg', 'Sedia da gaming resistente con schiuma ad alta densità, supporto lombare integrato e struttura rinforzata per una durata eccezionale.', 4);

-- Mouse
INSERT INTO prodotti (categoria, titolo, prezzo, url_immagine, descrizione, quantita)
VALUES
('Mouse', 'Razer Viper V3 Pro (Black)', 275.00, 'https://assets3.razerzone.com/r87LHu8yGOlblVrHuF120jc2cXg=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh08%2Fh61%2F9765618188318%2Fviper-v3-pro-black-500x500.png', 'Mouse wireless ultraleggero con sensore ottico da 20000 DPI e switch Razer HyperSpeed per connettività wireless a bassa latenza.', 10),
('Mouse', 'Razer DeathAdder V2 X Hyperspeed', 275.00, 'https://assets3.razerzone.com/iRRByKkLlSHNsIJ1_i72IKl0XLk=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fhe8%2Fh51%2F9250345058334%2Fdeathadder-v2-x-hyperspeed-500x500.png', 'Mouse gaming wireless con sensore ottico da 20000 DPI, switch meccanici Razer Optical Mouse e connettività wireless Hyperspeed.', 10),
('Mouse', 'Razer Basilisk V3 Pro (Black)', 275.00, 'https://assets3.razerzone.com/XianHhS4aWPIr4UJLTatssIfkZI=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fha0%2Fhb6%2F9529652445214%2Fbasilisk-v3-pro-black-2-500x500.png', 'Mouse gaming wireless con sensore ottico da 26000 DPI, switch meccanici Razer Optical Mouse e rotella di scorrimento personalizzabile.', 10),
('Mouse', 'Razer Naga Left-Handed', 275.00, 'https://assets3.razerzone.com/vO3VjNTjKALCd4YyYHIuiDn9zPs=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh09%2Fhba%2F9529652346910%2Fnaga-left-handed-2-500x500.png', 'Mouse MMO con 12 pulsanti meccanici programmabili, sensore ottico da 16000 DPI e design ergonomico per utenti sinistri.', 10),
('Mouse', 'Razer Orochi V2 (Black)', 275.00, 'https://assets3.razerzone.com/Fso5HUf-FGYjJiqk7LzRG6DAF1I=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fhe1%2Fhb2%2F9529652576286%2Forochi-v2-black-2-500x500.png', 'Mouse gaming ultraleggero con sensore ottico da 18000 DPI, switch meccanici Razer Optical Mouse e design ambidestro.', 10);


-- Tastiere
INSERT INTO prodotti (categoria, titolo, prezzo, url_immagine, descrizione, quantita)
VALUES
('Tastiera', 'Razer BlackWidow V3 (Black)', 275.00, 'https://assets3.razerzone.com/YtWqr12prPepbUlakSh52LMFXmU=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh2a%2Fhd3%2F9538807103518%2Fblackwidow-v3-black-5-500x500.png', 'Switch meccanici Razer Green per una risposta tattile e acustica', 10),
('Tastiera', 'Razer BlackWidow V4 (75% Black)', 275.00, 'https://assets3.razerzone.com/Pgyxh3HUrUSIwR3kf2RzK3UUbE0=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fhf7%2Fh5a%2F9640099119134%2Fblackwidow-v4-75-black-2-500x500.png', 'Design compatto con tasti dedicati per una migliore ergonomia', 10),
('Tastiera', 'Razer BlackWidow V4', 275.00, 'https://assets3.razerzone.com/zIgYlO_LsoGIbfbJw-NF283m8vg=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh36%2Fh5a%2F9640099184670%2Fblackwidow-v4-2-500x500.png', 'Tasti retroilluminati personalizzabili con Razer Chroma RGB', 10),
('Tastiera', 'Razer BlackWidow V4 (Black X)', 275.00, 'https://assets3.razerzone.com/ie2ATT-IMqd3wMjU1nUgKJEBrR8=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh8f%2Fh57%2F9640099217438%2Fblackwidow-v4-black-x-500x500.png', 'Struttura in alluminio per una maggiore durata e resistenza', 10),
('Tastiera', 'Razer BlackWidow V3 (Quartz)', 275.00, 'https://assets3.razerzone.com/mRfOR_q470pHj7FG9bCkvAru1ys=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh72%2Fha3%2F9533909827614%2Fblackwidow-v3-quartz-4-500x500.png', 'Fascia superiore in tessuto per una sensazione premium e comfort durante luso', 10);



INSERT INTO prodotti (categoria, titolo, prezzo, url_immagine, descrizione, quantita)
VALUES 
('elementi da streaming', 'Razer Stream Controller', 275.00, 'https://assets3.razerzone.com/y5sjRzUtzgitakESeU3Z77Sq3zU=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fhb7%2Fh96%2F9419375149086%2Fstream-controller-500x500.png', 'Interfaccia USB-C per una connessione rapida e affidabile',9),
('elementi da streaming', 'Razer Stream Controller X', 275.00, 'https://assets3.razerzone.com/qtrKFp6zIpPeUnfqtqiL9geP9mE=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fhac%2Fh60%2F9502641487902%2Fstream-controller-x-2-500x500.png', 'Compatibile con la maggior parte delle piattaforme di streaming e software di registrazione',6),
('elementi da streaming', 'Razer Key Light Chroma', 275.00, 'https://assets3.razerzone.com/cUEp0B2Ix7RH7WXffgpbg1cKhOg=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh7d%2Fha7%2F9375767167006%2Fkey-light-chroma-500x500.png', 'Illuminazione LED RGB personalizzabile con oltre 16 milioni di colori', 7),
('elementi da streaming', 'Razer Ring Light', 275.00, 'https://assets3.razerzone.com/7mjSNAYpV_-2xjdgWygTR9EtG1Q=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fhe1%2Fh8e%2F9151223005214%2Fring-light-500x500.png', 'Illuminazione circolare per una distribuzione uniforme della luce durante la registrazione', 5),
('elementi da streaming', 'Razer Blue Screen', 275.00, 'https://assets3.razerzone.com/vA82pvWAgxiMyleFfbDgraIBNUE=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh21%2Fh0b%2F9447199146014%2Fblue-screen-500x500.png', 'Schermo blu resistente con supporto per montaggio su treppiede', 10);

INSERT INTO prodotti (categoria, titolo, prezzo, url_immagine, descrizione, quantita)
VALUES 
-- Lampade
('lampade', 'Razer Aether Lamp Pro', 275.00, 'https://assets3.razerzone.com/NcQrHI57EHaC46NqNwZYWC-K-Gw=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh61%2Fh5b%2F9660299673630%2Faether-lamp-pro-500x500.png', 'Lampada da scrivania con illuminazione RGB personalizzabile e controllo tramite app', 10),
('lampade', 'Razer Aether Lamp', 275.00, 'https://assets3.razerzone.com/wZcmao7xNPlDCzUkMSjpc-D6hbI=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fhf9%2Fh57%2F9660299575326%2Faether-lamp-500x500.png', 'Lampada da tavolo con design minimalista e funzione di illuminazione regolabile', 15),
('lampade', 'Razer Aether Light Bulb E27', 275.00, 'https://assets3.razerzone.com/dMziFKLqYfOEEHjvJv-ubsOB3mE=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh0a%2Fh5b%2F9660299640862%2Faether-light-bulb-e27-500x500.png', 'Lampadina intelligente con connettività Wi-Fi e compatibilità con assistenti vocali', 20),
('lampade', 'Razer Aether Light Strip', 275.00, 'https://assets3.razerzone.com/vWPA0jWqS4pUHVEzfhNEC3DKCEA=/300x300/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fha0%2Fh5a%2F9660299608094%2Faether-light-strip-500x500.png', 'Striscia luminosa RGB con adesivo magnetico per una facile installazione e personalizzazione', 25);

select * from prodotti where categoria='cuffie';

drop table wishlist;
select * from carrello  c join users u where c.user_id=u.id;
select* from prodotti where id=12;
SELECT p.titolo, p.prezzo, p.url_immagine, c.quantita, c.prodotto_id 
FROM carrello c 
JOIN prodotti p ON c.prodotto_id = p.id 
WHERE c.user_id = 1;

select * from carrello
select * from prodotti;

DELETE FROM wishlist;

SET SQL_SAFE_UPDATES = 0;
DELETE FROM wishlist;
SET SQL_SAFE_UPDATES = 1;

select * from wishlist;

SELECT p.titolo, p.prezzo, p.url_immagine, c.quantita, c.prodotto_id 
        FROM carrello c 
        JOIN prodotti p ON c.prodotto_id = p.id 
        WHERE c.user_id = 1;
UPDATE carrello SET quantita = quantita + 1 WHERE user_id = 1AND  prodotto_id =1;

UPDATE carrello
SET quantita = quantita + 1
WHERE user_id =1 AND prodotto_id =2;




CREATE TABLE songs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    song_id VARCHAR(255) NOT NULL,
    content JSON NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);


