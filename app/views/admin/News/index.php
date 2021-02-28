<?php
//pr($news);
?>
<div class="row">
    <div class="admin-header">
        <span><a href="/admin">Админ панель</a> / Новости</span>
        <a href="/admin/news/add" class="add">Добавить новость</a>
        <!-- <span class="add"><a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a></span> -->
    </div>
</div>
<div class="row">
    <div class="admin-content">
        <table>
            <tr>
                <th>Название новости</th>
                <th>Изображение</th>
                <th>Автор</th>
                <th>Дата</th>
                <th><i class="fa fa-eye" aria-hidden="true"></i></th>
                <th><i class="fa fa-comment-o" aria-hidden="true"></i></th>
                <th>Действие</th>
            </tr>
            <? if (!empty($news)): ?>
            <? foreach ($news as $new): ?>
            <tr style="height: 50px">
                <td><?=$new['title']?></td>
                <td><img style="width: 70px;" src="/public/images/upload_file/<?=$new['image']?>" alt=""></td>
                <td><?=$new['name']?></td>
                <td><?=$new['date']?></td>
                <td><?=$new['views']?></td>
                <td><?=$new['comments']?></td>
                <td>
                    <a href="/admin/news/edit/<?=$new['num_id']?>" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="/admin/news/delete/<?=$new['num_id']?>" onclick="return confirmDelete();" class="del"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
            <? endforeach; ?>
            <? endif; ?>
        </table>
    </div>
</div>