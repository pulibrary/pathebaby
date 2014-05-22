<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>>
      <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>

  <?php 
  
  if($view_mode=='full'&&$node->field_kalturaid['und'][0]['value']!="") { 

//$path = "StreamAS/flash/hrc/library/pathe/". $node->field_filename['und'][0]['value'].".mp4";
$nodeID = $variables['nid'];
$prevID = $variables['nid']-1;
$nextID = $variables['nid']+1;

$kalturaID = $node->field_kalturaid['und'][0]['value'];

/*
print '<pre>';
print_r(get_defined_vars());
print '</pre>';
*/


 ?>

<!--   VIDEO PLAYER  -->

   <div id="player">

<script src="http://cdnapi.kaltura.com/p/1536481/sp/153648100/embedIframeJs/uiconf_id/16287801/partner_id/1536481"></script>
<div id="kaltura_player_1399495109" style="width: 620px; height: 480px;" itemprop="video" itemscope itemtype="http://schema.org/VideoObject">
<span itemprop="name" content="Pathe-0857"></span>
<span itemprop="description" content=""></span>
<span itemprop="duration" content="105"></span>
<span itemprop="thumbnail" content="http://cdnsecakmi.kaltura.com/p/1536481/sp/153648100/thumbnail/entry_id/1_khrkiw95/version/100000/acv/101"></span>
<span itemprop="width" content="620"></span>
<span itemprop="height" content="480"></span>
</div>
<script>
kWidget.embed({
  "targetId": "kaltura_player_1399495109",
  "wid": "_1536481",
  "uiconf_id": 16287801,
  "flashvars": {
    "streamerType": "rtmp",
    "mediaProtocol": "rtmp"
  },
  "cache_st": 1398870931,
  "entry_id": "<?php echo $kalturaID; ?>"
});
</script>


    </div>

<!--  END  VIDEO PLAYER  -->

  <div id="meta">  
     <b>Title:</b> <a href="<?php print $node_url; ?>"><?php print $title; ?></a><br />

     <?php
        print render($content);
     ?>
<ul id="nextprev-nav">
  <?php 
  
    $test_node = node_load(array('nid' => $prevID));
    $test_node_exists = ($test_node != false);
    $test_type = $test_node->type;
    if($test_type) { echo '<li><a id="prev-link" href="'.$prevID.'">Previous</a></li>'; }
  
  	$test_node = node_load(array('nid' => $nextID));
    $test_node_exists = ($test_node != false);
    $test_type = $test_node->type;
    if($test_type) { echo '<li><a id="next-link" href="'.$nextID.'">Next</a></li>'; }
	
  ?>
</ul>
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
