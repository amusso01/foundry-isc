<?php
/**
 * Template part for comments in post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package foundry
 */
  $author = get_the_author();
?>

<h3>Comment.</h3>
					<?php $comment_args = array(
						        'comment_notes_after' => '',
							    'post_id' => get_the_ID()
						      );
						$comments = get_comments($comment_args);
						if($comments){
							foreach ($comments as $comment ) :
							    echo '<div class="comments-box"><p>'.$comment->comment_content.'</p><p class="comment-author">'.$comment->comment_author.'</p></div>';
							endforeach;

						}else{
							echo '<p>NO comments</p>';
						}
						

						if ( comments_open() ) :
							comment_form(); 
						endif;
					?>