<?php
/**
 * Created by PhpStorm.
 * User: splasher
 * Date: 8/2/17
 * Time: 9:24 AM
 */
?>
<div id="admin-panel">
    <h2>Content Management</h2>
    <ul>
        <li class="manage"><a href="/admin/contents">Quản lý nội dung</a></li>
        <li class="manage"><a href="/admin/articles">Quản lý bài viết</a></li>
        <li class="manage"><a href="/admin/slideshow">Quản lý slideshow </a></li>
        <li class="manage"><a href="/admin/structure/menu/manage/main-menu">Quản lý Menu </a></li>
      <li class="manage"><a href="/admin/structure/block/manage/block/2/configure">Quản lý footer </a></li>
      <li class="manage"><a href="/admin/structure/block/manage/block/1/configure">Quản lý sidebar  </a></li>
    </ul>
</div>
<div id="admin-panel">

    <h2>Additional Content</h2>
    <ul>
        <li class="add"><a href="/node/add/page?destination=admin/dashboard">Thêm nội dung</a></li>
        <li class="add"><a href="/node/add/article?destination=admin/dashboard">Thêm bài viết</a></li>
        <li class="add"><a href="/node/add/slider?destination=admin/dashboard">Add Slideshow</a></li>
    </ul>
</div>
<div id="admin-panel">

    <h2>Settings and Report </h2>
    <ul>
        <!--        <li class="user-logout"><a href="/admin/config/content/idea?destination=admin/dashboard">Cấu hình thông tin website</a></li>-->
        <li class="user-logout"><a href="/admin/config/system/googleanalytics?destination=admin/dashboard">Google Analystics</a></li>
        <li class="user-logout"><a href="/admin/config/search/metatags?destination=admin/dashboard">Manage Metatag</a></li>
        <li class="user-logout"><a href="/admin/config/development/performance?destination=admin/dashboard">Clear cache</a></li>
        <li class="user-logout"><a href="/user/logout">Logout</a></li>
    </ul>
</div>

