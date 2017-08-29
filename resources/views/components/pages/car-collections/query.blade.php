<div class="row">
    <div class="col-sm-12 col-lg-4">
        <ul class="c-shop-filter-search-1 list-unstyled">
            <li>
                <label class="control-label c-font-uppercase c-font-bold">Car Types</label>
                <select ng-model="query.car_types" class="form-control c-square c-theme">
                    <option value="">All Car Types</option>
                    <option value="SEDAN">Sedan</option>
                    <option value="HATCHBACK">Hatchback</option>
                    <option value="SUV">SUV</option>
                    <option value="COACH">Coach</option>
                </select>
            </li>
        </ul>
    </div>
    <div class="col-sm-12 col-lg-4">
        <ul class="c-shop-filter-search-1 list-unstyled">
            <li>
                <label class="control-label c-font-uppercase c-font-bold">Price Range</label>
                <select ng-model="query.price_range" class="form-control c-square c-theme">
                    <option value="">All Price</option>
                    <option value="50">< AUD 50</option>
                    <option value="51+100">AUD 51 - 100</option>
                    <option value="101+300">AUD 101 - 300</option>
                    <option value="300">> AUD 300</option>
                </select>
            </li>
        </ul>
    </div>
    <div class="col-sm-12 col-lg-4">
        <ul class="c-shop-filter-search-1 list-unstyled">
            <li>
                <label class="control-label c-font-uppercase c-font-bold">Sort By</label>
                <select ng-model="query.sort" class="form-control c-square c-theme">
                    <option value="">Distance</option>
                    <option value="name+asc">Name (A - Z)</option>
                    <option value="name+desc">Name (Z - A)</option>
                    <option value="price+asc">Price (Low > High)</option>
                    <option value="price+desc">Price (High > Low)</option>
                </select>
            </li>
        </ul>
    </div>
    <div class="col sm-12 col-lg-4">
        <ul class="c-shop-filter-search-1 list-unstyled">
            <li>
                <label class="control-label c-font-uppercase c-font-bold">Radius (km)</label>
                <div style="width:100%" class="c-price-range-slider c-theme-1 input-group">
                    <input ng-model="query.radius" type="text" class="c-price-slider" value="" data-slider-min="1" data-slider-max="20" data-slider-step="1" data-slider-value="10">
                </div>
            </li>
        </ul>
        
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group" role="group">
            <button ng-click="retrieve()" type="button" class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold"><i class="fa fa-search"></i>Search</button>
            <button type="button" class="btn btn-lg btn-default c-btn-square c-btn-uppercase c-btn-bold">Clear</button>
        </div>
    </div>
</div>