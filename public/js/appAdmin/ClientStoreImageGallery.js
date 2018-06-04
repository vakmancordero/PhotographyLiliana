var homePath = $('#homePath').val();
var idGallery = $('#galleryId').val();


var app = new Vue({
    el: '#app',
    data: {
        formats: ['image/png', 'image/jpeg', 'image/jpg'],
        uploading: false,
        files: [],
    },

    methods: {
        getFile: function() {

            var input = document.getElementById('files');
            var momentFiles = input.files;

            for (let i = 0; i < momentFiles.length; i++) {

                if (this.validateImageFile(momentFiles[i].type)) continue;

                this.getElementsFromFile(momentFiles[i], i);

            }

            input.value = null;

        },

        validateImageFile: function(type) {
            let validation = true;

            for (let i of this.formats) {
                if (i == type) {
                    validation = false;
                    break;
                }
            }
            return validation;
        },

        getElementsFromFile: function(file) {

            let jso = {
                formData: file,
                bits: null,
                status: 0,
                id: 0,
            };


            let reader = new FileReader();
            reader.onload = function(e) {
                jso.bits = e.target.result;
                app.pushFile(jso);
            };

            reader.readAsDataURL(file);


        },

        pushFile: function(x) {

            this.files.push(x);
            this.chekId();
            // setTimeout(this.setImagesPreview(), 50);
            this.nextFileToSend();
        },

        seeFiles: function() {
            console.log(this.files);
        },

        chekId: function() {

            for (let i = 0; i < this.files.length; i++) {
                this.files[i].id = 'imagePreview' + i;
            }

        },

        nextFileToSend: function() {
            for (let i = 0; i < this.files.length; i++) {

                if (this.files[i].status == 0) {
                    this.sendFile(i);
                    break;
                }

            }
        },



        sendFile: function(i) {

            if (this.uploading == true) return;

            this.uploading = true;

            this.files[i].status = 1;
            var formD = new FormData();
            formD.append('image', this.files[i].formData);


            const config = {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
                progress: function(progressEvent) {
                    var percent = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                    app.progress(percent);
                }
            }

            axios.post('upload', formD, config)

            .then(function(response) {

                app.uploading = false;
                app.successUpload(response, i);

            }).catch(function(error) {

                app.uploading = false;
                app.errorHandler(error, i);

            });
        },

        progress: function(e) {
            let element = document.getElementById('percent');
            element.style.width = e + "%";
        },

        successUpload: function(response, i) {

            response = response.data;

            this.files.splice(i, 1);

            let id = response.album_clients_id;

            let path = response.path.split(' ').join('%20');
            var url1 = homePath + "/images/aplication/clients/" + id + "/app/" + path;
            var url2 = homePath + "/images/aplication/clients/" + id + "/computer/" + path;

            $('<a/>')
                .append($('<div>')
                    .prop({ "style": "background-image: url(" + url1 + ");", 'id': 'photos' })
                    .append($('<i>')
                        .prop({ class: 'trash icon', id: 'trash' + response.id })
                        .attr('onclick', "deleteLB(" + response.id + ")")))
                .prop('href', url2)
                .prop('title', response.name)
                .prop('id', 'linkElement')
                .attr('data-gallery', '#blueimp-gallery-links')
                .prependTo($("#links"));

            phothosWidth();

            setTimeout(this.nextFileToSend(), 500);
        },

        errorHandler: function(response, i) {

            if (this.files[i] == undefined) return;
            if (response.status == 403) {
                this.files[i].status = -2;
            } else {
                this.files[i].status = -1;
            }

            console.log(response);
            setTimeout(this.nextFileToSend(), 500);

        },

        retryFiled: function() {
            for (let i = 0; i < this.files.length; i++) {
                if (this.files[i].status = -1) {
                    this.files[i].status = 0;
                }
            }

            this.nextFileToSend();
        }
    }
})

// Dropzone.options.addImagesForm = {

//     paramName: 'image',
//     maxFilesize: 35,
//     parallelUploads: 1,
//     // acceptedFiles: '.jpg, .jpeg, .gif, .png , JPG',
//     acceptedFiles: 'image/*',
//     addRemoveLinks: true,

//     success: function(file, response) {

//         var id = response.album_clients_id;
//         file.serverImageId = response.id;

//         response.path = response.path.split(' ').join('%20');
//         var url1 = homePath + "/images/aplication/clients/" + id + "/app/" + response.path;
//         var url2 = homePath + "/images/aplication/clients/" + id + "/computer/" + response.path;

//         $('<a/>')
//             .append($('<div>')
//                 .prop({ "style": "background-image: url(" + url1 + ");", 'id': 'photos' })
//                 .append($('<i>')
//                     .prop({ class: 'trash icon', id: 'trash' + response.id })
//                     .attr('onclick', "deleteLB(" + response.id + ")")))
//             .prop('href', url2)
//             .prop('title', response.name)
//             .prop('id', 'linkElement')
//             .attr('data-gallery', '#blueimp-gallery-links')
//             .prependTo($("#links"));

//         phothosWidth();
//         console.log('Success');


//     },
//     error: function(file, message, xhr) {

//         if (xhr == undefined) {
//             var _ref;
//             return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
//         }

//         filesError.push(file);


//         if (file.previewElement) {
//             file.previewElement.classList.add("dz-error");
//             if (typeof message !== "String" && message.error) {
//                 message = message.error;
//             }


//             for (var _iterator7 = file.previewElement.querySelectorAll("[data-dz-errormessage]"), _isArray7 = true, _i7 = 0, _iterator7 = _isArray7 ? _iterator7 : _iterator7[Symbol.iterator]();;) {
//                 var _ref6;

//                 if (_isArray7) {
//                     if (_i7 >= _iterator7.length) break;
//                     _ref6 = _iterator7[_i7++];
//                 } else {
//                     _i7 = _iterator7.next();
//                     if (_i7.done) break;
//                     _ref6 = _i7.value;
//                 }

//                 var node = _ref6;

//                 node.textContent = message;
//             }
//         }
//     },

//     removedfile: function(file) {

//         // new File([file], file.name, { type: file.type });

//         this.uploadFile(file);

//         // let dropzoneFilesCopy = this.files.slice(0);
//         // this.removeAllFiles();
//         // $.each(dropzoneFilesCopy, function(file) {
//         //     if (file.status === Dropzone.ERROR) {
//         //         file.status = undefined;
//         //         file.accepted = undefined;
//         //     }

//         // this.uploadFile(file);
//         // });
//         // var _ref;
//         // return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
//     }

// };

// function restartFailUploads() {


//     // return;
//     // let dropzoneFilesCopy = Dropzone.options.addImagesForm.files.slice(0);
//     // let dropzoneFilesCopy = Dropzone.options.addImagesForm;
//     // console.log(dropzoneFilesCopy);
//     // return;

//     // Dropzone.removeAllFiles();

//     $.each(filesError, function(file) {
//         if (file.status === Dropzone.ERROR) {
//             file.status = undefined;
//             file.accepted = undefined;
//         }

//         dropzone.addFile(file);
//     });
// }

// setInterval(function() {
//     // $('.dz-preview.dz-processing.dz-image-preview.dz-complete').remove();
//     // $('.dz-preview.dz-file-preview.dz-complete').remove();
// }, 1000);