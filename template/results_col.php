<div class="col-8 col-xxl-10 scroll">
  <div class="row flex-wrap g-3 justify-content-center">
    <?php if (empty($filtered_hotels)): ?>
      <p class="text-center fst-italic fs-3">No results</p>
    <?php else: ?>

      <?php foreach ($filtered_hotels as $hotel): ?>
        <div class="col-12 col-lg-6 col-xxl-4">
          <?php require __DIR__ . "/hotel_card.php" ?>
        </div>
      <?php endforeach; ?>

    <?php endif; ?>
  </div>
</div>