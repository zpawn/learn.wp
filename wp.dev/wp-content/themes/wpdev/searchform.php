<form class="searchform" role="search" method="get" id="searchform" action="<?= home_url('/'); ?>">
    <div class="input-group">
        <input class="input-sm form-control" id="search" type="text" placeholder="Search" name="s" value="<?php the_search_query(); ?>">
        <span class="input-group-btn">
            <button class="btn btn-sm btn-primary rippler rippler-default btn-flat with-border" type="button">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </span>
    </div>
</form>
