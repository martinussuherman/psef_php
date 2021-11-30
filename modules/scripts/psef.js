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
function displayOssSsoToastr(statusCode, message) {
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
