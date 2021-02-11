<!-- Right widgets -->
<div class="sidebar-left col xl3 l3 m4 s12">
    <div class="sticky-sidebar">
        <div class="opt row">
            <div class="input-field col l12">
                <div class="switch optimization-switch-wrapper">
                    <label class="optimize-switch">
                        See Images <input type="checkbox" id="checkbox"><span class="lever"></span> Optimize
                        <p>Activating the optimize button removes images from your view and increasing the site speed by 40%, leaving you with the contents unchanged and reduce the rate at which data is consumed. This does not restrict you from accessing other features on this website. <a href=""><i>Learn more</i></a></p>
                    </label>
                </div>
            </div>
        </div>
        @if($sponsored->count() > 0)
        @foreach($sponsored as $advert)
        <p class="grey-text margin-0 mb-0">{{$advert->ads_type}}</p>
        <div class="card bdr nosh mt-0">
            <div class="card-image">
                <a href="{{$advert->link}}" target="_blank"><img src="{{asset($advert->image)}}" alt="Banner Ads"></a>
            </div>
        </div>
        @endforeach
        @else
        <div class="card bdr nosh mt-0">
            <div class="card-image">
                <a href="#" target="_blank"><img src="" alt="Buy ads space"></a>
            </div>
        </div>
        @endif
    </div>
</div>
