<li class="{{ Request::is('admin/companies*') ? 'active' : '' }}">
    <a href="{!! route('admin.companies.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="$ICON_NAME$" data-size="18"
               data-loop="true"></i>
               Companies
    </a>
</li>

<li class="{{ Request::is('admin/hazardlists*') ? 'active' : '' }}">
    <a href="{!! route('admin.hazardlists.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="$ICON_NAME$" data-size="18"
               data-loop="true"></i>
               Hazardlists
    </a>
</li>

