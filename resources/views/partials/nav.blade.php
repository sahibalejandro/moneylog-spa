<nav class="navbar navbar-default">
	<div class="container">

		<!-- Navbar header -->
		<div class="navbar-header">

			<!-- Hamburguesa -->
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse"
				data-target="#nav"
			>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<!-- Brand -->
			<a href="/" class="navbar-brand">MoneyLog 2</a>
		</div>

		<!-- Navbar links -->
		<div class="collapse navbar-collapse" id="nav">
			<ul class="nav navbar-nav">
				<li>
				    <a v-link="{name:'dashboard'}">Dashboard</a>
				</li>
				<li>
				    <a v-link="{name:'movements.index'}">Movimientos</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

