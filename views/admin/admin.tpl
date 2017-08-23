<div id="blockNewCategory">
    Нова категорія: 
    <input name="newCategoryName" id="newCategoryName" type="text" value="">
    <br><br>
        Є підкатегорією для
        <select name="generalCatId">
            <option value="0">Головна категорія
                {foreach $rsCategories as $item}
                <option value="{$item['id']}">{$item['name']}
                {/foreach}
        </select>
        <br><br>
        <input type="button" onclick="newCategory();" value="Додати категорію">
        
</div>