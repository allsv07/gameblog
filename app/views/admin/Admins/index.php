<?php
//pr($news);
?>
<div class="row">
    <div class="admin-header">
        <span><a href="/admin">Админ панель</a> / Админстраторы</span>
        <a href="/admin/admins/add" class="add">Добавить администратора</a>
    </div>
</div>
<div class="row">
    <div class="admin-content">
        <table>
            <tr>
                <th>Логин</th>
                <th>Дата добавления</th>
                <th>Роль</th>
                <th>Действие</th>
            </tr>
            <? if (!empty($admins)): ?>
                <? foreach ($admins as $admin): ?>
                    <tr style="height: 50px">
                        <td><a href="/admin/admins/edit/<?=$admin['id']?>"><?=$admin['login']?></a></td>
                        <td><?=$admin['date']?></td>
                        <td><?=$admin['role']?></td>
                        <td>
                            <a href="/admin/admins/edit/<?=$admin['id']?>" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="/admin/admins/delete/<?=$admin['id']?>" onclick="return confirmDelete();" class="del"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <? endforeach; ?>
            <? endif; ?>
        </table>
    </div>
</div>