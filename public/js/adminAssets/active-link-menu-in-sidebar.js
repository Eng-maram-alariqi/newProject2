let link = $("#active-link");
let parent_ul = link.closest("ul");
let main_menu = parent_ul.closest("li");
let firstLinkAtMainMenu = main_menu.find(".dropdown-toggle");


link.toggleClass("active"); // li active
parent_ul.toggleClass("show"); // ul dropdown
main_menu.toggleClass("active");


// Make ( a )  collapsed
if (main_menu.hasClass('active')) {
    firstLinkAtMainMenu.attr('aria-expanded', true);
} else {
    firstLinkAtMainMenu.attr('aria-expanded', false);
}


let editLink = $('#edit-link');

let first_ul = editLink.find('ul.submenu');

let dropdown_toggle = editLink.find('.dropdown-toggle');

editLink.toggleClass("active");

first_ul.toggleClass("show"); // submenu

dropdown_toggle.attr('aria-expanded', true);
