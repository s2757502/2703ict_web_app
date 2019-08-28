/* Post Table and Comment Table using SQLite. */

CREATE TABLE IF NOT EXISTS Post (
	post_id INTEGER PRIMARY KEY autoincrement,
	date INTEGER NOT NULL,
	user TEXT NOT NULL,
	title TEXT NOT NULL,
	message TEXT NOT NULL,
	icon TEXT default "/images/icon.png" NOT NULL
	);

CREATE TABLE IF NOT EXISTS Comment (
	comment_id INTEGER PRIMARY KEY autoincrement,
	post_id INTEGER NOT NULL REFERENCES Post(post_id),
	user TEXT NOT NULL,
	message TEXT NOT NULL
	);
	
INSERT INTO Post(date, user, title, message, icon) VALUES (1565258100, "John Smith", "Good day, Everyone!", "The weather outside is great today!", "/images/icon.png");
INSERT INTO Post(date, user, title, message, icon) VALUES (1565259720, "John Smith", "Just making another post!", "Hope everyone is doing well!", "/images/icon.png");
INSERT INTO Post(date, user, title, message, icon) VALUES (1565259999, "James Johnson", "It's snowing over here!", "I really hate the cold!", "/images/icon.png");
INSERT INTO Post(date, user, title, message, icon) VALUES (1565261404, "Peter Fields", "Rainy weather is the worst!", "I guess I just have to stay in all day.", "/images/icon.png");
INSERT INTO Post(date, user, title, message, icon) VALUES (1565264774, "Jane Doe", "This is my first post!", "How is everyone?", "/images/icon.png");

INSERT INTO Comment(post_id, user, message) VALUES (1, "John Smith", "Oh no, it's just started raining!");
INSERT INTO Comment(post_id, user, message) VALUES (1, "Peter Peterson", "Bad luck!");
INSERT INTO Comment(post_id, user, message) VALUES (1, "Hans Hanson", "Doesn't look like I'll be playing golf today, either!");
INSERT INTO Comment(post_id, user, message) VALUES (1, "John Smith", "I just hope it stops soon!");
INSERT INTO Comment(post_id, user, message) VALUES (2, "John Smith", "Anyone want to leave a comment?");
INSERT INTO Comment(post_id, user, message) VALUES (3, "John Smith", "Snow is a lot better than rain!");
INSERT INTO Comment(post_id, user, message) VALUES (3, "Peter Fields", "I have to agree with that!");
INSERT INTO Comment(post_id, user, message) VALUES (3, "James Johnson", "Haha!");
INSERT INTO Comment(post_id, user, message) VALUES (5, "Jane Doe", "Is this how you comment?");
INSERT INTO Comment(post_id, user, message) VALUES (5, "James Johnson", "Yes! Well done!");
INSERT INTO Comment(post_id, user, message) VALUES (5, "John Smith", "Welcome!");
INSERT INTO Comment(post_id, user, message) VALUES (5, "John Smith", "Hope you enjoy it!");
INSERT INTO Comment(post_id, user, message) VALUES (5, "Jane Doe", "Thanks, guys!");


