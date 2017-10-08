<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Default App</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- /.navbar-header -->

        {include file="index/navbar/topPanel.tpl"}
    </div>


    {if $_acl->getCurrentUser()->isRoot() || $_acl->getCurrentUser()->isAdmin()}
        {include file="index/navbar/sideBar.tpl"}
    {else}
        <style>
            #page-wrapper {
                margin-left: 0 !important;
            }
        </style>
    {/if}
</nav>