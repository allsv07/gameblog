<div class="row">
    <div class="admin-header">
        <span><a href="/admin">Админ панель</a> / Статьи</span>
        <a href="/admin/articles/add" class="add">Добавить статью</a>
        <!-- <span class="add"><a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a></span> -->
    </div>
</div>
<div class="row">
    <div class="admin-content">
        <table>
            <tr>
                <th>Название статьи</th>
                <th>Изображение</th>
                <th>Автор</th>
                <th>Дата</th>
                <th><i class="fa fa-eye" aria-hidden="true"></i></th>
                <th><i class="fa fa-comment-o" aria-hidden="true"></i></th>
                <th>Действие</th>
            </tr>
            <? if (!empty($articles)): ?>
                <? foreach ($articles as $article): ?>
                    <tr style="height: 50px">
                        <td><?=$article['title']?></td>
                        <td><img style="width: 70px;" src="<?=PATH_IMAGE?>/<?=$article['image']?>" alt=""></td>
                        <td><?=$article['name']?></td>
                        <td><?=$article['date']?></td>
                        <td><?=$article['views']?></td>
                        <td><?=$article['comments']?></td>
                        <td>
                            <a href="/admin/articles/edit/<?=$article['num_id']?>" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="/admin/articles/delete/<?=$article['num_id']?>" onclick="return confirmDelete();" class="del"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <? endforeach; ?>
            <? endif; ?>
        </table>
    </div>
</div>