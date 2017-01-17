<?php
	$string="	<main id="main" class="site-main" role="main">
		<article id="post-60" class="post-60 post type-post status-publish format-standard has-post-thumbnail hentry category-drama category-fantasy category-uncategorized tag-fantasy has-thumb">
			<header class="entry-header">
			<div class="post__cats">
				<a href="#">Fantasy</a>
			</div>
			<h4 class="entry-title">Tom Cruise Oblivion (2015)</h4>
			<div class="entry-meta">
				<span class="post-author">Posted by <a class="post-author__link" href="#">admin</a></span>
				<span class="post__date">February 19, 2016</span>
				<span class="post__comments"><i class="material-icons">mode_comment</i><a href="#" class="post-comments__link">1</a></span>
			</div> 
			</header> 
			<figure class="post-thumbnail">
				<img width="770" height="480" src="https://ld-wp.template-help.com/wordpress_51822/wp-content/uploads/2016/02/img1-770x480.jpg" class="post-thumbnail__img wp-post-image" alt="img1"> </figure> 
			<div class="entry-content">
				<p><span style="color: #ffffff;">Released in:</span> 2011</p>
				<p><span style="color: #ffffff;">Genre:</span> Thriller</p>
				<p><span style="color: #ffffff;">Directed by:</span> George Nolfi</p>
				<p><span style="color: #ffffff;">Cast:</span> Matt Damon (David Norris); Emily Blunt (Elise Sellas); Lisa Thoreson; Florence Kastriner; Michael Kelly; Charlie Traynor; Phyllis MacBryde</p>
				<p><span style="color: #ffffff;">Philip K. Dick</span> … (short story “Adjustment Team”)</p>
				<p>DESCRIPTION</p>
			</div>
		</article>  
	</main>";
	$text = str_replace('"', "'", $string);
	echo $text;
?>