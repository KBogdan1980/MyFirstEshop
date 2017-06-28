{*Шаблон кошика*}

<h1>Кошик</h1>

{if ! $rsProducts}
В кошику пусто.

{else}
    <h2>Данні замовлення</h2>
    <table>
        <tr>
            <td>№</td>
            <td>Назва</td>
            <td>Кількість</td>
            <td>Ціна за одиницю</td>
            <td>Ціна</td>
            <td>Дія</td>
        </tr>
        
        {foreach $rsProducts as $item name=products}
            <tr>
                
                <td>{$smarty.foreach.products.iteration}</td>
                
                <td><a href="/product/{$item['id']}/">{$item['name']}</a><br></td>
                
                <td><input name="itemCnt_{$item['id']}" id="itemCnt_{$item['id']}" type="text" value="1" onchange="conversionPrice({$item['id']});"/></td>
                    
                <td>
                    <span id="itemPrice_{$item['id']}" value="{$item['price']}">
                        {$item['price']}
                    </span>
                </td>
                
                <td>
                    <span id="itemRealPrice_{$item['id']}">
                        {$item['price']}
                    </span>
                </td>
                
                <td>
                    <a id="removeCart_{$item['id']}" href="#" onClick="removeFromCart({$item['id']}); return false;" title="Видалити з кошика">Видалити з кошика</a>
                    <a id="addCart_{$item['id']}" class='hideme' href='#' onClick="addToCart({$item['id']}); return false;" title="Відновити">Відновити</a>
                </td>
        </tr>
        {/foreach}
        
    </table>
{/if}