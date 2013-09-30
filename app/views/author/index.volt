{% extends "layouts/main.volt" %}

{% block title %}
Welcome on my blog
{% endblock %}

{% block content %}
    <div class="page-header">
        <h1>Blog</h1>
        <p class="lead">Welcome on my blog Author</p>
    </div>

    {% for post in posts.items %}
    <article>
        <h2>{{ link_to(['for': 'post', 'slug': post.slug|e], post.name) }}</h2>
        <p><small>
            Category : {{ link_to(['for': 'category', 'slug': post.categories.slug], post.categories.name) }},
            by {{ link_to(['for': 'author', 'id': post.user_id], post.users.username) }} on <em>{{ post.created|date }}</em>
        </small></p>
        <p>{{ post.content|truncateword(450)|striptags }}</p>
        <p class="text-right">
            {{ link_to(['for': 'post', 'slug': post.slug|e], "Read more...", 'class': 'btn btn-primary') }}
        </p>
    </article>

    <hr>
    {% endfor %}

    <ul class="pagination">
        <li>{{ link_to('?page=' ~ posts.before, '&laquo;') }}</li>
        {% for p in generateList(posts.first, posts.total_pages) %}
        <li {% if p == posts.current %}class="active"{% endif %}>
            {{ link_to('?page=' ~ p, p) }}
        </li>
        {% endfor %}
        <li>{{ link_to('?page=' ~ posts.next, '&raquo;') }}</li>
    </ul>
{% endblock %}