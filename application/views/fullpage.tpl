{extends file="base-layout.tpl"}
	{block name="main"}
		{container}
			<div id="header">
				<div id="navbar">
					navbar
				</div>				
				
				<div id="jumbotron">
					sdsds
				</div>
				
				<div id="menubar">
					<ul id="menu" class="open">
						<li scroll-for="feature">Latest Movies</li>
						<li scroll-for="info">Best Movies</li>
						<li scroll-for="member">Archive</li>
						<li scroll-for="contact">About</li>
						<li class="scrolling"></li>
					</ul>
					<div id="pullmenu-icon"></div>					
				</div>
			</div>
			<div id="fullpage">
				<div id="feature" class="section">
					<div class="slide"><h1>Simple Demo</h1></div>
					<div class="slide"><h1>Only text</h1></div>
					<div class="slide"><h1>And text</h1></div>
					<div class="slide"><h1>And more text</h1></div>
				</div>
				<div id="info" class="section">2</div>
				<div id="member" class="section">3</div>
				<div id="contact" class="section">4</div>
			</div>	
		{/container}
	{/block}