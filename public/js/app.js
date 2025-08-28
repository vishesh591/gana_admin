function _typeof(e) {
  return (_typeof =
    "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
      ? function (e) {
        return typeof e;
      }
      : function (e) {
        return e &&
          "function" == typeof Symbol &&
          e.constructor === Symbol &&
          e !== Symbol.prototype
          ? "symbol"
          : typeof e;
      })(e);
}
function _classCallCheck(e, t) {
  if (!(e instanceof t))
    throw new TypeError("Cannot call a class as a function");
}
function _defineProperties(e, t) {
  for (var n = 0; n < t.length; n++) {
    var r = t[n];
    (r.enumerable = r.enumerable || !1),
      (r.configurable = !0),
      "value" in r && (r.writable = !0),
      Object.defineProperty(e, _toPropertyKey(r.key), r);
  }
}
function _createClass(e, t, n) {
  return (
    t && _defineProperties(e.prototype, t),
    n && _defineProperties(e, n),
    Object.defineProperty(e, "prototype", { writable: !1 }),
    e
  );
}
function _defineProperty(e, t, n) {
  return (
    (t = _toPropertyKey(t)) in e
      ? Object.defineProperty(e, t, {
        value: n,
        enumerable: !0,
        configurable: !0,
        writable: !0,
      })
      : (e[t] = n),
    e
  );
}
function _toPropertyKey(e) {
  e = _toPrimitive(e, "string");
  return "symbol" == _typeof(e) ? e : e + "";
}
function _toPrimitive(e, t) {
  if ("object" != _typeof(e) || !e) return e;
  var n = e[Symbol.toPrimitive];
  if (void 0 === n) return ("string" === t ? String : Number)(e);
  n = n.call(e, t || "default");
  if ("object" != _typeof(n)) return n;
  throw new TypeError("@@toPrimitive must return a primitive value.");
}
var App = (() =>
  _createClass(
    function e() {
      _classCallCheck(this, e),
        _defineProperty(this, "initControls", function () {
          function e() {
            document.webkitIsFullScreen ||
              document.mozFullScreen ||
              document.msFullscreenElement ||
              $("body").removeClass("fullscreen-enable");
          }
          $('[data-toggle="fullscreen"]').on("click", function (e) {
            e.preventDefault(),
              $("body").toggleClass("fullscreen-enable"),
              document.fullscreenElement ||
                document.mozFullScreenElement ||
                document.webkitFullscreenElement
                ? document.cancelFullScreen
                  ? document.cancelFullScreen()
                  : document.mozCancelFullScreen
                    ? document.mozCancelFullScreen()
                    : document.webkitCancelFullScreen &&
                    document.webkitCancelFullScreen()
                : document.documentElement.requestFullscreen
                  ? document.documentElement.requestFullscreen()
                  : document.documentElement.mozRequestFullScreen
                    ? document.documentElement.mozRequestFullScreen()
                    : document.documentElement.webkitRequestFullscreen &&
                    document.documentElement.webkitRequestFullscreen(
                      Element.ALLOW_KEYBOARD_INPUT
                    );
          }),
            document.addEventListener("fullscreenchange", e),
            document.addEventListener("webkitfullscreenchange", e),
            document.addEventListener("mozfullscreenchange", e);
        });
    },
    [
      {
        key: "initComponents",
        value: function () {
          Waves.init(), feather.replace();
          [].slice
            .call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            .map(function (e) {
              return new bootstrap.Popover(e);
            }),
            [].slice
              .call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
              .map(function (e) {
                return new bootstrap.Tooltip(e);
              }),
            [].slice
              .call(document.querySelectorAll(".toast"))
              .map(function (e) {
                return new bootstrap.Toast(e);
              });
          var e = document.getElementById("toastPlacement"),
            r =
              (e &&
                document
                  .getElementById("selectToastPlacement")
                  .addEventListener("change", function () {
                    e.dataset.originalClass ||
                      (e.dataset.originalClass = e.className),
                      (e.className =
                        e.dataset.originalClass + " " + this.value);
                  }),
                document.getElementById("liveAlertPlaceholder")),
            t = document.getElementById("liveAlertBtn");
          t &&
            t.addEventListener("click", function () {
              var e, t, n;
              (e = "Nice, you triggered this alert message!"),
                (t = "primary"),
                ((n = document.createElement("div")).innerHTML =
                  '<div class="alert alert-' +
                  t +
                  ' alert-dismissible" role="alert">' +
                  e +
                  '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'),
                r.append(n);
            });
        },
      },
      {
        key: "initMenu",
        value: function () {
          function e() {
            window.innerWidth < 1040
              ? t.setAttribute("data-sidebar", "hidden")
              : t.setAttribute("data-sidebar", "default");
          }
          var t = document.body,
            n = document.querySelector(".button-toggle-menu");
          n &&
            n.addEventListener("click", function () {
              "default" == t.getAttribute("data-sidebar")
                ? t.setAttribute("data-sidebar", "hidden")
                : t.setAttribute("data-sidebar", "default");
            });
          e(),
            window.addEventListener("resize", e),
            $("#side-menu").length &&
            ($("#side-menu li .collapse").on({
              "show.bs.collapse": function (e) {
                e = $(e.target).parents(".collapse.show");
                $("#side-menu .collapse.show").not(e).collapse("hide");
              },
            }),
              $("#side-menu a").each(function () {
                var e = window.location.href.split(/[?#]/)[0];
                this.href == e &&
                  ($(this).addClass("active"),
                    $(this).parent().addClass("menuitem-active"),
                    $(this).parent().parent().parent().addClass("show"),
                    $(this)
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .addClass("menuitem-active"),
                    "sidebar-menu" !==
                    (e = $(this)
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()).attr("id") && e.addClass("show"),
                    $(this)
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .addClass("menuitem-active"),
                    "wrapper" !==
                    (e = $(this)
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()).attr("id") && e.addClass("show"),
                    (e = $(this)
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()
                      .parent()).is("body") || e.addClass("menuitem-active"));
              }));
        },
      },
      {
        key: "init",
        value: function () {
          this.initComponents(), this.initMenu(), this.initControls();
        },
      },
    ]
  ))();
new App().init();

// In your app.js, replace the entire .admin-ownership-data-page block with this:
// Add this entire new block to your app.js file
document.addEventListener("DOMContentLoaded", function () {
  const ownershipPageContainer = document.querySelector(
    ".admin-ownership-data-page"
  );
  if (!ownershipPageContainer) {
    return;
  }

  // --- DATA ---
  const conflictRequests = [
    {
      id: 1,
      category: "Ownership conflict",
      assetTitle: "Cosmic Drift",
      artist: "Astro Beats",
      assetId: "90736897913",
      upc: "198009123456",
      isrc: "USAT22312345",
      otherParty: "The Orchard",
      dailyViews: "79K",
      expiry: "2 days",
      status: "Action Required",
      albumCoverUrl: "https://placehold.co/80x80/3498db/ffffff?text=C",
    },
    {
      id: 2,
      category: "Policy",
      assetTitle: "Ocean Tides",
      artist: "Deep Wave",
      assetId: "3478239381",
      upc: "198009654321",
      isrc: "USAT22354321",
      otherParty: "Believe",
      dailyViews: "3K",
      expiry: "-",
      status: "Resolved",
      albumCoverUrl: "https://placehold.co/80x80/1abc9c/ffffff?text=O",
    },
    {
      id: 3,
      category: "Ownership conflict",
      assetTitle: "City Lights",
      artist: "Urban Glow",
      assetId: "3478239381",
      upc: "198009789012",
      isrc: "USAT22398765",
      otherParty: "CD Baby",
      dailyViews: "1.2K",
      expiry: "15 days",
      status: "In Review",
      albumCoverUrl: "https://placehold.co/80x80/9b59b6/ffffff?text=C",
    },
    {
      id: 4,
      category: "Metadata Error",
      assetTitle: "Desert Mirage",
      artist: "Sahara Echo",
      assetId: "89321756430",
      upc: "198001112233",
      isrc: "USAT22445566",
      otherParty: "TuneCore",
      dailyViews: "58K",
      expiry: "5 days",
      status: "Action Required",
      albumCoverUrl: "https://placehold.co/80x80/e67e22/ffffff?text=D",
    },
  ];
  const territoriesByRegion = {
    Africa: [
      { name: "Algeria", code: "DZ" },
      { name: "Angola", code: "AO" },
      { name: "Benin", code: "BJ" },
      { name: "Botswana", code: "BW" },
      { name: "Burkina Faso", code: "BF" },
      { name: "Burundi", code: "BI" },
      { name: "Cabo Verde", code: "CV" },
      { name: "Cameroon", code: "CM" },
      { name: "Central African Republic", code: "CF" },
      { name: "Chad", code: "TD" },
      { name: "Comoros", code: "KM" },
      { name: "Congo", code: "CG" },
      { name: "Congo (DRC)", code: "CD" },
      { name: "Côte d'Ivoire", code: "CI" },
      { name: "Djibouti", code: "DJ" },
      { name: "Egypt", code: "EG" },
      { name: "Equatorial Guinea", code: "GQ" },
      { name: "Eritrea", code: "ER" },
      { name: "Eswatini", code: "SZ" },
      { name: "Ethiopia", code: "ET" },
      { name: "Gabon", code: "GA" },
      { name: "Gambia", code: "GM" },
      { name: "Ghana", code: "GH" },
      { name: "Guinea", code: "GN" },
      { name: "Guinea-Bissau", code: "GW" },
      { name: "Kenya", code: "KE" },
      { name: "Lesotho", code: "LS" },
      { name: "Liberia", code: "LR" },
      { name: "Libya", code: "LY" },
      { name: "Madagascar", code: "MG" },
      { name: "Malawi", code: "MW" },
      { name: "Mali", code: "ML" },
      { name: "Mauritania", code: "MR" },
      { name: "Mauritius", code: "MU" },
      { name: "Mayotte", code: "YT" },
      { name: "Morocco", code: "MA" },
      { name: "Mozambique", code: "MZ" },
      { name: "Namibia", code: "NA" },
      { name: "Niger", code: "NE" },
      { name: "Nigeria", code: "NG" },
      { name: "Réunion", code: "RE" },
      { name: "Rwanda", code: "RW" },
      { name: "Saint Helena", code: "SH" },
      { name: "Sao Tome and Principe", code: "ST" },
      { name: "Senegal", code: "SN" },
      { name: "Seychelles", code: "SC" },
      { name: "Sierra Leone", code: "SL" },
      { name: "Somalia", code: "SO" },
      { name: "South Africa", code: "ZA" },
      { name: "South Sudan", code: "SS" },
      { name: "Sudan", code: "SD" },
      { name: "Tanzania", code: "TZ" },
      { name: "Togo", code: "TG" },
      { name: "Tunisia", code: "TN" },
      { name: "Uganda", code: "UG" },
      { name: "Zambia", code: "ZM" },
      { name: "Zimbabwe", code: "ZW" },
    ],
    Antarctica: [
      { name: "Antarctica", code: "AQ" },
      { name: "French Southern Territories", code: "TF" },
      { name: "South Georgia and the South Sandwich Islands", code: "GS" },
    ],
    Asia: [
      { name: "Afghanistan", code: "AF" },
      { name: "Armenia", code: "AM" },
      { name: "Azerbaijan", code: "AZ" },
      { name: "Bahrain", code: "BH" },
      { name: "Bangladesh", code: "BD" },
      { name: "Bhutan", code: "BT" },
      { name: "British Indian Ocean Territory", code: "IO" },
      { name: "Brunei", code: "BN" },
      { name: "Cambodia", code: "KH" },
      { name: "China", code: "CN" },
      { name: "Cyprus", code: "CY" },
      { name: "Georgia", code: "GE" },
      { name: "Hong Kong", code: "HK" },
      { name: "India", code: "IN" },
      { name: "Indonesia", code: "ID" },
      { name: "Iran", code: "IR" },
      { name: "Iraq", code: "IQ" },
      { name: "Israel", code: "IL" },
      { name: "Japan", code: "JP" },
      { name: "Jordan", code: "JO" },
      { name: "Kazakhstan", code: "KZ" },
      { name: "Kuwait", code: "KW" },
      { name: "Kyrgyzstan", code: "KG" },
      { name: "Laos", code: "LA" },
      { name: "Lebanon", code: "LB" },
      { name: "Macao", code: "MO" },
      { name: "Malaysia", code: "MY" },
      { name: "Maldives", code: "MV" },
      { name: "Mongolia", code: "MN" },
      { name: "Myanmar", code: "MM" },
      { name: "Nepal", code: "NP" },
      { name: "North Korea", code: "KP" },
      { name: "Oman", code: "OM" },
      { name: "Pakistan", code: "PK" },
      { name: "Palestine", code: "PS" },
      { name: "Philippines", code: "PH" },
      { name: "Qatar", code: "QA" },
      { name: "Saudi Arabia", code: "SA" },
      { name: "Singapore", code: "SG" },
      { name: "South Korea", code: "KR" },
      { name: "Sri Lanka", code: "LK" },
      { name: "Syria", code: "SY" },
      { name: "Taiwan", code: "TW" },
      { name: "Tajikistan", code: "TJ" },
      { name: "Thailand", code: "TH" },
      { name: "Timor-Leste", code: "TL" },
      { name: "Turkey", code: "TR" },
      { name: "Turkmenistan", code: "TM" },
      { name: "United Arab Emirates", code: "AE" },
      { name: "Uzbekistan", code: "UZ" },
      { name: "Vietnam", code: "VN" },
      { name: "Yemen", code: "YE" },
    ],
    Europe: [
      { name: "Åland Islands", code: "AX" },
      { name: "Albania", code: "AL" },
      { name: "Andorra", code: "AD" },
      { name: "Austria", code: "AT" },
      { name: "Belarus", code: "BY" },
      { name: "Belgium", code: "BE" },
      { name: "Bosnia and Herzegovina", code: "BA" },
      { name: "Bulgaria", code: "BG" },
      { name: "Croatia", code: "HR" },
      { name: "Czechia", code: "CZ" },
      { name: "Denmark", code: "DK" },
      { name: "Estonia", code: "EE" },
      { name: "Faroe Islands", code: "FO" },
      { name: "Finland", code: "FI" },
      { name: "France", code: "FR" },
      { name: "Germany", code: "DE" },
      { name: "Gibraltar", code: "GI" },
      { name: "Greece", code: "GR" },
      { name: "Guernsey", code: "GG" },
      { name: "Holy See", code: "VA" },
      { name: "Hungary", code: "HU" },
      { name: "Iceland", code: "IS" },
      { name: "Ireland", code: "IE" },
      { name: "Isle of Man", code: "IM" },
      { name: "Italy", code: "IT" },
      { name: "Jersey", code: "JE" },
      { name: "Latvia", code: "LV" },
      { name: "Liechtenstein", code: "LI" },
      { name: "Lithuania", code: "LT" },
      { name: "Luxembourg", code: "LU" },
      { name: "Malta", code: "MT" },
      { name: "Moldova", code: "MD" },
      { name: "Monaco", code: "MC" },
      { name: "Montenegro", code: "ME" },
      { name: "Netherlands", code: "NL" },
      { name: "North Macedonia", code: "MK" },
      { name: "Norway", code: "NO" },
      { name: "Poland", code: "PL" },
      { name: "Portugal", code: "PT" },
      { name: "Romania", code: "RO" },
      { name: "Russia", code: "RU" },
      { name: "San Marino", code: "SM" },
      { name: "Serbia", code: "RS" },
      { name: "Slovakia", code: "SK" },
      { name: "Slovenia", code: "SI" },
      { name: "Spain", code: "ES" },
      { name: "Svalbard and Jan Mayen", code: "SJ" },
      { name: "Sweden", code: "SE" },
      { name: "Switzerland", code: "CH" },
      { name: "Ukraine", code: "UA" },
      { name: "United Kingdom", code: "GB" },
    ],
    "North America": [
      { name: "Anguilla", code: "AI" },
      { name: "Antigua and Barbuda", code: "AG" },
      { name: "Aruba", code: "AW" },
      { name: "Bahamas", code: "BS" },
      { name: "Barbados", code: "BB" },
      { name: "Belize", code: "BZ" },
      { name: "Bermuda", code: "BM" },
      { name: "Bonaire", code: "BQ" },
      { name: "Canada", code: "CA" },
      { name: "Cayman Islands", code: "KY" },
      { name: "Costa Rica", code: "CR" },
      { name: "Cuba", code: "CU" },
      { name: "Curaçao", code: "CW" },
      { name: "Dominica", code: "DM" },
      { name: "Dominican Republic", code: "DO" },
      { name: "El Salvador", code: "SV" },
      { name: "Greenland", code: "GL" },
      { name: "Grenada", code: "GD" },
      { name: "Guadeloupe", code: "GP" },
      { name: "Guatemala", code: "GT" },
      { name: "Haiti", code: "HT" },
      { name: "Honduras", code: "HN" },
      { name: "Jamaica", code: "JM" },
      { name: "Martinique", code: "MQ" },
      { name: "Mexico", code: "MX" },
      { name: "Montserrat", code: "MS" },
      { name: "Nicaragua", code: "NI" },
      { name: "Panama", code: "PA" },
      { name: "Puerto Rico", code: "PR" },
      { name: "Saint Barthélemy", code: "BL" },
      { name: "Saint Kitts and Nevis", code: "KN" },
      { name: "Saint Lucia", code: "LC" },
      { name: "Saint Martin", code: "MF" },
      { name: "Saint Pierre and Miquelon", code: "PM" },
      { name: "Saint Vincent and the Grenadines", code: "VC" },
      { name: "Sint Maarten", code: "SX" },
      { name: "Trinidad and Tobago", code: "TT" },
      { name: "Turks and Caicos Islands", code: "TC" },
      { name: "United States", code: "US" },
      { name: "U.S. Virgin Islands", code: "VI" },
    ],
    Oceania: [
      { name: "American Samoa", code: "AS" },
      { name: "Australia", code: "AU" },
      { name: "Christmas Island", code: "CX" },
      { name: "Cocos (Keeling) Islands", code: "CC" },
      { name: "Cook Islands", code: "CK" },
      { name: "Fiji", code: "FJ" },
      { name: "French Polynesia", code: "PF" },
      { name: "Guam", code: "GU" },
      { name: "Kiribati", code: "KI" },
      { name: "Marshall Islands", code: "MH" },
      { name: "Micronesia", code: "FM" },
      { name: "Nauru", code: "NR" },
      { name: "New Caledonia", code: "NC" },
      { name: "New Zealand", code: "NZ" },
      { name: "Niue", code: "NU" },
      { name: "Norfolk Island", code: "NF" },
      { name: "Northern Mariana Islands", code: "MP" },
      { name: "Palau", code: "PW" },
      { name: "Papua New Guinea", code: "PG" },
      { name: "Pitcairn", code: "PN" },
      { name: "Samoa", code: "WS" },
      { name: "Solomon Islands", code: "SB" },
      { name: "Tokelau", code: "TK" },
      { name: "Tonga", code: "TO" },
      { name: "Tuvalu", code: "TV" },
      { name: "U.S. Minor Outlying Islands", code: "UM" },
      { name: "Vanuatu", code: "VU" },
      { name: "Wallis and Futuna", code: "WF" },
    ],
    "South America": [
      { name: "Argentina", code: "AR" },
      { name: "Bolivia", code: "BO" },
      { name: "Brazil", code: "BR" },
      { name: "Chile", code: "CL" },
      { name: "Colombia", code: "CO" },
      { name: "Ecuador", code: "EC" },
      { name: "Falkland Islands", code: "FK" },
      { name: "French Guiana", code: "GF" },
      { name: "Guyana", code: "GY" },
      { name: "Paraguay", code: "PY" },
      { name: "Peru", code: "PE" },
      { name: "Suriname", code: "SR" },
      { name: "Uruguay", code: "UY" },
      { name: "Venezuela", code: "VE" },
    ],
  };
  const totalCountries = Object.values(territoriesByRegion).flat().length;

  // --- DOM ELEMENTS ---
  const table = $("#datatable");

  // --- HELPER & PARSING FUNCTIONS ---
  const parseViews = (views) =>
    typeof views !== "string"
      ? 0
      : parseFloat(views.toUpperCase()) *
      (views.toUpperCase().includes("K") ? 1000 : 1);
  const parseExpiry = (expiry) =>
    typeof expiry !== "string" || expiry === "-" ? Infinity : parseInt(expiry);
  const getStatusBadge = (status) =>
    `<span class="badge rounded-pill border ${getStatusBadgeClass(
      status
    )}">${status}</span>`;
  const getStatusBadgeClass = (status) => {
    const lowerStatus = status.toLowerCase();
    if (lowerStatus.includes("action required"))
      return "bg-danger-subtle text-danger-emphasis";
    if (lowerStatus.includes("resolved"))
      return "bg-success-subtle text-success-emphasis";
    if (lowerStatus.includes("in review"))
      return "bg-warning-subtle text-warning-emphasis";
    return "bg-secondary-subtle text-secondary-emphasis";
  };

  // --- DATATABLES CONFIGURATION ---
  const dataTableInstance = table.DataTable({
    destroy: true,
    data: conflictRequests,
    paging: true,
    searching: true,
    info: true,
    lengthChange: true,
    autoWidth: false,
    columns: [
      {
        data: null,
        className: "text-center",
        orderable: false,
        render: () => `<i class="bi bi-youtube text-danger fs-5"></i>`,
      },
      { data: "category" },
      { data: "assetTitle" },
      {
        data: null,
        render: (data, type, row) =>
          `<div class="fw-bold">${row.artist}</div><small class="text-muted">Asset ID: ${row.assetId}</small>`,
      },
      { data: "upc" },
      { data: "otherParty" },
      {
        data: "dailyViews",
        render: { _: (data) => data, sort: (data) => parseViews(data) },
      },
      {
        data: "expiry",
        render: { _: (data) => data, sort: (data) => parseExpiry(data) },
      },
      { data: "status", render: (data) => getStatusBadge(data) },
      {
        data: null,
        className: "text-center",
        orderable: false,
        render: () => `<i class="bi bi-chevron-right text-muted"></i>`,
      },
    ],
    createdRow: function (row, data, dataIndex) {
      $(row).attr({
        "data-bs-toggle": "offcanvas",
        "data-bs-target": "#conflictResolutionOffcanvas",
        "data-song-name": data.assetTitle,
        "data-artist-name": data.artist,
        "data-isrc": data.isrc,
        "data-cover-url": data.albumCoverUrl,
        "data-category": data.category,
        "data-other-party": data.otherParty,
      });
    },
    language: {
      info: "Showing _START_ to _END_ of _TOTAL_ entries",
      infoEmpty: "Showing 0 to 0 of 0 entries",
      infoFiltered: "(filtered from _MAX_ total entries)",
      zeroRecords: "No matching conflicts found",
      emptyTable: "No conflicts available",
      search: "_INPUT_",
      searchPlaceholder: "Search conflicts...",
    },
  });

  // --- OFFCANVAS LOGIC ---
  const conflictOffcanvasEl = document.getElementById(
    "conflictResolutionOffcanvas"
  );
  if (conflictOffcanvasEl) {
    const conflictForm = document.getElementById("conflictForm");
    const steps = Array.from(
      conflictOffcanvasEl.querySelectorAll(".form-step")
    );
    const nextBtn = document.getElementById("nextBtn");
    const backBtn = document.getElementById("backBtn");
    const submitBtn = document.getElementById("submitBtn");
    let currentStep = 0;

    function showStep(stepIndex) {
      steps.forEach((step, index) =>
        step.classList.toggle("d-none", index !== stepIndex)
      );
      backBtn.classList.toggle("d-none", stepIndex === 0);
      nextBtn.classList.toggle("d-none", stepIndex === steps.length - 1);
      submitBtn.classList.toggle("d-none", stepIndex !== steps.length - 1);
      currentStep = stepIndex;
    }

    nextBtn.addEventListener("click", () => {
      if (
        currentStep === 0 &&
        !conflictForm.querySelector('input[name="rightsOwned"]:checked')
      )
        return alert("Please select a rights option.");
      if (
        currentStep === 1 &&
        !conflictForm.querySelector(".country-checkbox:checked")
      )
        return alert("Please select at least one territory.");
      if (currentStep < steps.length - 1) showStep(currentStep + 1);
    });

    backBtn.addEventListener("click", () => showStep(currentStep - 1));

    conflictOffcanvasEl.addEventListener("show.bs.offcanvas", function (event) {
      renderTerritoryAccordion();
      const data = event.relatedTarget.dataset;
      ["", "2", "3"].forEach((s) => {
        const cover = document.getElementById(`modalAlbumCover${s}`);
        const song = document.getElementById(`modalSongName${s}`);
        const artist = document.getElementById(`modalArtistName${s}`);
        if (cover) cover.src = data.coverUrl;
        if (song) song.textContent = data.songName;
        if (artist) artist.textContent = data.artistName;
      });
      document.getElementById("offcanvasTitle").textContent = data.category;
      document.getElementById(
        "offcanvasSubtitle"
      ).textContent = `VS. ${data.otherParty}`;
      conflictForm.reset();
      conflictForm
        .querySelectorAll(".radio-card")
        .forEach((c) => c.classList.remove("selected"));
      document.getElementById("selectedFileName")?.classList.add("d-none");
      showStep(0);
    });

    conflictForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const formFile = document.getElementById("formFile");
      if (currentStep === 2 && formFile && !formFile.files.length)
        return alert("Please upload a supporting document.");
      alert("Resolution submitted successfully!");
      bootstrap.Offcanvas.getInstance(conflictOffcanvasEl).hide();
    });

    function renderTerritoryAccordion() {
      const accordionContainer = document.getElementById("territoryAccordion");
      if (!accordionContainer) return;
      accordionContainer.innerHTML = Object.entries(territoriesByRegion)
        .map(([region, countries]) => {
          if (countries.length === 0) return "";
          const regionId = region.replace(/[^a-zA-Z0-9]/g, "");
          return `
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${regionId}">
                            <div class="form-check me-auto pe-2">
                                <input class="form-check-input region-checkbox" type="checkbox" id="region-${regionId}" data-region="${region}" checked>
                                <label class="form-check-label fw-bold" for="region-${regionId}">${region}</label>
                            </div>
                            <span class="text-muted small me-2">${countries.length
            } countries</span>
                        </button>
                    </h2>
                    <div id="collapse-${regionId}" class="accordion-collapse collapse" data-bs-parent="#territoryAccordion">
                        <div class="accordion-body">
                            <div class="territory-list-inner">${countries
              .map(
                (c) => `
                                <div class="form-check">
                                    <input class="form-check-input country-checkbox" type="checkbox" value="${c.code}" id="country-${c.code}" data-region="${region}" checked>
                                    <label class="form-check-label" for="country-${c.code}">${c.name}</label>
                                </div>`
              )
              .join("")}
                            </div>
                        </div>
                    </div>
                </div>`;
        })
        .join("");
      addTerritoryEventListeners();
      updateTerritoryCounter();
    }

    function updateTerritoryCounter() {
      const selected = conflictOffcanvasEl.querySelectorAll(
        ".country-checkbox:checked"
      ).length;
      document.getElementById(
        "territoryCounter"
      ).textContent = `${selected} contested countries out of ${totalCountries} delivered`;
    }

    function addTerritoryEventListeners() {
      const checkboxes = conflictOffcanvasEl.querySelectorAll(
        ".region-checkbox, .country-checkbox"
      );
      checkboxes.forEach((cb) =>
        cb.addEventListener("change", function (e) {
          if (e.target.classList.contains("region-checkbox")) {
            const region = e.target.dataset.region;
            conflictOffcanvasEl
              .querySelectorAll(`.country-checkbox[data-region="${region}"]`)
              .forEach((countryCb) => (countryCb.checked = e.target.checked));
          } else {
            const region = e.target.dataset.region;
            const allInRegion = [
              ...conflictOffcanvasEl.querySelectorAll(
                `.country-checkbox[data-region="${region}"]`
              ),
            ].every((c) => c.checked);
            conflictOffcanvasEl.querySelector(
              `.region-checkbox[data-region="${region}"]`
            ).checked = allInRegion;
          }
          updateTerritoryCounter();
        })
      );
    }

    conflictOffcanvasEl.addEventListener("click", function (e) {
      if (e.target.closest(".radio-card")) {
        const card = e.target.closest(".radio-card");
        conflictOffcanvasEl
          .querySelectorAll(".radio-card")
          .forEach((c) => c.classList.remove("selected"));
        card.classList.add("selected");
        card.querySelector('input[type="radio"]').checked = true;
      }
    });

    const fileInput = document.getElementById("formFile");
    const fileDisplay = document.getElementById("selectedFileName");
    document
      .getElementById("fileUploadContainer")
      ?.addEventListener("click", () => fileInput.click());
    fileInput?.addEventListener("change", () => {
      if (fileInput.files.length > 0 && fileDisplay) {
        fileDisplay.querySelector("span").textContent = fileInput.files[0].name;
        fileDisplay.classList.remove("d-none");
      }
    });
    fileDisplay?.querySelector(".btn-close").addEventListener("click", (e) => {
      e.stopPropagation();
      if (fileInput) fileInput.value = "";
      fileDisplay.classList.add("d-none");
    });
  }
});
// claim-data-page js
// In your app.js, replace the entire .admin-claim-data-page block with this:
document.addEventListener("DOMContentLoaded", function () {
  const ownershipPageContainer = document.querySelector(
    ".admin-claim-data-page"
  );

  if (ownershipPageContainer) {
    // --- DATA ---
    let claimingRequests = [
      {
        id: 1,
        songName: "Cosmic Drift",
        artist: "Orion Sun",
        isrc: "US1232500004",
        instagramAudio: "https://instagram.com/audio/123",
        reelMerge: "https://instagram.com/reel/xyz",
        status: "pending",
        artwork:
          "https://i.scdn.co/image/ab67616d0000b273e6f6a7f1b2b2b2b2b2b2b2b2",
        matchingTime: "N/A",
      },
      {
        id: 2,
        songName: "Neon Tides",
        artist: "Cyber Lazer",
        isrc: "US1232500005",
        instagramAudio: "https://instagram.com/audio/456",
        reelMerge: "https://instagram.com/reel/abc",
        matchingTime: "00:30-01:00",
        status: "pending",
        artwork:
          "https://i.scdn.co/image/ab67616d0000b273f4f4f4f4f4f4f4f4f4f4f4f4",
      },
      {
        id: 3,
        songName: "Lost Signal",
        artist: "Ghost FM",
        isrc: "US1232500006",
        instagramAudio: "https://instagram.com/audio/789",
        reelMerge: "https://instagram.com/reel/def",
        matchingTime: "01:00-01:15",
        status: "rejected",
        artwork:
          "https://i.scdn.co/image/ab67616d0000b273a8a8a8a8a8a8a8a8a8a8a8a8",
      },
    ];
    let currentFilter = "all";

    // --- DOM ELEMENTS ---
    const table = $("#datatable");
    const releaseModalEl = document.getElementById("releaseModal");
    const releaseModal = new bootstrap.Modal(releaseModalEl);

    // --- HELPER FUNCTIONS ---
    const getStatusIcon = (status) => {
      const icons = {
        approved: "check-circle",
        pending: "clock",
        rejected: "x-circle",
      };
      const colors = {
        approved: "text-success",
        pending: "text-warning",
        rejected: "text-danger",
      };
      return `<i data-feather="${icons[status] || "help-circle"}" class="${colors[status] || "text-muted"
        }"></i>`;
    };
    const getStatusBadge = (status) => {
      const config = {
        approved: "status-approved",
        pending: "status-pending",
        rejected: "status-rejected",
      };
      return `<span class="badge status-badge ${config[status] || "bg-secondary"
        }">${status.toUpperCase()}</span>`;
    };
    const createLink = (url, iconClass) =>
      url
        ? `<a href="${url}" target="_blank" class="link-icon me-2"><i class="bi ${iconClass}"></i></a>`
        : "";

    // --- DATATABLE INITIALIZATION ---
    const dataTableInstance = table.DataTable({
      destroy: true,
      data: [],
      paging: true,
      searching: true,
      info: true,
      lengthChange: true,
      autoWidth: false,
      columns: [
        {
          data: "status",
          className: "text-center",
          orderable: false,
          render: (data) => getStatusIcon(data),
        },
        {
          data: null,
          orderable: true,
          render: (data, type, row) => `
                    <div class="release-title"><a href="#" class="view-details-link" data-id="${row.id}">${row.songName}</a></div>
                    <div class="text-muted small">${row.artist}</div>`,
        },
        { data: "isrc", defaultContent: "N/A" },
        {
          data: null,
          className: "text-center",
          orderable: false,
          render: (data, type, row) =>
            createLink(row.instagramAudio, "bi-music-note-beamed") +
            " " +
            createLink(row.reelMerge, "bi-camera-reels"),
        },
        {
          data: "status",
          className: "text-center",
          render: (data) =>
            `<div class="d-flex justify-content-center">${getStatusBadge(
              data
            )}</div>`,
        },
      ],
      drawCallback: () => {
        feather.replace();
      },
      language: {
        info: "Showing _START_ to _END_ of _TOTAL_ entries",
        infoEmpty: "Showing 0 to 0 of 0 entries",
        infoFiltered: "(filtered from _MAX_ total entries)",
        zeroRecords: "No matching requests found",
        emptyTable: "No requests available",
        search: "_INPUT_",
        searchPlaceholder: "Search records...",
      },
    });

    // --- RENDER & UPDATE FUNCTIONS ---

    // This is the single source of truth for filtering and drawing the table
    function applyFiltersAndDraw() {
      // Define the custom filter function
      $.fn.dataTable.ext.search.pop(); // Clear any previous custom filters
      $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        if (currentFilter === "all") {
          return true; // Show all rows if filter is 'all'
        }
        // Compare the row's status with the current filter
        const rowStatus = claimingRequests[dataIndex].status;
        return rowStatus === currentFilter;
      });

      // Redraw the table to apply the filter
      dataTableInstance.draw();
    }

    function openReleaseModal(id) {
      const req = claimingRequests.find((r) => r.id === id);
      if (!req) return;

      document.getElementById("releaseTitle").textContent = req.songName;
      document.getElementById("releaseArtistHeader").textContent = req.artist;
      document.getElementById("releaseAlbumArtwork").src = req.artwork;
      releaseModalEl.querySelector(
        ".bg-image-blurred"
      ).style.backgroundImage = `url('${req.artwork}')`;
      document.getElementById("releaseStatusBadges").innerHTML = getStatusBadge(
        req.status
      );
      document.getElementById("modal-isrc").textContent = req.isrc || "N/A";
      document.getElementById("modal-matchingTime").textContent =
        req.matchingTime || "N/A";
      document.getElementById("modal-instagramAudio").innerHTML =
        req.instagramAudio
          ? `<a href="${req.instagramAudio}" target="_blank">${req.instagramAudio}</a>`
          : "N/A";
      document.getElementById("modal-reelMerge").innerHTML = req.reelMerge
        ? `<a href="${req.reelMerge}" target="_blank">${req.reelMerge}</a>`
        : "N/A";

      releaseModalEl.dataset.currentId = req.id;
      releaseModal.show();
    }

    function handleStatusUpdate(status) {
      const requestId = parseInt(releaseModalEl.dataset.currentId, 10);
      const request = claimingRequests.find((r) => r.id === requestId);
      if (request) {
        request.status = status;
        applyFiltersAndDraw(); // Redraw table with updated data
      }
      releaseModal.hide();
    }

    // --- EVENT LISTENERS ---
    document.getElementById("filterTabs").addEventListener("click", (e) => {
      if (e.target.matches("a.nav-link[data-filter]")) {
        e.preventDefault();
        currentFilter = e.target.dataset.filter;
        document
          .querySelectorAll("#filterTabs .nav-link")
          .forEach((tab) => tab.classList.remove("active"));
        e.target.classList.add("active");
        applyFiltersAndDraw(); // Apply the custom filter
      }
    });

    $("#datatable tbody").on("click", ".view-details-link", function (e) {
      e.preventDefault();
      openReleaseModal(parseInt($(this).data("id"), 10));
    });

    document
      .getElementById("approveBtn")
      .addEventListener("click", () => handleStatusUpdate("approved"));
    document
      .getElementById("rejectBtn")
      .addEventListener("click", () => handleStatusUpdate("rejected"));

    // --- INITIAL RENDER ---
    // Load all data into the table first
    dataTableInstance.clear().rows.add(claimingRequests).draw();
    // Then apply the initial filter (which is 'all')
    applyFiltersAndDraw();
  }
});
// merge-data-page js
// Add this entire new block to your app.js file
document.addEventListener("DOMContentLoaded", function () {
  const mergePageContainer = document.querySelector(".admin-merge-data-page");

  if (mergePageContainer) {
    // --- DATA ---
    let mergeRequests = [
      {
        id: 1,
        songName: "Cosmic Drift",
        artist: "Orion Sun",
        isrc: "US1232500004",
        instagramAudio: "https://instagram.com/audio/123",
        reelMerge: "https://instagram.com/reel/xyz",
        matchingTime: "00:15-00:45",
        status: "pending",
        artwork:
          "https://i.scdn.co/image/ab67616d0000b273e6f6a7f1b2b2b2b2b2b2b2b2",
      },
      {
        id: 2,
        songName: "Neon Tides",
        artist: "Cyber Lazer",
        isrc: "US1232500005",
        instagramAudio: "https://instagram.com/audio/456",
        reelMerge: "https://instagram.com/reel/abc",
        matchingTime: "00:30-01:00",
        status: "pending",
        artwork:
          "https://i.scdn.co/image/ab67616d0000b273f4f4f4f4f4f4f4f4f4f4f4f4",
      },
      {
        id: 3,
        songName: "Lost Signal",
        artist: "Ghost FM",
        isrc: "US1232500006",
        instagramAudio: "https://instagram.com/audio/789",
        reelMerge: "https://instagram.com/reel/def",
        matchingTime: "01:00-01:15",
        status: "rejected",
        artwork:
          "https://i.scdn.co/image/ab67616d0000b273a8a8a8a8a8a8a8a8a8a8a8a8",
      },
    ];
    let currentFilter = "all";

    // --- DOM ELEMENTS ---
    const table = $("#datatable");
    const releaseModalEl = document.getElementById("releaseModal");
    const releaseModal = new bootstrap.Modal(releaseModalEl);
    const newRequestModalEl = document.getElementById("newRequestModal");
    const newRequestModal = new bootstrap.Modal(newRequestModalEl);
    const newRequestForm = document.getElementById("newRequestForm");
    const exportCsvBtn = document.getElementById("exportCsvBtn");

    // --- HELPER FUNCTIONS ---
    const getStatusIcon = (status) => {
      const icons = {
        approved: "check-circle",
        pending: "clock",
        rejected: "x-circle",
      };
      const colors = {
        approved: "text-success",
        pending: "text-warning",
        rejected: "text-danger",
      };
      return `<i data-feather="${icons[status] || "help-circle"}" class="${colors[status] || "text-muted"
        }"></i>`;
    };
    const getStatusBadge = (status) => {
      const config = {
        approved: "status-approved",
        pending: "status-pending",
        rejected: "status-rejected",
      };
      return `<span class="badge status-badge ${config[status] || "bg-secondary"
        }">${status.toUpperCase()}</span>`;
    };
    const createLink = (url, iconClass) =>
      url
        ? `<a href="${url}" target="_blank" class="link-icon me-2"><i class="bi ${iconClass}"></i></a>`
        : "";

    // --- DATATABLE INITIALIZATION ---
    const dataTableInstance = table.DataTable({
      destroy: true,
      data: [],
      paging: true,
      searching: true,
      info: true,
      lengthChange: true,
      autoWidth: false,
      columns: [
        {
          data: "status",
          className: "text-center",
          orderable: false,
          render: (data) => getStatusIcon(data),
        },
        {
          data: null,
          orderable: true,
          render: (data, type, row) => `
                    <div class="release-title"><a href="#" class="view-details-link" data-id="${row.id}">${row.songName}</a></div>
                    <div class="text-muted small">${row.artist}</div>`,
        },
        { data: "isrc", defaultContent: "N/A" },
        {
          data: null,
          className: "text-center",
          orderable: false,
          render: (data, type, row) =>
            createLink(row.instagramAudio, "bi-music-note-beamed") +
            " " +
            createLink(row.reelMerge, "bi-camera-reels"),
        },
        { data: "matchingTime", defaultContent: "N/A" },
        {
          data: "status",
          className: "text-center",
          render: (data) =>
            `<div class="d-flex justify-content-center">${getStatusBadge(
              data
            )}</div>`,
        },
      ],
      drawCallback: () => {
        feather.replace();
      },
      language: {
        info: "Showing _START_ to _END_ of _TOTAL_ entries",
        infoEmpty: "Showing 0 to 0 of 0 entries",
        infoFiltered: "(filtered from _MAX_ total entries)",
        zeroRecords: "No matching requests found",
        emptyTable: "No requests available",
        search: "_INPUT_",
        searchPlaceholder: "Search records...",
      },
    });

    // --- RENDER & UPDATE FUNCTIONS ---
    function applyFiltersAndDraw() {
      $.fn.dataTable.ext.search.pop();
      $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        if (currentFilter === "all") return true;
        return mergeRequests[dataIndex].status === currentFilter;
      });
      dataTableInstance.draw();
    }

    function openReleaseModal(id) {
      const req = mergeRequests.find((r) => r.id === id);
      if (!req) return;

      document.getElementById("releaseTitle").textContent = req.songName;
      document.getElementById("releaseArtistHeader").textContent = req.artist;
      document.getElementById("releaseAlbumArtwork").src = req.artwork;
      releaseModalEl.querySelector(
        ".bg-image-blurred"
      ).style.backgroundImage = `url('${req.artwork}')`;
      document.getElementById("releaseStatusBadges").innerHTML = getStatusBadge(
        req.status
      );
      document.getElementById("modal-isrc").textContent = req.isrc || "N/A";
      document.getElementById("modal-matchingTime").textContent =
        req.matchingTime || "N/A";
      document.getElementById("modal-instagramAudio").innerHTML =
        req.instagramAudio
          ? `<a href="${req.instagramAudio}" target="_blank">${req.instagramAudio}</a>`
          : "N/A";
      document.getElementById("modal-reelMerge").innerHTML = req.reelMerge
        ? `<a href="${req.reelMerge}" target="_blank">${req.reelMerge}</a>`
        : "N/A";

      releaseModalEl.dataset.currentId = req.id;
      releaseModal.show();
    }

    function handleStatusUpdate(status) {
      const requestId = parseInt(releaseModalEl.dataset.currentId, 10);
      const request = mergeRequests.find((r) => r.id === requestId);
      if (request) {
        request.status = status;
        applyFiltersAndDraw();
      }
      releaseModal.hide();
    }

    // --- EVENT LISTENERS ---
    document.getElementById("filterTabs").addEventListener("click", (e) => {
      if (e.target.matches("a.nav-link[data-filter]")) {
        e.preventDefault();
        currentFilter = e.target.dataset.filter;
        document
          .querySelectorAll("#filterTabs .nav-link")
          .forEach((tab) => tab.classList.remove("active"));
        e.target.classList.add("active");
        applyFiltersAndDraw();
      }
    });

    $("#datatable tbody").on("click", ".view-details-link", function (e) {
      e.preventDefault();
      openReleaseModal(parseInt($(this).data("id"), 10));
    });

    document
      .getElementById("approveBtn")
      .addEventListener("click", () => handleStatusUpdate("approved"));
    document
      .getElementById("rejectBtn")
      .addEventListener("click", () => handleStatusUpdate("rejected"));

    newRequestForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const newRequest = {
        id: Date.now(),
        songName: document.getElementById("songNameInput").value,
        artist: document.getElementById("artistInput").value,
        isrc: document.getElementById("isrcInput").value,
        instagramAudio: document.getElementById("instagramAudioInput").value,
        reelMerge: document.getElementById("reelMergeInput").value,
        matchingTime: document.getElementById("matchingTimeInput").value,
        status: "pending",
        artwork: "https://via.placeholder.com/150/cccccc/FFFFFF?text=New",
      };
      mergeRequests.unshift(newRequest);
      dataTableInstance.clear().rows.add(mergeRequests).draw();
      newRequestForm.reset();
      newRequestModal.hide();
    });

    exportCsvBtn.addEventListener("click", () => {
      const headers = [
        "ID",
        "Song Name",
        "Artist",
        "ISRC",
        "Instagram Audio Link",
        "Reel Merge Link",
        "Matching Time",
        "Status",
      ];
      const rows = dataTableInstance
        .rows({ search: "applied" })
        .data()
        .toArray()
        .map((req) => [
          req.id,
          req.songName,
          req.artist,
          req.isrc,
          req.instagramAudio,
          req.reelMerge,
          req.matchingTime,
          req.status,
        ]);
      const escapeCsvValue = (val) =>
        `"${String(val || "").replace(/"/g, '""')}"`;
      let csvContent =
        "data:text/csv;charset=utf-8," +
        headers.join(",") +
        "\n" +
        rows.map((r) => r.map(escapeCsvValue).join(",")).join("\n");

      const link = document.createElement("a");
      link.setAttribute("href", encodeURI(csvContent));
      link.setAttribute("download", "merge-requests.csv");
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    });

    // --- INITIAL RENDER ---
    dataTableInstance.clear().rows.add(mergeRequests).draw();
    applyFiltersAndDraw();
  }
});

