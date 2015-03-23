{extends file='base-layout.tpl'}
	{block name='main'}
		<div id="owl-demo" class="owl-carousel owl-theme">
			<div class="owlcarousel-item">
				<div class="alert error">
					<p class="alert-message">This is an error notice, it provides feedback of a negative nature to the user.</p>
					<div class="alert-control" >
						<div class="btn" alert-for="close">
							close
						</div>
					</div>
				</div>
			</div>
			<div class="owlcarousel-item">
				<div class="alert info">
					<p class="alert-message">This is an info notice, it provides feedback of a negative nature to the user.</p>
					<div class="alert-control" >
						<div class="btn" alert-for="close">
							close
						</div>
					</div>
				</div>
			</div>
			<div class="owlcarousel-item">
				<div class="alert success">
					<p class="alert-message">This is an success notice, it provides feedback of a negative nature to the user.</p>
					<div class="alert-control" >
						<div class="btn" alert-for="close">
							close
						</div>
					</div>
				</div>
			</div>
			<div class="owlcarousel-item">
				<div class="alert warning">
					<p class="alert-message">This is an warning notice, it provides feedback of a negative nature to the user.</p>
					<div class="alert-control" >
						<div class="btn" alert-for="close">
							close
						</div>
					</div>
				</div>
			</div>
		</div>
	{/block}		