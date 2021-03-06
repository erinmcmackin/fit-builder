// ==========
// EXERCISES
// ==========

// MySQL
CREATE TABLE exercises (id int NOT NULL AUTO_INCREMENT, title VARCHAR(32), intensity TINYINT, focus TINYTEXT, description TEXT, image TEXT, PRIMARY KEY (ID));

// PostgreSQL
CREATE TABLE exercises (id SERIAL, title VARCHAR(32), intensity INT, focus TEXT, description TEXT, image TEXT);

INSERT INTO exercises (title, intensity, focus, description, image) VALUES ('Squat', 6, 'legs', 'feet hip-width and parallel, send seat back as if sitting in chair, do not extend knees past toes', 'https://media.self.com/photos/57da2eaa46d0cb351c8c7ebc/4:3/w_728,c_limit/correct-squat_feat.jpg');


INSERT INTO exercises (title, intensity, focus, description, image) VALUES ('Pilates 100', 6, 'abs', 'on back, lift head-neck-shoulders, lift legs, pump arms as you inhale for 5, exhale for 5', 'http://assets5.tribesports.com/system/challenges/images/000/044/914/original/20130605031303-do-pilates-100-s-everyday-for-2-weeks.jpg');


{
    "title": "Wall Sit",
    "intensity": 6,
    "focus": "seat, legs, abs",
    "description": "press back against wall, with back straight, sit down until knees are directly over ankles, and thighs are parallel with floor",
    "image": "http://ironoctopusfitness.com/wp-content/uploads/2017/10/wall-sit.jpg"
}


// ==========
// WORKOUTS
// ==========

CREATE TABLE workouts (id SERIAL, title VARCHAR(32), intensity INT, focus TEXT, description TEXT, image TEXT);

// with exercises
INSERT INTO workouts (title, intensity, focus, description, image, exercises) VALUES ('Tuesday Barre', 6, 'full-body', 'a mix of ballet barre and pilates', 'https://assets.rbl.ms/17432052/980x.jpg', '{"exercise1", "exercise2"}');

INSERT INTO workouts (title, intensity, focus, description, image, exercises) VALUES ('Thursday Pilates', 8, 'core', 'a mix of chair and tower to target the core', 'https://s3.amazonaws.com/s3.pilates.com/img/store/reformer/hero-01.png', '{exercise3, exercise4}');

INSERT INTO workouts (title, intensity, focus, description, image, exercises) VALUES ('BeyondBarre', 6, 'full-body', 'a mix of ballet barre and pilates', 'https://assets.rbl.ms/17432052/980x.jpg', '{"exercise1", "exercise2"}');

// without exercises
INSERT INTO workouts (title, intensity, focus, description, image) VALUES ('Tuesday Barre', 6, 'full-body', 'a mix of ballet barre and pilates', 'https://assets.rbl.ms/17432052/980x.jpg');

INSERT INTO workouts (title, intensity, focus, description, image) VALUES ('Thursday Pilates', 8, 'core', 'a mix of chair and tower to target the core', 'https://s3.amazonaws.com/s3.pilates.com/img/store/reformer/hero-01.png');

INSERT INTO workouts (title, intensity, focus, description, image) VALUES ('BeyondBarre', 6, 'full-body', 'a mix of ballet barre and pilates', 'https://assets.rbl.ms/17432052/980x.jpg');


// ==========
// JOIN
// ==========

CREATE TABLE joins (id SERIAL, workout_id INT, exercise_id INT);

INSERT INTO joins (workout_id, exercise_id) VALUES (1, 2);
INSERT INTO joins (workout_id, exercise_id) VALUES (1, 4);
INSERT INTO joins (workout_id, exercise_id) VALUES (1, 5);
INSERT INTO joins (workout_id, exercise_id) VALUES (1, 6);

INSERT INTO joins (workout_id, exercise_id) VALUES (2, 4);
INSERT INTO joins (workout_id, exercise_id) VALUES (2, 6);
