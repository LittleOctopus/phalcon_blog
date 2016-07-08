<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?= $this->tag->getTitle() ?>
        <?= $this->tag->stylesheetLink('css/bootstrap.min.css') ?>
        <?= $this->tag->stylesheetLink('css/both.css') ?>
        <?= $this->tag->stylesheetLink('css/reset.css') ?>
    </head>
    <body>

        <div class="all">
            <div class="head">
                <div class="head-1">
                    <ul>
                        <li><?= $this->tag->linkTo(['index', 'BLOG']) ?></li>
                        <li>As you like,as you do</li>
                    </ul>
                </div>
                <div class="head-2">
                    <ul>
                    <?php if ($this->session->get('auth')) { ?>
                        <li><?= $this->tag->linkTo(['article', '发布文章']) ?></li>
                        <li><?= $this->tag->linkTo(['article/management', '管理文章']) ?></li>
                    <?php } else { ?>
                        <li><?= $this->tag->linkTo(['login', '登录']) ?></li>
                        <li><?= $this->tag->linkTo(['register', '注册']) ?></li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="nav">
                <div class="nav_img">
                    <?= $this->tag->image(['img/2.jpg']) ?>
                </div>
                <div class="nav_nav"></div>
                <?= $this->flash->output() ?>
            </div>

            <?= $this->getContent() ?>
            <?= $this->tag->javascriptInclude('js/jquery.min.js') ?>
            <?= $this->tag->javascriptInclude('js/bootstrap.min.js') ?>
            <?= $this->tag->javascriptInclude('js/utils.js') ?>
            
        </div>
    </body>
</html>