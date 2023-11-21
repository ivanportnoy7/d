window.addEventListener('load', function () {
    var editor;
    editor = ContentTools.EditorApp.get();
    editor.init('*[data-editable]', 'data-name');

    editor.addEventListener('saved', function (ev) {
        var name, payload, regions, xhr;
        regions = ev.detail().regions;
        if (Object.keys(regions).length == 0) {
            return;
        }
        this.busy(true);
        payload = new FormData();
        for (name in regions) {
            if (regions.hasOwnProperty(name)) {
                payload.append(name, regions[name]);
            }
        }
        function onStateChange(ev) {
            if (ev.target.readyState == 4) {
                editor.busy(false);
                if (ev.target.status == '200') {
                    new ContentTools.FlashUI('ok');
                } else {
                    new ContentTools.FlashUI('no');
                }
            }
        }

        xhr = new XMLHttpRequest();
        xhr.addEventListener('readystatechange', onStateChange);
        xhr.open('POST', 'save/');
        xhr.send(payload);
    });


    function imageUploader(dialog) {
        var image, xhr, xhrComplete, xhrProgress;

        dialog.addEventListener('imageuploader.cancelupload', function () {
            if (xhr) {
                xhr.upload.removeEventListener('progress', xhrProgress);
                xhr.removeEventListener('readystatechange', xhrComplete);
                xhr.abort();
            }
            dialog.state('empty');
        });

        dialog.addEventListener('imageuploader.clear', function () {
            dialog.clear();
            image = null;
        });

        dialog.addEventListener('imageuploader.fileready', function (ev) {
            var formData;
            var file = ev.detail().file;

            xhrProgress = function (ev) {
                dialog.progress((ev.loaded / ev.total) * 100);
            }

            xhrComplete = function (ev) {
                var response;

                if (ev.target.readyState != 4) {
                    return;
                }

                xhr = null
                xhrProgress = null
                xhrComplete = null

                if (parseInt(ev.target.status) == 200) {
                    response = JSON.parse(ev.target.responseText);

                    image = {
                        size: response.size,
                        url: response.url
                    };

                    dialog.populate(image.url, image.size);

                } else {
                    new ContentTools.FlashUI('no');
                }
            }

            dialog.state('uploading');
            dialog.progress(0);

            formData = new FormData();
            formData.append('image', file);

            xhr = new XMLHttpRequest();
            xhr.upload.addEventListener('progress', xhrProgress);
            xhr.addEventListener('readystatechange', xhrComplete);
            xhr.open('POST', 'save/image_upload.php', true);
            xhr.send(formData);
        });

        dialog.addEventListener('imageuploader.save', function () {
            var crop, cropRegion, formData;

            xhrComplete = function (ev) {
                if (ev.target.readyState !== 4) {
                    return;
                }

                xhr = null;
                xhrComplete = null;

                dialog.busy(false);

                if (parseInt(ev.target.status) === 200) {
                    var response = JSON.parse(ev.target.responseText);

                    dialog.save(
                            response.url,
                            response.size,
                            {
                                'alt': response.alt,
                                'data-ce-max-width': response.size[0]
                            });

                } else {
                    new ContentTools.FlashUI('no');
                }
            }

            dialog.busy(true);

            formData = new FormData();
            formData.append('url', image.url);

            formData.append('width', 600);

            if (dialog.cropRegion()) {
                formData.append('crop', dialog.cropRegion());
            }

            xhr = new XMLHttpRequest();
            xhr.addEventListener('readystatechange', xhrComplete);
            xhr.open('POST', 'save/image_save.php', true);
            xhr.send(formData);
        });
    }
    
    ContentTools.IMAGE_UPLOADER = imageUploader;
});