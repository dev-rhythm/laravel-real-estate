<div class="sidebar sidebar-secondary sidebar-default">
    <div class="sidebar-content">
        <!-- Sidebar search -->
        <div class="sidebar-category">

            <div class="category-content">
                <form action="#">
                    <div class="has-feedback has-feedback-left">
                        <input type="search" id="search-property" class="form-control" placeholder="Search">
                        <div class="form-control-feedback">
                            <i class="icon-search4 text-size-base text-muted"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sub navigation -->

        <div class="sidebar-category property_list">
            @foreach ($properties as $property)

            @php
            $c= \DB::table("countries")->where("id",$property->country)->first();
            $s= \DB::table("states")->where("id",$property->state)->first();
            $ct= \DB::table("cities")->where("id",$property->city)->first();
            @endphp
            <div class="property_list_item">
                <a href="#" class="property_link">
                    <input type="hidden" id="pro_id" name="property_id" value="{{$property->id or ""}}">
                    <div class="category-title">
                        <div class="views-field views-field-field-property-address-thoroughfare">
                            <div class="field-content">{{$property->propertydetails->name or ""}}</div>
                        </div>
                        <div class="views-field views-field-field-property-address-locality">
                            <div class="field-content">{{$property->street }}</div>
                            <div class="field-content">{{$ct->name or ""}} , {{$s->name}}</div>
                        </div>
                        <div class="views-field views-field-status status-Not-published"> <span
                                class="field-content">{{$property->published==1 ? "Published" : "Not Published" }}</span>
                        </div> <span class="active-icon icon-chevron-right"></span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <!-- /sub navigation -->

    </div>
</div>
