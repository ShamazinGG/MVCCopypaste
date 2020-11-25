<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
            <?php if ($article['id']): ?>
            Обновить статью: <b><?php echo $article['title']?></b>
            <?php else: ?>
                Написать статью
            <?php endif ?>
            </h3>

        </div>
        <div class="card-body">

<form method="post" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label>Заголовок</label>
                    <input name="login" value="<?php echo $article['title'] ?>"
                           class="form-control <?php echo $errors['title'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['title'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Тело статьи</label>
                    <input name="name" value="<?php echo $article['body'] ?>"
                           class="form-control <?php echo $errors['body'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['body'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Дата</label>
                    <input name="birthdate" value="<?php echo $article['date'] ?>"
                           class="form-control <?php echo $errors['date'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['date'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Автор статьи</label>
                    <input name="birthdate" value="<?php echo $article['author'] ?>"
                           class="form-control <?php echo $errors['author'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['author'] ?>
                    </div>
                </div>


                <button class="btn btn-success">Сохранить</button>
        </div>
    </div>
</form>
    </form>
</div>