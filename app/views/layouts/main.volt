<!doctype html>
<html>
<head>
    <title>BlogMVC - {% block title %}{% endblock %}</title>
    {{ stylesheet_link("css/bootstrap/bootstrap.css") }}
    {{ stylesheet_link("css/main.css") }}
</head>
<body>
    {% block navbar %}
        <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{ link_to('', 'Blog', 'class': 'navbar-brand') }}
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li>{{ link_to(['for': 'login'], "Admin") }}</li>
                </ul>
            </div>

        </div>
    </div>
    {% endblock %}
    <div class="container">

        <div class="row">
            <div class="col-md-8">
                {% block content %}

                {% endblock %}
            </div>
            
            {% block sidebar %}
            <div class="col-md-4 sidebar">

                <h4>Categories</h4>
                <div class="list-group">
                    {% set categories=elements.getCategories() %}
                    {% for cat in categories %}
                    {{ link_to('category/' ~ cat.slug, '<span class="badge">' ~ cat.post_count ~ '</span>' ~ cat.name, 'class': 'list-group-item') }}
                    {% endfor %}
                </div>

                <h4>Last posts</h4>
                <div class="list-group">
                    {% set lastPosts=elements.getLastPosts() %}
                    {% for post in lastPosts %}
                        {{ link_to(['for': 'post', 'slug': post.slug|e], post.name, 'class': 'list-group-item') }}
                    {% endfor %}
                </div>
            </div>
            {% endblock %}
        </div>
    </div>
</body>
</html>

