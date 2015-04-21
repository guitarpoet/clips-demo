{extends file="base-layout.tpl"}
	{block name="main"}
		<div class="shopping-cart">
			<ol id="shopping-cart-list" class="ui-list shoping-cart-list">
				<script id="cart-list-template" type="text/x-handlebars-template">
					<li id="shopping-cart--list-item{literal}{{itemId}}{/literal}" class="_grid shopping-cart--list-item">
						<div class="_column product-image">
							<img class="product-image--img" src="{literal}{{img}}{/literal}" alt="Item image" />
						</div>
						<div class="_column product-info">
							<h4 class="product-name">{literal}{{name}}{/literal}</h4>
							<p class="product-desc">{literal}{{desc}}{/literal}</p>
							<div class="price product-single-price">{literal}{{price}}{/literal}</div>
						</div>
						<div class="_column product-modifiers" data-product-price="{literal}{{price}}{/literal}">
							<div id="spinner" class="_grid spinner" data-trigger="spinner">
								<button class="_btn _column product-subtract" data-spin="down">&minus;</button>
								<input class="_column product-qty" type="text" value="{literal}{{number}}{/literal}" data-rule="quantity">
								<button class="_btn _column product-plus" data-spin="up">&plus;</button>
							</div>
							<button class="_btn entypo-trash product-remove">Remove</button>
							<div class="price product-total-price">0.00</div>
						</div>
					</li>
				</script>
			</ol>
			<div class="_grid cart-totals">
				<div id="subtotalCtr" class="_column subtotal">
				</div>
				<div id="shippingCtr" class="_column shipping">
				</div>
				<div id="taxesCtr" class="_column taxes">
				</div>
				<div id="totalCtr" class="_column total">
					<div class="cart-totals-key">Total</div>
					<div class="cart-totals-value">0.00</div>
				</div>
				<div class="_column checkout">
					<button class="_btn checkout-btn entypo-forward">Checkout</button>
				</div>
			</div>
		</div>
	{/block}