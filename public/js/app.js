function _typeof(e){return(_typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function _classCallCheck(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _defineProperties(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,_toPropertyKey(r.key),r)}}function _createClass(e,t,n){return t&&_defineProperties(e.prototype,t),n&&_defineProperties(e,n),Object.defineProperty(e,"prototype",{writable:!1}),e}function _defineProperty(e,t,n){return(t=_toPropertyKey(t))in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function _toPropertyKey(e){e=_toPrimitive(e,"string");return"symbol"==_typeof(e)?e:e+""}function _toPrimitive(e,t){if("object"!=_typeof(e)||!e)return e;var n=e[Symbol.toPrimitive];if(void 0===n)return("string"===t?String:Number)(e);n=n.call(e,t||"default");if("object"!=_typeof(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}var App=(()=>_createClass(function e(){_classCallCheck(this,e),_defineProperty(this,"initControls",function(){function e(){document.webkitIsFullScreen||document.mozFullScreen||document.msFullscreenElement||$("body").removeClass("fullscreen-enable")}$('[data-toggle="fullscreen"]').on("click",function(e){e.preventDefault(),$("body").toggleClass("fullscreen-enable"),document.fullscreenElement||document.mozFullScreenElement||document.webkitFullscreenElement?document.cancelFullScreen?document.cancelFullScreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitCancelFullScreen&&document.webkitCancelFullScreen():document.documentElement.requestFullscreen?document.documentElement.requestFullscreen():document.documentElement.mozRequestFullScreen?document.documentElement.mozRequestFullScreen():document.documentElement.webkitRequestFullscreen&&document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)}),document.addEventListener("fullscreenchange",e),document.addEventListener("webkitfullscreenchange",e),document.addEventListener("mozfullscreenchange",e)})},[{key:"initComponents",value:function(){Waves.init(),feather.replace();[].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function(e){return new bootstrap.Popover(e)}),[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e){return new bootstrap.Tooltip(e)}),[].slice.call(document.querySelectorAll(".toast")).map(function(e){return new bootstrap.Toast(e)});var e=document.getElementById("toastPlacement"),r=(e&&document.getElementById("selectToastPlacement").addEventListener("change",function(){e.dataset.originalClass||(e.dataset.originalClass=e.className),e.className=e.dataset.originalClass+" "+this.value}),document.getElementById("liveAlertPlaceholder")),t=document.getElementById("liveAlertBtn");t&&t.addEventListener("click",function(){var e,t,n;e="Nice, you triggered this alert message!",t="primary",(n=document.createElement("div")).innerHTML='<div class="alert alert-'+t+' alert-dismissible" role="alert">'+e+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>',r.append(n)})}},{key:"initMenu",value:function(){function e(){window.innerWidth<1040?t.setAttribute("data-sidebar","hidden"):t.setAttribute("data-sidebar","default")}var t=document.body,n=document.querySelector(".button-toggle-menu");n&&n.addEventListener("click",function(){"default"==t.getAttribute("data-sidebar")?t.setAttribute("data-sidebar","hidden"):t.setAttribute("data-sidebar","default")});e(),window.addEventListener("resize",e),$("#side-menu").length&&($("#side-menu li .collapse").on({"show.bs.collapse":function(e){e=$(e.target).parents(".collapse.show");$("#side-menu .collapse.show").not(e).collapse("hide")}}),$("#side-menu a").each(function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&($(this).addClass("active"),$(this).parent().addClass("menuitem-active"),$(this).parent().parent().parent().addClass("show"),$(this).parent().parent().parent().parent().addClass("menuitem-active"),"sidebar-menu"!==(e=$(this).parent().parent().parent().parent().parent().parent()).attr("id")&&e.addClass("show"),$(this).parent().parent().parent().parent().parent().parent().parent().addClass("menuitem-active"),"wrapper"!==(e=$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent()).attr("id")&&e.addClass("show"),(e=$(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent()).is("body")||e.addClass("menuitem-active"))}))}},{key:"init",value:function(){this.initComponents(),this.initMenu(),this.initControls()}}]))();(new App).init();


document.addEventListener('DOMContentLoaded', function() {

    // --- Page-Specific Guard Clause ---
    // First, find the unique container for the ownership data page.
    const ownershipPageContainer = document.querySelector('.admin-ownership-data-page');

    // If this container doesn't exist, stop executing the rest of the script.
    if (!ownershipPageContainer) {
        return;
    }

    // --- If we are on the correct page, proceed with the original script ---

    // --- DATA ---
    const conflictRequests = [
        { id: 1, category: 'Ownership conflict', assetTitle: 'Cosmic Drift', artist: 'Astro Beats', assetId: '90736897913', upc: '198009123456', isrc: 'USAT22312345', otherParty: 'The Orchard', dailyViews: '79K', expiry: '2 days', status: 'Action Required', albumCoverUrl: 'https://placehold.co/80x80/3498db/ffffff?text=C' },
        { id: 2, category: 'Policy', assetTitle: 'Ocean Tides', artist: 'Deep Wave', assetId: '3478239381', upc: '198009654321', isrc: 'USAT22354321', otherParty: 'Believe', dailyViews: '3K', expiry: '-', status: 'Resolved', albumCoverUrl: 'https://placehold.co/80x80/1abc9c/ffffff?text=O' },
        { id: 3, category: 'Ownership conflict', assetTitle: 'City Lights', artist: 'Urban Glow', assetId: '3478239381', upc: '198009789012', isrc: 'USAT22398765', otherParty: 'CD Baby', dailyViews: '1.2K', expiry: '15 days', status: 'In Review', albumCoverUrl: 'https://placehold.co/80x80/9b59b6/ffffff?text=C' },
        { id: 4, category: 'Metadata Error', assetTitle: 'Desert Mirage', artist: 'Sahara Echo', assetId: '89321756430', upc: '198001112233', isrc: 'USAT22445566', otherParty: 'TuneCore', dailyViews: '58K', expiry: '5 days', status: 'Action Required', albumCoverUrl: 'https://placehold.co/80x80/e67e22/ffffff?text=D' },
        { id: 5, category: 'Ownership conflict', assetTitle: 'Electric Horizon', artist: 'Volt Squad', assetId: '98574623109', upc: '198002244466', isrc: 'USAT22449900', otherParty: 'The Orchard', dailyViews: '12K', expiry: '7 days', status: 'In Review', albumCoverUrl: 'https://placehold.co/80x80/f39c12/ffffff?text=E' },
        { id: 6, category: 'Policy', assetTitle: 'Rainforest Lullaby', artist: 'Nature Pulse', assetId: '76234589012', upc: '198003333444', isrc: 'USAT22300011', otherParty: 'Believe', dailyViews: '620', expiry: '-', status: 'Resolved', albumCoverUrl: 'https://placehold.co/80x80/2ecc71/ffffff?text=R' },
        { id: 7, category: 'Metadata Error', assetTitle: 'Moonlit Roads', artist: 'Midnight Cruiser', assetId: '67392018376', upc: '198004556677', isrc: 'USAT22556677', otherParty: 'DistroKid', dailyViews: '4.8K', expiry: '10 days', status: 'Action Required', albumCoverUrl: 'https://placehold.co/80x80/34495e/ffffff?text=M' },
        { id: 8, category: 'Ownership conflict', assetTitle: 'Neon Nightfall', artist: 'Retro Blaze', assetId: '38472019487', upc: '198005778899', isrc: 'USAT22668899', otherParty: 'Amuse', dailyViews: '22K', expiry: '3 days', status: 'In Review', albumCoverUrl: 'https://placehold.co/80x80/e74c3c/ffffff?text=N' },
        { id: 9, category: 'Metadata Error', assetTitle: 'Frozen Echo', artist: 'Icy Vibe', assetId: '28476019283', upc: '198006998877', isrc: 'USAT22779900', otherParty: 'RouteNote', dailyViews: '930', expiry: '1 day', status: 'Action Required', albumCoverUrl: 'https://placehold.co/80x80/2980b9/ffffff?text=F' },
        { id: 10, category: 'Policy', assetTitle: 'Golden Skyline', artist: 'Sunset State', assetId: '18723908473', upc: '198007112233', isrc: 'USAT22880011', otherParty: 'Repost by SoundCloud', dailyViews: '9.5K', expiry: '-', status: 'Resolved', albumCoverUrl: 'https://placehold.co/80x80/f1c40f/ffffff?text=G' }
    ];

    const territoriesByRegion = { "Africa": [ {name: "Algeria", code: "DZ"}, {name: "Angola", code: "AO"}, {name: "Benin", code: "BJ"}, {name: "Botswana", code: "BW"}, {name: "Burkina Faso", code: "BF"}, {name: "Burundi", code: "BI"}, {name: "Cabo Verde", code: "CV"}, {name: "Cameroon", code: "CM"}, {name: "Central African Republic", code: "CF"}, {name: "Chad", code: "TD"}, {name: "Comoros", code: "KM"}, {name: "Congo", code: "CG"}, {name: "Congo (DRC)", code: "CD"}, {name: "Côte d'Ivoire", code: "CI"}, {name: "Djibouti", code: "DJ"}, {name: "Egypt", code: "EG"}, {name: "Equatorial Guinea", code: "GQ"}, {name: "Eritrea", code: "ER"}, {name: "Eswatini", code: "SZ"}, {name: "Ethiopia", code: "ET"}, {name: "Gabon", code: "GA"}, {name: "Gambia", code: "GM"}, {name: "Ghana", code: "GH"}, {name: "Guinea", code: "GN"}, {name: "Guinea-Bissau", code: "GW"}, {name: "Kenya", code: "KE"}, {name: "Lesotho", code: "LS"}, {name: "Liberia", code: "LR"}, {name: "Libya", code: "LY"}, {name: "Madagascar", code: "MG"}, {name: "Malawi", code: "MW"}, {name: "Mali", code: "ML"}, {name: "Mauritania", code: "MR"}, {name: "Mauritius", code: "MU"}, {name: "Mayotte", code: "YT"}, {name: "Morocco", code: "MA"}, {name: "Mozambique", code: "MZ"}, {name: "Namibia", code: "NA"}, {name: "Niger", code: "NE"}, {name: "Nigeria", code: "NG"}, {name: "Réunion", code: "RE"}, {name: "Rwanda", code: "RW"}, {name: "Saint Helena", code: "SH"}, {name: "Sao Tome and Principe", code: "ST"}, {name: "Senegal", code: "SN"}, {name: "Seychelles", code: "SC"}, {name: "Sierra Leone", code: "SL"}, {name: "Somalia", code: "SO"}, {name: "South Africa", code: "ZA"}, {name: "South Sudan", code: "SS"}, {name: "Sudan", code: "SD"}, {name: "Tanzania", code: "TZ"}, {name: "Togo", code: "TG"}, {name: "Tunisia", code: "TN"}, {name: "Uganda", code: "UG"}, {name: "Zambia", code: "ZM"}, {name: "Zimbabwe", code: "ZW"} ], "Antarctica": [ {name: "Antarctica", code: "AQ"}, {name: "French Southern Territories", code: "TF"}, {name: "South Georgia and the South Sandwich Islands", code: "GS"} ], "Asia": [ {name: "Afghanistan", code: "AF"}, {name: "Armenia", code: "AM"}, {name: "Azerbaijan", code: "AZ"}, {name: "Bahrain", code: "BH"}, {name: "Bangladesh", code: "BD"}, {name: "Bhutan", code: "BT"}, {name: "British Indian Ocean Territory", code: "IO"}, {name: "Brunei", code: "BN"}, {name: "Cambodia", code: "KH"}, {name: "China", code: "CN"}, {name: "Cyprus", code: "CY"}, {name: "Georgia", code: "GE"}, {name: "Hong Kong", code: "HK"}, {name: "India", code: "IN"}, {name: "Indonesia", code: "ID"}, {name: "Iran", code: "IR"}, {name: "Iraq", code: "IQ"}, {name: "Israel", code: "IL"}, {name: "Japan", code: "JP"}, {name: "Jordan", code: "JO"}, {name: "Kazakhstan", code: "KZ"}, {name: "Kuwait", code: "KW"}, {name: "Kyrgyzstan", code: "KG"}, {name: "Laos", code: "LA"}, {name: "Lebanon", code: "LB"}, {name: "Macao", code: "MO"}, {name: "Malaysia", code: "MY"}, {name: "Maldives", code: "MV"}, {name: "Mongolia", code: "MN"}, {name: "Myanmar", code: "MM"}, {name: "Nepal", code: "NP"}, {name: "North Korea", code: "KP"}, {name: "Oman", code: "OM"}, {name: "Pakistan", code: "PK"}, {name: "Palestine", code: "PS"}, {name: "Philippines", code: "PH"}, {name: "Qatar", code: "QA"}, {name: "Saudi Arabia", code: "SA"}, {name: "Singapore", code: "SG"}, {name: "South Korea", code: "KR"}, {name: "Sri Lanka", code: "LK"}, {name: "Syria", code: "SY"}, {name: "Taiwan", code: "TW"}, {name: "Tajikistan", code: "TJ"}, {name: "Thailand", code: "TH"}, {name: "Timor-Leste", code: "TL"}, {name: "Turkey", code: "TR"}, {name: "Turkmenistan", code: "TM"}, {name: "United Arab Emirates", code: "AE"}, {name: "Uzbekistan", code: "UZ"}, {name: "Vietnam", code: "VN"}, {name: "Yemen", code: "YE"} ], "Europe": [ {name: "Åland Islands", code: "AX"}, {name: "Albania", code: "AL"}, {name: "Andorra", code: "AD"}, {name: "Austria", code: "AT"}, {name: "Belarus", code: "BY"}, {name: "Belgium", code: "BE"}, {name: "Bosnia and Herzegovina", code: "BA"}, {name: "Bulgaria", code: "BG"}, {name: "Croatia", code: "HR"}, {name: "Czechia", code: "CZ"}, {name: "Denmark", code: "DK"}, {name: "Estonia", code: "EE"}, {name: "Faroe Islands", code: "FO"}, {name: "Finland", code: "FI"}, {name: "France", code: "FR"}, {name: "Germany", code: "DE"}, {name: "Gibraltar", code: "GI"}, {name: "Greece", code: "GR"}, {name: "Guernsey", code: "GG"}, {name: "Holy See", code: "VA"}, {name: "Hungary", code: "HU"}, {name: "Iceland", code: "IS"}, {name: "Ireland", code: "IE"}, {name: "Isle of Man", code: "IM"}, {name: "Italy", code: "IT"}, {name: "Jersey", code: "JE"}, {name: "Latvia", code: "LV"}, {name: "Liechtenstein", code: "LI"}, {name: "Lithuania", code: "LT"}, {name: "Luxembourg", code: "LU"}, {name: "Malta", code: "MT"}, {name: "Moldova", code: "MD"}, {name: "Monaco", code: "MC"}, {name: "Montenegro", code: "ME"}, {name: "Netherlands", code: "NL"}, {name: "North Macedonia", code: "MK"}, {name: "Norway", code: "NO"}, {name: "Poland", code: "PL"}, {name: "Portugal", code: "PT"}, {name: "Romania", code: "RO"}, {name: "Russia", code: "RU"}, {name: "San Marino", code: "SM"}, {name: "Serbia", code: "RS"}, {name: "Slovakia", code: "SK"}, {name: "Slovenia", code: "SI"}, {name: "Spain", code: "ES"}, {name: "Svalbard and Jan Mayen", code: "SJ"}, {name: "Sweden", code: "SE"}, {name: "Switzerland", code: "CH"}, {name: "Ukraine", code: "UA"}, {name: "United Kingdom", code: "GB"} ], "North America": [ {name: "Anguilla", code: "AI"}, {name: "Antigua and Barbuda", code: "AG"}, {name: "Aruba", code: "AW"}, {name: "Bahamas", code: "BS"}, {name: "Barbados", code: "BB"}, {name: "Belize", code: "BZ"}, {name: "Bermuda", code: "BM"}, {name: "Bonaire", code: "BQ"}, {name: "Canada", code: "CA"}, {name: "Cayman Islands", code: "KY"}, {name: "Costa Rica", code: "CR"}, {name: "Cuba", code: "CU"}, {name: "Curaçao", code: "CW"}, {name: "Dominica", code: "DM"}, {name: "Dominican Republic", code: "DO"}, {name: "El Salvador", code: "SV"}, {name: "Greenland", code: "GL"}, {name: "Grenada", code: "GD"}, {name: "Guadeloupe", code: "GP"}, {name: "Guatemala", code: "GT"}, {name: "Haiti", code: "HT"}, {name: "Honduras", code: "HN"}, {name: "Jamaica", code: "JM"}, {name: "Martinique", code: "MQ"}, {name: "Mexico", code: "MX"}, {name: "Montserrat", code: "MS"}, {name: "Nicaragua", code: "NI"}, {name: "Panama", code: "PA"}, {name: "Puerto Rico", code: "PR"}, {name: "Saint Barthélemy", code: "BL"}, {name: "Saint Kitts and Nevis", code: "KN"}, {name: "Saint Lucia", code: "LC"}, {name: "Saint Martin", code: "MF"}, {name: "Saint Pierre and Miquelon", code: "PM"}, {name: "Saint Vincent and the Grenadines", code: "VC"}, {name: "Sint Maarten", code: "SX"}, {name: "Trinidad and Tobago", code: "TT"}, {name: "Turks and Caicos Islands", code: "TC"}, {name: "United States", code: "US"}, {name: "U.S. Virgin Islands", code: "VI"} ], "Oceania": [ {name: "American Samoa", code: "AS"}, {name: "Australia", code: "AU"}, {name: "Christmas Island", code: "CX"}, {name: "Cocos (Keeling) Islands", code: "CC"}, {name: "Cook Islands", code: "CK"}, {name: "Fiji", code: "FJ"}, {name: "French Polynesia", code: "PF"}, {name: "Guam", code: "GU"}, {name: "Kiribati", code: "KI"}, {name: "Marshall Islands", code: "MH"}, {name: "Micronesia", code: "FM"}, {name: "Nauru", code: "NR"}, {name: "New Caledonia", code: "NC"}, {name: "New Zealand", code: "NZ"}, {name: "Niue", code: "NU"}, {name: "Norfolk Island", code: "NF"}, {name: "Northern Mariana Islands", code: "MP"}, {name: "Palau", code: "PW"}, {name: "Papua New Guinea", code: "PG"}, {name: "Pitcairn", code: "PN"}, {name: "Samoa", code: "WS"}, {name: "Solomon Islands", code: "SB"}, {name: "Tokelau", code: "TK"}, {name: "Tonga", code: "TO"}, {name: "Tuvalu", code: "TV"}, {name: "U.S. Minor Outlying Islands", code: "UM"}, {name: "Vanuatu", code: "VU"}, {name: "Wallis and Futuna", code: "WF"} ], "South America": [ {name: "Argentina", code: "AR"}, {name: "Bolivia", code: "BO"}, {name: "Brazil", code: "BR"}, {name: "Chile", code: "CL"}, {name: "Colombia", code: "CO"}, {name: "Ecuador", code: "EC"}, {name: "Falkland Islands", code: "FK"}, {name: "French Guiana", code: "GF"}, {name: "Guyana", code: "GY"}, {name: "Paraguay", code: "PY"}, {name: "Peru", code: "PE"}, {name: "Suriname", code: "SR"}, {name: "Uruguay", code: "UY"}, {name: "Venezuela", code: "VE"} ] };
    const totalCountries = Object.values(territoriesByRegion).reduce((sum, region) => sum + region.length, 0);

    let sortState = { key: null, direction: 'asc' };

    // --- RENDER FUNCTIONS ---
    function renderTable(data) {
        const tableBody = document.getElementById('tableBody');
        const paginationText = document.getElementById('pagination-text');

        if (!tableBody) return; // Defensive check

        tableBody.innerHTML = !data || data.length === 0
            ? `<tr><td colspan="10" class="text-center p-5"><h5>No matching conflicts.</h5></td></tr>`
            : data.map(req => `
                <tr data-bs-toggle="offcanvas" data-bs-target="#conflictResolutionOffcanvas"
                    data-song-name="${req.assetTitle}" data-artist-name="${req.artist}" data-isrc="${req.isrc}" 
                    data-cover-url="${req.albumCoverUrl}" data-category="${req.category}" data-other-party="${req.otherParty}">
                    
                    <td class="text-center"><i class="bi bi-youtube text-danger fs-5"></i></td>
                    <td>${req.category}</td>
                    <td> <a href="#" data-bs-toggle="modal" data-bs-target="#relocationRequestModal">
                        ${req.assetTitle}
                    </a></td>
                    <td><div class="fw-bold">${req.artist}</div><small class="text-muted">Asset ID: ${req.assetId}</small></td>
                    <td>${req.upc}</td>
                    <td>${req.otherParty}</td>
                    <td>${req.dailyViews}</td>
                    <td>${req.expiry}</td>
                    <td><span class="badge rounded-pill border bg-danger-subtle text-danger-emphasis">${req.status}</span></td>
                    <td><i class="bi bi-chevron-right text-muted"></i></td>
                </tr>`).join('');
        
        if (paginationText) {
            paginationText.textContent = `${data.length} of ${conflictRequests.length} results`;
        }
    }

    function renderTerritoryAccordion() {
        const accordionContainer = document.getElementById('territoryAccordion');
        if (!accordionContainer) return; // Defensive check

        accordionContainer.innerHTML = Object.entries(territoriesByRegion).map(([region, countries]) => {
            const regionId = region.replace(/[^a-zA-Z0-9]/g, '');
            return `
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading-${regionId}">
                    <button class="accordion-button collapsed d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${regionId}" aria-expanded="false">
                        <div class="form-check me-auto pe-2">
                            <input class="form-check-input region-checkbox" type="checkbox" id="region-${regionId}" data-region="${region}" checked>
                            <label class="form-check-label fw-bold" for="region-${regionId}">${region}</label>
                        </div>
                        <span class="text-muted small me-2">${countries.length} countries</span>
                        <i class="bi bi-chevron-down"></i>
                    </button>
                </h2>
                <div id="collapse-${regionId}" class="accordion-collapse collapse" data-bs-parent="#territoryAccordion">
                    <div class="accordion-body">
                        <div class="territory-list-inner">
                        ${countries.map(country => `
                            <div class="form-check">
                                <input class="form-check-input country-checkbox" type="checkbox" value="${country.code}" id="country-${country.code}" data-region="${region}" checked>
                                <label class="form-check-label" for="country-${country.code}">${country.name}</label>
                            </div>
                        `).join('')}
                        </div>
                    </div>
                </div>
            </div>
            `;
        }).join('');
        addTerritoryEventListeners();
        updateTerritoryCounter();
    }

    // --- SORTING & UPDATE LOGIC ---
    function parseViews(views) {
        if (typeof views !== 'string') return 0;
        const upperViews = views.toUpperCase();
        const num = parseFloat(upperViews);
        if (upperViews.includes('K')) return num * 1000;
        return num;
    }

    function parseExpiry(expiry) {
        if (typeof expiry !== 'string' || expiry === '-') return Infinity;
        return parseInt(expiry);
    }

    function updateTerritoryCounter() {
        const selectedCount = document.querySelectorAll('.country-checkbox:checked').length;
        const counterElement = document.getElementById('territoryCounter');
        if (counterElement) {
            counterElement.textContent = `${selectedCount} contested countries out of ${totalCountries} delivered`;
        }
    }
    
    function updateSortIcons() {
        document.querySelectorAll('.sortable-header').forEach(header => {
            header.removeAttribute('data-sort-direction');
        });
        
        if (sortState.key) {
            const activeHeader = document.querySelector(`.sortable-header[data-sort="${sortState.key}"]`);
            if (activeHeader) {
                activeHeader.setAttribute('data-sort-direction', sortState.direction);
            }
        }
    }

    // --- EVENT HANDLERS & INITIALIZATION ---
    renderTable(conflictRequests);

    // Table header click handler for sorting
    const releasesTable = document.getElementById('releasesTable');
    if (releasesTable) {
        releasesTable.querySelector('thead').addEventListener('click', (e) => {
            const target = e.target;
            if (!target.matches('.bi-arrow-up, .bi-arrow-down')) {
                return;
            }

            const headerCell = target.closest('.sortable-header');
            if (!headerCell) return;

            sortState.key = headerCell.dataset.sort;
            sortState.direction = target.classList.contains('bi-arrow-up') ? 'asc' : 'desc';

            conflictRequests.sort((a, b) => {
                let valA = a[sortState.key];
                let valB = b[sortState.key];

                if (sortState.key === 'dailyViews') {
                    valA = parseViews(valA);
                    valB = parseViews(valB);
                } else if (sortState.key === 'expiry') {
                    valA = parseExpiry(valA);
                    valB = parseExpiry(valB);
                }

                let comparison = 0;
                if (valA === null || valA === undefined) return 1;
                if (valB === null || valB === undefined) return -1;
                
                if (typeof valA === 'string' && typeof valB === 'string') {
                    comparison = valA.localeCompare(valB, undefined, {numeric: true});
                } else {
                    if (valA > valB) comparison = 1;
                    else if (valA < valB) comparison = -1;
                }
                
                return sortState.direction === 'desc' ? comparison * -1 : comparison;
            });

            renderTable(conflictRequests);
            updateSortIcons();
        });
    }

    // --- Offcanvas and Form Logic ---
    const conflictOffcanvas = document.getElementById('conflictResolutionOffcanvas');
    if (conflictOffcanvas) { 
        const conflictForm = document.getElementById('conflictForm');
        const steps = Array.from(document.querySelectorAll('.form-step'));
        const nextBtn = document.getElementById('nextBtn');
        const backBtn = document.getElementById('backBtn');
        const submitBtn = document.getElementById('submitBtn');
        let currentStep = 0;

        function showStep(stepIndex) {
            steps.forEach((step, index) => step.classList.toggle('d-none', index !== stepIndex));
            if(backBtn) backBtn.classList.toggle('d-none', stepIndex === 0);
            if(nextBtn) nextBtn.classList.toggle('d-none', stepIndex === steps.length - 1);
            if(submitBtn) submitBtn.classList.toggle('d-none', stepIndex !== steps.length - 1);
            currentStep = stepIndex;
        }

        if(nextBtn) nextBtn.addEventListener('click', () => {
            if (currentStep === 0 && !document.querySelector('input[name="rightsOwned"]:checked')) return alert('Please select a rights option.');
            if (document.getElementById('territoryAccordion') && currentStep === 1 && !document.querySelector('.country-checkbox:checked')) return alert('Please select at least one territory.');
            if (currentStep < steps.length - 1) showStep(currentStep + 1);
        });

        if(backBtn) backBtn.addEventListener('click', () => showStep(currentStep - 1));

        conflictOffcanvas.addEventListener('show.bs.offcanvas', function(event) {
            if(document.getElementById('territoryAccordion')) {
                renderTerritoryAccordion();
            }
            
            const data = event.relatedTarget.dataset;
            ['', '2', '3'].forEach(s => {
                const cover = document.getElementById(`modalAlbumCover${s}`);
                const song = document.getElementById(`modalSongName${s}`);
                const artist = document.getElementById(`modalArtistName${s}`);
                if(cover) cover.src = data.coverUrl;
                if(song) song.textContent = data.songName;
                if(artist) artist.textContent = data.artistName;
            });
            const modalIsrc = document.getElementById('modalIsrc');
            const offcanvasTitle = document.getElementById('offcanvasTitle');
            const offcanvasSubtitle = document.getElementById('offcanvasSubtitle');

            if(modalIsrc) modalIsrc.textContent = `ISRC: ${data.isrc}`;
            if(offcanvasTitle) offcanvasTitle.textContent = data.category;
            if(offcanvasSubtitle) offcanvasSubtitle.textContent = `VS. ${data.otherParty}`;
            
            if(conflictForm) conflictForm.reset();

            document.querySelectorAll('.radio-card').forEach(c => c.classList.remove('selected'));
            
            const selectedFileName = document.getElementById('selectedFileName');
            if(selectedFileName) selectedFileName.classList.add('d-none');
            
            document.querySelectorAll('#territoryAccordion input[type="checkbox"]').forEach(cb => cb.checked = true);
            if(document.getElementById('territoryCounter')) updateTerritoryCounter();
            showStep(0);
        });
        
        if(conflictForm) conflictForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formFile = document.getElementById('formFile');
            if (formFile && !formFile.files.length) return alert('Please upload a supporting document.');
            alert('Resolution submitted successfully!');
            bootstrap.Offcanvas.getInstance(conflictOffcanvas).hide();
        });

        document.querySelectorAll('.radio-card').forEach(c => c.addEventListener('click', function() {
            document.querySelectorAll('.radio-card').forEach(el => el.classList.remove('selected'));
            this.classList.add('selected');
            this.querySelector('input[type="radio"]').checked = true;
        }));

        function addTerritoryEventListeners() {
            document.querySelectorAll('.region-checkbox').forEach(regionCheckbox => {
                regionCheckbox.addEventListener('change', function() {
                    const region = this.dataset.region;
                    document.querySelectorAll(`.country-checkbox[data-region="${region}"]`).forEach(countryCheckbox => {
                        countryCheckbox.checked = this.checked;
                    });
                    if(document.getElementById('territoryCounter')) updateTerritoryCounter();
                });
            });

            document.querySelectorAll('.country-checkbox').forEach(countryCheckbox => {
                countryCheckbox.addEventListener('change', function() {
                    const region = this.dataset.region;
                    const allInRegionChecked = Array.from(document.querySelectorAll(`.country-checkbox[data-region="${region}"]`)).every(cb => cb.checked);
                    const regionCheckbox = document.querySelector(`.region-checkbox[data-region="${region}"]`);
                    if (regionCheckbox) {
                        regionCheckbox.checked = allInRegionChecked;
                    }
                    if(document.getElementById('territoryCounter')) updateTerritoryCounter();
                });
            });
        }
        
        const fileInput = document.getElementById('formFile');
        const fileDisplay = document.getElementById('selectedFileName');
        const fileUploadContainer = document.getElementById('fileUploadContainer');

        if(fileUploadContainer) fileUploadContainer.addEventListener('click', () => fileInput.click());
        if(fileInput) fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0 && fileDisplay) {
                fileDisplay.querySelector('span').textContent = fileInput.files[0].name;
                fileDisplay.classList.remove('d-none');
            }
        });
        if(fileDisplay) fileDisplay.querySelector('.btn-close').addEventListener('click', (e) => {
            e.stopPropagation(); 
            if(fileInput) fileInput.value = '';
            fileDisplay.classList.add('d-none');
        });
    }
});

// claim-data-page js

    document.addEventListener('DOMContentLoaded', function() {

         const ownershipPageContainer = document.querySelector('.admin-claim-data-page');

    // If this container doesn't exist, stop executing the rest of the script.
    if (!ownershipPageContainer) {
        return;
    }
        // --- DATA ---
        let claimingRequests = [
            { id: 1, songName: 'Cosmic Drift', artist: 'Orion Sun', isrc: 'US1232500004', instagramAudio: 'https://instagram.com/audio/123', reelMerge: 'https://instagram.com/reel/xyz', status: 'pending', artwork: 'https://i.scdn.co/image/ab67616d0000b273e6f6a7f1b2b2b2b2b2b2b2b2' },
            { id: 2, songName: 'Neon Tides', artist: 'Cyber Lazer', isrc: 'US1232500005', instagramAudio: 'https://instagram.com/audio/456', reelMerge: 'https://instagram.com/reel/abc', matchingTime: '00:30-01:00', status: 'pending', artwork: 'https://i.scdn.co/image/ab67616d0000b273f4f4f4f4f4f4f4f4f4f4f4f4' },
            { id: 3, songName: 'Lost Signal', artist: 'Ghost FM', isrc: 'US1232500006', instagramAudio: 'https://instagram.com/audio/789', reelMerge: 'https://instagram.com/reel/def', matchingTime: '01:00-01:15', status: 'rejected', artwork: 'https://i.scdn.co/image/ab67616d0000b273a8a8a8a8a8a8a8a8a8a8a8a8' }
        ];
        let currentFilter = 'all';
        let filteredData = [...claimingRequests];

        // --- DOM ELEMENTS ---
        const tableBody = document.getElementById('tableBody');
        const paginationText = document.getElementById('pagination-text');
        const newClaimForm = document.getElementById('newClaimForm');
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');
        const exportCsvBtn = document.getElementById('exportCsvBtn');
        const newClaimModal = new bootstrap.Modal(document.getElementById('newClaimRequestModal'));
        const releaseModalEl = document.getElementById('releaseModal');
        const releaseModal = new bootstrap.Modal(releaseModalEl);

        // --- HELPER FUNCTIONS ---
        const getStatusIcon = (status) => {
            const icons = { 'approved': 'check-circle', 'pending': 'clock', 'rejected': 'x-circle' };
            const colors = { 'approved': 'text-success', 'pending': 'text-warning', 'rejected': 'text-danger' };
            return `<i data-feather="${icons[status] || 'help-circle'}" class="${colors[status] || 'text-muted'}"></i>`;
        };
        const getStatusBadge = (status) => {
            const config = { 'approved': 'status-approved', 'pending': 'status-pending', 'rejected': 'status-rejected' };
            return `<span class="badge status-badge ${config[status] || 'bg-secondary'}">${status.toUpperCase()}</span>`;
        };
        const createLink = (url, iconClass) => url ? `<a href="${url}" target="_blank" class="link-icon me-2"><i class="bi ${iconClass}"></i></a>` : '';

        // --- RENDER & UPDATE FUNCTIONS ---
        function renderTable() {
            if (!filteredData || filteredData.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="6" class="empty-state"><i data-feather="inbox"></i><div><h5 class="mb-2">No Requests Found</h5><p class="mb-0">No requests match the current filter.</p></div></td></tr>`;
            } else {
                tableBody.innerHTML = filteredData.map(req => `
                    <tr>
                        <td class="text-center">${getStatusIcon(req.status)}</td>
                        <td>
                            <div class="release-title">
                                <a type="button"  data-bs-toggle="modal" data-bs-target="#newClaimRequestModal">${req.songName}</a>
                            </div>
                            <div class="text-muted small">${req.artist}</div>
                        </td>
                        <td>${req.isrc || 'N/A'}</td>
                        <td class="text-center">${createLink(req.instagramAudio, 'bi-music-note-beamed')} ${createLink(req.reelMerge, 'bi-camera-reels')}</td>
                        <td ><a class="d-flex justify-content-center">${getStatusBadge(req.status)}</a></td>
                    </tr>
                `).join('');
            }
            feather.replace();
            updatePaginationText(filteredData.length, claimingRequests.length);
        }

        function updatePaginationText(count, total) {
            paginationText.innerHTML = `Showing <strong>${count}</strong> of <strong>${total}</strong> entries`;
        }
        
        function openReleaseModal(id) {
            const req = claimingRequests.find(r => r.id === id);
            if (!req) return;

            document.getElementById('releaseTitle').textContent = req.songName;
            document.getElementById('releaseArtistHeader').textContent = req.artist;
            document.getElementById('releaseAlbumArtwork').src = req.artwork;
            releaseModalEl.querySelector('.bg-image-blurred').style.backgroundImage = `url('${req.artwork}')`;
            document.getElementById('releaseStatusBadges').innerHTML = getStatusBadge(req.status);
            document.getElementById('modal-isrc').textContent = req.isrc;
            document.getElementById('modal-matchingTime').textContent = req.matchingTime;
            document.getElementById('modal-instagramAudio').innerHTML = req.instagramAudio ? `<a href="${req.instagramAudio}" target="_blank">${req.instagramAudio}</a>` : 'N/A';
            document.getElementById('modal-reelMerge').innerHTML = req.reelMerge ? `<a href="${req.reelMerge}" target="_blank">${req.reelMerge}</a>` : 'N/A';

            releaseModalEl.dataset.currentId = req.id;
            releaseModal.show();
        }

        function handleStatusUpdate(status) {
            const requestId = parseInt(releaseModalEl.dataset.currentId, 10);
            const request = claimingRequests.find(r => r.id === requestId);
            if (request) {
                request.status = status;
                filterAndRender();
            }
            releaseModal.hide();
        }
        
        function filterAndRender() {
            let dataToFilter = [...claimingRequests];
            const searchTerm = searchInput.value.toLowerCase().trim();

            if (searchTerm) {
                dataToFilter = dataToFilter.filter(req =>
                    req.songName.toLowerCase().includes(searchTerm) ||
                    req.artist.toLowerCase().includes(searchTerm) ||
                    req.isrc.toLowerCase().includes(searchTerm)
                );
            }

            if (currentFilter !== 'all') {
                dataToFilter = dataToFilter.filter(req => req.status === currentFilter);
            }

            filteredData = dataToFilter;
            renderTable();
        }

        // --- EVENT LISTENERS ---
        document.getElementById('filterTabs').addEventListener('click', (e) => {
            if (e.target.matches('a.nav-link[data-filter]')) {
                e.preventDefault();
                currentFilter = e.target.dataset.filter;
                document.querySelectorAll('#filterTabs .nav-link').forEach(tab => tab.classList.remove('active'));
                e.target.classList.add('active');
                filterAndRender();
            }
        });

        searchButton.addEventListener('click', filterAndRender);
        searchInput.addEventListener('keyup', (e) => {
            if (e.key === 'Enter') filterAndRender();
        });
        searchInput.addEventListener('input', () => {
            if (!searchInput.value) filterAndRender();
        });

        tableBody.addEventListener('click', (e) => {
            const link = e.target.closest('.view-details-link');
            if (link) {
                e.preventDefault();
                openReleaseModal(parseInt(link.dataset.id, 10));
            }
        });

        newClaimForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const newRequest = {
                id: Date.now(),
                songName: document.getElementById('songNameInput').value,
                artist: document.getElementById('artistInput').value,
                isrc: document.getElementById('isrcInput').value,
                instagramAudio: document.getElementById('instagramAudioInput').value,
                reelMerge: document.getElementById('reelMergeInput').value,
                matchingTime: document.getElementById('matchingTimeInput').value,
                status: 'pending',
                artwork: 'https://via.placeholder.com/150/cccccc/FFFFFF?text=New'
            };
            claimingRequests.unshift(newRequest);
            newClaimForm.reset();
            newClaimModal.hide();
            filterAndRender();
        });
        
        document.getElementById('rejectBtn').addEventListener('click', () => handleStatusUpdate('rejected'));

        exportCsvBtn.addEventListener('click', () => {
             const headers = ['ID', 'Song Name', 'Artist', 'ISRC', 'Instagram Audio Link', 'Reel Merge Link', 'Status'];
             const rows = filteredData.map(req => [req.id, req.songName, req.artist, req.isrc, req.instagramAudio, req.reelMerge, req.matchingTime, req.status]);
             const escapeCsvValue = (val) => `"${String(val || '').replace(/"/g, '""')}"`;
             let csvContent = "data:text/csv;charset=utf-8," + headers.join(",") + "\n" + rows.map(r => r.map(escapeCsvValue).join(",")).join("\n");
             const link = document.createElement("a");
             link.setAttribute("href", encodeURI(csvContent));
             link.setAttribute("download", "claiming-requests.csv");
             document.body.appendChild(link);
             link.click();
             document.body.removeChild(link);
        });

        // --- INITIAL RENDER ---
        feather.replace();
        filterAndRender();
    });

    // merge-data-page js


        document.addEventListener('DOMContentLoaded', function() {

             const ownershipPageContainer = document.querySelector('.admin-merge-data-page');

    // If this container doesn't exist, stop executing the rest of the script.
    if (!ownershipPageContainer) {
        return;
    }
        // --- DATA ---
        let claimingRequests = [
            { id: 1, songName: 'Cosmic Drift', artist: 'Orion Sun', isrc: 'US1232500004', instagramAudio: 'https://instagram.com/audio/123', reelMerge: 'https://instagram.com/reel/xyz', matchingTime: '00:15-00:45', status: 'pending', artwork: 'https://i.scdn.co/image/ab67616d0000b273e6f6a7f1b2b2b2b2b2b2b2b2' },
            { id: 2, songName: 'Neon Tides', artist: 'Cyber Lazer', isrc: 'US1232500005', instagramAudio: 'https://instagram.com/audio/456', reelMerge: 'https://instagram.com/reel/abc', matchingTime: '00:30-01:00', status: 'pending', artwork: 'https://i.scdn.co/image/ab67616d0000b273f4f4f4f4f4f4f4f4f4f4f4f4' },
            { id: 3, songName: 'Lost Signal', artist: 'Ghost FM', isrc: 'US1232500006', instagramAudio: 'https://instagram.com/audio/789', reelMerge: 'https://instagram.com/reel/def', matchingTime: '01:00-01:15', status: 'rejected', artwork: 'https://i.scdn.co/image/ab67616d0000b273a8a8a8a8a8a8a8a8a8a8a8a8' }
        ];
        let currentFilter = 'all';
        let filteredData = [...claimingRequests];

        // --- DOM ELEMENTS ---
        const tableBody = document.getElementById('tableBody');
        const paginationText = document.getElementById('pagination-text');
        const newClaimForm = document.getElementById('newClaimForm');
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');
        const exportCsvBtn = document.getElementById('exportCsvBtn');
        const newClaimModal = new bootstrap.Modal(document.getElementById('newClaimRequestModal'));
        const releaseModalEl = document.getElementById('releaseModal');
        const releaseModal = new bootstrap.Modal(releaseModalEl);

        // --- HELPER FUNCTIONS ---
        const getStatusIcon = (status) => {
            const icons = { 'approved': 'check-circle', 'pending': 'clock', 'rejected': 'x-circle' };
            const colors = { 'approved': 'text-success', 'pending': 'text-warning', 'rejected': 'text-danger' };
            return `<i data-feather="${icons[status] || 'help-circle'}" class="${colors[status] || 'text-muted'}"></i>`;
        };
        const getStatusBadge = (status) => {
            const config = { 'approved': 'status-approved', 'pending': 'status-pending', 'rejected': 'status-rejected' };
            return `<span class="badge status-badge ${config[status] || 'bg-secondary'}">${status.toUpperCase()}</span>`;
        };
        const createLink = (url, iconClass) => url ? `<a href="${url}" target="_blank" class="link-icon me-2"><i class="bi ${iconClass}"></i></a>` : '';

        // --- RENDER & UPDATE FUNCTIONS ---
        function renderTable() {
            if (!filteredData || filteredData.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="6" class="empty-state"><i data-feather="inbox"></i><div><h5 class="mb-2">No Requests Found</h5><p class="mb-0">No requests match the current filter.</p></div></td></tr>`;
            } else {
                tableBody.innerHTML = filteredData.map(req => `
                    <tr>
                        <td class="text-center">${getStatusIcon(req.status)}</td>
                        <td>
                            <div class="release-title">
                                <a href="#" class="view-details-link" data-id="${req.id}">${req.songName}</a>
                            </div>
                            <div class="text-muted small">${req.artist}</div>
                        </td>
                        <td>${req.isrc || 'N/A'}</td>
                        <td class="text-center">${createLink(req.instagramAudio, 'bi-music-note-beamed')} ${createLink(req.reelMerge, 'bi-camera-reels')}</td>
                        <td>${req.matchingTime || 'N/A'}</td>
                        <td>${getStatusBadge(req.status)}</td>
                    </tr>
                `).join('');
            }
            feather.replace();
            updatePaginationText(filteredData.length, claimingRequests.length);
        }

        function updatePaginationText(count, total) {
            paginationText.innerHTML = `Showing <strong>${count}</strong> of <strong>${total}</strong> entries`;
        }
        
        function openReleaseModal(id) {
            const req = claimingRequests.find(r => r.id === id);
            if (!req) return;

            document.getElementById('releaseTitle').textContent = req.songName;
            document.getElementById('releaseArtistHeader').textContent = req.artist;
            document.getElementById('releaseAlbumArtwork').src = req.artwork;
            releaseModalEl.querySelector('.bg-image-blurred').style.backgroundImage = `url('${req.artwork}')`;
            document.getElementById('releaseStatusBadges').innerHTML = getStatusBadge(req.status);
            document.getElementById('modal-isrc').textContent = req.isrc;
            document.getElementById('modal-matchingTime').textContent = req.matchingTime;
            document.getElementById('modal-instagramAudio').innerHTML = req.instagramAudio ? `<a href="${req.instagramAudio}" target="_blank">${req.instagramAudio}</a>` : 'N/A';
            document.getElementById('modal-reelMerge').innerHTML = req.reelMerge ? `<a href="${req.reelMerge}" target="_blank">${req.reelMerge}</a>` : 'N/A';

            releaseModalEl.dataset.currentId = req.id;
            releaseModal.show();
        }

        function handleStatusUpdate(status) {
            const requestId = parseInt(releaseModalEl.dataset.currentId, 10);
            const request = claimingRequests.find(r => r.id === requestId);
            if (request) {
                request.status = status;
                filterAndRender();
            }
            releaseModal.hide();
        }
        
        function filterAndRender() {
            let dataToFilter = [...claimingRequests];
            const searchTerm = searchInput.value.toLowerCase().trim();

            if (searchTerm) {
                dataToFilter = dataToFilter.filter(req =>
                    req.songName.toLowerCase().includes(searchTerm) ||
                    req.artist.toLowerCase().includes(searchTerm) ||
                    req.isrc.toLowerCase().includes(searchTerm)
                );
            }

            if (currentFilter !== 'all') {
                dataToFilter = dataToFilter.filter(req => req.status === currentFilter);
            }

            filteredData = dataToFilter;
            renderTable();
        }

        // --- EVENT LISTENERS ---
        document.getElementById('filterTabs').addEventListener('click', (e) => {
            if (e.target.matches('a.nav-link[data-filter]')) {
                e.preventDefault();
                currentFilter = e.target.dataset.filter;
                document.querySelectorAll('#filterTabs .nav-link').forEach(tab => tab.classList.remove('active'));
                e.target.classList.add('active');
                filterAndRender();
            }
        });

        searchButton.addEventListener('click', filterAndRender);
        searchInput.addEventListener('keyup', (e) => {
            if (e.key === 'Enter') filterAndRender();
        });
        searchInput.addEventListener('input', () => {
            if (!searchInput.value) filterAndRender();
        });

        tableBody.addEventListener('click', (e) => {
            const link = e.target.closest('.view-details-link');
            if (link) {
                e.preventDefault();
                openReleaseModal(parseInt(link.dataset.id, 10));
            }
        });

        newClaimForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const newRequest = {
                id: Date.now(),
                songName: document.getElementById('songNameInput').value,
                artist: document.getElementById('artistInput').value,
                isrc: document.getElementById('isrcInput').value,
                instagramAudio: document.getElementById('instagramAudioInput').value,
                reelMerge: document.getElementById('reelMergeInput').value,
                matchingTime: document.getElementById('matchingTimeInput').value,
                status: 'pending',
                artwork: 'https://via.placeholder.com/150/cccccc/FFFFFF?text=New'
            };
            claimingRequests.unshift(newRequest);
            newClaimForm.reset();
            newClaimModal.hide();
            filterAndRender();
        });
        
        document.getElementById('rejectBtn').addEventListener('click', () => handleStatusUpdate('rejected'));

        exportCsvBtn.addEventListener('click', () => {
             const headers = ['ID', 'Song Name', 'Artist', 'ISRC', 'Instagram Audio Link', 'Reel Merge Link', 'Matching Time', 'Status'];
             const rows = filteredData.map(req => [req.id, req.songName, req.artist, req.isrc, req.instagramAudio, req.reelMerge, req.matchingTime, req.status]);
             const escapeCsvValue = (val) => `"${String(val || '').replace(/"/g, '""')}"`;
             let csvContent = "data:text/csv;charset=utf-8," + headers.join(",") + "\n" + rows.map(r => r.map(escapeCsvValue).join(",")).join("\n");
             const link = document.createElement("a");
             link.setAttribute("href", encodeURI(csvContent));
             link.setAttribute("download", "claiming-requests.csv");
             document.body.appendChild(link);
             link.click();
             document.body.removeChild(link);
        });

        // --- INITIAL RENDER ---
        feather.replace();
        filterAndRender();
    });

