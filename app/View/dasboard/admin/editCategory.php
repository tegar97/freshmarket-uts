
<div class="content">
    <div class=" mt-5">
        <form enctype="multipart/form-data" action="/admin/category/edit/<?= $model['category']['id'] ?>"  method="post">
            <?php if (isset($model['error'])) { ?>
                <div class="row">
                    <div class="alert alert-danger" role="alert">
                        <?= $model['error'] ?>
                    </div>
                </div>
            <?php } ?>
            <div class="form-group ">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" name="name" id="category-name" placeholder="Nama Kategori" value="<?= $model['category']['name'] ?>">
            </div>
            <div class="form-group mt-3">
                <label for="exampleInputPassword1">Icon</label>
                <input type="file" accept="image/*" name="icon" class="form-control" id="icon" placeholder="icon" value="<?= $model['category']['icon']?>">
            </div>
            <div class="form-group mt-3">
                <label for="exampleInputPassword1">Background Color</label>
                <input id="color" type="text" value="<?= $model['category']['bgColor'] ?>" name="bgColor" class="form-control" />
            </div>

            <div class="mt-5 mb-5">
                <div class="category-demo" id="category-demo" style="background-color: <?= $model['category']['bgColor'] ?? '#FEEFEA'?> ">
                    <img src="/assets/icon/<?= $model['category']['icon'] ?>" class="mb-1" id="imgPreview" />
                    <span class=" category-demo-text mb-2"><?= $model['category']['name']?></span>
                    <span class="category-demo-count">20 items</span>
                </div>
            </div>

            <button type=" submit" class="btn btn-green text-white ">Update</button>
        </form>
    </div>
</div>