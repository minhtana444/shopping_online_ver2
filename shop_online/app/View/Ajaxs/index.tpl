
<div class="section group" id="result_list">
  {foreach $data.product as $product}
      <div class="col_1_of_5 span_1_of_5">
      <div class="grid-img">
          <a href="details.html"><img src="/common_pc/img/pic4.jpg" alt=""/></a> 
      </div>
        <p>{$product.Product.name}</p>
      <button class="left">{$product.Product.price}</button>
      <div class="btn right"><a href="details.html">view</a></div>
    </div>
      
{/foreach}
</div>
