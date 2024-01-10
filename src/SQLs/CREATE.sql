CREATE TABLE user(
    user_id INTEGER NOT NULL AUTO_INCREMENT,
    user_alias VARCHAR(64) NOT NULL,
    mail_address VARCHAR(64) NOT NULL,
    password VARCHAR(32) NOT NULL,
    PRIMARY KEY (user_id)
);
CREATE TABLE post (
    post_id INTEGER NOT NULL AUTO_INCREMENT,
    user_id INTEGER NOT NULL,
    post_type INTEGER NOT NULL,
    PRIMARY KEY (post_id),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);