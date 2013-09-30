<!doctype html>
<html>
<head>
    <title>BlogMVC - </title>
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
    <h1><?php echo $post->name; ?></h1>
    <p><small>
        Category : <?php echo Phalcon\Tag::linkTo(array(array('for' => 'category', 'slug' => $post->categories->slug), $post->categories->name)); ?>,
        by <?php echo Phalcon\Tag::linkTo(array(array('for' => 'author', 'id' => $post->user_id), $post->users->username)); ?> on <em><?php echo Utils\formatDate($post->created); ?></em>
    </small></p>
</div>

<article>
    <?php echo Utils\MarkdownParse($post->content); ?>
</article>

<hr>

<section class="comments">

    <h3>Comment this post</h3>

    <div class="alert alert-danger"><strong>Oh snap !</strong> you did some errors</div>

    <form role="form">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Your email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group has-error">
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Your username">
                </div>
            </div>
        </div>
        <div class="form-group">
            <textarea class="form-control" rows="3" placeholder="Your comment"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <h3><?php echo $this->length($post->comments); ?> <?php if ($this->length($post->comments) > 1) { ?>Commentaires<?php } else { ?>Commentaire<?php } ?></h3>

    <?php foreach ($post->comments as $comment) { ?>
    <div class="row">
        <hr>
        <div class="col-md-2">
            <img src="http://lorempicsum.com/futurama/100/100/4" width="100%">
        </div>
        <div class="col-md-10">
            <p><strong><?php echo $comment->username; ?></strong> <?php echo Utils\timeAgoWord($comment->created); ?></p>
            <p><?php echo nl2br($this->escaper->escapeHtml($comment->content)); ?></p>
        </div>
    </div>
    <?php } ?>
 </section>


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

