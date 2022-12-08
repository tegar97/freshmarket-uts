<div class="content">
    <div class=" mt-5">
        <a href="/admin/product/add" class="btn btn-primary-green mb-3 ">Tambah product</a>
        <table id="table" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Nama</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model['product'] as $row) : ?>
                    <tr>
                        <td>
                            <img src="/assets/product/<?= $row['image'] ?>" class="object-cover w-5" width="80" />
                        </td>
                        <td><?= $row['name'] ?></td>
                        <td>$ <?= $row['price'] ?></td>
                        <td><?= $row['stock'] ?></td>
                        <td><?= $row['category_name'] ?></td>

                        <td >

                            <form method="POST" action="/admin/product/delete/<?= $row['id'] ?>">
                                <a href="/admin/product/edit/<?= $row['id'] ?>" class="btn btn-green text-white">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>

                    </tr>
                <?php endforeach ?>
            </tbody>

        </table>
    </div>
</div>