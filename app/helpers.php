<?php

use App\Models\Category;

use function App\Http\Controllers\Admin\Category\showCategories as CategoryShowCategories;


if(!function_exists("showCategories")){
    function showCategories($categories,$parent,$char,$parent_id_child){
        foreach($categories as $category){
            if($category["parent"] == $parent){
                if($category['id'] == $parent_id_child){
                echo "<option selected value=".$category["id"].">".$char.$category['name']."</br>"."</option>";

                }
                else{
                    echo "<option value=".$category["id"].">".$char.$category['name']."</br>"."</option>";

                }
                $newParent = $category["id"];
                echo showCategories($categories,$newParent,$char."|-- ",$parent_id_child);
            }
        }
    }
}
if(!function_exists(("showPrice"))){
    function showPrice($item){
        echo number_format($item['price'],2,",",".")." vnđ" ;
    }
}

?>