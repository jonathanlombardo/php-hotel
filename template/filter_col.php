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