<?php
//pr($news);
?>
<div class="row">
    <div class="admin-header">
        <span><a href="/admin">Админ панель</a> / Пользователи</span>
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
            <? if (!empty($users)): ?>
                <? foreach ($users as $user): ?>
                    <tr style="height: 50px">
                        <td><a href="/admin/users/edit/<?=$user['id']?>"><?=$user['login']?></a></td>
                        <td><?=$user['date']?></td>
                        <td><?=$user['role']?></td>
                        <td>
                            <a href="/admin/users/edit/<?=$user['id']?>" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="/admin/users/delete/<?=$user['id']?>" onclick="return confirmDelete();" class="del"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <? endforeach; ?>
            <? endif; ?>
        </table>
    </div>
</div>