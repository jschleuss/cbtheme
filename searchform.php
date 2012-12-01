<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
        <input type="text" value="Search collection..." name="s" class="search_text" onclick="this.value=''; this.style.color = '#555555';" onfocus="this.select()" onblur="this.value=!this.value?'Search collection...':this.value;this.style.color = '#cccccc';" />
        <input type="submit" class="search_submit" value="Search" />
    </div>
</form>