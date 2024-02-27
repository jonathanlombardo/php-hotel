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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
      <div class="row justify-content-end">
        <div class="col-10">

          <h1 class="text-center">Here your hotels</h1>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="row">
      <div class="col-4 col-xxl-2 scroll">
        <h4 class="mb-4">Filter</h4>
        <form method="GET">
          <div class="mb-3">
            <label for="hotel-name" class="form-label">By Name</label>
            <input name="hotel-name" type="text" class="form-control" id="hotel-name" placeholder="Hotel name" value="<?= $name_filter ?>">
          </div>
          <div class="mb-3">
            <input name="parking-check" type="checkbox" class="form-check-input" id="parking-check" value="park-true" <?= $park_filter ? 'checked' : '' ?>>
            <label for="parking-check" class="form-check-label">Parking Available</label>
          </div>
          <div class="mb-3">
            <label for="vote-range" class="form-label">Min Vote:
              <?= $vote_filter ?> star
            </label>
            <input name="vote-range" type="range" class="form-range" min="0" max="5" step="1" id="vote-range" value="<?= $vote_filter ?>">
          </div>
          <div class="mb-3">
            <label for="dist-range" class="form-label">Dist to center: <= <?= $dist_filter ?> KM</label>
                <input name="dist-range" type="range" class="form-range" min="<?= $min_dist ?>" max="<?= $max_dist ?>" step="0.1" id="dist-range" value="<?= $dist_filter ?>">
          </div>
          <div class="mb-3">
            <button class="btn btn-primary">Filter</button>
            <button type="button" id="reset-btn" class="btn btn-warning">Reset</button>
          </div>
        </form>

      </div>
      <div class="col-8 col-xxl-10 scroll">
        <div class="row flex-wrap g-3 justify-content-center">
          <?php if (empty($filtered_hotels)): ?>
            <p class="text-center fst-italic fs-3">No results</p>
          <?php else: ?>

            <?php foreach ($filtered_hotels as $hotel): ?>
              <div class="col-12 col-lg-6 col-xxl-4">
                <div class="card h-100">
                  <img src="./assets/img/<?= $hotel['img'] ?>" class="card-img-top" alt="<?= "{$hotel['name']} image" ?>">
                  <div class="card-body">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item active"><strong>
                          <?= $hotel['name'] ?>
                        </strong></li>
                      <li class="list-group-item"><strong>Parking: </strong>
                        <i <?= $hotel['parking'] ? 'class="fa-solid fa-circle-check text-primary"' : 'class="fa-solid fa-circle-xmark text-secondary"' ?>></i>
                      </li>
                      <li class="list-group-item"><strong>Vote: </strong>
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                          <i <?= $hotel['vote'] >= $i ? 'class="fa-solid fa-star text-primary"' : 'class="fa-regular fa-star text-secondary"' ?>></i>
                        <?php endfor; ?>
                      </li>
                      <li class="list-group-item"><strong>Distance to center: </strong>
                        <?= $hotel['distance_to_center'] ?> KM
                      </li>
                      <li class="list-group-item"><strong>Description: </strong>
                        <?= $hotel['description'] ?>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <script>
    const nameInputEl = document.querySelector("input#hotel-name");
    const parkInputEl = document.querySelector("input#parking-check");
    const voteInputEl = document.querySelector("input#vote-range");
    const distInputEl = document.querySelector("input#dist-range");
    const voteLabelEl = document.querySelector("label[for='vote-range']");
    const distLabelEl = document.querySelector("label[for='dist-range']");
    const formEl = document.querySelector("form");

    // fix input value hidden
    voteInputEl.addEventListener("input", () => {
      voteLabelEl.innerText = `Min Vote: ${voteInputEl.value} star`
    });

    // fix input value hidden
    distLabelEl.innerText = `Dist to center: <= ${parseFloat(distInputEl.value).toFixed(1)} KM`
    distInputEl.addEventListener("input", () => {
      distLabelEl.innerText = `Dist to center: <= ${parseFloat(distInputEl.value).toFixed(1)} KM`
    });

    const resetBtnEl = document.querySelector("#reset-btn");

    // fix reset init
    resetBtnEl.addEventListener("click", () => {
      nameInputEl.value = '<?= $name_filter_init ?>';
      parkInputEl.checked = <?= $park_filter_init ? "true" : "false" ?>;
      voteInputEl.value = <?= $vote_filter_init ?>;
      distInputEl.value = <?= $dist_filter_init ?>;
      voteLabelEl.innerText = "Min Vote: <?= $vote_filter_init ?> star";
      distLabelEl.innerText = "Dist to center: <= <?= $dist_filter_init ?> KM";

      formEl.submit();
    });

    const inputs = document.querySelectorAll("intput");

    inputs.forEach((input) => {
      input.addEventListener("keyup", (event) => {
        if (event.target == "enter") { formEl.submit() }
      })
    })

  </script>
</body>

</html>