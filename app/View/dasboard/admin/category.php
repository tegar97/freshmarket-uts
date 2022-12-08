<div class="content">
    <div class=" mt-5">
        <a href="/admin/category/add" class="btn btn-primary-green mb-3 ">Tambah product</a>
        <h1></h1>
        <table id="table" class="table table-hover" style="width:100%">
            <thead >
                <tr>
                    <th>icon</th>
                    <th>nama</th>
                    <th>color</th>
                    <th>action</th>

                </tr>
            </thead>
            <tbody>

                <?php foreach ($model['category'] as $row) : ?>
                    <tr>
                        <td>
                            <img src="/assets/icon/<?= $row['icon'] ?>" class="object-cover w-5" width="80" />
                        </td>
                        <td><?= $row['name'] ?></td>
                        <td>
                            <div class="color-demo" style="background-color: <?= $row['bgColor'] ?>"></div>
                        </td>
                        <td>
                            <a href="/admin/category/edit/<?= $row['id'] ?>" class="btn btn-green text-white">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger"><i class="fas fa-trash"></i></a>
    </div>
    </td>

    </tr>
</div>
<?php endforeach ?>


</table>
</div>
</div>