<?php /** @var \App\Models\Painting[] $paintings */ ?>

<div class="d-flex justify-content-between align-items-center">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Заголовок</th>
            <th scope="col">Описание</th>
            <th scope="col">а</th>
            <th scope="col">вре</th>
            <th scope="col">со</th>
            <th scope="col">отр</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($paintings as $painting) { ?>
            <tr>
                <td>
                    <?= $painting->id ?>
                </td>
                <td>
                    <?= $painting->title ?>
                </td>
                <td>
                    <?= $painting->description ?>
                </td>
                <td>
                    <?= $painting->author ?>
                </td>
                <td>
                    <?= $painting->creation_date ?>
                </td>
                <td>
                    <?= $painting->created_at ?>
                </td>
                <td>
                    <?= $painting->updated_at ?>
                </td>
            </tr>
        <? } ?>
        </tbody>
    </table>
</div>
