<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        {{ get_title() }}
        {{ stylesheet_link('css/bootstrap.min.css') }}
        {{ stylesheet_link('css/both.css') }}
        {{ stylesheet_link('css/reset.css') }}
    </head>
    <body>

        <div class="all">
            <div class="head">
                <div class="head-1">
                    <ul>
                        <li>{{ link_to('index', 'BLOG') }}</li>
                        <li>As you like,as you do</li>
                    </ul>
                </div>
                <div class="head-2">
                    <ul>
                    {% if session.get('auth') %}
                        <li>{{ link_to('article', '发布文章') }}</li>
                        <li>{{ link_to('article/management', '管理文章') }}</li>
                    {% else %}
                        <li>{{ link_to('login', '登录') }}</li>
                        <li>{{ link_to('register', '注册') }}</li>
                    {% endif %}
                    </ul>
                </div>
            </div>
            <div class="nav">
                <div class="nav_img">
                    {{ image('img/2.jpg') }}
                </div>
                <div class="nav_nav"></div>
                {{ flash.output() }}
            </div>

            {{ content() }}
            {{ javascript_include('js/jquery.min.js') }}
            {{ javascript_include('js/bootstrap.min.js') }}
            {{ javascript_include('js/utils.js') }}
            
        </div>
    </body>
</html>