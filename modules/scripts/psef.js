// Reference: https://stackoverflow.com/questions/469357/html-text-input-allow-only-numeric-input
function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function (event) {
        textbox.addEventListener(event, function () {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            }
            else if (Object.prototype.hasOwnProperty.call(this, 'oldValue')) {
                this.value = this.oldValue;
                if (this.oldSelectionStart !== null &&
                    this.oldSelectionEnd !== null) {
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                }
            }
            else {
                this.value = "";
            }
        });
    });
}
function setNumberOnlyInputFilter(textbox) {
    setInputFilter(textbox, function (value) {
        return /^\d*$/.test(value); // Allow digits only, using a RegExp
    });
}
function setPhoneNumberInputFilter(textbox) {
    setInputFilter(textbox, function (value) {
        return /^[+\d\s-+]*$/.test(value);
    });
}
function setSaveButtonStateOnInputChanged(formElementId, saveButtonElementId) {
    $(formElementId)
        .each(function () {
        $(this).data("serialized", $(this).serialize());
    })
        .on("change input", function () {
        $(this)
            .find(saveButtonElementId)
            .prop("disabled", $(this).serialize() == $(this).data("serialized"));
    })
        .find(saveButtonElementId)
        .prop("disabled", true);
}
function fileUploadError(isEdit, fileInputElement, closeElement, viewElement, errorMessage) {
    if (!isEdit) {
        fileInputElement.prop("required", true);
    }
    fileInputElement.val("");
    closeElement.html("No file chosen");
    closeElement.attr("href", "#");
    viewElement.val("");
    Swal.fire({
        title: "Maaf !",
        text: errorMessage,
        icon: "error"
    });
}
function uploadFile(isEdit, url, token, fileInputElement, closeElement, viewElement) {
    var _a, _b, _c, _d;
    var fileInput = fileInputElement[0];
    var fileName = (_c = (_b = (_a = fileInput.files) === null || _a === void 0 ? void 0 : _a.item(0)) === null || _b === void 0 ? void 0 : _b.name) !== null && _c !== void 0 ? _c : "";
    var file = (_d = fileInput.files) === null || _d === void 0 ? void 0 : _d.item(0);
    var formData = new FormData();
    formData.append('file', file);
    if (!/(.*?)\.(pdf)$/.test(fileName) && fileName != "") {
        fileUploadError(isEdit, fileInputElement, closeElement, viewElement, "Pastikan berkas yang anda upload berupa PDF");
        return;
    }
    if (file.size <= 0 || file.size > 5300000) {
        fileUploadError(isEdit, fileInputElement, closeElement, viewElement, "Pastikan berkas yang anda upload maksimal 5 MB");
        return;
    }
    $.ajax({
        url: url,
        method: "POST",
        beforeSend: function (xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token);
        },
        data: formData,
        processData: false,
        contentType: false,
        success: function (data, textStatus, xhr) {
            viewElement.val(data.value);
            if (!isEdit) {
                closeElement.html(fileName);
                closeElement.attr("href", data.value);
                fileInputElement.prop("required", true);
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            fileUploadError(isEdit, fileInputElement, closeElement, viewElement, "Terdapat masalah dalam upload berkas - status: " + xhr.status);
        }
    });
}
function setUploadHandler(inputElementId, isEdit, url, token) {
    $("#" + inputElementId).on("change", function () {
        uploadFile(isEdit, url, token, $("#" + inputElementId), $("#close-" + inputElementId), $("#v-" + inputElementId));
    });
}
function setToastrOptions() {
    var options = {
        closeButton: true,
        debug: false,
        newestOnTop: false,
        progressBar: false,
        positionClass: "toast-bottom-right",
        preventDuplicates: false,
        showDuration: 0,
        hideDuration: 1000,
        timeOut: 0,
        extendedTimeOut: 0,
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut"
    };
    return options;
}
function displayOssSsoToastr(statusCode, message) {
    var options = setToastrOptions();
    var title = "OSS SSO";
    if (statusCode == 200) {
        toastr.success(message + "<br /> Silahkan klik Masuk untuk melanjutkan ke dalam dasboard", title, options);
        return;
    }
    toastr.error(message, title, options);
}
function displayHomeNewsItem(resourceUrl, news, index) {
    $("#homePageNews").append("<div class=\"col-lg-6\">\n      <div class=\"card\">\n        <img class=\"card-img-top img-responsive\" src=\"" + resourceUrl + news.imageUrl + "\" alt=\"News Image\"/>\n        <div class=\"card-body\">\n          <div class=\"d-flex no-block align-items-center m-b-15\">\n            <span><i class=\"ti-calendar\"></i> " + moment(news.publishedAt).format("YYYY-MM-DD") + "</span>\n          </div>\n          <h3 class=\"font-normal\">" + news.title + "</h3>\n          <p class=\"m-b-0 m-t-10\" id=\"page-news-" + index + "\"></p>\n          <a href=\"" + news.linkUrl + "\" class=\"btn btn-success btn-rounded waves-effect waves-light m-t-20\" target=\"_blank\">\n            Read more\n          </a>\n        </div>\n      </div>\n    </div>");
    var quill = new Quill("#page-news-" + index, {});
    quill.setContents(JSON.parse(news.content));
    quill.disable();
    $('.ql-editor').css('padding', '0');
}
function loadData(url, token, loaderElementSelector) {
    return $.ajax({
        url: url,
        method: "GET",
        beforeSend: function (xhr) {
            if (typeof loaderElementSelector !== "undefined") {
                $(loaderElementSelector).fadeIn();
            }
            xhr.setRequestHeader("Authorization", "Bearer " + token);
        },
        complete: function () {
            if (typeof loaderElementSelector !== "undefined") {
                $(loaderElementSelector).fadeOut();
            }
        },
        dataType: "json"
    });
}
function submitFormData(url, method, token, toastrTitle, successMessage, errorMessage, formElementSelector, routingFunction, loaderElementSelector) {
    var formElement = document.querySelector(formElementSelector);
    var inputData = Object.fromEntries(new FormData(formElement).entries());
    var options = setToastrOptions();
    var status = false;
    $.ajax({
        url: url,
        method: method,
        beforeSend: function (xhr) {
            if (typeof loaderElementSelector !== "undefined") {
                $(loaderElementSelector).fadeIn();
            }
            xhr.setRequestHeader("Authorization", "Bearer " + token);
        },
        complete: function () {
            if (typeof loaderElementSelector !== "undefined") {
                $(loaderElementSelector).fadeOut();
            }
        },
        data: JSON.stringify(inputData),
        contentType: "application/json",
        success: function (data, textStatus, xhr) {
            if (xhr.status == 200 || xhr.status == 201 || xhr.status == 204) {
                routingFunction();
                toastr.success(successMessage, toastrTitle, options);
                status = true;
            }
            else {
                toastr.error(errorMessage + " - status: " + xhr.status, toastrTitle, options);
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            toastr.error(errorMessage + " - status: " + xhr.status, toastrTitle, options);
        }
    });
    return status;
}
function loadAndDisplayNib(nib, apiServerUrl, token, inputElementId, statusElementId, viewElementId, loaderElementSelector) {
    if (nib == undefined || nib == "") {
        return;
    }
    var options = setToastrOptions();
    var request = loadData(apiServerUrl + "/api/v0.1/OssInfo/OssFullInfo?id=" + nib, token, loaderElementSelector);
    request.done(function (data) {
        if (data.keterangan == 'Data NIB tidak ditemukan' ||
            data.keterangan == 'NIB harus 13 karakter.' ||
            data.keterangan == 'Api Key tidak valid') {
            $(viewElementId).html("");
            $(statusElementId).css('color', 'red');
            $(statusElementId).html('Data NIB Tidak di Temukan');
            $(inputElementId).removeClass('is-valid').addClass('is-invalid');
            return;
        }
        $(statusElementId).css('color', 'green');
        $(statusElementId).html("\n      Data NIB Dapat di Gunakan<br>\n      <a href=\"/view-nib/" + nib + "\" class=\"btn btn-primary\" target=\"_blank\">\n        Periksa Detail NIB\n      </a>");
        $(inputElementId).removeClass('is-invalid').addClass('is-valid');
        $(viewElementId).html("\n      <table class=\"table table-bordered\">\n        <thead class=\"thead-light\">\n          <tr>\n            <th scope=\"col\">Nama Perusahaan</th>\n            <th scope=\"col\">NIB</th>\n            <th scope=\"col\">NPWP Perusahaan</th>\n            <th scope=\"col\">Nomor Telepon Perusahaan</th>\n            <th scope=\"col\">Alamat Perusahaan</th>\n          </tr>\n        </thead>\n        <tbody>\n          <tr>\n            <th>" + data.namaPerseroan + "</th>\n            <th>" + data.nib + "</th>\n            <th>" + data.npwpPerseroan + "</th>\n            <th>" + data.nomorTelponPerseroan + "</th>\n            <th>" + data.alamatPerseroan + "</th>\n          </tr>\n        </tbody>\n      </table>");
    });
    request.fail(function (xhr, textStatus, errorThrown) {
        toastr.error("Gagal mengambil data NIB - status: " + xhr.status, "Data NIB", options);
    });
}
function dataTablePemohon(elementSelector, url) {
    jQuery(function () {
        $(elementSelector).DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: url,
                method: "POST"
            },
            columns: [
                { data: "id" },
                { data: "phone" },
                { data: "address" },
                { data: "nib" },
                { data: "companyName" },
                { data: "penanggungJawab" }
                // "userId": "string",
                // "name": "string",
                // "email": "string"
            ]
        });
    });
}
