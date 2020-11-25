<div class="container">
    <p>
        <a class="btn btn-outline-success" href="/article/create">Добавить статью</a>
        <a class="btn btn-outline-danger" href="/article/authorization">Выйти</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>Заголовок</th>
            <th>Тело</th>
            <th>Дата публикации</th>
            <th>Автор статьи</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td><?php echo $article['title'] ?></td>
                <td><?php echo $article['body'] ?></td>
                <td><?php echo $article['date'] ?></td>
                <td><?php echo $article['author'] ?></td>
                <td>

                    <a href="<?php echo $article['id']?>/view" class="btn btn-sm btn-outline-info">Показать</a>
                    <a href="<?php echo $article['id']?>/update" class="btn btn-sm btn-outline-secondary">Редактировать</a>
                    <a href="<?php echo $article['id']?>/delete" class="btn btn-sm btn-outline-danger">Удалить</a>

                    </form>
                </td>
            </tr>
        <?php endforeach;; ?>
        </tbody>
    </table>
</div>