// relocation-data-page js

 document.addEventListener('DOMContentLoaded', function() {

    const ownershipPageContainer = document.querySelector('.admin-reloc-data-page');

    // If this container doesn't exist, stop executing the rest of the script.
    if (!ownershipPageContainer) {
        return;
    }
        // --- DATA ---
        let relocationRequests = [
            { id: 1, songName: 'Cosmic Drift', artist: 'Orion Sun', isrc: 'US1232500004', instagramAudio: 'https://instagram.com/audio/123', reelMerge: 'https://instagram.com/reel/xyz', status: 'pending', artwork: 'https://i.scdn.co/image/ab67616d0000b273e6f6a7f1b2b2b2b2b2b2b2b2' },
            { id: 2, songName: 'Neon Tides', artist: 'Cyber Lazer', isrc: 'US1232500005', instagramAudio: 'https://instagram.com/audio/456', reelMerge: 'https://instagram.com/reel/abc', matchingTime: '00:30-01:00', status: 'pending', artwork: 'https://i.scdn.co/image/ab67616d0000b273f4f4f4f4f4f4f4f4f4f4f4f4' },
            { id: 3, songName: 'Lost Signal', artist: 'Ghost FM', isrc: 'US1232500006', instagramAudio: 'https://instagram.com/audio/789', reelMerge: 'https://instagram.com/reel/def', matchingTime: '01:00-01:15', status: 'rejected', artwork: 'https://i.scdn.co/image/ab67616d0000b273a8a8a8a8a8a8a8a8a8a8a8a8' }
        ];
        let currentFilter = 'all';
        let filteredData = [...relocationRequests];

        // --- DOM ELEMENTS ---
        const tableBody = document.getElementById('tableBody');
        const paginationText = document.getElementById('pagination-text');
        const newClaimForm = document.getElementById('newClaimForm');
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');
        const exportCsvBtn = document.getElementById('exportCsvBtn');
        const newClaimModal = new bootstrap.Modal(document.getElementById('newClaimRequestModal'));
        const releaseModalEl = document.getElementById('releaseModal');
        const releaseModal = new bootstrap.Modal(releaseModalEl);

        // --- HELPER FUNCTIONS ---
        const getStatusIcon = (status) => {
            const icons = { 'approved': 'check-circle', 'pending': 'clock', 'rejected': 'x-circle' };
            const colors = { 'approved': 'text-success', 'pending': 'text-warning', 'rejected': 'text-danger' };
            return `<i data-feather="${icons[status] || 'help-circle'}" class="${colors[status] || 'text-muted'}"></i>`;
        };
        const getStatusBadge = (status) => {
            const config = { 'approved': 'status-approved', 'pending': 'status-pending', 'rejected': 'status-rejected' };
            return `<span class="badge status-badge ${config[status] || 'bg-secondary'}">${status.toUpperCase()}</span>`;
        };
        const createLink = (url, iconClass) => url ? `<a href="${url}" target="_blank" class="link-icon me-2"><i class="bi ${iconClass}"></i></a>` : '';

        // --- RENDER & UPDATE FUNCTIONS ---
        function renderTable() {
            if (!filteredData || filteredData.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="6" class="empty-state"><i data-feather="inbox"></i><div><h5 class="mb-2">No Requests Found</h5><p class="mb-0">No requests match the current filter.</p></div></td></tr>`;
            } else {
                tableBody.innerHTML = filteredData.map(req => `
                    <tr>
                        <td class="text-center">${getStatusIcon(req.status)}</td>
                        <td>
                            <div class="release-title">
                                <a type="button"  data-bs-toggle="modal" data-bs-target="#newClaimRequestModal">${req.songName}</a>
                            </div>
                            <div class="text-muted small">${req.artist}</div>
                        </td>
                        <td>${req.isrc || 'N/A'}</td>
                        <td class="text-center">${createLink(req.instagramAudio, 'bi-music-note-beamed')} ${createLink(req.reelMerge, 'bi-camera-reels')}</td>
                        <td ><a class="d-flex justify-content-center">${getStatusBadge(req.status)}</a></td>
                    </tr>
                `).join('');
            }
            feather.replace();
            updatePaginationText(filteredData.length, relocationRequests.length);
        }

        function updatePaginationText(count, total) {
            paginationText.innerHTML = `Showing <strong>${count}</strong> of <strong>${total}</strong> entries`;
        }
        
        function openReleaseModal(id) {
            const req = relocationRequests.find(r => r.id === id);
            if (!req) return;

            document.getElementById('releaseTitle').textContent = req.songName;
            document.getElementById('releaseArtistHeader').textContent = req.artist;
            document.getElementById('releaseAlbumArtwork').src = req.artwork;
            releaseModalEl.querySelector('.bg-image-blurred').style.backgroundImage = `url('${req.artwork}')`;
            document.getElementById('releaseStatusBadges').innerHTML = getStatusBadge(req.status);
            document.getElementById('modal-isrc').textContent = req.isrc;
            document.getElementById('modal-matchingTime').textContent = req.matchingTime;
            document.getElementById('modal-instagramAudio').innerHTML = req.instagramAudio ? `<a href="${req.instagramAudio}" target="_blank">${req.instagramAudio}</a>` : 'N/A';
            document.getElementById('modal-reelMerge').innerHTML = req.reelMerge ? `<a href="${req.reelMerge}" target="_blank">${req.reelMerge}</a>` : 'N/A';

            releaseModalEl.dataset.currentId = req.id;
            releaseModal.show();
        }

        function handleStatusUpdate(status) {
            const requestId = parseInt(releaseModalEl.dataset.currentId, 10);
            const request = relocationRequests.find(r => r.id === requestId);
            if (request) {
                request.status = status;
                filterAndRender();
            }
            releaseModal.hide();
        }
        
        function filterAndRender() {
            let dataToFilter = [...relocationRequests];
            const searchTerm = searchInput.value.toLowerCase().trim();

            if (searchTerm) {
                dataToFilter = dataToFilter.filter(req =>
                    req.songName.toLowerCase().includes(searchTerm) ||
                    req.artist.toLowerCase().includes(searchTerm) ||
                    req.isrc.toLowerCase().includes(searchTerm)
                );
            }

            if (currentFilter !== 'all') {
                dataToFilter = dataToFilter.filter(req => req.status === currentFilter);
            }

            filteredData = dataToFilter;
            renderTable();
        }

        // --- EVENT LISTENERS ---
        document.getElementById('filterTabs').addEventListener('click', (e) => {
            if (e.target.matches('a.nav-link[data-filter]')) {
                e.preventDefault();
                currentFilter = e.target.dataset.filter;
                document.querySelectorAll('#filterTabs .nav-link').forEach(tab => tab.classList.remove('active'));
                e.target.classList.add('active');
                filterAndRender();
            }
        });

        searchButton.addEventListener('click', filterAndRender);
        searchInput.addEventListener('keyup', (e) => {
            if (e.key === 'Enter') filterAndRender();
        });
        searchInput.addEventListener('input', () => {
            if (!searchInput.value) filterAndRender();
        });

        tableBody.addEventListener('click', (e) => {
            const link = e.target.closest('.view-details-link');
            if (link) {
                e.preventDefault();
                openReleaseModal(parseInt(link.dataset.id, 10));
            }
        });

        newClaimForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const newRequest = {
                id: Date.now(),
                songName: document.getElementById('songNameInput').value,
                artist: document.getElementById('artistInput').value,
                isrc: document.getElementById('isrcInput').value,
                instagramAudio: document.getElementById('instagramAudioInput').value,
                reelMerge: document.getElementById('reelMergeInput').value,
                matchingTime: document.getElementById('matchingTimeInput').value,
                status: 'pending',
                artwork: 'https://via.placeholder.com/150/cccccc/FFFFFF?text=New'
            };
            relocationRequests.unshift(newRequest);
            newClaimForm.reset();
            newClaimModal.hide();
            filterAndRender();
        });
        
        document.getElementById('rejectBtn').addEventListener('click', () => handleStatusUpdate('rejected'));

        exportCsvBtn.addEventListener('click', () => {
             const headers = ['ID', 'Song Name', 'Artist', 'ISRC', 'Instagram Audio Link', 'Reel Merge Link', 'Status'];
             const rows = filteredData.map(req => [req.id, req.songName, req.artist, req.isrc, req.instagramAudio, req.reelMerge, req.matchingTime, req.status]);
             const escapeCsvValue = (val) => `"${String(val || '').replace(/"/g, '""')}"`;
             let csvContent = "data:text/csv;charset=utf-8," + headers.join(",") + "\n" + rows.map(r => r.map(escapeCsvValue).join(",")).join("\n");
             const link = document.createElement("a");
             link.setAttribute("href", encodeURI(csvContent));
             link.setAttribute("download", "relocation-requests.csv");
             document.body.appendChild(link);
             link.click();
             document.body.removeChild(link);
        });

        // --- INITIAL RENDER ---
        feather.replace();
        filterAndRender();
    });

