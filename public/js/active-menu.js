$(document).ready(function () {
    const menuContainer = $('.menu-container');
    const burger = $('.burger');
    const content = $('.content');
    const menuContent = $('.menu-content');
    const list = $('.menu-content > li');

    $(burger).click(function () {
        $(this).toggleClass('active');
        $(menuContainer).toggleClass('active');
        $(content).toggleClass('push');
        $(menuContent).toggleClass('show');
    });

    // $(list).hover(function () {
    //     let elt = $(this).find('span.arrow');
    //
    //     $(this).toggleClass('active');
    //     $(elt).toggleClass('hover');
    // });

    $(list).click(function () {
        let elt = $(this).next();
        let chevron = $(this).find('span.arrow');

        $(this).toggleClass('active');
        elt.toggleClass('active');
        chevron.toggleClass('hover');
    });
});