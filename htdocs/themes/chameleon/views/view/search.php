<form action="/lists" id="searchform" class="form-inline mr-md-2">
	<div class="input-group">
		<input type="search" name="search" placeholder="<?php echo lang('paste_search'); ?>" value="<?php echo str_replace('"', '&quot;', $this->input->get('search')); ?>" id="searchInput" class="form-control" autocomplete="off">
    <div class="input-group-append">
      <button class="btn btn-secondary" type="submit">
        <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"></path>
          <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"></path>
        </svg>
      </button>
    </div>
	</div>
</form>