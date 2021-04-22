<div class="col col-lg-7 text-center">
    <h1>Список постов</h1>
    <div class="list-group">
        <?php if (is_array($currentPageData)) : ?>
            <?php

            $amountPosts = count($currentPageData);
            ?>

            <?php for ($i = 0; $i < $amountPosts; ++$i) :?>
                <?php $listItem = current($currentPageData); ?>
                <a href="" class="list-group-item list-group-item-action">
                    <div>
                        <h2 class="h5"><?=$listItem["headerPost"]?></h2>
                        <small>Автор: <?=$listItem["authorPost_LastName"]?> <?=$listItem["authorPost_FirstName"]?>
                        </small>
                    </div>
                </a>
                <?php  next($currentPageData); ?>
            <?php endfor; ?>

        <?php else : ?>
            ОШИБКА! Отсутствует список постов
        <?php endif; ?>
    </div>
</div>