<div id="navbar" class="navbar-collapse collapse navbar-right" aria-expanded="false" style="height: 1px;">
    <ul class="nav navbar-nav">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>
                {assign var="_user" value=$_acl->getCurrentUser()}
                {$_user->getFirstName()} <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                {if !$_user->isGuest()}
                    <li>
                        <a href="{$_application->getUrl('/authex/user/profile')}"><i class="fa fa-user fa-fw"></i> Профиль</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{$_application->getUrl('/authex/user/logout', ['redirectUrl' => {$_application->getUrl($_route->getName())|base64_encode}])}"><i class="fa fa-sign-out fa-fw"></i> Выйти</a>
                    </li>
                {else}
                    <li><a href="{$_application->getUrl('/authex/user/login')}"><i class="fa fa-sign-in fa-fw"></i> Войти</a>
                    </li>
                {/if}
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
</div>