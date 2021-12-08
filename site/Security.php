<!Doctype html>
<html>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Пропуска</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php require "blocks/header.php"?>
    <div class="container mt-4">
        <h4 class="mb-4">Подайте свою заявку для въезда</h4>
        <div class="d-flex flex-wrap">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Гостевое авто</h4>
                </div>
                <div class="card-body">
                    <img src="img/1.png" alt="">
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>Подача заявки на гостевой пропуск для авто</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-outline-primary">Оформить заявку</button>
                </div>
            </div>
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Такси</h4>
                </div>
                <div class="card-body">
                    <img src="img/2.png" alt="">
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>Подача заявки на пропуск такси</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-outline-primary">Оформить заявку</button>
                </div>
            </div>
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Служебное авто</h4>
                </div>
                <div class="card-body">
                    <img src="img/3.png" alt="">
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>Подача заявки на служебные авто</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-outline-primary">Оформить заявку</button>
                </div>
            </div>
        </div>
    </div>
    <?php require "blocks/footer.php" ?>
</body>
</html>