<div class="wheel-start-form wheel-start-form2 clearfix">
    <form action="{{ route('map') }}" method="POST" autocomplete="off" id="distanceForm">
        @csrf
        <label for="to">
            <span>Nereye</span>
            <input type="text" name="to" id="to" placeholder="Adres girin" required>
        </label>

        <label for="from">
            <span>Nereden</span>
            <input type="text" name="from" id="from" placeholder="Adres girin" required>
        </label>

        <div class="wheel-date">
            <span>Tarih</span>
            <label class="fa fa-calendar" for="date">
                <input  class="datetimepicker" name="date" type="text" id="date" value="29Apr">
            </label>
        </div>

        <div class="wheel-date">
            <span>Zaman</span>
            <label for="time" class="fa fa-clock-o">
                <input class="timepicker" type="text" name="time" id="time" value="18:00">
            </label>
        </div>

        <label for="input-val27" class="promo promo2">
            <a href="javascript:void(0)" onclick="calculate()" class="btn wheel-btn">Search</a>
        </label>

        <div hidden id="map"></div>
    </form>
</div>

