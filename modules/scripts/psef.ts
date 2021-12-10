import moment from "moment";
import { Quill } from "quill";
import { components as apiv1 } from "./psef-api-v1";
import { components as apiv01 } from "./psef-api-v01";

type HomepageNews = apiv1["schemas"]["HomepageNews"];
type OssFullInfo = apiv01["schemas"]["OssFullInfo"];

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

function loadData(url: string, token: string) {
  return $.ajax({
    url: url,
    method: "GET",
    beforeSend: function (xhr) {
      xhr.setRequestHeader("Authorization", `Bearer ${token}`);
    },
    dataType: "json"
  });
}

function loadAndDisplayNib(
  nib: string | undefined,
  apiServerUrl: string,
  token: string,
  inputElementId: string,
  statusElementId: string,
  viewElementId: string) {
  if (nib == undefined || nib == "") {
    return;
  }

  loadData(`${apiServerUrl}/api/v0.1/OssInfo/OssFullInfo?id=${nib}`, token).then(function (data: OssFullInfo) {
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
}