// relocation-data-page js

// Add this entire new block to your app.js file
document.addEventListener("DOMContentLoaded", function () {
  const relocationPageContainer = document.querySelector(
    ".admin-reloc-data-page"
  );

  if (relocationPageContainer) {
    // --- DATA ---
    let relocationRequests = [
      {
        id: 1,
        songName: "Cosmic Drift",
        artist: "Orion Sun",
        isrc: "US1232500004",
        instagramAudio: "https://instagram.com/audio/123",
        reelMerge: "https://instagram.com/reel/xyz",
        status: "pending",
        artwork:
          "https://i.scdn.co/image/ab67616d0000b273e6f6a7f1b2b2b2b2b2b2b2b2",
        matchingTime: "N/A",
      },
      {
        id: 2,
        songName: "Neon Tides",
        artist: "Cyber Lazer",
        isrc: "US1232500005",
        instagramAudio: "https://instagram.com/audio/456",
        reelMerge: "https://instagram.com/reel/abc",
        matchingTime: "00:30-01:00",
        status: "pending",
        artwork:
          "https://i.scdn.co/image/ab67616d0000b273f4f4f4f4f4f4f4f4f4f4f4f4",
      },
      {
        id: 3,
        songName: "Lost Signal",
        artist: "Ghost FM",
        isrc: "US1232500006",
        instagramAudio: "https://instagram.com/audio/789",
        reelMerge: "https://instagram.com/reel/def",
        matchingTime: "01:00-01:15",
        status: "rejected",
        artwork:
          "https://i.scdn.co/image/ab67616d0000b273a8a8a8a8a8a8a8a8a8a8a8a8",
      },
    ];
    let currentFilter = "all";

    // --- DOM ELEMENTS ---
    const table = $("#datatable");
    const releaseModalEl = document.getElementById("releaseModal");
    const releaseModal = new bootstrap.Modal(releaseModalEl);
    const newRequestModalEl = document.getElementById("newRequestModal");
    const newRequestModal = new bootstrap.Modal(newRequestModalEl);
    const newRequestForm = document.getElementById("newRequestForm");
    const exportCsvBtn = document.getElementById("exportCsvBtn");

    // --- HELPER FUNCTIONS ---
    const getStatusIcon = (status) => {
      const icons = {
        approved: "check-circle",
        pending: "clock",
        rejected: "x-circle",
      };
      const colors = {
        approved: "text-success",
        pending: "text-warning",
        rejected: "text-danger",
      };
      return `<i data-feather="${icons[status] || "help-circle"}" class="${colors[status] || "text-muted"
        }"></i>`;
    };
    const getStatusBadge = (status) => {
      const config = {
        approved: "status-approved",
        pending: "status-pending",
        rejected: "status-rejected",
      };
      return `<span class="badge status-badge ${config[status] || "bg-secondary"
        }">${status.toUpperCase()}</span>`;
    };
    const createLink = (url, iconClass) =>
      url
        ? `<a href="${url}" target="_blank" class="link-icon me-2"><i class="bi ${iconClass}"></i></a>`
        : "";

    // --- DATATABLE INITIALIZATION ---
    const dataTableInstance = table.DataTable({
      destroy: true,
      data: [],
      paging: true,
      searching: true,
      info: true,
      lengthChange: true,
      autoWidth: false,
      columns: [
        {
          data: "status",
          className: "text-center",
          orderable: false,
          render: (data) => getStatusIcon(data),
        },
        {
          data: null,
          orderable: true,
          render: (data, type, row) => `
                    <div class="release-title"><a href="#" class="view-details-link" data-id="${row.id}">${row.songName}</a></div>
                    <div class="text-muted small">${row.artist}</div>`,
        },
        { data: "isrc", defaultContent: "N/A" },
        {
          data: null,
          className: "text-center",
          orderable: false,
          render: (data, type, row) =>
            createLink(row.instagramAudio, "bi-music-note-beamed") +
            " " +
            createLink(row.reelMerge, "bi-camera-reels"),
        },
        {
          data: "status",
          className: "text-center",
          render: (data) =>
            `<div class="d-flex justify-content-center">${getStatusBadge(
              data
            )}</div>`,
        },
      ],
      drawCallback: () => {
        feather.replace();
      },
      language: {
        info: "Showing _START_ to _END_ of _TOTAL_ entries",
        infoEmpty: "Showing 0 to 0 of 0 entries",
        infoFiltered: "(filtered from _MAX_ total entries)",
        zeroRecords: "No matching requests found",
        emptyTable: "No requests available",
        search: "_INPUT_",
        searchPlaceholder: "Search records...",
      },
    });

    // --- RENDER & UPDATE FUNCTIONS ---
    function applyFiltersAndDraw() {
      $.fn.dataTable.ext.search.pop();
      $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        if (currentFilter === "all") return true;
        return relocationRequests[dataIndex].status === currentFilter;
      });
      dataTableInstance.draw();
    }

    function openReleaseModal(id) {
      const req = relocationRequests.find((r) => r.id === id);
      if (!req) return;
      // (Code to populate the modal remains the same as your other page)
      document.getElementById("releaseTitle").textContent = req.songName;
      document.getElementById("releaseArtistHeader").textContent = req.artist;
      document.getElementById("releaseAlbumArtwork").src = req.artwork;
      releaseModalEl.querySelector(
        ".bg-image-blurred"
      ).style.backgroundImage = `url('${req.artwork}')`;
      document.getElementById("releaseStatusBadges").innerHTML = getStatusBadge(
        req.status
      );
      document.getElementById("modal-isrc").textContent = req.isrc || "N/A";
      document.getElementById("modal-matchingTime").textContent =
        req.matchingTime || "N/A";
      document.getElementById("modal-instagramAudio").innerHTML =
        req.instagramAudio
          ? `<a href="${req.instagramAudio}" target="_blank">${req.instagramAudio}</a>`
          : "N/A";
      document.getElementById("modal-reelMerge").innerHTML = req.reelMerge
        ? `<a href="${req.reelMerge}" target="_blank">${req.reelMerge}</a>`
        : "N/A";
      releaseModalEl.dataset.currentId = req.id;
      releaseModal.show();
    }

    function handleStatusUpdate(status) {
      const requestId = parseInt(releaseModalEl.dataset.currentId, 10);
      const request = relocationRequests.find((r) => r.id === requestId);
      if (request) {
        request.status = status;
        applyFiltersAndDraw();
      }
      releaseModal.hide();
    }

    // --- EVENT LISTENERS ---
    document.getElementById("filterTabs").addEventListener("click", (e) => {
      if (e.target.matches("a.nav-link[data-filter]")) {
        e.preventDefault();
        currentFilter = e.target.dataset.filter;
        document
          .querySelectorAll("#filterTabs .nav-link")
          .forEach((tab) => tab.classList.remove("active"));
        e.target.classList.add("active");
        applyFiltersAndDraw();
      }
    });

    $("#datatable tbody").on("click", ".view-details-link", function (e) {
      e.preventDefault();
      openReleaseModal(parseInt($(this).data("id"), 10));
    });

    document
      .getElementById("approveBtn")
      .addEventListener("click", () => handleStatusUpdate("approved"));
    document
      .getElementById("rejectBtn")
      .addEventListener("click", () => handleStatusUpdate("rejected"));

    newRequestForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const newRequest = {
        id: Date.now(),
        songName: document.getElementById("songNameInput").value,
        artist: document.getElementById("artistInput").value,
        isrc: document.getElementById("isrcInput").value,
        instagramAudio: document.getElementById("instagramAudioInput").value,
        reelMerge: document.getElementById("reelMergeInput").value,
        matchingTime: document.getElementById("matchingTimeInput").value,
        status: "pending",
        artwork: "https://via.placeholder.com/150/cccccc/FFFFFF?text=New", // Default artwork
      };
      relocationRequests.unshift(newRequest); // Add to the start of the main data array
      dataTableInstance.clear().rows.add(relocationRequests).draw(); // Reload DataTable
      newRequestForm.reset();
      newRequestModal.hide();
    });

    exportCsvBtn.addEventListener("click", () => {
      const headers = [
        "ID",
        "Song Name",
        "Artist",
        "ISRC",
        "Instagram Audio Link",
        "Reel Merge Link",
        "Matching Time",
        "Status",
      ];
      const rows = dataTableInstance
        .rows({ search: "applied" })
        .data()
        .toArray()
        .map((req) => [
          req.id,
          req.songName,
          req.artist,
          req.isrc,
          req.instagramAudio,
          req.reelMerge,
          req.matchingTime,
          req.status,
        ]);
      const escapeCsvValue = (val) =>
        `"${String(val || "").replace(/"/g, '""')}"`;
      let csvContent =
        "data:text/csv;charset=utf-8," +
        headers.join(",") +
        "\n" +
        rows.map((r) => r.map(escapeCsvValue).join(",")).join("\n");

      const link = document.createElement("a");
      link.setAttribute("href", encodeURI(csvContent));
      link.setAttribute("download", "relocation-requests.csv"); // Correct filename
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    });

    // --- INITIAL RENDER ---
    dataTableInstance.clear().rows.add(relocationRequests).draw();
    applyFiltersAndDraw();
  }
});

