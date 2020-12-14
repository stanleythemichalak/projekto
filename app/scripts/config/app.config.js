'use strict';

app.config(function ($routeProvider, $locationProvider, $httpProvider) {

    $locationProvider.hashPrefix('');

    $httpProvider.interceptors.push('LoadingInterceptor');
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
    });


    $routeProvider
        .when('/', {
            templateUrl: './app/views/home.html',
            controller: 'MainCtrl',
            controllerAs: 'vm'
        })
        .when('/uslugi/:id/:title?', {
            templateUrl: './app/views/page.html',
            controller: 'PageCtrl',
            controllerAs: 'vm'
        })
        .when('/obszary/:id/:title?', {
            templateUrl: './app/views/page.html',
            controller: 'PageCtrl',
            controllerAs: 'vm'
        })
        .when('/blog', {
            templateUrl: './app/views/blog.html',
            controller: 'BlogCtrl',
            controllerAs: 'vm'
        })
        .when('/blog/:category/:title?', {
            templateUrl: './app/views/page.html',
            controller: 'BlogCtrl',
            controllerAs: 'vm'
        })
        .when('/blog/post/:category/:id/:title?', {
            templateUrl: './app/views/page.html',
            controller: 'BlogPostCtrl',
            controllerAs: 'vm'
        })
        .when('/polityka_prywatnosci', {
            templateUrl: './app/views/pp.html',
            controller: 'PpCtrl',
            controllerAs: 'vm'
        })
        .when('/strefa_partnera', {
            templateUrl: './app/views/partnerZone/login.html',
            controller: 'LoginActionsCtrl',
            controllerAs: 'vm'
        })
        .when('/strefa_partnera/rejestracja', {
            templateUrl: './app/views/partnerZone/register.html',
            controller: 'LoginActionsCtrl',
            controllerAs: 'vm'
        })
        .otherwise({
            redirectTo: '/'
        });
});

app.run(function ($rootScope, $location, $anchorScroll, $timeout) {

    $rootScope.$on('$routeChangeSuccess', function (newRoute, oldRoute) {
        $rootScope.$on('$routeChangeSuccess', function (newRoute, oldRoute) {
            if ($location.hash()) $anchorScroll()
            else window.scrollTo(0, 0);
        });

    });

    //menu

    $('.mobile-toggle').click(function () {
        $('.nav-bar').toggleClass('nav-open');
        $(this).toggleClass('active');
    });

    $('.menu li').click(function (e) {
        if (!e) e = window.event;
        e.stopPropagation();
        if ($(this).find('ul').length) {
            $(this).toggleClass('toggle-sub');
        } else {
            $(this).parents('.toggle-sub').removeClass('toggle-sub');
        }
    });

    $('.menu li a').click(function () {
        if ($(this).hasClass('inner-link')) {
            $(this).closest('.nav-bar').removeClass('nav-open');
        }
        $('.nav-bar').removeClass('nav-open');
    });

    $('.module.widget-handle').click(function () {
        $(this).toggleClass('toggle-widget-handle');
    });

    $('.search-widget-handle .search-form input').click(function (e) {
        if (!e) e = window.event;
        e.stopPropagation();
    });

    // Offscreen Nav

    if ($('.offscreen-toggle').length) {
        $('body').addClass('has-offscreen-nav');
    } else {
        $('body').removeClass('has-offscreen-nav');
    }

    $('.offscreen-toggle').click(function () {
        $('.main-container').toggleClass('reveal-nav');
        $('nav').toggleClass('reveal-nav');
        $('.offscreen-container').toggleClass('reveal-nav');
    });

    $('.main-container').click(function () {
        if ($(this).hasClass('reveal-nav')) {
            $(this).removeClass('reveal-nav');
            $('.offscreen-container').removeClass('reveal-nav');
            $('nav').removeClass('reveal-nav');
        }
    });

    $('.offscreen-container a').click(function () {
        $('.offscreen-container').removeClass('reveal-nav');
        $('.main-container').removeClass('reveal-nav');
        $('nav').removeClass('reveal-nav');
    });



});