/* User Table, Post Table, and Comment Table using SQLite. */
CREATE TABLE IF NOT EXISTS User (
	user_id INTEGER PRIMARY KEY autoincrement,
	username TEXT NOT NULL,
	picture TEXT NOT NULL default "/images/icon.jpg" 
	);

CREATE TABLE IF NOT EXISTS Post (
	post_id INTEGER PRIMARY KEY autoincrement,
	user_id INTEGER NOT NULL REFERENCES User(user_id) ON DELETE CASCADE,
	cdate INTEGER NOT NULL,
	edate INTEGER,
	title TEXT NOT NULL,
	message TEXT NOT NULL,
	icon TEXT NOT NULL default "/images/picture.png" 
	);

CREATE TABLE IF NOT EXISTS Comment (
	cdate INTEGER NOT NULL,
	edate INTEGER,
	comment_id INTEGER PRIMARY KEY autoincrement,
	post_id INTEGER NOT NULL REFERENCES Post(post_id) ON DELETE CASCADE,
	user_id INTEGER NOT NULL REFERENCES User(user_id) ON DELETE CASCADE,
	message TEXT NOT NULL
	);

INSERT INTO User(username) VALUES ("John Smith");
INSERT INTO User(username) VALUES ("James Johnson");
INSERT INTO User(username) VALUES ("Peter Fields");
INSERT INTO User(username) VALUES ("Jane Doe");
INSERT INTO User(username) VALUES ("Peter Peterson");
INSERT INTO User(username) VALUES ("Hans Hanson");

INSERT INTO Post(cdate, user_id, title, message) VALUES (1565258100, 1, "Good day, Everyone!", "The weather outside is great today!");
INSERT INTO Post(cdate, edate, user_id, title, message) VALUES (1565259720, 1565261634, 1, "Just making another post!", "Hope everyone is doing well! (Fixed a typo)!");
INSERT INTO Post(cdate, user_id, title, message) VALUES (1565259999, 2, "It's snowing over here!", "I really hate the cold!");
INSERT INTO Post(cdate, user_id, title, message) VALUES (1565261404, 3, "Rainy weather is the worst!", "I guess I just have to stay in all day.");
INSERT INTO Post(cdate, user_id, title, message) VALUES (1565264774, 4, "This is my first post!", "How is everyone?");

INSERT INTO Comment(cdate, post_id, user_id, message) VALUES (1565265722, 1, 1, "Oh no, it's just started raining!");
INSERT INTO Comment(cdate, post_id, user_id, message) VALUES (1565265899, 1, 5, "Bad luck!");
INSERT INTO Comment(cdate, post_id, user_id, message) VALUES (1565265923, 1, 6, "Doesn't look like I'll be playing golf today, either!");
INSERT INTO Comment(cdate, post_id, user_id, message) VALUES (1565266227, 1, 1, "I just hope it stops soon!");
INSERT INTO Comment(cdate, post_id, user_id, message) VALUES (1565266335, 2, 1, "Anyone want to leave a comment?");
INSERT INTO Comment(cdate, post_id, user_id, message) VALUES (1565266414, 3, 1, "Snow is a lot better than rain!");
INSERT INTO Comment(cdate, post_id, user_id, message) VALUES (1565266447, 3, 3, "I have to agree with that!");
INSERT INTO Comment(cdate, post_id, user_id, message) VALUES (1565266531, 3, 2, "Haha!");
INSERT INTO Comment(cdate, post_id, user_id, message) VALUES (1565266632, 5, 4, "Is this how you comment?");
INSERT INTO Comment(cdate, post_id, user_id, message) VALUES (1565266763, 5, 2, "Yes! Well done!");
INSERT INTO Comment(cdate, post_id, user_id, message) VALUES (1565266865, 5, 1, "Welcome!");
INSERT INTO Comment(cdate, post_id, user_id, message) VALUES (1565266958, 5, 1, "Hope you enjoy it!");
INSERT INTO Comment(cdate, post_id, user_id, message) VALUES (1565269981, 5, 4, "Thanks, guys!");