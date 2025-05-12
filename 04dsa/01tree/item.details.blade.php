<div class="booking-items order-check">

    <div class="form-clt d-flex align-itmes-end gap-3 select-height-56">
        <div>
            <h6 class="text-nowrap wow fadeInUp" data-wow-delay=".3s">Select Delivery Station</h6>
            <select name="delivery_station" id="delivery_station" class="form-control">
                <option value="1">Buchs SG</option>
                <option value="2">Feldkirch Train Station</option>
                <option value="3">Bludenz Train Station</option>
                <option value="4">St. Anton Am Arlberg Train Station</option>
                <option value="5">Landeck-Zams Train Station</option>
                <option value="6">Oetztal Train Station</option>
                <option value="7">Innsbruck Central Train Station</option>
                <option value="8">Wörgl Hbf</option>
                <option value="9">Kufstein Train Station</option>
                <option value="10">Salzburg Hbf</option>
                <option value="11">Linz/Donau</option>
                <option value="12">St. Pölten</option>
                <option value="13">Vienna Meidling</option>
                <option value="14">Basel SBB</option>
                <option value="15">Basel, Bahnhof Sbb</option>
                <option value="16">Basel Badischer Bahnhof</option>
                <option value="18">Freiburg (Breisgau) ZOB</option>
                <option value="19">Freiburg (Breisgau) Hbf</option>
                <option value="20">Offenburg</option>
                <option value="22">Karlsruhe Hbf</option>
                <option value="24">Hamburg Hbf</option>

            </select>
        </div>
        <div id="vendor_list" class="w-full" style="display: flex;">
            <div>
                <h6 class="text-nowrap wow fadeInUp" data-wow-delay=".3s">Select Vendor</h6>
                <select class="form-control">
                    <option value="">Select Vendor</option>
                    <option value="2">Admin Admin</option>
                    <option value="3">test three</option>
                    <option value="14">sdfsdf rwr</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-clt">
        <a href="https://train.pizza/pizza" class="theme-btn">
            Order Now
        </a>
    </div>
</div>

root
91.108.113.150
Pizz@TRorIN25DAi

class="button-text text-nowrap"
//============================oldcode
<div class="booking-items order-check">

    <div class="form-clt d-flex align-itmes-center gap-3 select-height-56">
        <select name="delivery_station" id="delivery_station" class="form-control">
            <option value="1">Buchs SG</option>
            <option value="2">Feldkirch Train Station</option>
            <option value="3">Bludenz Train Station</option>
            <option value="4">St. Anton Am Arlberg Train Station</option>
            <option value="5">Landeck-Zams Train Station</option>
            <option value="6">Oetztal Train Station</option>
            <option value="7">Innsbruck Central Train Station</option>
            <option value="8">Wörgl Hbf</option>
            <option value="9">Kufstein Train Station</option>
            <option value="10">Salzburg Hbf</option>
            <option value="11">Linz/Donau</option>
            <option value="12">St. Pölten</option>
            <option value="13">Vienna Meidling</option>
            <option value="14">Basel SBB</option>
            <option value="15">Basel, Bahnhof Sbb</option>
            <option value="16">Basel Badischer Bahnhof</option>
            <option value="18">Freiburg (Breisgau) ZOB</option>
            <option value="19">Freiburg (Breisgau) Hbf</option>
            <option value="20">Offenburg</option>
            <option value="22">Karlsruhe Hbf</option>
            <option value="24">Hamburg Hbf</option>

        </select>
        <div id="vendor_list" class="w-full" style="display: flex;">
            <select class="form-control">
                <option value="">Select Vendor</option>
                <option value="2">Admin Admin</option>
                <option value="3">test three</option>
                <option value="14">sdfsdf rwr</option>
            </select>
        </div>
    </div>
    <div class="form-clt">
        <a href="https://train.pizza/pizza" class="theme-btn">
            Order Now
        </a>
    </div>
</div>


.product-details-wrapper .product-image-items .nav .nav-link img.image-tab {
    width: 180px;
}



<section class="brand-shape section-padding section-bg check_pnr">
    <div class="container">
        <div class="brand-wrapper">
            <div class="section-title text-center">
             @php
                 $sta_lists = App\Helpers\Helper::get_deliver_station();
                 $selectedStation = session('delivery_station');
            @endphp
            
                <span class="wow fadeInUp">Order Food Delivery in Train</span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">Select Station</h2>
            </div>

            <div class="booking-items order-check">
                <!-- <div class="form-clt">
                    <select class="form-control">
                        <option value="">Select Delivery Station</option>
                    </select>
                    <h6 class="wow fadeInUp" data-wow-delay=".3s">Select Delivery Station</h6>
                </div> -->
                <div class="form-clt d-flex align-itmes-end gap-3 select-height-56">
                    <div>
                        <h6 class="text-nowrap wow fadeInUp" data-wow-delay=".3s">Select Delivery Station</h6>                    
                        <select name="delivery_station" id="delivery_station" class="form-control">
                            @if(count($sta_lists) > 0)
                                @foreach($sta_lists as $list_state)
                                <option value="{{$list_state->id}}" {{ $selectedStation == $list_state->id ? 'selected' : '' }}>{{$list_state->station_name}}</option>
                                @endforeach
                            @endif
                        
                        </select>
                    </div>
                </div>


                    <div id="vendor_list" class="w-full" style="display: none;">
                    <div>
                    <!-- <h6 class="text-nowrap wow fadeInUp" data-wow-delay=".3s">Select Delivery Station</h6>   -->
                        <select class="form-control" >

                        </select>
                    </div>
                    <!-- </div> -->
                </div>
                <div class="form-clt">
                    <a href="{{ route('front.item') }}" class="theme-btn">
                        Order Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>