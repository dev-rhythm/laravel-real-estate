<div class="col-md-6 col-lg-4 property_wrap" data-pid="{{$property->id}}">
    <div class="property">
        <div class="p-img">
            @php
            $property_image= '/broker-landing-images/p-img.png';
            if(isset($property->propertyTheme->main_image) && $property->propertyTheme->main_image != ''){
            $property_image = "/uploads/back_image/".$property->id.'/'.$property->propertyTheme->main_image;
            }


            if( (isset($property->propertyTheme->main_image) && $property->propertyTheme->main_image == '') &&
            (isset($property->propertyPhoto) && $property->propertyPhoto != null)){
            $property_image_url = $property->propertyPhoto->pluck('images');
            if(isset($property_image_url[0]) && $property_image_url[0] != ''){
            $property_image = "/uploads/$property->id/". $property_image_url[0];
            }
            }
            @endphp
            <img src="{{$property_image}}" class="w-100">
        </div>
        <div class="p-details">
            <h4 class="p-title">{{$property->street}}</h4>
            <p class="p-location">{{$property->paddress}}</p>
            <ul class="p-amenities">
                <li class="">
                    <div class="amenity-icon">
                        <img src="/broker-landing-images/room-icon.png">
                    </div>
                    <div class="amenity-name">

                        {{isset($property->propertydetails->stories) ? $property->propertydetails->stories : '-'}}
                        Stories
                    </div>
                </li>
                <li class="">
                    <div class="amenity-icon">
                        <img src="/broker-landing-images/bedroom-icon.png">
                    </div>
                    <div class="amenity-name">
                        {{isset($property->propertydetails->bedrooms) ? $property->propertydetails->bedrooms : '-'}}
                        Bedroom
                    </div>
                </li>
                <li class="">
                    <div class="amenity-icon">
                        <img src="/broker-landing-images/parking-icon.png">
                    </div>
                    <div class="amenity-name">
                        {{isset($property->propertydetails->parking_space) ?$property->propertydetails->parking_space : '-'}}
                        Parking
                    </div>
                </li>
                <li class="">
                    <div class="amenity-icon">
                        <img src="/broker-landing-images/bathroom-icon.png">
                    </div>
                    <div class="amenity-name">
                        {{ isset($property->propertydetails->bathrooms) ? $property->propertydetails->bathrooms : '-'}}
                        Bathroom
                    </div>
                </li>
            </ul>
        </div>
        <div class="p-bottom">
            <div class="p-price">
                {{isset($property->propertydetails->currency) ? $property->propertydetails->currency : '$'}}{{isset($property->propertydetails->display_price) ? number_format($property->propertydetails->display_price, 2): '0.00'}}
            </div>
            <a href="{{route('property_details', $property->id)}}" class="btn btn-view-more">View More</a>
        </div>
    </div>
</div>
