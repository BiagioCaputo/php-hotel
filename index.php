<?php
include __DIR__ . '/data/hotels.php';
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
        <div class="tabel-box p-5">
                <table class="table table-warning">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Distance to center</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($hotels as $hotel) : ?>
                            <tr>
                            <th scope="row"><?= $hotel['name']?></th>
                            <td><?= $hotel['description']?></td>
                            <td><?= $hotel['parking']? "<i class='fa-solid fa-circle-check' style='color: green'</i>" : "<i class='fa-solid fa-circle-xmark' style='color: red'></i>" ?></td>
                            <td><?= $hotel['vote']?></td>
                            <td><?= $hotel['distance_to_center']?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
        </div>
    </div>

    
</body>
</html>