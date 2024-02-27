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