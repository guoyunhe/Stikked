<?php echo validation_errors(); ?>

<div class="container-fluid">
	<?php if(!isset($page['title'])){ ?>
		<h1 class="mt-3">
			<?= lang('paste_create_new'); ?>
		</h1>
	<?php } else { ?>
		<h2 class="mt-3">
			<?= $page['title']; ?>
		</h2>
	<?php } ?>

	<form action="<?php echo base_url(); ?>" method="post" class="form-vertical well">
		<div class="row">
			<div class="col-sm-4">
				<label for="name"><?php echo lang('paste_author'); ?></label>
				<input id="name" class="form-control mb-3" type="text" name="name" value="<?= $name_set ?>" maxlength="32" >
			</div>
			<div class="col-sm-4">
				<label for="title"><?php echo lang('paste_title'); ?></label>
				<input id="title" class="form-control mb-3" type="text" name="title" value="<?= $title_set ?>" maxlength="50" />
			</div>
			<div class="col-sm-4">
				<label for="lang"><?php echo lang('paste_lang'); ?></label>
				<?php $lang_extra = 'id="lang" class="custom-select mb-3"'; echo form_dropdown('lang', $languages, $lang_set, $lang_extra); ?>
			</div>
		</div>

		<label for="code"><?php echo lang('paste_yourpaste'); ?></label>

		<textarea id="code" class="form-control mb-3" name="code" rows="20"><?php if(isset($paste_set)){ echo $paste_set; }?></textarea>

		<div class="row">
			<div class="col-sm-3">
				<div class="custom-control custom-checkbox mb-3">
					<?php
						$set = array('name' => 'snipurl', 'id' => 'snipurl', 'class' => 'custom-control-input', 'value' => '1', 'checked' => $snipurl_set);
						if ($this->config->item('disable_shorturl')){
							$set['checked'] = 0;
							$set['disabled'] = 'disabled';
						}
						echo form_checkbox($set);
					?>
					<label class="custom-control-label" for="snipurl" title="<?= lang('paste_shorturl_desc') ?>">
						<?= lang('paste_create_shorturl') ?>
					</label>
				</div>

				<div class="custom-control custom-checkbox mb-3">
					
						<?php
						$set = array('name' => 'private', 'id' => 'private', 'class' => 'custom-control-input', 'value' => '1', 'checked' => $private_set);
								if ($this->config->item('private_only')){
									$set['checked'] = 1;
									$set['disabled'] = 'disabled';
									}
						echo form_checkbox($set);
					?>
					<label class="custom-control-label" for="private" title="<?= lang('paste_private_desc') ?>">
						<?= lang('paste_private') ?>
					</label>
				</div>
			</div>
			<div class="col-sm-4">
				<label for="expire" title="<?php echo lang('paste_delete_desc'); ?>">
					<?php echo lang('paste_delete'); ?>
				</label>
				<?php 
					$expire_extra = 'id="expire" class="custom-select mb-3"';
					$options = array(
								"burn" => lang('exp_burn'),
								"5" => lang('exp_5min'),
								"60" => lang('exp_1h'),
								"1440" => lang('exp_1d'),
								"10080" => lang('exp_1w'),
								"40320" => lang('exp_1m'),
								"483840" => lang('exp_1y'),
							);
					if(! config_item('disable_keep_forever')) {
						$options['0'] = lang('exp_forever');
					}
					echo form_dropdown('expire', $options, $expire_set, $expire_extra);
				?>
			</div>
			<div class="col-sm-5">
				<?php if($this->config->item('enable_captcha') && $this->session->userdata('is_human') === null){ ?>
				<label for="captcha" title="<?= lang('paste_spam_desc'); ?>">
					<?php echo lang('paste_spam'); ?>
				</label>
				<?php if($use_recaptcha){
					echo recaptcha_get_html($recaptcha_publickey);
				} else { ?>
				<div class="form-inline mb-3">
					<img class="captcha mr-2" src="<?php echo site_url('view/captcha'); ?>?<?php echo date('U', time()); ?>" alt="captcha" width="180" height="40" />
					<input id="captcha" class="form-control" value="" type="text" name="captcha" maxlength="32" />
				</div>
				<?php } ?>
				<?php } ?>
			</div>
		</div>
	<?php if($reply){ ?>
		<input type="hidden" value="<?php echo $reply; ?>" name="reply" />
	<?php } ?>
		<div class="form-actions mb-3">
			<button type="submit" name="submit" value="submit" class="btn btn-large btn-primary">
				<svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
					<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
				</svg>
				<?php echo lang('paste_create'); ?>
			</button>
			<?php
			if ($this->config->item('csrf_protection') === TRUE)
			{
				if(isset($_COOKIE[$this->config->item('csrf_cookie_name')])) {
					echo '<input type="hidden" name="'.$this->config->item('csrf_token_name').'" value="'.html_escape($_COOKIE[$this->config->item('csrf_cookie_name')]).'" style="display:none;" />'."\n";
				}
			}
			?>
		</div>
	</form>
</div>
