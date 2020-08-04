function isMobile(html) {
    const windowWidth = window.innerWidth || document.documentElement.clientWidth || document.documentElement.clientWidth;
    return (windowWidth < 768);
}

export default isMobile;