// releases-page js

document.addEventListener("DOMContentLoaded", function () {
  const releasesPageContainer = document.querySelector(".admin-releases-page");

  if (releasesPageContainer) {
    let currentFilter = "all";
    const table = $("#datatableRelease");
    const filterTabs = document.querySelector(".nav-pills");

    function getStatusIcon(status) {
      const icons = {
        delivered: "bi-check-circle-fill text-success",
        approved: "bi-check-circle-fill text-success",
        rejected: "bi-x-circle-fill text-danger",
        review: "bi-hourglass-split text-warning",
        takedown: "bi-exclamation-circle-fill text-secondary",
      };
      return `<i class="bi ${
        icons[status] || "bi-question-circle-fill text-muted"
      }" title="${status}"></i>`;
    }

    function getStatusBadge(status) {
      const config = {
        delivered: { class: "status-delivered", text: "DELIVERED" },
        approved: { class: "status-approved", text: "APPROVED" },
        review: { class: "status-review", text: "IN REVIEW" },
        rejected: { class: "status-rejected", text: "REJECTED" },
        takedown: { class: "status-takedown-table", text: "TAKEDOWN" },
      };
      const statusInfo = config[status] || {
        class: "status-review",
        text: status.toUpperCase(),
      };
      return `<span class="badge status-badge ${statusInfo.class}">${statusInfo.text}</span>`;
    }

    const dataTableInstance = table.DataTable({
      destroy: true,
      ajax: {
        url: "/superadmin/releases", // adjust route as needed
        type: "GET",
        dataSrc: "data",
      },
      paging: true,
      searching: true,
      info: true,
      lengthChange: true,
      autoWidth: false,
      columns: [
        {
          data: "status",
          className: "text-center",
          orderable: false,
          render: (data) => getStatusIcon(data),
        },
        {
          data: null,
          render: (data, type, row) => `
                        <div>     
                            <div class="release-title">       
                                <a href="/superadmin/releases/edit/${row.id}" class="view-details-link" data-id="${row.id}">${row.title}</a>     
                            </div>     
                            <div class="release-artist">${row.artist}</div>   
                        </div>
                    `,
        },
        { data: "submittedDate", defaultContent: "N/A" },
        { data: "upc", defaultContent: "N/A" },
        { data: "isrc", defaultContent: "N/A" },
        { data: "status", render: (data) => getStatusBadge(data) },
      ],
      drawCallback: () => {
        feather.replace();
      },
    });

    // --- FILTERS ---
    function applyFiltersAndDraw() {
      $.fn.dataTable.ext.search.pop();
      $.fn.dataTable.ext.search.push(function (
        settings,
        data,
        dataIndex,
        rowData
      ) {
        if (currentFilter === "all") return true;
        return rowData.status === currentFilter;
      });
      dataTableInstance.draw();
    }

    // Handle filter tab clicks
    if (filterTabs) {
      filterTabs.addEventListener("click", (e) => {
        if (e.target.matches("a.nav-link[data-filter]")) {
          e.preventDefault();
          currentFilter = e.target.dataset.filter;
          document
            .querySelectorAll(".nav-pills .nav-link")
            .forEach((tab) => tab.classList.remove("active"));
          e.target.classList.add("active");
          applyFiltersAndDraw();
        }
      });
    }

    // Handle edit link clicks - Updated to navigate to edit page
    $("#datatableRelease tbody").on(
      "click",
      ".view-details-link",
      function (e) {
        // Let the default link behavior happen (navigate to edit page)
        // Remove e.preventDefault() to allow navigation
        const id = parseInt($(this).data("id"), 10);
        console.log("Navigating to edit page for ID:", id);

        // Optional: Add loading state or other UI feedback here
        $(this).addClass("loading");
      }
    );
  }

  // Handle form submission on the add-release page
  const releaseForm = document.getElementById("releaseForm");
  if (releaseForm) {
    releaseForm.addEventListener("submit", function (e) {
      // Add any form validation or loading states here
      const submitBtn = this.querySelector('button[type="submit"]');
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML =
          '<i class="spinner-border spinner-border-sm me-1"></i> Processing...';
      }
    });
  }
});

// artists-page js
$(document).ready(function () {
  let table = $("#artistTable").DataTable({
    destroy: true,
    ajax: "/superadmin/api/artists", // backend route returning JSON
    columns: [
      {
        data: "id",
        render: function (data) {
          return `<input type="checkbox" class="form-check-input artist-checkbox" value="${data}">`;
        },
        orderable: false,
      },
      {
        data: null,
        render: function (row) {
          return `
                        <div class="artist-profile d-flex align-items-center">
                            <img src="${row.profile_image}" alt="${row.name}" class="artist-image me-2">
                            <div class="artist-name fw-bold">${row.name}</div>
                        </div>
                    `;
        },
      },
      {
        data: "release_count",
        className: "text-center",
        render: function (d) {
          return `<span class="releases-badge badge">${d} releases</span>`;
        },
      },
    ],
    paging: true, // enable pagination
    searching: true, // enable search box
    ordering: true, // enable sorting
    responsive: true, // mobile friendly
    autoWidth: false, // keeps column width consistent
    drawCallback: function () {
      // Re-bind checkbox events or icon replacements after redraw
      $(".artist-checkbox")
        .off("change")
        .on("change", function () {
          let selected = $(".artist-checkbox:checked").length;
          if (selected > 0) {
            $("#deleteSelectedBtn").show();
          } else {
            $("#deleteSelectedBtn").hide();
          }
        });
    },
  });

  // "Select all" checkbox
  $("#selectAll").on("click", function () {
    let checked = this.checked;
    $(".artist-checkbox").prop("checked", checked).trigger("change");
  });
});

$(document).ready(function () {
  // Show alert helper
  function showArtistAlert(type, message) {
    let alertHtml = `
      <div class="alert alert-${type} alert-dismissible fade show" role="alert">
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>`;
    $("#artistAlertBox").html(alertHtml);
  }

  // Remove previous submit handler before adding new one
  $(document).off("submit", "#createArtistForm");
  $(document).on("submit", "#createArtistForm", function (e) {
    e.preventDefault();

    let formData = new FormData(this); // needed for file upload

    $.ajax({
      url: $(this).attr("action"),
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (res) {
        if (res.success) {
          showArtistAlert("success", res.message);
          $("#createArtistForm")[0].reset();
          $("#imagePreview").hide();
          $("#createArtistModal").modal("hide"); // close modal on success
        } else if (res.errors) {
          let errorMessages = Object.values(res.errors).join("<br>");
          showArtistAlert("danger", errorMessages);
        }
      },
      error: function (xhr) {
        let msg = "Something went wrong!";
        if (xhr.responseJSON && xhr.responseJSON.message) {
          msg = xhr.responseJSON.message;
        }
        showArtistAlert("danger", msg);
      },
    });
  });

  // Image preview (bind safely once)
  $(document).off("change", "#imageInput");
  $(document).on("change", "#imageInput", function () {
    const [file] = this.files;
    if (file) {
      $("#imagePreview").attr("src", URL.createObjectURL(file)).show();
    }
  });
});

// labels-page js
$(document).ready(function () {
  let table = $("#labelTable").DataTable({
    destroy: true,
    ajax: "/superadmin/api/labels", // your controller endpoint
    columns: [
      {
        data: "id",
        render: function (data) {
          return `<input type="checkbox" class="form-check-input label-checkbox" value="${data}">`;
        },
        orderable: false,
      },
      {
        data: null,
        render: function (data) {
          return `
                        <div class="label-profile">
                            <img src="${data.logo}" alt="${data.name}" class="label-image">
                            <div>
                                <div class="label-name">${data.name}</div>
                            </div>
                        </div>
                    `;
        },
      },
      {
        data: "release_count",
        className: "text-center",
        render: function (data) {
          return `<span class="releases-badge">${data} releases</span>`;
        },
      },
    ],
  });

  // Handle "Select All"
  $("#selectAll").on("change", function () {
    const checked = this.checked;
    $(".label-checkbox").prop("checked", checked);
  });

  // Expose reload for outside use
  window.reloadLabels = function () {
    table.ajax.reload(null, false); // false keeps current pagination
  };
});

$(document).ready(function () {
  // show alert helper
  function showLabelAlert(type, message) {
    let alertHtml = `
      <div class="alert alert-${type} alert-dismissible fade show" role="alert">
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>`;
    $("#labelAlertBox").html(alertHtml);
  }

  // prevent duplicate bindings
  $(document).off("submit", 'form[action*="create-label"]');
  $(document).on("submit", 'form[action*="create-label"]', function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
      url: $(this).attr("action"),
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (res) {
        if (res.success) {
          showLabelAlert("success", res.message);
          $('form[action*="create-label"]')[0].reset();
          $("#imagePreview").hide();
          $("#createlabelModal").modal("hide"); // optional: auto-close modal
        } else if (res.errors) {
          let errorMessages = Object.values(res.errors).join("<br>");
          showLabelAlert("danger", errorMessages);
        }
      },
      error: function (xhr) {
        let msg = "Something went wrong!";
        if (xhr.responseJSON && xhr.responseJSON.message) {
          msg = xhr.responseJSON.message;
        }
        showLabelAlert("danger", msg);
      },
    });
  });

  // image preview
  $(document).off("change", "#imageInput");
  $(document).on("change", "#imageInput", function () {
    const [file] = this.files;
    if (file) {
      $("#imagePreview").attr("src", URL.createObjectURL(file)).show();
    }
  });
});

// accounts-page js

