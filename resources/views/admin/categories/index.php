<h1>Категрия новостей в админке:</h1> <br>
<?php
foreach ($categoriesList as $key => $array): ?>
    <div>
<!--        <h2><a href="">--><?//=$array['id']?><!--</a></h2>-->
        <p><a href="<?= route('news.show', ['id' => ++$key]) ?>"><?=$array['description']?></a></p>
    </div>

<?php endforeach; ?>
