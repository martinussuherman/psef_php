import moment from "moment";
import { Quill } from "quill";
import Swal from "sweetalert2";
import { components as apiv1 } from "./psef-api-v1";
import { components as apiv01 } from "./psef-api-v01";

type HomepageNews = apiv1["schemas"]["HomepageNews"];
type OssFullInfo = apiv01["schemas"]["OssFullInfo"];
type FileUploadInfo = {
  "@odata.context": string,
  value: string
};
type VoidFunction = () => void;

// Reference: https://stackoverflow.com/questions/469357/html-text-input-allow-only-numeric-input
function setInputFilter(textbox: Element, inputFilter: (value: string) => boolean): void {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function (event) {
    textbox.addEventListener(event, function (this: (HTMLInputElement | HTMLTextAreaElement) & { oldValue: string; oldSelectionStart: number | null, oldSelectionEnd: number | null }) {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (Object.prototype.hasOwnProperty.call(this, 'oldValue')) {
        this.value = this.oldValue;
        if (this.oldSelectionStart !== null &&
          this.oldSelectionEnd !== null) {
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        }
      } else {
        this.value = "";
      }
    });
  });
}

function setNumberOnlyInputFilter(textbox: Element) {
  setInputFilter(textbox, function (value) {
    return /^\d*$/.test(value); // Allow digits only, using a RegExp
  });
}

function setPhoneNumberInputFilter(textbox: Element) {
  setInputFilter(textbox, function (value) {
    return /^[+\d\s-+]*$/.test(value);
  });
}