document.addEventListener("DOMContentLoaded", function () {
  $("#claimingTable").DataTable({
    destroy: true,
    processing: true,
    serverSide: false,
    ajax: "/superadmin/api/accounts",
    columns: [
      {
        data: "status",
        render: function (data) {
          if (data === "Active") {
            return '<i data-feather="check-circle" class="text-success"></i>';
          } else {
            return '<i data-feather="x-circle" class="text-danger"></i>';
          }
        },
        className: "text-center",
      },
      { data: "company_name" },
      { data: "primary_label_name" },
      { data: "agreement_start_date" },
      { data: "agreement_end_date" },
      {
        data: "status",
        render: function (data) {
          let badge =
            data === "Active"
              ? '<span class="badge bg-success">Active</span>'
              : '<span class="badge bg-danger">Inactive</span>';
          return badge;
        },
      },
    ],
    drawCallback: function () {
      feather.replace(); // re-render feather icons
    },
    paging: true,
    searching: true,
    ordering: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search accounts...",
    },
  });
});

$(document).ready(function () {
  $("#claimingRequestForm").on("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
      url: $(this).attr("action"),
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.status === "error") {
          let errorHtml = '<div class="alert alert-danger">';
          if (response.errors) {
            $.each(response.errors, function (key, error) {
              errorHtml += `<div>${error}</div>`;
            });
          } else if (response.message) {
            errorHtml += `<div>${response.message}</div>`;
          }
          errorHtml += "</div>";
          $("#labelAlertBox").html(errorHtml);
        } else {
          $("#labelAlertBox").html(
            '<div class="alert alert-success">User registered successfully.</div>'
          );
          $("#claimingRequestForm")[0].reset();
          $("#claimingRequestModal").modal("hide");
        }
      },
      error: function () {
        $("#labelAlertBox").html(
          '<div class="alert alert-danger">Something went wrong. Try again.</div>'
        );
      },
    });
  });
});

// claiming-req js
document.addEventListener("DOMContentLoaded", function () {
  // This is the unique container for your page
  const claimReqPageContainer = document.querySelector(".admin-claim-req-page");

  // By wrapping all the code in this 'if' block, it will ONLY run on the claiming request page.
  if (claimReqPageContainer) {
    // --- DATA ---
    let claimingRequests = [
      {
        id: 1,
        songName: "Cosmic Drift",
        artistName: "Orion Sun",
        isrc: "US1232500004",
        instagram: "https://instagram.com/orionsun",
        facebook: "https://facebook.com/orionsun",
        status: "Pending",
      },
      {
        id: 2,
        songName: "Neon Tides",
        artistName: "Cyber Lazer",
        isrc: "US1232500005",
        instagram: "https://instagram.com/cyberlazer",
        facebook: "",
        status: "Pending",
      },
      {
        id: 3,
        songName: "Lost Signal",
        artistName: "Ghost FM",
        isrc: "US1232500006",
        instagram: "",
        facebook: "https://facebook.com/ghostfm",
        status: "Rejected",
      },
    ];

    // --- DOM ELEMENTS ---
    const tableBody = document.getElementById("tableBody");
    const exportCsvBtn = document.getElementById("exportCsvBtn");
    const newClaimForm = document.querySelector("#claimingRequestModal form");
    const newClaimModal = new bootstrap.Modal(
      document.getElementById("claimingRequestModal")
    );

    // --- RENDER & UPDATE FUNCTIONS ---
    function renderTable(data) {
      if (!data || data.length === 0) {
        // FIXED: colspan changed from 6 to 5 to match the table headers
        tableBody.innerHTML = `
                    <tr>
                        <td colspan="5" class="empty-state">
                            <i data-feather="inbox"></i>
                            <div>
                                <h5 class="mb-2">No Claiming Requests found</h5>
                                <p class="mb-0">Click 'New Claiming Request' to get started.</p>
                            </div>
                        </td>
                    </tr>`;
      } else {
        tableBody.innerHTML = data
          .map(
            (request) => `
                    <tr>
                        <td class="text-center align-middle">${getStatusIcon(
              request.status
            )}</td>
                        <td class="align-middle">
                            <div>
                                <div class="release-title">${request.songName
              }</div>
                                <div class="release-artist text-muted small">${request.artistName
              }</div>
                            </div>
                        </td>
                        <td class="align-middle">${request.isrc || "N/A"}</td>
                        <td class="align-middle">
                            ${request.instagram
                ? `<a href="${request.instagram}" target="_blank" class="social-link me-2 fs-5"><i class="bi bi-instagram"></i></a>`
                : ""
              }
                            ${request.facebook
                ? `<a href="${request.facebook}" target="_blank" class="social-link fs-5"><i class="bi bi-facebook"></i></a>`
                : ""
              }
                        </td>
                        <td class="align-middle">${getStatusBadge(
                request.status
              )}</td>
                    </tr>
                `
          )
          .join("");
      }
      feather.replace();
    }

    function getStatusIcon(status) {
      const icons = {
        Approved: "check-circle",
        Pending: "clock",
        Rejected: "x-circle",
      };
      const colors = {
        Approved: "text-success",
        Pending: "text-warning",
        Rejected: "text-danger",
      };
      return `<i data-feather="${icons[status] || "help-circle"}" class="${colors[status] || "text-muted"
        }"></i>`;
    }

    function getStatusBadge(status) {
      const badgeClasses = {
        Approved: "success",
        Pending: "warning",
        Rejected: "danger",
      };
      return `<span class="badge bg-${badgeClasses[status] || "secondary"
        }">${status}</span>`;
    }

    // --- EVENT LISTENERS ---

    // ADDED: Logic to handle new claim form submission
    newClaimForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const newRequest = {
        id: Date.now(),
        artistName: document.getElementById("artistName").value,
        songName: document.getElementById("songName").value,
        isrc: document.getElementById("upc").value, // Matches your HTML id="upc"
        instagram: document.getElementById("instagramLink").value,
        facebook: document.getElementById("facebookLink").value,
        status: "Pending", // New requests are always pending
      };

      claimingRequests.unshift(newRequest); // Add to the beginning of the array
      renderTable(claimingRequests); // Re-render the table
      newClaimForm.reset(); // Clear the form
      newClaimModal.hide(); // Hide the modal
    });

    // ADDED: Logic for CSV export
    exportCsvBtn.addEventListener("click", function () {
      const headers = [
        "ID",
        "Song Name",
        "Artist Name",
        "ISRC",
        "Instagram",
        "Facebook",
        "Status",
      ];
      const rows = claimingRequests.map((req) => [
        req.id,
        req.songName,
        req.artistName,
        req.isrc,
        req.instagram,
        req.facebook,
        req.status,
      ]);

      let csvContent =
        "data:text/csv;charset=utf-8," +
        headers.join(",") +
        "\n" +
        rows.map((e) => e.join(",")).join("\n");

      const link = document.createElement("a");
      link.setAttribute("href", encodeURI(csvContent));
      link.setAttribute("download", "claiming-requests.csv");
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    });

    // --- INITIAL RENDER ---
    renderTable(claimingRequests);
  }
});

// relocation-request js

document.addEventListener("DOMContentLoaded", function () {
  // This is the unique container for your relocation page
  const relocReqPageContainer = document.querySelector(".admin-reloc-req-page");

  // This ensures the code ONLY runs on the relocation request page
  if (relocReqPageContainer) {
    // --- DATA ---
    const relocationRequests = [
      {
        id: 1,
        songName: "Cosmic Drift",
        artistName: "Orion Sun",
        isrc: "US1232500004",
        instagram: "https://instagram.com/orionsun",
        facebook: "https://facebook.com/orionsun",
        status: "Done",
      },
      {
        id: 2,
        songName: "Neon Tides",
        artistName: "Cyber Lazer",
        isrc: "US1232500005",
        instagram: "https://instagram.com/cyberlazer",
        facebook: "",
        status: "Pending",
      },
      {
        id: 3,
        songName: "Lost Signal",
        artistName: "Ghost FM",
        isrc: "US1232500006",
        instagram: "",
        facebook: "https://facebook.com/ghostfm",
        status: "Rejected",
      },
    ];

    // --- DOM ELEMENTS ---
    const tableBody = document.getElementById("relocationTableBody"); // FIXED: Using unique ID
    const exportCsvBtn = document.getElementById("exportCsvBtn");
    const newRelocForm = document.querySelector("#relocationRequestModal form");
    const newRelocModal = new bootstrap.Modal(
      document.getElementById("relocationRequestModal")
    );

    // --- RENDER & UPDATE FUNCTIONS ---
    function renderTable(data) {
      if (!data || data.length === 0) {
        // FIXED: colspan changed from 6 to 5
        tableBody.innerHTML = `
                    <tr>
                        <td colspan="5" class="empty-state">
                            <i data-feather="inbox"></i>
                            <div>
                                <h5 class="mb-2">No relocation requests found</h5>
                                <p class="mb-0">Click 'New Relocation Request' to get started.</p>
                            </div>
                        </td>
                    </tr>`;
      } else {
        tableBody.innerHTML = data
          .map(
            (request) => `
                    <tr>
                        <td class="text-center align-middle">${getStatusIcon(
              request.status
            )}</td>
                        <td class="align-middle">
                            <div>
                                <div class="release-title">${request.songName
              }</div>
                                <div class="release-artist text-muted small">${request.artistName
              }</div>
                            </div>
                        </td>
                        <td class="align-middle">${request.isrc || "N/A"}</td>
                        <td class="align-middle">
                            ${request.instagram
                ? `<a href="${request.instagram}" target="_blank" class="social-link me-2 fs-5"><i class="bi bi-instagram"></i></a>`
                : ""
              }
                            ${request.facebook
                ? `<a href="${request.facebook}" target="_blank" class="social-link fs-5"><i class="bi bi-facebook"></i></a>`
                : ""
              }
                        </td>
                        <td class="align-middle">${getStatusBadge(
                request.status
              )}</td>
                    </tr>
                `
          )
          .join("");
      }
      feather.replace();
    }

    function getStatusIcon(status) {
      const icons = {
        Done: "check-circle",
        Pending: "clock",
        Rejected: "x-circle",
      };
      const colors = {
        Done: "text-success",
        Pending: "text-warning",
        Rejected: "text-danger",
      };
      return `<i data-feather="${icons[status] || "help-circle"}" class="${colors[status] || "text-muted"
        }"></i>`;
    }

    function getStatusBadge(status) {
      const badgeClasses = {
        Done: "success",
        Pending: "warning",
        Rejected: "danger",
      };
      return `<span class="badge bg-${badgeClasses[status] || "secondary"
        }">${status}</span>`;
    }

    // --- EVENT LISTENERS ---

    // ADDED: Form submission logic
    newRelocForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const newRequest = {
        id: Date.now(),
        artistName: this.querySelector("#artistName").value,
        songName: this.querySelector("#songName").value,
        isrc: this.querySelector("#ISRC").value,
        instagram: this.querySelector("#instagramLink").value,
        facebook: this.querySelector("#facebookLink").value,
        status: "Pending",
      };
      relocationRequests.unshift(newRequest);
      renderTable(relocationRequests);
      newRelocForm.reset();
      newRelocModal.hide();
    });

    // ADDED: CSV export logic
    exportCsvBtn.addEventListener("click", function () {
      const headers = [
        "ID",
        "Song Name",
        "Artist Name",
        "ISRC",
        "Instagram",
        "Facebook",
        "Status",
      ];
      const rows = relocationRequests.map((req) => [
        req.id,
        req.songName,
        req.artistName,
        req.isrc,
        req.instagram,
        req.facebook,
        req.status,
      ]);
      let csvContent =
        "data:text/csv;charset=utf-8," +
        headers.join(",") +
        "\n" +
        rows.map((e) => e.join(",")).join("\n");

      const link = document.createElement("a");
      link.setAttribute("href", encodeURI(csvContent));
      link.setAttribute("download", "relocation-requests.csv");
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    });

    // --- INITIAL RENDER ---
    renderTable(relocationRequests);
  }
});

// merge-request js

document.addEventListener("DOMContentLoaded", function () {
  // This is the unique container for your Claim/Merge page
  const pageContainer = document.querySelector(".admin-claim-merge-req-page");

  // This ensures the code ONLY runs on the Claim/Merge page
  if (pageContainer) {
    // --- DATA ---
    let claimingRequests = [
      {
        id: 1,
        songName: "Cosmic Drift",
        isrc: "US1232500004",
        instagramAudio: "https://instagram.com/audio/123",
        reelMerge: "https://instagram.com/reel/xyz",
        matchingTime: "00:15-00:45",
        status: "Approved",
      },
      {
        id: 2,
        songName: "Neon Tides",
        isrc: "US1232500005",
        instagramAudio: "https://instagram.com/audio/456",
        reelMerge: "https://instagram.com/reel/abc",
        matchingTime: "00:30-01:00",
        status: "Pending",
      },
      {
        id: 3,
        songName: "Lost Signal",
        isrc: "US1232500006",
        instagramAudio: "https://instagram.com/audio/789",
        reelMerge: "https://instagram.com/reel/def",
        matchingTime: "01:00-01:15",
        status: "Rejected",
      },
    ];

    // --- DOM ELEMENTS ---
    const tableBody = document.getElementById("claimMergeTableBody"); // FIXED: Using unique ID
    const paginationText = document.getElementById("pagination-text");
    const claimForm = document.getElementById("newClaimForm");
    const newClaimModal = new bootstrap.Modal(
      document.getElementById("newClaimRequestModal")
    );
    const exportCsvBtn = document.getElementById("exportCsvBtn");

    // --- HELPER FUNCTIONS ---
    function getStatusIcon(status) {
      const icons = {
        Approved: "check-circle",
        Pending: "clock",
        Rejected: "x-circle",
      };
      const colors = {
        Approved: "text-success",
        Pending: "text-warning",
        Rejected: "text-danger",
      };
      return `<i data-feather="${icons[status] || "help-circle"}" class="${colors[status] || "text-muted"
        }"></i>`;
    }

    function getStatusBadge(status) {
      const badgeClasses = {
        Approved: "success",
        Pending: "warning",
        Rejected: "danger",
      };
      const textClass = status === "Pending" ? "text-dark" : "";
      return `<span class="badge bg-${badgeClasses[status] || "secondary"
        } ${textClass}">${status}</span>`;
    }

    function exportToCsv(filename, data) {
      if (!data || data.length === 0) {
        alert("No data to export.");
        return;
      }
      const headers = [
        "ID",
        "Song Name",
        "ISRC",
        "Instagram Audio Link",
        "Reel Merge Link",
        "Matching Time",
        "Status",
      ];
      const rows = data.map((req) => [
        req.id,
        req.songName,
        req.isrc,
        req.instagramAudio,
        req.reelMerge,
        req.matchingTime,
        req.status,
      ]);
      const escapeCsvValue = (value) => {
        const stringValue = String(value || "");
        if (
          stringValue.includes(",") ||
          stringValue.includes('"') ||
          stringValue.includes("\n")
        ) {
          return `"${stringValue.replace(/"/g, '""')}"`;
        }
        return stringValue;
      };
      let csvContent =
        "data:text/csv;charset=utf-8," +
        headers.join(",") +
        "\n" +
        rows.map((r) => r.map(escapeCsvValue).join(",")).join("\n");

      const encodedUri = encodeURI(csvContent);
      const link = document.createElement("a");
      link.setAttribute("href", encodedUri);
      link.setAttribute("download", filename);
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }

    // --- RENDER & UPDATE FUNCTIONS ---
    function renderTable(data) {
      if (!data || data.length === 0) {
        // FIXED: colspan changed from 8 to 7
        tableBody.innerHTML = `
                    <tr>
                        <td colspan="7" class="empty-state">
                            <i data-feather="inbox"></i>
                            <div>
                                <h5 class="mb-2">No Claiming Requests Found</h5>
                                <p class="mb-0">Click 'New Claiming Request' to get started.</p>
                            </div>
                        </td>
                    </tr>`;
      } else {
        tableBody.innerHTML = data
          .map(
            (request) => `
                    <tr>
                        <td class="text-center">${getStatusIcon(
              request.status
            )}</td>
                        <td>
                            <div class="release-title">
                                <a href="#">${request.songName}</a>
                            </div>
                        </td>
                        <td>${request.isrc || "N/A"}</td>
                        <td class="text-center">
                            ${request.instagramAudio
                ? `<a href="${request.instagramAudio}" target="_blank" class="link-icon" title="Instagram Audio"><i class="bi bi-music-note-beamed"></i></a>`
                : "N/A"
              }
                        </td>
                        <td class="text-center">
                            ${request.reelMerge
                ? `<a href="${request.reelMerge}" target="_blank" class="link-icon" title="Reel Merge"><i class="bi bi-camera-reels"></i></a>`
                : "N/A"
              }
                        </td>
                        <td>${request.matchingTime || "N/A"}</td>
                        <td>${getStatusBadge(request.status)}</td>
                    </tr>
                `
          )
          .join("");
      }
      feather.replace();
      updatePaginationText(data.length, data.length);
    }

    function updatePaginationText(end, total) {
      paginationText.innerHTML = `Showing <strong>1</strong> to <strong>${end}</strong> of <strong>${total}</strong> entries`;
    }

    // --- EVENT LISTENERS ---
    claimForm.addEventListener("submit", function (event) {
      event.preventDefault();
      const newRequest = {
        id: Date.now(),
        songName: document.getElementById("songName").value,
        isrc: document.getElementById("isrc").value,
        instagramAudio: document.getElementById("instagramAudio").value,
        reelMerge: document.getElementById("reelMerge").value,
        matchingTime: document.getElementById("matchingTime").value,
        status: "Pending",
      };
      claimingRequests.push(newRequest);
      renderTable(claimingRequests);
      claimForm.reset();
      newClaimModal.hide();
    });

    // ADDED: Event listener for the export button
    exportCsvBtn.addEventListener("click", function () {
      exportToCsv("claim-merge-requests.csv", claimingRequests);
    });

    // --- INITIAL RENDER ---
    renderTable(claimingRequests);
  }
});

