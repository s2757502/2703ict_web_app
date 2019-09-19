/* Post Table and Comment Table using SQLite. */
CREATE TABLE IF NOT EXISTS Username (
	username_id INTEGER PRIMARY KEY autoincrement,
	username TEXT NOT NULL
	);

CREATE TABLE IF NOT EXISTS Post (
	post_id INTEGER PRIMARY KEY autoincrement,
	username_id INTEGER NOT NULL REFERENCES Username(username_id),
	date INTEGER NOT NULL,
	title TEXT NOT NULL,
	message TEXT NOT NULL,
	icon TEXT default "/images/icon.png" NOT NULL
	);

CREATE TABLE IF NOT EXISTS Comment (
	comment_id INTEGER PRIMARY KEY autoincrement,
	post_id INTEGER NOT NULL REFERENCES Post(post_id),
	username_id INTEGER NOT NULL REFERENCES Username(username_id),
	message TEXT NOT NULL
	);

INSERT INTO Username(username) VALUES ("John Smith");
INSERT INTO Username(username) VALUES ("James Johnson");
INSERT INTO Username(username) VALUES ("Peter Fields");
INSERT INTO Username(username) VALUES ("Jane Doe");
INSERT INTO Username(username) VALUES ("Peter Peterson");
INSERT INTO Username(username) VALUES ("Hans Hanson");

INSERT INTO Post(date, username_id, title, message, icon) VALUES (1565258100, 1, "Good day, Everyone!", "The weather outside is great today!", "/images/icon.png");
INSERT INTO Post(date, username_id, title, message, icon) VALUES (1565259720, 1, "Just making another post!", "Hope everyone is doing well!", "/images/icon.png");
INSERT INTO Post(date, username_id, title, message, icon) VALUES (1565259999, 2, "It's snowing over here!", "I really hate the cold!", "/images/icon.png");
INSERT INTO Post(date, username_id, title, message, icon) VALUES (1565261404, 3, "Rainy weather is the worst!", "I guess I just have to stay in all day.", "/images/icon.png");
INSERT INTO Post(date, username_id, title, message, icon) VALUES (1565264774, 4, "This is my first post!", "How is everyone?", "/images/icon.png");

INSERT INTO Comment(post_id, username_id, message) VALUES (1, 1, "Oh no, it's just started raining!");
INSERT INTO Comment(post_id, username_id, message) VALUES (1, 5, "Bad luck!");
INSERT INTO Comment(post_id, username_id, message) VALUES (1, 6, "Doesn't look like I'll be playing golf today, either!");
INSERT INTO Comment(post_id, username_id, message) VALUES (1, 1, "I just hope it stops soon!");
INSERT INTO Comment(post_id, username_id, message) VALUES (2, 1, "Anyone want to leave a comment?");
INSERT INTO Comment(post_id, username_id, message) VALUES (3, 1, "Snow is a lot better than rain!");
INSERT INTO Comment(post_id, username_id, message) VALUES (3, 3, "I have to agree with that!");
INSERT INTO Comment(post_id, username_id, message) VALUES (3, 2, "Haha!");
INSERT INTO Comment(post_id, username_id, message) VALUES (5, 4, "Is this how you comment?");
INSERT INTO Comment(post_id, username_id, message) VALUES (5, 2, "Yes! Well done!");
INSERT INTO Comment(post_id, username_id, message) VALUES (5, 1, "Welcome!");
INSERT INTO Comment(post_id, username_id, message) VALUES (5, 1, "Hope you enjoy it!");
INSERT INTO Comment(post_id, username_id, message) VALUES (5, 4, "Thanks, guys!");


