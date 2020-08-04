const checkImage = path => {
    return new Promise(resolve => {
        const img = new Image();

        img.onload = () => resolve({path, status: 'ok'});
        img.onerror = () => resolve({path, status: 'error'});

        img.src = path;
    });
}

const doLoadImages = paths => Promise.all(paths.map(checkImage));

const loadImages = nodeArray => {
    var imagePaths = [];

    [].forEach.call(nodeArray, image => {
        imagePaths.push(image.src);
    });

    return doLoadImages(imagePaths)
}

export default loadImages;
