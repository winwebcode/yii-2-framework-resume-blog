<?php
use yii\helpers\Html;
?>
<h1>Posts</h1>

<?php
foreach ($getArticle as $getPost) {
    //echo "$getPost->post_title<br>";
    echo Html::a("$getPost->post_title", "/yiiblog/web/index.php?r=post/blogpost/$getPost->post_title", ['class' =>'nav-link js-scroll-trigger']); echo "<br>";
}


?>