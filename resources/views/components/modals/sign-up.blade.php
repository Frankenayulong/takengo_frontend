<div ng-controller="signUpController" class="modal fade c-content-login-form" id="signup-form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content c-square">
            <div class="full-spinner-container" ng-show="metadata.loading.sign_up">
                <div class="full-spinner-overlay"></div>
                <div class="full-spinner-inner-container">
                    @component('components.shared.spinner')
                    @endcomponent
                </div>
            </div>
            <div class="modal-header c-no-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h3 class="c-font-24 c-font-sbold">Create An Account</h3>
                <p>Please fill in below form to create an account with us</p>
                <form>
                    <div class="form-group" ng-class="signup_error.email ? 'has-error' : ''">
                        <label for="signup-email" class="hide">Email</label>
                        <input ng-model="signup_information.email" type="email" class="form-control input-lg c-square" id="signup-email" placeholder="Email">
                        <span ng-if="signup_error.email" class="help-block">
                            <strong ng-repeat="item in signup_error.message.email | limitTo:1">@{{item}}</strong>
                        </span>
                    </div>
                    <div class="form-group" ng-class="signup_error.password ? 'has-error' : ''">
                        <label for="signup-password" class="hide">Password</label>
                        <input ng-model="signup_information.password" type="password" class="form-control input-lg c-square" id="signup-password" placeholder="Password">
                        <span ng-if="signup_error.password" class="help-block">
                            <strong ng-repeat="item in signup_error.message.password | limitTo:1">@{{item}}</strong>
                        </span>
                    </div>
                    <div class="form-group" ng-class="signup_error.password_confirmation ? 'has-error' : ''">
                        <label for="signup-password-confirmation" class="hide">Password Confirmation</label>
                        <input ng-model="signup_information.password_confirmation" type="password" class="form-control input-lg c-square" id="signup-password-confirmation" placeholder="Password Confirmation">
                        <span ng-if="signup_error.password_confirmation" class="help-block">
                            <strong ng-repeat="item in signup_error.message.password_confirmation | limitTo:1">@{{item}}</strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <button ng-click="signup()" type="button" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">Signup</button>
                        <a href="javascript:;" class="c-btn-forgot" data-toggle="modal" data-target="#login-form" data-dismiss="modal">Back To Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>