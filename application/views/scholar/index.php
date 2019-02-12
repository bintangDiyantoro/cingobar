<div class="row">
    <div class="col-md-6">
        <h1>Scholar list</h1>
        <ul class="list-group">
            <?php foreach($scholars as $scholar): ?>
            <li class="list-group-item list-group-item-action">
                <?= $scholar['name']; ?>
                <a href="#" class="badge badge-info float-right ml-2">Detail</a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
