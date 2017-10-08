{if isset($_template) && !empty($_template)}
    {include file=$_template assign="templateContent"}
{else}
    {include file="index/default.tpl" assign="templateContent"}
{/if}
{include file="index/header.tpl"}

<!-- #wrapper -->
<div id="wrapper">
    {include file="index/navbar.tpl"}
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="infoModalLabel"></h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <div id="page-wrapper">
        {$templateContent}
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<footer class="sds-footer"><small>{$_profiler::getStackAsString()}</small></footer>
{include file="index/footer.tpl"}