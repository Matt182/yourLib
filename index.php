<?php
    namespace YourLib;

    require_once 'vendor/autoload.php';
    use YourLib\db\dbActions;

    $db = new dbActions();
    $books = $db->showAll();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Books</title>
    </head>
    <body>
        <script type="text/javascript">
            document.onload(function() {

            });
        </script>
        <form action="src/insert.php" method="post">
            <input type="file" name="file" />
            <input type="text" name="name" />
            <input type="text" name="author" />
            <input type="datepicker" name="year" />
            <input type="text" name="tag" />
            <button type="submit" name="button">submit</button>
        </form>
        <hr>

            <?php foreach ($books as $book) : ?>
                <?php if ($book['status'] == 1 ): ?>
                    <i>
                <?php else :?>
                    <form action="src/edit.php" method="post">
                        <input type="hidden" name="id" value="<?=$book['id']?>">
                        <input type="submit" value='readed'>
                    </form>
                <?php endif; ?>
                <div class="book">
                    <img src="<?=$book['id']?>">
                    <div class="header">
                        <span class="name"><?=$book['name']?></span>
                        <span class="author"><?=$book['author']?></span>
                        <span class="year"><?=$book['year']?></span>
                        <span class="tag"><?= $book['tag'] ?></span>
                    </div>
                    <div class="resume">
                        <?=$book['resume']?>
                    </div>

                </div>
                <?php if ($book['status'] == 1 ): ?>
                    </i>
                <?php endif; ?>
                <hr>
            <?php endforeach; ?>

    </body>
</html>
