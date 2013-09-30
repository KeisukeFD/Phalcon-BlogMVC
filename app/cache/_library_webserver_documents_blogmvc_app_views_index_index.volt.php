<!doctype html>
<html>
<head>
    <title>BlogMVC - 
Welcome on my blog
</title>
    <?php echo Phalcon\Tag::stylesheetLink('css/bootstrap/bootstrap.css'); ?>
    <?php echo Phalcon\Tag::stylesheetLink('css/main.css'); ?>
</head>
<body>
    
        <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php echo Phalcon\Tag::linkTo(array('', 'Blog', 'class' => 'navbar-brand')); ?>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li><?php echo Phalcon\Tag::linkTo(array(array('for' => 'login'), 'Admin')); ?></li>
                </ul>
            </div>

        </div>
    </div>
    
    <div class="container">

        <div class="row">
            <div class="col-md-8">
                
    <div class="page-header">
        <h1>Blog</h1>
        <p class="lead">Welcome on my blog</p>
    </div>

    <?php foreach ($posts->items as $post) { ?>
    <article>
        <h2><?php echo Phalcon\Tag::linkTo(array(array('for' => 'post', 'slug' => $this->escaper->escapeHtml($post->slug)), $post->name)); ?></h2>
        <p><small>
            Category : <?php echo Phalcon\Tag::linkTo(array(array('for' => 'category', 'slug' => $post->categories->slug), $post->categories->name)); ?>,
            by <?php echo Phalcon\Tag::linkTo(array(array('for' => 'author', 'id' => $post->user_id), $post->users->username)); ?> on <em><?php echo Utils\formatDate($post->created); ?></em>
        </small></p>
        <p><?php echo strip_tags(Utils\truncate($post->content, 450)); ?></p>
        <p class="text-right">
            <?php echo Phalcon\Tag::linkTo(array(array('for' => 'post', 'slug' => $this->escaper->escapeHtml($post->slug)), 'Read more...', 'class' => 'btn btn-primary')); ?>
        </p>
    </article>

    <hr>
    <?php } ?>

    <ul class="pagination">
        <li><?php echo Phalcon\Tag::linkTo(array('?page=' . $posts->before, '&laquo;')); ?></li>
        <?php foreach (Utils\generateList($posts->first, $posts->total_pages) as $p) { ?>
        <li <?php if ($p == $posts->current) { ?>class="active"<?php } ?>>
            <?php echo Phalcon\Tag::linkTo(array('?page=' . $p, $p)); ?>
        </li>
        <?php } ?>
        <li><?php echo Phalcon\Tag::linkTo(array('?page=' . $posts->next, '&raquo;')); ?></li>
    </ul>

            </div>
            
            
            <div class="col-md-4 sidebar">

                <h4>Categories</h4>
                <div class="list-group">
                    <?php $categories = $this->elements->getCategories(); ?>
                    <?php foreach ($categories as $cat) { ?>
                    <?php echo Phalcon\Tag::linkTo(array('category/' . $cat->slug, '<span class="badge">' . $cat->post_count . '</span>' . $cat->name, 'class' => 'list-group-item')); ?>
                    <?php } ?>
                </div>

                <h4>Last posts</h4>
                <div class="list-group">
                    <?php $lastPosts = $this->elements->getLastPosts(); ?>
                    <?php foreach ($lastPosts as $post) { ?>
                        <?php echo Phalcon\Tag::linkTo(array(array('for' => 'post', 'slug' => $this->escaper->escapeHtml($post->slug)), $post->name, 'class' => 'list-group-item')); ?>
                    <?php } ?>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>

