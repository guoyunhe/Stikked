<!DOCTYPE html>
<?php
$page_title = '';
if(isset($title))
{
    $page_title .= $title . ' - ';
}
$page_title .= $this->config->item('site_name');
?>
<html lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php echo $page_title; ?></title>
		<!-- favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="https://static.opensuse.org/favicon.ico" />
		<link rel="icon" href="https://static.opensuse.org/favicon-32.png" sizes="32x32">
		<link rel="icon" href="https://static.opensuse.org/favicon-48.png" sizes="48x48">
		<link rel="icon" href="https://static.opensuse.org/favicon-64.png" sizes="64x64">
		<link rel="icon" href="https://static.opensuse.org/favicon-96.png" sizes="96x96">
		<link rel="icon" href="https://static.opensuse.org/favicon-144.png" sizes="144x144">
		<link rel="icon" href="https://static.opensuse.org/favicon-192.png" sizes="192x192">

		<!-- apple-touch-icon -->
		<link rel="apple-touch-icon" href="https://static.opensuse.org/favicon-144.png" sizes="144x144">
		<link rel="apple-touch-icon" href="https://static.opensuse.org/favicon-192.png" sizes="192x192">
		<link rel="mask-icon" href="https://static.opensuse.org/mask-icon.svg" color="#73ba25" />
		<link rel="stylesheet" href="https://static.opensuse.org/chameleon-3.0/dist/css/chameleon.css" />
<?php

$searchparams = ($this->input->get('search') ? '?search=' . $this->input->get('search') : '');

?>
		<script type="text/javascript">
		//<![CDATA[
		var base_url = '<?php echo base_url(); ?>';
		//]]>
		</script>
	</head>
	<body>		
		<nav class="navbar navbar-expand-md noprint">

			<a class="navbar-brand" href="/">
				<img src="https://static.opensuse.org/favicon.svg" class="d-inline-block align-top" alt="openSUSE" title="openSUSE" width="30" height="30">
				Paste
			</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse">
				<svg width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
				</svg>
			</button>

			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav mr-auto flex-md-shrink-0">
					<?php $l = $this->uri->segment(1)?>
					<li class="nav-item">
						<a
							class="nav-link<?php if($l == ""){ echo ' active'; }?>"
							href="<?php echo base_url(); ?>"
							title="<?php echo lang('menu_create_title'); ?>">
							<?php echo lang('menu_create'); ?>
						</a>
					</li>
					<?php if(!$this->config->item('private_only')){ ?>
					<li class="nav-item">
						<a
							class="nav-link<?php if($l == "lists" || $l == "view" and $this->uri->segment(2) != "options"){ echo ' active'; }?>"
							href="<?php echo site_url('lists') . $searchparams; ?>"
							title="<?php echo lang('menu_recent_title'); ?>">
							<?php echo lang('menu_recent'); ?>
						</a>
					</li>
					<li class="nav-item">
						<a
							class="nav-link<?php if($l == "trends"){ echo ' active'; }?>"
							href="<?php echo site_url('trends') . $searchparams; ?>"
							title="<?php echo lang('menu_trending_title'); ?>">
							<?php echo lang('menu_trending'); ?>
						</a>
					</li>
					<?php } ?>
					<?php if(! $this->config->item('disable_api')){ ?>
					<li class="nav-item">
						<a
							class="nav-link<?php if($l == "api"){ echo ' active'; }?>"
							href="<?php echo site_url('api'); ?>"
							title="<?php echo lang('menu_api'); ?>">
							<?php echo lang('menu_api'); ?>
						</a>
					</li>
					<?php } ?>
					<li class="nav-item">
						<a
							class="nav-link<?php if($l == "about"){ echo ' active'; }?>"
							href="<?php echo site_url('about'); ?>"
							title="<?php echo lang('menu_about'); ?>">
							<?php echo lang('menu_about'); ?>
						</a>
					</li>
				</ul>
				<?php $this->load->view('view/search');?>
				<button class="navbar-toggler megamenu-toggler" type="button" data-toggle="collapse" data-target="#megamenu" aria-expanded="true">
					<svg class="bi bi-grid" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"></path>
					</svg>
				</button>
			</div>
		</nav>

		<div class="flex-fill">
			<?php if(isset($status_message)){?>
			<div class="container">
				<div class="alert alert-success">
					<?php echo $status_message; ?>
				</div>
			</div>
			<?php }?>
