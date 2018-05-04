<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <header>
            <h1>Exercise Index Page</h1>
            <nav>
                <ul>
                    <li>
                        <a href="exercises/new">Add Exercise</a>
                    </li>
                </ul>
            </nav>
        </header>
        <section>
            <ul>
                <?php while($row = $exercises->fetch_object()): ?>
                    <li>
                        Exercise today is <?php echo $row->title ?> with intensity <?php echo $row->intensity?>
                    </li>
                <?php endwhile; ?>
            </ul>
        </section>
    </body>
</html>
