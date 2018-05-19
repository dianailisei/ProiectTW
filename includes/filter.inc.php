<?php

function showFilter(){
    $search='';
    $order='';
    $order1='';
    $order2='';
    $category='';
    $category1='';
    $category2='';
    $category3='';
    $tags='';
    
    if(isset($_GET["search"]))
        $search = $search . "?search=" . $_GET["search"];
    
    if(isset($_GET["order"]))
        if($_GET["order"]=="rating")
            $order = 'checked="checked"';
        elseif($_GET["order"]=="downloads")
            $order1 = 'checked="checked"';
        elseif($_GET["order"]=="upload_date")
            $order2 = 'checked="checked"';

    
    if(isset($_GET["category"]))
        if($_GET["category"]=="Entertainment")
            $category = 'checked="checked"';
        elseif($_GET["category"]=="Network")
            $category1 = 'checked="checked"';
        elseif($_GET["category"]=="Office")
            $category2 = 'checked="checked"';
        elseif($_GET["category"]=="Utility")
            $category3 = 'checked="checked"';
    
    if(isset($_GET["tags"]))
        $tags = $tags . 'value="' . $_GET["tags"] . '"';
    
    
    echo '<form method="GET" action="all.php'.$search.'" class="all-app-container">
        <h1>Order by</h1>
        <div class="all-app-sub">
        <div><input type="radio" name="order" value="rating" '.$order.'>Rating</div><br>
        <div><input type="radio" name="order" value="downloads" '.$order1.'>Downloads</div><br>
        <div><input type="radio" name="order" value="upload_date" '.$order2.'>Newest</div><br>
        </div>
        <br><br>
        <h1>Category</h1>
        <div class="all-app-sub">
        <div><input type="radio" name="category" value="Entertainment" '.$category.'> Entertainment</div><br>
        <div><input type="radio" name="category" value="Network" '.$category1.'> Network</div><br>
        <div><input type="radio" name="category" value="Office" '.$category2.'> Office</div><br>
        <div><input type="radio" name="category" value="Utility" '.$category3.'> Utility</div><br>
        </div>
        <h1>Tags</h1>
        <input type="text" placeholder="Type tags here" name="tags" '.$tags.'><br>
        <button type="submit">Apply</button>
    </form>';
}
?>