// releases-page js

 const releasesData = [{
        id: 1,
        title: "Swapnil Dada Kartoy Raj",
        artist: "Mohit Jadhav",
        submittedDate: "7th July 2025",
        upc: "5863544729375",
        isrc: "INH722302515",
        status: "delivered",
        isTakedown: false,
        catNo: "MJ-001",
        recordLabel: "Music Dreams",
        featuringArtist: "None",
        lyricists: ["Mohit Jadhav", "Priya Sharma"],
        albumArtwork: "/images/rocket.png", // Dummy image
        stores: ["Spotify", "Apple Music", "Amazon Music", "JioSaavn", "Gaana"],
        copyrightStores: ["Facebook Rights Manager", "YouTube Content ID"],
        tracks: [{
            trackNo: 1,
            title: "Swapnil Dada Kartoy Raj",
            duration: "3:45",
            isrc: "INH722302515",
            language: "Marathi",
            explicit: false
        }, {
            trackNo: 2,
            title: "Jai Maharashtra",
            duration: "4:10",
            isrc: "INH722302516",
            language: "Marathi",
            explicit: false
        }]
    }, {
        id: 2,
        title: "Dream Chaser",
        artist: "Sarah Johnson",
        submittedDate: "5th July 2025",
        upc: "5863544729376",
        isrc: "INH722302516",
        status: "review",
        isTakedown: false,
        catNo: "SJ-002",
        recordLabel: "Indie Sounds",
        featuringArtist: "The Harmonizers",
        lyricists: ["Sarah Johnson"],
        albumArtwork: "/images/rocket.png", // Dummy image
        stores: ["Spotify", "Apple Music", "Amazon Music"],
        copyrightStores: [],
        tracks: [{
            trackNo: 1,
            title: "Stardust",
            duration: "3:20",
            isrc: "US-SJ-25-001",
            language: "English",
            explicit: false
        }, {
            trackNo: 2,
            title: "Open Road",
            duration: "4:00",
            isrc: "US-SJ-25-002",
            language: "English",
            explicit: false
        }, {
            trackNo: 3,
            title: "City Echoes",
            duration: "2:55",
            isrc: "US-SJ-25-003",
            language: "English",
            explicit: true
        }]
    }, {
        id: 3,
        title: "Midnight Blues",
        artist: "Alex Rodriguez",
        submittedDate: "3rd July 2025",
        upc: "5863544729377",
        isrc: "INH722302517",
        status: "delivered",
        isTakedown: false,
        catNo: "AR-003",
        recordLabel: "Jazz Groove",
        featuringArtist: "Smooth Sax Sam",
        lyricists: ["Alex Rodriguez"],
        albumArtwork: "/images/rocket.png", // Dummy image
        stores: ["Spotify", "Apple Music", "Bandcamp"],
        copyrightStores: ["YouTube Content ID"],
        tracks: [{
            trackNo: 1,
            title: "Blue Moon Serenade",
            duration: "5:15",
            isrc: "US-AR-25-004",
            language: "English",
            explicit: false
        }]
    }, {
        id: 4,
        title: "Summer Vibes",
        artist: "Emma Thompson",
        submittedDate: "1st July 2025",
        upc: "5863544729378",
        isrc: "INH722302518",
        status: "rejected",
        isTakedown: false,
        catNo: "ET-004",
        recordLabel: "Pop Hits Inc.",
        featuringArtist: "None",
        lyricists: ["Emma Thompson", "Ben Carter"],
        albumArtwork: "/images/rocket.png", // Dummy image
        stores: [],
        copyrightStores: [],
        tracks: [{
            trackNo: 1,
            title: "Beach Day",
            duration: "3:05",
            isrc: "US-ET-25-005",
            language: "English",
            explicit: false
        }]
    }, {
        id: 5,
        title: "Electronic Dreams",
        artist: "DJ Mike",
        submittedDate: "28th June 2025",
        upc: "5863544729379",
        isrc: "INH722302519",
        status: "review",
        isTakedown: false,
        catNo: "DJM-005",
        recordLabel: "Techno Beat",
        featuringArtist: "Synth Master",
        lyricists: ["DJ Mike"],
        albumArtwork: "/images/rocket.png", // Dummy image
        stores: ["Beatport", "SoundCloud"],
        copyrightStores: [],
        tracks: [{
            trackNo: 1,
            title: "Circuit Breaker",
            duration: "6:00",
            isrc: "US-DJM-25-006",
            language: "Instrumental",
            explicit: false
        }, {
            trackNo: 2,
            title: "Digital Love",
            duration: "5:30",
            isrc: "US-DJM-25-007",
            language: "English",
            explicit: false
        }]
    }, {
        id: 6,
        title: "Midnight Blues",
        artist: "Alex Rodriguez",
        submittedDate: "3rd July 2025",
        upc: "5863544729377",
        isrc: "INH722302517",
        status: "approved",
        isTakedown: false,
        catNo: "AR-003",
        recordLabel: "Jazz Groove",
        featuringArtist: "Smooth Sax Sam",
        lyricists: ["Alex Rodriguez"],
        albumArtwork: "/images/rocket.png", // Dummy image
        stores: ["Spotify", "Apple Music", "Bandcamp"],
        copyrightStores: ["YouTube Content ID"],
        tracks: [{
            trackNo: 1,
            title: "Blue Moon Serenade",
            duration: "5:15",
            isrc: "US-AR-25-004",
            language: "English",
            explicit: false
        }]
    } ];


    let currentFilter = 'all';
    let filteredData = [...releasesData];

    // Initialize page
    document.addEventListener('DOMContentLoaded', function() {

        const ownershipPageContainer = document.querySelector('.admin-releases-page');

    // If this container doesn't exist, stop executing the rest of the script.
    if (!ownershipPageContainer) {
        return;
    }
        // Get filter from URL parameter
        const urlParams = new URLSearchParams(window.location.search);
        const filter = urlParams.get('filter') || 'all';

        setActiveTab(filter);
        filterReleases(filter);
        feather.replace(); // Initialize feather icons on page load
    });

    // Set active tab
    function setActiveTab(filter) {
        currentFilter = filter;
        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('active');
        });

        const activeLink = document.querySelector(`[data-filter="${filter}"]`);
        if (activeLink) {
            activeLink.classList.add('active');
        }
    }

    // Filter releases based on status
    function filterReleases(filter) {
        if (filter === 'all') {
            filteredData = [...releasesData];
        } else {
            filteredData = releasesData.filter(release => release.status === filter);
        }

        renderTable();
    }

    function getStatusIcon(status) {
        switch (status.toLowerCase()) {
            case 'delivered':
                return `<i class="bi bi-check-circle-fill text-success" title="Delivered"></i>`;
            case 'approved':
                return `<i class="bi bi-check-circle-fill text-success" title="Delivered"></i>`;
            case 'rejected':
                return `<i class="bi bi-x-circle-fill text-danger" title="Rejected"></i>`;
            case 'review':
                return `<i class="bi bi-hourglass-split text-warning" title="In Review"></i>`;
            case 'takedown':
                return `<i class="bi bi-exclamation-circle-fill text-secondary" title="Takedown"></i>`;
            default:
                return `<i class="bi bi-question-circle-fill text-muted" title="Unknown Status"></i>`;
        }
    }

    // Get status badge HTML for the table
    function getStatusBadge(status) {
        const statusConfig = {
            'delivered': {
                class: 'status-delivered',
                text: 'DELIVERED'
            },
            'approved': {
                class: 'status-approved',
                text: 'APPROVED'
            },
            'review': {
                class: 'status-review',
                text: 'IN REVIEW'
            },
            'rejected': {
                class: 'status-rejected',
                text: 'REJECTED'
            },
            'takedown': {
                class: 'status-takedown-table',
                text: 'TAKEDOWN'
            }
        };

        const config = statusConfig[status] || {
            class: 'status-review',
            text: status.toUpperCase()
        };
        return `<span class="badge status-badge ${config.class}">${config.text}</span>`;
    }

    // Render table
    function renderTable() {
        const tableBody = document.getElementById('tableBody');

        if (filteredData.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="7" class="empty-state">
                        <i data-feather="inbox"></i>
                        <div>
                            <h5 class="mb-2">No releases found</h5>
                            <p class="mb-0">No releases found for this category.</p>
                        </div>
                    </td>
                </tr>
            `;
        } else {
            tableBody.innerHTML = filteredData.map(release => `
                <tr>
                    <td class="text-center">
                        ${getStatusIcon(release.status)}
                    </td>
                    <td>
                        <div>
                            <div class="release-title">
                                <a href="#" class="text-primary text-decoration-none" onclick="openReleaseModal(${release.id})">
                                    ${release.title}
                                </a>
                            </div>
                            <div class="release-artist">${release.artist}</div>
                        </div>
                    </td>
                    <td>${release.submittedDate}</td>
                    <td>${release.upc}</td>
                    <td>${release.isrc}</td>
                    <td>${getStatusBadge(release.status)}</td>
                </tr>
            `).join('');
        }

        feather.replace(); // Re-initialize feather icons after rendering table
    }

    // Handle tab clicks
    document.addEventListener('click', function(e) {
        if (e.target.matches('.nav-link[data-filter]')) {
            e.preventDefault();
            const filter = e.target.getAttribute('data-filter');

            // Update URL
            const url = new URL(window.location);
            url.searchParams.set('filter', filter);
            window.history.pushState({}, '', url);

            // Update UI
            setActiveTab(filter);
            filterReleases(filter);
        }
    });

    // Search functionality
    function performSearch() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();

        // If search term is empty, re-render based on current filter
        if (searchTerm.trim() === '') {
            filterReleases(currentFilter);
            return;
        }

        // Filter the *original* data by search term, then apply current filter
        let tempFilteredData = releasesData.filter(release =>
            release.title.toLowerCase().includes(searchTerm) ||
            release.artist.toLowerCase().includes(searchTerm) ||
            (release.upc && release.upc.includes(searchTerm)) || // Check for existence before calling includes
            (release.isrc && release.isrc.includes(searchTerm)) // Check for existence before calling includes
        );

        if (currentFilter !== 'all') {
            tempFilteredData = tempFilteredData.filter(release => release.status === currentFilter);
        }

        filteredData = tempFilteredData; // Update global filteredData
        renderTable();
    }

    // Search on Enter key
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            performSearch();
        }
    });

    // Reset search when input is cleared
    document.getElementById('searchInput').addEventListener('input', function(e) {
        if (e.target.value.trim() === '') {
            filterReleases(currentFilter);
        }
    });

    // Action functions (placeholders)
    function viewDetails(id) {
        openReleaseModal(id);
    }

    function editRelease(id) {
        alert(`Editing release ID: ${id}`);
    }

    function deleteRelease(id) {
        if (confirm('Are you sure you want to delete this release?')) {
            alert(`Deleted release ID: ${id}`);
            // In a real application, you'd send an API request here
            // and then update `releasesData` and re-render the table.
            // releasesData = releasesData.filter(release => release.id !== id);
            // filterReleases(currentFilter);
        }
    }

    // Function to handle takedown request (placeholder)
    function requestTakedown(releaseId) {
        if (confirm(`Are you sure you want to request a takedown for release ID ${releaseId}? This action cannot be undone.`)) {
            alert(`Takedown requested for release ID: ${releaseId}`);
            // In a real application, you would send an API request here
            // to initiate the takedown process.
            // Example: axios.post('/api/takedown', { releaseId: releaseId });
            // After successful takedown, you might want to update the release status in your data.
        }
    }


    // Function to open the release details modal with comprehensive data
    function openReleaseModal(id) {
        const release = releasesData.find(r => r.id === id);

        if (!release) {
            console.error(`Release with ID ${id} not found.`);
            return;
        }

        const releaseModalHeader = document.getElementById('releaseModalHeader');
        const releaseAlbumArtwork = document.getElementById('releaseAlbumArtwork');
        const releaseTitle = document.getElementById('releaseTitle');
        const releaseArtistHeader = document.getElementById('releaseArtistHeader');
        const releaseStatusBadges = document.getElementById('releaseStatusBadges');
        const releaseModalContent = document.getElementById('releaseModalContent');
        const takedownButton = document.getElementById('takedownButton'); // Get the takedown button

        // Set header background and album artwork
        const artworkUrl = release.albumArtwork || 'https://via.placeholder.com/150/CCCCCC/FFFFFF?text=No+Artwork';
        releaseModalHeader.querySelector('.bg-image-blurred').style.backgroundImage = `url('${artworkUrl}')`;
        releaseAlbumArtwork.src = artworkUrl;
        releaseAlbumArtwork.alt = `${release.title || 'Untitled'} Album Artwork`;
        releaseTitle.textContent = release.title || 'Untitled Release';
        releaseArtistHeader.textContent = release.artist || 'Unknown Artist';

        // Set status badges
        let badgesHtml = '';
        let modalStatusBadgeClass = '';
        let modalStatusBadgeText = '';

        switch (release.status) {
            case 'delivered':
                modalStatusBadgeClass = 'bg-success';
                modalStatusBadgeText = 'DELIVERED';
                break;
            case 'review':
                modalStatusBadgeClass = 'bg-warning text-dark';
                modalStatusBadgeText = 'IN REVIEW';
                break;
            case 'rejected':
                modalStatusBadgeClass = 'bg-danger';
                modalStatusBadgeText = 'REJECTED';
                break;
            case 'takedown':
                modalStatusBadgeClass = 'bg-secondary';
                modalStatusBadgeText = 'TAKEDOWN';
                break;
            default:
                modalStatusBadgeClass = 'bg-secondary';
                modalStatusBadgeText = 'N/A';
        }
        badgesHtml += `<span class="badge ${modalStatusBadgeClass} me-2">${modalStatusBadgeText}</span>`;


        if (release.isTakedown) {
            badgesHtml += `<span class="badge badge-takedown-glow">Takedown Requested</span>`;
            takedownButton.style.display = 'none'; // Hide takedown button if already taken down
        } else {
            takedownButton.style.display = 'inline-block'; // Show takedown button
            takedownButton.onclick = () => requestTakedown(release.id); // Assign click handler
        }
        releaseStatusBadges.innerHTML = badgesHtml;

        // Construct the modal body content
        releaseModalContent.innerHTML = `
            <div class="modal-content-wrapper">
                <div class="modal-content-card">
                    <h5 class="card-title">Release Details</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Artist</label>
                            <p class="form-control-plaintext fw-bold">${release.artist || 'N/A'}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Submitted Date</label>
                            <p class="form-control-plaintext">${release.submittedDate || 'N/A'}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Cat. No</label>
                            <p class="form-control-plaintext">${release.catNo || 'N/A'}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">UPC/EAN</label>
                            <p class="form-control-plaintext">${release.upc || 'N/A'}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Record Label</label>
                            <p class="form-control-plaintext">${release.recordLabel || 'N/A'}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Featuring Artist</label>
                            <p class="form-control-plaintext">${release.featuringArtist || 'None'}</p>
                        </div>
                        <div class="col-12 mb-0">
                            <label class="form-label">Lyricist(s)</label>
                            <p class="form-control-plaintext">${release.lyricists && release.lyricists.length > 0 ? release.lyricists.join(', ') : 'N/A'}</p>
                        </div>
                    </div>
                </div>

                <div class="modal-content-card">
                    <h5 class="card-title">Distribution Information</h5>
                    <div class="mb-4">
                        <label class="form-label mb-2">Delivered Stores</label>
                        <div class="p-3 rounded-3 bg-light badge-container">
                            ${release.stores && release.stores.length > 0 ?
                                release.stores.map(store => `<span class="badge badge-primary">${store}</span>`).join('') :
                                '<p class="text-muted mb-0">No stores listed.</p>'
                            }
                        </div>
                    </div>
                    <div>
                        <label class="form-label mb-2">Copyright Protection</label>
                        <div class="p-3 rounded-3 bg-light badge-container">
                            ${release.copyrightStores && release.copyrightStores.length > 0 ?
                                release.copyrightStores.map(store => `<span class="badge badge-info">${store}</span>`).join('') :
                                '<p class="text-muted mb-0">No copyright stores listed.</p>'
                            }
                        </div>
                    </div>
                </div>

                <div class="modal-content-card">
                    <h5 class="card-title">Track List</h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle track-list-table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">ISRC</th>
                                    <th scope="col">Language</th>
                                    <th scope="col" class="text-center">Tags</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${release.tracks && release.tracks.length > 0 ?
                                    release.tracks.map((track, index) => `
                                        <tr>
                                            <td class="text-center">${track.trackNo}</td>
                                            <td>${track.title || 'Untitled Track'}</td>
                                            <td>${track.duration || 'N/A'}</td>
                                            <td>${track.isrc || 'N/A'}</td>
                                            <td>${track.language || 'N/A'}</td>
                                            <td class="text-center">
                                                ${track.explicit ? '<span class="track-tag-explicit badge">Explicit</span>' : 
                                                (track.explicit === false ? '<span class="track-tag-clean badge">Clean</span>' : '')}
                                            </td>
                                        </tr>
                                    `).join('') :
                                    `<tr><td colspan="6" class="text-center text-muted py-4">No tracks found for this release.</td></tr>`
                                }
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            `;

        // Initialize Bootstrap Modal
        const releaseModal = new bootstrap.Modal(document.getElementById('releaseModal'));
        releaseModal.show();
    }

    document.addEventListener('DOMContentLoaded', function() {

         const ownershipPageContainer = document.querySelector('.admin-releases-page');

    // If this container doesn't exist, stop executing the rest of the script.
    if (!ownershipPageContainer) {
        return;
    }
        // Find the elements inside the labelModal
        const destinationLabelSelect = document.getElementById('destinationLabelSelect');
        const createAlbumBtn = document.getElementById('createAlbumBtn');

        // Check if both elements were found before adding listeners
        if (destinationLabelSelect && createAlbumBtn) {
            // This function enables/disables the button based on dropdown selection
            destinationLabelSelect.addEventListener('change', function() {
                // The 'disabled' property is a true boolean. 
                // It's set to true if no value is selected, and false if a value exists.
                createAlbumBtn.disabled = !this.value;
            });

            // This function handles the click action (navigation)
            createAlbumBtn.addEventListener('click', function() {
                // A click event will not fire on a disabled button.
                window.location.href = 'add-release';
            });
        }
    });

