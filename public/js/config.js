/**
 * INSPINIA - Responsive Admin Theme
 * Copyright 2014 Webapplayers.com
 *
 * Inspinia theme use AngularUI Router to manage routing and views
 * Each view are defined as state.
 * Initial there are written stat for all view in theme.
 *
 */
function config($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.otherwise("/dashboard");
    $stateProvider
        .state('dashboard', {
            url: "/dashboard",
            templateUrl: "/dashboard",
            data: { pageTitle: 'Example view' }
        })
}
angular
    .module('inspinia', ['ngRoute'])
    .config(config)
    .run(function($rootScope, $state) {
        $rootScope.$state = $state;
    });