<div class="row">
    <div class="admin-header">
        <span><a href="/admin">Админ панель</a> / Коды и прохождения игр</span>
        <a href="/admin/cheats/add" class="add">Добавить</a>
        <!-- <span class="add"><a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a></span> -->
    </div>
</div>
<div class="row">
    <div class="admin-content">
        <table>
            <tr>
                <th>Название</th>
                <th>Изображение</th>
                <th>Автор</th>
                <th>Дата</th>
                <th><i class="fa fa-eye" aria-hidden="true"></i></th>
                <th><i class="fa fa-comment-o" aria-hidden="true"></i></th>
                <th>Действие</th>
            </tr>
            <? if (!empty($cheats)): ?>
                <? foreach ($cheats as $cheat): ?>
                    <tr style="height: 50px">
                        <td><?=$cheat['title']?></td>
                        <td><img style="width: 70px;" src="/public/images/upload_file/<?=$cheat['image']?>" alt=""></td>
                        <td><?=$cheat['name']?></td>
                        <td><?=$cheat['date']?></td>
                        <td><?=$cheat['views']?></td>
                        <td><?=$cheat['comments']?></td>
                        <td>
                            <a href="/admin/cheats/edit/<?=$cheat['num_id']?>" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="/admin/cheats/delete/<?=$cheat['num_id']?>" onclick="return confirmDelete();" class="del"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <? endforeach; ?>
            <? endif; ?>
        </table>
    </div>
</div>