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
function loadData(url, token) {
    return $.ajax({
        url: url,
        method: "GET",
        beforeSend: function (xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token);
        },
        dataType: "json"
    });
}
function submitFormData(url, type, token, toastrTitle, successMessage, errorMessage, formElementSelector, routingFunction) {
    var formElement = document.querySelector(formElementSelector);
    var inputData = Object.fromEntries(new FormData(formElement).entries());
    var options = setToastrOptions();
    $.ajax({
        url: url,
        type: type,
        beforeSend: function (xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token);
        },
        data: JSON.stringify(inputData),
        contentType: "application/json",
        success: function (data, textStatus, xhr) {
            if (xhr.status == 204 || xhr.status == 200) {
                routingFunction();
                toastr.success(successMessage, toastrTitle, options);
            }
            else {
                toastr.error(errorMessage, toastrTitle, options);
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            toastr.error(errorMessage, toastrTitle, options);
        }
    });
}
function loadAndDisplayNib(nib, apiServerUrl, token, inputElementId, statusElementId, viewElementId) {
    if (nib == undefined || nib == "") {
        return;
    }
    loadData(apiServerUrl + "/api/v0.1/OssInfo/OssFullInfo?id=" + nib, token).then(function (data) {
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
