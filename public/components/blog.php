<div class='row-w m-between'>
    <div class='well col-xs-8' style='margin-left:15px;'>
        <div class='flex-container' data-bind='with: selectedContent'>
            <div class='header'>
                <h1 data-bind='text: title'></h1>
            </div>

            <div class='body' data-bind='text: content'></div>
        </div>
    </div>
    <div class='well col-xs-3 menu-small' style='margin-right:15px; max-height:80vh; overflow-y:auto; padding-left:0px; padding-right:0px'>
        <div style='text-align:center; width:100%'>Blogs</div>

        <ul data-bind='foreach: entries'>
            <li class='active' data-bind='text: $data.title, click:$root.clickedEntry, attr: { id:"entry_" + $data.url, href:$data.url }' style='padding-left:0px; text-align:left'></li>
        </ul>
    </div>
</div>
