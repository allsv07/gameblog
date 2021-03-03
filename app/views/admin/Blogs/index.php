<div class="row">
    <div class="admin-header">
        <span><a href="/admin">Админ панель</a> / Блоги</span>
        <a href="/admin/blogs/add" class="add">Добавить блог</a>
        <!-- <span class="add"><a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a></span> -->
    </div>
</div>
<div class="row">
    <div class="admin-content">
        <table>
            <tr>
                <th>Название блога</th>
                <th>Изображение</th>
                <th>Автор</th>
                <th>Дата</th>
                <th><i class="fa fa-eye" aria-hidden="true"></i></th>
                <th><i class="fa fa-comment-o" aria-hidden="true"></i></th>
                <th>Действие</th>
            </tr>
            <? if (!empty($blogs)): ?>
                <? foreach ($blogs as $blog): ?>
                    <tr style="height: 50px">
                        <td><?=$blog['title']?></td>
                        <td><img style="width: 70px;" src="<?=PATH_IMAGE?>/<?=$blog['image']?>" alt=""></td>
                        <td><?=$blog['author']?></td>
                        <td><?=$blog['date']?></td>
                        <td><?=$blog['views']?></td>
                        <td><?=$blog['comments']?></td>
                        <td>
                            <a href="/admin/blogs/edit/<?=$blog['num_id']?>" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="/admin/blogs/delete/<?=$blog['num_id']?>" onclick="return confirmDelete();" class="del"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <? endforeach; ?>
            <? endif; ?>
        </table>
    </div>
</div>