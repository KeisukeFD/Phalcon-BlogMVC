{% extends "layouts/main.volt" %}

{% block content %}
<div class="page-header">
    <h1>{{ post.name }}</h1>
    <p><small>
        Category : {{ link_to(['for': 'category', 'slug': post.categories.slug], post.categories.name) }},
        by {{ link_to(['for': 'author', 'id': post.user_id], post.users.username) }} on <em>{{ post.created|date }}</em>
    </small></p>
</div>

<article>
    {{ post.content|md }}
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

    <h3>{{ post.comments|length }} {% if post.comments|length > 1 %}Commentaires{% else %}Commentaire{% endif %}</h3>

    {% for comment in post.comments %}
    <div class="row">
        <hr>
        <div class="col-md-2">
            <img src="http://lorempicsum.com/futurama/100/100/4" width="100%">
        </div>
        <div class="col-md-10">
            <p><strong>{{ comment.username }}</strong> {{ comment.created|timeAgo }}</p>
            <p>{{ comment.content|e|nl2br }}</p>
        </div>
    </div>
    {% endfor %}
 </section>

{% endblock %}