function setSaveButtonStateOnInputChanged(formElementId: string, saveButtonElementId: string) {
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

function setAuthHeader(xhr: JQuery.jqXHR, token: string) {
  xhr.setRequestHeader("Authorization", `Bearer ${token}`);
}

function fileUploadError(
  isEdit: boolean,
  fileInputElement: JQuery<HTMLElement>,
  closeElement: JQuery<HTMLElement>,
  viewElement: JQuery<HTMLElement>,
  errorMessage: string) {
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

function uploadFile(
  isEdit: boolean,
  url: string,
  token: string,
  fileInputElement: JQuery<HTMLElement>,
  closeElement: JQuery<HTMLElement>,
  viewElement: JQuery<HTMLElement>) {
  let fileInput = fileInputElement[0] as HTMLInputElement;
  let fileName = fileInput.files?.item(0)?.name ?? "";
  let file = fileInput.files?.item(0) as File;
  let formData = new FormData();
  formData.append('file', file);

  if (!/(.*?)\.(pdf)$/.test(fileName) && fileName != "") {
    fileUploadError(
      isEdit,
      fileInputElement,
      closeElement,
      viewElement,
      "Pastikan berkas yang anda upload berupa PDF");
    return;
  }

  if (file.size <= 0 || file.size > 5300000) {
    fileUploadError(
      isEdit,
      fileInputElement,
      closeElement,
      viewElement,
      "Pastikan berkas yang anda upload maksimal 5 MB");
    return;
  }

  $.ajax({
    url: url,
    method: "POST",
    beforeSend: function (xhr) {
      setAuthHeader(xhr, token);
    },
    data: formData,
    processData: false,
    contentType: false,
    success: function (data: FileUploadInfo, textStatus, xhr) {
      viewElement.val(data.value);

      if (!isEdit) {
        closeElement.html(fileName);
        closeElement.attr("href", data.value);
        fileInputElement.prop("required", true);
      }
    },
    error: function (xhr, textStatus, errorThrown) {
      fileUploadError(
        isEdit,
        fileInputElement,
        closeElement,
        viewElement,
        `Terdapat masalah dalam upload berkas - status: ${xhr.status}`);
    }
  });
}

function setUploadHandler(inputElementId: string, isEdit: boolean, url: string, token: string) {
  $(`#${inputElementId}`).on("change", function () {
    uploadFile(
      isEdit,
      url,
      token,
      $(`#${inputElementId}`),
      $(`#close-${inputElementId}`),
      $(`#v-${inputElementId}`));
  });

}

function setToastrOptions() {
  let options: ToastrOptions = {
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

function displayOssSsoToastr(statusCode: number, message: string) {
  let options = setToastrOptions();
  let title = "OSS SSO";

  if (statusCode == 200) {
    toastr.success(
      `${message}<br /> Silahkan klik Masuk untuk melanjutkan ke dalam dasboard`,
      title,
      options);
    return;
  }

  toastr.error(message, title, options);
}

function displayHomeNewsItem(resourceUrl: string, news: HomepageNews, index: number) {
  $("#homePageNews").append(
    `<div class="col-lg-6">
      <div class="card">
        <img class="card-img-top img-responsive" src="${resourceUrl}${news.imageUrl}" alt="News Image"/>
        <div class="card-body">
          <div class="d-flex no-block align-items-center m-b-15">
            <span><i class="ti-calendar"></i> ${moment(news.publishedAt).format("YYYY-MM-DD")}</span>
          </div>
          <h3 class="font-normal">${news.title}</h3>
          <p class="m-b-0 m-t-10" id="page-news-${index}"></p>
          <a href="${news.linkUrl}" class="btn btn-success btn-rounded waves-effect waves-light m-t-20" target="_blank">
            Read more
          </a>
        </div>
      </div>
    </div>`);

  let quill = new Quill(`#page-news-${index}`, {});
  quill.setContents(JSON.parse(news.content as string));
  quill.disable();
  $('.ql-editor').css('padding', '0');
}

function loadData(url: string, token: string, loaderElementSelector?: string) {
  return $.ajax({
    url: url,
    method: "GET",
    beforeSend: function (xhr) {
      if (typeof loaderElementSelector !== "undefined") {
        $(loaderElementSelector).fadeIn();
      }

      setAuthHeader(xhr, token);
    },
    complete: function () {
      if (typeof loaderElementSelector !== "undefined") {
        $(loaderElementSelector).fadeOut();
      }
    },
    dataType: "json"
  });
}

function submitFormDataWithToastr(url: string,
  method: string,
  token: string,
  inputData: string,
  toastrTitle: string,
  successMessage: string,
  errorMessage: string,
  loaderElementSelector?: string
) {
  let request = submitFormData(url, method, token, inputData, loaderElementSelector);

  request.done(
    function (data, textStatus, xhr) {
      displayRequestSuccessToastr(xhr, toastrTitle, successMessage, errorMessage);
    }
  );
  request.fail(
    function (xhr, textStatus, errorThrown) {
      displayRequestErrorToastr(xhr, toastrTitle, errorMessage);
    }
  );

  return request;
}

function submitFormData(
  url: string,
  method: string,
  token: string,
  inputData: string,
  loaderElementSelector?: string) {
  return $.ajax({
    url: url,
    method: method,
    beforeSend: function (xhr) {
      if (typeof loaderElementSelector !== "undefined") {
        $(loaderElementSelector).fadeIn();
      }

      setAuthHeader(xhr, token);
    },
    complete: function () {
      if (typeof loaderElementSelector !== "undefined") {
        $(loaderElementSelector).fadeOut();
      }
    },
    data: inputData,
    contentType: "application/json"
  });
}

function selesaikanPermohonan(
  permohonanId: string,
  url: string,
  token: string,
  routingFunction?: VoidFunction,
  loaderElementSelector?: string) {
  submitFormData(
    url,
    "POST",
    token,
    JSON.stringify({ permohonanId: parseInt(permohonanId), reason: "" }),
    "Proses Pembuatan Tanda Daftar",
    "Permohonan berhasil diproses",
    "Permohonan gagal diproses",
    routingFunction,
    loaderElementSelector
  );
}

function loadAndDisplayNib(
  nib: string | undefined,
  apiServerUrl: string,
  token: string,
  inputElementId: string,
  statusElementId: string,
  viewElementId: string,
  loaderElementSelector?: string) {
  if (nib == undefined || nib == "") {
    return;
  }

  let options = setToastrOptions();
  let request = loadData(`${apiServerUrl}/api/v0.1/OssInfo/OssFullInfo?id=${nib}`, token, loaderElementSelector);

  request.done(function (data: OssFullInfo) {
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
    $(statusElementId).html(`
      Data NIB Dapat di Gunakan<br>
      <a href="/view-nib/${nib}" class="btn btn-primary" target="_blank">
        Periksa Detail NIB
      </a>`);
    $(inputElementId).removeClass('is-invalid').addClass('is-valid');
    $(viewElementId).html(`
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th scope="col">Nama Perusahaan</th>
            <th scope="col">NIB</th>
            <th scope="col">NPWP Perusahaan</th>
            <th scope="col">Nomor Telepon Perusahaan</th>
            <th scope="col">Alamat Perusahaan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>${data.namaPerseroan}</th>
            <th>${data.nib}</th>
            <th>${data.npwpPerseroan}</th>
            <th>${data.nomorTelponPerseroan}</th>
            <th>${data.alamatPerseroan}</th>
          </tr>
        </tbody>
      </table>`);
  });

  request.fail(function (xhr, textStatus, errorThrown) {
    toastr.error(`Gagal mengambil data NIB - status: ${xhr.status}`, "Data NIB", options);
  });
}

function dataTablePemohon(elementSelector: string, url: string) {
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

function displayRequestSuccessToastr(
  xhr: JQuery.jqXHR,
  toastrTitle: string,
  successMessage: string,
  errorMessage: string) {
  if (xhr.status == 200 || xhr.status == 201 || xhr.status == 204) {
    displaySuccessToastr(toastrTitle, successMessage);
  } else {
    displayRequestErrorToastr(xhr, toastrTitle, errorMessage);
  }
}

function displayRequestErrorToastr(xhr: JQuery.jqXHR, title: string, message: string) {
  displayErrorToastr(title, `${message} - status: ${xhr.status}`);
}

function displaySuccessToastr(title: string, message: string) {
  let options = setToastrOptions();
  toastr.error(message, title, options);
}

function displayErrorToastr(title: string, message: string) {
  let options = setToastrOptions();
  toastr.error(message, title, options);
}

function routeOnRequestSuccess(xhr: JQuery.jqXHR, routingFunction: VoidFunction) {
  if (xhr.status == 200 || xhr.status == 201 || xhr.status == 204) {
    routingFunction();
  }
}

function getFormData(formElementSelector: string) {
  let formElement = document.querySelector(formElementSelector) as HTMLFormElement;
  return Object.fromEntries(new FormData(formElement).entries());
}
