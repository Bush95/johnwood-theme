export function getElementEvents(element) {
    element = element.jquery ? element : jQuery(element);

    var events = element[0].events || jQuery.data(element[0], "events") || jQuery._data(element[0], "events");

    return events;
}