<div class="col-1-3">
    <div class="top-search">
        <form id="form-container" role="search" method="get" action="<?php echo home_url( '/' ) ?>">
            <a class="search-submit-button" href="javascript:$('#form-container').submit()">
                <i class="fa fa-search"></i>
            </a>
            <div id="searchtext">
                <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Search"/>
            </div>
        </form>
    </div>
</div>