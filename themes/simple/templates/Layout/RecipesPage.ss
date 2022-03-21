<div class="container">
    <div class="row">
        <% loop $RecipeObjects %>
            <div class="col-sm-3">
                <a href="$Link"><img class="all-recipes-img" src="$ImageSource.URL"></a>
            <h3 class="all-recipes-heading">
                <a href="$Link"><b>$Title</b></a>
            </h3>
        </div>
    <% end_loop %>
    </div>
</div>