// youtube js
document.addEventListener("DOMContentLoaded", function () {
  // This is the unique container for your YouTube page
  const youtubePageContainer = document.querySelector(".admin-youtube-page");

  // This ensures the code ONLY runs on the YouTube page
  if (youtubePageContainer) {
    // --- DATA ---
    const conflictRequests = [
      {
        id: 1,
        category: "Ownership conflict",
        assetTitle: "Cosmic Drift",
        artist: "Astro Beats",
        assetId: "90736897913",
        upc: "198009123456",
        isrc: "USAT22312345",
        otherParty: "The Orchard",
        dailyViews: "79K",
        expiry: "2 days",
        status: "Action Required",
        albumCoverUrl: "https://placehold.co/80x80/3498db/ffffff?text=C",
      },
      {
        id: 2,
        category: "Policy",
        assetTitle: "Ocean Tides",
        artist: "Deep Wave",
        assetId: "3478239381",
        upc: "198009654321",
        isrc: "USAT22354321",
        otherParty: "Believe",
        dailyViews: "3K",
        expiry: "-",
        status: "Resolved",
        albumCoverUrl: "https://placehold.co/80x80/1abc9c/ffffff?text=O",
      },
      {
        id: 3,
        category: "Ownership conflict",
        assetTitle: "City Lights",
        artist: "Urban Glow",
        assetId: "3478239381",
        upc: "198009789012",
        isrc: "USAT22398765",
        otherParty: "CD Baby",
        dailyViews: "1.2K",
        expiry: "15 days",
        status: "In Review",
        albumCoverUrl: "https://placehold.co/80x80/9b59b6/ffffff?text=C",
      },
      {
        id: 4,
        category: "Metadata Error",
        assetTitle: "Desert Mirage",
        artist: "Sahara Echo",
        assetId: "89321756430",
        upc: "198001112233",
        isrc: "USAT22445566",
        otherParty: "TuneCore",
        dailyViews: "58K",
        expiry: "5 days",
        status: "Action Required",
        albumCoverUrl: "https://placehold.co/80x80/e67e22/ffffff?text=D",
      },
      {
        id: 5,
        category: "Ownership conflict",
        assetTitle: "Electric Horizon",
        artist: "Volt Squad",
        assetId: "98574623109",
        upc: "198002244466",
        isrc: "USAT22449900",
        otherParty: "The Orchard",
        dailyViews: "12K",
        expiry: "7 days",
        status: "In Review",
        albumCoverUrl: "https://placehold.co/80x80/f39c12/ffffff?text=E",
      },
    ];

    const territoriesByRegion = {
      Africa: [
        { name: "Algeria", code: "DZ" },
        { name: "Angola", code: "AO" },
        { name: "Benin", code: "BJ" },
        { name: "Botswana", code: "BW" },
        { name: "Burkina Faso", code: "BF" },
        { name: "Burundi", code: "BI" },
        { name: "Cabo Verde", code: "CV" },
        { name: "Cameroon", code: "CM" },
        { name: "Central African Republic", code: "CF" },
        { name: "Chad", code: "TD" },
        { name: "Comoros", code: "KM" },
        { name: "Congo", code: "CG" },
        { name: "Congo (DRC)", code: "CD" },
        { name: "Côte d'Ivoire", code: "CI" },
        { name: "Djibouti", code: "DJ" },
        { name: "Egypt", code: "EG" },
        { name: "Equatorial Guinea", code: "GQ" },
        { name: "Eritrea", code: "ER" },
        { name: "Eswatini", code: "SZ" },
        { name: "Ethiopia", code: "ET" },
        { name: "Gabon", code: "GA" },
        { name: "Gambia", code: "GM" },
        { name: "Ghana", code: "GH" },
        { name: "Guinea", code: "GN" },
        { name: "Guinea-Bissau", code: "GW" },
        { name: "Kenya", code: "KE" },
        { name: "Lesotho", code: "LS" },
        { name: "Liberia", code: "LR" },
        { name: "Libya", code: "LY" },
        { name: "Madagascar", code: "MG" },
        { name: "Malawi", code: "MW" },
        { name: "Mali", code: "ML" },
        { name: "Mauritania", code: "MR" },
        { name: "Mauritius", code: "MU" },
        { name: "Mayotte", code: "YT" },
        { name: "Morocco", code: "MA" },
        { name: "Mozambique", code: "MZ" },
        { name: "Namibia", code: "NA" },
        { name: "Niger", code: "NE" },
        { name: "Nigeria", code: "NG" },
        { name: "Réunion", code: "RE" },
        { name: "Rwanda", code: "RW" },
        { name: "Saint Helena", code: "SH" },
        { name: "Sao Tome and Principe", code: "ST" },
        { name: "Senegal", code: "SN" },
        { name: "Seychelles", code: "SC" },
        { name: "Sierra Leone", code: "SL" },
        { name: "Somalia", code: "SO" },
        { name: "South Africa", code: "ZA" },
        { name: "South Sudan", code: "SS" },
        { name: "Sudan", code: "SD" },
        { name: "Tanzania", code: "TZ" },
        { name: "Togo", code: "TG" },
        { name: "Tunisia", code: "TN" },
        { name: "Uganda", code: "UG" },
        { name: "Zambia", code: "ZM" },
        { name: "Zimbabwe", code: "ZW" },
      ],
      Antarctica: [
        { name: "Antarctica", code: "AQ" },
        { name: "French Southern Territories", code: "TF" },
        { name: "South Georgia and the South Sandwich Islands", code: "GS" },
      ],
      Asia: [
        { name: "Afghanistan", code: "AF" },
        { name: "Armenia", code: "AM" },
        { name: "Azerbaijan", code: "AZ" },
        { name: "Bahrain", code: "BH" },
        { name: "Bangladesh", code: "BD" },
        { name: "Bhutan", code: "BT" },
        { name: "British Indian Ocean Territory", code: "IO" },
        { name: "Brunei", code: "BN" },
        { name: "Cambodia", code: "KH" },
        { name: "China", code: "CN" },
        { name: "Cyprus", code: "CY" },
        { name: "Georgia", code: "GE" },
        { name: "Hong Kong", code: "HK" },
        { name: "India", code: "IN" },
        { name: "Indonesia", code: "ID" },
        { name: "Iran", code: "IR" },
        { name: "Iraq", code: "IQ" },
        { name: "Israel", code: "IL" },
        { name: "Japan", code: "JP" },
        { name: "Jordan", code: "JO" },
        { name: "Kazakhstan", code: "KZ" },
        { name: "Kuwait", code: "KW" },
        { name: "Kyrgyzstan", code: "KG" },
        { name: "Laos", code: "LA" },
        { name: "Lebanon", code: "LB" },
        { name: "Macao", code: "MO" },
        { name: "Malaysia", code: "MY" },
        { name: "Maldives", code: "MV" },
        { name: "Mongolia", code: "MN" },
        { name: "Myanmar", code: "MM" },
        { name: "Nepal", code: "NP" },
        { name: "North Korea", code: "KP" },
        { name: "Oman", code: "OM" },
        { name: "Pakistan", code: "PK" },
        { name: "Palestine", code: "PS" },
        { name: "Philippines", code: "PH" },
        { name: "Qatar", code: "QA" },
        { name: "Saudi Arabia", code: "SA" },
        { name: "Singapore", code: "SG" },
        { name: "South Korea", code: "KR" },
        { name: "Sri Lanka", code: "LK" },
        { name: "Syria", code: "SY" },
        { name: "Taiwan", code: "TW" },
        { name: "Tajikistan", code: "TJ" },
        { name: "Thailand", code: "TH" },
        { name: "Timor-Leste", code: "TL" },
        { name: "Turkey", code: "TR" },
        { name: "Turkmenistan", code: "TM" },
        { name: "United Arab Emirates", code: "AE" },
        { name: "Uzbekistan", code: "UZ" },
        { name: "Vietnam", code: "VN" },
        { name: "Yemen", code: "YE" },
      ],
      Europe: [
        { name: "Åland Islands", code: "AX" },
        { name: "Albania", code: "AL" },
        { name: "Andorra", code: "AD" },
        { name: "Austria", code: "AT" },
        { name: "Belarus", code: "BY" },
        { name: "Belgium", code: "BE" },
        { name: "Bosnia and Herzegovina", code: "BA" },
        { name: "Bulgaria", code: "BG" },
        { name: "Croatia", code: "HR" },
        { name: "Czechia", code: "CZ" },
        { name: "Denmark", code: "DK" },
        { name: "Estonia", code: "EE" },
        { name: "Faroe Islands", code: "FO" },
        { name: "Finland", code: "FI" },
        { name: "France", code: "FR" },
        { name: "Germany", code: "DE" },
        { name: "Gibraltar", code: "GI" },
        { name: "Greece", code: "GR" },
        { name: "Guernsey", code: "GG" },
        { name: "Holy See", code: "VA" },
        { name: "Hungary", code: "HU" },
        { name: "Iceland", code: "IS" },
        { name: "Ireland", code: "IE" },
        { name: "Isle of Man", code: "IM" },
        { name: "Italy", code: "IT" },
        { name: "Jersey", code: "JE" },
        { name: "Latvia", code: "LV" },
        { name: "Liechtenstein", code: "LI" },
        { name: "Lithuania", code: "LT" },
        { name: "Luxembourg", code: "LU" },
        { name: "Malta", code: "MT" },
        { name: "Moldova", code: "MD" },
        { name: "Monaco", code: "MC" },
        { name: "Montenegro", code: "ME" },
        { name: "Netherlands", code: "NL" },
        { name: "North Macedonia", code: "MK" },
        { name: "Norway", code: "NO" },
        { name: "Poland", code: "PL" },
        { name: "Portugal", code: "PT" },
        { name: "Romania", code: "RO" },
        { name: "Russia", code: "RU" },
        { name: "San Marino", code: "SM" },
        { name: "Serbia", code: "RS" },
        { name: "Slovakia", code: "SK" },
        { name: "Slovenia", code: "SI" },
        { name: "Spain", code: "ES" },
        { name: "Svalbard and Jan Mayen", code: "SJ" },
        { name: "Sweden", code: "SE" },
        { name: "Switzerland", code: "CH" },
        { name: "Ukraine", code: "UA" },
        { name: "United Kingdom", code: "GB" },
      ],
      "North America": [
        { name: "Anguilla", code: "AI" },
        { name: "Antigua and Barbuda", code: "AG" },
        { name: "Aruba", code: "AW" },
        { name: "Bahamas", code: "BS" },
        { name: "Barbados", code: "BB" },
        { name: "Belize", code: "BZ" },
        { name: "Bermuda", code: "BM" },
        { name: "Bonaire", code: "BQ" },
        { name: "Canada", code: "CA" },
        { name: "Cayman Islands", code: "KY" },
        { name: "Costa Rica", code: "CR" },
        { name: "Cuba", code: "CU" },
        { name: "Curaçao", code: "CW" },
        { name: "Dominica", code: "DM" },
        { name: "Dominican Republic", code: "DO" },
        { name: "El Salvador", code: "SV" },
        { name: "Greenland", code: "GL" },
        { name: "Grenada", code: "GD" },
        { name: "Guadeloupe", code: "GP" },
        { name: "Guatemala", code: "GT" },
        { name: "Haiti", code: "HT" },
        { name: "Honduras", code: "HN" },
        { name: "Jamaica", code: "JM" },
        { name: "Martinique", code: "MQ" },
        { name: "Mexico", code: "MX" },
        { name: "Montserrat", code: "MS" },
        { name: "Nicaragua", code: "NI" },
        { name: "Panama", code: "PA" },
        { name: "Puerto Rico", code: "PR" },
        { name: "Saint Barthélemy", code: "BL" },
        { name: "Saint Kitts and Nevis", code: "KN" },
        { name: "Saint Lucia", code: "LC" },
        { name: "Saint Martin", code: "MF" },
        { name: "Saint Pierre and Miquelon", code: "PM" },
        { name: "Saint Vincent and the Grenadines", code: "VC" },
        { name: "Sint Maarten", code: "SX" },
        { name: "Trinidad and Tobago", code: "TT" },
        { name: "Turks and Caicos Islands", code: "TC" },
        { name: "United States", code: "US" },
        { name: "U.S. Virgin Islands", code: "VI" },
      ],
      Oceania: [
        { name: "American Samoa", code: "AS" },
        { name: "Australia", code: "AU" },
        { name: "Christmas Island", code: "CX" },
        { name: "Cocos (Keeling) Islands", code: "CC" },
        { name: "Cook Islands", code: "CK" },
        { name: "Fiji", code: "FJ" },
        { name: "French Polynesia", code: "PF" },
        { name: "Guam", code: "GU" },
        { name: "Kiribati", code: "KI" },
        { name: "Marshall Islands", code: "MH" },
        { name: "Micronesia", code: "FM" },
        { name: "Nauru", code: "NR" },
        { name: "New Caledonia", code: "NC" },
        { name: "New Zealand", code: "NZ" },
        { name: "Niue", code: "NU" },
        { name: "Norfolk Island", code: "NF" },
        { name: "Northern Mariana Islands", code: "MP" },
        { name: "Palau", code: "PW" },
        { name: "Papua New Guinea", code: "PG" },
        { name: "Pitcairn", code: "PN" },
        { name: "Samoa", code: "WS" },
        { name: "Solomon Islands", code: "SB" },
        { name: "Tokelau", code: "TK" },
        { name: "Tonga", code: "TO" },
        { name: "Tuvalu", code: "TV" },
        { name: "U.S. Minor Outlying Islands", code: "UM" },
        { name: "Vanuatu", code: "VU" },
        { name: "Wallis and Futuna", code: "WF" },
      ],
      "South America": [
        { name: "Argentina", code: "AR" },
        { name: "Bolivia", code: "BO" },
        { name: "Brazil", code: "BR" },
        { name: "Chile", code: "CL" },
        { name: "Colombia", code: "CO" },
        { name: "Ecuador", code: "EC" },
        { name: "Falkland Islands", code: "FK" },
        { name: "French Guiana", code: "GF" },
        { name: "Guyana", code: "GY" },
        { name: "Paraguay", code: "PY" },
        { name: "Peru", code: "PE" },
        { name: "Suriname", code: "SR" },
        { name: "Uruguay", code: "UY" },
        { name: "Venezuela", code: "VE" },
      ],
    };
    const totalCountries = Object.values(territoriesByRegion).reduce(
      (sum, region) => sum + region.length,
      0
    );
    let sortState = { key: null, direction: "asc" };

    // --- HELPER FUNCTIONS ---
    function getStatusBadge(status) {
      let badgeClass = "bg-secondary-subtle text-secondary-emphasis"; // Default
      if (status === "Action Required")
        badgeClass = "bg-danger-subtle text-danger-emphasis";
      else if (status === "Resolved")
        badgeClass = "bg-success-subtle text-success-emphasis";
      else if (status === "In Review")
        badgeClass = "bg-warning-subtle text-warning-emphasis";
      return `<span class="badge rounded-pill border ${badgeClass}">${status}</span>`;
    }

    function parseViews(views) {
      if (typeof views !== "string") return 0;
      const num = parseFloat(views.toUpperCase());
      return views.toUpperCase().includes("K") ? num * 1000 : num;
    }
    function parseExpiry(expiry) {
      if (typeof expiry !== "string" || expiry === "-") return Infinity;
      return parseInt(expiry);
    }
    function updateTerritoryCounter() {
      const container = document.getElementById("conflictResolutionOffcanvas");
      if (!container) return;
      const selectedCount = container.querySelectorAll(
        ".country-checkbox:checked"
      ).length;
      container.querySelector(
        "#territoryCounter"
      ).textContent = `${selectedCount} contested countries out of ${totalCountries} delivered`;
    }
    function updateSortIcons() {
      document
        .querySelectorAll(".sort-icon")
        .forEach((icon) => icon.classList.remove("active", "asc", "desc"));
      if (sortState.key) {
        const activeHeader = document.querySelector(
          `.sortable-header[data-sort="${sortState.key}"]`
        );
        if (activeHeader)
          activeHeader
            .querySelector(".sort-icon")
            .classList.add("active", sortState.direction);
      }
    }
    function addTerritoryEventListeners() {
      const container = document.getElementById("conflictResolutionOffcanvas");
      if (!container) return;
      container.querySelectorAll(".region-checkbox").forEach((rcb) =>
        rcb.addEventListener("change", function () {
          const region = this.dataset.region;
          container
            .querySelectorAll(`.country-checkbox[data-region="${region}"]`)
            .forEach((ccb) => (ccb.checked = this.checked));
          updateTerritoryCounter();
        })
      );
      container.querySelectorAll(".country-checkbox").forEach((ccb) =>
        ccb.addEventListener("change", function () {
          const region = this.dataset.region;
          const allInRegion = Array.from(
            container.querySelectorAll(
              `.country-checkbox[data-region="${region}"]`
            )
          ).every((cb) => cb.checked);
          container.querySelector(
            `.region-checkbox[data-region="${region}"]`
          ).checked = allInRegion;
          updateTerritoryCounter();
        })
      );
    }

    // --- RENDER FUNCTIONS ---
    function renderTable(data) {
      const tableBody = document.getElementById("youtubeTableBody");
      tableBody.innerHTML =
        !data || data.length === 0
          ? `<tr><td colspan="10" class="text-center p-5"><h5>No matching conflicts found.</h5></td></tr>`
          : data
            .map(
              (req) => `
                <tr style="cursor: pointer;" data-bs-toggle="offcanvas" data-bs-target="#conflictResolutionOffcanvas"
                    data-song-name="${req.assetTitle}" data-artist-name="${req.artist
                }" data-isrc="${req.isrc}" 
                    data-cover-url="${req.albumCoverUrl}" data-category="${req.category
                }" data-other-party="${req.otherParty}">
                    <td class="text-center"><i class="bi bi-youtube text-danger fs-5"></i></td>
                    <td>${req.category}</td>
                    <td>${req.assetTitle}</td>
                    <td><div class="fw-bold">${req.artist
                }</div><small class="text-muted">Asset ID: ${req.assetId
                }</small></td>
                    <td>${req.upc}</td>
                    <td>${req.otherParty}</td>
                    <td>${req.dailyViews}</td>
                    <td>${req.expiry}</td>
                    <td>${getStatusBadge(req.status)}</td>
                    <td><i class="bi bi-chevron-right text-muted"></i></td>
                </tr>`
            )
            .join("");
      document.getElementById(
        "pagination-text"
      ).textContent = `${data.length} of ${conflictRequests.length} results`;
    }

    function renderTerritoryAccordion() {
      const accordionContainer = document.getElementById("territoryAccordion");
      if (!accordionContainer) return;
      accordionContainer.innerHTML = Object.entries(territoriesByRegion)
        .map(([region, countries]) => {
          const regionId = region.replace(/[^a-zA-Z0-9]/g, "");
          return `
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-${regionId}">
                        <button class="accordion-button collapsed d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${regionId}" aria-expanded="false">
                            <div class="form-check me-auto pe-2"><input class="form-check-input region-checkbox" type="checkbox" id="region-${regionId}" data-region="${region}" checked><label class="form-check-label fw-bold" for="region-${regionId}">${region}</label></div>
                            <span class="text-muted small me-2">${countries.length
            } countries</span>
                        </button>
                    </h2>
                    <div id="collapse-${regionId}" class="accordion-collapse collapse" data-bs-parent="#territoryAccordion">
                        <div class="accordion-body"><div class="territory-list-inner">${countries
              .map(
                (country) =>
                  `<div class="form-check"><input class="form-check-input country-checkbox" type="checkbox" value="${country.code}" id="country-${country.code}" data-region="${region}" checked><label class="form-check-label" for="country-${country.code}">${country.name}</label></div>`
              )
              .join("")}</div></div>
                    </div>
                </div>`;
        })
        .join("");
      addTerritoryEventListeners();
      updateTerritoryCounter();
    }

    // --- EVENT HANDLERS & INITIALIZATION ---
    const conflictOffcanvasEl = document.getElementById(
      "conflictResolutionOffcanvas"
    );
    const conflictOffcanvas = new bootstrap.Offcanvas(conflictOffcanvasEl);
    const conflictForm = document.getElementById("youtubeConflictForm");
    const steps = Array.from(conflictForm.querySelectorAll(".form-step"));
    const nextBtn = conflictOffcanvasEl.querySelector("#nextBtn");
    const backBtn = conflictOffcanvasEl.querySelector("#backBtn");
    const submitBtn = conflictOffcanvasEl.querySelector("#submitBtn");
    const fileInput = conflictOffcanvasEl.querySelector("#formFile");
    const fileDisplay = conflictOffcanvasEl.querySelector("#selectedFileName");
    let currentStep = 0;

    document
      .getElementById("releasesTable")
      .querySelector("thead")
      .addEventListener("click", (e) => {
        const headerCell = e.target.closest(".sortable-header");
        if (!headerCell) return;
        const sortKey = headerCell.dataset.sort;
        if (sortState.key === sortKey) {
          sortState.direction = sortState.direction === "asc" ? "desc" : "asc";
        } else {
          sortState.key = sortKey;
          sortState.direction = "asc";
        }
        conflictRequests.sort((a, b) => {
          let valA = a[sortState.key],
            valB = b[sortState.key];
          if (sortState.key === "dailyViews") {
            valA = parseViews(valA);
            valB = parseViews(valB);
          } else if (sortState.key === "expiry") {
            valA = parseExpiry(valA);
            valB = parseExpiry(valB);
          }
          let comparison = 0;
          if (valA > valB) comparison = 1;
          else if (valA < valB) comparison = -1;
          return sortState.direction === "desc" ? comparison * -1 : comparison;
        });
        renderTable(conflictRequests);
        updateSortIcons();
      });

    function showStep(stepIndex) {
      steps.forEach((step, index) =>
        step.classList.toggle("d-none", index !== stepIndex)
      );
      backBtn.classList.toggle("d-none", stepIndex === 0);
      nextBtn.classList.toggle("d-none", stepIndex === steps.length - 1);
      submitBtn.classList.toggle("d-none", stepIndex !== steps.length - 1);
      currentStep = stepIndex;
    }

    nextBtn.addEventListener("click", () => {
      if (
        currentStep === 0 &&
        !conflictForm.querySelector('input[name="rightsOwned"]:checked')
      )
        return alert("Please select a rights option.");
      if (
        currentStep === 1 &&
        !conflictForm.querySelector(".country-checkbox:checked")
      )
        return alert("Please select at least one territory.");
      if (currentStep < steps.length - 1) showStep(currentStep + 1);
    });

    backBtn.addEventListener("click", () => showStep(currentStep - 1));

    conflictOffcanvasEl.addEventListener("show.bs.offcanvas", function (event) {
      const data = event.relatedTarget.dataset;
      ["", "2", "3"].forEach((s) => {
        conflictOffcanvasEl.querySelector(`#modalAlbumCover${s}`).src =
          data.coverUrl;
        conflictOffcanvasEl.querySelector(`#modalSongName${s}`).textContent =
          data.songName;
        conflictOffcanvasEl.querySelector(`#modalArtistName${s}`).textContent =
          data.artistName;
      });
      conflictOffcanvasEl.querySelector(
        "#modalIsrc"
      ).textContent = `ISRC: ${data.isrc}`;
      conflictOffcanvasEl.querySelector("#offcanvasTitle").textContent =
        data.category;
      conflictOffcanvasEl.querySelector(
        "#offcanvasSubtitle"
      ).textContent = `VS. ${data.otherParty}`;
      conflictForm.reset();
      conflictOffcanvasEl
        .querySelectorAll(".radio-card")
        .forEach((c) => c.classList.remove("selected"));
      fileDisplay.classList.add("d-none");
      conflictOffcanvasEl
        .querySelectorAll('#territoryAccordion input[type="checkbox"]')
        .forEach((cb) => (cb.checked = true));
      updateTerritoryCounter();
      showStep(0);
    });

    conflictForm.addEventListener("submit", function (e) {
      e.preventDefault();
      if (!fileInput.files.length && currentStep === 2)
        return alert("Please upload a supporting document.");
      alert("Resolution submitted successfully!");
      conflictOffcanvas.hide();
    });

    conflictOffcanvasEl.querySelectorAll(".radio-card").forEach((c) =>
      c.addEventListener("click", function () {
        conflictOffcanvasEl
          .querySelectorAll(".radio-card")
          .forEach((el) => el.classList.remove("selected"));
        this.classList.add("selected");
        this.querySelector('input[type="radio"]').checked = true;
      })
    );

    conflictOffcanvasEl
      .querySelector("#fileUploadContainer")
      .addEventListener("click", () => fileInput.click());
    fileInput.addEventListener("change", () => {
      if (fileInput.files.length > 0) {
        fileDisplay.querySelector("span").textContent = fileInput.files[0].name;
        fileDisplay.classList.remove("d-none");
      }
    });
    fileDisplay.querySelector(".btn-close").addEventListener("click", () => {
      fileInput.value = "";
      fileDisplay.classList.add("d-none");
    });

    // --- INITIAL RENDER ---
    renderTable(conflictRequests);
    renderTerritoryAccordion();
    updateSortIcons();
  }
});
// facebook-page js
// Add this entire new block to your app.js file
document.addEventListener("DOMContentLoaded", function () {
  const facebookPageContainer = document.querySelector(".admin-facebook-page");

  if (facebookPageContainer) {
    // --- DATA ---
    const conflictRequests = [
      {
        id: 1,
        category: "Ownership conflict",
        assetTitle: "Cosmic Drift",
        artist: "Astro Beats",
        assetId: "90736897913",
        upc: "198009123456",
        isrc: "USAT22312345",
        otherParty: "The Orchard",
        dailyViews: "79K",
        expiry: "2 days",
        status: "Action Required",
        albumCoverUrl: "https://placehold.co/80x80/3b5998/ffffff?text=C",
      },
      {
        id: 2,
        category: "Policy",
        assetTitle: "Ocean Tides",
        artist: "Deep Wave",
        assetId: "3478239381",
        upc: "198009654321",
        isrc: "USAT22354321",
        otherParty: "Believe",
        dailyViews: "3K",
        expiry: "-",
        status: "Resolved",
        albumCoverUrl: "https://placehold.co/80x80/1abc9c/ffffff?text=O",
      },
      {
        id: 3,
        category: "Ownership conflict",
        assetTitle: "City Lights",
        artist: "Urban Glow",
        assetId: "3478239381",
        upc: "198009789012",
        isrc: "USAT22398765",
        otherParty: "CD Baby",
        dailyViews: "1.2K",
        expiry: "15 days",
        status: "In Review",
        albumCoverUrl: "https://placehold.co/80x80/9b59b6/ffffff?text=C",
      },
    ];
    const territoriesByRegion = {
      Africa: [
        { name: "Algeria", code: "DZ" },
        { name: "Angola", code: "AO" },
        { name: "Benin", code: "BJ" },
        { name: "Botswana", code: "BW" },
        { name: "Burkina Faso", code: "BF" },
        { name: "Burundi", code: "BI" },
        { name: "Cabo Verde", code: "CV" },
        { name: "Cameroon", code: "CM" },
        { name: "Central African Republic", code: "CF" },
        { name: "Chad", code: "TD" },
        { name: "Comoros", code: "KM" },
        { name: "Congo", code: "CG" },
        { name: "Congo (DRC)", code: "CD" },
        { name: "Côte d'Ivoire", code: "CI" },
        { name: "Djibouti", code: "DJ" },
        { name: "Egypt", code: "EG" },
        { name: "Equatorial Guinea", code: "GQ" },
        { name: "Eritrea", code: "ER" },
        { name: "Eswatini", code: "SZ" },
        { name: "Ethiopia", code: "ET" },
        { name: "Gabon", code: "GA" },
        { name: "Gambia", code: "GM" },
        { name: "Ghana", code: "GH" },
        { name: "Guinea", code: "GN" },
        { name: "Guinea-Bissau", code: "GW" },
        { name: "Kenya", code: "KE" },
        { name: "Lesotho", code: "LS" },
        { name: "Liberia", code: "LR" },
        { name: "Libya", code: "LY" },
        { name: "Madagascar", code: "MG" },
        { name: "Malawi", code: "MW" },
        { name: "Mali", code: "ML" },
        { name: "Mauritania", code: "MR" },
        { name: "Mauritius", code: "MU" },
        { name: "Mayotte", code: "YT" },
        { name: "Morocco", code: "MA" },
        { name: "Mozambique", code: "MZ" },
        { name: "Namibia", code: "NA" },
        { name: "Niger", code: "NE" },
        { name: "Nigeria", code: "NG" },
        { name: "Réunion", code: "RE" },
        { name: "Rwanda", code: "RW" },
        { name: "Saint Helena", code: "SH" },
        { name: "Sao Tome and Principe", code: "ST" },
        { name: "Senegal", code: "SN" },
        { name: "Seychelles", code: "SC" },
        { name: "Sierra Leone", code: "SL" },
        { name: "Somalia", code: "SO" },
        { name: "South Africa", code: "ZA" },
        { name: "South Sudan", code: "SS" },
        { name: "Sudan", code: "SD" },
        { name: "Tanzania", code: "TZ" },
        { name: "Togo", code: "TG" },
        { name: "Tunisia", code: "TN" },
        { name: "Uganda", code: "UG" },
        { name: "Zambia", code: "ZM" },
        { name: "Zimbabwe", code: "ZW" },
      ],
      Antarctica: [
        { name: "Antarctica", code: "AQ" },
        { name: "French Southern Territories", code: "TF" },
        { name: "South Georgia and the South Sandwich Islands", code: "GS" },
      ],
      Asia: [
        { name: "Afghanistan", code: "AF" },
        { name: "Armenia", code: "AM" },
        { name: "Azerbaijan", code: "AZ" },
        { name: "Bahrain", code: "BH" },
        { name: "Bangladesh", code: "BD" },
        { name: "Bhutan", code: "BT" },
        { name: "British Indian Ocean Territory", code: "IO" },
        { name: "Brunei", code: "BN" },
        { name: "Cambodia", code: "KH" },
        { name: "China", code: "CN" },
        { name: "Cyprus", code: "CY" },
        { name: "Georgia", code: "GE" },
        { name: "Hong Kong", code: "HK" },
        { name: "India", code: "IN" },
        { name: "Indonesia", code: "ID" },
        { name: "Iran", code: "IR" },
        { name: "Iraq", code: "IQ" },
        { name: "Israel", code: "IL" },
        { name: "Japan", code: "JP" },
        { name: "Jordan", code: "JO" },
        { name: "Kazakhstan", code: "KZ" },
        { name: "Kuwait", code: "KW" },
        { name: "Kyrgyzstan", code: "KG" },
        { name: "Laos", code: "LA" },
        { name: "Lebanon", code: "LB" },
        { name: "Macao", code: "MO" },
        { name: "Malaysia", code: "MY" },
        { name: "Maldives", code: "MV" },
        { name: "Mongolia", code: "MN" },
        { name: "Myanmar", code: "MM" },
        { name: "Nepal", code: "NP" },
        { name: "North Korea", code: "KP" },
        { name: "Oman", code: "OM" },
        { name: "Pakistan", code: "PK" },
        { name: "Palestine", code: "PS" },
        { name: "Philippines", code: "PH" },
        { name: "Qatar", code: "QA" },
        { name: "Saudi Arabia", code: "SA" },
        { name: "Singapore", code: "SG" },
        { name: "South Korea", code: "KR" },
        { name: "Sri Lanka", code: "LK" },
        { name: "Syria", code: "SY" },
        { name: "Taiwan", code: "TW" },
        { name: "Tajikistan", code: "TJ" },
        { name: "Thailand", code: "TH" },
        { name: "Timor-Leste", code: "TL" },
        { name: "Turkey", code: "TR" },
        { name: "Turkmenistan", code: "TM" },
        { name: "United Arab Emirates", code: "AE" },
        { name: "Uzbekistan", code: "UZ" },
        { name: "Vietnam", code: "VN" },
        { name: "Yemen", code: "YE" },
      ],
      Europe: [
        { name: "Åland Islands", code: "AX" },
        { name: "Albania", code: "AL" },
        { name: "Andorra", code: "AD" },
        { name: "Austria", code: "AT" },
        { name: "Belarus", code: "BY" },
        { name: "Belgium", code: "BE" },
        { name: "Bosnia and Herzegovina", code: "BA" },
        { name: "Bulgaria", code: "BG" },
        { name: "Croatia", code: "HR" },
        { name: "Czechia", code: "CZ" },
        { name: "Denmark", code: "DK" },
        { name: "Estonia", code: "EE" },
        { name: "Faroe Islands", code: "FO" },
        { name: "Finland", code: "FI" },
        { name: "France", code: "FR" },
        { name: "Germany", code: "DE" },
        { name: "Gibraltar", code: "GI" },
        { name: "Greece", code: "GR" },
        { name: "Guernsey", code: "GG" },
        { name: "Holy See", code: "VA" },
        { name: "Hungary", code: "HU" },
        { name: "Iceland", code: "IS" },
        { name: "Ireland", code: "IE" },
        { name: "Isle of Man", code: "IM" },
        { name: "Italy", code: "IT" },
        { name: "Jersey", code: "JE" },
        { name: "Latvia", code: "LV" },
        { name: "Liechtenstein", code: "LI" },
        { name: "Lithuania", code: "LT" },
        { name: "Luxembourg", code: "LU" },
        { name: "Malta", code: "MT" },
        { name: "Moldova", code: "MD" },
        { name: "Monaco", code: "MC" },
        { name: "Montenegro", code: "ME" },
        { name: "Netherlands", code: "NL" },
        { name: "North Macedonia", code: "MK" },
        { name: "Norway", code: "NO" },
        { name: "Poland", code: "PL" },
        { name: "Portugal", code: "PT" },
        { name: "Romania", code: "RO" },
        { name: "Russia", code: "RU" },
        { name: "San Marino", code: "SM" },
        { name: "Serbia", code: "RS" },
        { name: "Slovakia", code: "SK" },
        { name: "Slovenia", code: "SI" },
        { name: "Spain", code: "ES" },
        { name: "Svalbard and Jan Mayen", code: "SJ" },
        { name: "Sweden", code: "SE" },
        { name: "Switzerland", code: "CH" },
        { name: "Ukraine", code: "UA" },
        { name: "United Kingdom", code: "GB" },
      ],
      "North America": [
        { name: "Anguilla", code: "AI" },
        { name: "Antigua and Barbuda", code: "AG" },
        { name: "Aruba", code: "AW" },
        { name: "Bahamas", code: "BS" },
        { name: "Barbados", code: "BB" },
        { name: "Belize", code: "BZ" },
        { name: "Bermuda", code: "BM" },
        { name: "Bonaire", code: "BQ" },
        { name: "Canada", code: "CA" },
        { name: "Cayman Islands", code: "KY" },
        { name: "Costa Rica", code: "CR" },
        { name: "Cuba", code: "CU" },
        { name: "Curaçao", code: "CW" },
        { name: "Dominica", code: "DM" },
        { name: "Dominican Republic", code: "DO" },
        { name: "El Salvador", code: "SV" },
        { name: "Greenland", code: "GL" },
        { name: "Grenada", code: "GD" },
        { name: "Guadeloupe", code: "GP" },
        { name: "Guatemala", code: "GT" },
        { name: "Haiti", code: "HT" },
        { name: "Honduras", code: "HN" },
        { name: "Jamaica", code: "JM" },
        { name: "Martinique", code: "MQ" },
        { name: "Mexico", code: "MX" },
        { name: "Montserrat", code: "MS" },
        { name: "Nicaragua", code: "NI" },
        { name: "Panama", code: "PA" },
        { name: "Puerto Rico", code: "PR" },
        { name: "Saint Barthélemy", code: "BL" },
        { name: "Saint Kitts and Nevis", code: "KN" },
        { name: "Saint Lucia", code: "LC" },
        { name: "Saint Martin", code: "MF" },
        { name: "Saint Pierre and Miquelon", code: "PM" },
        { name: "Saint Vincent and the Grenadines", code: "VC" },
        { name: "Sint Maarten", code: "SX" },
        { name: "Trinidad and Tobago", code: "TT" },
        { name: "Turks and Caicos Islands", code: "TC" },
        { name: "United States", code: "US" },
        { name: "U.S. Virgin Islands", code: "VI" },
      ],
      Oceania: [
        { name: "American Samoa", code: "AS" },
        { name: "Australia", code: "AU" },
        { name: "Christmas Island", code: "CX" },
        { name: "Cocos (Keeling) Islands", code: "CC" },
        { name: "Cook Islands", code: "CK" },
        { name: "Fiji", code: "FJ" },
        { name: "French Polynesia", code: "PF" },
        { name: "Guam", code: "GU" },
        { name: "Kiribati", code: "KI" },
        { name: "Marshall Islands", code: "MH" },
        { name: "Micronesia", code: "FM" },
        { name: "Nauru", code: "NR" },
        { name: "New Caledonia", code: "NC" },
        { name: "New Zealand", code: "NZ" },
        { name: "Niue", code: "NU" },
        { name: "Norfolk Island", code: "NF" },
        { name: "Northern Mariana Islands", code: "MP" },
        { name: "Palau", code: "PW" },
        { name: "Papua New Guinea", code: "PG" },
        { name: "Pitcairn", code: "PN" },
        { name: "Samoa", code: "WS" },
        { name: "Solomon Islands", code: "SB" },
        { name: "Tokelau", code: "TK" },
        { name: "Tonga", code: "TO" },
        { name: "Tuvalu", code: "TV" },
        { name: "U.S. Minor Outlying Islands", code: "UM" },
        { name: "Vanuatu", code: "VU" },
        { name: "Wallis and Futuna", code: "WF" },
      ],
      "South America": [
        { name: "Argentina", code: "AR" },
        { name: "Bolivia", code: "BO" },
        { name: "Brazil", code: "BR" },
        { name: "Chile", code: "CL" },
        { name: "Colombia", code: "CO" },
        { name: "Ecuador", code: "EC" },
        { name: "Falkland Islands", code: "FK" },
        { name: "French Guiana", code: "GF" },
        { name: "Guyana", code: "GY" },
        { name: "Paraguay", code: "PY" },
        { name: "Peru", code: "PE" },
        { name: "Suriname", code: "SR" },
        { name: "Uruguay", code: "UY" },
        { name: "Venezuela", code: "VE" },
      ],
    };
    const totalCountries = Object.values(territoriesByRegion).flat().length;

    // --- DOM ELEMENTS ---
    const table = $("#datatable");

    // --- HELPER & PARSING FUNCTIONS ---
    const getStatusBadge = (status) => {
      let badgeClass = "bg-secondary-subtle text-secondary-emphasis";
      if (status === "Action Required")
        badgeClass = "bg-danger-subtle text-danger-emphasis";
      else if (status === "Resolved")
        badgeClass = "bg-success-subtle text-success-emphasis";
      else if (status === "In Review")
        badgeClass = "bg-warning-subtle text-warning-emphasis";
      return `<span class="badge rounded-pill border ${badgeClass}">${status}</span>`;
    };
    const parseViews = (views) =>
      typeof views !== "string"
        ? 0
        : parseFloat(views.toUpperCase()) *
        (views.toUpperCase().includes("K") ? 1000 : 1);
    const parseExpiry = (expiry) =>
      typeof expiry !== "string" || expiry === "-"
        ? Infinity
        : parseInt(expiry);

    // --- DATATABLES CONFIGURATION ---
    const dataTableInstance = table.DataTable({
      destroy: true,
      data: conflictRequests,
      paging: true,
      searching: true,
      info: true,
      lengthChange: true,
      autoWidth: false,
      columns: [
        {
          data: null,
          className: "text-center",
          orderable: false,
          render: () => `<i class="bi bi-facebook text-primary fs-5"></i>`,
        },
        { data: "category" },
        { data: "assetTitle" },
        {
          data: null,
          render: (data, type, row) =>
            `<div class="fw-bold">${row.artist}</div><small class="text-muted">Asset ID: ${row.assetId}</small>`,
        },
        { data: "upc" },
        { data: "otherParty" },
        {
          data: "dailyViews",
          render: { _: (data) => data, sort: (data) => parseViews(data) },
        },
        {
          data: "expiry",
          render: { _: (data) => data, sort: (data) => parseExpiry(data) },
        },
        { data: "status", render: (data) => getStatusBadge(data) },
        {
          data: null,
          className: "text-center",
          orderable: false,
          render: () => `<i class="bi bi-chevron-right text-muted"></i>`,
        },
      ],
      createdRow: function (row, data) {
        $(row).attr({
          style: "cursor: pointer;",
          "data-bs-toggle": "offcanvas",
          "data-bs-target": "#facebookConflictOffcanvas",
          "data-song-name": data.assetTitle,
          "data-artist-name": data.artist,
          "data-isrc": data.isrc,
          "data-cover-url": data.albumCoverUrl,
          "data-category": data.category,
          "data-other-party": data.otherParty,
        });
      },
      language: {
        info: "Showing _START_ to _END_ of _TOTAL_ entries",
        infoEmpty: "Showing 0 to 0 of 0 entries",
        infoFiltered: "(filtered from _MAX_ total entries)",
        zeroRecords: "No matching conflicts found",
        emptyTable: "No conflicts available",
        search: "_INPUT_",
        searchPlaceholder: "Search conflicts...",
      },
    });

    // --- OFFCANVAS LOGIC ---
    const conflictOffcanvasEl = document.getElementById(
      "facebookConflictOffcanvas"
    );
    if (conflictOffcanvasEl) {
      const conflictForm = document.getElementById("facebookConflictForm");
      const steps = Array.from(
        conflictOffcanvasEl.querySelectorAll(".form-step")
      );
      const nextBtn = document.getElementById("nextBtn");
      const backBtn = document.getElementById("backBtn");
      const submitBtn = document.getElementById("submitBtn");
      let currentStep = 0;

      function showStep(stepIndex) {
        steps.forEach((step, index) =>
          step.classList.toggle("d-none", index !== stepIndex)
        );
        backBtn.classList.toggle("d-none", stepIndex === 0);
        nextBtn.classList.toggle("d-none", stepIndex === steps.length - 1);
        submitBtn.classList.toggle("d-none", stepIndex !== steps.length - 1);
        currentStep = stepIndex;
      }

      nextBtn.addEventListener("click", () => {
        if (
          currentStep === 0 &&
          !conflictForm.querySelector('input[name="rightsOwned"]:checked')
        )
          return alert("Please select a rights option.");
        if (
          currentStep === 1 &&
          !conflictForm.querySelector(".country-checkbox:checked")
        )
          return alert("Please select at least one territory.");
        if (currentStep < steps.length - 1) showStep(currentStep + 1);
      });

      backBtn.addEventListener("click", () => {
        if (currentStep > 0) showStep(currentStep - 1);
      });

      conflictOffcanvasEl.addEventListener(
        "show.bs.offcanvas",
        function (event) {
          const data = event.relatedTarget.dataset;
          // Populate offcanvas fields
          ["", "2", "3"].forEach((s) => {
            const suffix = s ? parseInt(s) : "";
            conflictOffcanvasEl.querySelector(`#modalAlbumCover${suffix}`).src =
              data.coverUrl;
            conflictOffcanvasEl.querySelector(
              `#modalSongName${suffix}`
            ).textContent = data.songName;
            conflictOffcanvasEl.querySelector(
              `#modalArtistName${suffix}`
            ).textContent = data.artistName;
          });
          conflictOffcanvasEl.querySelector(
            "#modalIsrc"
          ).textContent = `ISRC: ${data.isrc}`;
          conflictOffcanvasEl.querySelector("#offcanvasTitle").textContent =
            data.category;
          conflictOffcanvasEl.querySelector(
            "#offcanvasSubtitle"
          ).textContent = `VS. ${data.otherParty}`;

          // Render accordion and reset form state
          renderTerritoryAccordion();
          conflictForm.reset();
          conflictForm
            .querySelectorAll(".radio-card")
            .forEach((c) => c.classList.remove("selected"));
          document.getElementById("selectedFileName")?.classList.add("d-none");
          showStep(0);
        }
      );

      conflictForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const formFile = document.getElementById("formFile");
        if (currentStep === 2 && formFile && !formFile.files.length)
          return alert("Please upload a supporting document.");
        alert("Resolution submitted successfully!");
        bootstrap.Offcanvas.getInstance(conflictOffcanvasEl).hide();
      });

      function renderTerritoryAccordion() {
        const accordionContainer = conflictOffcanvasEl.querySelector(
          "#territoryAccordion"
        );
        if (!accordionContainer) return;
        accordionContainer.innerHTML = Object.entries(territoriesByRegion)
          .map(([region, countries]) => {
            if (countries.length === 0) return "";
            const regionId = region.replace(/[^a-zA-Z0-9]/g, "");
            return `
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-fb-${regionId}">
                                <div class="form-check me-auto pe-2">
                                    <input class="form-check-input region-checkbox" type="checkbox" id="region-fb-${regionId}" data-region="${region}" checked>
                                    <label class="form-check-label fw-bold" for="region-fb-${regionId}">${region}</label>
                                </div>
                                <span class="text-muted small me-2">${countries.length
              } countries</span>
                            </button>
                        </h2>
                        <div id="collapse-fb-${regionId}" class="accordion-collapse collapse" data-bs-parent="#territoryAccordion">
                            <div class="accordion-body">
                                <div class="territory-list-inner">${countries
                .map(
                  (c) => `
                                    <div class="form-check">
                                        <input class="form-check-input country-checkbox" type="checkbox" value="${c.code}" id="country-fb-${c.code}" data-region="${region}" checked>
                                        <label class="form-check-label" for="country-fb-${c.code}">${c.name}</label>
                                    </div>`
                )
                .join("")}
                                </div>
                            </div>
                        </div>
                    </div>`;
          })
          .join("");
        addTerritoryEventListeners();
        updateTerritoryCounter();
      }

      function updateTerritoryCounter() {
        const selected = conflictOffcanvasEl.querySelectorAll(
          ".country-checkbox:checked"
        ).length;
        conflictOffcanvasEl.querySelector(
          "#territoryCounter"
        ).textContent = `${selected} contested countries out of ${totalCountries} delivered`;
      }

      function addTerritoryEventListeners() {
        conflictOffcanvasEl
          .querySelectorAll(".region-checkbox, .country-checkbox")
          .forEach((cb) => {
            cb.addEventListener("change", function (e) {
              const region = e.target.dataset.region;
              if (e.target.classList.contains("region-checkbox")) {
                conflictOffcanvasEl
                  .querySelectorAll(
                    `.country-checkbox[data-region="${region}"]`
                  )
                  .forEach(
                    (countryCb) => (countryCb.checked = e.target.checked)
                  );
              } else {
                const allInRegion = [
                  ...conflictOffcanvasEl.querySelectorAll(
                    `.country-checkbox[data-region="${region}"]`
                  ),
                ].every((c) => c.checked);
                conflictOffcanvasEl.querySelector(
                  `.region-checkbox[data-region="${region}"]`
                ).checked = allInRegion;
              }
              updateTerritoryCounter();
            });
          });
      }

      // --- Remaining event listeners for form interactions ---
      conflictOffcanvasEl.addEventListener("click", function (e) {
        if (e.target.closest(".radio-card")) {
          const card = e.target.closest(".radio-card");
          conflictOffcanvasEl
            .querySelectorAll(".radio-card")
            .forEach((c) => c.classList.remove("selected"));
          card.classList.add("selected");
          card.querySelector('input[type="radio"]').checked = true;
        }
      });

      const fileInput = document.getElementById("formFile");
      const fileDisplay = document.getElementById("selectedFileName");
      document
        .getElementById("fileUploadContainer")
        ?.addEventListener("click", () => fileInput.click());
      fileInput?.addEventListener("change", () => {
        if (fileInput.files.length > 0 && fileDisplay) {
          fileDisplay.querySelector("span").textContent =
            fileInput.files[0].name;
          fileDisplay.classList.remove("d-none");
        }
      });
      fileDisplay
        ?.querySelector(".btn-close")
        .addEventListener("click", (e) => {
          e.stopPropagation();
          if (fileInput) fileInput.value = "";
          fileDisplay.classList.add("d-none");
        });
    }
  }
});

