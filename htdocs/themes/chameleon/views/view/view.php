<?php $this->load->view('defaults/header');

$seg3 = $this->uri->segment(3);

if($seg3 != 'diff'){
    $page_url = $url;
}else{
    $page_url = $url . '/diff';
}

if(isset($insert)){
	echo $insert;
}?>

<div class="container-fluid">
	<div class="d-sm-flex">
		<div class="flex-fill">
			<h1 class="pt-3"><?= $title; ?></h1>
			<p class="mr-3"><?php echo lang('paste_from'); ?> <?php echo $name; ?>, <?php $p = explode(',', timespan($created, time())); echo sprintf($this->lang->line('paste_ago'),$p[0]); ?>, <?php echo lang('paste_writtenin'); ?> <?php echo $lang; ?>.</p>
		</div>
		<div>
			<?php if($this->config->item('qr_enabled')) { ?>
				<div class="qr py-3">
					<img src="<?php echo site_url('view/qr/' . $pid ); ?>">
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<div class="bg-light text-dark py-3"><?= $paste ?></div>

<div class="container-fluid">
<?php

function checkNum($num){
	return ($num%2) ? TRUE : FALSE;
}

if(isset($replies) and !empty($replies)){
	$n = 1;
?>
	<h2 class="mt-3"><?php echo lang('paste_replies'); ?> <?php echo $title; ?></h2>

	<table class="table">
		<thead>
			<tr>
				<th class="title"><?php echo lang('table_title'); ?></th>
				<th class="name"><?php echo lang('table_name'); ?></th>
				<th class="lang"><?php echo lang('table_lang'); ?></th>
				<th class="hidden">UNIX</th>
				<th class="time"><?php echo lang('table_time'); ?></th>
			</tr>
		</thead>
		<tbody>
	<?php foreach($replies as $reply){
			if(checkNum($n)){
				$eo = "even";
			} else {
				$eo = "odd";
			}
			$n++;
	?>

		<tr class="<?php echo $eo; ?>">
			<td class="first"><a href="<?php echo site_url("view/".$reply['pid']); ?>"><?php echo $reply['title']; ?></a></td>
			<td><?php echo $reply['name']; ?></td>
			<td><?php echo $reply['lang']; ?></td>
			<td class="hidden"><?php echo $reply['created']; ?></td>
			<td><?php $p = explode(",", timespan($reply['created'], time()));
			echo sprintf($this->lang->line('paste_ago'),$p[0]); ?>.</td>
		</tr>

	<?php }?>
	</tbody>
	</table>
</div>

<?php echo $pages;
}

	$reply_form['page']['title'] = lang('paste_replyto') . ' "' . $title . '"';
	$reply_form['page']['instructions'] = lang('paste_replyto_desc');
	$this->load->view('defaults/paste_form', $reply_form); ?>

<?php $this->load->view('view/view_footer'); ?>
