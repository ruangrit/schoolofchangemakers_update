<div class="col-xs-12 ">
<div class="row">
    
<div class="block--latest--journals ">
	<h2 class="headline--block headline__alte txt__left">KNOWLEDGE RELATED TO YOU</h2>
    <div class="viewmore--line row col-xs-12 "></div>
    
    <div class="row journal--box--wrap">         
    
	<div class="block--latest--journals_detail col-xs-12" >
	<?php print $rows; ?>
	</div>

	<?php if(empty($rows)){ ?>
		<div style="margin-left: 20px;"><h4>ไม่พบบทความที่เกี่ยวข้อง</h4></div>
	<?php } ?>
    
    </div>


</div>   

<?php if(!empty($rows)){ ?>
<a href="/knowledge/list">
	<div class="viewmore--line row col-xs-12"><div href="#" class="viewmore--btn row">VIEW ALL <i class="glyphicon glyphicon-play-circle"></i></div></div> 
</a>
<?php } ?>
</div></div>