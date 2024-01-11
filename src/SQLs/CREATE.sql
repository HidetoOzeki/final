CREATE TABLE user(
    user_id INTEGER NOT NULL AUTO_INCREMENT,
    user_alias VARCHAR(64) NOT NULL,
    mail_address VARCHAR(64) NOT NULL,
    user_password VARCHAR(32) NOT NULL,
    PRIMARY KEY (user_id)
);
CREATE TABLE post (
    post_id INTEGER NOT NULL AUTO_INCREMENT,
    user_id INTEGER NOT NULL,
    post_type INTEGER NOT NULL,
    post_title VARCHAR(100),
    post_description VARCHAR(480),
    post_explanation VARCHAR(480),
    PRIMARY KEY (post_id),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

CREATE TABLE comment(
    comment_id INTEGER AUTO_INCREMENT,
    post_id INTEGER NOT NULL,
    user_id INTEGER NOT NULL,
    comment_text VARCHAR(240) NOT NULL,
    FOREIGN KEY(post_id) REFERENCES post(post_id),
    FOREIGN KEY(user_id) REFERENCES user(user_id),
    PRIMARY KEY(comment_id)
);

CREATE TABLE vote_option(
    post_id INTEGER NOT NULL,
    vote_option_id INTEGER NOT NULL,
    option_name VARCHAR(100) NOT NULL,
    option_order INTEGER NOT NULL,
    image_path VARCHAR(100),
    FOREIGN KEY (post_id) REFERENCES post(post_id),
    PRIMARY KEY (post_id,vote_option_id)
);

INSERT INTO vote_option VALUES(投稿ID,COALESCE((select MAX(vote_option_id)+1 from vote_option where post_id = 投稿ID),1),選択名,選択肢番号,画像パス);

CREATE TABLE vote (
    vote_id INTEGER AUTO_INCREMENT,
    post_id INTEGER NOT NULL,
    user_id INTEGER NOT NULL,
    vote_number INTEGER NOT NULL,
    PRIMARY KEY(vote_id),
    FOREIGN KEY(post_id) REFERENCES post(post_id),
    FOREIGN KEY(user_id) REFERENCES post(user_id)
);