<div class="modal fade" ng-controller="extendModalController" id="extendModal" tabindex="-1" role="dialog" aria-labelledby="extendModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content c-square">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="extendModalLabel">Extend Rent</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="end-time" class="control-label">End Time</label>
                        <input type="text" class="form-control c-square" id="end-time">
                    </div>
                </form>
                <div ng-show="extend_error">
                    <p class="c-font-red">Whoops! Please try again!</p>
                </div>
            </div>
            <div class="c-center" ng-show="extend_loading">
            @component('components.shared.spinner')
            small
            @endcomponent
            </div>
            <div class="modal-footer" ng-show="!extend_loading">
                <button type="button" ng-click="submitExtension()" class="btn c-theme-btn c-btn-square c-btn-bold c-btn-uppercase">Submit</button>
                <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>