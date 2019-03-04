<h3>Scholar detail</h4>

<div class="card" style="width: 20rem;">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h4 class="card-title">Name : <?= $detail['name']; ?></h5>
    <p class="card-text">NIS : <?= $detail['nis']; ?></p>
    <p class="card-text">Email : <?= $detail['email']; ?></p>
    <p class="card-text">Department : <?= $detail['department']; ?></p>
    <a href="<?= base_url(); ?>scholar" class="btn btn-primary">go back</a>
  </div>
</div>