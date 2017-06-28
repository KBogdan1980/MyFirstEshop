{*Сторінка продукта*}
<h3>{$rsProduct['name']}</h3>

<img width="575" src="/images/products/{$rsProduct['image']}">
Вартість: {$rsProduct['price']}

<a id="removeCart_{$rsProduct['id']}" {if ! $itemInCart}class="hideme"{/if} href="#" onClick="removeFromCart({$rsProduct['id']}); return false;" alt="Видалити з кошика">Видалити з кошика</a>
<a id="addCart_{$rsProduct['id']}" {if $itemInCart}class="hideme"{/if}  href="#" onclick="addToCart({$rsProduct['id']}); return false;" alt="Додати в кошик">Додати в кошик</a>
<p>Опис <br> {$rsProduct['description']}</p>