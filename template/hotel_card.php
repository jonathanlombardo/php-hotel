<div class="card h-100">

  <?
  // impossible load pic with absolute path due to local storage
  // relative img path used.
  // better solution in prod: src -> __DIR__ . '/../assets/img/' . $hotel['img']
  ?>
  <img src="<?= './assets/img/' . $hotel['img'] ?>" class="card-img-top" alt="<?= "{$hotel['name']} image" ?>">
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