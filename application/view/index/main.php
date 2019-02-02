<h1>MY CD</h1>
<a href="/storage">Хранилище</a><br />
<button type="button" class="btn btn-primary mt-5 _js_addAudioButton">Добавить альбом</button>

<form action="/audio/add" enctype="multipart/form-data" method="post" class="mt-5 d-none _js_addAudioForm">
    <input type="hidden" name="id" />
    <div class="form-group">
        <label for="inputImage">Обложка</label>
        <input type="file" name="file" class="form-control-file" id="inputImage">
        <input type="hidden" name="image">
    </div>
    <div class="form-group">
        <label for="inputTitle">Название альбома</label>
        <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Название альбома">
    </div>
    <div class="form-group">
        <label for="inputAuthor">Название артиста</label>
        <input type="text" class="form-control" id="inputAuthor" name="author" placeholder="Название артиста">
    </div>
    <div class="form-group">
        <label for="inputReleaseYear">Год выпуска</label>
        <input type="number" class="form-control" id="inputReleaseYear" name="release_year" placeholder="Год выпуска">
    </div>
    <div class="form-group">
        <label for="inputDuration">Длительность альбома (минут)</label>
        <input type="number" class="form-control" id="inputDuration" name="duration" placeholder="Длительность альбома (минут)">
    </div>
    <div class="form-group">
        <label for="inputBuyDate">Дата покупки</label>
        <input type="date" class="form-control" id="inputBuyDate" name="buy_date" placeholder="Дата покупки">
    </div>
    <div class="form-group">
        <label for="inputCost">Стоимость покупки</label>
        <input type="number" class="form-control" id="inputCost" name="cost" placeholder="Стоимость покупки">
    </div>
    <?php if ($storage) { ?>
        <div class="form-group">
            <label for="inputStorageId">Код хранилища</label>
            <select class="form-control" name="storage_id" id="inputStorageId">
                <?php foreach ($storage as $item) { ?>
                    <option><?= $item['id'] ?></option>
                <?php } ?>
            </select>
        </div>
    <?php } ?>
    <button type="submit" class="btn btn-primary">Создать</button>
</form>

<?php if ($audio) { ?>
    <table class="table mt-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Обложка</th>
        <th scope="col">Название альбома</th>
        <th scope="col">Название артиста</th>
        <th scope="col">Год выпуска</th>
        <th scope="col">Длительность альбома (минут)</th>
        <th scope="col">Дата покупки</th>
        <th scope="col">Стоимость покупки</th>
        <th scope="col">Код хранилища</th>
        <th scope="col">Действия</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($audio as $item) { ?>
            <tr>
                <th scope="row"><?=$item['id']?></th>
                <td>
                    <img src="<?= $item['image'] ?: '/public/image/no_photo.png' ?>" height="100" />
                </td>
                <td class="align-middle"><?=$item['title']?></td>
                <td class="align-middle"><?=$item['author']?></td>
                <td class="align-middle"><?=$item['release_year']?></td>
                <td class="align-middle"><?=$item['duration']?></td>
                <td class="align-middle"><?=$item['buy_date']?></td>
                <td class="align-middle"><?=$item['cost']?></td>
                <td class="align-middle"><a href="/storage"><?=$item['storage_id']?></a></td>
                <td class="align-middle">
                    <a href="javascript:void(0)" class="_js_editAudioButton" data-audio='<?= json_encode($item)?>'>Редактировать</a>
                    <a href="/audio/drop/<?=$item['id']?>">Удалить</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
  </table>
<?php } ?>

    