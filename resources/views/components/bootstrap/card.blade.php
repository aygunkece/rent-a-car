<div class="card {{ $cardClass ?? "" }}">
    @isset($image)
        <img src="{{ imageExist($image,"") }}" class="{{ $imageClass ?? "card-img-top" }}">
    @endisset
    @isset($title)
        <div class="card-header {{ $headerClass ?? "" }}">
            <h6 class="card-title {{ $titleClass ?? "" }}">
                {{ $title }}
            </h6>
        </div>
    @endisset
    <div class="card-body {{ $cardBodyClass ?? "" }}">
        @isset($cardText)
            <div class="card-text {{ $cardTextClass ?? "" }}">
                {{ $cardText }}
            </div>
        @endisset
        @isset($htmlContent)
            {!! $htmlContent !!}
        @endisset
    </div>
    @isset($list)
        <ul class="list-group list-group-flush {{ $ulListClass ?? "" }}">
            @foreach($list as $item)
                <li class="list-group-item {{ $liListClass }}">
                    {{ $item }}
                </li>
            @endforeach
        </ul>
    @endisset
</div>
