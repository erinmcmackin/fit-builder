mysql> CREATE TABLE exercises (id int NOT NULL AUTO_INCREMENT, title VARCHAR(32), intensity TINYINT, focus TINYTEXT, description TEXT, image TEXT, PRIMARY KEY (ID));

mysql> INSERT INTO exercises (title, intensity, focus, description, image) VALUES ('Squat', 6, 'legs', 'feet hip-width and parallel, send seat back as if sitting in chair, do not extend knees past toes', 'https://media.self.com/photos/57da2eaa46d0cb351c8c7ebc/4:3/w_728,c_limit/correct-squat_feat.jpg');


mysql> INSERT INTO exercises (title, intensity, focus, description, image) VALUES ('Pilates 100', 6, 'abs', 'on back, lift head-neck-shoulders, lift legs, pump arms as you inhale for 5, exhale for 5', 'http://assets5.tribesports.com/system/challenges/images/000/044/914/original/20130605031303-do-pilates-100-s-everyday-for-2-weeks.jpg');


{
    "title": "Wall Sit",
    "intensity": 6,
    "focus": "seat, legs, abs",
    "description": "press back against wall, with back straight, sit down until knees are directly over ankles, and thighs are parallel with floor",
    "image": "http://ironoctopusfitness.com/wp-content/uploads/2017/10/wall-sit.jpg"
}
