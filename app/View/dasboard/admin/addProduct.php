<div class="content">
    <div class=" mt-5">
        <form enctype="multipart/form-data" action="/admin/product/add" method="post">
            <?php if (isset($model['error'])) { ?>
                <div class="row">
                    <div class="alert alert-danger" role="alert">
                        <?= $model['error'] ?>
                    </div>
                </div>
            <?php } ?>
            <div class="form-group ">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" name="name" id="product-name" placeholder="Nama Product">
            </div>
            <div class="form-group mt-3">
                <label for="exampleInputEmail1">Description</label>
                <textarea type="text" class="form-control" name="description" placeholder="Description"></textarea>
            </div>

            <div class="form-group mt-3">
                <label for="exampleInputPassword1">Gambar</label>
                <input type="file" accept="image/*" name="image" class="form-control" id="image" placeholder="Gambar">
            </div>
            <div class="form-group mt-3">
                <label for="exampleInputEmail1">Harga</label>
                <input type="text"  id="price" class="form-control" name="price" placeholder="harga">
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="exampleInputEmail1">Stock</label>
                <input type="number" class="form-control" name="stock" placeholder="Stock">
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="exampleInputEmail1">Kategori Product</label>
                <select class="form-select" aria-label="Default select example" name="category_id">
                    <option selected>Kategori Product</option>
                    <?php foreach ($model['category'] as $row) : ?>
                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <button type=" submit" class="btn btn-green text-white ">Tambah Product</button>
        </form>
    </div>
</div>