//support form

// Show alert helper
function showFormAlert(type, message) {
  let alertHtml = `
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
  $("#formAlertBox").html(alertHtml);
}

$("#supportForm").on("submit", function (e) {
  e.preventDefault(); // Stop normal form submit

  $.ajax({
    url: $(this).attr("action"),
    type: "POST",
    data: $(this).serialize(), // Serialize form fields
    success: function (res) {
      if (res.success) {
        showFormAlert("success", res.message);
        $("#supportForm")[0].reset(); // Clear form
      } else if (res.errors) {
        let errorMessages = Object.values(res.errors).join("<br>");
        showFormAlert("danger", errorMessages);
      }
    },
    error: function (xhr) {
      let msg = "Something went wrong!";
      if (xhr.responseJSON && xhr.responseJSON.message) {
        msg = xhr.responseJSON.message;
      }
      showFormAlert("danger", msg);
    },
  });
});

//support list js
$(document).ready(function () {
  let table = $("#datatable").DataTable({
    destroy: true,
    ajax: "/superadmin/support/data",
    columns: [
      { data: "id" },
      { data: "full_name" },
      { data: "email" },
      { data: "subject" },
      { data: "status" },
      { data: "created_at" },
      { data: "actions", orderable: false, searchable: false },
    ],
  });
  function showAlert(type, message) {
    // type = "success", "danger", "warning", "info"
    let alertHtml = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
    $("#alertBox").html(alertHtml);

    setTimeout(() => {
      $(".alert").alert("close");
    }, 3000);
  }

  $(document).on("click", ".viewSupportBtn", function () {
    let id = $(this).data("id");
    let message = $(this).data("message");
    let status = $(this).data("status");

    $("#supportModal").data("id", id);
    $("#supportMessage").text(message);
    $("#supportStatus").val(status);

    let modal = new bootstrap.Modal(document.getElementById("supportModal"));
    modal.show();
  });

  // Save status change
  $("#saveSupportStatus").on("click", function () {
    let id = $("#supportModal").data("id");
    let status = $("#supportStatus").val();

    $.ajax({
      url: "/superadmin/support/update-status/" + id,
      type: "POST",
      data: {
        status: status,
        _token: $('meta[name="csrf-token"]').attr("content"),
      },
      success: function (res) {
        if (res.success) {
          showAlert("success", res.message);
        } else {
          showAlert("danger", res.message);
        }
        $("#supportModal").modal("hide");
        table.ajax.reload();
      },
      error: function (xhr) {
        let msg = "Something went wrong!";
        if (xhr.responseJSON && xhr.responseJSON.message) {
          msg = xhr.responseJSON.message;
        }
        showAlert("danger", msg);
      },
    });
  });
});

// Enhanced Multi-Step Form Validation System
const FormValidator = {
  rules: {
    required: (value) => value && value.trim() !== "",
    email: (value) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value),
    phone: (value) =>
      /^[\+]?[1-9][\d]{0,15}$/.test(value.replace(/[\s\-\(\)]/g, "")),
    url: (value) => /^https?:\/\/.+\..+/.test(value),
    number: (value) => !isNaN(value) && !isNaN(parseFloat(value)),
    positiveNumber: (value) => !isNaN(value) && parseFloat(value) > 0,
    date: (value) => !isNaN(Date.parse(value)),
    minLength: (value, min) => value && value.length >= min,
    maxLength: (value, max) => value && value.length <= max,
    pattern: (value, regex) => regex.test(value),
    minValue: (value, min) => parseFloat(value) >= min,
    maxValue: (value, max) => parseFloat(value) <= max,
    upcEan: (value) => /^\d{12,13}$/.test(value),
    isrc: (value) => /^[A-Z]{2}[A-Z0-9]{3}\d{7}$/.test(value),
    percentage: (value) =>
      !isNaN(value) && parseFloat(value) >= 0 && parseFloat(value) <= 100,
  },

  validateField(fieldId, validationRules, customMessages = {}) {
    const field = document.getElementById(fieldId);
    const error = document.getElementById(fieldId + "Error");

    if (!field) return true;

    field.classList.remove("is-invalid", "is-valid");
    if (error) {
      error.textContent = "";
      error.style.display = "none";
    }

    let value = field.value ? field.value.trim() : "";
    let isValid = true;
    let errorMsg = "";

    if (field.type === "radio" || field.type === "checkbox") {
      if (validationRules.required) {
        const radios = document.querySelectorAll(`input[name="${field.name}"]`);
        isValid = Array.from(radios).some((r) => r.checked);
        errorMsg = customMessages.required || "Please make a selection.";
      }
    } else if (field.tagName === "SELECT") {
      if (validationRules.required) {
        isValid = value !== "" && value !== null;
        errorMsg = customMessages.required || `Please select a ${fieldId}.`;
      }
    } else {
      for (const [rule, ruleValue] of Object.entries(validationRules)) {
        if (!isValid) break;

        switch (rule) {
          case "required":
            if (ruleValue && !value) {
              isValid = false;
              errorMsg =
                customMessages.required ||
                `${fieldId
                  .replace(/([A-Z])/g, " $1")
                  .toLowerCase()} is required.`;
            }
            break;
          case "minLength":
            if (value && value.length < ruleValue) {
              isValid = false;
              errorMsg =
                customMessages.minLength ||
                `Must be at least ${ruleValue} characters long.`;
            }
            break;
          case "maxLength":
            if (value && value.length > ruleValue) {
              isValid = false;
              errorMsg =
                customMessages.maxLength ||
                `Cannot exceed ${ruleValue} characters.`;
            }
            break;
          case "pattern":
            if (value && !ruleValue.test(value)) {
              isValid = false;
              errorMsg = customMessages.pattern || "Invalid format.";
            }
            break;
          case "email":
            if (value && !this.rules.email(value)) {
              isValid = false;
              errorMsg =
                customMessages.email || "Please enter a valid email address.";
            }
            break;
          case "url":
            if (value && !this.rules.url(value)) {
              isValid = false;
              errorMsg =
                customMessages.url ||
                "Please enter a valid URL (e.g., https://example.com).";
            }
            break;
          case "phone":
            if (value && !this.rules.phone(value)) {
              isValid = false;
              errorMsg =
                customMessages.phone || "Please enter a valid phone number.";
            }
            break;
          case "number":
            if (value && !this.rules.number(value)) {
              isValid = false;
              errorMsg =
                customMessages.number || "Please enter a valid number.";
            }
            break;
          case "positiveNumber":
            if (value && !this.rules.positiveNumber(value)) {
              isValid = false;
              errorMsg =
                customMessages.positiveNumber ||
                "Please enter a positive number.";
            }
            break;
          case "minValue":
            if (value && parseFloat(value) < ruleValue) {
              isValid = false;
              errorMsg =
                customMessages.minValue ||
                `Value must be at least ${ruleValue}.`;
            }
            break;
          case "maxValue":
            if (value && parseFloat(value) > ruleValue) {
              isValid = false;
              errorMsg =
                customMessages.maxValue || `Value cannot exceed ${ruleValue}.`;
            }
            break;
          case "upcEan":
            if (value && !this.rules.upcEan(value)) {
              isValid = false;
              errorMsg =
                customMessages.upcEan ||
                "UPC/EAN must be 12 or 13 digits only.";
            }
            break;
          case "isrc":
            if (value && !this.rules.isrc(value)) {
              isValid = false;
              errorMsg =
                customMessages.isrc ||
                "ISRC must be in format: CC-XXX-YY-NNNNN (e.g., US-ABC-12-34567).";
            }
            break;
          case "percentage":
            if (value && !this.rules.percentage(value)) {
              isValid = false;
              errorMsg =
                customMessages.percentage ||
                "Please enter a percentage between 0 and 100.";
            }
            break;
        }
      }
    }

    if (!isValid) {
      field.classList.add("is-invalid");
      if (error) {
        error.textContent = errorMsg;
        error.style.display = "block";
      }
    } else if (value || validationRules.required) {
      field.classList.add("is-valid");
    }

    return isValid || (!validationRules.required && !value);
  },

  // Add helper methods for errors
  showError: (field, message) => {
    field.classList.add("is-invalid");
    const errorDiv = field.nextElementSibling;
    if (errorDiv && errorDiv.classList.contains("invalid-feedback")) {
      errorDiv.textContent = message;
      errorDiv.style.display = "block";
    }
  },

  hideError: (field) => {
    field.classList.remove("is-invalid");
    const errorDiv = field.nextElementSibling;
    if (errorDiv && errorDiv.classList.contains("invalid-feedback")) {
      errorDiv.style.display = "none";
    }
  },
};

// Step validation rules
const step1ValidationRules = {
  releaseTitle: { required: true, minLength: 2, maxLength: 100 },
  labelName: { required: true },
  artist: { required: true, minLength: 2, maxLength: 100 },
  featuringArtist: { minLength: 2, maxLength: 100 },
  releaseType: { required: true, type: "radio" },
  mood: { required: true, type: "select" },
  genre: { required: true, type: "select" },
  language: { required: true, type: "select" },
  upcEan: { upcEan: true },
  artworkFile: { required: true, type: "file" },
};

const step2ValidationRules = {
  trackTitle: { required: true, minLength: 1, maxLength: 100 },
  secondaryTrackType: { required: true, type: "select" },
  instrumental: { required: true, type: "radio" },
  author: { required: true, minLength: 1, maxLength: 100 },
  composer: { required: true, minLength: 1, maxLength: 100 },
  cLineYear: { required: true, type: "select" },
  pLineYear: { required: true, type: "select" },
  productionYear: { required: true, type: "select" },
  trackLanguage: { required: true, type: "select" },
  explicit: { required: true, type: "select" },
  audioFile: { required: true, type: "file" },
};

const step3ValidationRules = {
  freeStores: { required: true },
};

const step4ValidationRules = {
  releaseDate: { required: true, date: true },
  originalReleaseDate: { required: true, date: true },
  releasePrice: { required: true, type: "select" },
};

const step5ValidationRules = {
  contentGuidelines: { required: true, type: "checkbox" },
  isrcGuidelines: { required: true, type: "checkbox" },
  youtubeGuidelines: { required: true, type: "checkbox" },
  audioStoreGuidelines: { required: true, type: "checkbox" },
};

document.addEventListener("DOMContentLoaded", function () {
  const addReleasePageContainer = document.querySelector(
    ".admin-add-releases-form"
  );
  if (!addReleasePageContainer) return;

  const totalSteps = 5;
  const stepTitles = {
    1: "Metadata",
    2: "Uploads",
    3: "Stores",
    4: "Date & Price",
    5: "Terms",
  };
  let currentStep = 1;

  // CRITICAL FIX: Track which button was clicked
  let submittingButton = null;
  let rejectionMessage = null; // Track rejection message

  if (typeof feather !== "undefined") {
    feather.replace();
  }

  // FIXED: Initialize form data for edit mode
  const isEditMode =
    document.querySelector('input[name="releaseTitle"]')?.value !== "";

  // Initialize rejection modal
  const rejectionModal = document.getElementById('rejectionModal') ? 
    new bootstrap.Modal(document.getElementById('rejectionModal')) : null;

  function updateStepIndicator(step) {
    const steps = document.querySelectorAll(".step");
    const progressLine = document.getElementById("progressLine");

    steps.forEach((stepEl, index) => {
      const stepNum = index + 1;
      stepEl.classList.remove("active", "completed");

      if (stepNum < step) {
        stepEl.classList.add("completed");
      } else if (stepNum === step) {
        stepEl.classList.add("active");
      }
    });

    if (progressLine) {
      const progressWidth = ((step - 1) / (totalSteps - 1)) * 100;
      progressLine.style.width = progressWidth + "%";
    }
  }

  function showStep(step) {
    document.querySelectorAll(".step-content").forEach((content) => {
      content.classList.remove("active");
    });

    setTimeout(() => {
      const targetStep = document.getElementById(`step-${step}`);
      if (targetStep) {
        targetStep.classList.add("active");
      }
    }, 150);

    updateStepIndicator(step);

    const currentStepTitleEl = document.querySelector(".current-step-title");
    if (currentStepTitleEl) {
      currentStepTitleEl.textContent = stepTitles[step];
    }

    currentStep = step;
  }

  function createStepValidator(stepRules, stepNumber) {
    Object.keys(stepRules).forEach((fieldId) => {
      const field = document.getElementById(fieldId);
      if (!field) return;

      const rule = stepRules[fieldId];

      if (rule.type === "radio") {
        document
          .querySelectorAll(`input[name="${field.name}"]`)
          .forEach((radio) => {
            radio.addEventListener("change", () =>
              validateStepField(fieldId, stepRules[fieldId])
            );
          });
      } else if (rule.type === "checkbox") {
        if (
          field.name &&
          document.querySelectorAll(`input[name="${field.name}"]`).length > 1
        ) {
          document
            .querySelectorAll(`input[name="${field.name}"]`)
            .forEach((checkbox) => {
              checkbox.addEventListener("change", () =>
                validateStepField(fieldId, stepRules[fieldId])
              );
            });
        } else {
          field.addEventListener("change", () =>
            validateStepField(fieldId, stepRules[fieldId])
          );
        }
      } else if (rule.type === "file") {
        field.addEventListener("change", () =>
          validateStepField(fieldId, stepRules[fieldId])
        );
      } else {
        field.addEventListener("input", () =>
          validateStepField(fieldId, stepRules[fieldId])
        );
        field.addEventListener("change", () =>
          validateStepField(fieldId, stepRules[fieldId])
        );
        field.addEventListener("blur", () =>
          validateStepField(fieldId, stepRules[fieldId])
        );
      }
    });

    if (stepNumber === 4) {
      ["releaseDate", "preSaleDate", "originalReleaseDate"].forEach((id) => {
        const field = document.getElementById(id);
        if (field) {
          field.addEventListener("change", validateStep4Dates);
        }
      });
    }

    return function validateStep() {
      let allValid = true;
      Object.keys(stepRules).forEach((fieldId) => {
        const isValid = validateStepField(fieldId, stepRules[fieldId]);
        if (!isValid) allValid = false;
      });

      if (stepNumber === 4) {
        if (!validateStep4Dates()) {
          allValid = false;
        }
      }
      return allValid;
    };
  }

  function validateStepField(fieldId, rules) {
    if (fieldId === "artworkFile") {
      return validateArtworkFile();
    }
    if (fieldId === "audioFile") {
      return validateAudioFile();
    }
    if (fieldId === "freeStores") {
      return validateStoreSelection();
    }

    return FormValidator.validateField(fieldId, rules);
  }

  // FIXED: Artwork validation for edit mode
  function validateArtworkFile() {
    const artworkFile = document.getElementById("artworkFile");
    const artworkFileError = document.getElementById("artworkFileError");
    const artworkUpload = document.getElementById("artworkUpload");
    const artworkPreview = document.getElementById("artworkPreview");

    if (!artworkFile || !artworkFileError || !artworkUpload) return true;

    artworkUpload.classList.remove("is-invalid", "is-valid");
    artworkFileError.textContent = "";
    artworkFileError.style.display = "none";

    // FIXED: In edit mode, if preview exists and no new file selected, it's valid
    if (
      isEditMode &&
      artworkPreview &&
      !artworkPreview.classList.contains("d-none") &&
      (!artworkFile.files || artworkFile.files.length === 0)
    ) {
      artworkUpload.classList.add("is-valid");
      return true;
    }

    if (!artworkFile.files || artworkFile.files.length === 0) {
      if (!isEditMode) {
        // Only show error for new forms
        artworkUpload.classList.add("is-invalid");
        artworkFileError.textContent = "Please select an artwork file.";
        artworkFileError.style.display = "block";
        return false;
      }
      return true; // Valid for edit mode without new file
    }

    const file = artworkFile.files[0];
    const allowedTypes = ["image/jpeg", "image/jpg", "image/png"];
    const maxSize = 10 * 1024 * 1024;

    if (!allowedTypes.includes(file.type)) {
      artworkUpload.classList.add("is-invalid");
      artworkFileError.textContent =
        "Please select a valid image file (JPG, JPEG, or PNG).";
      artworkFileError.style.display = "block";
      return false;
    }

    if (file.size > maxSize) {
      artworkUpload.classList.add("is-invalid");
      artworkFileError.textContent = "File size should not exceed 10MB.";
      artworkFileError.style.display = "block";
      return false;
    }

    artworkUpload.classList.add("is-valid");
    return true;
  }

  // FIXED: Audio validation for edit mode
  function validateAudioFile() {
    const audioFile = document.getElementById("audioFile");
    const audioFileError = document.getElementById("audioFileError");
    const audioUpload = document.getElementById("audioUpload");
    const audioPreviewContainer = document.getElementById(
      "audioPreviewContainer"
    );

    if (!audioFile || !audioUpload) return true;

    audioUpload.classList.remove("is-invalid", "is-valid");
    if (audioFileError) {
      audioFileError.textContent = "";
      audioFileError.style.display = "none";
    }

    // FIXED: In edit mode, if preview exists and no new file selected, it's valid
    if (
      isEditMode &&
      audioPreviewContainer &&
      !audioPreviewContainer.classList.contains("d-none") &&
      (!audioFile.files || audioFile.files.length === 0)
    ) {
      audioUpload.classList.add("is-valid");
      return true;
    }

    if (!audioFile.files || audioFile.files.length === 0) {
      if (!isEditMode) {
        // Only show error for new forms
        audioUpload.classList.add("is-invalid");
        if (audioFileError) {
          audioFileError.textContent = "Please select an audio file.";
          audioFileError.style.display = "block";
        }
        return false;
      }
      return true; // Valid for edit mode without new file
    }

    if (typeof validateAudioFileInternal === "function") {
      const isValid = validateAudioFileInternal(audioFile.files[0]);
      if (isValid) {
        audioUpload.classList.add("is-valid");
      } else {
        audioUpload.classList.add("is-invalid");
      }
      return isValid;
    }

    return true;
  }

  function validateStep4Dates() {
    const releaseDate = document.getElementById("releaseDate");
    const preSaleDate = document.getElementById("preSaleDate");
    const originalReleaseDate = document.getElementById("originalReleaseDate");

    let isValid = true;

    const rdValue = releaseDate?.value ? new Date(releaseDate.value) : null;
    const psdValue = preSaleDate?.value ? new Date(preSaleDate.value) : null;
    const ordValue = originalReleaseDate?.value
      ? new Date(originalReleaseDate.value)
      : null;

    FormValidator.hideError(preSaleDate);
    FormValidator.hideError(originalReleaseDate);

    if (rdValue && ordValue && ordValue > rdValue) {
      FormValidator.showError(
        originalReleaseDate,
        "Original release date cannot be after the release date."
      );
      isValid = false;
    }

    if (psdValue && rdValue && psdValue >= rdValue) {
      FormValidator.showError(
        preSaleDate,
        "Pre-sale date must be before the release date."
      );
      isValid = false;
    }

    return isValid;
  }

  function validateStoreSelection() {
    const checkedCount = document.querySelectorAll(
      'input[name="stores[]"]:checked'
    ).length;
    const errorDiv = document.getElementById("storesError");

    if (checkedCount === 0) {
      if (errorDiv) errorDiv.style.display = "block";
      return false;
    } else {
      if (errorDiv) errorDiv.style.display = "none";
      return true;
    }
  }

  const stepValidators = {
    1: createStepValidator(step1ValidationRules, 1),
    2: createStepValidator(step2ValidationRules, 2),
    3: createStepValidator(step3ValidationRules, 3),
    4: createStepValidator(step4ValidationRules, 4),
    5: createStepValidator(step5ValidationRules, 5),
  };

  // Navigation event listeners
  document.querySelectorAll(".next-step").forEach((btn) => {
    btn.addEventListener("click", function () {
      const nextStep = parseInt(this.dataset.next, 10);

      if (stepValidators[currentStep] && !stepValidators[currentStep]()) {
        console.log(`Step ${currentStep} validation failed`);
        return;
      }

      if (nextStep <= totalSteps) {
        showStep(nextStep);
      }
    });
  });

  document.querySelectorAll(".prev-step").forEach((btn) => {
    btn.addEventListener("click", function () {
      const prevStep = parseInt(this.dataset.prev, 10);
      if (prevStep >= 1) {
        showStep(prevStep);
      }
    });
  });

  document.querySelectorAll(".step").forEach((step) => {
    step.addEventListener("click", function () {
      const stepNum = parseInt(this.dataset.step, 10);
      if (stepNum >= 1 && stepNum <= totalSteps) {
        showStep(stepNum);
      }
    });
  });

  // REJECTION MODAL HANDLERS
  const rejectBtn = document.getElementById('rejectBtn');
  const confirmRejectBtn = document.getElementById('confirmRejectBtn');
  const rejectionMessageInput = document.getElementById('rejectionMessage');
  const rejectionMessageError = document.getElementById('rejectionMessageError');

  // Open rejection modal
  if (rejectBtn) {
    rejectBtn.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      
      if (rejectionModal) {
        rejectionModal.show();
      }
    });
  }

  // Handle rejection confirmation
  if (confirmRejectBtn) {
    confirmRejectBtn.addEventListener('click', function() {
      const message = rejectionMessageInput.value.trim();
      
      // Validate message
      if (!message) {
        rejectionMessageInput.classList.add('is-invalid');
        rejectionMessageError.style.display = 'block';
        return;
      }
      
      // Clear validation
      rejectionMessageInput.classList.remove('is-invalid');
      rejectionMessageError.style.display = 'none';
      
      // Store rejection message
      rejectionMessage = message;
      
      // Set submitting button data for rejection
      submittingButton = {
        name: 'status',
        value: '4'
      };
      
      // Close modal
      if (rejectionModal) {
        rejectionModal.hide();
      }
      
      // Trigger form submission
      const form = document.getElementById('releaseForm');
      if (form) {
        const submitEvent = new Event('submit');
        form.dispatchEvent(submitEvent);
      }
    });
  }

  // Clear validation when user types
  if (rejectionMessageInput) {
    rejectionMessageInput.addEventListener('input', function() {
      if (this.value.trim()) {
        this.classList.remove('is-invalid');
        rejectionMessageError.style.display = 'none';
      }
    });
  }

  // CRITICAL FIX: Capture submit button clicks BEFORE form submission
  document.addEventListener('click', function(e) {
    if (e.target.type === 'submit' && e.target.form && e.target.form.id === 'releaseForm') {
      submittingButton = {
        name: e.target.name,
        value: e.target.value
      };
      console.log('CAPTURED SUBMIT BUTTON:', submittingButton);
    }
  });

  // File upload handlers
  const audioUpload = document.getElementById("audioUpload");
  const audioFile = document.getElementById("audioFile");

  if (audioUpload && audioFile) {
    const newAudioUpload = audioUpload.cloneNode(true);
    audioUpload.parentNode.replaceChild(newAudioUpload, audioUpload);
    let isAudioProcessing = false;

    newAudioUpload.addEventListener("click", function (e) {
      if (isAudioProcessing) return false;
      isAudioProcessing = true;
      e.preventDefault();
      e.stopPropagation();
      audioFile.click();
      setTimeout(() => {
        isAudioProcessing = false;
      }, 1000);
      return false;
    });

    audioFile.addEventListener("change", function (e) {
      if (e.target.files && e.target.files.length > 0) {
        const file = e.target.files[0];
        if (validateAudioFileInternal(file)) {
          const reader = new FileReader();
          reader.onload = function (event) {
            const audioPreview = document.getElementById("audioPreview");
            const audioPreviewContainer = document.getElementById(
              "audioPreviewContainer"
            );
            const audioFileName = document.getElementById("audioFileName");
            const audioFileSize = document.getElementById("audioFileSize");

            if (audioPreview && audioPreviewContainer) {
              audioPreview.src = event.target.result;
              audioPreviewContainer.classList.remove("d-none");

              if (audioFileName) {
                audioFileName.textContent = file.name;
              }
              if (audioFileSize) {
                const sizeInMB = (file.size / (1024 * 1024)).toFixed(2);
                audioFileSize.textContent = `Size: ${sizeInMB} MB`;
              }

              if (typeof feather !== "undefined") {
                feather.replace();
              }
            }
          };
          reader.readAsDataURL(file);
        } else {
          const audioPreviewContainer = document.getElementById(
            "audioPreviewContainer"
          );
          if (audioPreviewContainer) {
            audioPreviewContainer.classList.add("d-none");
          }
        }
      }
    });
  }

  function validateAudioFileInternal(file) {
    if (!file) return false;

    const allowedAudioTypes = ["audio/wav", "audio/wave", "audio/x-wav"];
    const maxAudioSize = 50 * 1024 * 1024;

    const fileExtension = file.name.split(".").pop().toLowerCase();
    const isValidType = allowedAudioTypes.includes(file.type);
    const isValidExtension = fileExtension === "wav";

    if (!isValidType && !isValidExtension) {
      alert("Only WAV files are accepted!\n\nPlease upload a WAV audio file.");
      return false;
    }

    if (!isValidExtension) {
      alert(
        "Only .wav files are accepted!\n\nPlease make sure your file has a .wav extension."
      );
      return false;
    }

    if (file.size > maxAudioSize) {
      alert("File size too large!\n\nYour WAV file should not exceed 50MB.");
      return false;
    }

    const minAudioSize = 1024;
    if (file.size < minAudioSize) {
      alert(
        "File appears to be empty or corrupted!\n\nPlease select a valid WAV audio file."
      );
      return false;
    }

    return true;
  }

  // Artwork upload handler
  const artworkUpload = document.getElementById("artworkUpload");
  const artworkFile = document.getElementById("artworkFile");

  if (artworkUpload && artworkFile) {
    const newArtworkUpload = artworkUpload.cloneNode(true);
    artworkUpload.parentNode.replaceChild(newArtworkUpload, artworkUpload);
    let isProcessing = false;

    newArtworkUpload.addEventListener("click", function (e) {
      if (isProcessing) return false;
      isProcessing = true;
      e.preventDefault();
      e.stopPropagation();
      artworkFile.click();
      setTimeout(() => {
        isProcessing = false;
      }, 1000);
      return false;
    });

    artworkFile.addEventListener("change", function (e) {
      if (e.target.files && e.target.files.length > 0) {
        const file = e.target.files[0];
        if (validateArtworkFileInternal(file)) {
          const reader = new FileReader();
          reader.onload = function (event) {
            const preview = document.getElementById("artworkPreview");
            if (preview) {
              preview.src = event.target.result;
              preview.classList.remove("d-none");
            }
          };
          reader.readAsDataURL(file);
        }
      }
    });
  }

  function validateArtworkFileInternal(file) {
    if (!file) return false;

    const allowedTypes = ["image/jpeg", "image/jpg", "image/png"];
    const maxSize = 10 * 1024 * 1024;

    if (!allowedTypes.includes(file.type)) {
      alert("Please select a valid image file (JPG, JPEG, or PNG).");
      return false;
    }

    if (file.size > maxSize) {
      alert("File size should not exceed 10MB.");
      return false;
    }

    return true;
  }

  // Toggle all stores
  document.querySelectorAll(".toggle-all").forEach((button) => {
    button.addEventListener("click", function () {
      const targetId = this.dataset.target;
      const container = document.getElementById(targetId);
      if (!container) return;

      const checkboxes = container.querySelectorAll('input[type="checkbox"]');
      if (checkboxes.length === 0) return;

      const allChecked = Array.from(checkboxes).every((cb) => cb.checked);
      checkboxes.forEach((cb) => {
        cb.checked = !allChecked;
      });

      if (targetId === "freeStores") {
        validateStoreSelection();
      }
    });
  });

  // FIXED: Form submission with proper button capture and rejection message handling
  document
    .getElementById("releaseForm")
    .addEventListener("submit", function (e) {
      e.preventDefault();

      console.log('Form submission started');
      console.log('Submitting button:', submittingButton);
      console.log('Rejection message:', rejectionMessage);

      // Validate all steps first (skip for rejection)
      if (!submittingButton || submittingButton.value !== '4') {
        let allStepsValid = true;
        for (let step = 1; step <= totalSteps; step++) {
          if (stepValidators[step] && !stepValidators[step]()) {
            allStepsValid = false;
            showStep(step);
            break;
          }
        }

        if (!allStepsValid) {
          alert("Please complete all required fields before submitting.");
          submittingButton = null;
          return;
        }
      }

      const form = e.target;
      const formData = new FormData(form);

      // CRITICAL FIX: Use the captured button data
      if (submittingButton && submittingButton.name && submittingButton.value) {
        // Remove any existing status fields first
        formData.delete('status');
        // Add the clicked button's status
        formData.set(submittingButton.name, submittingButton.value);
        console.log('ADDED BUTTON STATUS:', submittingButton.name, '=', submittingButton.value);
        
        // Add rejection message if this is a rejection
        if (submittingButton.value === '4' && rejectionMessage) {
          formData.set('message', rejectionMessage);
          console.log('ADDED REJECTION MESSAGE:', rejectionMessage);
        }
      } else {
        // Fallback: try activeElement
        const activeBtn = document.activeElement;
        if (activeBtn && activeBtn.type === 'submit' && activeBtn.name && activeBtn.value) {
          formData.delete('status');
          formData.set(activeBtn.name, activeBtn.value);
          console.log('FALLBACK - ADDED ACTIVE BUTTON:', activeBtn.name, '=', activeBtn.value);
        } else {
          // Last resort: default status
          console.log('NO BUTTON CAPTURED - USING DEFAULT STATUS 1');
          formData.set('status', '1');
        }
      }

      // Debug: Log all FormData contents
      console.log("=== FINAL FORMDATA CONTENTS ===");
      for (let [key, value] of formData.entries()) {
        if (key === 'status' || key.includes('status') || key === 'message') {
          console.log('🔴 ' + key + ": " + value);
        } else {
          console.log(key + ": " + value);
        }
      }

      // Show loading state
      const submitBtns = form.querySelectorAll('button[type="submit"], button#rejectBtn');
      const originalButtonContent = new Map();

      submitBtns.forEach((btn) => {
        originalButtonContent.set(btn, btn.innerHTML);
        btn.disabled = true;
        btn.innerHTML =
          '<i class="spinner-border spinner-border-sm me-1"></i> Processing...';
      });

      fetch(form.action, {
        method: "POST",
        body: formData,
        headers: {
          "X-Requested-With": "XMLHttpRequest",
        },
      })
        .then((response) => {
          console.log("Response status:", response.status);

          if (!response.ok) {
            throw new Error(`HTTP ${response.status}: ${response.statusText}`);
          }

          return response.text();
        })
        .then((text) => {
          console.log("Raw response:", text);

          if (!text || text.trim() === "") {
            return {
              success: true,
              message: "Release processed successfully!",
            };
          }

          try {
            const parsed = JSON.parse(text);
            console.log("Parsed JSON:", parsed);
            return parsed;
          } catch (parseError) {
            console.log("JSON parse failed:", parseError.message);
            throw new Error("Invalid JSON response from server");
          }
        })
        .then((data) => {
          console.log("Processing response data:", data);

          if (!data) {
            throw new Error("No response data received from server");
          }

          if (data.success === true) {
            const message = data.message || "Release processed successfully!";
            alert(message);
            window.location.href = data.redirect || "/superadmin/releases";
          } else if (data.success === false) {
            throw new Error(data.error || data.message || "Processing failed");
          } else if (data.message && !data.hasOwnProperty("success")) {
            alert(data.message);
            window.location.href = data.redirect || "/superadmin/releases";
          } else {
            console.warn("Unexpected response format:", data);
            throw new Error("Unexpected response format from server");
          }
        })
        .catch((error) => {
          console.error("Submission error:", error);
          alert("Error: " + error.message);

          // Restore buttons
          submitBtns.forEach((btn) => {
            btn.disabled = false;
            const originalContent = originalButtonContent.get(btn);
            if (originalContent) {
              btn.innerHTML = originalContent;
            } else {
              // Fallback restoration
              if (btn.innerHTML.includes("Approve") || btn.name === 'status' && btn.value === '5') {
                btn.innerHTML = '<i data-feather="check" class="me-1"></i> Approve';
              } else if (btn.innerHTML.includes("Reject") || btn.id === 'rejectBtn') {
                btn.innerHTML = '<i data-feather="x" class="me-1"></i> Reject';
              } else {
                btn.innerHTML = '<i data-feather="check" class="me-1"></i> Submit Release';
              }
            }
          });

          // Re-initialize feather icons
          if (typeof feather !== "undefined") {
            feather.replace();
          }
        })
        .finally(() => {
          // Reset the captured button and rejection message
          submittingButton = null;
          rejectionMessage = null;
        });
    });
});

//release page reject modal code 
document.addEventListener("DOMContentLoaded", function () {
    const rejectionMessageInput = document.getElementById('rejectionMessage');
    const charCount = document.getElementById('charCount');
    const confirmRejectBtn = document.getElementById('confirmRejectBtn');
    const rejectionMessageError = document.getElementById('rejectionMessageError');
    const rejectionModal = document.getElementById('rejectionModal');
    const rejectBtn = document.getElementById('rejectBtn'); // reject button on page

    // Character counter
    if (rejectionMessageInput && charCount) {
        rejectionMessageInput.addEventListener('input', function() {
            const currentLength = this.value.length;
            charCount.textContent = currentLength;
            
            if (confirmRejectBtn) {
                if (currentLength >= 10) {
                    confirmRejectBtn.disabled = false;
                    this.classList.remove('is-invalid');
                    rejectionMessageError.style.display = 'none';
                } else {
                    confirmRejectBtn.disabled = true;
                }
            }
        });
    }

    // Enhanced validation for rejection confirmation
    if (confirmRejectBtn) {
        confirmRejectBtn.addEventListener('click', function() {
            const message = rejectionMessageInput.value.trim();
            
            if (!message || message.length < 10) {
                rejectionMessageInput.classList.add('is-invalid');
                rejectionMessageError.textContent = 'Please provide a rejection reason (minimum 10 characters).';
                rejectionMessageError.style.display = 'block';
                rejectionMessageInput.focus();
                return;
            }
            
            rejectionMessageInput.classList.remove('is-invalid');
            rejectionMessageError.style.display = 'none';
            
            window.rejectionMessage = message;
            window.submittingButton = {
                name: 'status',
                value: '4'
            };
            
            // Close modal
            const modal = bootstrap.Modal.getInstance(rejectionModal);
            if (modal) {
                modal.hide();
            }
            
            // Trigger form submission
            const form = document.getElementById('releaseForm');
            if (form) {
                const submitEvent = new Event('submit');
                form.dispatchEvent(submitEvent);
            }
        });
        
        confirmRejectBtn.disabled = true;
    }

    // Reset modal when closed
    if (rejectionModal) {
        rejectionModal.addEventListener('hidden.bs.modal', function () {
            if (rejectionMessageInput) {
                rejectionMessageInput.value = '';
                rejectionMessageInput.classList.remove('is-invalid');
            }
            if (rejectionMessageError) {
                rejectionMessageError.style.display = 'none';
            }
            if (charCount) {
                charCount.textContent = '0';
            }
            if (confirmRejectBtn) {
                confirmRejectBtn.disabled = true;
            }
        });

        rejectionModal.addEventListener('shown.bs.modal', function () {
            if (typeof feather !== "undefined") {
                feather.replace();
            }
            if (rejectionMessageInput) {
                rejectionMessageInput.focus();
            }
        });
    }

    // ✅ OPEN modal when Reject button is clicked
    if (rejectBtn) {
        rejectBtn.addEventListener('click', function () {
            const modal = new bootstrap.Modal(rejectionModal);
            modal.show();
        });
    }
});


//User Account Creation Js
document.addEventListener("DOMContentLoaded", function () {
  const start = document.getElementById("startDate");
  const end = document.getElementById("endDate");
  if (!start || !end) return;

  const form = start.closest("form");

  function syncMinMax() {
    if (start.value) end.min = start.value; else end.removeAttribute("min");
    if (end.value) start.max = end.value; else start.removeAttribute("max");
  }

  function validateDates(showBubble = false) {
    let ok = true;

    start.setCustomValidity("");
    end.setCustomValidity("");

    if (start.value && end.value) {
      const s = new Date(start.value);
      const e = new Date(end.value);

      if (s >= e) {   // disallow equal OR greater
        start.setCustomValidity("Start date must be before end date.");
        end.setCustomValidity("End date must be after start date.");
        ok = false;
      }
    }

    syncMinMax();

    if (showBubble) {
      (document.activeElement === start ? start : end).reportValidity();
    }

    return ok;
  }

  ["input", "change", "blur"].forEach(evt => {
    start.addEventListener(evt, () => validateDates(evt !== "blur"));
    end.addEventListener(evt, () => validateDates(evt !== "blur"));
  });

  if (form) {
    form.addEventListener("submit", function (e) {
      const ok = validateDates(true) && form.checkValidity();
      if (!ok) {
        e.preventDefault();
        e.stopPropagation();
      }
      form.classList.add("was-validated");
    });
  }

  syncMinMax();
});

//Toggle Password  Functionlity
document.addEventListener("DOMContentLoaded", () => {
  const passwordInput = document.getElementById("password");
  const togglePassword = document.getElementById("togglePassword");
  const toggleIcon = document.getElementById("toggleIcon");

  // run only if all elements exist
  if (passwordInput && togglePassword && toggleIcon) {
    togglePassword.addEventListener("click", function () {
      const isPassword = passwordInput.type === "password";
      passwordInput.type = isPassword ? "text" : "password";

      toggleIcon.classList.toggle("bi-eye");
      toggleIcon.classList.toggle("bi-eye-slash");
    });
  }
});

  //change password js
$(document).on("click", "#changePasswordBtn", function () {
    let oldPass = $("#old_password").val();
    let newPass = $("#new_password").val();
    let confirmPass = $("#confirm_password").val();

    $.ajax({
      url: "/profile/changePassword",
      method: "POST",
      data: {
        old_password: oldPass,
        new_password: newPass,
        confirm_password: confirmPass,
      },
      dataType: "json",
      success: function (response) {
        let alertBox = $("#passwordAlert");
        if (response.status === "success") {
          alertBox.html(
            '<div class="alert alert-success">' + response.message + "</div>"
          );
          $("#old_password, #new_password, #confirm_password").val("");
        } else {
          alertBox.html(
            '<div class="alert alert-danger">' + response.message + "</div>"
          );
        }
      },
      error: function () {
        $("#passwordAlert").html(
          '<div class="alert alert-danger">Something went wrong.</div>'
        );
      },
    });
  });

//export releases
  document.getElementById("exportCsvBtn").addEventListener("click", function () {
    window.location.href = "/superadmin/releases/export-csv";
});

document.addEventListener('DOMContentLoaded', function() {
    // Initialize Select2 only for admin/superadmin dropdown
    if (document.querySelector('.searchable-select')) {
        $('.searchable-select').select2({
            placeholder: 'Search and select...',
            allowClear: true,
            width: '100%',
            theme: 'default',
            minimumInputLength: 0,
            matcher: function(params, data) {
                if ($.trim(params.term) === '') {
                    return data;
                }
                if (typeof data.text === 'undefined') {
                    return null;
                }
                var searchTerm = params.term.toLowerCase();
                var optionText = data.text.toLowerCase();
                if (optionText.indexOf(searchTerm) > -1) {
                    return $.extend({}, data, true);
                }
                return null;
            },
            templateResult: function(data) {
                if (!data.id) return data.text;
                return $('<span></span>').text(data.text);
            },
            templateSelection: function(data) {
                return data.text || data.placeholder;
            }
        });

        // Remove invalid style when user opens dropdown
        $('.searchable-select').on('select2:open', function() {
            $(this).removeClass('is-invalid');
            $(this).next('.select2-container').find('.select2-selection').removeClass('is-invalid');
        });

        // Validate each select on change
        $('.searchable-select').on('change', function() {
            validateSelect($(this));
        });

        // Function to validate a select2 element and show error message
        function validateSelect($select) {
            var value = $select.val();
            var id = $select.attr('id'); // e.g., labelName, artist, featuringArtist
            var errorId = '#' + id + 'Error';

            if ($select.prop('required') && (!value || value === '')) {
                $select.addClass('is-invalid');
                $select.next('.select2-container').find('.select2-selection').addClass('is-invalid');
                $(errorId).show().text('Please select a ' + id.replace(/([A-Z])/g, ' $1').toLowerCase() + '.');
                return false;
            } else {
                $select.removeClass('is-invalid');
                $select.next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                $(errorId).hide().text('');
                return true;
            }
        }

        // Validate all required select2 fields on form submit
        $('form').on('submit', function(e) {
            var isValid = true;

            $('.searchable-select[required]').each(function() {
                if (!validateSelect($(this))) {
                    isValid = false;
                }
            });

            if (!isValid) {
                e.preventDefault();
                return false;
            }
        });
    }
});
