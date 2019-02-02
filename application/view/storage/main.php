<h1>Хранилище</h1>
<a href="/">MY CD</a><br />
<button type="button" class="btn btn-primary mt-5 _js_addAudioButton">Добавить объект</button>

<form action="/storage/add" method="post" class="mt-5 d-none _js_addAudioForm">
    <input type="hidden" name="id" />
    <div class="form-group">
        <label for="inputRoom">Номер комнаты</label>
        <input type="number" name="room" class="form-control-file" id="inputRoom" placeholder="Номер комнаты">
    </div>
    <div class="form-group">
        <label for="inputStand">Номер стойки</label>
        <input type="number" class="form-control" id="inputTitle" name="stand" placeholder="Номер стойки">
    </div>
    <div class="form-group">
        <label for="inputShelf">Номер полки</label>
        <input type="number" class="form-control" id="inputShelf" name="shelf" placeholder="Номер полки">
    </div>
    <button type="submit" class="btn btn-primary">Создать</button>
</form>

<?php if ($storage) { ?>
    <table class="table mt-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Номер комнаты</th>
        <th scope="col">Номер стойки</th>
        <th scope="col">Номер полки</th>
        <th scope="col">Действия</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($storage as $item) { ?>
            <tr>
                <th scope="row"><?=$item['id']?></th>
                <td class="align-middle"><?=$item['room']?></td>
                <td class="align-middle"><?=$item['stand']?></td>
                <td class="align-middle"><?=$item['shelf']?></td>
                <td class="align-middle">
                    <a href="javascript:void(0)" class="_js_editAudioButton" data-audio='<?= json_encode($item)?>'>Редактировать</a>
                    <a href="/storage/drop/<?=$item['id']?>">Удалить</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
  </table>
<?php } ?>    