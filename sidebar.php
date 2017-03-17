

 <?php if ( is_home() || is_category() ) { ?>
 <?php if (in_category(array('resources')) or in_category(array('student-work')) or in_category(array('news')) ) { ?>
 <li id="categories"><?php _e('Categories:'); ?>
	<?php
	if (is_category()) {
	$this_category = get_category($cat);
	}
	if($this_category->category_parent)
	$this_category = wp_list_categories('orderby=id&title_li=&child_of='.$this_category->category_parent."&echo=0"); else
	$this_category = wp_list_categories('orderby=id&title_li=&child_of='.$this_category->cat_ID."&echo=0");
	if ($this_category) { ?>
	<ul>
	<?php echo $this_category; ?>
	</ul>
	<?php } ?>
	 </li>

 <?php } else { ?>
 	<li id="categories"><?php _e('Categories:'); ?>
		<ul>
			<?php wp_list_cats('orderby=name&exclude=2,3,19,25'); ?>
		</ul>
	 </li>
 <?php } ?>
	 
  
<?php } else if ( is_single() ) { ?>
<?php if (in_category(array('resources'))) { ?>

 	<li id="categories"><?php _e('Recent Resources:'); ?>
		<ul>
			<?php $recent_posts = wp_get_recent_posts('cat=19&showposts=10');
				foreach( $recent_posts as $recent ){
					echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
				}
			?>

		</ul>
	 </li>

	<!--  <a style="size: 1em; margin-top:5%;" href="http://blueshiftcoding.com/category/resources/">Back to Resources</a> -->

 <?php } else if (in_category(array('news'))) { ?>
	<li id="categories"><?php _e('Recent Posts:'); ?>
		<ul>
			<?php $recent_posts = wp_get_recent_posts('cat=36&showposts=10');
				foreach( $recent_posts as $recent ){
					echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
				}
			?>

		</ul>
	 </li>
 <?php } else { ?>
	<li id="categories"><?php _e('Recent Posts:'); ?>
		<ul>
			<?php $recent_posts = wp_get_recent_posts('cat=-19,-25&showposts=10');
				foreach( $recent_posts as $recent ){
					echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
				}
			?>

		</ul>
	 </li>
 <?php } ?>
		
		

<?php } ?>   