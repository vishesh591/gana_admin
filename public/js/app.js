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
let currentStep = 1;
const totalSteps = 5;

// Step titles for updating the header
const stepTitles = {
  1: "Metadata",
  2: "Uploads",
  3: "Stores",
  4: "Date & Price",
  5: "Terms",
};

// Initialize feather icons
if (typeof feather !== "undefined") {
  feather.replace();
}

// Function to update step indicator
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

  // Update progress line width
  const progressWidth = ((step - 1) / (totalSteps - 1)) * 100;
  progressLine.style.width = progressWidth + "%";
}

// Function to show specific step content
function showStep(step) {
  // Hide all step contents
  document.querySelectorAll(".step-content").forEach((content) => {
    content.classList.remove("active");
  });

  // Show the target step
  setTimeout(() => {
    document.getElementById(`step-${step}`).classList.add("active");
  }, 150);

  // Update step indicator
  updateStepIndicator(step);

  // Update page title
  document.querySelector(".current-step-title").textContent = stepTitles[step];

  currentStep = step;
}

// Next step functionality
document.querySelectorAll(".next-step").forEach((btn) => {
  btn.addEventListener("click", function () {
    const nextStep = parseInt(this.dataset.next);
    if (nextStep <= totalSteps) {
      showStep(nextStep);
    }
  });
});

// Previous step functionality
document.querySelectorAll(".prev-step").forEach((btn) => {
  btn.addEventListener("click", function () {
    const prevStep = parseInt(this.dataset.prev);
    if (prevStep >= 1) {
      showStep(prevStep);
    }
  });
});

// Click on step indicator to navigate
document.querySelectorAll(".step").forEach((step) => {
  step.addEventListener("click", function () {
    const stepNum = parseInt(this.dataset.step);
    showStep(stepNum);
  });
});

// File upload functionality
document.getElementById("artworkUpload").addEventListener("click", function () {
  document.getElementById("artworkFile").click();
});

  document.getElementById('audioUpload').addEventListener('click', function() {
            document.getElementById('audioFile').click();
        });

document.getElementById("artworkFile").addEventListener("change", function (e) {
  const file = e.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      const preview = document.getElementById("artworkPreview");
      preview.src = e.target.result;
      preview.classList.remove("d-none");
    };
    reader.readAsDataURL(file);
  }
});

// Form submission
document.getElementById("releaseForm").addEventListener("submit", function (e) {
  alert("Release submitted successfully!");
});

// Initialize the form
document.addEventListener("DOMContentLoaded", function () {
  updateStepIndicator(1);
});

// Show image preview
document
  .getElementById("imageInput")
  .addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        const img = document.getElementById("imagePreview");
        img.src = e.target.result;
        img.style.display = "block";
      };
      reader.readAsDataURL(file);
    }
  });


document.addEventListener('DOMContentLoaded', function () {
    const releaseModal = document.getElementById('releaseModal');
    releaseModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const releaseId = button.getAttribute('data-id');
        console.log('Release ID:', releaseId);
        fetch(`superadmin/api/releases/${releaseId}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('releaseTitle').textContent = data.title;
                document.getElementById('releaseArtistHeader').textContent = data.author;
                document.getElementById('releaseArtist').textContent = data.author;
                document.getElementById('releaseUpc').textContent = data.upc_ean;
                document.getElementById('releaseDate').textContent = data.created_at;
                document.getElementById('releaseLabel').textContent = data.label;
                document.getElementById('releaseCatno').textContent = data.cat_no;
                document.getElementById('releaseFeat').textContent = data.featuring;
                document.getElementById('releaseLyricist').textContent = data.lyricists;

            });
    });
});


