<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            foreach ($data as $value) :
            ?>
                <div class="col-md-3">
                    <a href="#"><img class="img-fluid" src="<?= Yii::app()->request->baseUrl . $value->image ?>" alt="" style="max-width: 30%; max-height:30%"></a>
                    <h3><?= $value->name ?></h3>
                    <p>Gia: <?= $value->price ?> VND</p>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>

    <?php
    $this->widget('CLinkPager', array(
        'currentPage' => $pages->getCurrentPage(),
        'itemCount' => $item_count,
        'pageSize' => $page_size,
        'maxButtonCount' => 4,
        'header' => '',
        'firstPageLabel' => '|<',
        'prevPageLabel' => '<<',
        'nextPageLabel' => '>>',
        'lastPageLabel' => '>|',

    ));
    ?>
</body>

</html>