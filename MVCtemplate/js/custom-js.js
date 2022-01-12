function slideIn() {
    document.getElementById("slider").classList.toggle("show");
    document.getElementById("slider").classList.remove("hide");
    if (document.getElementById("slider").classList.contains("marginOut")) {
        document.getElementById("slider").classList.toggle("marginOut");
    }
}

function slideOut() {
    document.getElementById("slider").classList.toggle("marginOut");
    document.getElementById("slider").classList.remove("show");
}

function showFilters() {
    document.getElementById("filters").classList.toggle("show-filters");
    document.getElementById("filters").classList.remove("hide-filters");
}

function hideFilters() {
    document.getElementById("filters").classList.toggle("hide-filters");
    document.getElementById("filters").classList.remove("show-filters");
}
function showReleaseDate() {
    if (document.getElementById("release-date").classList.contains("hide-slide")) {
        document.getElementById("release-date").classList.toggle("slide-down");
        document.getElementById("release-date").classList.remove("hide-slide");
    }
    else {
        document.getElementById("release-date").classList.toggle("hide-slide");
        document.getElementById("release-date").classList.remove("slide-down");
    }
}

function showEnglish() {
    if (document.getElementById("english").classList.contains("hide-slide")) {
        document.getElementById("english").classList.toggle("slide-down");
        document.getElementById("english").classList.remove("hide-slide");
    }
    else {
        document.getElementById("english").classList.toggle("hide-slide");
        document.getElementById("english").classList.remove("slide-down");
    }
}

function showDeveloper() {
    if (document.getElementById("developer").classList.contains("hide-slide")) {
        document.getElementById("developer").classList.toggle("slide-down");
        document.getElementById("developer").classList.remove("hide-slide");
    }
    else {
        document.getElementById("developer").classList.toggle("hide-slide");
        document.getElementById("developer").classList.remove("slide-down");
    }
}

function showPublisher() {
    if (document.getElementById("publisher").classList.contains("hide-slide")) {
        document.getElementById("publisher").classList.toggle("slide-down");
        document.getElementById("publisher").classList.remove("hide-slide");
    }
    else {
        document.getElementById("publisher").classList.toggle("hide-slide");
        document.getElementById("publisher").classList.remove("slide-down");
    }
}

function showStatus() {
    if (document.getElementById("status").classList.contains("hide-slide")) {
        document.getElementById("status").classList.toggle("slide-down");
        document.getElementById("status").classList.remove("hide-slide");
    }
    else {
        document.getElementById("status").classList.toggle("hide-slide");
        document.getElementById("status").classList.remove("slide-down");
    }
}

function showRequiredAge() {
    if (document.getElementById("required-age").classList.contains("hide-slide")) {
        document.getElementById("required-age").classList.toggle("slide-down");
        document.getElementById("required-age").classList.remove("hide-slide");
    }
    else {
        document.getElementById("required-age").classList.toggle("hide-slide");
        document.getElementById("required-age").classList.remove("slide-down");
    }
}

function showCategories() {
    if (document.getElementById("categories").classList.contains("hide-slide")) {
        document.getElementById("categories").classList.toggle("slide-down");
        document.getElementById("categories").classList.remove("hide-slide");
    }
    else {
        document.getElementById("categories").classList.toggle("hide-slide");
        document.getElementById("categories").classList.remove("slide-down");
    }
}

function showGenres() {
    if (document.getElementById("genres").classList.contains("hide-slide")) {
        document.getElementById("genres").classList.toggle("slide-down");
        document.getElementById("genres").classList.remove("hide-slide");
    }
    else {
        document.getElementById("genres").classList.toggle("hide-slide");
        document.getElementById("genres").classList.remove("slide-down");
    }
}

function showTags() {
    if (document.getElementById("tags").classList.contains("hide-slide")) {
        document.getElementById("tags").classList.toggle("slide-down");
        document.getElementById("tags").classList.remove("hide-slide");
    }
    else {
        document.getElementById("tags").classList.toggle("hide-slide");
        document.getElementById("tags").classList.remove("slide-down");
    }
}

function showAchievements() {
    if (document.getElementById("achievements").classList.contains("hide-slide")) {
        document.getElementById("achievements").classList.toggle("slide-down");
        document.getElementById("achievements").classList.remove("hide-slide");
    }
    else {
        document.getElementById("achievements").classList.toggle("hide-slide");
        document.getElementById("achievements").classList.remove("slide-down");
    }
}

function showPositiveRatings() {
    if (document.getElementById("positive-ratings").classList.contains("hide-slide")) {
        document.getElementById("positive-ratings").classList.toggle("slide-down");
        document.getElementById("positive-ratings").classList.remove("hide-slide");
    }
    else {
        document.getElementById("positive-ratings").classList.toggle("hide-slide");
        document.getElementById("positive-ratings").classList.remove("slide-down");
    }
}

function showNegativeRatings() {
    if (document.getElementById("negative-ratings").classList.contains("hide-slide")) {
        document.getElementById("negative-ratings").classList.toggle("slide-down");
        document.getElementById("negative-ratings").classList.remove("hide-slide");
    }
    else {
        document.getElementById("negative-ratings").classList.toggle("hide-slide");
        document.getElementById("negative-ratings").classList.remove("slide-down");
    }
}

function showAveragePlaytime() {
    if (document.getElementById("average-playtime").classList.contains("hide-slide")) {
        document.getElementById("average-playtime").classList.toggle("slide-down");
        document.getElementById("average-playtime").classList.remove("hide-slide");
    }
    else {
        document.getElementById("average-playtime").classList.toggle("hide-slide");
        document.getElementById("average-playtime").classList.remove("slide-down");
    }
}

function showMedianPlaytime() {
    if (document.getElementById("median-playtime").classList.contains("hide-slide")) {
        document.getElementById("median-playtime").classList.toggle("slide-down");
        document.getElementById("median-playtime").classList.remove("hide-slide");
    }
    else {
        document.getElementById("median-playtime").classList.toggle("hide-slide");
        document.getElementById("median-playtime").classList.remove("slide-down");
    }
}

function showPhysical() {
    if (document.getElementById("physical").classList.contains("hide-slide")) {
        document.getElementById("physical").classList.toggle("slide-down");
        document.getElementById("physical").classList.remove("hide-slide");
    }
    else {
        document.getElementById("physical").classList.toggle("hide-slide");
        document.getElementById("physical").classList.remove("slide-down");
    }
}

function showUnitsAvailable() {
    if (document.getElementById("units-available").classList.contains("hide-slide")) {
        document.getElementById("units-available").classList.toggle("slide-down");
        document.getElementById("units-available").classList.remove("hide-slide");
    }
    else {
        document.getElementById("units-available").classList.toggle("hide-slide");
        document.getElementById("units-available").classList.remove("slide-down");
    }
}

function showUnitsSold() {
    if (document.getElementById("units-sold").classList.contains("hide-slide")) {
        document.getElementById("units-sold").classList.toggle("slide-down");
        document.getElementById("units-sold").classList.remove("hide-slide");
    }
    else {
        document.getElementById("units-sold").classList.toggle("hide-slide");
        document.getElementById("units-sold").classList.remove("slide-down");
    }
}

function showPrice() {
    if (document.getElementById("price").classList.contains("hide-slide")) {
        document.getElementById("price").classList.toggle("slide-down");
        document.getElementById("pricee").classList.remove("hide-slide");
    }
    else {
        document.getElementById("price").classList.toggle("hide-slide");
        document.getElementById("price").classList.remove("slide-down");
    }
}