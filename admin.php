			<div class="content"> 
			<div id="primary-content-wrap">
			<div id="primary-content">
				<div class="primary">
				
				<?php 
					if(@$_SESSION['user_mod']=='1'){ 
			echo("
			
				<div id='sadrzaj'>

					<div id='admin-nav1'>
						<h2>Admin panel<h2>
						<span class='admin-nav-cont1'><a href='index.php?page=6'>Users</a></span>
						<span class='admin-nav-cont1'><a href='index.php?page=7'>Movies</a></span>
						<span class='admin-nav-cont1'><a href='index.php?page=8'>Comments</a></span>
						<span class='admin-nav-cont1'><a href='index.php?page=9'>Polls</a></span>  
					</div>
				</div> 
			"); 
					}
				?>
				</div>
				<?php
					include("aside.php");
				?>
			</div>
		</div>
		</div>