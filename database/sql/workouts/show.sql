-- SELECT * FROM workouts WHERE id = $1;
SELECT
  workouts.*,
  exercises.id AS exercise_ex_id,
  exercises.title AS exercise_title,
  exercises.intensity AS exercise_intensity,
  exercises.focus AS exercise_focus,
  exercises.description AS exercise_description,
  exercises.image AS exercise_image
FROM
  workouts
LEFT JOIN joins
  ON workouts.id = joins.workout_id
LEFT JOIN exercises
  ON joins.exercise_id = exercises.id
WHERE workouts.id = $1;
