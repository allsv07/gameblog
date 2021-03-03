<?php
//pr($news);
?>
<div class="row">
    <div class="admin-header">
        <span><a href="/admin">Админ панель</a> / Комментарии</span>
        <!-- <span class="add"><a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a></span> -->
    </div>
</div>
<div class="row">
    <div class="admin-content">
        <table>
            <tr>
                <th>Автор</th>
                <th>Комментарий</th>
                <th>Прокоментированная запись</th>
                <th>Статус</th>
                <th>Дата</th>
                <th>Действие</th>
            </tr>
            <? if (!empty($comments)): ?>
                <? foreach ($comments as $comment): ?>
                    <tr style="height: 50px">
                        <td><a href="/admin/users/edit/<?=$comment['u_id'];?>"><?=$comment['author']?></a></td>
                        <td><?=$comment['comment']?></td>
                        <td><?=$comment['title']?></td>
                        <td><?=($comment['active'] > 0) ? 'Включен' : 'Отключен';?></td>
                        <td><?=$comment['date']?></td>
                        <td>
                            <a href="/admin/comments/edit/<?=$comment['id']?>" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="/admin/comments/dell/<?=$comment['id']?>" onclick="return confirmDelete();" class="del"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <? endforeach; ?>
            <? endif; ?>
        </table>
    </div>
</div>