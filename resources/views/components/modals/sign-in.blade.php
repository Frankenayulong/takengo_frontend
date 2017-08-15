<div ng-controller="signInController" class="modal fade c-content-login-form" id="login-form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content c-square">
            <div class="full-spinner-container" ng-show="metadata.loading.sign_in">
                <div class="full-spinner-overlay"></div>
                <div class="full-spinner-inner-container">
                    @component('components.shared.spinner')
                        big
                    @endcomponent
                </div>
            </div>
            <div class="modal-header c-no-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h3 class="c-font-24 c-font-sbold">Sign in to your account</h3>
                <p ng-if="!signin_error.error">Please provide your login credentials</p>
                <p ng-if="signin_error.error" class="c-font-red" style="margin:0" ng-repeat="item in signin_error.message.error | limitTo: 1">@{{item}}</p>
                <form ng-submit="signin()">
                    <div class="form-group" ng-class="signin_error.email ? 'has-error' : ''">
                        <label for="login-email" class="hide">Email</label>
                        <input name="email" ng-model="signin_information.email" type="email" class="form-control input-lg c-square" id="login-email" placeholder="Email">
                        <span ng-if="signin_error.email" class="help-block">
                            <strong ng-repeat="item in signin_error.message.email | limitTo:1">@{{item}}</strong>
                        </span>
                    </div>
                    <div class="form-group" ng-class="signin_error.password ? 'has-error' : ''">
                        <label for="login-password" class="hide">Password</label>
                        <input name="password" ng-model="signin_information.password" type="password" class="form-control input-lg c-square" id="login-password" placeholder="Password">
                        <span ng-if="signin_error.password" class="help-block">
                            <strong ng-repeat="item in signin_error.message.password | limitTo:1">@{{item}}</strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">Login</button>
                        <a href="javascript:;" data-toggle="modal" data-target="#forget-password-form" data-dismiss="modal" class="c-btn-forgot">Forgot Your Password ?</a>
                    </div>
                    <div class="clearfix">
                        <div class="c-content-divider c-divider-sm c-icon-bg c-bg-grey c-margin-b-20">
                            <span>or sign in with</span>
                        </div>
                        <ul class="c-content-list-adjusted">
                            <li>
                                <a ng-click="signin_vendor('facebook')" href="javascript:;" class="btn btn-block c-btn-square btn-social btn-facebook">
                                  <i class="fa fa-facebook"></i>
                                  Facebook
                                </a>
                            </li>
                            <li>
                                <a ng-click="signin_vendor('google')" class="btn btn-block c-btn-square btn-social btn-google">
                                  <i class="fa fa-google"></i>
                                  Google
                                </a>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
            <div class="modal-footer c-no-border">                
                <span class="c-text-account">Don't Have An Account Yet ?</span>
                <a href="javascript:;" data-toggle="modal" data-target="#signup-form" data-dismiss="modal" class="btn c-btn-dark-1 btn c-btn-uppercase c-btn-bold c-btn-slim c-btn-border-2x c-btn-square c-btn-signup">Signup!</a>
            </div>
        </div>
    </div>
</div>