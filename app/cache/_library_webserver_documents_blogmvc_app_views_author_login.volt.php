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
        <h1>Blog</h1>
        <p class="lead">Authentication</p>
    </div>

    <form action="#" class="form-signin" role="form">

        <div class="form-group">
            <?php echo $form->render('username', array('class' => 'form-control')); ?>
        </div>
        <div class="form-group">
            <?php echo $form->render('password', array('class' => 'form-control')); ?>
        </div>

        <div class="form-group">
            <?php echo $form->render('Sign In'); ?>
        </div>

    </form>


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

