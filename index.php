<?php
require_once "./init.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style type="text/css">
        
        header {
            height: 80px;
        }

        .card-img-top {
            height: 230px;
            object-fit: cover;
            object-position: center;
        }
        
        .scroll {
            height: calc(100vh - 80px);
            overflow: auto;
            scrollbar-width: thin;
            scrollbar-color: #A8A8A8 white;
        }
    </style>
</head>
<body>

    <header>
        <div class="container">
            <h1 class="text-center">Here your hotels</h1>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-2 scroll">
                <h4 class="mb-4">Filter</h4>
                <form method="GET">
                    <div class="mb-3">
                        <label for="hotel-name" class="form-label">By Name</label>
                        <input name="hotel-name" type="text" class="form-control" id="hotel-name" placeholder="Hotel name" value="<?= $name_filter ?>">
                    </div>
                    <div class="mb-3">
                        <input name="parking-check" type="checkbox" class="form-check-input" id="parking-check" value="<?= $park_filter ?>">
                        <label for="parking-check" class="form-check-label">Parking Available</label>
                    </div>
                    <div class="mb-3">
                        <label for="vote-range" class="form-label">Min Vote: <?= $vote_filter ?> star</label>
                        <input name="vote-range" type="range" class="form-range" min="0" max="5" step="1" id="vote-range" value="<?= $vote_filter ?>">
                    </div>
                    <div class="mb-3">
                        <label for="dist-range" class="form-label">Dist to center: <= <?= $dist_filter ?> KM</label>
                        <input name="dist-range" type="range" class="form-range" min="2" max="50" step="0.5" id="dist-range" value="<?= $dist_filter ?>">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Filter</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </form>

            </div>
            <div class="col-10 scroll">
                <div class="row flex-wrap g-3">
                    <?php foreach($filtered_hotels as $hotel): ?>
                        <div class="col-4">
                        <div class="card h-100">
                            <img src="./assets/img/<?= $hotel['img'] ?>" class="card-img-top" alt="<?= "{$hotel['name']} image" ?>">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item active"><strong><?= $hotel['name'] ?></strong></li>
                                    <li class="list-group-item"><strong>Parking: </strong><?= $hotel['parking'] ? 'Available' : 'Not Available' ?></li>
                                    <li class="list-group-item"><strong>Vote: </strong><?= $hotel['vote'] ?></li>
                                    <li class="list-group-item"><strong>Distance to center: </strong><?= $hotel['distance_to_center'] ?> KM</li>
                                    <li class="list-group-item"><strong>Description: </strong><?= $hotel['description'] ?></li>
                                </ul>
                            </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        const voteLabelEl = document.querySelector("label[for='vote-range']");
        const voteInputEl = document.querySelector("input#vote-range");

        voteInputEl.addEventListener("input", () => {
            voteLabelEl.innerText = `Min Vote: ${voteInputEl.value} star`
        });

        const distLabelEl = document.querySelector("label[for='dist-range']");
        const distInputEl = document.querySelector("input#dist-range");

        distInputEl.addEventListener("input", () => {
            distLabelEl.innerText = `Dist to center: <= ${parseFloat(distInputEl.value).toFixed(1)} KM`
        })
    </script>
</body>
</html>