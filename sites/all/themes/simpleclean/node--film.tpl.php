<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>>
      <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>



  <div class="content clearfix"<?php print $content_attributes; ?>>

  <?php if($view_mode=='full'&&$node->field_filename['und'][0]['value']!="") { 

$path = "StreamAS/flash/hrc/library/pathe/". $node->field_filename['und'][0]['value'].".mp4";
$nodeID = $variables['nid'];
$prevID = $variables['nid']-1;
$nextID = $variables['nid']+1;

/*
print '<pre>';
print_r(get_defined_vars());
print '</pre>';
*/


 ?>

<!--   VIDEO PLAYER  -->


   <div id="player">
	<embed
	src="http://bc.princeton.edu/flash/player/player.swf"
	width="640"
	height="550"
	bgcolor="#000000"
	autostart="false" 
	allowscriptaccess="always"
	flashvars="file=<?php echo $path ?>&streamer=rtmp://flash.princeton.edu/bc&autostart=false"
	/>
    </div>



<!--  END  VIDEO PLAYER  -->

  <div id="meta">  
     <b>Title:</b> <a href="<?php print $node_url; ?>"><?php print $title; ?></a><br />

     <?php
        print render($content);
     ?>
<div id="nextprev-nav">
  <?php 
       if($nodeID<744) { echo '<a id="next-link" href="'.$nextID.'">Next</a>';  }
       if($nodeID>1) { echo '<a id="prev-link" href="'.$prevID.'">Previous</a>'; }
  ?>
</div>
  </div>

   <?php } //end if not teaser mode ?>

    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      ?>


  </div>

  <?php
    // Remove the "Add new comment" link on the teaser page or if the comment
    // form is being displayed on the same page.
    if ($teaser || !empty($content['comments']['comment_form'])) {
      unset($content['links']['comment']['#links']['comment-add']);
    }
    // Only display the wrapper div if there are links.
    $links = render($content['links']);
    if ($links):
  ?>
    <div class="link-wrapper">
      <?php print $links; ?>
    </div>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

</div>
