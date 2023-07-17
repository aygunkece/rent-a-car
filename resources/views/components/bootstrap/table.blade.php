@isset($isResponsive)
<div class="table-responsive {{ $responsiveClass ?? "" }}">
@endisset
    <table class="table {{ $tableClass ?? "table-hover table-striped" }}">
        @isset($columns)
        <thead>
            <tr>
                {!! $columns !!}
            </tr>
        </thead>
        @endisset
        <tbody>
             {!! $rows !!}
        </tbody>
    </table>
@isset($isResponsive)
</div>
@endisset
