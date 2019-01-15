@extends('admin.layout.index')

@section('content')
  <div class="mws-stat-container" style="margin-top: 30px;font-size: 60px;font-family: '华文彩云';color: #aaa;">
            <b>欢迎来到后台管理页面</b>   
        </div>
            <div class="mws-stat-container clearfix" style="margin-top:30px">
                    
                    <!-- Statistic Item -->
                    <a class="mws-stat" href="/admin/users">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-group-gear"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">后台用户数量</font></font></span>
                            <span class="mws-stat-value"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$users}}</font></font></span>
                        </span>
                    </a>
                    
                    <a class="mws-stat" href="/admin/husers">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-group"></span>

                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">前台用户数量</font></font></span>
                            <span class="mws-stat-value"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$user}}</font></font></span>
                        </span>
                    </a>

                    <a class="mws-stat" href="/admin/cates">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-color-swatch"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">类别种类</font></font></span>
                            <span class="mws-stat-value down"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$cates}} </font></font></span>
                        </span>
                    </a>

                    <a class="mws-stat" href="/admin/girls">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-cat"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">车模</font></font></span>
                            <span class="mws-stat-value"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$girls}}</font></font></span>
                        </span>
                    </a>
                    
                    <a class="mws-stat" href="/admin/label">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-draw-calligraphic"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">云标签</font></font></span>
                            <span class="mws-stat-value up"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$label}}</font></font></span>
                        </span>
                    </a>
                    
                    <a class="mws-stat" href="/admin/links">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-link"></span>

                        <!-- Statistic Content -->
                        <span class="mws-stat-content" title=".icol32-qip-online">
                            <span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">友情链接</font></font></span>
                            <span class="mws-stat-value"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$links}}</font></font></span>
                        </span>
                    </a>
                    
                    <a class="mws-stat" href="/admin/news">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-newspaper"></span>

                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">新闻列表</font></font></span>
                            <span class="mws-stat-value"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$news}}</font></font></span>
                        </span>
                    </a>
                    <a class="mws-stat" href="/admin/reports">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-group-error"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户举报</font></font></span>
                            <span class="mws-stat-value"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$inform_users}}</font></font></span>
                        </span>
                    </a>

                    <a class="mws-stat" href="/admin/comment">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-user-comment"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">评论管理</font></font></span>
                            <span class="mws-stat-value down"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$comment}}</font></font></span>
                        </span>
                    </a>

                    <a class="mws-stat" href="/admin/areports">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-page-white-error"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">文章举报</font></font></span>
                            <span class="mws-stat-value"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$inform_article}}</font></font></span>
                        </span>
                    </a>
                    
                    <a class="mws-stat" href="/admin/basics">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-terminal"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">网络配置</font></font></span>
                            <span class="mws-stat-value up"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$basic}}</font></font></span>
                        </span>
                    </a>
                    
                    <a class="mws-stat" href="/admin/adverts">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-car"></span>

                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">广告位</font></font></span>
                            <span class="mws-stat-value"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$advert}}</font></font></span>
                        </span>
                    </a>
                    
                    <a class="mws-stat" href="/admin/slides">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-photo"></span>

                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">轮播图</font></font></span>
                            <span class="mws-stat-value"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$slides}}</font></font></span>
                        </span>
                    </a>
                    
                    <a class="mws-stat" href="/admin/articles">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-page-white-gear"></span>

                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">文章管理</font></font></span>
                            <span class="mws-stat-value"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$article}}</font></font></span>
                        </span>
                    </a>
                </div>
@endsection