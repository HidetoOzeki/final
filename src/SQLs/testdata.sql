INSERT INTO user(user_alias,mail_address,user_password) VALUES("none_the_wiser","poster1@outlook.com","12345");

INSERT INTO post(user_id,post_type,post_title,post_description,post_explanation) VALUES(1,1,"アフリカ","アフリカは国それとも大陸？","アフリカは大陸です");

INSERT INTO vote_option VALUES(1,1,"国",1,"test1.png");
INSERT INTO vote_option VALUES(1,(select COUNT(*)+1 from vote_option where post_id = 1),"国",1,"test1.png");
INSERT INTO vote_option VALUES(1,COALESCE((select MAX(vote_option_id)+1 from vote_option where post_id = 1) as temp1,1),"大陸",2,"test2.png");

INSERT INTO vote_option VALUES(2,1,"国",1,"test1.png");
INSERT INTO vote_option VALUES(2,2,"国",1,"test1.png");
INSERT INTO vote_option VALUES(2,3,"国",1,"test1.png");