{% extends "layouts/login.volt" %}

{% block content %}
    <div class="page-header">
        <h1>Blog</h1>
        <p class="lead">Authentication</p>
    </div>

    <form method="post" class="form-signin" role="form">

        <div class="form-group">
            {{ form.render('username', ['class':'form-control']) }}
        </div>
        <div class="form-group">
            {{ form.render('password', ['class':'form-control']) }}
        </div>

        <div class="form-group">
            {{ form.render('Sign In') }}
        </div>

    </form>

{% endblock %}
