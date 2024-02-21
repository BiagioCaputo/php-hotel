<?php
include __DIR__ . '/data/hotels.php';

$headings = array_keys($hotels[0]); //se non avessi preso il primo, mi avrebbe preso le posizioni degli index

$rating= $_GET['rating'] ?? NULL;

//Controllo se mi arriva un filtro parcheggio

if(isset($_GET['parking'])){
    $checked = 'checked';

    $filtered_hotels = [];

    foreach($hotels as $hotel){
        if($hotel['parking']) $filtered_hotels[] = $hotel;
    }

    $hotels= $filtered_hotels;
}

//non posso mettere isset altrimenti entrerei sempre nella funzione
if($rating){
    $filtered_hotels = [];
    foreach($hotels as $hotel){
        if($hotel['vote'] >= $rating) $filtered_hotels[] = $hotel;
    }

    $hotels= $filtered_hotels;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>php hotels</title>
</head>
<body class="bg-secondary">
    <div class="container">
        <h1 class="text-center py-5">Hotels</h1>
        <form method="GET" action="" class="px-5 d-flex align-items-center gap-5">
            <div class="form-check">
                <label class="form-check-label" for="parking">Only Hotels with parking:</label>
                <input class="form-check-input" type="checkbox" name="parking" id="parking" <?= $checked ?? '' ?>>
            </div>
            <div class="mb-3 d-flex gap-3">
                <span>Rating</span>
                <input type='number' class='form-control' name="rating" min="1" max="5" value="<?= $rating ?? 1 ?>">
            </div>
            <button type="submit" class="btn btn-warning">Research</button>
        </form>
        <div class="tabel-box p-5">
                <table class="table table-warning">
                    <thead>
                        <tr>
                        <?php foreach($headings as $heading) : ?>
                        <th scope="col"> <?= ucfirst($heading) ?> </th>
                        <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($hotels as $hotel) : ?>
                            <tr>
                            <th scope="row"><?= $hotel['name']?></th>
                            <td><?= $hotel['description']?></td>
                            <td><?= $hotel['parking']? "<i class='fa-solid fa-circle-check' style='color: green'</i>" : "<i class='fa-solid fa-circle-xmark' style='color: red'></i>" ?></td>
                            <td><?= $hotel['vote']?>/5</td>
                            <td><?= $hotel['distance_to_center']?> km</td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
        </div>
    </div>

    
</body>
</html>