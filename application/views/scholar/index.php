<?php if($this->session->flashdata('addFlash')): ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> <?= $this->session->flashdata('addFlash'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
<?php elseif($this->session->flashdata('delFlash')): ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Success!</strong> <?= $this->session->flashdata('delFlash'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
<?php endif; ?>

<div class="row mb-3">
  <div class="col-lg-6">
    <button type="button" class="btn btn-primary showAddModal" data-toggle="modal" data-target="#formModal">
        Add Scholar
    </button>
  </div>
</div>
<div class="row mb-3">
  <div class="col-lg-4">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search scholar data" autofocus>
      <div class="input-group-append">
        <button class="btn btn-outline-primary" type="button" id="button-addon2">Search</button>
      </div>
    </div>
  </div>
</div>


<?php if(validation_errors()): ?>
  <div class="alert alert-danger col-sm-3"><?= validation_errors(); ?></div>  
<?php endif; ?>
<div class="row">
    <div class="col-md-4">
        <h1>Scholar list</h1>
        <ul class="list-group">
            <?php foreach($scholars as $scholar): ?>
            <li class="list-group-item list-group-item-action">
                <?= $scholar['name']; ?>
                <a href="<?php base_url(); ?>scholar/delete/<?= $scholar['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Are you sure want to delete '+'<?= $scholar['name']; ?>'+'?')">delete</a>
                <a href="" class="badge badge-warning float-right editModal" data-toggle="modal" data-target="#formModal" data-id="<?= $scholar['id']; ?>">edit</a>
                <a href="<?= base_url(); ?>scholar/detail/<?= $scholar['id']; ?>" class="badge badge-info float-right">detail</a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Add scholar data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php base_url(); ?>/scholar/insert" method="post">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="nis">NIS</label>
                <input type="number" class="form-control" id="nis" name="nis" placeholder="0000000" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <select class="form-control" id="department" name="department">
                <option value="Technique of Informatique">Technique of Informatique</option>
                <option value="Technique of Accounting">Technique of Accounting</option>
                <option value="Art of Cooking">Art of Cooking</option>
                <option value="Art of Music">Art of Music</option>
                <option value="Technique of Driving">Technique of Driving</option>
                </select>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Insert data</button>
      </div>
        </form>
    </div>
  </div>
</div>