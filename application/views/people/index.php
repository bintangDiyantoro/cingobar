<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <h3 class="mb-3">List of people</h3>
            <form action="<?= base_url('people'); ?>" method="post">
                <div class="input-group mb-3 col-lg-6">
                    <input type="text" class="form-control" name="keyword" placeholder="Search people's data" id="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <input class="btn btn-outline-secondary" type="submit" name="submit" id="submit">
                    </div>
                </div>
            </form>
            <?php if ($keyword) : ?>
            <h5 class="ml-3 mb-3">Result : <?= $total_rows; ?></h5>
            <?php endif; ?>
            <?php if (!empty($total_rows)) : ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($peoples as $people) : ?>
                    <tr>
                        <th scope="row"><?= ++$start; ?></th>
                        <td><?= $people['name']; ?></td>
                        <td><?= $people['email']; ?></td>
                        <td>
                            <a href="#" class="badge badge-info">detail</a>
                            <a href="#" class="badge badge-warning">edit</a>
                            <a href="#" class="badge badge-danger">delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Not found!</strong> Your search returns no result.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
</div>