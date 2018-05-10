-- SELECT * FROM workouts WHERE id = $1;
SELECT
  workouts.*,
  workouts.id AS workout_id,
  workouts.title AS workout_title,
  workouts.intensity AS workout_intensity,
  workouts.focus AS workout_focus,
  workouts.description AS workout_description,
  workouts.image AS workout_image,
  exercises.id AS exercise_ex_id,
  exercises.title AS exercise_title,
  exercises.intensity AS exercise_intensity,
  exercises.focus AS exercise_focus,
  exercises.description AS exercise_description,
  exercises.image AS exercise_image,
  joins.id AS joins_id,
  joins.exercise_id AS exercise_id,
  joins.workout_id AS workout_id
FROM
  workouts
LEFT JOIN joins
  ON workouts.id = joins.workout_id
LEFT JOIN exercises
  ON joins.exercise_id = exercises.id
WHERE workouts.id = $1;
